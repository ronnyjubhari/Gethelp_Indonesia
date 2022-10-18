<?php

use Google\Service\CloudHealthcare\Type;

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //kalo belum login
        is_logged_in();
        $this->load->helper(array('url', 'download'));
        $this->load->model('users_model');
    }

    public function index()
    {
        $data['title'] = "Daftar Users";
        $data['user'] = $this->users_model->getuserlogin($this->session->userdata('admin_data'));
        $data['users'] = $this->users_model->getuser();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/users', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = "Detail Users";
        $data['user'] = $this->users_model->getuserlogin($this->session->userdata('admin_data'));
        $data['users'] = $this->users_model->getuserdetail($id);

        $data['yayasan'] = $this->users_model->getorganisasi($id);
        // var_dump($data['yayasan']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $data['user'] = $this->users_model->getuser($id, '');
        $data['biodata'] = $this->users_model->getbiodata($id);
        $data['yayasan'] = $this->users_model->getorganisasi($id);
        $imageuser = $data['user']['image'];
        $jenisakun = $data['user']['jenis_akun'];
        if ($data['biodata'] != null) {
            $ktpbiodata = $data['biodata']['ktp'];
            $ktpselfie = $data['biodata']['selfie_ktp'];
        }
        if ($data['yayasan'] != null) {
            $ktppj = $data['yayasan']['ktp_pj'];
            $berkasP = $data['yayasan']['berkas_pendukung'];
        }
        if ($jenisakun == 'Individu' && $data['biodata'] != null) {
            if ($imageuser != 'default.png') {
                unlink(FCPATH . 'assets/img/users/profile/' . $imageuser);
            }
            unlink(FCPATH . 'assets/img/users/ktp/' . $ktpbiodata);
            unlink(FCPATH . 'assets/img/users/selfie/' . $ktpselfie);
            $this->users_model->hapus($id);
            $this->users_model->deletebiodata($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('users');
        } elseif ($jenisakun == 'Individu' && $data['biodata'] == null) {
            if ($imageuser != 'default.png') {
                unlink(FCPATH . 'assets/img/users/profile/' . $imageuser);
            }
            $this->users_model->hapus($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('users');
        } elseif ($jenisakun != 'Individu') {
            if ($imageuser != 'default.png') {
                unlink(FCPATH . 'assets/img/users/profile/' . $imageuser);
            }
            unlink(FCPATH . 'assets/img/users/ktp/' . $ktpbiodata);
            unlink(FCPATH . 'assets/img/users/selfie/' . $ktpselfie);
            unlink(FCPATH . 'assets/img/users/ktppj/' . $ktppj);
            if ($data['yayasan']['berkas_pendukung'] != '') {
                unlink(FCPATH . 'assets/img/users/berkasP/' . $berkasP);
            }
            $this->users_model->hapus($id);
            $this->users_model->deletebiodata($id);
            $this->users_model->deleteorganisasi($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil dihapus button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('users');
        }
    }

    public function ubahstatus()
    {
        $this->form_validation->set_rules('user_id', 'user_id', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal Mengubah Status
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('users');
        } else {
            $nama = $this->input->post('namauser');
            $email = $this->input->post('emailuser');
            $id = $this->input->post('user_id');
            $status = $this->input->post('status');
            $verifikasi = $this->input->post('verifikasi');

            $data['users'] = $this->users_model->getuser($id);
            $data['biodata'] = $this->users_model->getbiodata($id);
            $data['yayasan'] = $this->users_model->getorganisasi($id);
            $jenisakun = $data['user']['jenis_akun'];
        if ($data['biodata'] != null) {
            $ktpbiodata = $data['biodata']['ktp'];
            $ktpselfie = $data['biodata']['selfie_ktp'];
        }
        if ($data['yayasan'] != null) {
            $ktppj = $data['yayasan']['ktp_pj'];
            $berkasP = $data['yayasan']['berkas_pendukung'];
        }
            $oldverifikasi = $data['users']['verifikasi'];
            $oldstatus = $data['users']['status'];


            $this->users_model->ubahstatus($status, $verifikasi, $id);
            if ($verifikasi == '1') {
                $this->_sendemail($nama, $email, 'diverifikasi');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Status user berhasil diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('users');
            } elseif ($verifikasi == '2' || $verifikasi == $oldverifikasi) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Status user berhasil diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('users');
            } elseif ($verifikasi == '0' && $status != $oldstatus) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Status user berhasil diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('users');
            } elseif ($verifikasi == '0') {
                 unlink(FCPATH . 'assets/img/users/ktp/' . $ktpbiodata);
                unlink(FCPATH . 'assets/img/users/selfie/' . $ktpselfie);
                unlink(FCPATH . 'assets/img/users/ktppj/' . $ktppj);
                if ($data['yayasan']['berkas_pendukung'] != '') {
                unlink(FCPATH . 'assets/img/users/berkasP/' . $berkasP);
                }
                $this->_sendemail($nama, $email, 'ditolak');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Status user berhasil diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('users');
            }
        }
    }

    private function _sendemail($username, $to, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'mail.gethelpid.com',
            'smtp_user' => 'support@gethelpid.com',
            'smtp_crypto' => 'ssl',
            'smtp_pass' => 'cpanelgethelp',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"

        ];


        $image = base_url('assets/img/logo.png');
        $this->load->library('email', $config);
        $this->email->initialize($config);


        $this->email->from('support@gethelpid.com', 'GetHelp');
        $this->email->to($to);


        $this->email->subject('Status request verifikasi akun');

        if ($type == 'diverifikasi') {
            $this->email->message('
            <table width="100%" bgcolor="#ffffff" border="0" cellpadding="10" cellspacing="0" align="center"> 
        <tbody>
          <td align="center">
            <table>
              <tbody>
                <tr>
                  <td valign="top">
        <h3>Hi, ' . $username . '</h3>
  <p>Kami ingin mengabari Anda tentang status verifikasi akun Anda. Kami telah memverifikasi akun Anda.</p>
  <p>Sekarang Anda bisa melakukan galang dana. Anda bisa bergalang dana di <a href="' . base_url() . '" target="_blank">Website Gethelp</a></p>
  <p>Hormat kami,</p>
  <p style="margin-bottom:10px">
  <img src="' . $image . '" style="width: 30%;">
  </p>
  </td>
  </tr>
  </tbody>
  </table>
  </td>
  </tbody>
      </table>
            ');
        } else {
            $this->email->message('
            <table width="100%" bgcolor="#ffffff" border="0" cellpadding="10" cellspacing="0" align="center"> 
        <tbody>
          <td align="center">
            <table>
              <tbody>
                <tr>
                  <td valign="top">
        <h3>Hi, ' . $username . '</h3>
        <p>Kami ingin mengabari Anda tentang status verifikasi akun Anda. Verifikasi akun Anda belum berhasil, karena data verifikasi akun Anda kurang lengkap atau data yang Anda berikan tidak valid.</p>
        <p>Anda bisa melakukan verifikasi akun Anda lagi di <a href="' . base_url() . '" target="_blank">Website Gethelp</a></p>
  <p>Hormat kami,</p>
  <p style="margin-bottom:10px">
  <img src="' . $image . '" style="width: 30%;">
  </p>
  </td>
  </tr>
  </tbody>
  </table>
  </td>
  </tbody>
      </table>
            ');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }



    public function download($filename)
    {
        $folder = 'assets/img/users/ktp/';


        force_download($folder . $filename, NULL);
    }

    public function downloadselfie($filename)
    {
        $folder = 'assets/img/users/selfie/';


        force_download($folder . $filename, NULL);
    }

    public function downloadnpwp($filename)
    {
        $folder = 'assets/img/users/npwp/';


        force_download($folder . $filename, NULL);
    }
}
