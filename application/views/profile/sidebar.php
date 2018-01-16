<div class="col-xs-4">
    <div class="card-campaign" style="padding-bottom: 0px;">
        <ul class="profile">
            <li><a href="<?= base_url("profile") ?>"  class="<?= $menu == "profile" ? 'active' : ''; ?>">ข้อมูลบัญชี</a></li>
            <li><a href="<?= base_url("order") ?>"  class="<?= $menu == "profileorder" ? 'active' : ''; ?>">ออเดอร์</a></li>
            <li><a href="<?= base_url("shippingaddress") ?>"  class="<?= $menu == "shippingaddress" ? 'active' : ''; ?>">ที่อยู่จัดส่ง</a></li>
            <li><a <a href="<?= base_url("phone") ?>"  class="<?= $menu == "phone" ? 'active' : ''; ?>">เบอร์โทร</a></li>
            <li><a href="#">บัญชีธนาคาร</a></li>
            <li style="border: 0px;"><a href="<?= base_url("logout") ?>">ออกจากระบบ</a></li>
        </ul>

    </div>
</div>