<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiTeacher extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Cloud', 'cloud');
		$this->load->model('Question','question');
		
    }

    public function index()
    {

    }
    public function getCloud(Type $var = null)
    {
        $data = $this->cloud->getData();
		if ($data==null) {
			$result=null;
		} else {
			foreach ($data as $key => $value) {
				$result[]=[
					'id'=>$value['id_data'],
					'document'=>json_decode($value['document']),
					'title'=>$value['title'],
					'create_at'=>$value['create_at']
				];
			}
		}
        $respon = [
            'status' => 'succes',
            'respon' => 200,
            'msg' => null,
            'content' => $result,
        ];
        echo json_encode($respon);
    }
    public function saveCloud(Type $var = null)
    {
        $this->form_validation->set_rules('title', 'Judul Dokumen', 'required', [
            'required' => 'Judul Tidak Boleh Kosong',
        ]);
        //  $this->form_validation->set_rules('document', 'Lampiran', 'required',[
        //      'required'=>'Lampiran Tidak Boldeh Kosong'
        //  ]);
        if ($this->form_validation->run() == false) {
            $respon = [
                'status' => 'failed',
                'respon' => 200,
                'msg' => 'Validation Error',
                'content' => $this->form_validation->error_array(),
            ];
        } else {

            $document = $this->uploadDocument('document');
            if ($document['status'] == 'error') {
                $respon = [
                    'status' => 'succes',
                    'respon' => 200,
                    'msg' => 'Upload Failed',
                    'content' => $document['errors'],
                ];
            } elseif ($document['status'] == 'success') {
                $insert = [
                    'document' =>json_encode($document['data']),
                    'title' => $this->input->post('title'),
                    'create_at' => date('Y-m-d H:i:s'),
                ];
                $this->cloud->saveData($insert);
                $respon = [
                    'status' => 'succes',
                    'respon' => 200,
                    'msg' => 'Store Success',
                    'content' => null,
                ];
            }

        }

        echo json_encode($respon);
    }
// delete cloud
public function deleteCloud(Type $var = null)
{
	$id=$this->input->post('id');
	$this->cloud->deleteData($id);
	$respon = [
		'status' => 'succes',
		'respon' => 200,
		'msg' => 'Delete Success',
		'content' => null,
	];
	echo json_encode($respon);
}
    public function uploadDocument($document)
    {

        $config['upload_path'] = './upload/document';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($document)) {
            return [
                'status' => 'error',
                'errors' => $this->upload->display_errors(),
            ];
        } else {
            return [
                'status' => 'success',
                'data' =>  $this->upload->data(),
            ];
        }

    }
	// count question
	public function countQuest(Type $var = null)
	{
		$count=$this->question->countQuestion();
		$respon = [
			'status' => 'succes',
			'respon' => 200,
			'msg' => 'Delete Success',
			'content' => $count,
		];
		echo json_encode($respon);
	}
}

/* End of file  ApiTeacher.php */
