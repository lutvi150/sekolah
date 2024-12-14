<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Developer extends CI_Controller {

public function index()
{
                
}
// message for comming soon
public function commingSoonInfo(Type $var = null)
{
	$start=microtime(true);
	$respon=[
		'status'=>'success',
		'time_executed'=>microtime(true)-$start,
		'msg'=>null,
		'errors'=>null,
		'content'=>[
			'developer'=>'Rahmat Lutvi Furkon',
			'time'=>date('H:is'),
		],
	];
	echo json_encode($respon);
}
        
}
        
    /* End of file  Developer.php */
        
                            