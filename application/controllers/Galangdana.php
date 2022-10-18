<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galangdana extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        
        $this->load->library('form_validation');
        $this->load->model('galangdana_model');
        $this->load->model('users_model');
        $this->load->model('donasi_model');
    }

    public function index()
    {
        $data['user'] = $this->users_model->getuserlogin($this->session->userdata('user_data'));
        $data['title'] = 'Mulai Galang Dana - GetHelp';
        if ($data['user'] != '') {
            $data['verifikasi'] = $data['user']['verifikasi'];
        } else {
            $data['verifikasi'] = 4; //user belum login
        }
        $data['js'] = '';
        $data['css'] = 'css2';

        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('home/panduan-galang-dana', $data);
    }

    public function mulai()
    {
        user_sudah_login();
        $data['user'] = $this->users_model->getuserlogin($this->session->userdata('user_data'));

        if ($data['user']['verifikasi'] != 1) {
            redirect('panduan-galang-dana');
        }
        $data['title'] = 'Galang Dana - GetHelp';
        $data['css'] = 'summernote';
        $data['category'] = $this->donasi_model->getcategory();
        $data['js'] = '';
        $userid = $data['user']['id'];
        $email = $data['user']['email'];


        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => '*Nama wajib diisi!'
        ]);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => '*Wajib pilih salah satu'
        ]);
        $this->form_validation->set_rules('judul', 'Judul', 'required|min_length[8]|max_length[45]|is_unique[campaign.nama_campaign]', [
            'required' => '*Wajib diisi',
            'min_length' => '*Judul terlalu pendek',
            'is_unique' => '*Judul telah digunakan di galang dana lainnya',
            'max_length' => '*Judul terlalu panjang'
        ]);
        $this->form_validation->set_rules('targetdonasi', 'Targetdonasi', 'required|trim|min_length[8]', [
            'required' => '*Wajib di isi',
            'min_length' => '*Target donasi minimal Rp. 1.000.000',

        ]);
        $this->form_validation->set_rules('date', 'Date', 'required', [
            'required' => '*Wajib diisi',
        ]);
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|min_length[8]', [
            'required' => '*Wajib diisi',
            'min_length' => '*Tujuan terlalu pendek'
        ]);
        $this->form_validation->set_rules('penerima', 'Penerima', 'required', [
            'required' => '*Wajib diisi'
        ]);
        $this->form_validation->set_rules('rincian', 'Rincian', 'required', [
            'required' => '*Wajib diisi'
        ]);
        if (empty($_FILES['thumbnail']['name'])) {
            $this->form_validation->set_rules('thumbnail', 'Thumbnail', 'required', [
                'required' => '*Foto wajib dikirim!'
            ]);
        }
        $this->form_validation->set_rules('cerita', 'Cerita', 'required', [
            'required' => '*Wajib diisi'
        ]);
        $this->form_validation->set_rules('persetujuan', 'Persetujuan', 'required', [
            'required' => '*Wajib dicentang'
        ]);

        if ($this->form_validation->run() == true) {

            $namauser = $this->input->post('nama');
            $kategori =  $this->input->post('kategori');
            $judul =  $this->input->post('judul');
            $targetdonasi = preg_replace("/[^0-9]/", "", $this->input->post('targetdonasi'));
            $tglberakhir =  $this->input->post('date');
            $tujuan =  $this->input->post('tujuan');
            $penerima =  $this->input->post('penerima');
            $rincian =  $this->input->post('rincian');
            $cerita =  $this->input->post('cerita');
            $slug = url_title($judul, 'dash', true);
            $tgldibuat = date("Y-m-d");
            $namaimage = 'thumb' . $userid . $judul;

            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['overwrite']   = true;
            $config['file_name']  = $namaimage;
            $config['upload_path'] = './assets/img/donasithumb/';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('thumbnail')) {
                // jika tidak berhasil
                $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                $this->load->view('templates/home_header', $data);
                $this->load->view('templates/home_topbar', $data);
                $this->load->view('home/form-galang-dana', $data);
            } else {

                $thumbnail = $this->upload->data('file_name');
                $this->galangdana_model->insertnewcampaign($userid, $judul, $slug, $tujuan, $penerima, $rincian, $kategori, $thumbnail, $tgldibuat, $tglberakhir, 2, $cerita, $targetdonasi);
                $this->session->set_flashdata('message', 'Terima kasih telah mengalang dana di Gethelp, 
                    status galang dana Anda dalam tahap evaluasi. Kami akan menginformasikan
                     Anda melalui email tentang status terbaru galang dana Anda.');
                $this->_sendemail($namauser, $email);
                redirect('user');
            }
        } else {

            $this->load->view('templates/home_header', $data);
            $this->load->view('templates/home_topbar', $data);
            $this->load->view('home/form-galang-dana', $data);
        }
    }



    private function _sendemail($username, $to)
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


        $this->email->subject('Galang Dana');

        $this->email->message('
                <table width="100%" bgcolor="#ffffff" border="0" cellpadding="10" cellspacing="0" align="center"> 
            <tbody>
              <td align="center">
                <table>
                  <tbody>
                    <tr>
                      <td valign="top">
            <h3>Hi, ' . $username . '</h3>
      <p>Terima kasih telah mengalang dana di <a href= "' . base_url() . '" target="_blank">Gethelp</a>. Tim kami akan melakukan evaluasi data campaign Anda.</p>
      <p>Untuk sekarang status dari campaign Anda dalam masa pending/sedang di evaluasi.</p>
      <p>Kami akan mengabari status terbaru campaign Anda di email Anda.</p>
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

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
