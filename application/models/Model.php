<?php
class Model extends CI_Model
{
    public function insert_data($tabel, $data_input)
    {
        $this->db->insert($tabel, $data_input);
    }
    public function insert_back($tabel, $object)
    {
        $this->db->insert_batch($tabel, $object);
    }
    public function find_data_evaluasi($tabel, $reference_field, $reference)
    {
        $id = array($reference, '4');
        $this->db->where_in($reference_field, $id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get($tabel);
    }
    public function find_data($tabel, $reference_field, $reference)
    {
        $this->db->where($reference_field, $reference);
        return $this->db->get($tabel);
    }
    public function get_data($table, $id, $order)
    {
        $this->db->order_by($id, $order);
        return $this->db->get($table);
    }
    public function get_data_limit_order($tabel, $id_reference, $order, $limit)
    {
        $this->db->order_by($id_reference, $order);
        return $this->db->get($tabel, $limit);

    }
    public function update_data($tabel, $id_reference, $reference, $data_input)
    {
        $this->db->where($id_reference, $reference);
        $this->db->update($tabel, $data_input);
    }
    public function delete_data($tabel, $id_reference, $reference)
    {
        $this->db->where($id_reference, $reference);
        $this->db->delete($tabel);
    }
    public function check_account($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('tb_user');
    }
    public function change_password($password_lama, $data)
    {
        $this->db->where('password', $password_lama);
        $this->db->update('tb_user', $data);
    }
    // model tambahan yang di butuhkan
    public function du($uri4)
    {
        return $this->db->query("SELECT a.id, a.tgl_mulai, a.terlambat,
										a.token, a.nama_ujian, a.jumlah_soal, a.waktu,
										b.nama nmguru, c.nama nmmapel,
										(case
											when (now() < a.tgl_mulai) then 0
											when (now() >= a.tgl_mulai and now() <= a.terlambat) then 1
											else 2
										end) statuse
										FROM tr_guru_tes a
										INNER JOIN m_guru b ON a.id_guru = b.id
										INNER JOIN m_mapel c ON a.id_mapel = c.id
        								WHERE a.id = '$uri4'")->row_array();
    }
    public function score_tertinggi($id)
    {
        $this->db->where('id_user', $id);
        $this->db->order_by('nilai', 'desc');
        return $this->db->get('tr_ikut_ujian', 1);
    }
    public function score_tertinggi_guru()
    {
        $this->db->order_by('nilai', 'desc');
        return $this->db->get('tr_ikut_ujian', 1);
    }
    public function score_tertinggi_per_soal($id_soal)
    {
        $this->db->where('id_tes', $id_soal);
        $this->db->order_by('nilai', 'desc');
        return $this->db->get('tr_ikut_ujian', 1);
    }
    public function get_top_score()
    {
        $select =
            'tr_ikut_ujian.nilai,
        tr_ikut_ujian.jml_benar,
        tr_ikut_ujian.tgl_mulai,
        tr_ikut_ujian.tgl_selesai,
        tr_guru_tes.nama_ujian,
        tr_guru_tes.jumlah_soal,
        tr_guru_tes.waktu,
        tb_user.nama'
        ;
        $this->db->select($select);
        $this->db->from('tr_ikut_ujian');
        $this->db->join('tb_user', 'tr_ikut_ujian.id_user = tb_user.id_user');
        $this->db->join('tr_guru_tes', 'tr_ikut_ujian.id_tes = tr_guru_tes.id');
        $this->db->limit(5);
        $this->db->order_by('nilai', 'desc');
        $this->db->order_by('tgl_selesai', 'desc');
        return $this->db->get();
    }
    public function get_data_siswa()
    {
        $this->db->where('level', 'siswa');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get('tb_user');
    }
    public function detail_siswa($id)
    {
        $this->db->where('tr_ikut_ujian.id_user', $id);
        $this->db->from('tr_ikut_ujian');
        $this->db->join('tr_guru_tes', 'tr_ikut_ujian.id_tes = tr_guru_tes.id');
        return $this->db->get();
    }
    public function data_peserta_evaluasi($id_soal)
    {
        $select = array(
            'tr_ikut_ujian.jml_benar',
            'tr_ikut_ujian.nilai',
            'tr_ikut_ujian.tgl_mulai',
            'tr_ikut_ujian.tgl_selesai',
            'tb_user.nama',
        );
        $this->db->select($select);
        $this->db->from('tr_ikut_ujian');
        $this->db->where('id_tes', $id_soal);
        $this->db->join('tb_user', 'tr_ikut_ujian.id_user= tb_user.id_user', 'left');
        return $this->db->get();
    }
    // get data absen
    public function getAttendance(Type $var = null)
    {
        $this->db->from('attendance');
        $this->db->join('tb_user', 'attendance.id_guru = tb_user.id_user', 'left');
        return $this->db->get()->result_array();

    }
    public function findAttendance($id)
    {
        $this->db->from('attendance');
        $this->db->join('tb_user', 'attendance.id_guru = tb_user.id_user', 'left');
        $this->db->where('attendance.id_attendance', $id);
        return $this->db->get()->row_array();

    }
    public function findSiswa($id)
    {
        $this->db->from('fill_attendance');
        $this->db->join('tb_user', 'fill_attendance.id_siswa = tb_user.id_user', 'left');
        $this->db->where('fill_attendance.id_attendance', $id);
        return $this->db->get()->result_array();

    }
    public function getFillAttendance($id_attendance)
    {
        $this->db->from('fill_attendance');
        $this->db->join('tb_user', 'fill_attendance.id_siswa = tb_user.id_user');
        $this->db->where('fill_attendance.id_attendance', $id_attendance);
        return $this->db->get()->result_array();

    }
}
