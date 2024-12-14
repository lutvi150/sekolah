<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Cloud extends CI_Model {
           public $table='cloud';             
public function login(){
                        
                                
}
public function getData(Type $var = null)
{
	$this->db->from($this->table);
	return $this->db->get()->result_array();
	
}
public function saveData($object)
{
	$this->db->insert($this->table, $object);
}
public function deleteData($id)
{
	$this->db->where('id_data', $id);
	$this->db->delete($this->table);
}
                        
                            
                        
}
                        
/* End of file Cloud.php */
    
                        