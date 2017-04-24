<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>  
        <ul class="nav" id="side-menu" style="margin-top: 60px;">
            <li> 
                <a href="<?= base_url("account/$token/dashboard") ?>" ><i class="icon-graph  fa-fw" data-icon="v"></i> แดชบอร์ด <span class="fa arrow"></span></a> 
            </li>
            <li> 
                <a href="<?= base_url("account/$token/report") ?>"><i class="ti-pie-chart fa-fw" data-icon="v"></i> รายงาน(Beta) <span class="fa arrow"></span></a> 
            </li>
            <li> 
                <a href="<?= base_url("account/$token/customer") ?>"><i class="icon-user fa-fw" data-icon="v"></i> ดูแลลูกค้า <span class="fa arrow"></span></a> 

            <li class="devider"></li>
            <li> <a href="javascript:;" ><i class="ti-package fa-fw"></i> <span class="hide-menu">คลังสินค้า<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?= base_url("account/$token/products") ?>"><i class="fa-fw">P</i><span class="hide-menu">สินค้า</span></a></li> 
                </ul>
            </li>
            <li class="devider"></li>
            <li> <a href="javascript:;" ><i class="ti-money fa-fw"></i> <span class="hide-menu">ข้อมูลการเงิน<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?= base_url("account/$token/paymentmethod") ?>"><i class="ti-credit-card fa-fw"></i><span class="hide-menu">เพิ่มบัญชี</span></a></li> 
                </ul>
            </li>
            <li> <a href="javascript:;" ><i class="ti-receipt fa-fw"></i> <span class="hide-menu">ออเดอร์<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?= base_url("account/$token/order/all") ?>"><i class="fa-fw">O</i><span class="hide-menu">ดูแลออเดอร์</span></a></li> 
                </ul>
            </li>
        </ul>
    </div>
</div>