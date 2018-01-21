<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?= $itemdetail->title ?></title>
        <meta name="description" content="<?= $itemdetail->title ?>">
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
                                <img src="<?= $itemdetail->image ?>" />
                                <div class="row block">

                                    <div class=""> 
                                        <div class="devider"></div>
                                        <div class="col-xs-12"> 
                                            <h4 class="customtitle" style="font-size: 24px;font-weight: 100"><?= $itemdetail->title ?></h4>
                                            <div class="description">
                                                <p><?= $itemdetail->description ?></p>
                                            </div>
                                        </div>
                                    </div> 

                                </div>

                            </div>

                            <div class="header">สินค้าอื่นๆของแคมเปญนี้</div>

                            <div class="row">
                                <?php foreach ($relate as $row): ?>
                                <div class="col-xs-12 col-md-4 col-lg-3 " style="padding: 5px;" data-toggle="tooltip" data-placement="top" title="<?=$row->title?>" >
                                
                                    <a href="<?= base_url("item/$row->id/$row->title") ?>" title="<?=$row->title?>" alt="<?=$row->title?>"  ><img class="img img-rounded img-responsive" src="<?= $row->image ?>" />  </a>
                               
                                    </div>
                                <?php endforeach; ?> 
                            </div>

                        </div>
                        <div class="col-xs-12 col-md-5" id="campaign-sidebar">
                            <div class="card-campaign">
                                <div class="row">
                                    <div  style="padding: 25px;">
                                        <div class="row">
                                            <div class="col-xs-7"><div class="counter" id="itemcountdown">67:20:18</div></div>
                                            <div class="col-xs-5"><div class="description" style="text-align: right;"><span class="price"><?= number_format($itemdetail->price) ?> THB</span></div></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-7"><span style="color: #000;font-size: 16px;">ค่าบริการ</span></div>
                                            <div class="col-xs-5"><div class="description"  style="text-align: right;"><span class="price"><?= number_format($itemdetail->fee) ?> THB</span></div></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6"><span style="color: #000;font-size: 16px;">จำนวน</span></div>
                                            <div class="col-xs-6"><div id="np" style="float: right"></div></div>
                                        </div>

                                        <div class="row" style="margin-top: 25px;">
                                            <div class="col-xs-12">
                                                <div class="devider"></div>
                                                <button  class="btn btn-campaign btn-outline" onclick="addcart('<?= $itemdetail->id ?>');">เพิ่มลงรถเข็น</button>
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
                                                    <img class="img-circle"  src="http://graph.facebook.com/<?= $itemdetail->fbid ?>/picture?type=square" />
                                                </div>
                                                <div style="padding-top: 20px;float: left;display: inline-block;">
                                                    <h5><?= $itemdetail->firstname ?>&nbsp;<?= $itemdetail->lastname ?></h5>
                                                    <?php if ($itemdetail->status == 0): ?>
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
                                                        <span>สถานที่หิ้ว </span><?= $itemdetail->shipfrom ?>
                                                        <br/>
                                                        <span>สถานที่ส่ง </span><?= $itemdetail->shipto ?>
                                                        <br/>
                                                        <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; วันที่เดินทางไป </span> <?= date("j F, Y", strtotime($itemdetail->campaignstart)); ?>
                                                        <br/>
                                                        <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; วันที่เดินทางกลับ </span>  <?= date("j F, Y", strtotime($itemdetail->campaignend)); ?>

                                                    </div>
                                                    <div class="title"><i class="sheld"></i>&nbsp; <?= $itemdetail->campaigntitle ?></div>
                                                    <div class="description"><?= $itemdetail->campaigndesc ?></div>

                                                </div>
                                            </div> 

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="header">ที่ตั้งสินค้า</div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div id="map" style="width: 100%; height: 350px;"></div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>







            </div>
        </div>
    </div>

    <?php $this->load->view('template/footer'); ?>

    <!-- Modal -->
    <div class="modal fade" id="modalAdded" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title customtitle" id="myModalLabel">ข้อความจากระบบ</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">

                        <img src="<?= base_url("res/img/addcart.png") ?>"  style="width: 250px; margin: 0 auto;"/>
                        <br/>
                        <br/>
                        <font class="customtitle" style="color: #4CAF50;">คุณได้เพิ่ม <?= $itemdetail->title ?>  จำนวน <span id="amount"></span> ชิ้น ลงตะกร้าแล้ว!</font>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <a href="<?= base_url("cart") ?>" type="button" class="btn btn-primary">ไปที่ตะกร้า</a>
                </div>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript" src="<?= base_url("res/js/jquery-3.2.0.min.js") ?>"></script> 
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url("res/bootstrap/js/bootstrap.min.js") ?>"></script>
<script src="<?= base_url("res/bootstrap/js/modal.js") ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url("res/js/jquery.countdown.min.js") ?>"></script>
<script src="<?= base_url("res/plugins/Simple-Number-Spinner-Input-Plugin-For-jQuery-DP-Number-Picker/src/minified/jquery.dpNumberPicker-1.0.1-min.js") ?>"></script>
<script src="<?= base_url("res/bootstrap/js/tooltip.js") ?>" type="text/javascript"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxTz2SIiSSctclQuWdqpY52fmuI8sgI1Q&callback=initMap">
</script>
<script>
    $(document).ready(function () {
        init();
        initMap();
        $("div[class=counter]").each(function (index, obj) {
            var enddate = $(obj).attr("enddate");
            $(obj).countdown(enddate, function (event) {
                $(this).text(
                        event.strftime('%D days %H:%M:%S')
                        );
            });

        });
    });
    function initMap() {
        var uluru = {lat: <?= $itemdetail->lat ?>, lng: <?= $itemdetail->lng ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }

    function init() {
        $('[data-toggle="tooltip"]').tooltip();
        $(".overlay-loader").hide();
        $("#np").dpNumberPicker({
            value: 0,
            min: 0,
            max: 999,
            step: 1
        });

        $("#itemcountdown").countdown("<?= $itemdetail->end ?>", function (event) {
            $(this).text(
                    event.strftime('%D days %H:%M:%S')
                    );
        });
    }

    function addcart(id) {

        var amount = $('.dp-numberPicker-input').val();

        $("#amount").html(amount);
        if (amount > 0) {
            $(".overlay-loader").show();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('service/addcart'); ?>",
                data: {'itemid': id, 'amount': amount},
                dataType: "json",
                success: function (data) {
                    $("#modalAdded").modal("show");
                    $("#cartnum").html(data.cartnum);
                    $(".overlay-loader").hide();

                },
                error: function (XMLHttpRequest) {

                }
            });

        } else {
            alert("จำนวนสินค้าต้องมากว่า 0");
        }

    }
</script>

</html>
