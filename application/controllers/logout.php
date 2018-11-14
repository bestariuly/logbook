<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //load model m_logbook
        $this->load->model('m_logbook');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_pass');
        $this->session->unset_userdata('status');
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }            
}