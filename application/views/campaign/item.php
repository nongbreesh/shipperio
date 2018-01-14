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
        <link rel="stylesheet" href="<?= base_url("res/plugins/Simple-Number-Spinner-Input-Plugin-For-jQuery-DP-Number-Picker/src/jquery.dpNumberPicker-holoLight-1.0.1.css") ?>" />
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
                <div class="row">
                    <div style="max-width: 960px; margin:  auto;">
                        <div class="col-xs-12 col-md-7" id="campaign-sidebar">
                            <div class="card-campaign">
                                <img src="https://www.dhresource.com/0x0s/f2-albu-g2-M01-A1-E5-rBVaG1ZJdrGAVObbAAD3P8iQUto609.jpg/hot-new-the-peanuts-movie-8-snoopy-plush.jpg" />
                                <div class="row block">

                                    <div class=""> 
                                        <div class="devider"></div>
                                        <div class="col-xs-12"> 
                                            <h4 class="customtitle" style="font-size: 24px;font-weight: 100">ตุ๊กตาสนูปปี้ของแท้</h4>
                                            <div class="description">
                                                <p>Memory foam padding and soft lambskin covers let you listen comfortably for hours, Bluetooth 4.2 interface enables simple wireless pairing, rechargeable battery offers up to 21 hours of use on a single charge, built-in microphone enables simple hands-free chatting, dynamic transducer design offers reference-grade audio.</p></div>

                                        </div>
                                    </div> 

                                </div>

                            </div>

                            <div class="header">สินค้าอื่นๆของแคมเปญนี้</div>

                            <div class="row">
                                <div class="col-xs-12 col-md-4 col-lg-4">
                                    <div class="card-campaign">
                                        <img src="https://www.dhresource.com/0x0s/f2-albu-g2-M01-A1-E5-rBVaG1ZJdrGAVObbAAD3P8iQUto609.jpg/hot-new-the-peanuts-movie-8-snoopy-plush.jpg" />
                                        <div class="row block">
                                            <div class="">

                                                <div class="col-xs-12"> 
                                                    <div class="title relatetitle">ตุ๊กตาสนูปปี้ของแท้</div>
                                                    <div class="row">
                                                        <div class="col-xs-12"><div class="counter">1:11:00</div></div>
                                                        <div class="col-xs-12"><div class="description"><span class="price">600 THB</span></div></div>
                                                    </div>

                                                    <button  class="btn btn-campaign btn-outline">สั่งเลย</button>
                                                </div>
                                            </div> 

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-4 col-lg-4">
                                    <div class="card-campaign">
                                        <img src="https://www.xn--42c2ba1ay4al3d7gwa0j.com/wp-content/uploads/2017/11/%E0%B9%80%E0%B8%84%E0%B8%AA-iPhone-X-Adidas-Moulded-Case-%E0%B9%84%E0%B8%AD%E0%B9%82%E0%B8%9F%E0%B8%99-X-iPhone-X-Adidas-001.jpg" />
                                        <div class="row block">
                                            <div class="">

                                                <div class="col-xs-12"> 
                                                    <div class="title relatetitle">เคส iPhoneX Adidas ของแท้ลดราคา</div>
                                                    <div class="row">
                                                        <div class="col-xs-12"><div class="counter">47:39:00</div></div>
                                                        <div class="col-xs-12"><div class="description"><span class="price">1,200 THB</span></div></div>
                                                    </div>

                                                    <button  class="btn btn-campaign btn-outline">สั่งเลย</button>
                                                </div>
                                            </div> 

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-4 col-lg-4">
                                    <div class="card-campaign">
                                        <img src="https://media.journeys.com/images/products/1_434740_ZM.JPG" />
                                        <div class="row block">
                                            <div class="">

                                                <div class="col-xs-12"> 
                                                    <div class="title  relatetitle"><i class="sheld"></i>&nbsp;รองเท้า New Balance รุ่น Limited ของญี่ปุ่น</div>
                                                    <div class="row">
                                                        <div class="col-xs-12"><div class="counter">67:20:18</div></div>
                                                        <div class="col-xs-12"><div class="description"><span class="price">2,600 THB</span></div></div>
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
                        </div>
                        <div class="col-xs-12 col-md-5" id="campaign-sidebar">
                            <div class="card-campaign">
                                <div class="row">
                                    <div  style="padding: 25px;">
                                        <div class="row">
                                            <div class="col-xs-7"><div class="counter" id="itemcountdown">67:20:18</div></div>
                                            <div class="col-xs-5"><div class="description" style="text-align: right;"><span class="price">2,600 THB</span></div></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-7"><span style="color: #000;font-size: 16px;">ค่าหิ้ว + ค่าส่ง</span></div>
                                            <div class="col-xs-5"><div class="description"  style="text-align: right;"><span class="price">300 THB</span></div></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6"><span style="color: #000;font-size: 16px;">จำนวน</span></div>
                                            <div class="col-xs-6"><div id="np" style="float: right"></div></div>
                                        </div>

                                        <div class="row" style="margin-top: 25px;">
                                            <div class="col-xs-12">
                                                <div class="devider"></div>
                                                <button  class="btn btn-campaign btn-outline">เพิ่มลงรถเข็น</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="header">ข้อมูลนักช๊อป</div>
                            <div class="row">
                                <div class="col-xs-12">
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
                                                        <span>สถานที่หิ้ว </span>ซัปโปโร,ญี่ปุ่น
                                                        <br/>
                                                        <span>สถานที่ส่ง </span>ประเทศไทย 
                                                    </div>
                                                    <div class="title"><i class="sheld"></i>&nbsp; รับหิ้วของจากซัปโปโร</div>
                                                    <div class="description">รับหิ้วของจากซํปโปโร หลักๆจะเป็นพวกตุ๊กตาสนูปปี้ของแท้ กดติดตามรอช๊อปกันได้เลยจ้า</div>
                                                    <button  class="btn btn-campaign btn-outline">ดูสินค้าทั้งหมด</button>
                                                </div>
                                            </div> 

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="header">ที่ตั้งสินค้า</div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2915.259453053688!2d141.34873111580313!3d43.05701047914624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f0b298314dc68c9%3A0x3e09837aece117a1!2sTanukikoji+Shopping+Arcade!5e0!3m2!1sth!2sth!4v1515835011456" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>


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
<script type="text/javascript" src="<?= base_url("res/js/jquery.countdown.min.js") ?>"></script>
<script src="<?= base_url("res/plugins/Simple-Number-Spinner-Input-Plugin-For-jQuery-DP-Number-Picker/src/minified/jquery.dpNumberPicker-1.0.1-min.js") ?>"></script>

<script>
    $(document).ready(function () {
        init();

    });


    function init() {
        $(".overlay-loader").hide();
        $("#np").dpNumberPicker({
            value: 0,
            min: 0,
            max: 999,
            step: 1
        });

        $("#itemcountdown").countdown("2018/02/05 17:00:00", function (event) {
            $(this).text(
                    event.strftime('%D days %H:%M:%S')
                    );
        });
    }
</script>

</html>
