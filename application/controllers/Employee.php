<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model dan library yang diperlukan
        $this->load->model('absensi_model');
        $this->load->model('m_model');
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
 
    public function profile()
	{
		$data['akun'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
		$this->load->view('employee/profil', $data);
	}
    // public function profil()
    // {
    //     if ($this->session->userdata('id')) {
    //         $user_id = $this->session->userdata('id');
    //         $data['user'] = $this->User_model->getUserById($user_id);

    //         $this->load->view('Employee/profil', $data);
    //     } else {
    //         redirect('auth/register');
    //     }
    // }

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
        $this-> Absensi_model->createAbsensi($data);

        redirect('employee/history');
    }

    public function ubah_absensi($id)
    {
        // Ambil data absensi berdasarkan ID
        $data['absen'] = $this->absensi_model->getAbsensiById($id);

        // Muat tampilan dan teruskan variabel $data
        $this->load->view('employee/ubah_absensi', $data);
    }

    public function aksi_ubah_absensi()
    {
        $id_karyawan = $this->session->userdata('id');
        $data = [
            'kegiatan' => $this->input->post('kegiatan'),
        ];

        $eksekusi = $this->absensi_model->update_data('absensi', $data, array('id' => $this->input->post('id')));

        if ($eksekusi) {
            $this->session->set_flashdata('berhasil_update', 'Berhasil mengubah kegiatan');
            redirect(base_url('employee/history'));
        } else {
            redirect(base_url('employee/ubah_absensi/'.$this->input->post('id')));
        }
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

    public function aksi_ubah_akun()
    {
        $foto = $this->upload_image_karyawan('foto');
        if ($foto[0] == false) {
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $data = [
                'foto' => 'User.png',
                'email' => $email,
                'username' => $username,
            ];
            if (!empty($password_baru)) {
                if ($password_baru === $konfirmasi_password) {
                    $data['password'] = md5($password_baru);
                } else {
                    $this->session->set_flashdata(
                        'message',
                        'Password baru dan Konfirmasi password harus sama'
                    );
                    redirect(base_url('employee/akun'));
                }
            }
            $this->session->set_userdata($data);
            $update_result = $this->m_model->update('user', $data, [
                'id' => $this->session->userdata('id'),
            ]);

            if ($update_result) {
                redirect(base_url('employee/akun'));
            } else {
                redirect(base_url('employee/akun'));
            }
        } else {
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $data = [
                'foto' => $foto[1],
                'email' => $email,
                'username' => $username,
            ];
            if (!empty($password_baru)) {
                if ($password_baru === $konfirmasi_password) {
                    $data['password'] = md5($password_baru);
                } else {
                    $this->session->set_flashdata(
                        'message',
                        'Password baru dan Konfirmasi password harus sama'
                    );
                    redirect(base_url('admin/akun'));
                }
            }
            $this->session->set_userdata($data);
            $update_result = $this->m_model->update('user', $data, [
                'id' => $this->session->userdata('id'),
            ]);

            if ($update_result) {
                redirect(base_url('employee/akun'));
            } else {
                redirect(base_url('employee/akun'));
            }
        }
    }


    public function history()
    {
        $this->load->model('Absensi_model');
        $data['absensi'] = $this->Absensi_model->getAbsensi();
        $this->load->view('employee/history', $data);
    }

    public function hapus($id)
    {
        $this->m_model->delete('absensi', 'id', $id);
        $this->session->set_flashdata(
            'berhasil_menghapus',
            'Data berhasil dihapus.'
        );
        redirect(base_url('employee/history'));
    }
    
}