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
        $this->load->library(array('encrypt'));
    }

    public function index() {
        $data["obj"] = $this;
        $data["user"] = $this->user->get_account_cookie();
        // print_r($data["user"]);
        $data["token"] = $data["user"] ['token'];
        $data["alluser"] = $this->get->alluser();
        $data["newuser"] = $this->get->newuser();

        $data["allcampaign"] = $this->get->allcampaign();
        $data["islogin"] = $this->user->is_login();
        $data["menu"] = "home";
        $this->load->view('template/index', $data);
    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full)
            $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    
    public function items() {
        $data["obj"] = $this;
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "campaign";
        $data["item"] = $this->get->items("",true); 
        $data["islogin"] = $this->user->is_login();
        $this->load->view('campaign/items', $data);
    }

    
    public function campaign() {
        $data["obj"] = $this;
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "campaign";
        $data["item"] = $this->get->items();
        $data["campaign"] = $this->get->campaign();
        $data["islogin"] = $this->user->is_login();
        $this->load->view('campaign/index', $data);
    }

    public function campaignitem($id,$title) {
        $data["obj"] = $this;
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "campaign";
        $data["item"] = $this->get->items($id);
        $data["campaign"] = $this->get->campaign($id);
        $data["islogin"] = $this->user->is_login();
        $this->load->view('campaign/campaignitem', $data);
    }

    public function item($id) {
        $data["obj"] = $this;
        $data["user"] = $this->user->get_account_cookie();

        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "";
        $data["itemdetail"] = $this->get->itemdetail($id);
        $data["relate"] = $this->get->itemrelate($data["itemdetail"]->campaignid, $data["itemdetail"]->id);
        $data["islogin"] = $this->user->is_login();
        $this->load->view('campaign/item', $data);
    }

    public function removecart($id) {

        $cart = get_cookie('cart', true);
        $cart = $this->encrypt->decode($cart);
        $cart = @unserialize($cart);

        foreach ($cart as $index => $row) {
            if ($row["itemid"] == $id) {
                unset($cart[$index]);
            }
        }
        $expires = ( 60 * 60 * 24);
        $cart = $this->encrypt->encode(serialize($cart));
        set_cookie('cart', $cart, $expires);
        redirect(base_url("cart"));
    }

    public function cart() {

        $data["obj"] = $this;
        $amount = $this->input->post('amount');
        if ($_POST) {
            $cart = get_cookie('cart', true);
            $cart = $this->encrypt->decode($cart);
            $cart = @unserialize($cart);
            $cartupdate = array();
            $cartdata = array();
            foreach ($cart as $index => $row) {
                $data = (array) $this->get->itemdetail($row["itemid"]);
                $data["amount"] = $amount[$index];
                $row["amount"] = $amount[$index];

                array_push($cartupdate, $row);
                array_push($cartdata, $data);
            }

            $expires = ( 60 * 60 * 24);
            $cartupdate = $this->encrypt->encode(serialize($cartupdate));
            set_cookie('cart', $cartupdate, $expires);

            $data["cartdata"] = $cartdata;
        } else {
            $cart = get_cookie('cart', true);
            $cart = $this->encrypt->decode($cart);
            $cart = @unserialize($cart);

            $cartdata = array();
            if ($cart) {
                foreach ($cart as $row) {
                    $data = (array) $this->get->itemdetail($row["itemid"]);
                    $data["amount"] = $row["amount"];
                    array_push($cartdata, $data);
                }
            }

            $data["cartdata"] = $cartdata;
        }



        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "";
        $data["islogin"] = $this->user->is_login();
        $this->load->view('cart/index', $data);
    }

    public function checkout() {
        $data["user"] = $this->user->get_account_cookie();
        if (!$data["user"]) {
            redirect(base_url("login"));
        }
        $cart = get_cookie('cart', true);
        $cart = $this->encrypt->decode($cart);
        $cart = @unserialize($cart);


        $cartdata = array();
        if ($cart) {
            foreach ($cart as $row) {
                $data = (array) $this->get->itemdetail($row["itemid"]);
                $data["amount"] = $row["amount"];
                array_push($cartdata, $data);
            }
        }


        $data["cartdata"] = $cartdata;
        $data["user"] = $this->user->get_account_cookie();
        $data["userdetail"] = $this->get->userdetail($data["user"]["id"]);
        $data["token"] = $data["user"] ['token'];
        $data["menu"] = "";
        $data["address"] = $this->get->address($data["user"]["id"]);
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
