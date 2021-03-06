<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
    </button>
    <a href="<?= base_url() ?>" class="logo"><img src="<?= base_url("res/img/web-logo.png") ?>"
                                                  style="width: 50px;"/> SHIPPERIO </a>
</div>
<div class="navbar-collapse collapse">
    <ul class="nav navbar-nav main">
        <li><a href="<?= base_url() ?>" class="<?= $menu == "home" ? 'active' : ''; ?>">หน้าหลัก</a></li>
        <li><a href="<?= base_url('campaign') ?>" class="<?= $menu == "campaign" ? 'active' : ''; ?>">แคมเปญ</a></li> 
<!--        <li><a href="<?= base_url('contactus') ?>" class="<?= $menu == "contact" ? 'active' : ''; ?>">ติดต่อเรา</a></li>-->
    </ul>
    <ul class="nav navbar-nav navbar-right">

        <?php if ($islogin): ?>
            <li class="startusing"><a href="<?= base_url("campaignmgr") ?>">จัดการแคมเปญ</a></li>
            <li><a href="<?= base_url('cart') ?>" style="color:#000" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart(<span id="cartnum"></span>)</a></li>
            <li>
                <a href="<?= base_url("profile") ?>" style="padding: 7px 0px 0px 10px;" ><img width="40" class="img img-circle" src="http://graph.facebook.com/<?= $user['fbid'] ?>/picture?type=square" /></a>
            </li>
    <!--            <li><a href="<?= base_url("logout") ?>">ออกจากระบบ</a></li>-->
        <?php else: ?>
            <li><a href="<?= base_url('cart') ?>" style="color:#000" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart(<span id="cartnum"></span>)</a></li>
            <li class="startusing"><a href="<?= base_url("login") ?>">เข้าสู่ระบบ!</a></li>
            <?php endif; ?>

    </ul>
</div><!--/.nav-collapse -->
<script type="text/javascript" src="<?= base_url("res/js/jquery-3.2.0.min.js") ?>"></script> 
<script>
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('service/getcartnum'); ?>",
            dataType: "json",
            success: function (data) {  
                $("#cartnum").html(data.result); 
            },
            error: function (XMLHttpRequest) {

            }
        });
    });
</script> 