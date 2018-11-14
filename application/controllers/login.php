<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //load model m_logbook
        $this->load->model('m_logbook');
        $this->load->library('form_validation');
    }
    public function index()
    {
            if($this->m_logbook->logged_id())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("admin");
            }else{
                //jika session belum terdaftar
                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = $this->input->post('password', TRUE);

                //checking data via model
                $checking = $this->m_logbook->chek_login('user', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_name' => $apps->username,
                            'user_pass' => $apps->password,
                            'status' => 'login',
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);
                        redirect('admin');

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('admin/view/login', $data);
                }

            }else{

                $this->load->view('admin/view/login');
            }

        }

    }
}