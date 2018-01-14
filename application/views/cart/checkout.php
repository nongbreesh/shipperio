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
        </div>


    </header> 

    <div class="container">
        <div class="row"> 
            <div class="col-xs-12">
                <div class="row text-center">
                    <h5 class="customtitle text-black">เช็คเอาท์</h5>
                    <div class="devider" ></div>
                </div>
                <div class="row">
                    <div class="col-xs-12"  >

                        <form class="checkout" id="checkout">
                            <h6 class="customtitle">ที่อยู่จัดส่ง</h6>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="text-danger">ชื่อ <abbr class="required" title="required">*</abbr></label>
                                    <input type="text"  name="billing_first_name" id="billing_first_name" placeholder="" value=""   autofocus="autofocus" class="checkout-input">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="billing_first_name" class="text-danger">เบอร์โทรศัพท์มือถือ <abbr class="required" title="required">*</abbr></label>
                                    <input type="text"  name="billing_first_name" id="billing_first_name" placeholder="" value=""   autofocus="autofocus" class="checkout-input">
                                </div>
                                <div class="col-xs-6">
                                    <label for="billing_first_name" class="text-danger">อีเมล์  <abbr class="required" title="required">*</abbr></label>
                                    <input type="text"  name="billing_first_name" id="billing_first_name" placeholder="" value=""   autofocus="autofocus" class="checkout-input">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="">บริษัท / หมู่บ้าน / คอนโด</label>
                                    <input type="text"  name="billing_first_name" id="billing_first_name" placeholder="" value=""   autofocus="autofocus" class="checkout-input">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="text-danger">ที่อยู่ <abbr class="required" title="required">*</abbr></label>
                                    <textarea type="text"  name="billing_first_name" id="billing_first_name" placeholder="" value=""   autofocus="autofocus" class="checkout-input"></textarea>
                                </div>
                            </div>

                            <h6 class="customtitle">สรุปการสั่งสินค้า</h6>
                            <div class="summary">
                                <table class="table tb-cart">
                                    <thead> 
                                        <tr> 
                                            <th>รายการสินค้า</th> 
                                            <th>จำนวน</th> 
                                            <th>ยอดรวม</th> 
                                        </tr>
                                    </thead>
                                    <tbody
                                        <tr> 
                                            <td>A1:ตุ๊กตาสนูปปี้</td>  
                                            <td>1</td> 
                                            <td>฿2,600.00</td> 
                                        </tr> 

                                        <tr> 
                                            <td>A1:ตุ๊กตาสนูปปี้</td>  
                                            <td>1</td> 
                                            <td>฿2,600.00</td> 
                                        </tr> 
                                        <tr> 
                                            <td>A1:ตุ๊กตาสนูปปี้</td>  
                                            <td>1</td> 
                                            <td>฿2,600.00</td> 
                                        </tr> 
                                    </tbody>
                                    <tfoot>

                                        <tr> 
                                            <th  colspan="2">
                                                รวมค่าสินค้า
                                            </th> 
                                            <th>฿1,666.00</th>  
                                        </tr> 
                                        <tr> 
                                            <th  colspan="2">
                                                Fee
                                            </th> 
                                            <th>฿150.00</th>  
                                        </tr> 
                                        <tr> 
                                            <th  colspan="2">
                                                รวมทั้งหมด
                                            </th> 
                                            <th>฿1,756.00</th>  
                                        </tr> 
                                    </tfoot>
                                </table>
                            </div>

                            <h6 class="customtitle">การชำระเงิน</h6>
                            <input type="radio" id="payment_method_omise" checked="checked"><label for="payment_method_omise">
                                บัตรเครติด / บัตรเดบิต <img src="https://indiedish.co/wp-content/plugins/woocommerce/assets/images/icons/credit-cards//visa.svg" class="Omise-CardBrandImage" style="width: 38px;" alt="Visa"><img src="https://indiedish.co/wp-content/plugins/woocommerce/assets/images/icons/credit-cards//mastercard.svg" class="Omise-CardBrandImage" style="width: 38px;" alt="MasterCard">	</label>
                            <div class="payment_box payment_method_omise" style="">

                                <div id="omise_cc_form">

                                    <div>

                                        <fieldset id="new_card_form" class="">

                                            <p class="form-row form-row-wide omise-required-field woocommerce-validated">
                                                <label for="omise_card_number">หมายเลขบัตร</label>
                                                <input id="omise_card_number" class="input-text checkout-input" type="text" maxlength="20" autocomplete="off" placeholder="•••• •••• •••• ••••" name="omise_card_number">
                                            </p>

                                            <p class="form-row form-row-wide omise-required-field woocommerce-validated">
                                                <label for="omise_card_name">ชื่อบนบัตร</label>
                                                <input id="omise_card_name" class="input-text checkout-input" type="text" maxlength="255" autocomplete="off" placeholder="FULL NAME" name="omise_card_name">
                                            </p>
                                            <p class="form-row form-row-first omise-required-field woocommerce-validated">
                                                <label for="omise_card_expiration_month">เดือนหมดอายุ</label>
                                                <input id="omise_card_expiration_month" class="input-text checkout-input" type="text" autocomplete="off" placeholder="MM" name="omise_card_expiration_month">
                                            </p>
                                            <p class="form-row form-row-last omise-required-field woocommerce-validated">
                                                <label for="omise_card_expiration_year">ปีหมดอายุ</label>
                                                <input id="omise_card_expiration_year" class="input-text checkout-input" type="text" autocomplete="off" placeholder="YYYY" name="omise_card_expiration_year">
                                            </p>
                                            <p class="form-row form-row-first omise-required-field woocommerce-validated">
                                                <label for="omise_card_security_code">รหัสความปลอดภัย</label>
                                                <input id="omise_card_security_code" class="input-text checkout-input" type="password" autocomplete="off" placeholder="•••" name="omise_card_security_code">
                                            </p>

                                            <div class="clear"></div>


                                            <div class="clear"></div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12"  style="margin-top: 25px;">
                        <a  href="javascript:;" onclick="chargecredit()"  class="btn btn-campaign cart">ยืนยันการสั่งซื้อ</a>
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
                                Omise.setPublicKey("pkey_test_55ernhgh768hca1vipv");
                            }

                            function chargecredit() {
                                $(".overlay-loader").show();
                                // Given that you have a form element with an id of "card" in your page.
                                var card_form = document.getElementById("checkout");
                                // Serialize the card into a valid card object.
                                var card = {
                                    "name": card_form.omise_card_name.value,
                                    "number": card_form.omise_card_number.value,
                                    "expiration_month": card_form.omise_card_expiration_month.value,
                                    "expiration_year": card_form.omise_card_expiration_year.value,
                                    "security_code": card_form.omise_card_security_code.value
                                };

                                Omise.createToken("card", card, function (statusCode, response) {
                                    if (statusCode == 200) {
                                        sendcharge(response.id);
                                    } else {
                                        alert(response.code + ": " + response.message);
                                        $(".overlay-loader").hide();
                                    }
                                });
                            }

                            function sendcharge($token) {
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('service/chargecredit'); ?>",
                                    data: {'card_token': $token},
                                    dataType: "json",
                                    success: function (data) {
                                        console.log(data);
                                        $(".overlay-loader").hide();
                                        location.href = "<?= base_url('ordercompleted') ?>"
                                    },
                                    error: function (XMLHttpRequest) {
                                        console.log(data);
                                        $(".overlay-loader").hide();
                                    }
                                });
                            }
</script>

</html>
