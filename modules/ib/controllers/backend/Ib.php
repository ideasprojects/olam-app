<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH . 'libraries/Excel/PHPExcel.php');

/**
*| --------------------------------------------------------------------------
*| Ib Controller
*| --------------------------------------------------------------------------
*| Ib site
*|
*/
class Ib extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_ib');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Ibs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('ib_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['ibs'] = $this->model_ib->get($filter, $field, $this->limit_page, $offset);
		$this->data['ib_counts'] = $this->model_ib->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/ib/index/',
			'total_rows'   => $this->model_ib->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Incoming Beans List');
		$this->render('backend/standart/administrator/ib/ib_list', $this->data);
	}
	
	/**
	* Add new ibs
	*
	*/
	public function add()
	{
		$this->is_allowed('ib_add');

		$this->template->title('Incoming Beans New');
		$this->render('backend/standart/administrator/ib/ib_add', $this->data);
	}

	/**
	* Add New Ibs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('ib_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('sum_incoming_beans', 'Sum Incoming Beans', 'trim|required');
		$this->form_validation->set_rules('target', 'Target', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'sum_incoming_beans' => $this->input->post('sum_incoming_beans'),
				'target' => $this->input->post('target'),
				'user_id' => get_user_data('id'),			];

			
			$save_ib = $this->model_ib->store($save_data);
            

			if ($save_ib) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_ib;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/ib/edit/' . $save_ib, 'Edit Ib'),
						anchor('administrator/ib', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/ib/edit/' . $save_ib, 'Edit Ib')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/ib');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/ib');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Ibs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('ib_update');

		$this->data['ib'] = $this->model_ib->find($id);

		$this->template->title('Incoming Beans Update');
		$this->render('backend/standart/administrator/ib/ib_update', $this->data);
	}

	/**
	* Update Ibs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('ib_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('sum_incoming_beans', 'Sum Incoming Beans', 'trim|required');
		$this->form_validation->set_rules('target', 'Target', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'sum_incoming_beans' => $this->input->post('sum_incoming_beans'),
				'target' => $this->input->post('target'),
				'user_id' => get_user_data('id'),			];

			
			$save_ib = $this->model_ib->change($id, $save_data);

			if ($save_ib) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/ib', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/ib');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/ib');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Ibs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('ib_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'ib'), 'success');
        } else {
            set_message(cclang('error_delete', 'ib'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Ibs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('ib_view');

		$this->data['ib'] = $this->model_ib->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Incoming Beans Detail');
		$this->render('backend/standart/administrator/ib/ib_view', $this->data);
	}
	
	/**
	* delete Ibs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$ib = $this->model_ib->find($id);

		
		
		return $this->model_ib->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('ib_export');

		$this->model_ib->export('ib', 'ib');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('ib_export');

		$this->model_ib->pdf('ib', 'ib');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('ib_export');

		$table = $title = 'ib';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_ib->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	public function import_excel(){
		if (isset($_FILES["file"]["name"])) {
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					$date = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$sum_incoming_beans = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$target = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

					$datetime = PHPExcel_Shared_Date::ExcelToPHP($date); //unix

					$temp_data[] = array(
						'date'	=> gmdate("Y-m-d", $datetime),
						'sum_incoming_beans'	=> $sum_incoming_beans,
						'target'	=> $target,
						'user_id'	=> get_user_data('id'),
					); 	
				}
			}
			$insert = $this->model_ib->insert($temp_data);
			if($insert){
				set_message('Success', 'success');
			}else{
            	set_message('Error', 'error');
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}


	
}


/* End of file ib.php */
/* Location: ./application/controllers/administrator/Ib.php */