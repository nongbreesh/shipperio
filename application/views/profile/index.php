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
            <div class="navbar" role="navigation" style="min-height: 70px;">
                <div class="container">
                    <?php $this->load->view('template/menu'); ?>
                </div>   

            </div>



        </header> 

        <div class="container"  >
            <div class="row"> 
                <?php $this->load->view("profile/sidebar"); ?>

                <div class="col-xs-8">
                    <div class="card-campaign" style="padding:15px;">
                        <?php if ($updated == "true"): ?>
                            <div class="alert alert-success" id="passwordnotmath">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                อัพเดทข้อมูลเรียบร้อย
                            </div>
                        <?php endif; ?>
                        <form method="post" >
                            <h4 class="customtitle text-black">บัญชี</h4> 
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <img style="width: 120px;" class="img img-circle" src="http://graph.facebook.com/<?= $userdetail ? $userdetail->fbid : '' ?>/picture?type=square" />
                                </div>
                            </div>

                            <!--                        <div class="row">
                                                        <div class="col-xs-12 text-center" style="margin-top: 15px;">
                                                            <button  class="btn btn-campaign">อัพโหลดรูปภาพ</button>
                                                        </div>
                                                    </div>-->
                            <div class="devider" style="margin-top: 15px;"></div>
                            <div class="row">
                                <div class="col-xs-12 text-center" style="margin-top: 15px;">
                                    <h5 class="customtitle">อีเมลล์ : <?= $userdetail ? $userdetail->email : '' ?></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12"style="margin-top: 15px;">
                                    <input type="text"  required="required" name="first_name" id="first_name" placeholder="ชื่อ" value="<?= $userdetail ? $userdetail->firstname : '' ?>"   autofocus="autofocus" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12"style="margin-top: 15px;">
                                    <input type="text" required="required" name="last_name" id="last_name" placeholder="นามสกุล" value="<?= $userdetail ? $userdetail->lastname : '' ?>"   autofocus="autofocus" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 text-center" style="margin-top: 15px;">
                                    <button type="submit"  class="btn btn-campaign">บันทึก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <?php $this->load->view('template/footer'); ?>

    </body>
    <script type="text/javascript" src="<?= base_url("res/js/jquery-3.2.0.min.js") ?>"></script> 
    <script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url("res/bootstrap/js/bootstrap.min.js") ?>"></script>
    <script src="https://cdn.omise.co/omise.js.gz"></script>

    <script>
        $(document).ready(function () {
            init();
        });


        function init() {
            $(".overlay-loader").hide();

        }


    </script>

</html>
