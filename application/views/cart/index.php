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
                <div class="row">
                    <div class="col-xs-12" style="overflow-x: scroll;">
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

                               
                                <tr> 
                                    <th scope="row">
                                        <a href="#" class="remove" title="Remove this item" >X</a>
                                    </th> 
                                    <td><img width="100" height="100" src="https://www.dhresource.com/0x0s/f2-albu-g2-M01-A1-E5-rBVaG1ZJdrGAVObbAAD3P8iQUto609.jpg/hot-new-the-peanuts-movie-8-snoopy-plush.jpg"  ></td> 
                                    <td>ตุ๊กตาสนูปปี้</td> 
                                    <td>฿2,600.00</td> 
                                    <td><input type="number" class="input-text qty text" value="1" /></td> 
                                    <td>฿2,600.00</td> 
                                </tr> 
 
                                <tr> 
                                    <th scope="row">
                                        <a href="#" class="remove" title="Remove this item" >X</a>
                                    </th> 
                                    <td><img width="100" height="100" src="https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C02-180x180.png"  ></td> 
                                    <td>ตุ๊กตาสนูปปี้</td> 
                                    <td>฿2,600.00</td> 
                                    <td><input type="number" class="input-text qty text" value="1" /></td> 
                                    <td>฿2,600.00</td> 
                                </tr> 

                                <tr> 
                                    <th scope="row">
                                        <a href="#" class="remove" title="Remove this item" >X</a>
                                    </th> 
                                    <td><img width="100" height="100" src="https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-180x180.jpeg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-180x180.jpeg 180w, https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-150x150.jpeg 150w, https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-290x290.jpeg 290w, https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-270x270.jpeg 270w, https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-300x300.jpeg 300w, https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-600x600.jpeg 600w" sizes="(max-width: 180px) 100vw, 180px"></td> 
                                    <td>ตุ๊กตาสนูปปี้</td> 
                                    <td>฿2,600.00</td> 
                                    <td><input type="number" class="input-text qty text" value="1" /></td> 
                                    <td>฿2,600.00</td> 
                                </tr> 
                                <tr> 
                                    <th scope="row">
                                        <a href="#" class="remove" title="Remove this item" >X</a>
                                    </th> 
                                    <td><img width="100" height="100" src="https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-180x180.jpeg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-180x180.jpeg 180w, https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-150x150.jpeg 150w, https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-290x290.jpeg 290w, https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-270x270.jpeg 270w, https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-300x300.jpeg 300w, https://d9xxmxgglu6pp.cloudfront.net/wp-content/uploads/2017/10/C07-600x600.jpeg 600w" sizes="(max-width: 180px) 100vw, 180px"></td> 
                                    <td>ตุ๊กตาสนูปปี้</td> 
                                    <td>฿2,600.00</td> 
                                    <td><input type="number" class="input-text qty text" value="1" /></td> 
                                    <td>฿2,600.00</td> 
                                </tr> 
                            </tbody>
                            <tfoot>
                                <tr> 
                                    <th  colspan="5"> 
                                    </th> 
                                    <th>  <button  class="btn btn-campaign">อัพเดทรถเข็น</button></th>  
                                </tr> 
                                <tr> 
                                    <th  colspan="5">
                                        รวมค่าสินค้า
                                    </th> 
                                    <th>฿1,666.00</th>  
                                </tr> 
                                <tr> 
                                    <th  colspan="5">
                                        Fee
                                    </th> 
                                    <th>฿150.00</th>  
                                </tr> 
                                <tr> 
                                    <th  colspan="5">
                                        รวมทั้งหมด
                                    </th> 
                                    <th>฿1756.00</th>  
                                </tr> 
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12"  style="margin-top: 25px;">
                        <a href="<?= base_url("checkout")?>"  class="btn btn-campaign cart">ดำเนินการต่อ</a>
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
