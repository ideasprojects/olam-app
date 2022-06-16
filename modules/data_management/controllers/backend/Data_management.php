<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Management Controller
*| --------------------------------------------------------------------------
*| Data Management site
*|
*/
class Data_management extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_data_management');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Data Managements
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('data_management_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_managements'] = $this->model_data_management->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_management_counts'] = $this->model_data_management->count_all($filter, $field);

		$this->data['get_data_management'] = $this->model_data_management->data_management();

		$config = [
			'base_url'     => 'administrator/data_management/index/',
			'total_rows'   => $this->model_data_management->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Management List');
		$this->render('backend/standart/administrator/data_management/data_management_list', $this->data);
	}
	
	/**
	* Add new data_managements
	*
	*/
	public function add()
	{
		$this->is_allowed('data_management_add');

		$this->template->title('Data Management New');
		$this->render('backend/standart/administrator/data_management/data_management_add', $this->data);
	}

	/**
	* Add New Data Managements
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('data_management_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
			];

			
			$save_data_management = $this->model_data_management->store($save_data);
            

			if ($save_data_management) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_management;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_management/edit/' . $save_data_management, 'Edit Data Management'),
						anchor('administrator/data_management', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_management/edit/' . $save_data_management, 'Edit Data Management')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_management');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_management');
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
	* Update view Data Managements
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('data_management_update');

		$this->data['data_management'] = $this->model_data_management->find($id);

		$this->template->title('Data Management Update');
		$this->render('backend/standart/administrator/data_management/data_management_update', $this->data);
	}

	/**
	* Update Data Managements
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('data_management_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
			];

			
			$save_data_management = $this->model_data_management->change($id, $save_data);

			if ($save_data_management) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_management', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_management');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_management');
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
	* delete Data Managements
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('data_management_delete');

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
            set_message(cclang('has_been_deleted', 'data_management'), 'success');
        } else {
            set_message(cclang('error_delete', 'data_management'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Data Managements
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('data_management_view');

		$this->data['data_management'] = $this->model_data_management->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Management Detail');
		$this->render('backend/standart/administrator/data_management/data_management_view', $this->data);
	}
	
	/**
	* delete Data Managements
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$data_management = $this->model_data_management->find($id);

		
		
		return $this->model_data_management->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('data_management_export');

		$this->model_data_management->export('data_management', 'data_management');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('data_management_export');

		$this->model_data_management->pdf('data_management', 'data_management');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('data_management_export');

		$table = $title = 'data_management';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_data_management->find($id);
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

	public function all($offset = 0)
	{
		$this->is_allowed('data_management_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_managements'] = $this->model_data_management->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_management_counts'] = $this->model_data_management->count_all($filter, $field);

		$this->data['get_data_management'] = $this->model_data_management->data_management();

		$config = [
			'base_url'     => 'administrator/data_management/index/',
			'total_rows'   => $this->model_data_management->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Management List');
		$this->render('backend/standart/administrator/data_management/data_management_all', $this->data);
	}

	public function pd($offset = 0)
	{
		$this->is_allowed('data_management_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_managements'] = $this->model_data_management->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_management_counts'] = $this->model_data_management->count_all($filter, $field);

		$this->data['get_data_management'] = $this->model_data_management->data_management_pd();

		$config = [
			'base_url'     => 'administrator/data_management/index/',
			'total_rows'   => $this->model_data_management->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Management List');
		$this->render('backend/standart/administrator/data_management/data_management_pd', $this->data);
	}

	public function ib($offset = 0)
	{
		$this->is_allowed('data_management_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_managements'] = $this->model_data_management->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_management_counts'] = $this->model_data_management->count_all($filter, $field);

		$this->data['get_data_management'] = $this->model_data_management->data_management_ib();

		$config = [
			'base_url'     => 'administrator/data_management/index/',
			'total_rows'   => $this->model_data_management->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Management List');
		$this->render('backend/standart/administrator/data_management/data_management_ib', $this->data);
	}

	public function qbd($offset = 0)
	{
		$this->is_allowed('data_management_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_managements'] = $this->model_data_management->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_management_counts'] = $this->model_data_management->count_all($filter, $field);

		$this->data['get_data_management'] = $this->model_data_management->data_management_qbd();

		$config = [
			'base_url'     => 'administrator/data_management/index/',
			'total_rows'   => $this->model_data_management->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Management List');
		$this->render('backend/standart/administrator/data_management/data_management_qbd', $this->data);
	}

	
}


/* End of file data_management.php */
/* Location: ./application/controllers/administrator/Data Management.php */