<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiController extends CI_Controller
{

    public function index()
    {

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
                $check_seting = $this->Model->find_data('seting', 'id_user', $id)->row_array();
                $data_seting = array(
                    'id_user' => $id,
                    'warna_text' => '#73879C',
                    'warna_background' => '#ffffff',
                    'warna_menu' => '#2A3F54',
                    'text_menu' => '#E7E7E7',
                );
                $update_status = array(
                    'seting' => 'Sudah');
                if ($check_seting == null) {
                    $this->Model->insert_data('seting', $data_seting);
                } else {
                    $this->Model->update_data('seting', 'id_user', $id, $data_seting);
                }
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
                'admin_valid' => true,
            );
            $this->session->set_userdata($ses_data);
            $respon = [
                'status' => 'success',
                'response' => 200,
                'errors' => null,
                'msg' => 'Login Success',
                'content' => null,
            ];

        } else {
            $respon = [
                'status' => 'failed',
                'response' => 200,
                'errors' => 'error',
                'msg' => 'Login Failed',
                'content' => null,
            ];

        }
        echo json_encode($respon);
    }
    public function daftar_baru()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $ulangi_password = md5($this->input->post('ulangi_password'));
        if ($password == $ulangi_password) {
            $check = $this->Model->find_data('tb_user', 'username', $username);
            if ($check->num_rows() > 0) {
                $respon = [
                    'status' => 'failed',
                    'response' => 200,
                    'errors' => null,
                    'msg' => 'Username Already',
                    'content' => null,
                ];
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
                $respon = [
                    'status' => 'success',
                    'response' => 200,
                    'errors' => null,
                    'msg' => 'Register Success',
                    'content' => null,
                ];
            }
        } else {
            $respon = [
                'status' => 'failed',
                'response' => 200,
                'errors' => 'error',
                'msg' => 'Username Not Same',
                'content' => null,
            ];
        }
        echo json_encode($respon);
    }
    // use for profile developer
    public function get_profil()
    {
        $profil = $this->Model->find_data('profil_app', 'jenis_profil', 'about_developer')->row_array();
        if ($profil == null) {
            $store = [
                'jenis_profil' => 'about_developer',
                'setting_profil' => json_encode([
                    'nama_lengkap' => '-',
                    'panggilan' => '-',
                    'ttl' => '-',
                    'jenis_kelamin' => '-',
                    'no_hp' => '-',
                    'email' => '-',
                    'alamat' => '-',
                ]),
                'setting_type' => 'text',
            ];
            $this->Model->insert_data('profil_app', $store);
        }
        $response = [
            'status' => 'success',
            'data' => json_decode($profil['setting_profil']),
        ];
        echo json_encode($response);
    }

}

/* End of file  ApiController.php */
