<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Demo Table Controller
*| --------------------------------------------------------------------------
*| Demo Table site
*|
*/
class Demo_table extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_demo_table');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Demo Tables
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('demo_table_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['demo_tables'] = $this->model_demo_table->get($filter, $field, $this->limit_page, $offset);
		$this->data['demo_table_counts'] = $this->model_demo_table->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/demo_table/index/',
			'total_rows'   => $this->model_demo_table->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Demo-table List');
		$this->render('backend/standart/administrator/demo_table/demo_table_list', $this->data);
	}
	
	/**
	* Add new demo_tables
	*
	*/
	public function add()
	{
		$this->is_allowed('demo_table_add');

		$this->template->title('Demo-table New');
		$this->render('backend/standart/administrator/demo_table/demo_table_add', $this->data);
	}

	/**
	* Add New Demo Tables
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('demo_table_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
			];

			
			$save_demo_table = $this->model_demo_table->store($save_data);
            

			if ($save_demo_table) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_demo_table;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/demo_table/edit/' . $save_demo_table, 'Edit Demo Table'),
						anchor('administrator/demo_table', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/demo_table/edit/' . $save_demo_table, 'Edit Demo Table')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/demo_table');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/demo_table');
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
	* Update view Demo Tables
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('demo_table_update');

		$this->data['demo_table'] = $this->model_demo_table->find($id);

		$this->template->title('Demo-table Update');
		$this->render('backend/standart/administrator/demo_table/demo_table_update', $this->data);
	}

	/**
	* Update Demo Tables
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('demo_table_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
			];

			
			$save_demo_table = $this->model_demo_table->change($id, $save_data);

			if ($save_demo_table) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/demo_table', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/demo_table');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/demo_table');
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
	* delete Demo Tables
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('demo_table_delete');

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
            set_message(cclang('has_been_deleted', 'demo_table'), 'success');
        } else {
            set_message(cclang('error_delete', 'demo_table'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Demo Tables
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('demo_table_view');

		$this->data['demo_table'] = $this->model_demo_table->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Demo-table Detail');
		$this->render('backend/standart/administrator/demo_table/demo_table_view', $this->data);
	}
	
	/**
	* delete Demo Tables
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$demo_table = $this->model_demo_table->find($id);

		
		
		return $this->model_demo_table->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('demo_table_export');

		$this->model_demo_table->export('demo_table', 'demo_table');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('demo_table_export');

		$this->model_demo_table->pdf('demo_table', 'demo_table');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('demo_table_export');

		$table = $title = 'demo_table';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_demo_table->find($id);
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


/* End of file demo_table.php */
/* Location: ./application/controllers/administrator/Demo Table.php */