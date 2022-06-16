<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data_management extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'data_management';
    private $field_search   = ['name'];

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
                    $where .= "data_management.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "data_management.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "data_management.".$field . " LIKE '%" . $q . "%' )";
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
                    $where .= "data_management.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "data_management.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "data_management.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
                $this->db->order_by('data_management.'.$this->primary_key, "DESC");
                $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        
        $this->db->select('data_management.*');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

    public function data_management() {
        $query = $this->db->query("SELECT 'Powder Plant 1' as source_data, COUNT(distinct trx_pd_all.id) as total_row, input_type, u.full_name as updated_by ,updated_at as last_update FROM trx_pd_all 
        LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON trx_pd_all.user_id=u.id
        WHERE updated_at=(select max(updated_at) from trx_pd_all WHERE data_source='powder_plant_1') 
        GROUP BY input_type,updated_at
        UNION ALL
        SELECT 'Powder Plant 2' as source_data, COUNT(distinct trx_pd_all.id) as total_row, input_type, u.full_name as updated_by ,updated_at as last_update FROM trx_pd_all 
        LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON trx_pd_all.user_id=u.id
        WHERE updated_at=(select max(updated_at) from trx_pd_all WHERE data_source='powder_plant_2') 
        GROUP BY input_type,updated_at
        UNION ALL
        SELECT 'Powder Plant 3' as source_data, COUNT(distinct trx_pd_all.id) as total_row, input_type, u.full_name as updated_by ,updated_at as last_update FROM trx_pd_all 
        LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON trx_pd_all.user_id=u.id
        WHERE updated_at=(select max(updated_at) from trx_pd_all WHERE data_source='powder_plant_3') 
        GROUP BY input_type,updated_at
        UNION ALL
        SELECT 'Incoming Beans' as source_data, COUNT(distinct trx_ib.id) as total_row, input_type, u.full_name as updated_by ,updated_at as last_update FROM trx_ib 
        LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON trx_ib.user_id=u.id
        WHERE updated_at=(select max(updated_at) from trx_ib) 
        GROUP BY input_type,updated_at
        UNION ALL
        SELECT 'Quality Butter DEO' as source_data, COUNT(distinct trx_qbd.id) as total_row, input_type, u.full_name as updated_by ,updated_at as last_update FROM trx_qbd 
        LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON trx_qbd.user_id=u.id
        WHERE updated_at=(select max(updated_at) from trx_qbd) 
        GROUP BY input_type,updated_at;");

        return $query->result(); 
    }

    public function data_management_pd() {
        $query = $this->db->query("SELECT 'Powder Plant 1' as source_data, 'Add' as action, COUNT(distinct trx_pd_all.id) as total_row, input_type, u.full_name as updated_by ,updated_at as last_update, created_at FROM trx_pd_all LEFT JOIN(SELECT id, full_name FROM
        aauth_users)u ON trx_pd_all.user_id=u.id WHERE updated_at=(select max(updated_at) from trx_pd_all WHERE data_source='powder_plant_1') GROUP BY input_type,updated_at UNION ALL SELECT 'Powder Plant 1' as source_data, 'Edit' as action, (CASE
        WHEN COUNT(distinct trx_pd_all.id) = 0 THEN NULL ELSE COUNT(distinct trx_pd_all.id) END), input_type, u.full_name as updated_by ,updated_at as last_update, created_at FROM trx_pd_all LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON
        trx_pd_all.user_id=u.id WHERE updated_at=(select max(updated_at) from trx_pd_all WHERE data_source='powder_plant_1' AND updated_at != created_at) GROUP BY input_type,updated_at UNION ALL SELECT 'Powder Plant 2' as source_data, 'Add' as action, COUNT(distinct
        trx_pd_all.id) as total_row, input_type, u.full_name as updated_by ,updated_at as last_update, created_at FROM trx_pd_all LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON trx_pd_all.user_id=u.id WHERE updated_at=(select max(updated_at)
        from trx_pd_all WHERE data_source='powder_plant_2') GROUP BY input_type,updated_at UNION ALL SELECT 'Powder Plant 2' as source_data, 'Edit' as action, (CASE WHEN COUNT(distinct trx_pd_all.id) IS NULL THEN NULL ELSE COUNT(distinct
        trx_pd_all.id) END), input_type, u.full_name as updated_by ,updated_at as last_update, created_at FROM trx_pd_all LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON trx_pd_all.user_id=u.id WHERE updated_at=(select max(updated_at) from
        trx_pd_all WHERE data_source='powder_plant_2' AND updated_at != created_at) GROUP BY input_type,updated_at  UNION ALL SELECT 'Powder Plant 3' as source_data, 'Add' as action, COUNT(distinct trx_pd_all.id) as total_row, input_type, u.full_name as updated_by ,updated_at as
        last_update, created_at FROM trx_pd_all LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON trx_pd_all.user_id=u.id WHERE updated_at=(select max(updated_at) from trx_pd_all WHERE data_source='powder_plant_3') GROUP BY input_type,updated_at
        UNION ALL SELECT 'Powder Plant 3' as source_data, 'Edit' as action, (CASE WHEN COUNT(distinct trx_pd_all.id) IS NULL THEN NULL ELSE COUNT(distinct trx_pd_all.id) END), input_type, u.full_name as updated_by ,updated_at as last_update,
        created_at FROM trx_pd_all LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON trx_pd_all.user_id=u.id WHERE updated_at=(select max(updated_at) from trx_pd_all WHERE data_source='powder_plant_3' AND updated_at != created_at);
        ");

        return $query->result(); 
    }

    public function data_management_ib() {
        $query = $this->db->query("SELECT 'Incoming Beans' as source_data, 'Add' as action, COUNT(distinct trx_ib.id) as total_row, input_type, u.full_name as updated_by ,updated_at as last_update, created_at FROM trx_ib LEFT JOIN(SELECT id, full_name FROM
        aauth_users)u ON trx_ib.user_id=u.id WHERE updated_at=(select max(updated_at) from trx_ib) GROUP BY input_type,updated_at UNION ALL SELECT 'Incoming Beans' as source_data, 'Edit' as action, (CASE
        WHEN COUNT(distinct trx_ib.id) = 0 THEN NULL ELSE COUNT(distinct trx_ib.id) END), input_type, u.full_name as updated_by ,updated_at as last_update, created_at FROM trx_ib LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON
        trx_ib.user_id=u.id WHERE updated_at=(select max(updated_at) from trx_ib WHERE updated_at != created_at) GROUP BY input_type,updated_at 
        ");

        return $query->result(); 
    }

    public function data_management_qbd() {
        $query = $this->db->query("SELECT 'Quality Butter DEO' as source_data, 'Add' as action, COUNT(distinct trx_qbd.id) as total_row, input_type, u.full_name as updated_by ,updated_at as last_update, created_at FROM trx_qbd LEFT JOIN(SELECT id, full_name FROM
        aauth_users)u ON trx_qbd.user_id=u.id WHERE updated_at=(select max(updated_at) from trx_qbd) GROUP BY input_type,updated_at UNION ALL SELECT 'Quality Butter DEO' as source_data, 'Edit' as action, (CASE
        WHEN COUNT(distinct trx_qbd.id) = 0 THEN NULL ELSE COUNT(distinct trx_qbd.id) END), input_type, u.full_name as updated_by ,updated_at as last_update, created_at FROM trx_qbd LEFT JOIN(SELECT id, full_name FROM aauth_users)u ON
        trx_qbd.user_id=u.id WHERE updated_at=(select max(updated_at) from trx_qbd WHERE updated_at != created_at) GROUP BY input_type,updated_at 
        ");

        return $query->result(); 
    }

}

/* End of file Model_data_management.php */
/* Location: ./application/models/Model_data_management.php */