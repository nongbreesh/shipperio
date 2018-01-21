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

                <div class="col-xs-9">
                    <div class="card-campaign" style="padding:15px;">
                        <h4 class="customtitle text-black">รายการสั่งสินค้า</h4> 
                        <div class="row">
                            <div class="col-xs-12" style="padding-top: 25px;">
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="<?= $submenu == "paid" ? 'active' : ''; ?>"><a href="<?= base_url("order") ?>">ชำระเงินแล้ว</a></li>
                                    <li role="presentation"  class="<?= $submenu == "shipping" ? 'active' : ''; ?>"><a href="<?= base_url("order/shipping") ?>">รอส่ง</a></li>
                                    <li role="presentation"  class="<?= $submenu == "recieved" ? 'active' : ''; ?>"><a href="<?= base_url("order/recieved") ?>">จัดส่งแล้ว</a></li>
                                    <li role="presentation"  class="<?= $submenu == "cancel" ? 'active' : ''; ?>"><a href="<?= base_url("order/cancel") ?>">ถูกยกเลิก</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12" style="overflow-x: scroll">
                                <?php if ($submenu == "recieved" || $submenu == "cancel"): ?>
                                    <table class="table table-hover tb-cart">
                                        <thead> 
                                            <tr>  
                                                <th>#</th>
                                                <th>รายการสินค้า</th> 
                                                <th>จำนวน</th> 
                                                <th>ยอดรวม</th> 
                                                <th>เวลาส่ง</th> 
                                                <th>Tracking</th> 
                                                <th>Remark</th> 
                                            </tr>
                                        </thead>
                                        <tbody>  
                                            <?php foreach ($orderlist as $row): ?>
                                                <tr>  
                                                    <td colspan="7"><b>#<?= $row->ref ?> เมื่อ <?= date("j F, Y H:i:s", strtotime($row->createdate)); ?></b></td> 
                                                </tr> 
                                                <?php foreach ($obj->orderdetail($row->id, $row->orderstatus) as $row2): ?>
                                                    <tr>  
                                                        <td><img  class="img img-rounded" style="width: 60px;" src="<?= $row2->image ?>"  ></td> 
                                                        <td><?= $row2->title ?></td>  
                                                        <td><?= $row2->amount ?></td> 
                                                        <td>฿<?= number_format(($row2->price + $row2->fee) * $row2->amount, 2) ?></td> 
                                                        <td><?= date("j F, Y H:i:s", strtotime($row2->shipeddate)); ?></td> 
                                                        <td><?= $row2->emstrack ?></td> 
                                                        <td style="color:#E91E63"><?= $row2->remark ? $row2->remark : "-" ?></td> 
                                                    </tr> 
                                                <?php endforeach; ?>  
                                            <?php endforeach; ?> 
                                        </tbody> 
                                    </table>
                                <?php else: ?>
                                    <table class="table table-hover tb-cart">
                                        <thead> 
                                            <tr>  
                                                <th>#</th>
                                                <th>รายการสินค้า</th> 
                                                <th>จำนวน</th> 
                                                <th>ยอดรวม</th> 
                                            </tr>
                                        </thead>
                                        <tbody>  
                                            <?php foreach ($orderlist as $row): ?>
                                                <tr>  
                                                    <td colspan="4"><b>#<?= $row->ref ?> เมื่อ <?= date("j F, Y H:i:s", strtotime($row->createdate)); ?></b></td> 
                                                </tr> 
                                                <?php foreach ($obj->orderdetail($row->id, $row->orderstatus) as $row2): ?>
                                                    <tr>  
                                                        <td><img  class="img img-rounded" style="width: 60px;" src="<?= $row2->image ?>"  ></td> 
                                                        <td><?= $row2->title ?></td>  
                                                        <td><?= $row2->amount ?></td> 
                                                        <td>฿<?= number_format(($row2->price + $row2->fee) * $row2->amount, 2) ?></td> 
                                                    </tr> 
                                                <?php endforeach; ?>  
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
        });


        function init() {
            $(".overlay-loader").hide();

        }


    </script>

</html>
