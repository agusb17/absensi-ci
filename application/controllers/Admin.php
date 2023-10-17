<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model dan library yang diperlukan
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->library('form_validation');
    }

    public function karyawan()
    {
        $data['absensi'] = $this->user_model->getAllKaryawan();
        $this->load->view('admin/karyawan', $data);
    }
    

    public function daftar_karyawan() {
        // Tampilkan halaman dashboard admin di sini
        $this->load->view('admin/daftar_karyawan');
    }

    public function export_karyawan() {
        // Ambil data karyawan untuk diekspor
        $data['karyawan'] = $this->admin_model->exportKaryawan();

        // Lakukan proses ekspor data karyawan di sini (contoh: export ke Excel atau CSV)
        // ...

        // Redirect kembali ke halaman daftar karyawan setelah selesai ekspor
        redirect('admin/karyawan');
    }
    
 public function rekapPerHari() {
  $date = $this->input->get('date');
        $data['perhari'] = $this->admin_model->getRekapHarian($date);
        $this->load->view('admin/rekap_harian', $data);
    }
    
    public function rekapPerMinggu() {
  $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if ($start_date && $end_date) {
            $data['perminggu'] = $this->admin_model->getRekapPerMinggu($start_date, $end_date);
        } else {
            $data['perminggu'] = []; // Atau lakukan sesuai dengan kebutuhan logika Anda jika tanggal tidak ada
        }

  $this->load->view('admin/rekap_mingguan', $data);
  // $data['absensi'] = $this->m_model->getPerMinggu();        
    }
    
    // public function rekap_mingguan($tanggal_awal, $tanggal_akhir) {
    //     // Ambil data rekap mingguan berdasarkan tanggal awal dan akhir
    //     $data['rekap_mingguan'] = $this->admin_model->getRekapMingguan($tanggal_awal, $tanggal_akhir);

    //     // Tampilkan halaman rekap mingguan dengan data
    //     $this->load->view('admin/rekap_mingguan', $data);   

    // }

    public function rekapPerBulan() {
        $bulan = $this->input->get('bulan'); // Ambil bulan dari parameter GET
        $data['rekap_bulanan'] = $this->admin_model->getRekapPerBulan($bulan);
        $data['rekap_harian'] = $this->admin_model->getRekapHarianByBulan($bulan);
        $this->load->view('admin/rekap_bulanan', $data);
    }
}