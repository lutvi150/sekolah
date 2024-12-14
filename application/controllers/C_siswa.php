<?php
class C_siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Question', 'question');

        $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
        $this->waktu_sql = $waktu_sql['waktu'];
        if ($this->session->userdata('logged_in') !== true) {
            $this->session->set_flashdata('error', 'Maaf hak akses anda di tolak');
            redirect('controller');
        }
    }
    public function menu($link, $data)
    {
        $id_user = $this->session->userdata('id_user');
        $find_setting = $this->Model->find_data('seting', 'id_user', $id_user)->row_array();
        $data_user = $this->Model->find_data('tb_user', 'id_user', $id_user)->row_array();
        $data_seting = array(
            'foto' => $data_user['foto'],
            'nama' => $data_user['nama'],
            'warna_text' => $find_setting['warna_text'],
            'warna_background' => $find_setting['warna_background'],
            'warna_menu' => $find_setting['warna_menu'],
            'text_menu' => $find_setting['text_menu'],
        );
        $this->load->view('theme_2/siswa/head', $data_seting);
        $this->load->view($link, $data);
        $this->load->view('theme_2/siswa/footer');
    }
    public function index()
    {
        $id_user = $this->session->userdata('admin_konid');
        $check_score = $this->Model->score_tertinggi($id_user)->num_rows();
        if ($check_score > 0) {
            $data['score_tertinggi'] = $this->Model->score_tertinggi($id_user)->result_array();
        } else {
            $score[] = array(
                'nilai' => 'Belum Ada Nilai',
            );
            $data['score_tertinggi'] = $score;
        }
        $data['top_score'] = $this->Model->get_top_score()->result_array();
        $materi = $this->Model->get_data_limit_order('tb_materi', 'tgl_posting', 'DESC', '5')->result_array();
        $data['total_materi'] = $this->Model->get_data('tb_materi', 'id_materi', 'DESC')->num_rows();
        $data['tanggal_hari_ini'] = date('d M Y');
        for ($i = 0; $i <= 4; $i++) {
            // memmotong tanggal
            $tgl = substr($materi[$i]['tgl_posting'], 0, 2);
            $bulan = substr($materi[$i]['tgl_posting'], 3, 2);
            $isi = substr($materi[$i]['isi'], 30, 50);
            // menentukan bulan
            if ($bulan == '01') {
                $bulan = 'Januari';
            } elseif ($bulan == '02') {
                $bulan = 'Februari';
            } elseif ($bulan == '03') {
                $bulan = 'Maret';
            } elseif ($bulan == '04') {
                $bulan = 'April';
            } elseif ($bulan == '05') {
                $bulan = 'Mei';
            } elseif ($bulan == '06') {
                $bulan = 'Juni';
            } elseif ($bulan == '07') {
                $bulan = 'Juli';
            } elseif ($bulan == '08') {
                $bulan = 'Agustus';
            } elseif ($bulan == '09') {
                $bulan = 'September';
            } elseif ($bulan == '10') {
                $bulan = 'Oktober';
            } elseif ($bulan == '11') {
                $bulan = 'November';
            } elseif ($bulan == '12') {
                $bulan = 'Desember';
            }
            $data['materi'][$i] = array(
                'id_materi' => $materi[$i]['id_materi'],
                'tema' => $materi[$i]['tema'],
                'isi' => $materi[$i]['tema'],
                'tgl' => $tgl,
                'bulan' => $bulan,
            );
        }
        //print_r($data['top_score']);
        $this->menu('theme_2/siswa/home', $data);
    }
    public function materi()
    {
        $data['materi'] = $this->Model->get_data('tb_materi', 'id_materi', 'DESC')->result_array();
        $this->menu('theme_2/siswa/materi', $data);
    }
    public function baca_materi($id)
    {
        $data['materi'] = $this->Model->find_data('tb_materi', 'id_materi', $id)->row_array();
        //print_r($data);
        $this->menu('theme_2/siswa/baca_materi', $data);
    }
    public function baca_rangkuman($id)
    {
        $data['rangkuman'] = $this->Model->find_data('tb_materi', 'id_materi', $id)->row_array();
        $this->menu('theme_2/siswa/baca_rangkuman', $data);
    }
    public function vidio()
    {
        $data['vidio'] = $this->Model->get_data('vidio', 'kd_vidio', 'DESC')->result_array();
        //print_r($data);
        $this->menu('theme_2/siswa/vidio', $data);
    }
    public function pustaka()
    {
        $data['pustaka'] = $this->Model->get_data('pustaka', 'id_pustaka', 'DESC')->result_array();
        $this->menu('theme_2/siswa/pustaka', $data);
    }
    public function profile()
    {
        $this->menu('theme_2/siswa/profile', 'a');
    }
    public function ubah_password()
    {
        $this->menu('theme_2/siswa/ubah_password', 'a');
    }
    public function proses_ubah_password()
    {
        $password_lama = md5($this->input->post('password_lama'));
        $password_baru = md5($this->input->post('password_baru'));
        $ulang_password_baru = md5($this->input->post('ulang_password_baru'));
        $chek_data = $this->Model->find_data('tb_user', 'password', $password_lama);
        if ($chek_data->num_rows() > 0) {
            if ($password_baru == $ulang_password_baru) {
                $data = array(
                    'password' => $password_baru,
                );
                $this->Model->change_password($password_lama, $data);
                $this->session->set_flashdata('success', 'Ubah Password Berhasil');
                redirect('c_siswa/ubah_password');
            } else {
                $this->session->set_flashdata('error', 'Password Baru Tidak Sama');
                redirect('c_siswa/ubah_password');
            }
        } else {
            $this->session->set_flashdata('error', 'Password Lama Salah');
            redirect('c_siswa/ubah_password');
        }
    }
    public function setting()
    {
        $this->menu('theme_2/siswa/setting', '');
    }
    public function simpan_seting()
    {
        $id_user = $this->session->userdata('id_user');
        $data_update = array(
            'warna_text' => $this->input->post('warna_text'),
            'warna_background' => $this->input->post('warna_background'),
            'warna_menu' => $this->input->post('warna_menu'),
            'text_menu' => $this->input->post('text_menu'),
        );
        $this->Model->update_data('seting', 'id_user', $id_user, $data_update);
        $this->session->set_flashdata('success', 'Ubah Tampilan Berhasil');
        redirect('c_siswa/setting');
    }
    public function seting_default()
    {
        $id_user = $this->session->userdata('id_user');
        $data_update = array(
            'warna_text' => '#73879C',
            'warna_background' => '#F7F7F7',
            'warna_menu' => '#2A3F54',
            'text_menu' => '#E7E7E7',
        );
        $this->Model->update_data('seting', 'id_user', $id_user, $data_update);
        $this->session->set_flashdata('success', 'Ubah Tampilan Ke Default Berhasil');
        redirect('c_siswa/setting');
    }
    public function simpan_foto($id)
    {
        $id_user = $this->session->userdata('id_user');
        $config['upload_path'] = './upload/foto/original_media/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = true;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = array('upload_data' => $this->upload->data());
            // resize gambar
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/foto/original_media/' . $result['upload_data']['file_name'];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = false;
            $config['quality'] = '100%';
            $config['width'] = 236;
            $config['height'] = 239;
            $config['new_image'] = './upload/foto/thumb_media/' . $result['upload_data']['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            // simpan
            $media['foto'] = 'upload/foto/original_media/' . $result['upload_data']['file_name'];
            print_r($id_user);
            $this->Model->update_data('tb_user', 'id_user', $id_user, $media);
            $this->session->set_flashdata('success', 'Update Foto Berhasil di lakukan');
            redirect('c_siswa/setting');
        }
    }
    public function ki_kd()
    {
        $data = array(
            'ki' => $this->Model->find_data('ki_kd', 'jenis', 'ki')->result_array(),
            'kd' => $this->Model->find_data('ki_kd', 'jenis', 'kd')->result_array(),
            'indikator' => $this->Model->find_data('ki_kd', 'jenis', 'indikator')->result_array(),
            'key' => $this->Model->find_data('key', 'id', '85')->row_array(),
        );
        //print_r($data);
        $this->menu('theme_2/siswa/ki_kd', $data);
    }
    public function evaluasi()
    {
        $id = $this->session->userdata('id_user');
        $check_evaluasi = $this->Model->find_data_evaluasi('tr_guru_tes', 'id_siswa', $id);
        if ($check_evaluasi->num_rows() > 0) {
            $data['status_evaluasi'] = 'Ada';
            $evaluasi = $check_evaluasi->result_array();
            foreach ($evaluasi as $value) {
                if ($value['id_siswa'] == '4') {
                    $status_soal = 'Khusus';
                } else {
                    $status_soal = 'Biasa';
                }

                $check_status_ujian = $this->Model->find_data('tr_ikut_ujian', 'id_tes', $value['id'])->num_rows();
                if ($check_status_ujian > 0) {
                    $hasil = $this->Model->find_data('tr_ikut_ujian', 'id_tes', $value['id'])->row_array();
                    $status = 'Sudah Diselesaikan';
                    $jml_benar = $hasil['jml_benar'];
                    $nilai = $hasil['nilai'];
                    $tgl_mulai_ujian = $hasil['tgl_mulai'];
                    $tgl_selesai_ujian = $hasil['tgl_selesai'];
                } else {
                    $status = 'Belum Diselesaikan';
                    $jml_benar = 'Belum Diselesaikan';
                    $nilai = 'Belum Diselesaikan';
                    $tgl_mulai_ujian = 'Belum Diselesaikan';
                    $tgl_selesai_ujian = 'Belum Diselesaikan';
                }

                $hasil_ujian[] = array(
                    'id' => $value['id'],
                    'nama_ujian' => $value['nama_ujian'],
                    'jumlah_soal' => $value['jumlah_soal'],
                    'waktu' => $value['waktu'],
                    'jenis' => $value['jenis'],
                    'tgl_mulai' => $value['tgl_mulai'],
                    'terlambat' => $value['terlambat'],
                    'token' => $value['token'],
                    'jml_benar' => $jml_benar,
                    'nilai' => $nilai,
                    'status_soal' => $status_soal,
                    'status_ujian' => $status,
                    'tgl_mulai_ujian' => $tgl_mulai_ujian,
                    'tgl_selesai_ujian' => $tgl_selesai_ujian,
                );
            }
        } else {
            $data['status_evaluasi'] = 'Tidak Ada';
            $hasil_ujian[] = array(
                'id' => 'Belum Ada Data',
                'nama_ujian' => 'Belum Ada Data',
                'jumlah_soal' => 'Belum Ada Data',
                'waktu' => 'Belum Ada Data',
                'jenis' => 'Belum Ada Data',
                'tgl_mulai' => 'Belum Ada Data',
                'terlambat' => 'Belum Ada Data',
                'token' => 'Belum Ada Data',
                'jml_benar' => 'Belum Ada Data',
                'nilai' => 'Belum Ada Data',
                'status_soal' => 'Belum Ada Data',
                'status_ujian' => 'Belum Ada Data',
                'tgl_mulai_ujian' => 'Belum Ada Data',
                'tgl_selesai_ujian' => 'Belum Ada Data',
            );
        }

        $data['evaluasi'] = $hasil_ujian;
        //print_r($data['evaluasi']);
        $this->menu('theme_2/siswa/evaluasi', $data);
    }
    public function simpan_evaluasi()
    {
        $id_user = $this->session->userdata('id_user'); //isi dengan session id guru
        $token = strtoupper(random_string('alpha', 5));
        $jumla_soal = $this->input->post('jumlah_soal');
        $jenis = $this->input->post('jenis');
        $tgl_mulai = $this->input->post('tgl_mulai') . ' ' . $this->input->post('jam_mulai');
        $tgl_terlambat = $this->input->post('tgl_selesai') . ' ' . $this->input->post('jam_selesai');
        $check_jumlah_soal = $this->Model->get_data('m_soal', 'id', 'ASC')->num_rows();
        if ($jumla_soal > $check_jumlah_soal) {
            $this->session->set_flashdata('error', 'Jumlah Soal yang di masukkan melebihi soal yang tersedia');
            redirect('c_siswa/evaluasi');
        } else {
            if ($jenis == 'pilih') {
                $this->session->set_flashdata('error', 'Maaf anda belum memilih acak soalnya');
                redirect('c_siswa/evaluasi');
            } else {
                $data_input = array(
                    'id_guru' => '1',
                    'id_mapel' => '1',
                    'nama_ujian' => $this->input->post('nama_ujian'),
                    'jumlah_soal' => $jumla_soal,
                    'waktu' => $this->input->post('waktu'),
                    'jenis' => $jenis,
                    'detil_jenis' => '-',
                    'tgl_mulai' => date($tgl_mulai),
                    'terlambat' => date($tgl_terlambat),
                    'token' => $token,
                    'id_siswa' => $id_user,
                );
                //print_r($data_input);
                $this->Model->insert_data('tr_guru_tes', $data_input);
                $this->session->set_flashdata('success', 'Evaluasi Berhasil di tambahkan');
                redirect('c_siswa/evaluasi');
            }

        }

    }
    public function maping()
    {

        $this->load->view('theme_2/siswa/head');
        $this->load->view('theme_2/guru/maping');
        $this->load->view('theme_2/guru/footer');
        // $this->menu('theme_2/guru/maping', 'a');
    }
    public function hapus_evaluasi($id)
    {
        $this->Model->delete_data('tr_guru_tes', 'id', $id);
        $this->session->set_flashdata('success', 'Evaluasi yang di pilih berhasil di hapus');
        redirect('c_siswa/evaluasi');
    }
    public function ikuti_ujian($uri3, $uri4)
    {
        $a['du'] = $this->Model->du($uri4);
        //print_r($a);
        if (!empty($a['du']) || !empty($a['dp'])) {
            $tgl_selesai = $a['du']['tgl_mulai'];
            $tgl_terlambat_baru = $a['du']['terlambat'];
            $a['tgl_mulai'] = $tgl_selesai;
            $a['terlambat'] = $tgl_terlambat_baru;
            $this->menu('theme_2/siswa/masukkan_tokken', $a);
        }
    }
    public function question(Type $var = null)
    {
        $data = $this->question->showForQuestion('question', 0);
        if ($data == null) {
            $result = [];
        } else {
            foreach ($data as $key => $value) {
                $answer = [];
                $answer = $this->costumeAsnwer($this->question->showForQuestion('answer', $value['id_question']));
                $result[] = [
                    'id_question' => $value['id_question'],
                    'nama' => $value['nama'],
                    'foto' => $value['foto'],
                    'question' => $value['question'],
                    'create_at' => $this->convertTime($value['create_at']),
                    'status' => $value['status'],
                    'id_user' => $value['id_user'],
                    'answer' => $answer,
                ];
            }
        }
        $respon['question'] = $result;
        // echo json_encode($respon);
        $this->menu('theme_2/siswa/question', $respon);
    }
    public function costumeAsnwer($data)
    {
        if ($data == null) {
            $result = [];
        } else {
            foreach ($data as $key => $value) {
                $result[] = [
                    'id_question' => $value['id_question'],
                    'nama' => $value['nama'],
                    'foto' => $value['foto'],
                    'question' => $value['question'],
                    'create_at' => $this->convertTime($value['create_at']),
                    'status' => $value['status'],
                    'id_user' => $value['id_user'],
                ];
            }
        }

        return $result;
    }
    public function saveQuestion(Type $var = null)
    {
        $question = $this->input->post('question');
        $insert = [
            'question' => $question,
            'id_user' => $this->session->userdata('id_user'),
            'status' => 1,
            'type' => 'question',
            'create_at' => date('Y-m-d H:i:s'),
        ];
        $this->question->store($insert);
        $this->session->set_flashdata('success', 'Pertanyaan Berhasil di Kirim');
        redirect('c_siswa/question');
        // echo json_encode($insert);
    }
    public function convertTime($time)
    {
        $tgl = substr($time, 8, 2);
        $bulan = substr($time, 5, 2);
        $tahun = substr($time, 0, 4);
        $jam = substr($time, 11, 8);
        // menentukan bulan
        if ($bulan == '01') {
            $bulan = 'Januari';
        } elseif ($bulan == '02') {
            $bulan = 'Februari';
        } elseif ($bulan == '03') {
            $bulan = 'Maret';
        } elseif ($bulan == '04') {
            $bulan = 'April';
        } elseif ($bulan == '05') {
            $bulan = 'Mei';
        } elseif ($bulan == '06') {
            $bulan = 'Juni';
        } elseif ($bulan == '07') {
            $bulan = 'Juli';
        } elseif ($bulan == '08') {
            $bulan = 'Agustus';
        } elseif ($bulan == '09') {
            $bulan = 'September';
        } elseif ($bulan == '10') {
            $bulan = 'Oktober';
        } elseif ($bulan == '11') {
            $bulan = 'November';
        } elseif ($bulan == '12') {
            $bulan = 'Desember';
        }
        if ($time == null) {
            return [
                'tanggal' => null,
                'bulan' => null,
                'tahun' => null,
                'jam' => null,
                'real' => null,
            ];
        } else {
            return [
                'tanggal' => $tgl,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'jam' => $jam,
                'real' => $time,
            ];
        }

    }public function absen(Type $var = null)
    {
        $attendance = $this->Model->getAttendance();
        if ($attendance == null) {
            $data['attendance'] = null;
        } else {
            foreach ($attendance as $key => $value) {
                $result[] = [
                    'class_name' => $value['class_name'],
                    'date_attendance' => $value['date_attendance'],
                    'nama' => $value['nama'],
                    'id_attendance' => $value['id_attendance'],
                    'status' => $this->Model->find_data('fill_attendance', 'id_siswa', $this->session->userdata('id_user'))->row_array(),
                    'count' => $this->Model->find_data('fill_attendance', 'id_attendance', $value['id_attendance'])->num_rows(),
                ];
            }
            $data['attendance'] = $result;
        }
        $this->menu('theme_2/siswa/attendance', $data);
        // echo json_encode($data);
    }
    public function detail_attendance($id)
    {
        $data['attendance'] = $this->Model->findAttendance($id);
        $data['fillAttendance'] = $this->Model->getFillAttendance($id);
        $data['back'] = base_url('c_siswa/absen');
        // echo json_encode($data);
        $this->menu('theme_2/guru/fill_attendance', $data);
    }
    public function attendance($status)
    {
        $attendance = [
            'id_siswa' => $this->session->userdata('id_user'),
            'time_attendance' => date('Y-m-d H:i:s'),
            'id_attendance' => $this->input->post('id'),
        ];
        if ($status == 'fill') {
            $this->Model->insert_data('fill_attendance', $attendance);
        }
        $this->session->set_flashdata('success', 'Absen berhasil di isi');
        redirect('c_siswa/absen');
    }
    public function detailAttendance($id)
    {
        $data['attendance'] = $this->Model->find_data('attendance', 'id_attendance', $id)->row_array();
        $data['siswat'] = $this->Model->findSiswa($id);
        echo json_encode($data);
    }
    // tutorial
    public function tutorial(Type $var = null)
    {
        $data['tutorial'] = $this->Model->get_data('tutorial', 'id_tutorial', 'desc')->result_array();
        $this->menu('theme_2/guru/tutorial', $data);
    }

}
