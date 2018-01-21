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
                <form class="checkout" id="checkout" method="post"  >
                    <div class="row">
                        <div class="col-xs-12"  >


                            <h6 class="customtitle">ที่อยู่จัดส่ง</h6>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="text-danger">ชื่อ <abbr class="required" title="required">*</abbr></label>
                                    <input required="required" type="text"  name="billing_name" id="billing_name" placeholder="" value="<?= $address ? $address->name : '' ?>"   autofocus="autofocus" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="billing_first_name" class="text-danger">เบอร์โทรศัพท์มือถือ <abbr class="required" title="required">*</abbr></label>
                                    <input required="required"  type="tel"  name="billing_tel" id="billing_tel" placeholder="" value="<?= $userdetail->tel ?>"   autofocus="autofocus" class="form-control">
                                </div>
                                <div class="col-xs-6">
                                    <label for="billing_first_name" class="text-danger">อีเมล์  <abbr class="required" title="required">*</abbr></label>
                                    <input required="required"  type="email"  name="billing_email" id="billing_email" placeholder="" value="<?= $user["email"] ?>"   autofocus="autofocus" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="">บริษัท / หมู่บ้าน / คอนโด</label>
                                    <input  required="required" type="text"  name="billing_address1" id="billing_address1" placeholder="" value="<?= $address ? $address->address1 : '' ?>"   autofocus="autofocus" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="text-danger">ที่อยู่ <abbr class="required" title="required">*</abbr></label>
                                    <textarea  style=" padding: 10px;    height: 80px;"  required="required" type="text"  name="billing_address2" id="billing_address2" placeholder="" value="<?= $address ? $address->address2 : '' ?>"   autofocus="autofocus" class="form-control"><?= $address ? $address->address2 : '' ?></textarea>
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
                                    <?php
                                    $summary = 0;
                                    $total;
                                    foreach ($cartdata as $row):
                                        ?>
                                            <tr> 
                                                <td><?= $row["title"] ?></td>  
                                                <td><?= $row["amount"] ?></td> 
                                                <td>฿<?= number_format(($row["price"] + $row["fee"]) * $row["amount"], 2) ?></td> 
                                            </tr> 
                                            <?php
                                            $summary += ($row["price"] + $row["fee"]) * $row["amount"];
                                            ?>
                                        <?php endforeach; ?> 


                                    </tbody>
                                    <tfoot>

                                        <tr> 
                                            <th  colspan="2">
                                                รวมค่าสินค้า
                                            </th> 
                                            <th>฿<?= number_format($summary, 2) ?></th>  
                                        </tr> 
                                        <tr> 
                                            <th  colspan="2">
                                                Fee
                                            </th> 
                                            <th>฿<?= number_format($summary * CHARGE, 2) ?></th>  
                                            <?php
                                            $total = $summary + ($summary * CHARGE);
                                            ?>
                                        </tr> 
                                        <tr> 
                                            <th  colspan="2">
                                                รวมทั้งหมด
                                            </th> 
                                            <th style="color: #000 !important;">฿<?= number_format($total, 2) ?></th>  
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
                                                <input  required="required" id="omise_card_number" class="input-text form-control" type="text" maxlength="20" autocomplete="off" placeholder="•••• •••• •••• ••••" name="omise_card_number">
                                            </p>

                                            <p class="form-row form-row-wide omise-required-field woocommerce-validated">
                                                <label for="omise_card_name">ชื่อบนบัตร</label>
                                                <input  required="required" id="omise_card_name" class="input-text form-control" type="text" maxlength="255" autocomplete="off" placeholder="FULL NAME" name="omise_card_name">
                                            </p>
                                            <p class="form-row form-row-first omise-required-field woocommerce-validated">
                                                <label for="omise_card_expiration_month">เดือนหมดอายุ</label>
                                                <input  required="required" id="omise_card_expiration_month" class="input-text form-control" type="text" autocomplete="off" placeholder="MM" name="omise_card_expiration_month">
                                            </p>
                                            <p class="form-row form-row-last omise-required-field woocommerce-validated">
                                                <label for="omise_card_expiration_year">ปีหมดอายุ</label>
                                                <input  required="required" id="omise_card_expiration_year" class="input-text form-control" type="text" autocomplete="off" placeholder="YYYY" name="omise_card_expiration_year">
                                            </p>
                                            <p class="form-row form-row-first omise-required-field woocommerce-validated">
                                                <label for="omise_card_security_code">รหัสความปลอดภัย</label>
                                                <input  required="required" id="omise_card_security_code" class="input-text form-control" type="password" autocomplete="off" placeholder="•••" name="omise_card_security_code">
                                            </p>

                                            <div class="clear"></div>


                                            <div class="clear"></div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 text-center"  style="margin-top: 15px;">
                            ( Shipperio ไม่มีนโยบายเก็บข้อมูลบัตรของลูกค้า )
                            <div class="checkbox">
                                <label>
                                    <input style="margin-top: 10px;" type="checkbox" id="chk_agree" class="checkbox-primary"> ฉันได้อ่าน <a href="javascript:;" onclick="showAgree();"><u>เงื่อนไขและข้อกำหนด</u></a> แล้ว
                                </label>
                            </div>
                            <span class="tool-tip" data-toggle="tooltip" data-placement="top" title="ฉันแน่ใจว่าได้อ่านเงื่อนไขและข้อกำหนดครบถ้วนแล้ว">
                                <button name="btn_submit" id="btn_submit" type="submit"   class="btn btn-campaign cart" >ยืนยันการสั่งซื้อ</button>
                            </span>
                        </div>
                    </div>  
                </form>

            </div>
        </div>
    </div> 

    <!-- Modal -->
    <div class="modal fade" id="agreeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เงื่อนไขและข้อกำหนด / นโยบายการคืนเงิน</h4>
                </div>
                <div class="modal-body" style="font-size: 12px;"> 
                    <b>เว็บไซต์ Shipperio ขอแจ้งนโยบายการคืนเงินเพื่อเป็นข้อตกลงและสร้างความเข้าใจเกี่ยวกับการใช้บริการเว็บไซต์ ดังนี้</b>
                    <br/>
                    <b>- เว็บไซต์ จะทำการคืนเงินค่าสินค้าให้กับลูกค้า ในกรณีที่ผู้ขายไม่สามารถจัดส่งสินค้าได้ตามที่ลูกค้าสั่งซื้อ</b>
                    <br/>
                    <b>- ระยะเวลาการคืนเงินค่าสินค้า มีรายละเอียดดังนี้</b>
                    <br/>
                    <li>กรณีลูกค้าชำระเงินเต็มจำนวนหรือผ่อนชำระ ตัดผ่านบัตรเครดิต จะทำการคืนเงินกลับไปยังบัตรเครดิตที่ลูกค้าใช้ในการชำระเงิน โดยใช้ระยะเวลาประมาณ 15-20 วันทำการ</li>
                    <li>กรณีลูกค้าชำระเงินเต็มจำนวน ผ่านช่องทาง Internet Banking, เคาน์เตอร์เซอร์วิส, เก็บเงินปลายทาง จะทำการคืนเงินกลับไปยังเลขที่บัญชีที่ลูกค้าแจ้ง โดยใช้ระยะเวลาประมาณ 45-60 วันทำการ นับจากวันที่ลูกค้าได้รับการแจ้งจาก Call Center (และมีการแจ้งเอกสารประกอบการคืนเงินครบถ้วน)</li>
                    <b>- ไม่สามารถดำเนินการยกเลิก เปลี่ยนแปลง แก้ไข รายการสั่งซื้อสินค้า ในกรณีต่างๆ ดังนี้</b>
                    <br/>
                    กรณีที่เกิดขึ้นจากความผิดพลาดในการสั่งซื้อสินค้า ผิดสี, ผิดรุ่น, ผิดประเภทฯ
                    กรณีที่เกิดขึ้นจากการเปลี่ยนแปลงของราคาสินค้าที่อาจเกิดขึ้นได้ในอนาคต
                    รวมถึง Gift Voucher ต่างๆ ทุกกรณีกรณีที่เกิดขึ้นจากความต้องการใส่ส่วนลดเพิ่มเติม, ลืมใส่ส่วนลด, Coupon
                    กรณีที่เกิดขึ้นจากการเปลี่ยนใจ (Change of mind) ของผู้สั่งซื้อสินค้าทุกกรณี
                    <b>- บริษัทฯ จะดำเนินการคืนเงินทั้งหมด เนื่องจากกรณีต่างๆ ดังนี้</b>
                    <br/>
                    กรณีที่เกิดขึ้นจากสินค้าไม่ถูกการจัดส่ง เนื่องจากผู้ขายภายในเว็บไซต์เข้าข่ายทุจริต และทางเว็บไซต์ตรวจสอบว่าผิดจริง
                    <br/>
                    กรณีที่เกิดขึ้นจากเหตุสุดวิสัย (System Error) ที่อาจเกิดขึ้น
                     <b>- บริษัทฯ ขอสงวนสิทธิ์ในการคืนเงินเกินระยะเวลาที่กำหนด หากเกิดเหตุสุดวิสัย</b>
                     <b>- บริษัทฯ ขอสงวนสิทธิในการเปลี่ยนแปลงเงื่อนไขใดๆ โดยไม่จำต้องแจ้งให้ทราบล่วงหน้า</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">รับทราบ</button> 
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('template/footer'); ?>

</body>
<script type="text/javascript" src="<?= base_url("res/js/jquery-3.2.0.min.js") ?>"></script> 
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?= base_url("res/bootstrap/js/bootstrap.min.js") ?>"></script> 
<script src="<?= base_url("res/bootstrap/js/tooltip.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("res/bootstrap/js/modal.js") ?>" type="text/javascript"></script>
<script src="https://cdn.omise.co/omise.js.gz"></script>

<script>
                                        $(document).ready(function () {
                                            init();

                                        });

                                        function showAgree() {
                                            $("#agreeModal").modal("show");
                                        }
                                        function init() {
                                            $('[data-toggle="tooltip"]').tooltip();
                                            $("#btn_submit").attr("disabled", "disabled");
                                            $("input[id='chk_agree']").change(function () {
                                                if ($('#chk_agree').prop('checked')) {
                                                    $("#btn_submit").removeAttr("disabled");
                                                } else {
                                                    $("#btn_submit").attr("disabled", "disabled");
                                                }
                                            });
                                            $(".overlay-loader").hide();
                                            Omise.setPublicKey("pkey_test_5a66vu8bkcbk2nqwsq9");
                                        }
                                        $('#checkout').submit(function (e) {
                                            e.preventDefault();
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
                                        });

                                        function sendcharge(token) {
                                            $('<input />').attr('type', 'hidden')
                                                    .attr('name', "card_token")
                                                    .attr('value', token)
                                                    .appendTo('#checkout');


                                            $.ajax({
                                                type: "POST",
                                                url: "<?php echo base_url('service/chargecredit'); ?>",
                                                data: $('#checkout').serialize(),
                                                dataType: "json",
                                                success: function (data) {
                                                    //console.log(data);
                                                    $(".overlay-loader").hide();
                                                    location.href = "<?= base_url('ordercompleted') ?>"
                                                },
                                                error: function (XMLHttpRequest) {
                                                    $(".overlay-loader").hide();
                                                }
                                            });
                                        }
</script>

</html>
