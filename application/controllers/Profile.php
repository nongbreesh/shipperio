<?php

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class OrderStatus {

    const Paid = 0;
    const Pending = 1;
    const Shipped = 2;
    const Cancel = -1;

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

    public function withdrawals($type = "") {
        $data["user"] = $this->user->get_account_cookie();
        if (!$data["user"]) {
            redirect(base_url());
        }

        if ($this->get->finace_num($data["user"]["id"]) == 0) {
            redirect("finance");
        }
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["userbalance"] = $this->get->userbalance($data["user"]["id"]);
        $data["userwithdraws"] = $this->get->userwithdraws($data["user"]["id"]);
        $data["alertbalance"] = "false";
        $data["alertwithdraw"] = "false";

        switch ($type) {
            case "history":
                $data["submenu"] = "history";
                break;
            default:
                $data["submenu"] = "credit";
                break;
        }

        if ($_POST) {
            $amount = $this->input->post('withdrawal-amount');
            if (floatval($amount) > (floatval($data["userbalance"] ? $data["userbalance"]->total : 0))) {
                $data["alertbalance"] = "true";
            } elseif (floatval($amount) < 300) {
                $data["alertwithdraw"] = "true";
            } else {
                $uniqid = $this->common->getToken(7);
                $amount = floatval($amount) * -1;
                $input = array('userid' => $data["user"]["id"]
                    , 'amount' => $amount
                    , 'remark' => "WITHDRAW"
                    , 'ref' => $uniqid
                    , 'createdate' => date('Y-m-d H:i:s'));
                $this->put->userbalance($input);
                redirect(base_url("withdrawals/history"));
            }
        }

        $data["menu"] = "withdrawals";
        $this->load->view('profile/withdrawals', $data);
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

    public function finance() {
        $data["user"] = $this->user->get_account_cookie();
        if (!$data["user"]) {
            redirect(base_url());
        }
        $data["updated"] = "false";
        $data["token"] = $data["user"] ['token'];
        $data["islogin"] = $this->user->is_login();
        $data["userdetail"] = $this->get->userdetail($data["user"]["id"]);
        $data["finance"] = $this->get->financedetail($data["user"]["id"]);
        $data["banks"] = array("ธนาคารกสิกรไทย"
            , "ธนาคารกรุงไทย"
            , "ธนาคารกรุงเทพ"
            , "ธนาคารไทยพาณิชย์"
            , "ธนาคารกรุงศรีอยุธยา"
            , "ธนาคารทหารไทย"
        );
        if ($_POST) {
            $bankname = $this->input->post('bankname');
            $bankbranch = $this->input->post('bankbranch');
            $bankno = $this->input->post('bankno');
            $imageData = $this->input->post('bankimg');
            $imageData = explode(",", $imageData);

            $image = "";


            if (!empty($imageData)) {
                $image = $this->base64_to_jpeg_acc($imageData[1], $data["user"]["id"]);
                $image = base_url("public/upload/acc/" . $data["user"]["id"] . "/") . $image["upload_data"]["file_name"];
            }


            $input = array('userid' => $data["user"]["id"]
                , 'bankno' => $bankno
                , 'bankname' => $bankname
                , 'bankimg' => $image
                , 'bankbranch' => $bankbranch);


            if ($this->get->finace_num($data["user"]["id"]) > 0) {
                $input["updatedate"] = date('Y-m-d H:i:s');
                $this->set->finance($input);
            } else {
                $input["createdate"] = date('Y-m-d H:i:s');
                $this->put->finance($input);
            }



            $data["updated"] = "true";
            $data["finance"] = $this->get->financedetail($data["user"]["id"]);
        }

        $data["menu"] = "finance";
        $this->load->view('profile/finance', $data);
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
                $data["orderlist"] = $this->get->orderlist($data["user"]["id"], OrderStatus::Pending);
                break;
            case "recieved":
                $data["submenu"] = "recieved";
                $data["orderlist"] = $this->get->orderlist($data["user"]["id"], OrderStatus::Shipped);
                break;
              case "cancel":
                $data["submenu"] = "cancel";
                $data["orderlist"] = $this->get->orderlist($data["user"]["id"], OrderStatus::Cancel);
                break;
            default:
                $data["submenu"] = "paid";
                $data["orderlist"] = $this->get->orderlist($data["user"]["id"], OrderStatus::Paid);
                break;
        }

        $this->load->view('profile/order', $data);
    }

    public function orderdetail($id, $status) {
        return $this->get->orderdetail($id, $status);
    }

    public function checktel() {
        $data["user"] = $this->user->get_account_cookie();
        $userdetail = $this->get->userdetail($data["user"]["id"]);
        if ($userdetail->tel == "") {
            redirect(base_url("phone"));
        }
    }

    function base64_to_jpeg_acc($data, $userid) {
        $temp_file_path = tempnam(sys_get_temp_dir(), 'tempimage'); // might not work on some systems, specify your temp path if system temp dir is not writeable
        file_put_contents($temp_file_path, base64_decode($data));
        $image_info = getimagesize($temp_file_path);
        $_FILES['userfile'] = array(
            'name' => uniqid() . '.' . preg_replace('!\w+/!', '', $image_info['mime']),
            'tmp_name' => $temp_file_path,
            'size' => filesize($temp_file_path),
            'error' => UPLOAD_ERR_OK,
            'type' => $image_info['mime'],
        );

        $config['upload_path'] = 'public/upload/acc/' . $userid . "/";
        if (!is_dir($config['upload_path'])) {
            mkdir("public/upload/acc/$userid", 0777);
        }

        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->upload->initialize($config);


        if (!$this->upload->do_upload('userfile', true)) {
            print_r($this->upload->display_errors());
        } else {
            return array('upload_data' => $this->upload->data());
        }
    }

}
