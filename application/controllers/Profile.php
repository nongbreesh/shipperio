<?php

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class OrderStatus {

    const Paid = 1;
    const Shipping = 2;
    const Recieved = 3;

}

class Profile extends CI_Controller {

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
        if (!$data["user"]) {
            redirect(base_url());
        }
        $this->checktel();
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["userdetail"] = $this->get->userdetail($data["user"]["id"]);
        $data["updated"] = "false";

        if ($_POST) {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $input = array('id' => $data["user"]["id"]
                , 'firstname' => $first_name
                , 'lastname' => $last_name
                , 'updatedate' => date('Y-m-d H:i:s'));
            $this->set->user($input);
            $data["updated"] = "true";
        }

        $data["menu"] = "profile";
        $this->load->view('profile/index', $data);
    }

    public function phone() {
        $data["user"] = $this->user->get_account_cookie();
        if (!$data["user"]) {
            redirect(base_url());
        }
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["userdetail"] = $this->get->userdetail($data["user"]["id"]);
        $data["updated"] = "false";
        $data["verified"] = "false";
        if ($_POST) {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $input = array('id' => $data["user"]["id"]
                , 'firstname' => $first_name
                , 'lastname' => $last_name
                , 'updatedate' => date('Y-m-d H:i:s'));
            $this->set->user($input);
            $data["updated"] = "true";
        }

        $data["menu"] = "phone";
        $this->load->view('profile/phone', $data);
    }

    public function shippingaddress() {
        $data["user"] = $this->user->get_account_cookie();
        if (!$data["user"]) {
            redirect(base_url());
        }
        $this->checktel();
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["address"] = $this->get->address($data["user"]["id"]);
        $data["updated"] = "false";

        if ($_POST) {
            $billing_name = $this->input->post('billing_name');
            $billing_address1 = $this->input->post('billing_address1');
            $billing_address2 = $this->input->post('billing_address2');
            $input = array('userid' => $data["user"]["id"]
                , 'name' => $billing_name
                , 'address1' => $billing_address1
                , 'address2' => $billing_address2
                , 'updatedate' => date('Y-m-d H:i:s'));


            if ($data["address"]) {
                $input["id"] = $data["address"]->id;
                $this->set->address($input);
            } else {
                $this->put->address($input);
            }

            $data["updated"] = "true";
            $data["address"] = $this->get->address($data["user"]["id"]);
        }
        $data["menu"] = "shippingaddress";
        $this->load->view('profile/shippingaddress', $data);
    }

    public function order($type = "") {

        $data["user"] = $this->user->get_account_cookie();
        if (!$data["user"]) {
            redirect(base_url());
        }
        $this->checktel();
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["menu"] = "profileorder";
        $data["obj"] = $this;
        switch ($type) {
            case "shipping":
                $data["submenu"] = "shipping";
                $data["orderlist"] = $this->get->orderlist($data["user"]["id"], OrderStatus::Shipping);
                break;
            case "recieved":
                $data["submenu"] = "recieved";
                $data["orderlist"] = $this->get->orderlist($data["user"]["id"], OrderStatus::Recieved);
                break;
            default:
                $data["submenu"] = "paid";
                $data["orderlist"] = $this->get->orderlist($data["user"]["id"], OrderStatus::Paid);
                break;
        }

        $this->load->view('profile/order', $data);
    }

    public function orderdetail($id) {
        return $this->get->orderdetail($id);
    }

    public function checktel() {
        $data["user"] = $this->user->get_account_cookie();
        $userdetail = $this->get->userdetail($data["user"]["id"]);
        if ($userdetail->tel == "") {
            redirect(base_url("phone"));
        }
    }

}
