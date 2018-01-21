<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>shipperio.com : แพลตฟอร์มฝากซื้อสินค้าทั่วโลก</title>
        <meta name="description" content="รับหิ้วสินค้า">
        <meta name="keywords" content="รับหิ้ว,ฝากซื้อ,ขายของออนไลน์">
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
    <body class="nopadding grey">
        <div class="overlay-loader">
            <div class="bg"></div>
            <div class="container">
                <div class="loader"></div>
                <p>กรุณารอสักครู่ระบบกำลังดำเนินการ...</p>
            </div>
        </div>

        <header class="header-index">

            <!-- Static navbar -->
            <div class="navbar" role="navigation">
                <div class="container">  
                    <?php $this->load->view('template/menu'); ?>
                    <div class="container">
                        <div class="row">
                            <div class="heading-wrapper">
                                <div style="    max-width: 500px;    margin: 0 auto;">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <form  role="search">
                                                <div class="input-group add-on">
                                                    <input style="    font-size: 20px;" class="form-control" placeholder="Search รหัสแคมเปญ" name="srch-term" id="srch-term" type="text">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12   text-grey text-center">
                                    <h2 class="">แพลตฟอร์มฝากซื้อสินค้า</h2>
                                    <p class="">พบกับประสบการณ์การช๊อบปิ้งแบบใหม่ที่นี่ 
                                        <br>
                                        สะดวกปลอดภัย ไม่ต้องกังวลโดนโกง</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="step-wrapper">
                                <form id="msform">
                                    <!-- progressbar -->
                                    <ul id="eliteregister">
                                        <li class="active">สร้างแคมเปญ</li>
                                        <li>โพสสินค้า</li>
                                        <li>แชร์ลิ้งค์ให้ลูกค้า</li>
                                        <li>รอ CF จากลูกค้า</li>
                                        <li>เลือกซื้อของ</li>
                                        <li >จัดส่ง</li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>   

            </div>
        </div>


    </header>


    <div class="container">
        <div style="padding-top:20px;padding-bottom:20px" >
            <div class="row"> 
                <div class="col-lg-6   text-grey text-left">
                    <img style="width:100%" src="<?= base_url("res/img/shipperio-flow.png") ?>" />
                </div>
                <div class="col-lg-6   text-grey text-left">
                    <h5 class="" style="color:#34495e;    font-family: 'Prompt', Arial, sans-serif;margin-top: 90px;">ชำระเงินผ่านบัตรเครดิต</h2>
                        <p class="">ปลอดภัยไปอีกขั้นเมื่อชำระเงินผ่านบัตรเครดิตเข้าบัญชี Shipper โดยตรง ยอดเงินจะถูกหักให้ผู้ขายสินค้าก็ต่อเมื่อ ผู้รับสินค้าได้รับสินค้าเรียบร้อย เพื่อป้องกันปัญหาผู้รับหิ้วสินค้าโกง 
                          
                </div>
            </div>
        </div>
    </div>   
    <div class="bgwhite">
        <div class="container ">
            <div style="padding-top:20px;padding-bottom:20px;" >
                <div class="row"> 
                    <div class="col-lg-2   text-grey text-left">
                        <h6 class="customtitle text-blue" style="font-weight: bold;">นักช๊อปมาใหม่</h6>
                    </div> 
                    <div class="col-xs-12 col-lg-10">
                        <div class="row">
                            <?php foreach ($newuser as $row): ?>
                                <div class="col-xs-6 col-md-3">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <img class="img-circle" style="width:100%" src="http://graph.facebook.com/<?= $row->fbid ?>/picture?type=square" />
                                            </div>
                                            <div class="col-xs-8">
                                                <h5><?= $row->firstname . " " . $row->lastname ?></h5>
                                                <i class="fa fa-circle" aria-hidden="true"></i>&nbsp; สมัครเมื่อ <?= $obj->time_elapsed_string($row->createdate) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <div   >
        <div class="container">
            <div class="stat-block">
                <div class="row">
                    <div class="col-xs-6 col-md-4">
                        <h6 class="customtitle text-blue">นักช๊อป</h6>
                        <h4 class=" text-blue"><?= number_format(count($alluser)) ?></h4>
                        <h6 class="customtitle  text-blue">คน</h6>
                    </div>

                    <div class="col-xs-6 col-md-4">
                        <h6 class="customtitle  text-blue">แคมเปญ</h6>
                        <h4 class="text-blue"><?= number_format(count($allcampaign)) ?></h4>
                        <h6 class="customtitle text-blue">รายการ</h6>
                    </div>

                    <div class="col-md-4 hidden-xs"> 
                        <a class="btn-blue" style="margin-top: 45px;" href="<?= base_url("items") ?>">ดูสินค้าทั้งหมด!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="package text-center" id="divprice">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 style="font-family: 'Prompt', Arial, sans-serif;">ค่าบริการเพียง</h4> <h1 style="color:#1351ec">3%</h1> ต่อรายการ สำหรับผู้รับหิ้ว
                    <br/>
                    <br/>
                    <div style="max-width:700px;margin:0 auto;">
                        <h5 style="    font-family: 'Prompt', Arial, sans-serif;">ตัวอย่างการคำนวณค่าบริการ</h5>
                        <p style="text-align:left">
                            เราคิดค่าบริการในการทำรายการที่ 3%  ตัวอย่างเช่น เมื่อมียอดสั่งซื้อสินค้า A 1,000 บาทจากผู้ซื้อ ค่าบริการจะเท่ากับ 30 บาท (คิดจาก 3%)  
                            ซึ่งเราจะหักออกจากยอด 1,000 บาท และจ่ายเงินจำนวน 970.00 บาทไปยังบัญชีเจ้าของแคมเปญ
                        </p>
                        <div class="code text text-left"> 
                            Charge Amount: 1,000.00 +  
                            <br/>Shipperio Fee:        30.00 -  
                            <br/>Your Balance:    970.00
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="startnow text-center" id="divcontact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a class="startusing" href="<?= base_url("campaignmgr") ?>">เริ่มสร้างแคมเปญ!</a>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/footer'); ?>

</body>
<script type="text/javascript" src="<?= base_url("res/js/jquery-3.2.0.min.js") ?>"></script>
<script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url("res/bootstrap/js/bootstrap.min.js") ?>"></script>
<script>
    $(document).ready(function () {
        init();

        $("#howto").click(function () {
            $('html, body').animate({
                scrollTop: $("#divhowto").offset().top
            }, 1000);
        });
        $("#price").click(function () {
            $('html, body').animate({
                scrollTop: $("#divprice").offset().top
            }, 1000);
        });
        $("#contact").click(function () {
            $('html, body').animate({
                scrollTop: $("#divcontact").offset().top
            }, 1000);
        });




    });


    function init() {
        $(".overlay-loader").hide();
    }
</script> 
</html>
