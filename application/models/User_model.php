<?php
class user_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk menambahkan pengguna ke database
    public function registeruser($data)
    {
        $this->db->insert('user', $data);
    }

    // Fungsi untuk memeriksa kredensial pengguna saat login
    public function checkLogin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();

        $user = $query->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    // Fungsi untuk mendapatkan data pengguna berdasarkan ID
    public function getuserByID($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }
    public function getUserByEmail($email)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();

        return $query->row();
    }

    // Fungsi untuk mendapatkan data semua karyawan
    public function getAllKaryawan()
    {
        $this->db->select('*');
        $this->db->from('User');
        $this->db->where('role', 'karyawan');
        $query = $this->db->get();

        return $query->result();
    }

    // Fungsi untuk memperbarui informasi profil pengguna
    public function updateProfile($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('User', $data);
    }

    // Fungsi untuk menghapus pengguna berdasarkan ID
    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('User');
    }

    public function updateUserFoto($user_id, $foto)
    {
        $data = ['foto' => $foto];
        $this->db->where('id', $user_id);
        $this->db->update('User', $data);
    }

    public function ubah_absensi($table, $data, $where)
    {
        $data = $this->db->user_model($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function update_data($table, $data, $where) {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }
}
?>