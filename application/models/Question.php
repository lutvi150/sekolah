<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Question extends CI_Model {
public $table='question';
public function store($object)
{
	$this->db->insert($this->table, $object);
}
public function delete($id)
{
	$this->db->where('id_question', $id);
	$this->db->delete($this->table);
}
public function showForQuestion($type,$reply)
{
	$this->db->from($this->table);
	$this->db->join('tb_user', 'question.id_user = tb_user.id_user');
	$this->db->where('type',$type );
	if ($type=='answer') {
		$this->db->where('reply', $reply);
	}
	$this->db->order_by('question.id_question', 'desc');
	return $this->db->get()->result_array();
	
}
public function countQuestion(Type $var = null)
{
	$this->db->from($this->table);
	$this->db->where('status', 1);
	return $this->db->count_all_results();
	
}
                        
                            
                        
}
                        
/* End of file Question.php */
    
                        