<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model dan library yang diperlukan
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function karyawan()
    {
        $this->load->view('karyawan/karyawan');
    }
}