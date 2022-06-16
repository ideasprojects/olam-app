<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH . 'libraries/Excel/PHPExcel.php');

/**
*| --------------------------------------------------------------------------
*| Patrol 5m Controller
*| --------------------------------------------------------------------------
*| Patrol 5m site
*|
*/
class Patrol_5m extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_patrol_5m');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Patrol 5ms
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('patrol_5m_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['patrol_5ms'] = $this->model_patrol_5m->get($filter, $field, $this->limit_page, $offset);
		$this->data['patrol_5m_counts'] = $this->model_patrol_5m->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/patrol_5m/index/',
			'total_rows'   => $this->model_patrol_5m->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Patrol 5M List');
		$this->render('backend/standart/administrator/patrol_5m/patrol_5m_list', $this->data);
	}
	
	/**
	* Add new patrol_5ms
	*
	*/
	public function add()
	{
		$this->is_allowed('patrol_5m_add');

		$this->template->title('Patrol 5M New');
		$this->render('backend/standart/administrator/patrol_5m/patrol_5m_add', $this->data);
	}

	/**
	* Add New Patrol 5ms
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('patrol_5m_add', false)) {
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
				'gerbang_masuk' => $this->input->post('gerbang_masuk'),
				'office' => $this->input->post('office'),
				'fasilitas_umum' => $this->input->post('fasilitas_umum'),
				'produksi_upstream' => $this->input->post('produksi_upstream'),
				'produksi_downstream' => $this->input->post('produksi_downstream'),
				'laboraturium' => $this->input->post('laboraturium'),
				'gudang' => $this->input->post('gudang'),
				'utility' => $this->input->post('utility'),
				'user_id' => get_user_data('id'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
				];

			
			$save_patrol_5m = $this->model_patrol_5m->store($save_data);
            

			if ($save_patrol_5m) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_patrol_5m;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/patrol_5m/edit/' . $save_patrol_5m, 'Edit Patrol 5m'),
						anchor('administrator/patrol_5m', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/patrol_5m/edit/' . $save_patrol_5m, 'Edit Patrol 5m')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/patrol_5m');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/patrol_5m');
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
	* Update view Patrol 5ms
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('patrol_5m_update');

		$this->data['patrol_5m'] = $this->model_patrol_5m->find($id);

		$this->template->title('Patrol 5M Update');
		$this->render('backend/standart/administrator/patrol_5m/patrol_5m_update', $this->data);
	}

	/**
	* Update Patrol 5ms
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('patrol_5m_update', false)) {
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
				'gerbang_masuk' => $this->input->post('gerbang_masuk'),
				'office' => $this->input->post('office'),
				'fasilitas_umum' => $this->input->post('fasilitas_umum'),
				'produksi_upstream' => $this->input->post('produksi_upstream'),
				'produksi_downstream' => $this->input->post('produksi_downstream'),
				'laboraturium' => $this->input->post('laboraturium'),
				'gudang' => $this->input->post('gudang'),
				'utility' => $this->input->post('utility'),
				'user_id' => get_user_data('id'),
				'updated_at' => date('Y-m-d H:i:s')
			];

			
			$save_patrol_5m = $this->model_patrol_5m->change($id, $save_data);

			if ($save_patrol_5m) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/patrol_5m', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/patrol_5m');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/patrol_5m');
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
	* delete Patrol 5ms
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('patrol_5m_delete');

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
            set_message(cclang('has_been_deleted', 'patrol_5m'), 'success');
        } else {
            set_message(cclang('error_delete', 'patrol_5m'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Patrol 5ms
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('patrol_5m_view');

		$this->data['patrol_5m'] = $this->model_patrol_5m->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Patrol 5M Detail');
		$this->render('backend/standart/administrator/patrol_5m/patrol_5m_view', $this->data);
	}
	
	/**
	* delete Patrol 5ms
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$patrol_5m = $this->model_patrol_5m->find($id);

		
		
		return $this->model_patrol_5m->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('patrol_5m_export');

		$this->model_patrol_5m->export('patrol_5m', 'patrol_5m');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('patrol_5m_export');

		$this->model_patrol_5m->pdf('patrol_5m', 'patrol_5m');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('patrol_5m_export');

		$table = $title = 'patrol_5m';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_patrol_5m->find($id);
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
					$gerbang_masuk = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$office = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$fasilitas_umum = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$produksi_downstream = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$produksi_upstream = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$laboraturium = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$gudang = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$utility = $worksheet->getCellByColumnAndRow(8, $row)->getValue();

					// $field1= $objWorksheet->getCellByColumnAndRow(0,$i)->getFormattedValue(); //Excel Column 3
					$datetime = PHPExcel_Shared_Date::ExcelToPHP($date); //unix
					// echo $field1= gmdate("Y-m-d", $date); //date

					$temp_data[] = array(
						'date'	=> gmdate("Y-m-d", $datetime),
						'gerbang_masuk'	=> $gerbang_masuk,
						'office'	=> $office,
						'fasilitas_umum'	=> $fasilitas_umum,
						'produksi_upstream'	=> $produksi_upstream,
						'produksi_downstream'	=> $produksi_downstream,
						'laboraturium'	=> $laboraturium,
						'gudang'	=> $gudang,
						'utility'	=> $utility,
						'user_id'	=> get_user_data('id'),
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')
					); 	
				}
			}
			// $this->load->model('model_patrol');
			$insert = $this->model_patrol_5m->insert($temp_data);
			if($insert){
				// $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				set_message('Success', 'success');
				// redirect($_SERVER['HTTP_REFERER']);
			}else{
				// $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
            	set_message('Error', 'error');
				// redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}
}


/* End of file patrol_5m.php */
/* Location: ./application/controllers/administrator/Patrol 5m.php */