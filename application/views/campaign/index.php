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
                    <h5 class="customtitle text-black">สินค้าพรีออเดอร์</h5>
                    <p class="text-grey">สินค้าที่กำลังเปิดรับพรีออเดอร์ทั้งหมด</p>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-lg-3">
                        <div class="card-campaign">
                            <img src="https://www.dhresource.com/0x0s/f2-albu-g2-M01-A1-E5-rBVaG1ZJdrGAVObbAAD3P8iQUto609.jpg/hot-new-the-peanuts-movie-8-snoopy-plush.jpg" />
                            <div class="row block">
                                <div class="">

                                    <div class="col-xs-12"> 
                                        <div class="title  "><i class="sheld"></i>&nbsp;ตุ๊กตาสนูปปี้ของแท้</div>
                                        <div class="description"><i class="fa fa-location-arrow"></i> <u>Sapporo , Japan</u></div>
                                        <div class="row">
                                            <div class="col-xs-6"><div class="counter">1:11:00</div></div>
                                            <div class="col-xs-6"><div class="description"><span class="price">600 THB</span></div></div>
                                        </div>

                                        <a href="<?= base_url("item/1") ?>"  class="btn btn-campaign btn-outline">สั่งเลย</a>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4 col-lg-3">
                        <div class="card-campaign">
                            <img src="https://www.xn--42c2ba1ay4al3d7gwa0j.com/wp-content/uploads/2017/11/%E0%B9%80%E0%B8%84%E0%B8%AA-iPhone-X-Adidas-Moulded-Case-%E0%B9%84%E0%B8%AD%E0%B9%82%E0%B8%9F%E0%B8%99-X-iPhone-X-Adidas-001.jpg" />
                            <div class="row block">
                                <div class="">

                                    <div class="col-xs-12"> 
                                        <div class="title  "><i class="sheld"></i>&nbsp;เคส iPhoneX Adidas ของแท้ลดราคา</div>
                                        <div class="description"><i class="fa fa-location-arrow"></i> <u>Sapporo , Japan</u></div>
                                        <div class="row">
                                            <div class="col-xs-6"><div class="counter">47:39:00</div></div>
                                            <div class="col-xs-6"><div class="description"><span class="price">1,200 THB</span></div></div>
                                        </div>

                                        <button  class="btn btn-campaign btn-outline">สั่งเลย</button>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4 col-lg-3">
                        <div class="card-campaign">
                            <img src="https://media.journeys.com/images/products/1_434740_ZM.JPG" />
                            <div class="row block">
                                <div class="">

                                    <div class="col-xs-12"> 
                                        <div class="title  "><i class="sheld"></i>&nbsp;รองเท้า New Balance รุ่น Limited ของญี่ปุ่น</div>
                                        <div class="description"><i class="fa fa-location-arrow"></i> <u>Sapporo , Japan</u></div>
                                        <div class="row">
                                            <div class="col-xs-6"><div class="counter">67:20:18</div></div>
                                            <div class="col-xs-6"><div class="description"><span class="price">2,600 THB</span></div></div>
                                        </div>

                                        <button  class="btn btn-campaign btn-outline">สั่งเลย</button>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>




                    <div class="col-xs-12 col-md-4 col-lg-3">
                        <div class="card-campaign">
                            <img src="https://scontent-sea1-1.cdninstagram.com/t51.2885-15/s480x480/e35/14591133_308476329526276_589933493480325120_n.jpg?ig_cache_key=MTM1NTg3Mzk1NTQ0NTg0NzUxMg%3D%3D.2" />
                            <div class="row block">
                                <div class="">

                                    <div class="col-xs-12"> 
                                        <div class="title  "><i class="sheld"></i>&nbsp;ปูอ่อง 12ชิ้น/แพค</div>
                                        <div class="description"><i class="fa fa-location-arrow"></i> <u>เชียงใหม่ , ประเทศไทย</u></div>
                                        <div class="row">
                                            <div class="col-xs-6"><div class="counter">0:07:00</div></div>
                                            <div class="col-xs-6"><div class="description"><span class="price">100 THB</span></div></div>
                                        </div>

                                        <button  class="btn btn-campaign btn-outline">สั่งเลย</button>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button  class="btn btn-campaign more">ดูสินค้าทั้งหมด</button>
                    </div>
                </div>


                <div class="row text-center">
                    <h5 class="customtitle text-black">แคมเปญที่กำลังรออเดอร์</h5>
                    <p class="text-grey">เหล่าบรรดานักช๊อปทั้งหลายที่กำลังรอหิ้วของให้ท่าน</p>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <div class="card-campaign">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div style="padding: 15px;width: 80px; float: left;display: inline-block;">
                                        <img class="img-circle"  src="https://scontent.fbkk6-2.fna.fbcdn.net/v/t1.0-1/p160x160/24993289_1805994722757856_4432412838647803625_n.jpg?oh=f8a49d351bacd0d63bef20fc2d07e490&oe=5AB1A9F1" />
                                    </div>
                                    <div style="padding-top: 20px;float: left;display: inline-block;">
                                        <h5>Pei jang kyo</h5>
                                        <font style="color:green;"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp; กำลังรับออเดอร์</font>
                                    </div>
                                </div>
                            </div>
                            <div class="row block">
                                <div class=""> 
                                    <div class="devider"></div>
                                    <div class="col-xs-12">
                                        <div class="shipping-badge">
                                            <span><i class="fa fa-plane" aria-hidden="true"></i>&nbsp; สถานที่หิ้ว </span>ซัปโปโร,ญี่ปุ่น
                                            <br/>
                                            <span><i class="fa fa-plane fa-rotate-90"   aria-hidden="true"></i>&nbsp; สถานที่ส่ง </span>ประเทศไทย 
                                            <br/>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; วันที่เดินทางไป </span> 27 ม.ค. 2561 
                                            <br/>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; วันที่เดินทางกลับ </span> 05 ก.พ. 2561  
                                        </div>
                                        <div class="title"><i class="sheld"></i>&nbsp; รับหิ้วของจากซัปโปโร</div>
                                        <div class="description">รับหิ้วของจากซํปโปโร หลักๆจะเป็นพวกตุ๊กตาสนูปปี้ของแท้ กดติดตามรอช๊อปกันได้เลยจ้า</div>
                                        <button  class="btn btn-campaign btn-outline">ดูสินค้า</button>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <div class="card-campaign">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div style="padding: 15px;width: 80px; float: left;display: inline-block;">
                                        <img class="img-circle"  src="https://scontent.fbkk6-2.fna.fbcdn.net/v/t1.0-1/c1.0.160.160/p160x160/22141149_10210564253528829_1656992180328302101_n.jpg?oh=7e37f7b86fac6d20f7e2afbe4ac009ed&oe=5AFACE72" />
                                    </div>
                                    <div style="padding-top: 20px;float: left;display: inline-block;">
                                        <h5>Breeshy Sama</h5>
                                        <font style="color:orange;"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp; รออัพเดท</font>
                                    </div>
                                </div>
                            </div>
                            <div class="row block">
                                <div class=""> 
                                    <div class="devider"></div>
                                    <div class="col-xs-12">
                                        <div class="shipping-badge">
                                            <span><i class="fa fa-plane" aria-hidden="true"></i>&nbsp; สถานที่หิ้ว </span>ซัปโปโร,ญี่ปุ่น
                                            <br/>
                                            <span><i class="fa fa-plane fa-rotate-90"   aria-hidden="true"></i>&nbsp; สถานที่ส่ง </span>ประเทศไทย 
                                            <br/>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; วันที่เดินทางไป </span> 27 ม.ค. 2561 
                                            <br/>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; วันที่เดินทางกลับ </span> 05 ก.พ. 2561  
                                        </div>
                                        <div class="title"><i class="sheld"></i>&nbsp; รับหิ้วรองเท้า Nike , Adidas และอื่นๆ</div>
                                        <div class="description">รับหิ้วของจากซํปโปโร หลักๆจะเป็นพวกตุ๊กตาสนูปปี้ของแท้ กดติดตามรอช๊อปกันได้เลยจ้า</div>
                                        <button  class="btn btn-campaign btn-outline">ดูสินค้า</button>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <div class="card-campaign">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div style="padding: 15px;width: 80px; float: left;display: inline-block;">
                                        <img class="img-circle"  src="https://scontent.fbkk6-2.fna.fbcdn.net/v/t1.0-1/p160x160/22885767_10203450969151211_7522369326763831091_n.jpg?oh=debbc4699889f31c17a173b7335c5090&oe=5AF8B595" />
                                    </div>
                                    <div style="padding-top: 20px;float: left;display: inline-block;">
                                        <h5>Zippyzippys Chantaban</h5>
                                        <font style="color:green;"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp; กำลังรับออเดอร์</font>
                                    </div>
                                </div>
                            </div>
                            <div class="row block">
                                <div class=""> 
                                    <div class="devider"></div>
                                    <div class="col-xs-12">
                                        <div class="shipping-badge">
                                            <span><i class="fa fa-plane" aria-hidden="true"></i>&nbsp; สถานที่หิ้ว </span>ซัปโปโร,ญี่ปุ่น
                                            <br/>
                                            <span><i class="fa fa-plane fa-rotate-90"   aria-hidden="true"></i>&nbsp; สถานที่ส่ง </span>ประเทศไทย 
                                            <br/>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; วันที่เดินทางไป </span> 27 ม.ค. 2561 
                                            <br/>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; วันที่เดินทางกลับ </span> 05 ก.พ. 2561  
                                        </div>
                                        <div class="title">รับหิ้วโรตี</div>
                                        <div class="description">รับหิ้วของจากซํปโปโร หลักๆจะเป็นพวกตุ๊กตาสนูปปี้ของแท้ กดติดตามรอช๊อปกันได้เลยจ้า</div>
                                        <button  class="btn btn-campaign btn-outline">ดูสินค้า</button>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button  class="btn btn-campaign more">ดูนักช๊อปทั้งหมด</button>
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
<script>
    $(document).ready(function () {
        init();

    });


    function init() {
        $(".overlay-loader").hide();
    }
</script>

</html>
