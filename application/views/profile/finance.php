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

        <div class="container" >
            <div class="row"> 
                <?php $this->load->view("profile/sidebar"); ?>

                <div class="col-md-8">
                    <div class="card-campaign" style="padding:15px;">
                        <?php if ($updated == "true"): ?>
                            <div class="alert alert-success" id="passwordnotmath">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                อัพเดทข้อมูลเรียบร้อย
                            </div>
                        <?php endif; ?>
                        <form method="post" id="formsubmit" enctype="multipart/form-data" > 
                               <h4 class="customtitle text-black">บัญชีและการเงิน</h4> 
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="bankname" class="text-danger">ธนาคาร  <abbr class="required" title="required">*</abbr></label>
                                    <select id="bankname" name="bankname" class="form-control" required="required">
                                        <option  value="" disabled   <?= !$finance ? 'selected' : '' ?>>กรุณาเลือกธนาคาร</option>
                                        <?php foreach ($banks as $row): ?>
                                            <option  value="<?= $row ?>"  <?= $finance ? $finance->bankname == $row ? 'selected' : '' : '' ?> ><?= $row ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="text-danger">สาขา  <abbr class="required" title="required">*</abbr></label>
                                    <input  required="required" type="text"  name="bankbranch" id="bankbranch" placeholder="สาขา" value="<?= $finance ? $finance->bankbranch : '' ?>"   autofocus="autofocus" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="billing_first_name" class="text-danger">เลขที่บัญชี <abbr class="required" title="required">*</abbr></label>
                                    <input  required="required" type="text"  name="bankno" id="bankno" placeholder="เลขที่บัญชี" value="<?= $finance ? $finance->bankno : '' ?>"   autofocus="autofocus" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="bankimg" class="text-danger">รูปสมุดบัญชีหน้าแรก <abbr class="required" title="required">*</abbr></label>
                                    <div class="form-group"> 
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file">
                                                    Browse… <input type="file" id="imgInp">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control"   readonly>
                                            <input  type="hidden" name="bankimg" id="bankimg" />
                                        </div>
                                        <img id='img-upload' src="<?= $finance ? $finance->bankimg : '' ?>"/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-12 text-center" style="margin-top: 15px;">
                                    <button type="submit"  class="btn btn-campaign">บันทึก</button>
                                </div>
                            </div>
                        </form>
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

            $("#formsubmit").submit(function () {
                if ($("#bankimg").val() === "") {
                    alert("กรุณาเพิ่มรูปสมุดบัญชีหน้าแรก");
                    return false;
                }

            });

            $(document).on('change', '.btn-file :file', function () {
                var input = $(this),
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function (event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                        log = label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log)
                        alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                        $('#bankimg').val(e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function () {
                readURL(this);
            });
        });


        function init() {
            $(".overlay-loader").hide();


        }


    </script>

</html>
