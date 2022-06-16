<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_trx_pd_p1 extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'trx_pd_all';
    private $field_search   = ['date', 'sum', 'target'];

    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
         );

        parent::__construct($config);
    }

    public function count_all($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "trx_pd_all.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "trx_pd_all.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "trx_pd_all.".$field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "trx_pd_all.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "trx_pd_all.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "trx_pd_all.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('trx_pd_all.'.$this->primary_key, "DESC");
        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir  = $this->input->get('tanggal_akhir');
        
        $this->db->select('trx_pd_all.*');
        $this->db->where('trx_pd_all.data_source', 'powder_plant_1');
        if($tanggal_awal) {
        $this->db->where('trx_pd_all.date >=', $tanggal_awal);
        }
        if($tanggal_akhir) {
        $this->db->where('trx_pd_all.date <=', $tanggal_akhir);
        }


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            $this->db->where($this->table_name.'.user_id', get_user_data('id'));
        }

        return $this;
    }

    public function insert($data){
        $insert = $this->db->insert_batch('trx_pd_all', $data);
        if($insert){
            return true;
        }
    }

}

/* End of file Model_trx_pd_p1.php */
/* Location: ./application/models/Model_trx_pd_p1.php */