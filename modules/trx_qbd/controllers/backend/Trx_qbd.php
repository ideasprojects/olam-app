<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH . 'libraries/Excel/PHPExcel.php');

/**
*| --------------------------------------------------------------------------
*| Trx Qbd Controller
*| --------------------------------------------------------------------------
*| Trx Qbd site
*|
*/
class Trx_qbd extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_trx_qbd');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Trx Qbds
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('trx_qbd_list');

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

		$this->data['trx_qbds'] = $this->model_trx_qbd->get($filter, $field, $this->limit_page, $offset);
		$this->data['trx_qbd_counts'] = $this->model_trx_qbd->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/trx_qbd/index/',
			'total_rows'   => $this->model_trx_qbd->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Quality Butter DEO List');
		$this->render('backend/standart/administrator/trx_qbd/trx_qbd_list', $this->data);
	}
	
	/**
	* Add new trx_qbds
	*
	*/
	public function add()
	{
		$this->is_allowed('trx_qbd_add');

		$this->template->title('Quality Butter DEO New');
		$this->render('backend/standart/administrator/trx_qbd/trx_qbd_add', $this->data);
	}

	/**
	* Add New Trx Qbds
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('trx_qbd_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'deo_ffa' => $this->input->post('deo_ffa'),
				'deo_bci' => $this->input->post('deo_bci'),
				'deo_ai' => $this->input->post('deo_ai'),
				'deo_red' => $this->input->post('deo_red'),
				'deo_yellow' => $this->input->post('deo_yellow'),
				'deo_blue' => $this->input->post('deo_blue'),
				'deo_neutral' => $this->input->post('deo_neutral'),
				'raw_ffa' => $this->input->post('raw_ffa'),
				'raw_bci' => $this->input->post('raw_bci'),
				'raw_ai' => $this->input->post('raw_ai'),
				'raw_red' => $this->input->post('raw_red'),
				'raw_yellow' => $this->input->post('raw_yellow'),
				'raw_blue' => $this->input->post('raw_blue'),
				'raw_neutral' => $this->input->post('raw_neutral'),
				'user_id' => get_user_data('id'),				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
				'input_type' => 'input',
			];

			
			$save_trx_qbd = $this->model_trx_qbd->store($save_data);
            

			if ($save_trx_qbd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_trx_qbd;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/trx_qbd/edit/' . $save_trx_qbd, 'Edit Trx Qbd'),
						anchor('administrator/trx_qbd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/trx_qbd/edit/' . $save_trx_qbd, 'Edit Trx Qbd')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/trx_qbd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/trx_qbd');
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
	* Update view Trx Qbds
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('trx_qbd_update');

		$this->data['trx_qbd'] = $this->model_trx_qbd->find($id);

		$this->template->title('Quality Butter DEO Update');
		$this->render('backend/standart/administrator/trx_qbd/trx_qbd_update', $this->data);
	}

	/**
	* Update Trx Qbds
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('trx_qbd_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'deo_ffa' => $this->input->post('deo_ffa'),
				'deo_bci' => $this->input->post('deo_bci'),
				'deo_ai' => $this->input->post('deo_ai'),
				'deo_red' => $this->input->post('deo_red'),
				'deo_yellow' => $this->input->post('deo_yellow'),
				'deo_blue' => $this->input->post('deo_blue'),
				'deo_neutral' => $this->input->post('deo_neutral'),
				'raw_ffa' => $this->input->post('raw_ffa'),
				'raw_bci' => $this->input->post('raw_bci'),
				'raw_ai' => $this->input->post('raw_ai'),
				'raw_red' => $this->input->post('raw_red'),
				'raw_yellow' => $this->input->post('raw_yellow'),
				'raw_blue' => $this->input->post('raw_blue'),
				'raw_neutral' => $this->input->post('raw_neutral'),
				'user_id' => get_user_data('id'),				'updated_at' => date('Y-m-d H:i:s'),
				'input_type' => 'input',
			];

			
			$save_trx_qbd = $this->model_trx_qbd->change($id, $save_data);

			if ($save_trx_qbd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/trx_qbd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/trx_qbd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/trx_qbd');
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
	* delete Trx Qbds
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('trx_qbd_delete');

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
            set_message(cclang('has_been_deleted', 'trx_qbd'), 'success');
        } else {
            set_message(cclang('error_delete', 'trx_qbd'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Trx Qbds
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('trx_qbd_view');

		$this->data['trx_qbd'] = $this->model_trx_qbd->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Quality Butter DEO Detail');
		$this->render('backend/standart/administrator/trx_qbd/trx_qbd_view', $this->data);
	}
	
	/**
	* delete Trx Qbds
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$trx_qbd = $this->model_trx_qbd->find($id);

		
		
		return $this->model_trx_qbd->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('trx_qbd_export');

		$this->model_trx_qbd->export('trx_qbd', 'trx_qbd');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('trx_qbd_export');

		$this->model_trx_qbd->pdf('trx_qbd', 'trx_qbd');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('trx_qbd_export');

		$table = $title = 'trx_qbd';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_trx_qbd->find($id);
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
					$deo_ffa = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$deo_bci = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$deo_ai = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$deo_red = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$deo_yellow = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$deo_blue = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$deo_neutral = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$raw_ffa = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$raw_bci = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$raw_ai = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$raw_red = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$raw_yellow = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$raw_blue = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$raw_neutral = $worksheet->getCellByColumnAndRow(14, $row)->getValue();

					$datetime = PHPExcel_Shared_Date::ExcelToPHP($date);

					$temp_data[] = array(
						'date'	=> gmdate("Y-m-d", $datetime),
						'deo_ffa'	=> $deo_ffa,
						'deo_bci'	=> $deo_bci,
						'deo_ai'	=> $deo_ai,
						'deo_red'	=> $deo_red,
						'deo_yellow'	=> $deo_yellow,
						'deo_blue'	=> $deo_blue,
						'deo_neutral'	=> $deo_neutral,
						'raw_ffa'	=> $raw_ffa,
						'raw_bci'	=> $raw_bci,
						'raw_ai'	=> $raw_ai,
						'raw_red'	=> $raw_red,
						'raw_yellow'	=> $raw_yellow,
						'raw_blue'	=> $raw_blue,
						'raw_neutral'	=> $raw_neutral,
						'user_id'	=> get_user_data('id'),
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
						'input_type' => 'excel',
					); 	
				}
			}
			$insert = $this->model_trx_qbd->insert($temp_data);
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


/* End of file trx_qbd.php */
/* Location: ./application/controllers/administrator/Trx Qbd.php */