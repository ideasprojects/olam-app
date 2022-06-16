<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH . 'libraries/Excel/PHPExcel.php');

/**
*| --------------------------------------------------------------------------
*| Cc Controller
*| --------------------------------------------------------------------------
*| Cc site
*|
*/
class Cc extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_cc');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Ccs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('cc_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['ccs'] = $this->model_cc->get($filter, $field, $this->limit_page, $offset);
		$this->data['cc_counts'] = $this->model_cc->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/cc/index/',
			'total_rows'   => $this->model_cc->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Customer Complaint List');
		$this->render('backend/standart/administrator/cc/cc_list', $this->data);
	}
	
	/**
	* Add new ccs
	*
	*/
	public function add()
	{
		$this->is_allowed('cc_add');

		$this->template->title('Customer Complaint New');
		$this->render('backend/standart/administrator/cc/cc_add', $this->data);
	}

	/**
	* Add New Ccs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('cc_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('sum_customer_complaint', 'Sum Customer Complaint', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'sum_customer_complaint' => $this->input->post('sum_customer_complaint'),
				'user_id' => get_user_data('id'),			];

			
			$save_cc = $this->model_cc->store($save_data);
            

			if ($save_cc) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_cc;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/cc/edit/' . $save_cc, 'Edit Cc'),
						anchor('administrator/cc', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/cc/edit/' . $save_cc, 'Edit Cc')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/cc');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/cc');
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
	* Update view Ccs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('cc_update');

		$this->data['cc'] = $this->model_cc->find($id);

		$this->template->title('Customer Complaint Update');
		$this->render('backend/standart/administrator/cc/cc_update', $this->data);
	}

	/**
	* Update Ccs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('cc_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('sum_customer_complaint', 'Sum Customer Complaint', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'sum_customer_complaint' => $this->input->post('sum_customer_complaint'),
				'user_id' => get_user_data('id'),			];

			
			$save_cc = $this->model_cc->change($id, $save_data);

			if ($save_cc) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/cc', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/cc');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/cc');
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
	* delete Ccs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('cc_delete');

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
            set_message(cclang('has_been_deleted', 'cc'), 'success');
        } else {
            set_message(cclang('error_delete', 'cc'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Ccs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('cc_view');

		$this->data['cc'] = $this->model_cc->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Customer Complaint Detail');
		$this->render('backend/standart/administrator/cc/cc_view', $this->data);
	}
	
	/**
	* delete Ccs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$cc = $this->model_cc->find($id);

		
		
		return $this->model_cc->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('cc_export');

		$this->model_cc->export('cc', 'cc');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('cc_export');

		$this->model_cc->pdf('cc', 'cc');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('cc_export');

		$table = $title = 'cc';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_cc->find($id);
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
					$sum_customer_complaint = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

					$datetime = PHPExcel_Shared_Date::ExcelToPHP($date); //unix

					$temp_data[] = array(
						'date'	=> gmdate("Y-m-d", $datetime),
						'sum_customer_complaint'	=> $sum_customer_complaint,
						'user_id'	=> get_user_data('id'),
					); 	
				}
			}
			$insert = $this->model_cc->insert($temp_data);
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


/* End of file cc.php */
/* Location: ./application/controllers/administrator/Cc.php */