<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>แพลตฟอร์มรับหิ้วสินค้าทั่วโลก</title>
        <meta name="description" content="รับหิ้วสินค้า">
        <meta name="keywords" content="เว็บสำเร็จรูป,บิลออนไลน์,ขายของผ่านไลน์,ขายของออนไลน์">
        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
        <link href="<?= base_url("res/css/font-awesome.min.css") ?>" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("res/fav/favicon-16x16.png") ?>">
        <!-- Loading Bootstrap -->
        <link href="<?= base_url("res/dist/css/vendor/bootstrap.min.css") ?>" rel="stylesheet">

        <!-- Loading Flat UI Pro -->
        <link href="<?= base_url("res/dist/css/flat-ui-pro.css") ?>" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url("res/account/plugins/bower_components/register-steps/steps.css") ?>" rel="stylesheet">

        <!-- Custom -->
        <link href="<?= base_url("res/css/webcustom.css?v=1.2") ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body class="nopadding">
        <div class="overlay-loader">
            <div class="bg"></div>
            <div class="container">
                <div class="loader"></div>
                <p>กรุณารอสักครู่ระบบกำลังดำเนินการ...</p>
            </div>
        </div>

        <header class="header-index">

            <!-- Static navbar -->
            <div class="navbar" role="navigation" style="min-height: 70px;">
                <div class="container">
                    <?php $this->load->view('template/menu'); ?>
                </div>   

            </div>



        </header> 

        <div class="container">
            <div class="row">

                <div class="col-xs-12">
                    <div class="row text-center">
                        <h5 class="customtitle text-black">จัดการแคมเปญและรายได้</h5>
                        <div class="devider" ></div>

                        <div class="row">
                            <div class="col-xs-12" style="padding-top: 25px;">
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="<?= $submenu == "campaign" ? 'active' : ''; ?>"><a href="<?= base_url("campaignmgr/index") ?>">แคมเปญของคุณ</a></li>
                                    <li role="presentation"  class="<?= $submenu == "ordered" ? 'active' : ''; ?>"><a href="<?= base_url("campaignmgr/ordered") ?>">รายการสั่ง</a></li>
                                    <li role="presentation"  class="<?= $submenu == "pendingship" ? 'active' : ''; ?>"><a href="<?= base_url("campaignmgr/pendingship") ?>">รายการรอส่ง</a></li>
                                    <li role="presentation"  class="<?= $submenu == "shipped" ? 'active' : ''; ?>"><a href="<?= base_url("campaignmgr/shipped") ?>">รายการส่ง</a></li>
                                    <li role="presentation"  class="<?= $submenu == "cancel" ? 'active' : ''; ?>"><a href="<?= base_url("campaignmgr/cancel") ?>">รายการยกเลิก</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <?php if ($submenu == "campaign"): ?>
                                    <?php $this->load->view('campaignmgr/campaign', $data); ?>
                                <?php endif; ?>
                                <?php if ($submenu == "ordered"): ?>
                                    <?php $this->load->view('campaignmgr/ordered', $data); ?>
                                <?php endif; ?>

                                <?php if ($submenu == "pendingship"): ?>
                                    <?php $this->load->view('campaignmgr/pendingship', $data); ?>
                                <?php endif; ?>

                                <?php if ($submenu == "shipped"): ?>
                                    <?php $this->load->view('campaignmgr/shipped', $data); ?>
                                <?php endif; ?>
                                  <?php if ($submenu == "cancel"): ?>
                                    <?php $this->load->view('campaignmgr/cancel', $data); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <?php $this->load->view('template/footer'); ?>

    </body>
<script type="text/javascript" src="<?= base_url("res/js/jquery-3.2.0.min.js") ?>"></script> 
<script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url("res/bootstrap/js/bootstrap.min.js") ?>"></script>
<script src="<?= base_url("res/bootstrap/js/modal.js") ?>" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            init();

        });


        function init() {
            $(".overlay-loader").hide();
        }
    </script>

</html>
