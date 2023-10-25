<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function get_data($tabel)
    {
        return $this->db->get($tabel);
        $this->db->join('akun', 'absensi.id_karyawan = akun.id', 'left');
    }
    public function registeruser($data)
    {
        $this->db->insert('user', $data);
    }

    public function getKaryawan()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    // Profile Start
    public function image_akun()
    {
        $id_karyawan = $this->session->akundata('id');
        $this->db->select('image');
        $this->db->from('akun');
        $this->db->where('id_karyawan');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->image;
        } else {
            return false;
        }
    }

    public function get_admin_image_by_id($id)
    {
        $this->db->select('image');
        $this->db->from('akun');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->image;
        } else {
            return false;
        }
    }
    public function update_image($akun_id, $new_image)
    {
        $data = [
            'image' => $new_image,
        ];

        $this->db->where('id', $akun_id); // Sesuaikan dengan kolom dan nama tabel yang sesuai
        $this->db->update('akun', $data); // Sesuaikan dengan nama tabel Anda

        return $this->db->affected_rows(); // Mengembalikan jumlah baris yang diupdate
    }

    public function get_current_image($akun_id)
    {
        $this->db->select('image');
        $this->db->from('akun'); // Gantilah 'akun_table' dengan nama tabel Anda
        $this->db->where('id', $akun_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->image;
        }

        return null; // Kembalikan null jika data tidak ditemukan
    }

    public function getRekapHarian()
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->group_by('date');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPerHari($tanggal)
    {
        $this->db->select('absensi.*, user.username');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $this->db->where('date', $tanggal);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($tabel, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    public function getBulanan($bulan)
    {
        $this->db->select('absensi.*, user.username');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $this->db->where("DATE_FORMAT(date, '%m') = ", $bulan); // Perbaikan di sini
        $query = $this->db->get();
        return $query->result();
    }

    public function getRekapPerMinggu($start_date, $end_date)
    {
        $this->db->select('absensi.*, user.username');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $this->db->where('date >', $start_date);
        $this->db->where('date <', $end_date);
        $query = $this->db->get();
        return $query->result();
    }
    public function getRekapPerBulan($bulan)
    {
        $this->db->select('MONTH(date) as bulan, COUNT(*) as total_absensi');
        $this->db->from('absensi');
        $this->db->where('MONTH(date)', $bulan); // Menyaring data berdasarkan bulan
        $this->db->group_by('bulan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRekapHarianByBulan($bulan)
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where('MONTH(absensi.date)', $bulan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataAbsensi()
    {
        // Ganti 'absensi' dengan tabel yang sesuai dalam database Anda
        $this->db->select('absensi.*, user.username');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        return $this->db->get()->result();
    }

    public function get_data_by_role($role)
    {
        $this->db->where('role', $role);
        return $this->db->get('user');
    }

    public function getuserByID($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function delete($table, $field, $id)
    {
        $data = $this->db->delete($table, [$field => $id]);
        return $data;
    }
}
