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
                            <h4 class="customtitle text-black">ที่อยู่จัดส่ง</h4>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="text-danger">ชื่อ <abbr class="required" title="required">*</abbr></label>
                                    <input required="required" type="text"  name="billing_name" id="billing_name" placeholder="ชื่อ-นามสกุล สำหรับจัดส่งสินค้า" value="<?= $address ? $address->name : '' ?>"   autofocus="autofocus" class="form-control">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="">บริษัท / หมู่บ้าน / คอนโด</label>
                                    <input  required="required" type="text"  name="billing_address1" id="billing_address1" placeholder="เช่น พรีเมียมเพลส" value="<?= $address ? $address->address1 : '' ?>"   autofocus="autofocus" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="text-danger">ที่อยู่ <abbr class="required" title="required">*</abbr></label>
                                    <textarea  style=" padding: 10px;    height: 80px;    font-size: 14px;"  required="required" type="text"  name="billing_address2" id="billing_address2" placeholder="" value="<?= $address ? $address->address2 : '' ?>"   autofocus="autofocus" class="form-control"><?= $address ? $address->address2 : '' ?></textarea>
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
