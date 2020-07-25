<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->has_userdata('user_logged')) {
            redirect('Home');
        }
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $data = array();
        $data['title'] = "Halaman Login";
        $this->load->view('login', $data);
    }

    function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->Auth_model->cek_login("admin", $where)->num_rows();
        if ($cek > 0) {

            $data_session = array(
                'nama' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);

            redirect(base_url("Home"));
        } else {
            redirect(base_url("Auth"));
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("Auth"));
    }
}
