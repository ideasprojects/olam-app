<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dashboard Controller
*| --------------------------------------------------------------------------
*| For see your board
*|
*/
class Dashboard extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}
		$data = [];

		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir 	= $this->input->get('tanggal_akhir');
		if($tanggal_awal){
         $this->data['default_awal'] =date("Y-m-d", strtotime($tanggal_awal));
		}else{
			$this->data['default_awal'] = date("Y-m-d", strtotime("-30 day"));
		}
		if($tanggal_akhir){
      	$this->data['default_akhir'] =date("Y-m-d", strtotime($tanggal_akhir));
		}else{
		$this->data['default_akhir'] = date("Y-m-d", strtotime("-1 day"));			
		}

		$data_pd_all ="SELECT id, date, sum, target, AVG(target) as avg_target, data_source FROM `trx_pd_all` WHERE(date BETWEEN '".$this->data['default_awal']."' AND '".$this->data['default_akhir']."') GROUP BY date;";
        $this->data['data_pd_all'] = $this->db->query($data_pd_all)->result();

		$data_pd_p1 ="SELECT id, date, sum, target, AVG(target) as avg_target, data_source FROM `trx_pd_all` WHERE data_source = 'powder_plant_1' AND (date BETWEEN '".$this->data['default_awal']."' AND '".$this->data['default_akhir']."') GROUP BY date;";
        $this->data['data_pd_p1'] = $this->db->query($data_pd_p1)->result();

        $data_pd_p2 ="SELECT id, date, sum, target, AVG(target) as avg_target, data_source FROM `trx_pd_all`WHERE data_source = 'powder_plant_2' AND (date BETWEEN '".$this->data['default_awal']."' AND '".$this->data['default_akhir']."') GROUP BY date;";
        $this->data['data_pd_p2'] = $this->db->query($data_pd_p2)->result();

        $data_pd_p3 ="SELECT id, date, sum, target, AVG(target) as avg_target, data_source FROM `trx_pd_all` WHERE data_source = 'powder_plant_3' AND (date BETWEEN '".$this->data['default_awal']."' AND '".$this->data['default_akhir']."') GROUP BY date;";
        $this->data['data_pd_p3'] = $this->db->query($data_pd_p3)->result();

		$data_ib ="SELECT id, date, sum, target, AVG(target) as avg_target FROM `trx_ib` WHERE (date BETWEEN '".$this->data['default_awal']."' AND '".$this->data['default_akhir']."') GROUP BY date;";
        $this->data['data_ib'] = $this->db->query($data_ib)->result();

        $data_qbd ="SELECT id, date, deo_ffa, deo_bci, deo_ai, deo_red, deo_yellow, deo_blue, deo_neutral, raw_ffa, raw_bci, raw_ai, raw_red, raw_yellow, raw_blue, raw_neutral FROM `trx_qbd` WHERE (date BETWEEN '".$this->data['default_awal']."' AND '".$this->data['default_akhir']."') GROUP BY date;";
        $this->data['data_qbd'] = $this->db->query($data_qbd)->result();

        $trx_pd_all ="SELECT id, date, sum, target, AVG(target) as avg_target FROM `trx_pd_all`WHERE (date BETWEEN '".$this->data['default_awal']."' AND '".$this->data['default_akhir']."') GROUP BY date;";
        $this->data['trx_pd_all'] = $this->db->query($trx_pd_all)->result();

		$this->render('backend/standart/dashboard', $this->data);
	}

	public function chart()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/','refresh');
		}

		$data = [];
		$this->render('backend/standart/chart', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */