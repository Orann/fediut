<?php


class Api_model extends CI_Model {

    public function get_salle($id) {
        return $this->db->select('*')
            ->limit(1)
            ->from('Salle')
            ->where('id', $id)
            ->get()
            ->row();
    }

    public function get_all_salles(){
        return $this->db->select('*')
            ->from('Salle')
            ->get()
            ->result_array();
    }

    public function create_salle($data){
        $this->db->insert('Salle', $data);
    }
}