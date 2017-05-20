<?php $this->load->view('templatemerchant/template/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4">
            <div class="logo">
                <img src="<?= $merchant->image ?>"/>
                <h1><?= $merchant->name ?></h1>
                <p><?= $merchant->description ?></p>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="<?= base_url("web/$merchant->name") ?>">หน้าหลัก</a></li>
                    <li class="active"><a href="<?= base_url("web/$merchant->name/about") ?>">เกี่ยวกับเรา</a></li>
                    <li><a href="<?= base_url("web/$merchant->name/contact") ?> ">ติดต่อเรา</a></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <a class="startusing" href=" <?= $merchant->lineaddurl ?>">แอดไลน์เพื่อสอบถาม คลิก!</a>
                </div>
                <div class="col-lg-12   visible-sm visible-xs">
                    <a class="startusing" style="background: #000;" href=" <?= $merchant->billtoken ?>">เปิดบิลสั่งสินค้า
                        คลิก!</a>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8">
            <div class="row">
                <div class="header-index">
                    <img src="<?= $merchant->imagecover ?>"/>

                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="white-box page">
                            <h3>เกี่ยวกับเรา</h3>
                            <?= $merchant->textabout; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>

<?php $this->load->view('templatemerchant/template/footer'); ?>

