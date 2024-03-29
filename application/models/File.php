<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File extends CI_Model{

    public function getRows($id){
        $this->db->select('idfile,file_name,created');
        $this->db->from('files');
        if($id){
            $this->db->where('idpersona',$id);
            
            $query = $this->db->get();
            $result = $query->result_array();
        }else{
            $this->db->order_by('created','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    public function getRowsemp($id){
        $this->db->select('idfile,file_name,created');
        $this->db->from('files');
        if($id){
            $this->db->where('idempresa',$id); 
            
            $query = $this->db->get();
            $result = $query->result_array();
        }else{
            $this->db->order_by('created','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    public function insert($data = array()){
        $insert = $this->db->insert_batch('files',$data);
        return $insert?true:false;
    }
    
}
?>
