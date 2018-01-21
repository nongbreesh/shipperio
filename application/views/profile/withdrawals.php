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
                        <h4 class="customtitle text-black">ถอนเงิน</h4> 
                        <div class="row">
                            <div class="col-xs-12" style="padding-top: 25px;">
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="<?= $submenu == "credit" ? 'active' : ''; ?>"><a href="<?= base_url("withdrawals/credit") ?>">Credits ของคุณ</a></li>
                                    <li role="presentation"  class="<?= $submenu == "history" ? 'active' : ''; ?>"><a href="<?= base_url("withdrawals/history") ?>">ประวัติการถอนเงิน</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <?php if ($alertbalance == "true"): ?>
                                    <div class="alert alert-danger" id="passwordnotmath">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        จำนวนการถอนมากกว่ายอดเงินคงเหลือ
                                    </div>
                                <?php endif; ?>
                                <?php if ($alertwithdraw == "true"): ?>
                                    <div class="alert alert-danger" id="passwordnotmath">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        จำนวนการถอนขั้นต่ำ 300 บาท
                                    </div>
                                <?php endif; ?>
                                <?php if ($submenu == "credit"): ?>

                                    <form method="post">
                                        <h5>Credits ทั้งหมดของคุณ</h5>
                                        <div class="creditbalance">฿ <?= number_format($userbalance ? $userbalance->total : 0, 2) ?></div>
                                        <div class="devider"></div>
                                        จำนวนเงินที่ต้องการถอน

                                        <div class="form-group " style="width:300px; margin: 0 auto;"> 
                                            <div class="input-group"> 
                                                <span class="input-group-addon">฿</span>
                                                <input required  type="text" pattern="\[0-9]+" id="withdrawal-amount" name="withdrawal-amount" class="form-control" placeholder="0.00"  autofocus="true"> 
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 text-center" style="margin-top: 15px;">
                                                <code>จำนวนการถอนขั้นต่ำ 300 บาท
                                                    สามารถถอนได้ทุกวันไม่มีค่าธรรมเนียม</code>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 text-center" style="margin-top: 15px;">
                                                <button type="submit"  class="btn btn-campaign btn-blue">ทำการถอน</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php else: ?>
                                    <table class="table table-hover tb-cart">
                                        <thead> 
                                            <tr>  
                                                <th>รหัส</th>
                                                <th>แจ้งถอนเมื่อ</th> 
                                                <th>โอนเงินเมื่อ</th> 
                                                <th>จำนวนเงิน</th> 
                                                <th style="width: 100px">สถานะ</th> 
                                            </tr>

                                        </thead>
                                        <tbody> 
                                            <?php foreach ($userwithdraws as $row): ?>
                                                <tr>  
                                                    <td><?= $row->ref ?></td>
                                                    <td><?= date("j F, Y H:i:s", strtotime($row->createdate)); ?></td>
                                                    <td><?= $row->transferdate == "0000-00-00 00:00:00" ? "-" : date("j F, Y H:i:s", strtotime($row->transferdate)); ?></td>
                                                    <td><?= number_format($row->amount) ?></td>
                                                    <td><?= $row->status == 0 ? "<font color='red'>รอโอน...</font>" : "<font color='green'>โอนเงินแล้ว</font>" ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody> 
                                    </table>
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
    <script src="https://cdn.omise.co/omise.js.gz"></script>

    <script>
        $(document).ready(function () {
            init();
            $("#withdrawal-amount").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                        // Allow: Ctrl+A, Command+A
                                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                                // Allow: home, end, left, right, down, up
                                        (e.keyCode >= 35 && e.keyCode <= 40)) {
                            // let it happen, don't do anything
                            return;
                        }
                        // Ensure that it is a number and stop the keypress
                        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                            e.preventDefault();
                        }
                    });

        });


        function init() {
            $(".overlay-loader").hide();

        }


    </script>

</html>
