<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Insert_model', 'put');
        $this->load->model('Select_model', 'get');
        $this->load->model('Update_model', 'set');
        $this->load->model('User_model', 'user');

        $this->load->library('upload');
        $this->load->library('common');
        $this->load->library('lineapi');

        $this->load->library('facebook');
        $this->load->helper('url');
    }

    public function index() {
        $data["login"] = true;
        $data["register"] = false;
        if ($this->input->get("register") == "success") {
            $data["register"] = true;
        }
        if ($_POST) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $remember_me = 'on';

            $result = $this->user->user_login($email, md5($password), $remember_me);
            $user = $this->user->get_account_cookie();
            $token = $user['token'];
            if ($result) {
                redirect(base_url());
            }
            $data["login"] = false;
        }

        $user = $this->user->get_account_cookie();
        if ($this->user->is_login()) {
            $token = $user['token'];
            redirect(base_url());
        }


        $this->load->view('login/index', $data);
    }

    public function fbaccess() {
        $data['user'] = array();

        // Check if user is logged in
        if ($this->facebook->is_authenticated()) {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email');
            if (!isset($user['error'])) {
                $data['user'] = $user;
                $id = $user["id"];
                $name = $user["name"];
                $email = $user["email"];

                if ($this->get->userfromemail($email) == 0) {
                    redirect(base_url("register?email=$email&name=$name&id=$id"));
                } else {
                    $remember_me = 'on';

                    $result = $this->user->user_login_fbid($id, $remember_me);
                    $user = $this->user->get_account_cookie();
                    if ($result) {
                        redirect(base_url());
                    } else {
                        redirect(base_url("register"));
                    }
                }
            }
        }
    }

}
