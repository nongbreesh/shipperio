<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Insert_model', 'put');
        $this->load->model('Select_model', 'get');
        $this->load->model('Update_model', 'set');
        $this->load->model('User_model', 'user');

        $this->load->library('upload');
        $this->load->library('common');
        $this->load->library('lineapi');
        $this->load->library('excel');
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"]["token"];
        $data["merchantuid"] = $this->get->lineuid(array("token" => $data["token"]))->row();
        $this->paidorder = 0;
        if (count($data["merchantuid"]) > 0) {
            $orderids = $this->get->orderids(array("merchantid" => $data["merchantuid"]->lineuid))->result();
            $orderid = array();
            foreach ($orderids as $id) {
                array_push($orderid, $id->orderid);
            }
            if (count($orderid) > 0) {
                $this->paidorder = $this->get->orderin_statusopen($orderid)->num_rows();
            }
        }
    }

    public function index($acctoken = "")
    {
        if (!$this->user->is_login()) {
            redirect(base_url("login"));
        } else {
            redirect(base_url("account/$acctoken/dashboard"));
        }
    }

    public function user($token = "")
    {
        echo $token;
    }

    public function setting($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        if (!$this->user->is_login()) {
            redirect('/');
        }
        $this->load->view('account/setting', $data);
    }

    public function setting_home($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        $data["imagescover"] = $this->get->imagescover(array("merchantid" => $data["merchant"]->id, "status" => "1"))->result();

        if (!$this->user->is_login()) {
            redirect('/');
        }
        $this->load->view('account/settinghome', $data);
    }

    public function setting_gganalytic($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        $data["ggscript"] = $this->get->googleanalytic(array("merchantid" => $data["merchant"]->id))->row();
        if (!$this->user->is_login()) {
            redirect('/');
        }
        $this->load->view('account/settinggganalytic', $data);
    }


    public function setting_about($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        if (!$this->user->is_login()) {
            redirect('/');
        }
        $this->load->view('account/settingabout', $data);
    }


    public function setting_post($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        $data["article"] = $this->get->article(array("merchantid" => $data["merchant"]->id, "status" => "1"))->result();
        if (!$this->user->is_login()) {
            redirect('/');
        }
        $this->load->view('account/settingpost', $data);
    }


    public function setting_contact($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        if (!$this->user->is_login()) {
            redirect('/');
        }
        $this->load->view('account/settingcontact', $data);
    }

    public function info($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        if (!$this->user->is_login()) {
            redirect('/');
        }
        $this->load->view('account/info', $data);
    }

    public function updatesetting($acctoken = "")
    {
        if ($_POST) {
            $image = "";
            $data["user"] = $this->user->get_account_cookie();
            $imageData = $this->input->post("imageData");
            $name = $this->input->post("name");
            $tel = $this->input->post("tel");
            $title = $this->input->post("title");
            $detail = $this->input->post("detail");
            $lineid = $this->input->post("lineid");
            $lineaddurl = $this->input->post("lineaddurl");


            if (!empty($imageData)) {
                $image = $this->base64_to_jpeg_acc($imageData, $data["user"]["token"]);
                $image = base_url("public/upload/acc/$acctoken/") . $image["upload_data"]["file_name"];
            }


            $input = array(
                'token' => $data["user"]["token"],
                'tel' => $tel,
                'title' => $title,
                'lineaddurl' => $lineaddurl,
                'name' => $name,
                'description    ' => $detail,
                'lineid' => $lineid,
                'updatedate' => date('Y-m-d H:i:s'),
            );
            if ($image != "") {
                $input["image"] = $image;
            }
            if ($this->set->merchant($input)) {
                redirect(base_url("account/$acctoken/setting"));
            }
        }
    }

    public function addarticle($acctoken = "")
    {
        if ($_POST) {
            $image = "";
            $data["user"] = $this->user->get_account_cookie();
            $imageData = $this->input->post("imageData");
            $articleid = $this->input->post("articleid");
            $title = $this->input->post("title");
            $inputcustomtext = $this->input->post("inputcustomtext");


            if (!empty($imageData)) {
                $image = $this->base64_to_jpeg_acc($imageData, $data["user"]["token"]);
                $image = base_url("public/upload/acc/$acctoken/") . $image["upload_data"]["file_name"];
            }


            $input = array(
                'merchantid' => $data["user"]["id"],
                'title' => $title,
                'description' => $inputcustomtext,
                'status' => 1,
            );
            if ($image != "") {
                $input["image"] = $image;
            }

            if ($articleid != "") {
                $input["id"] = $articleid;
                $input["updatedate"] = date('Y-m-d H:i:s');
                $this->set->article($input);
            } else {
                $input["createdate"] = date('Y-m-d H:i:s');
                $this->put->article($input);
            }


            redirect(base_url("account/$acctoken/setting_post"));
        }
    }

    public function addcover($acctoken = "")
    {
        if ($_POST) {
            $image = "";
            $data["user"] = $this->user->get_account_cookie();
            $imageData = $this->input->post("imageData");
            $imagescoverid = $this->input->post("imagescoverid");
            $title = $this->input->post("title");
            $caption = $this->input->post("caption");
            $externallink = $this->input->post("externallink");


            if (!empty($imageData)) {
                $image = $this->base64_to_jpeg_acc($imageData, $data["user"]["token"]);
                $image = base_url("public/upload/acc/$acctoken/") . $image["upload_data"]["file_name"];
            }


            $input = array(
                'merchantid' => $data["user"]["id"],
                'title' => $title,
                'caption' => $caption,
                'externallink' => $externallink,
                'status' => 1,
                'createdate' => date('Y-m-d H:i:s'),
                'updatedate' => date('Y-m-d H:i:s'),
            );
            if ($image != "") {
                $input["image"] = $image;
            }

            if ($imagescoverid != "") {
                $input["id"] = $imagescoverid;
                $this->set->imagescover($input);
            } else {
                $this->put->imagescover($input);
            }


            redirect(base_url("account/$acctoken/setting_home"));
        }
    }


    public function updatehomesetting($acctoken = "")
    {
        if ($_POST) {
            $image = "";
            $data["user"] = $this->user->get_account_cookie();
            $imageData = $this->input->post("imageData");
            $billtoken = $this->input->post("billtoken");
            $textcustom = $this->input->post("inputcustomtext");

            if (!empty($imageData)) {
                $image = $this->base64_to_jpeg_acc($imageData, $data["user"]["token"]);
                $image = base_url("public/upload/acc/$acctoken/") . $image["upload_data"]["file_name"];
            }


            $input = array(
                'token' => $data["user"]["token"],
                'textcustom' => $textcustom,
                'billtoken' => $billtoken,
                'updatedate' => date('Y-m-d H:i:s'),
            );
            if ($image != "") {
                $input["imagecover"] = $image;
            }
            if ($this->set->merchant($input)) {
                redirect(base_url("account/$acctoken/setting_home"));
            }
        }
    }

    public function updateaboutsetting($acctoken = "")
    {
        if ($_POST) {
            $image = "";
            $data["user"] = $this->user->get_account_cookie();
            $imageData = $this->input->post("imageData");
            $textcustom = $this->input->post("inputcustomtext");

            if (!empty($imageData)) {
                $image = $this->base64_to_jpeg_acc($imageData, $data["user"]["token"]);
                $image = base_url("public/upload/acc/$acctoken/") . $image["upload_data"]["file_name"];
            }


            $input = array(
                'token' => $data["user"]["token"],
                'textabout' => $textcustom,
                'updatedate' => date('Y-m-d H:i:s'),
            );
            if ($image != "") {
                $input["imagecover"] = $image;
            }
            if ($this->set->merchant($input)) {
                redirect(base_url("account/$acctoken/setting_about"));
            }
        }
    }


    public function updategganalyticsetting($acctoken = "")
    {
        if ($_POST) {
            $data["user"] = $this->user->get_account_cookie();
            $textcustom = $this->input->post("inputcustomtext");
            $id = $this->input->post("id");


            $input = array(
                'merchantid' => $data["user"]["id"],
                'script' => $textcustom,
            );
            if ($id != "") {
                $input["id"] = $id;
                $input["updatedate"] = date('Y-m-d H:i:s');
                if ($this->set->googleanalytic($input)) {
                }
            } else {
                $input["createdate"] = date('Y-m-d H:i:s');
                if ($this->put->googleanalytic($input)) {
                }
            }

            redirect(base_url("account/$acctoken/setting_gganalytic"));
        }
    }

    public
    function updatecontactsetting($acctoken = "")
    {
        if ($_POST) {
            $image = "";
            $data["user"] = $this->user->get_account_cookie();
            $imageData = $this->input->post("imageData");
            $textcustom = $this->input->post("inputcustomtext");

            if (!empty($imageData)) {
                $image = $this->base64_to_jpeg_acc($imageData, $data["user"]["token"]);
                $image = base_url("public/upload/acc/$acctoken/") . $image["upload_data"]["file_name"];
            }


            $input = array(
                'token' => $data["user"]["token"],
                'textcontact' => $textcustom,
                'updatedate' => date('Y-m-d H:i:s'),
            );
            if ($image != "") {
                $input["imagecover"] = $image;
            }
            if ($this->set->merchant($input)) {
                redirect(base_url("account/$acctoken/setting_contact"));
            }
        }
    }

    public
    function dashboard($acctoken = "")
    {
        $data["daterange"] = date('d/m/Y') . " - " . date('d/m/Y', strtotime(date('Y-m-d') . ' + 30 days'));
        $data["user"] = $this->user->get_account_cookie();
        if (!$this->user->is_login()) {
            redirect(base_url("login"));
        }
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["lineadmin"] = $this->get->v_adminsummary(array("token" => $data["token"], "status" => 1))->result();
        $data["paidorder"] = $this->paidorder;
        $data["merchants"] = $this->get->merchantlineuid(array("token" => $data["token"], "status" => 1))->result();
        $data["dashboarddata"] = $this->get->getdashboarddata($data["merchant"]->id)->row();
        if ($_POST) {
            if (isset($_POST["btnupdateamount"])) {
                $isstockenable = $this->input->post("isstockenable") == 'on' ? 1 : 0;
                $updateitemamount = $this->input->post("updateitemamount");
                $billtokenid = $this->input->post("billtokenid");

                $input = array("id" => $billtokenid,
                    "isstockenable" => $isstockenable,
                    "updatedate" => date('Y-m-d H:i:s'),);
                $this->set->billtoken($input);


                $items = explode("|", $updateitemamount);
                foreach ($items as $item) {
                    $var = explode(";", $item);
                    $id = $var[0];
                    $amount = $var[1];

                    $input = array("billtokenid" => $billtokenid,
                        "amount" => $amount,
                        "itemid" => $id,
                        "merchantid" => $data["merchant"]->id,);

                    if ($amount != 0) {
                        $this->put->billtokenstock($input);
                    }

                }

            }
            $mtoken = $data["merchant"]->token;
            redirect(base_url("account/$mtoken/dashboard"));
        }


        $this->load->view('account/index', $data);
    }

    public
    function customer($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        if (!$this->user->is_login()) {
            redirect('/');
        }

        $data["customer"] = $this->get->getcustomerlist($data["merchant"]->id);

        $this->load->view('account/customer', $data);
    }

    public
    function orderall($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["obj"] = $this;
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        $data["order"] = $this->get->v_order(array("merchantid" => $data["merchant"]->id, "closestatus != " => 1), array("0", "3"))->result();

        if (!$this->user->is_login()) {
            redirect('/');
        }

        $data["customer"] = $this->get->getcustomerlist($data["merchant"]->id);

        $this->load->view('account/allorder', $data);
    }

    public
    function getorderstatus($status)
    {

        switch ($status) {
            case "1":
                return " <div class=\"label label-table label-warning\">Waiting for confirm payment</div>";

                break;
            case "2":
                return " <div class=\"label label-table label-success\">Paid</div>";
                break;
            case "3":
                return " <div class=\"label label-table label-danger\">Shipped</div>";
                break;
            default:
                break;
        }

        return "-";

        // <div class="label label-table label-success">Paid</div>
    }

    public
    function products($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        if (!$this->user->is_login()) {
            redirect('/');
        }
        $data["items"] = $this->get->items(array("merchantid" => $data["merchant"]->id, "status" => '1'))->result();

        $this->load->view('account/products', $data);
    }

    public function productcate($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        if (!$this->user->is_login()) {
            redirect('/');
        }
        $data["cate"] = $this->get->category(array("merchantid" => $data["user"]["id"], "status" => 1))->result();

        $this->load->view('account/cate', $data);
    }

    public
    function updateproduct($id, $acctoken = "", $isdelete = "false")
    {
        if ($isdelete == "true") {
            $input = array(
                'id' => $id,
                'status' => 0,
                'updatedate' => date('Y-m-d H:i:s'),
            );
            if ($this->set->items($input)) {
                redirect("account/$acctoken/products");
            }
        }
    }


    public
    function addnewcate($acctoken = "")
    {
        if ($_POST) {
            if (!$this->user->is_login()) {
                redirect('/');
            }
            $id = $this->input->post("id");
            $data["user"] = $this->user->get_account_cookie();
            $name = $this->input->post("name");


            if (empty($id)) {
                $input = array(
                    'merchantid' => $data["user"]["id"],
                    'name' => $name,
                    'status' => "1",
                    'updatedate' => date('Y-m-d H:i:s'),
                );
                if ($this->put->category($input)) {
                    redirect("account/$acctoken/productcate");
                }
            } else {
                $input = array(
                    'id' => $id,
                    'merchantid' => $data["user"]["id"],
                    'name' => $name,
                    'status' => "1",
                    'updatedate' => date('Y-m-d H:i:s'),
                );
//                if ($image != "") {
//                    $input["image"] = $image;
//                }
                if ($this->set->category($input)) {
                    redirect("account/$acctoken/productcate");
                }
            }
        }
    }


    public
    function addnewpaymentmethod($acctoken = "")
    {
        if ($_POST) {
            if (!$this->user->is_login()) {
                redirect('/');
            }
            $id = $this->input->post("id");
            $data["user"] = $this->user->get_account_cookie();
            $bankaccount = $this->input->post("bankaccount");
            $accounttype = $this->input->post("accounttype");
            $accountbranch = $this->input->post("accountbranch");
            $accountno = $this->input->post("accountno");
            $accountname = $this->input->post("accountname");
            $bank = $this->get->bank(array("name" => $bankaccount))->row();

            if (empty($id)) {
                $input = array(
                    'merchantid' => $data["user"]["id"],
                    'bankname' => $bankaccount,
                    'accbranch' => $accountbranch,
                    'accno' => $accountno,
                    'status' => 1,
                    'accname' => $accountname,
                    'acctype' => $accounttype,
                    'banklogo' => $bank->image,
                    'updatedate' => date('Y-m-d H:i:s'),
                );
                if ($this->put->paymentmethod($input)) {
                    redirect("account/$acctoken/paymentmethod");
                }
            } else {
                $input = array(
                    'id' => $id,
                    'merchantid' => $data["user"]["id"],
                    'bankname' => $bankaccount,
                    'accbranch' => $accountbranch,
                    'accno' => $accountno,
                    'status' => 1,
                    'accname' => $accountname,
                    'acctype' => $accounttype,
                    'banklogo' => $bank->image,
                    'updatedate' => date('Y-m-d H:i:s'),
                );
//                if ($image != "") {
//                    $input["image"] = $image;
//                }
                if ($this->set->paymentmethod($input)) {
                    redirect("account/$acctoken/paymentmethod");
                }
            }
        }
    }

    public
    function updatepaymentmethod($id, $acctoken = "", $isdelete = "false")
    {
        if ($isdelete == "true") {
            $input = array(
                'id' => $id,
                'status' => 0,
                'updatedate' => date('Y-m-d H:i:s'),
            );
            if ($this->set->paymentmethod($input)) {
                redirect("account/$acctoken/paymentmethod");
            }
        }
    }

    public
    function updatecate($id, $acctoken = "", $isdelete = "false")
    {
        if ($isdelete == "true") {
            $input = array(
                'id' => $id,
                'status' => 0,
                'updatedate' => date('Y-m-d H:i:s'),
            );
            if ($this->set->category($input)) {
                redirect("account/$acctoken/productcate");
            }
        }
    }

    public
    function addnewproduct($acctoken = "")
    {
        if ($_POST) {
            $id = $this->input->post("id");
            $imageData = $this->input->post("imageData");
            $data["user"] = $this->user->get_account_cookie();
            $name = $this->input->post("name");
            $price = $this->input->post("price");
            $category = $this->input->post("category");
            $inputcustomtext = $this->input->post("inputcustomtext");
            $image = "";
            if (!empty($imageData)) {
                $image = $this->base64_to_jpeg($imageData, $acctoken);
                $image = base_url("public/upload/item/$acctoken/") . $image["upload_data"]["file_name"];
            }

            if (empty($id)) {
                $input = array(
                    'name' => $name,
                    'price' => $price,
                    'cateid' => $category,
                    'description' => $inputcustomtext,
                    'image' => $image,
                    'status' => "1",
                    'merchantid' => $data["user"]["id"],
                    'updatedate' => date('Y-m-d H:i:s'),
                );

                if ($this->put->items($input)) {
                    redirect("account/$acctoken/products");
                }
            } else {
                $input = array(
                    'id' => $id,
                    'name' => $name,
                    'cateid' => $category,
                    'description' => $inputcustomtext,
                    'price' => $price,
                    'updatedate' => date('Y-m-d H:i:s'),
                );
                if ($image != "") {
                    $input["image"] = $image;
                }
                if ($this->set->items($input)) {
                    redirect("account/$acctoken/products");
                }
            }
        }
    }

    function base64_to_jpeg_acc($data, $acctoken)
    {
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

        $config['upload_path'] = 'public/upload/acc/' . $acctoken . "/";
        if (!is_dir($config['upload_path'])) {
            mkdir("public/upload/acc/$acctoken", 0777);
        }

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';
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

    function base64_to_jpeg($data, $acctoken)
    {
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

        $config['upload_path'] = 'public/upload/item/' . $acctoken . "/";
        if (!is_dir($config['upload_path'])) {
            mkdir("public/upload/item/$acctoken", 0777);
        }

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';
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

    public
    function paymentmethod($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        if (!$this->user->is_login()) {
            redirect('/');
        }
        $data["bank"] = $this->get->bank(array())->result();
        $data["paymentmethod"] = $this->get->paymentmethod(array("merchantid" => $data["user"]["id"], "status" => 1))->result();

        $this->load->view('account/moneyaccount', $data);
    }

    public
    function shippingrate($acctoken = "")
    {
        $data["user"] = $this->user->get_account_cookie();
        $data["token"] = $data["user"] ['token'];
        $data["merchant"] = $this->get->merchant(array("token" => $data["token"]))->row();
        $data["paidorder"] = $this->paidorder;
        if (!$this->user->is_login()) {
            redirect('/');
        }
        $data["bank"] = $this->get->bank(array())->result();
        $data["shippingrate"] = $this->get->shippingrateconfig(array("merchantid" => $data["user"]["id"]))->result();

        $this->load->view('account/shippingrate', $data);
    }

    public
    function deleteshippingrate($id, $acctoken = "", $isdelete = "false")
    {
        if ($isdelete == "true") {
            if ($this->set->delete_shippingrate($id)) {
                redirect(base_url("account/$acctoken/shippingrate"));
            }
        }
    }

    public
    function addnewshippingrate($acctoken = "")
    {
        if ($_POST) {
            if (!$this->user->is_login()) {
                redirect('/');
            }
            $id = $this->input->post("id");
            $data["user"] = $this->user->get_account_cookie();
            $shippingtype = $this->input->post("shippingtype");
            $unit = $this->input->post("unit");
            $price = $this->input->post("price");

            if (empty($id)) {
                $input = array(
                    'merchantid' => $data["user"]["id"],
                    'type' => $shippingtype,
                    'unit' => $unit,
                    'price' => $price,
                );
                if ($this->put->shippingrate($input)) {
                    redirect(base_url("account/$acctoken/shippingrate"));
                }
            } else {
                $input = array(
                    'id' => $id,
                    'type' => $shippingtype,
                    'unit' => $unit,
                    'price' => $price,
                );
                if ($this->set->shippingrate($input)) {
                    redirect(base_url("account/$acctoken/shippingrate"));
                }
            }
        }
    }

}
