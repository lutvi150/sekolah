<?php
class Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('level') == 'guru' || $this->session->userdata('level') == 'admin') {
                redirect('c_guru');
            } elseif ($this->session->userdata('level') == 'siswa') {
                redirect('c_siswa');
            }
        } else {
            $aka = $this->config->item('key');
            $license = $this->Model->find_data('key', 'id', '40')->result_array();
            if ($license[0]['key'] == $aka) {
                $this->load->view('theme_2/login');
            } else {
                redirect('Controller/coming');
            }
        }
    }
    public function login_versi2()
    {
        $this->load->view('login_versi2');
    }
    public function daftar_baru()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $ulangi_password = md5($this->input->post('ulangi_password'));
        if ($password == $ulangi_password) {
            $check = $this->Model->find_data('tb_user', 'username', $username);
            if ($check->num_rows() > 0) {
                $this->session->set_flashdata('error', 'Username ini sudah terdaftar, silahkan gunakan username lain');
                redirect('controller');
            } else {
                $data_input = array(
                    'nama' => $this->input->post('nama'),
                    'username' => $username,
                    'password' => $password,
                    'tgl_registrasi' => date('d-m-Y'),
                    'foto' => 'gambar/gambar_user/icon-admin.png',
                    'seting' => 'Belum',
                    'level' => 'siswa',
                );
                $this->Model->insert_data('tb_user', $data_input);
                $this->session->set_flashdata('success', 'Pendaftaran Berhasil Silahkan Login');
                redirect('controller');
            }
        } else {
            //echo'tidak sama';
            $this->session->set_flashdata('error', 'Maaf password yang anda masukkan tidak sama');
            redirect('controller');
        }
    }
    public function verifikasi_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $check_data = $this->Model->check_account($username, $password);
        if ($check_data->num_rows() > 0) {
            $data = $check_data->row_array();
            $nama = $data['nama'];
            $level = $data['level'];
            $id = $data['id_user'];
            // menambahkan data setingan standar
            if ($data['seting'] == 'Belum') {
                $data_seting = array(
                    'id_user' => $id,
                    'warna_text' => '#73879C',
                    'warna_background' => '#F7F7F7',
                    'warna_menu' => '#2A3F54',
                    'text_menu' => '#E7E7E7',
                );
                $update_status = array(
                    'seting' => 'Sudah',
                );
                $this->Model->insert_data('seting', $data_seting);
                $this->Model->update_data('tb_user', 'id_user', $id, $update_status);
            }
            $ses_data = array(
                'id_user' => $id,
                'nama' => $nama,
                'level' => $level,
                'admin_level' => $level,
                'admin_user' => $nama,
                'admin_konid' => $id,
                'logged_in' => true,
                'admin_valid' => true
            );
            $this->session->set_userdata($ses_data);
            if ($level == 'guru') {
                redirect('c_guru');
            } elseif ($level == 'siswa') {
                redirect('c_siswa');
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf Password yang anda masukkan salah');
            redirect('controller');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('controller');
    }

    public function cfcd208495d565ef66e7dff9f98764da()
    {
        $ahaj = exec('getmac');
        $aka = substr($ahaj, 0, 17);
        print_r($aka);
    }
    public function license_check()
    {
        $aka = $this->config->item('key');
        $license = $this->Model->find_data('key', 'id', '100')->result_array();
        if ($license[0]['key'] == $aka) {
            echo 'ada licensi';
        } else {
            echo 'tidak ada licensei';
        }
    }
    public function b6d767d2f8ed5d21a44b0e5886680cb9($id)
    {
        $data = array(
            'key' => md5($id),
        );
        $this->Model->update_data('key', 'id', '100', $data);
    }
    public function fake_data()
    {
        for ($i = 0; $i < 100; $i++) {
            $data = array(
                'key' => md5($i),
            );
            $this->Model->insert_data('key', $data);
        }
    }
    public function coming()
    {
        $tgl_selesai = '2';
        $jam_selesai = '';

        $data_finish = array(
            'hari' => 1,
            'jam' => 2,
            'menit' => 40,
            'detik' => 30
        );
        //print_r($data);
        $this->load->view('coming', $data_finish);
    }
}
