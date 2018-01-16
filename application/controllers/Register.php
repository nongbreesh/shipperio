<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Insert_model', 'put');
        $this->load->model('Select_model', 'get');
        $this->load->model('Update_model', 'set');
        $this->load->model('User_model', 'user');

        $this->load->library('upload');
        $this->load->library('common');
        $this->load->library('lineapi');
    }

    public function index() {
        $data["emaildoesexit"] = false;
        $data["webnamedoesexit"] = false;
        $data["register"] = false;

        $data["email"] = $this->input->get('email');
        $fbid = $this->input->get('id');
        $data["name"] = explode(' ', $this->input->get('name'));
        if (!$fbid) {
            redirect(base_url("login"));
        }
        if ($_POST) {
            $email = $data["email"];
            $password = $this->input->post('password');
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $cond = array('email' => $email);
            if ($this->get->user($cond)->num_rows() > 0) {
                $data["emaildoesexit"] = true;
            } else {
                $password = $this->input->post('password');
                $token = $this->common->getToken(10);
                $input = array(
                    'email' => $email,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'image' => base_url("public/avatar.png"),
                    'password' => md5($password),
                    'fbid' => $fbid,
                );
                $this->put->user($input);

                $remember_me = 'on';
                $result = $this->user->user_login_fbid($fbid, $remember_me);
                $user = $this->user->get_account_cookie();
                if ($result) {
                    redirect(base_url());
                } else {
                    redirect(base_url("register"));
                }
                //$data["register"] = true;
                // redirect(base_url("login?register=success"));
            }
        }

        $cm_account = $this->user->get_account_cookie();
        if ($this->user->is_login()) {
            redirect(base_url("account"));
        }

        $this->load->view('register/index', $data);
    }

}
