<div class="row">
    <div class="col-xs-12" style="overflow-x: scroll;">
        <table class="table table-hover tb-cart" style="min-width:850px">
            <thead> 
                <tr>  
                    <th>order ref</th>
                    <th>#</th>
                    <th>รายการสินค้า</th> 
                    <th>จำนวน</th> 
                    <th>ยอดรวม</th> 
                    <th>หักค่าบริการ 3%</th> 
                    <th>เงินเข้ากระเป๋า</th> 
                    <th>วันที่ส่ง</th>  
                </tr>
            </thead>
            <tbody> 
<!--                <tr><td colspan="6 "><code>ยอดเงินจะเข้าหลังจากหักค่าบริการ 3 % ต่อรายการ</code></td>  </tr>-->
                <?php foreach ($orderlist as $row): ?>
                    <tr>  
                        <td><?= $row->ref ?></td>  
                        <td><img  class="img img-rounded" style="width: 60px;" src="<?= $row->image ?>"  ></td>                          
                        <td><?= $row->title ?></td>  
                        <td><?= $row->amount ?></td> 
                        <td>฿<?= number_format(($row->price + $row->fee) * $row->amount, 2) ?></td> 
                        <td style="color: #E91E63">- ฿<?= number_format((($row->price + $row->fee) * $row->amount) * 0.03, 2) ?></td> 
                        <td style="color: #8BC34A">+ ฿<?= number_format(($row->price + $row->fee) * $row->amount - (($row->price + $row->fee) * $row->amount) * 0.03, 2) ?></td> 

                        <td><?= date("j F, Y H:i:s", strtotime($row->shipeddate)); ?></td> 

                    </tr> 
                <?php endforeach; ?>   
            </tbody> 
        </table>
    </div>
</div>