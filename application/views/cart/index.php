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
                <!--            <div class="col-xs-12 col-md-2">
                                <h6 class="customtitle">ประเทศ</h6> 
                                <ul class="nav">
                                    <li><a href="#">ไทย</a></li>
                                    <li><a href="#">ญี่ปุ่น</a></li>
                                    <li><a href="#">เกาหลี</a></li>
                                    <li><a href="#">จีน</a></li>
                                </ul>
                            </div>-->

                <div class="col-xs-12">
                    <div class="row text-center">
                        <h5 class="customtitle text-black">รถเข็นของคุณ</h5>
                        <div class="devider" ></div>
                    </div>
                    <?php if (count($cartdata) > 0): ?>
                        <div class="row">
                            <div class="col-xs-12" style="overflow-x: scroll;">
                                <form method="post">
                                    <table class="table tb-cart">
                                        <thead> 
                                            <tr> 
                                                <th>#</th>
                                                <th>#</th>
                                                <th>รายการสินค้า</th>
                                                <th>ราคา</th> 
                                                <th>จำนวน</th> 
                                                <th>ยอดรวม</th> 
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php
                                            $summary = 0;
                                            $total;
                                            foreach ($cartdata as $row):
                                                ?>
                                                <tr> 
                                                    <th scope="row">
                                                        <a href="<?= base_url("removecart/" . $row["id"] . "") ?>" class="remove" title="Remove this item" >X</a>
                                                    </th> 
                                                    <td><a href="<?= base_url("item/" . $row["id"] . "") ?>"><img width="100" height="100" src="<?= $row["image"] ?>"  ></a></td> 
                                                    <td><a href="<?= base_url("item/" . $row["id"] . "") ?>"><?= $row["title"] ?></a></td> 
                                                    <td>฿<?= number_format($row["price"] + $row["fee"], 2) ?></td> 
                                                    <td><input type="number" name="amount[]" class="input-text form-control qty text" value="<?= $row["amount"] ?>" min="1" /></td> 
                                                    <td>฿<?= number_format(($row["price"] + $row["fee"]) * $row["amount"], 2) ?></td> 
                                                </tr> 
                                                <?php
                                                $summary += ($row["price"] + $row["fee"]) * $row["amount"];
                                                ?>
                                            <?php endforeach; ?> 
                                        </tbody>
                                        <tfoot>
                                            <?php if (count($cartdata) > 0): ?>
                                                <tr> 
                                                    <th  colspan="5"> 
                                                    </th> 
                                                    <th>  <button  name="btn_update" type="submit" class="btn btn-campaign">อัพเดทรถเข็น</button></th>  
                                                </tr>
                                            <?php endif; ?>
                                            <tr> 
                                                <th  colspan="5">
                                                    รวมค่าสินค้า
                                                </th> 
                                                <th>฿<?= number_format($summary, 2) ?></th>  
                                            </tr> 
                                            <tr> 
                                                <th  colspan="5">
                                                    ค่าธรรมเนียม
                                                </th> 
                                                <th>฿<?= number_format($summary * CHARGE, 2) ?></th>  
                                                <?php
                                                $total = $summary + ($summary * CHARGE);
                                                ?>
                                            </tr> 
                                            <tr > 
                                                <th  colspan="5" style="color: #000 !important;">
                                                    รวมทั้งหมด
                                                </th> 
                                                <th style="color: #000 !important;">฿<?= number_format($total, 2) ?></th>  
                                            </tr> 
                                        </tfoot>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12"  style="margin-top: 25px;">
                                <?php if (count($cartdata) > 0): ?>
                                    <a href="<?= base_url("checkout") ?>"  class="btn btn-campaign cart">ดำเนินการต่อ</a>
                                <?php else: ?>
                                    <a href="javascript:;"  class="btn btn-campaign cart disabled">ดำเนินการต่อ</a>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-xs-12 text-center"  style="margin-top: 25px;">
                                <img style="width: 350px;" src="<?= base_url("res/img/shipperio4.png") ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center"  style="margin-top: 25px;">
                                <p class="customtitle">ไม่มีสินค้าในรถเข็นของคุณ</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center"  style="margin-top: 25px;">
                                 <a href="<?= base_url("campaign") ?>"  class="btn btn-campaign cart">ไปดูสินค้า</a>
                            </div>
                        </div>
                    <?php endif; ?>


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

        });


        function init() {
            $(".overlay-loader").hide();
        }
    </script>

</html>
