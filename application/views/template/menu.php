       <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a href="<?= base_url() ?>" class="logo"><img src="<?= base_url("res/img/web-logo.png") ?>"
                                                              style="width: 50px;"/> SHIPPERIO </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav main">
                    <li><a href="<?= base_url() ?>">หน้าหลัก</a></li>
                    <li><a href="<?= base_url('campaign') ?>" id="howto">แคมเปญ</a></li> 
                    <li><a href="<?= base_url('contactus') ?>"  id="contact">ติดต่อเรา</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($islogin): ?>
                        <li class="startusing"><a href="<?= base_url("account/$token") ?>">จัดการร้านค้า</a></li>
                        <li><a href="<?= base_url("logout") ?>">ออกจากระบบ</a></li>
                    <?php else: ?>
                        <li class="startusing"><a href="<?= base_url("login") ?>">เริ่มสร้างแคมเปญ!</a></li>
                    <?php endif; ?>

                </ul>
            </div><!--/.nav-collapse -->
