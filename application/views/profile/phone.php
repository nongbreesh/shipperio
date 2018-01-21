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

        <script src="https://www.gstatic.com/firebasejs/4.8.2/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.8.2/firebase-auth.js"></script>
        <script>
            // Initialize Firebase
            var config = {
                apiKey: "AIzaSyAH4fJgb8tIBKsB-sa4TujhkRm-NYsJiCM",
                authDomain: "shipperio-1516000388535.firebaseapp.com",
                databaseURL: "https://shipperio-1516000388535.firebaseio.com",
                projectId: "shipperio-1516000388535",
                storageBucket: "shipperio-1516000388535.appspot.com",
                messagingSenderId: "486085236073"
            };
            firebase.initializeApp(config);
            firebase.auth().languageCode = 'th';
        </script>
        <script src="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.js"></script>
        <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.css" />
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

                <div class="col-xs-8">
                    <div class="card-campaign" style="padding:15px;">
                        <?php if ($updated == "true"): ?>
                            <div class="alert alert-success" id="passwordnotmath">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                อัพเดทข้อมูลเรียบร้อย
                            </div>
                        <?php endif; ?>

                        <h4 class="customtitle text-black">เบอร์โทรศัพท์</h4>  

                        <div class="row">
                            <div class="col-xs-12"style="margin-top: 15px;">
                                <div class="text-center">

                                    <div class="form-group "> 
                                        <div class="input-group"> 
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input  type="text" pattern="\+[0-9\s\-\(\)]+" id="phone-number" class="form-control" id="telno" value="<?= $userdetail ? $userdetail->tel : "" ?>"  placeholder="เช่น +66863647397" autofocus="true"> 
                                        </div>
                                    </div>



                                    <?php if ($userdetail): ?>
                                        <?php if ($userdetail->tel != ""): ?>
                                            <div class="row">
                                                <div class="col-xs-12" style="margin-bottom: 15px;">
                                                    <font style="color:green;"><i class="fa fa-phone"></i> Verified</font>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <button type="button"  id="sign-in-button" class="btn btn-primary" <?= $verified == "true" ? "disabled" : "" ?>>ส่งรหัสยืนยัน</button>
                                    <div id="recaptcha-container"></div>


                                </div>

                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalAdded" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  data-backdrop="static" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title customtitle" id="myModalLabel">Enter your 6-digit verification code</h4>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <form class="form-inline" id="verification-code-form" action="#">
                                <div class="form-group"> 
                                    <div class="input-group"> 
                                        <input type="text" id="verification-code" class="form-control" id="telno"  placeholder="ระบุรหัส 6 หลัก" autofocus="true"> 
                                    </div>
                                </div>
                                <input  type="submit" value="ยืนยัน"  id="verify-code-button" class="btn btn-primary"/>
                            </form>
                            <p>รหัสถูกส่งไปที่ <span id="span_phonno"></span></p>
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
    <script src="<?= base_url("res/bootstrap/js/modal.js") ?>" type="text/javascript"></script>
    <script src="https://cdn.omise.co/omise.js.gz"></script> 
    <script>
            $(document).ready(function () {
                init();
                document.getElementById('phone-number').addEventListener('keyup', updateSignInButtonUI);
                document.getElementById('phone-number').addEventListener('change', updateSignInButtonUI);
                document.getElementById('verification-code').addEventListener('keyup', updateVerifyCodeButtonUI);
                document.getElementById('verification-code').addEventListener('change', updateVerifyCodeButtonUI);
                document.getElementById('verification-code-form').addEventListener('submit', onVerifyCodeSubmit);
            });


            function init() {
                $(".overlay-loader").hide();
                isSameNum();

                // [START appVerifier]
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
                    'size': 'invisible',
                    'callback': function (response) {
                        // reCAPTCHA solved, allow signInWithPhoneNumber.
                        onSignInSubmit();
                    }
                });
                // [END appVerifier]
                recaptchaVerifier.render().then(function (widgetId) {
                    window.recaptchaWidgetId = widgetId;
                    updateSignInButtonUI();
                });
            }




            function onSignInSubmit() {
                if (isPhoneNumberValid()) {
                    window.signingIn = true;
                    updateSignInButtonUI();
                    var phoneNumber = getPhoneNumberFromUserInput();
                    var appVerifier = window.recaptchaVerifier;
                    firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                            .then(function (confirmationResult) {
                                // SMS sent. Prompt user to type the code from the message, then sign the
                                // user in with confirmationResult.confirm(code).
                                window.confirmationResult = confirmationResult;
                                window.signingIn = false;
                                $("#span_phonno").html(phoneNumber);
                                updateSignInButtonUI();
                                updateVerificationCodeFormUI(true);
                                updateVerifyCodeButtonUI();
                            }).catch(function (error) {
                        // Error; SMS not sent
                        console.error('Error during signInWithPhoneNumber', error);
                        window.alert('Error during signInWithPhoneNumber:\n\n'
                                + error.code + '\n\n' + error.message);
                        window.signingIn = false;
                        updateSignInButtonUI();
                    });
                }
            }

            function getPhoneNumberFromUserInput() {
                var number = document.getElementById('phone-number').value;
                if (number.length == 1) {
                    if (number == 0) {
                        $("#phone-number").val("+66");
                        number = "+66";
                    }
                }
                return number;
            }

            function isSameNum() {
                if ($("#phone-number").val() == <?= $userdetail ? $userdetail->tel == '' ? '+66' : $userdetail->tel : "+66" ?>) {
                    return true;
                }
                return false;
            }

            function isPhoneNumberValid() {
                var pattern = /^\+[0-9\s\-\(\)]+$/;
                var phoneNumber = getPhoneNumberFromUserInput();
                return phoneNumber.search(pattern) !== -1;
            }

            function updateSignInButtonUI() {
                if (isSameNum()) {
                    document.getElementById('sign-in-button').disabled = true;
                } else {
                    document.getElementById('sign-in-button').disabled =
                            !isPhoneNumberValid()
                            || !!window.signingIn;
                }

            }

            /**
             * Updates the state of the Verify code form.
             */
            function updateVerificationCodeFormUI(_bool) {
                if (_bool) {
                    $("#modalAdded").modal("show");
                } else {
                    $("#modalAdded").modal("hide");
                }
            }

            /**
             * Updates the Verify-code button state depending on form values state.
             */
            function updateVerifyCodeButtonUI() {
                document.getElementById('verify-code-button').disabled =
                        !!window.verifyingCode
                        || !getCodeFromUserInput();
            }

            /**
             * Reads the verification code from the user input.
             */
            function getCodeFromUserInput() {
                return document.getElementById('verification-code').value;
            }


            /**
             * Function called when clicking the "Verify Code" button.
             */
            function onVerifyCodeSubmit(e) {
                e.preventDefault();
                if (!!getCodeFromUserInput()) {
                    window.verifyingCode = true;
                    updateVerifyCodeButtonUI();
                    var code = getCodeFromUserInput();
                    confirmationResult.confirm(code).then(function (result) {
                        console.log(result);
                        // User signed in successfully.
                        var user = result.user;
                        window.verifyingCode = false;
                        window.confirmationResult = null;
                        updateVerificationCodeFormUI(false);

                        updatephone();
                    }).catch(function (error) {
                        // User couldn't sign in (bad verification code?)
                        console.error('Error while checking the verification code', error);
                        window.alert('Error while checking the verification code:\n\n'
                                + error.code + '\n\n' + error.message);
                        window.verifyingCode = false;
                        updateSignInButtonUI();
                        updateVerifyCodeButtonUI();
                    });
                }
            }

            function updatephone() {
                $(".overlay-loader").show();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('service/updatephone'); ?>",
                    data: {phoneno: $("#phone-number").val()},
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $(".overlay-loader").hide();
                        location.reload();
                    },
                    error: function (XMLHttpRequest) {
                        $(".overlay-loader").hide();
                    }
                });
            }

    </script>

</html>
