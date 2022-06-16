<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Aauth Users Department Controller
*| --------------------------------------------------------------------------
*| Aauth Users Department site
*|
*/
class Aauth_users_department extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_aauth_users_department');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Aauth Users Departments
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('aauth_users_department_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['aauth_users_departments'] = $this->model_aauth_users_department->get($filter, $field, $this->limit_page, $offset);
		$this->data['aauth_users_department_counts'] = $this->model_aauth_users_department->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/aauth_users_department/index/',
			'total_rows'   => $this->model_aauth_users_department->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('User Department List');
		$this->render('backend/standart/administrator/aauth_users_department/aauth_users_department_list', $this->data);
	}
	
	/**
	* Add new aauth_users_departments
	*
	*/
	public function add()
	{
		$this->is_allowed('aauth_users_department_add');

		$this->template->title('User Department New');
		$this->render('backend/standart/administrator/aauth_users_department/aauth_users_department_add', $this->data);
	}

	/**
	* Add New Aauth Users Departments
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('aauth_users_department_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
			];

			
			$save_aauth_users_department = $this->model_aauth_users_department->store($save_data);
            

			if ($save_aauth_users_department) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_aauth_users_department;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/aauth_users_department/edit/' . $save_aauth_users_department, 'Edit Aauth Users Department'),
						anchor('administrator/aauth_users_department', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/aauth_users_department/edit/' . $save_aauth_users_department, 'Edit Aauth Users Department')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/aauth_users_department');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/aauth_users_department');
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
	* Update view Aauth Users Departments
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('aauth_users_department_update');

		$this->data['aauth_users_department'] = $this->model_aauth_users_department->find($id);

		$this->template->title('User Department Update');
		$this->render('backend/standart/administrator/aauth_users_department/aauth_users_department_update', $this->data);
	}

	/**
	* Update Aauth Users Departments
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('aauth_users_department_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
			];

			
			$save_aauth_users_department = $this->model_aauth_users_department->change($id, $save_data);

			if ($save_aauth_users_department) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/aauth_users_department', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/aauth_users_department');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/aauth_users_department');
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
	* delete Aauth Users Departments
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('aauth_users_department_delete');

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
            set_message(cclang('has_been_deleted', 'aauth_users_department'), 'success');
        } else {
            set_message(cclang('error_delete', 'aauth_users_department'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Aauth Users Departments
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('aauth_users_department_view');

		$this->data['aauth_users_department'] = $this->model_aauth_users_department->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('User Department Detail');
		$this->render('backend/standart/administrator/aauth_users_department/aauth_users_department_view', $this->data);
	}
	
	/**
	* delete Aauth Users Departments
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$aauth_users_department = $this->model_aauth_users_department->find($id);

		
		
		return $this->model_aauth_users_department->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('aauth_users_department_export');

		$this->model_aauth_users_department->export('aauth_users_department', 'aauth_users_department');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('aauth_users_department_export');

		$this->model_aauth_users_department->pdf('aauth_users_department', 'aauth_users_department');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('aauth_users_department_export');

		$table = $title = 'aauth_users_department';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_aauth_users_department->find($id);
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

	
}


/* End of file aauth_users_department.php */
/* Location: ./application/controllers/administrator/Aauth Users Department.php */