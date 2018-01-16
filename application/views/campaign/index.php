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
        </div>


    </header> 

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-2">
                <h6 class="customtitle">ประเทศ</h6> 
                <ul class="nav">
                    <li><a href="#">ไทย</a></li>
                    <li><a href="#">ญี่ปุ่น</a></li>
                    <li><a href="#">เกาหลี</a></li>
                    <li><a href="#">จีน</a></li>
                </ul>
            </div>

            <div class="col-xs-12 col-md-10">
                <div class="row text-center">
                    <h5 class="customtitle text-black">สินค้าพรีออเดอร์</h5>
                    <p class="text-grey">สินค้าที่กำลังเปิดรับพรีออเดอร์ทั้งหมด</p>
                </div>
                <div class="row">
                    <?php foreach ($item as $row): ?>
                        <div class="col-xs-12 col-md-4 col-lg-3">
                            <div class="card-campaign">
                                <img src="<?= $row->image ?>" />
                                <div class="row block">
                                    <div class="">

                                        <div class="col-xs-12"> 
                                            <div class="title  "><i class="sheld"></i>&nbsp;<?= $row->title ?></div>
                                            <div class="description"><i class="fa fa-location-arrow"></i> <u><?= $row->place ?></u></div>
                                            <div class="row">
                                                <div class="col-xs-6"><div class="counter" enddate="<?= $row->end ?>">0day:00:00</div></div>
                                                <div class="col-xs-6"><div class="description"><span class="price"><?= number_format($row->price) ?> THB</span></div></div>
                                            </div>

                                            <a href="<?= base_url("item/$row->id") ?>"  class="btn btn-campaign btn-outline">สั่งเลย</a>
                                        </div>
                                    </div> 

                                </div>
                            </div>
                        </div> 
                    <?php endforeach; ?>


                </div>
<!--                <div class="row">
                    <div class="col-xs-12">
                        <button  class="btn btn-campaign more">ดูสินค้าทั้งหมด</button>
                    </div>
                </div>-->


                <div class="row text-center">
                    <h5 class="customtitle text-black">แคมเปญที่กำลังรออเดอร์</h5>
                    <p class="text-grey">เหล่าบรรดานักช๊อปทั้งหลายที่กำลังรอหิ้วของให้ท่าน</p>
                </div>

                <div class="row">
                    <?php foreach ($campaign as $row): ?>
                        <div class="col-xs-12 col-md-6 col-lg-4">
                            <div class="card-campaign">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div style="padding: 15px;width: 80px; float: left;display: inline-block;">
                                            <img class="img-circle"  src="http://graph.facebook.com/<?= $row->fbid ?>/picture?type=square" />
                                        </div>
                                        <div style="padding-top: 20px;float: left;display: inline-block;">
                                            <h5><?= $row->firstname ?>&nbsp;<?= $row->lastname ?></h5>
                                            <?php if ($row->status == 0): ?>
                                                <font ><i class="fa fa-circle" aria-hidden="true" style="color:orange;"></i>&nbsp; รออัพเดท</font>
                                            <?php endif; ?>
                                            <?php if ($row->status == 1): ?>
                                                <font><i class="fa fa-circle greenlight" aria-hidden="true"></i>&nbsp; กำลังรับออเดอร์</font>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="row block">
                                    <div class=""> 
                                        <div class="devider"></div>
                                        <div class="col-xs-12">
                                            <div class="shipping-badge">
                                                <span><i class="fa fa-plane" aria-hidden="true"></i>&nbsp; สถานที่หิ้ว </span><?= $row->shipfrom ?>
                                                <br/>
                                                <span><i class="fa fa-plane fa-rotate-90"   aria-hidden="true"></i>&nbsp; สถานที่ส่ง </span><?= $row->shipto ?> 
                                                <br/>
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; วันที่เดินทางไป </span> <?= date("j F, Y", strtotime($row->campaignstart)); ?>
                                                <br/>
                                                <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; วันที่เดินทางกลับ </span>  <?= date("j F, Y", strtotime($row->campaignend)); ?>
                                            </div>
                                            <div class="title"><i class="sheld"></i>&nbsp; <?= $row->title ?></div>
                                            <div class="description"><?= $row->description ?></div>
                                            <button  class="btn btn-campaign btn-outline">ดูสินค้า</button>
                                        </div>
                                    </div> 

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>




                </div>
<!--                <div class="row">
                    <div class="col-xs-12">
                        <button  class="btn btn-campaign more">ดูแคมเปญทั้งหมด</button>
                    </div>
                </div>-->
            </div>
        </div>
    </div>

    <?php $this->load->view('template/footer'); ?>

</body>
<script type="text/javascript" src="<?= base_url("res/js/jquery-3.2.0.min.js") ?>"></script> 
<script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url("res/bootstrap/js/bootstrap.min.js") ?>"></script>
<script type="text/javascript" src="<?= base_url("res/js/jquery.countdown.min.js") ?>"></script>
<script>
    $(document).ready(function () {
        init();
        $("div[class=counter]").each(function (index, obj) {
            var enddate = $(obj).attr("enddate");
            $(obj).countdown(enddate, function (event) {
                $(this).text(
                        event.strftime('%D days %H:%M:%S')
                        );
            });

        });
    });


    function init() {
        $(".overlay-loader").hide();
    }
</script>

</html>
