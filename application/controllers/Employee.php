<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
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
        $this->load->view('employee/karyawan');
    }

    public function dashboard()
    {
        $this->load->view('employee/dashboard');
    }

    public function tambah_absen()
    {
        $this->load->view('employee/tambah_absen');
    }

    public function save_absensi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_datetime = date('Y-m-d H:i:s');

        $data = [
            'kegiatan' => $this->input->post('kegiatan'),
            'date' => $current_datetime,
            'jam_masuk' => $current_datetime,
            'jam_pulang' => $current_datetime,
        ];

        $this->load->model('Absensi_model');
        $this->Absensi_model->createAbsensi($data);

        redirect('employee/history');
    }

    public function ubah_absensi()
    {
        $this->load->view('employee/tambah_ubah_absensi');
    }

    
    public function izin()
    {
        $this->load->view('employee/izin');
    }

    public function simpan_izin()
{
    // Tangkap data yang dikirimkan melalui POST
    $keterangan_izin = $this->input->post('kegiatan');

    // Load model yang diperlukan untuk menyimpan data izin
    $this->load->model('Izin_model');

    // Siapkan data izin yang akan disimpan
    $data = [
        'keterangan_izin' => $keterangan_izin,
        // Kolom lainnya tidak perlu diisi atau dapat diisi dengan nilai default
    ];

    // Panggil model untuk menyimpan data izin
    $this->Izin_model->simpanIzin($data);

    // Setelah selesai, Anda bisa mengarahkan pengguna kembali ke halaman "history"
    redirect('employee/history');
}


    public function pulang($absen_id) {
        if ($this->session->userdata('role') === 'karyawan') {
            $this->karyawan_model->setAbsensiPulang($absen_id);
    
            // Set pesan sukses
            $this->session->set_flashdata('success', 'Jam pulang berhasil diisi.');
    
            // Panggil fungsi JavaScript untuk menampilkan SweetAlert2
            echo '<script>showSweetAlert("Jam pulang berhasil diisi.");</script>';
    
            redirect('karyawan/history');
        } else {
            redirect('other_page');
        }
    }

    public function history()
    {
        $this->load->model('Absensi_model');
        $data['absensi'] = $this->Absensi_model->getAbsensi();
        $this->load->view('employee/history', $data);
    }

    public function hapus($absen_id) {
        if ($this->session->userdata('role') === 'karyawan') {
            $this->karyawan_model->hapusAbsensi($absen_id);
            redirect('karyawan/history_absen');
        } else {
            redirect('other_page');
        }
    }
}