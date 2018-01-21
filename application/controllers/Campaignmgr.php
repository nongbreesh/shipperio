<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Campaignmgr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Insert_model', 'put');
        $this->load->model('Select_model', 'get');
        $this->load->model('Update_model', 'set');
        $this->load->model('User_model', 'user');
        $this->load->library('ciqrcode');
        $this->load->library('upload');
        $this->load->library('common');
        $this->load->library('lineapi');
        $this->load->library(array('encrypt'));
    }

    public function index() {
        $data["obj"] = $this;

        $config['cacheable'] = false; //boolean, the default is true 
        $this->ciqrcode->initialize($config);

        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["menu"] = "";
        $data["submenu"] = "campaign";
        $data["data"] = $data;
        $this->load->view('campaignmgr/index', $data);
    }

    public function gentokenqr() {
        $data["user"] = $this->user->get_account_cookie();
        header("Content-Type: image/png");
        $params['data'] = "auth " . $data["user"]["token"];
        $params['level'] = 'H';
        $params['size'] = 10;
        $this->ciqrcode->generate($params);
    }

    public function ordered() {
        $data["obj"] = $this;
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["menu"] = "";
        $data["submenu"] = "ordered";
        $data["update"] = "false";

        if ($_POST) {
            $id = $this->input->post('orderdetailid');
            $status = $this->input->post('status');
            $remark = $this->input->post('remark');

            $input = array(
                "id" => $id,
                "status" => $status,
                "remark" => $remark,
                "updatedate" => date('Y-m-d H:i:s'),
            );

            $this->set->orderdetail($input);

            if ($status == "-1") {
                $orderdetail = $this->get->orderdetailbyid($id);

                $sum = $orderdetail->price * $orderdetail->amount;
                $inputbalance = array('userid' => $orderdetail->custid
                    , 'amount' => $sum
                    , "itemid" => $id
                    , 'remark' => "REFUND"
                    , 'order_ref' => $orderdetail->ref
                    , 'createdate' => date('Y-m-d H:i:s'));
                $this->put->userbalance($inputbalance);

                // คืนเงิน
            }
            $data["update"] = "true";
        }
        $data["orderlist"] = $this->get->orderbycampaignuser($data["user"]["id"]);

        $data["data"] = $data;
        $this->load->view('campaignmgr/index', $data);
    }

    public function pendingship() {
        $data["obj"] = $this;
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["menu"] = "";
        $data["submenu"] = "pendingship";
        $data["update"] = $this->input->get('update') ? $this->input->get('update') : '';
        $data["orderlist"] = $this->get->orderbycampaignuser_pendingship($data["user"]["id"]);

        if ($_POST) {
            $id = $this->input->post('orderdetailid');
            $tracking = $this->input->post('tracking');
            $remark = $this->input->post('remark');

            $input = array(
                "id" => $id,
                "remark" => $remark,
                "emstrack" => $tracking,
                "status" => 2,
                "shipeddate" => date('Y-m-d H:i:s'),
            );

            $orderdetail = $this->get->orderdetailbyid($id);
            $this->set->orderdetail($input);
            //income
            // เงินจะเข้าเมื่อกดยืนยันจัดส่ง และไม่มี complain
            $campaignuser = $this->get->campaignuser($orderdetail->campaignid);
            $sum = (($orderdetail->price + $orderdetail->fee) * $orderdetail->amount) - (($orderdetail->price + $orderdetail->fee) * $orderdetail->amount) * ITEMCHARGE;
            $inputbalance = array('userid' => $campaignuser->userid
                , 'amount' => $sum
                , "itemid" => $id
                , 'remark' => "DEPOSIT"
                , 'order_ref' => $orderdetail->ref
                , 'createdate' => date('Y-m-d H:i:s'));
            $this->put->userbalance($inputbalance);
            redirect(base_url("campaignmgr/pendingship?update=true"));
        }


        $data["data"] = $data;
        $this->load->view('campaignmgr/index', $data);
    }

    public function shipped() {
        $data["obj"] = $this;
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["menu"] = "";
        $data["submenu"] = "shipped";
        $data["orderlist"] = $this->get->orderbycampaignuser_shiped($data["user"]["id"]);

        $data["data"] = $data;
        $this->load->view('campaignmgr/index', $data);
    }

    public function cancel() {
        $data["obj"] = $this;
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["menu"] = "";
        $data["submenu"] = "cancel";
        $data["orderlist"] = $this->get->orderbycampaignuser_cancel($data["user"]["id"]);

        $data["data"] = $data;
        $this->load->view('campaignmgr/index', $data);
    }

    public function orderdetail($id) {
        return $this->get->orderdetail($id);
    }

}
