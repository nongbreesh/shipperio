<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $data["user"] = $this->user->get_account_cookie(); 
       // print_r($data["user"]);
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["menu"] = "home";
        $this->load->view('template/index', $data);
    }

    public function campaign() {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "campaign";
        $data["islogin"] = $this->user->is_login();
        $this->load->view('campaign/index', $data);
    }

    public function item($id) {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "";
        $data["islogin"] = $this->user->is_login();
        $this->load->view('campaign/item', $data);
    }

    public function cart() {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "";
        $data["islogin"] = $this->user->is_login();
        $this->load->view('cart/index', $data);
    }

    public function checkout() {


        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "";
        $data["islogin"] = $this->user->is_login();
        $this->load->view('cart/checkout', $data);
    }

    public function ordercompleted() {


        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "";
        $data["islogin"] = $this->user->is_login();
        $this->load->view('cart/completed', $data);
    }

}
