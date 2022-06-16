<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH . 'libraries/Excel/PHPExcel.php');

/**
*| --------------------------------------------------------------------------
*| So Controller
*| --------------------------------------------------------------------------
*| So site
*|
*/
class So extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_so');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Sos
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('so_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['sos'] = $this->model_so->get($filter, $field, $this->limit_page, $offset);
		$this->data['so_counts'] = $this->model_so->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/so/index/',
			'total_rows'   => $this->model_so->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Safety Observation List');
		$this->render('backend/standart/administrator/so/so_list', $this->data);
	}
	
	/**
	* Add new sos
	*
	*/
	public function add()
	{
		$this->is_allowed('so_add');

		$this->template->title('Safety Observation New');
		$this->render('backend/standart/administrator/so/so_add', $this->data);
	}

	/**
	* Add New Sos
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('so_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('lab', 'Lab', 'trim|required');
		$this->form_validation->set_rules('cw', 'Cw', 'trim|required');
		$this->form_validation->set_rules('hs', 'Hs', 'trim|required');
		$this->form_validation->set_rules('fg', 'Fg', 'trim|required');
		$this->form_validation->set_rules('pdi', 'Pdi', 'trim|required');
		$this->form_validation->set_rules('eng', 'Eng', 'trim|required');
		$this->form_validation->set_rules('hrd', 'Hrd', 'trim|required');
		$this->form_validation->set_rules('whs', 'Whs', 'trim|required');
		$this->form_validation->set_rules('prj', 'Prj', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'lab' => $this->input->post('lab'),
				'cw' => $this->input->post('cw'),
				'hs' => $this->input->post('hs'),
				'fg' => $this->input->post('fg'),
				'pdi' => $this->input->post('pdi'),
				'eng' => $this->input->post('eng'),
				'hrd' => $this->input->post('hrd'),
				'whs' => $this->input->post('whs'),
				'prj' => $this->input->post('prj'),
				'user_id' => get_user_data('id'),			];

			
			$save_so = $this->model_so->store($save_data);
            

			if ($save_so) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_so;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/so/edit/' . $save_so, 'Edit So'),
						anchor('administrator/so', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/so/edit/' . $save_so, 'Edit So')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/so');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/so');
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
	* Update view Sos
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('so_update');

		$this->data['so'] = $this->model_so->find($id);

		$this->template->title('Safety Observation Update');
		$this->render('backend/standart/administrator/so/so_update', $this->data);
	}

	/**
	* Update Sos
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('so_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('lab', 'Lab', 'trim|required');
		$this->form_validation->set_rules('cw', 'Cw', 'trim|required');
		$this->form_validation->set_rules('hs', 'Hs', 'trim|required');
		$this->form_validation->set_rules('fg', 'Fg', 'trim|required');
		$this->form_validation->set_rules('pdi', 'Pdi', 'trim|required');
		$this->form_validation->set_rules('eng', 'Eng', 'trim|required');
		$this->form_validation->set_rules('hrd', 'Hrd', 'trim|required');
		$this->form_validation->set_rules('whs', 'Whs', 'trim|required');
		$this->form_validation->set_rules('prj', 'Prj', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'lab' => $this->input->post('lab'),
				'cw' => $this->input->post('cw'),
				'hs' => $this->input->post('hs'),
				'fg' => $this->input->post('fg'),
				'pdi' => $this->input->post('pdi'),
				'eng' => $this->input->post('eng'),
				'hrd' => $this->input->post('hrd'),
				'whs' => $this->input->post('whs'),
				'prj' => $this->input->post('prj'),
				'user_id' => get_user_data('id'),			];

			
			$save_so = $this->model_so->change($id, $save_data);

			if ($save_so) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/so', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/so');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/so');
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
	* delete Sos
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('so_delete');

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
            set_message(cclang('has_been_deleted', 'so'), 'success');
        } else {
            set_message(cclang('error_delete', 'so'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Sos
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('so_view');

		$this->data['so'] = $this->model_so->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Safety Observation Detail');
		$this->render('backend/standart/administrator/so/so_view', $this->data);
	}
	
	/**
	* delete Sos
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$so = $this->model_so->find($id);

		
		
		return $this->model_so->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('so_export');

		$this->model_so->export('so', 'so');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('so_export');

		$this->model_so->pdf('so', 'so');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('so_export');

		$table = $title = 'so';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_so->find($id);
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
					$lab = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$cw = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$hs = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$fg = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$pdi = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$eng = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$hrd = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$whs = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$prj = $worksheet->getCellByColumnAndRow(9, $row)->getValue();

					$datetime = PHPExcel_Shared_Date::ExcelToPHP($date); //unix

					$temp_data[] = array(
						'date'	=> gmdate("Y-m-d", $datetime),
						'lab'	=> $lab,
						'cw'	=> $cw,
						'hs'	=> $hs,
						'pdi'	=> $pdi,
						'fg'	=> $fg,
						'eng'	=> $eng,
						'hrd'	=> $hrd,
						'whs'	=> $whs,
						'prj'	=> $prj,
						'user_id'	=> get_user_data('id'),
					); 	
				}
			}
			$insert = $this->model_so->insert($temp_data);
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


/* End of file so.php */
/* Location: ./application/controllers/administrator/So.php */