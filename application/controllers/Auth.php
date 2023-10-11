<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{
 function __construct()
{
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('user_model'); // Juga pastikan model User_model dimuat jika digunakan.
    $this->load->model('m_model'); // Juga pastikan model User_model dimuat jika digunakan.
 
 
}

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function register_admin()
    {
        $this->load->view('auth/register_admin');
    }
    public function aksi_register()
    {
        // Validasi input
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[user.email]'
        );
        $this->form_validation->set_rules(
            'nama_depan',
            'Nama Depan',
            'required'
        );
        $this->form_validation->set_rules(
            'nama_belakang',
            'Nama Belakang',
            'required'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]'
        );

        if ($this->form_validation->run() === false) {
            // Jika validasi gagal, tampilkan kembali halaman registrasi
            $this->load->view('auth/register');
        } else {
            // Jika validasi sukses, ambil data dari form
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'nama_depan' => $this->input->post('nama_depan'),
                'nama_belakang' => $this->input->post('nama_belakang'),
                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'role' => 'karyawan', // Default role adalah karyawan
            ];

            // Cek apakah registrasi ini adalah admin
            if ($this->input->post('admin_code') == 'admin_secret_code') {
                $data['role'] = 'admin'; // Jika kode rahasia admin cocok, set role sebagai admin
            }

            // Simpan data ke dalam database
            $this->User_model->registerUser($data);

            // Redirect pengguna ke halaman login atau halaman lain yang sesuai
            redirect('auth');
        }
    }
    
    public function aksi_login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $data = ['email' => $email,];
        $query = $this->m_model->getwhere('user', $data);
        $result = $query->row_array();

        if (!empty($result) && md5($password) === $result['password']) {
            $data = [
                'logged_in' => TRUE,
                'email' => $result['email'],
                'username' => $result['username'],
                'role' => $result['role'],
                'id' => $result['id'],
            ];
            $this->session->set_userdata($data);

            if ($this->session->userdata('role') == 'admin') {
                redirect(base_url() . "admin");
            }elseif ($this->session->userdata('role') == 'karyawan') {  
                redirect(base_url()."employee/dashboard");
            }
        } else {
            redirect(base_url() . "employee/dashboard");
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth/index'));
    } 
}
?>