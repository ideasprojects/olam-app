<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH . 'libraries/Excel/PHPExcel.php');

/**
*| --------------------------------------------------------------------------
*| Trx Pd P2 Controller
*| --------------------------------------------------------------------------
*| Trx Pd P2 site
*|
*/
class Trx_pd_p2 extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_trx_pd_p2');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Trx Pd P2s
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('trx_pd_p2_list');

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

		$this->data['trx_pd_p2s'] = $this->model_trx_pd_p2->get($filter, $field, $this->limit_page, $offset);
		$this->data['trx_pd_p2_counts'] = $this->model_trx_pd_p2->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/trx_pd_p2/index/',
			'total_rows'   => $this->model_trx_pd_p2->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Powder Plant 2 List');
		$this->render('backend/standart/administrator/trx_pd_p2/trx_pd_p2_list', $this->data);
	}
	
	/**
	* Add new trx_pd_p2s
	*
	*/
	public function add()
	{
		$this->is_allowed('trx_pd_p2_add');

		$this->template->title('Powder Plant 2 New');
		$this->render('backend/standart/administrator/trx_pd_p2/trx_pd_p2_add', $this->data);
	}

	/**
	* Add New Trx Pd P2s
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('trx_pd_p2_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('sum', 'Sum', 'trim|required');
		$this->form_validation->set_rules('target', 'Target', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'sum' => $this->input->post('sum'),
				'target' => $this->input->post('target'),
				'user_id' => get_user_data('id'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
				'input_type' => 'input',
				'data_source' => 'powder_plant_2',
			];

			
			$save_trx_pd_p2 = $this->model_trx_pd_p2->store($save_data);
            

			if ($save_trx_pd_p2) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_trx_pd_p2;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/trx_pd_p2/edit/' . $save_trx_pd_p2, 'Edit Trx Pd P2'),
						anchor('administrator/trx_pd_p2', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/trx_pd_p2/edit/' . $save_trx_pd_p2, 'Edit Trx Pd P2')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/trx_pd_p2');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/trx_pd_p2');
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
	* Update view Trx Pd P2s
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('trx_pd_p2_update');

		$this->data['trx_pd_p2'] = $this->model_trx_pd_p2->find($id);

		$this->template->title('Powder Plant 2 Update');
		$this->render('backend/standart/administrator/trx_pd_p2/trx_pd_p2_update', $this->data);
	}

	/**
	* Update Trx Pd P2s
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('trx_pd_p2_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('sum', 'Sum', 'trim|required');
		$this->form_validation->set_rules('target', 'Target', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'sum' => $this->input->post('sum'),
				'target' => $this->input->post('target'),
				'user_id' => get_user_data('id'),
				'updated_at' => date('Y-m-d H:i:s'),
				'input_type' => 'input',
				'data_source' => 'powder_plant_2',
			];

			
			$save_trx_pd_p2 = $this->model_trx_pd_p2->change($id, $save_data);

			if ($save_trx_pd_p2) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/trx_pd_p2', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/trx_pd_p2');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/trx_pd_p2');
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
	* delete Trx Pd P2s
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('trx_pd_p2_delete');

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
            set_message(cclang('has_been_deleted', 'trx_pd_p2'), 'success');
        } else {
            set_message(cclang('error_delete', 'trx_pd_p2'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Trx Pd P2s
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('trx_pd_p2_view');

		$this->data['trx_pd_p2'] = $this->model_trx_pd_p2->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Powder Plant 2 Detail');
		$this->render('backend/standart/administrator/trx_pd_p2/trx_pd_p2_view', $this->data);
	}
	
	/**
	* delete Trx Pd P2s
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$trx_pd_p2 = $this->model_trx_pd_p2->find($id);

		
		
		return $this->model_trx_pd_p2->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('trx_pd_p2_export');

		$this->model_trx_pd_p2->export('trx_pd_p2', 'trx_pd_p2');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('trx_pd_p2_export');

		$this->model_trx_pd_p2->pdf('trx_pd_p2', 'trx_pd_p2');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('trx_pd_p2_export');

		$table = $title = 'trx_pd_p2';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_trx_pd_p2->find($id);
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
						'data_source' => 'powder_plant_2',
					); 	
				}
			}
			$insert = $this->model_trx_pd_p2->insert($temp_data);
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


/* End of file trx_pd_p2.php */
/* Location: ./application/controllers/administrator/Trx Pd P2.php */