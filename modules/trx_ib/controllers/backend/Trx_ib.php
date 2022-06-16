<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH . 'libraries/Excel/PHPExcel.php');

/**
*| --------------------------------------------------------------------------
*| Trx Ib Controller
*| --------------------------------------------------------------------------
*| Trx Ib site
*|
*/
class Trx_ib extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_trx_ib');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Trx Ibs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('trx_ib_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir 	= $this->input->get('tanggal_akhir');
		if($tanggal_awal){
         $this->data['default_awal'] =date("Y-m-d", strtotime($tanggal_awal));
		}else{
			$this->data['default_awal'] = '';
		}
		if($tanggal_akhir){
      	$this->data['default_akhir'] =date("Y-m-d", strtotime($tanggal_akhir));
		}else{
		$this->data['default_akhir'] = '';			
		}

		$this->data['trx_ibs'] = $this->model_trx_ib->get($filter, $field, $this->limit_page, $offset);
		$this->data['trx_ib_counts'] = $this->model_trx_ib->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/trx_ib/index/',
			'total_rows'   => $this->model_trx_ib->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Incoming Beans List');
		$this->render('backend/standart/administrator/trx_ib/trx_ib_list', $this->data);
	}
	
	/**
	* Add new trx_ibs
	*
	*/
	public function add()
	{
		$this->is_allowed('trx_ib_add');

		$this->template->title('Incoming Beans New');
		$this->render('backend/standart/administrator/trx_ib/trx_ib_add', $this->data);
	}

	/**
	* Add New Trx Ibs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('trx_ib_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('target', 'Target', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'sum' => $this->input->post('sum'),
				'target' => $this->input->post('target'),
				'user_id' => get_user_data('id'),				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
				'input_type' => 'input',
			];

			
			$save_trx_ib = $this->model_trx_ib->store($save_data);
            

			if ($save_trx_ib) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_trx_ib;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/trx_ib/edit/' . $save_trx_ib, 'Edit Trx Ib'),
						anchor('administrator/trx_ib', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/trx_ib/edit/' . $save_trx_ib, 'Edit Trx Ib')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/trx_ib');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/trx_ib');
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
	* Update view Trx Ibs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('trx_ib_update');

		$this->data['trx_ib'] = $this->model_trx_ib->find($id);

		$this->template->title('Incoming Beans Update');
		$this->render('backend/standart/administrator/trx_ib/trx_ib_update', $this->data);
	}

	/**
	* Update Trx Ibs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('trx_ib_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('target', 'Target', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'sum' => $this->input->post('sum'),
				'target' => $this->input->post('target'),
				'user_id' => get_user_data('id'),				'updated_at' => date('Y-m-d H:i:s'),
				'input_type' => 'input',
			];

			
			$save_trx_ib = $this->model_trx_ib->change($id, $save_data);

			if ($save_trx_ib) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/trx_ib', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/trx_ib');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/trx_ib');
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
	* delete Trx Ibs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('trx_ib_delete');

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
            set_message(cclang('has_been_deleted', 'trx_ib'), 'success');
        } else {
            set_message(cclang('error_delete', 'trx_ib'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Trx Ibs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('trx_ib_view');

		$this->data['trx_ib'] = $this->model_trx_ib->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Incoming Beans Detail');
		$this->render('backend/standart/administrator/trx_ib/trx_ib_view', $this->data);
	}
	
	/**
	* delete Trx Ibs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$trx_ib = $this->model_trx_ib->find($id);

		
		
		return $this->model_trx_ib->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('trx_ib_export');

		$this->model_trx_ib->export('trx_ib', 'trx_ib');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('trx_ib_export');

		$this->model_trx_ib->pdf('trx_ib', 'trx_ib');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('trx_ib_export');

		$table = $title = 'trx_ib';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_trx_ib->find($id);
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
					$sum = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$target = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

					$datetime = PHPExcel_Shared_Date::ExcelToPHP($date);

					$temp_data[] = array(
						'date'	=> gmdate("Y-m-d", $datetime),
						'sum'	=> $sum,
						'target'	=> $target,
						'user_id'	=> get_user_data('id'),
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
						'input_type' => 'excel',
					); 	
				}
			}
			$insert = $this->model_trx_ib->insert($temp_data);
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


/* End of file trx_ib.php */
/* Location: ./application/controllers/administrator/Trx Ib.php */