<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_patrol_5m extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'trx_patrol_5m';
    private $field_search   = ['date', 'gerbang_masuk', 'office', 'fasilitas_umum', 'produksi_upstream', 'produksi_downstream', 'laboraturium', 'gudang', 'utility'];

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
                    $where .= "trx_patrol_5m.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "trx_patrol_5m.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "trx_patrol_5m.".$field . " LIKE '%" . $q . "%' )";
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
                    $where .= "trx_patrol_5m.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "trx_patrol_5m.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "trx_patrol_5m.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
                $this->db->order_by('trx_patrol_5m.'.$this->primary_key, "DESC");
                $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        
        $this->db->select('trx_patrol_5m.*');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            $this->db->where($this->table_name.'.user_id', get_user_data('id'));
        }

        return $this;
    }

    public function insert($data){
        $insert = $this->db->insert_batch('trx_patrol_5m', $data);
        if($insert){
            return true;
        }
    }

}

/* End of file Model_patrol_5m.php */
/* Location: ./application/models/Model_patrol_5m.php */