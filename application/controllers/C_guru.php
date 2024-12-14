<?php
class C_guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Question', 'question');
        $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
        $this->waktu_sql = $waktu_sql['waktu'];
        if ($this->session->userdata('logged_in') !== true) {
            $this->session->set_flashdata('error', 'Maaf hak akses anda di tolak');
            redirect('controller');
        }
        if ($this->session->userdata('level') == 'siswa') {
            $this->session->set_flashdata('error', 'Maaf hak akses anda di tolak');
            redirect('controller');
        }
    }
    public function menu($link, $data)
    {
        $id_user = $this->session->userdata('id_user');
        $find_setting = $this->Model->find_data('seting', 'id_user', $id_user)->row_array();
        $data_seting = array(
            'warna_text' => $find_setting['warna_text'],
            'warna_background' => $find_setting['warna_background'],
            'warna_menu' => $find_setting['warna_menu'],
            'text_menu' => $find_setting['text_menu'],
        );
        $this->load->view('theme_2/guru/head', $data_seting);
        $this->load->view($link, $data);
        $this->load->view('theme_2/guru/footer');
        $arrayName = array('a' => 'a');
    }
    public function guru()
    {
        $this->load->view('theme_2/guru/head');
    }
    public function index()
    {
        $materi = $this->Model->get_data_limit_order('tb_materi', 'tgl_posting', 'DESC', '5')->result_array();
        $data['total_materi'] = $this->Model->get_data('tb_materi', 'id_materi', 'DESC')->num_rows();
        $data['score_tertinggi'] = $this->Model->score_tertinggi_guru()->result_array();
        $data['top_score'] = $this->Model->get_top_score()->result_array();
        $data['tanggal_hari_ini'] = date('d M Y');
        $data['total_soal'] = $this->Model->get_data('m_soal', 'id', 'ASC')->num_rows();
        $data['jumlah_siswa'] = $this->Model->find_data('tb_user', 'level', 'siswa')->num_rows();
        for ($i = 0; $i <= 4; $i++) {
            // memmotong tanggal
            $tgl = substr($materi[$i]['tgl_posting'], 0, 2);
            $bulan = substr($materi[$i]['tgl_posting'], 3, 2);
            $isi = substr($materi[$i]['isi'], 1, 200);
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
        $this->menu('theme_2/guru/home', $data);

    }
    public function baca_materi($id)
    {
        $data['materi'] = $this->Model->find_data('tb_materi', 'id_materi', $id)->row_array();
        //print_r($data);
        $this->menu('theme_2/guru/baca_materi', $data);
    }
    public function baca_rangkuman($id)
    {
        $data['rangkuman'] = $this->Model->find_data('tb_materi', 'id_materi', $id)->row_array();
        $this->menu('theme_2/guru/baca_rangkuman', $data);
    }
    public function materi()
    {
        $data['materi'] = $this->Model->get_data('tb_materi', 'id_materi', 'ASC')->result_array();
        $this->menu('theme_2/guru/materi', $data);
    }
    public function tambah_materi()
    {
        $this->menu('theme_2/guru/tambah_materi', 'a');
    }
    // upload materi
    public function upload_materi(Type $var = null)
    {
        $tema = $this->input->post('tema');
        $file = $this->upload_file(1);
        if ($file['status'] == 'errors') {
            $this->session->set_flashdata('error', $file['erros']);
            redirect('c_guru/materi');
        } else {
            $insert = [
                'tema' => $tema,
                'isi' => $file['data']['file_name'],
                'rangkuman' => '-',
                'type' => 'file',
                'tgl_posting' => date('d-m-Y'),
            ];
            $this->Model->insert_data('tb_materi', $insert);
            $this->session->set_flashdata('success', 'Materi berhasil di tambahkan');
            redirect('c_guru/materi');
        }
        // echo json_encode($file);
    }

    public function upload_file($id)
    {
        $config['upload_path'] = './upload/pdf/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = true;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('document')) {
            $respons = [
                'status' => 'error',
                'errors' => $this->upload->display_errors(),
            ];
        } else {
            $respons = [
                'status' => 'success',
                'data' => $this->upload->data(),
            ];
        }
        return $respons;
    }
    public function simpan_materi()
    {
        $data_input = array(
            'tema' => $this->input->post('tema'),
            'isi' => $this->input->post('isi'),
            'rangkuman' => $this->input->post('rangkuman'),
            'tgl_posting' => date('d-m-Y'),
            'type' => 'read',
        );
        $this->Model->insert_data('tb_materi', $data_input);
        $this->session->set_flashdata('success', 'Materi Berhasil di Tambahkan');
        redirect('c_guru/tambah_materi');
    }
    public function edit_materi($id)
    {
        $check = $this->Model->find_data('tb_materi', 'id_materi', $id)->row_array();
        $this->menu('theme_2/guru/edit_materi', $check);
    }
    public function simpan_edit_materi($id)
    {
        $data_input = array(
            'tema' => $this->input->post('tema'),
            'isi' => $this->input->post('isi'),
            'rangkuman' => $this->input->post('rangkuman'),
            'tgl_posting' => date('d-m-Y'),
        );
        $this->Model->update_data('tb_materi', 'id_materi', $id, $data_input);
        $this->session->set_flashdata('success', 'Edit Materi Berhasil di lakukan');
        redirect('c_guru/materi');
    }
    public function hapus_materi($id)
    {
        $this->Model->delete_data('tb_materi', 'id_materi', $id);
        $this->session->set_flashdata('success', 'Data yang anda pilih berhasil di hapus');
        redirect('c_guru/materi');
    }
    public function maping()
    {
        $this->load->view('theme_2/guru/head');
        $this->load->view('theme_2/guru/maping');
        $this->load->view('theme_2/guru/footer');
    }
    public function daftar_siswa()
    {
        $data['data_siswa'] = $this->Model->get_data_siswa()->result_array();
        $this->menu('theme_2/guru/daftar_siswa', $data);
    }
    public function detail_siswa()
    {
        $id_siswa = $this->input->get('id');
        //$id_siswa='6';
        $hasil = $this->Model->detail_siswa($id_siswa)->result_array();
        $check = $this->Model->detail_siswa($id_siswa)->num_rows();
        if ($check > 0) {
            foreach ($hasil as $value) {
                $data[] = [
                    'jml_benar' => $value['jml_benar'],
                    'nama_ujian' => $value['nama_ujian'],
                    'nilai' => $value['nilai'],
                    'tgl_mulai' => $value['tgl_mulai'],
                    'tgl_selesai' => $value['tgl_selesai'],
                ];
            }

        } else {
            $data[] = [
                'jml_benar' => 'Belum Evaluasi',
                'nama_ujian' => 'Belum Evaluasi',
                'nama' => 'Belum Evaluasi',
                'tgl_mulai' => 'Belum Evaluasi',
                'tgl_selesai' => 'Belum Evaluasi',
            ];
        }
        echo json_encode($data);
    }
    public function hapus_siswa($id)
    {
        $this->Model->delete_data('tb_user', 'id_user', $id);
        $this->session->set_flashdata('success', 'Hapus data siswa Berhasil');
        redirect('c_guru/daftar_siswa');
    }
    public function migrated_materi()
    {
        $ambil_data = $this->Model->get_data('materi')->result_array();
        foreach ($ambil_data as $value) {
            $data = array(
                'tema' => $value['tema'],
                'isi' => $value['isi'],
                'rangkuman' => $value['rangkuman'],
                'tgl_posting' => date('d-m-Y'),
            );
            $this->Model->insert_data('tb_materi', $data);
            echo "berhasil";
        }
    }
    public function vidio()
    {
        $data['vidio'] = $this->Model->get_data('vidio', 'kd_vidio', 'DESC')->result_array();
        //print_r($data);
        // echo json_encode($data);
        $this->menu('theme_2/guru/vidio', $data);
    }
    // save data vidio
    public function save_vidio(Type $var = null)
    {
        $insert = [
            'judul' => $this->input->post('judul'),
            'tema' => '-',
            'jenis' => 'vidio',
            'link' => $this->input->post('link'),
        ];
        $this->Model->insert_data('vidio', $insert);
        $this->session->set_flashdata('success', 'Vidioo Berhasil di tambahkan ');
        redirect('c_guru/vidio');
        // echo json_encode($insert);
    }
    // delete vidio
    public function vidio_delete(Type $var = null)
    {
        $id = $this->input->post('kode_vidio');
        $this->Model->delete_data('vidio', 'kd_vidio', $id);
        $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        redirect('c_guru/vidio');
    }
    public function tambah_soal()
    {
        $this->load->view('theme_2/guru/head');
        $this->load->view('theme_2/guru/tambah_soal', 'a');
        $this->load->view('theme_2/guru/footer_tambah_soal');

    }
    public function evaluasi()
    {
        $paket['paket'] = $this->Model->get_data('m_soal', 'id', 'DESC')->result_array();
        foreach ($paket['paket'] as $value) {
            $jml_soal = $value['jml_benar'] + $value['jml_salah'];
            if ($value['jml_benar'] == 0) {
                $persentase = '0%';
            } else {
                $persentase = (($value['jml_benar'] / ($value['jml_benar'] + $value['jml_salah'])) * 100) . '%';
            }

            $post[] = array(
                'id' => $value['id'],
                'bobot' => $value['bobot'],
                'soal' => $value['soal'],
                'jml_soal' => $jml_soal,
                'jml_benar' => $value['jml_benar'],
                'jml_salah' => $value['jml_salah'],
                'persentase' => $persentase,
            );
        }
        $data['paket'] = $post;
        //print_r($data);
        $this->menu('theme_2/guru/evaluasi', $data);
    }
    public function buat_evaluasi_user()
    {
        $id = $this->session->userdata('id_user');
        $check = $this->Model->find_data('tr_guru_tes', 'id_siswa', $id);
        if ($check->num_rows() > 0) {
            foreach ($check->result_array() as $value) {
                $id_soal = $value['id'];
                //    check jumlah siswa
                $check_jumlah_siswa = $this->Model->find_data('tr_ikut_ujian', 'id_tes', $id_soal);
                if ($check_jumlah_siswa->num_rows() > 0) {
                    $jumlah_siswa = $check_jumlah_siswa->num_rows();
                } else {
                    $jumlah_siswa = 'Belum ada';
                }

                //    cari nilai tertingg
                $check_nilai_tertinggi = $this->Model->score_tertinggi_per_soal($id_soal);
                if ($check_nilai_tertinggi->num_rows() > 0) {
                    $nilai_tertinggi = $check_nilai_tertinggi->row_array();
                    $nilai_tertinggi = $nilai_tertinggi['nilai'];
                } else {
                    $nilai_tertinggi = 'Belum ada';
                }
                $data['data_evaluasi'] = 'Ada';
                $evaluasi[] = [
                    'id' => $id_soal,
                    'nama_ujian' => $value['nama_ujian'],
                    'jumlah_soal' => $value['jumlah_soal'],
                    'waktu' => $value['waktu'],
                    'jumlah_siswa' => $jumlah_siswa,
                    'nilai_tertinggi' => $nilai_tertinggi,
                    'token' => $value['token'],
                    'tgl_mulai' => $value['tgl_mulai'],
                    'terlambat' => $value['terlambat'],
                ];
            }
        } else {
            $data['data_evaluasi'] = 'Tidak ada';
            $evaluasi[] = [
                'id' => 'Belum Ada',
                'nama_ujian' => 'Belum Ada',
                'jumlah_soal' => 'Belum Ada',
                'waktu' => 'Belum Ada',
                'jumlah_siswa' => 'Belum Ada',
                'nilai_tertinggi' => 'Belum Ada',
                'token' => 'Belum Ada',
                'tgl_mulai' => 'Belum Ada',
                'terlambat' => 'Belum Ada',
            ];
        }

        $data['evaluasi'] = $evaluasi;
        //print_r($data);
        $this->menu('theme_2/guru/buat_evaluasi', $data);
    }
    public function detail_evaluasi($id_soal)
    {
        $find_evaluasi_name = $this->Model->find_data('tr_guru_tes', 'id', $id_soal)->row_array();
        $check = $this->Model->data_peserta_evaluasi($id_soal);
        if ($check->num_rows() > 0) {
            $data['data_peserta'] = $check->result_array();
            $data['nama_evaluasi'] = $find_evaluasi_name['nama_ujian'];
            //print_r($data);
            $this->menu('theme_2/guru/detail_evaluasi', $data);
        } else {
            $this->session->set_flashdata('error', 'Belum ada data untuk soal evaluasi ini, di karenakan belum ada siswa yang melaksanakan ujian');
            redirect('c_guru/buat_evaluasi_user');
        }

        //print_r($data);
        //$this->menu('theme_2/guru/detail_evaluasi',$data);
    }
    public function hapus_evaluasi($id)
    {
        $this->Model->delete_data('tr_guru_tes', 'id', $id);
        $this->session->set_flashdata('success', 'Evaluasi yang di pilih berhasil di hapus');
        redirect('c_guru/buat_evaluasi_user');
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
            redirect('c_guru/buat_evaluasi_user');
        } else {
            if ($jenis == 'pilih') {
                $this->session->set_flashdata('error', 'Maaf anda belum memilih acak soalnya');
                redirect('c_guru/buat_evaluasi_user');
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
                redirect('c_guru/buat_evaluasi_user');
            }

        }
    }
    public function simpan_soal()
    {
        $data_input = array(
            'id_guru' => '1',
            'id_mapel' => '1',
            'bobot' => $this->input->post('bobot'),
            'file' => '1',
            'tipe_file' => '1',
            'soal' => $this->input->post('soal'),
            'opsi_a' => $this->input->post('jawaban_a'),
            'opsi_b' => $this->input->post('jawaban_b'),
            'opsi_c' => $this->input->post('jawaban_c'),
            'opsi_d' => $this->input->post('jawaban_d'),
            'opsi_e' => $this->input->post('jawaban_e'),
            'jawaban' => $this->input->post('kunci'),
            'tgl_input' => date('d-m-Y'),
            'jml_benar' => '0',
            'jml_salah' => '0',
        );
        $this->Model->insert_data('m_soal', $data_input);
        $this->session->set_flashdata('success', 'Soal Berhasil di Tambahkan');
        redirect('c_guru/evaluasi');
    }
    public function edit_soal($id)
    {
        $data['soal'] = $this->Model->find_data('m_soal', 'id', $id)->row_array();
        //$this->menu('theme_2/guru/edit_soal',$data);
        $this->load->view('theme_2/guru/head');
        $this->load->view('theme_2/guru/edit_soal', $data);
        $this->load->view('theme_2/guru/footer_tambah_soal');
        //print_r($data);
    }
    public function simpan_soal_edit($id)
    {
        $data_input = array(
            'id_guru' => '1',
            'id_mapel' => '1',
            'bobot' => $this->input->post('bobot'),
            'file' => '1',
            'tipe_file' => '1',
            'soal' => $this->input->post('soal'),
            'opsi_a' => $this->input->post('jawaban_a'),
            'opsi_b' => $this->input->post('jawaban_b'),
            'opsi_c' => $this->input->post('jawaban_c'),
            'opsi_d' => $this->input->post('jawaban_d'),
            'opsi_e' => $this->input->post('jawaban_d'),
            'jawaban' => $this->input->post('kunci'),
            'tgl_input' => date('d-m-Y'),
            'jml_benar' => '0',
            'jml_salah' => '0',
        );
        $this->Model->update_data('m_soal', 'id', $id, $data_input);
        $this->session->set_flashdata('success', 'Soal Berhasil di Edit');
        redirect('c_guru/evaluasi');
    }
    public function hapus_soal($id)
    {
        $this->Model->delete_data('m_soal', 'id', $id);
        $this->session->set_flashdata('success', 'Soal yang di pilih berhasil di hapus');
        redirect('c_guru/evaluasi');
    }
    public function user()
    {
        $this->menu('theme_2/guru/daftar_user', 'a');
    }
    public function pustaka()
    {
        $data['pustaka'] = $this->Model->get_data('pustaka', 'id_pustaka', 'DESC')->result_array();
        $this->load->view('theme_2/guru/head');
        $this->load->view('theme_2/guru/pustaka', $data);
        $this->load->view('theme_2/guru/footer_biasa');
    }
    public function simpan_pustaka()
    {
        $alamat = $this->input->post('alamat');
        $url = $this->input->post('link');
        if ($url == '') {
            $url = 'Kosong';
        } else {
            $url = $this->input->post('link');
        }
        $data_input = array(
            'alamat' => $alamat,
            'url' => $url,
            'tgl_input' => date('d-m-Y'),
        );
        $this->Model->insert_data('pustaka', $data_input);
        $this->session->set_flashdata('success', 'Simpan Data Pustaka Berhasil');
        redirect('c_guru/pustaka');
    }
    public function hapus_pustaka($id)
    {
        $this->Model->delete_data('pustaka', 'id_pustaka', $id);
        $this->session->set_flashdata('success', 'Hapus Daftar Pustaka Berhasil');
        redirect('c_guru/pustaka');
    }
    public function simpan_pustaka_edit($id)
    {
        $alamat = $this->input->post('alamat');
        $url = $this->input->post('link');
        if ($url == '') {
            $url = 'Kosong';
        } else {
            $url = $this->input->post('link');
        }
        $data_input = array(
            'alamat' => $alamat,
            'url' => $url,
        );
        $this->Model->update_data
            ('pustaka', 'id_pustaka', $id, $data_input);
        $this->session->set_flashdata('success', 'Edit Data Pustaka Berhasil');
        redirect('c_guru/pustaka');
    }
    public function profile()
    {
        $id = $this->session->userdata('id_user');
        $this->load->view('theme_2/guru/head');
        $this->load->view('theme_2/guru/profile');
        $this->load->view('theme_2/guru/footer_biasa');

    }
    public function ubah_password()
    {
        $this->menu('theme_2/guru/ubah_password', 'a');
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
                redirect('c_guru/ubah_password');
            } else {
                $this->session->set_flashdata('error', 'Password Baru Tidak Sama');
                redirect('c_guru/ubah_password');
            }
        } else {
            $this->session->set_flashdata('error', 'Password Lama Salah');
            redirect('c_guru/ubah_password');
        }
    }
    public function setting()
    {
        $this->menu('theme_2/guru/setting', '');
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
        redirect('c_guru/setting');
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
        redirect('c_guru/setting');
    }
    public function edit_tujuan_pembelajaran()
    {
        $data = $this->Model->find_data('key', 'id', '85')->row_array();
        $this->menu('theme_2/guru/edit_tujuan_pembelajaran', $data);
        //print_r ($data);
    }
    public function simpan_edit_tujuan_pembelajaran()
    {
        $data = [
            'key' => $this->input->post('tujuan'),
        ];
        //print_r($data);
        $this->Model->update_data('key', 'id', '85', $data);
        $this->session->set_flashdata('success', 'Tujuan Pembelajaran Behrasil di Update');
        redirect('c_guru/ki_kd');
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
        $this->menu('theme_2/guru/ki_kd', $data);
    }
    public function simpan_ki()
    {
        $data_input = array(
            'isi' => $this->input->post('isi3'),
            'isi2' => $this->input->post('isi2'),
            'jenis' => 'ki',
        );
        $this->Model->insert_data('ki_kd', $data_input);
        $this->session->set_flashdata('success', 'Kompetensi Inti Berhasil di Tambahkan');
        redirect('c_guru/ki_kd');
    }
    public function hapus_ki($id)
    {
        $this->Model->delete_data('ki_kd', 'id', $id);
        $this->session->set_flashdata('success', 'Hapus data berhasil');
        redirect('c_guru/ki_kd');
    }
    public function simpan_ki_edit($id)
    {
        $data_edit = array(
            'isi' => $this->input->post('isi3'),
            'isi2' => $this->input->post('isi2'),
        );
        //print_r($data_edit);
        $this->Model->update_data('ki_kd', 'id', $id, $data_edit);
        $this->session->set_flashdata('success', 'Edit KI berhasil di lakukan');
        redirect('c_guru/ki_kd');
    }
    public function simpan_kd()
    {

        $data_input = array(
            'isi' => '-',
            'isi2' => $this->input->post('isi2'),
            'jenis' => 'kd',
        );
        $this->Model->insert_data('ki_kd', $data_input);
        $this->session->set_flashdata('success', 'Kompetensi Dasar Berhasil di Tambahkan');
        redirect('c_guru/ki_kd');
    }

    public function simpan_indikator()
    {
        $data_input = array(
            'isi' => '-',
            'isi2' => $this->input->post('isi2'),
            'jenis' => 'indikator',
        );
        $this->Model->insert_data('ki_kd', $data_input);
        $this->session->set_flashdata('success', 'Indikator Berhasil di Tambahkan');
        redirect('c_guru/ki_kd');
    }
    // this user for make question
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
        $this->menu('theme_2/guru/question', $respon);
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
    public function saveAnswer(Type $var = null)
    {
        $id_question = $this->input->post('id_question');
        $insert = [
            'id_user' => $this->session->userdata('id_user'),
            'question' => $this->input->post('answer'),
            'status' => 0,
            'type' => 'answer',
            'reply' => $id_question,
            'create_at' => date('Y-m-d H:i:s'),
        ];
        $this->Model->update_data('question', 'id_question', $id_question, ['status' => 0]);
        $this->question->store($insert);
        $this->session->set_flashdata('success', 'Jawaban Berhasil di kirim');
        redirect('c_guru/question');

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

    }
    //
    public function cloud(Type $var = null)
    {
        $data = null;
        $this->menu('theme_2/guru/cloud', $data);
    }
    public function absen(Type $var = null)
    {$attendance = $this->Model->getAttendance();
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
                    'id_guru' => $value['id_guru'],
                ];
            }
            $data['attendance'] = $result;
        }
        $this->menu('theme_2/guru/attendance', $data);
        // echo json_encode($data);
    }
    // delete absen
    public function delete_absen(Type $var = null)
    {
        $id = $this->input->post('id');
        $this->Model->delete_data('attendance', 'id_attendance', $id);
        $this->session->set_flashdata('success', 'Hapus data berhasil');
        redirect('c_guru/absen');
    }
    // eddit attendance
    public function edit_attendance(Type $var = null)
    {
        $id = $this->input->post('id');
        $data = $this->Model->find_data('attendance', 'id_attendance', $id)->row_array();
        echo json_encode($data);
    }
    public function detail_attendance($id)
    {
        $data['attendance'] = $this->Model->findAttendance($id);
        $data['fillAttendance'] = $this->Model->getFillAttendance($id);
        $data['back'] = base_url('c_guru/absen');
        // echo json_encode($data);
        $this->menu('theme_2/guru/fill_attendance', $data);
    }
    // make absen
    public function absenMake($status)
    {
        $insert = [
            'id_guru' => $this->session->userdata('id_user'),
            'class_name' => $this->input->post('class_name'),
            'date_attendance' => $this->input->post('date_attendance'),
        ];
        if ($status == 'add') {
            $this->Model->insert_data('attendance', $insert);
            $this->session->set_flashdata('success', 'Data kelas berhasil di simpan');
        } elseif ($status == 'edit') {
            $id = $this->input->post('id_edit');
            $this->Model->update_data('attendance', 'id_attendance', $id, $insert);
            $this->session->set_flashdata('success', 'Data kelas berhasil di update');
        }
        redirect('c_guru/absen');
        // echo json_encode($insert);
    }
    // tutorial
    public function tutorial(Type $var = null)
    {
        $data['tutorial'] = $this->Model->get_data('tutorial', 'id_tutorial', 'desc')->result_array();
        $this->menu('theme_2/guru/tutorial', $data);
    }
    public function store_tutorial(Type $var = null)
    {
        $judul = $this->input->post('judul');
        $file = $this->upload_file(1);
        if ($file['status'] == 'errors') {
            $this->session->set_flashdata('error', $file['erros']);
            redirect('c_guru/tutorial');
        } else {
            $insert = [
                'title' => $judul,
                'file' => $file['data']['file_name'],
                'id_user' => $this->session->userdata('id_user'),
                'create_at' => date('d-m-Y H:i:s'),
            ];
            $this->Model->insert_data('tutorial', $insert);
            $this->session->set_flashdata('success', 'Materi berhasil di tambahkan');
            redirect('c_guru/tutorial');
        }
    }
    public function delete_tutorial(Type $var = null)
    {
        $id = $this->input->post('id_tutorial');
        $this->Model->delete_data('tutorial', 'id_tutorial', $id);
        $this->session->set_flashdata('success', 'Data tutorial berhasil di hapus');
        redirect('c_guru/tutorial');
    }
    public function tes()
    {
        $this->load->view('theme_2/guru/tes');

    }
    // use for developer menu
    public function developer()
    {
        $data['setting'] = $this->Model->get_data('profil_app', 'id_profil', 'asc')->result();
        $setting = [[
            'jenis_profil' => 'app_name',
            'setting_profil' => 'SMA',
            'setting_type' => 'text',
        ], [
            'jenis_profil' => 'favicon',
            'setting_profil' => 'SMA',
            'setting_type' => 'file',
        ], [
            'jenis_profil' => 'login_foto',
            'setting_profil' => '',
            'setting_type' => 'file',
        ]];
        if ($data['setting'] == null) {
            $this->Model->insert_back('profil_app', $setting);
            $data['setting'] = $this->Model->get_data('profil_app', 'id_profil', 'asc')->result();
        }

        // exit;echo json_encode($data);
        $this->menu('theme_2/guru/developer', $data);
    }
    public function update_setting()
    {
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        $profil = $this->input->post('profil');
        if ($type == 'text') {
            $this->Model->update_data('profil_app', 'id_profil', $id, ['setting_profil' => $profil]);
        }
        echo json_encode(['status' => 'success']);
    }

    // store profil
    public function store_profil()
    {
        $nama_lengkap = $this->input->post('nama_lengkap');
        $panggilan = $this->input->post('panggilan');
        $ttl = $this->input->post('ttl');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $store = ['setting_profil' => json_encode([
            'nama_lengkap' => $nama_lengkap,
            'panggilan' => $panggilan,
            'ttl' => $ttl,
            'jenis_kelamin' => $jenis_kelamin,
            'no_hp' => $no_hp,
            'email' => $email,
            'alamat' => $alamat,
        ])];
        $this->Model->update_data('profil_app', 'jenis_profil', 'about_developer', $store);
        $response = [
            'status' => 'success',
            'msg' => 'Data berhasil di perbarui',
            'data' => $store,
        ];
        echo json_encode($response);
    }

}
