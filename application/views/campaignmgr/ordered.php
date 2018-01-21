<div class="row">
    <div class="col-xs-12" style="overflow-x: scroll;">
           <?php if ($update == "true"): ?>
            <div class="alert alert-success" id="passwordnotmath">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                อัพเดทข้อมูลเรียบร้อย
            </div>
        <?php endif; ?>
        <form method="post" class="form form-inline" id="formsubmit" > 
            <table class="table table-hover tb-cart" style="min-width:850px">
                <thead> 
                    <tr>  
                        <th>order ref</th>
                        <th>#</th>
                        <th>รายการสินค้า</th> 
                        <th>จำนวน</th> 
                        <th>ยอดรวม</th> 
                        <th>วันที่สั่ง</th> 
                        <th style="width:350px;">ยืนยันการซื้อ</th> 
                    </tr>
                </thead>
                <tbody> 

                    <?php foreach ($orderlist as $row): ?>
                        <tr>  
                            <td><?= $row->ref ?></td>  
                            <td><img  class="img img-rounded" style="width: 60px;" src="<?= $row->image ?>"  ></td>                          
                            <td><?= $row->title ?></td>  
                            <td><?= $row->amount ?></td> 
                            <td>฿<?= number_format(($row->price + $row->fee) * $row->amount, 2) ?></td> 
                            <td><?= date("j F, Y H:i:s", strtotime($row->orderdate)); ?></td> 

                            <td><button class="btn btn-success" type="button" onclick="doconfirm('<?= $row->orderdetailid ?>', '<?= $row->title ?>', '<?= $row->amount ?>')">ยืนยันการซื้อ</button>
                                <button  class="btn" type="button" onclick="cancel('<?= $row->orderdetailid ?>')">ยกเลิกการซื้อ/คืนเงิน</button></td> 
                        </tr> 
                    <?php endforeach; ?>   
                </tbody> 
            </table>
            <input id="orderdetailid" name="orderdetailid" type="hidden" />
            <input id="status" name="status" type="hidden" />
            <input id="remark" name="remark" type="hidden" />
        </form>
    </div>
</div>


<script>

    function doconfirm(id, title, amount) {
        if (confirm("ยืนยันการซื้อสินค้า '" + title + "'\n\
จำนวน '" + amount + "'\n\
คุณจะไม่สามารถยกเลิกรายการนี้ได้อีก")) {
            $("#orderdetailid").val(id);
            $("#status").val("1");
            $("#formsubmit").submit();
        }
    }

    function cancel(id) {
        var val = prompt("ระบุเหตุผล", "สินค้าหมด");

        if (val != null) {
            $("#orderdetailid").val(id);
            $("#status").val("-1");
            $("#remark").val(val);
            $("#formsubmit").submit();
        }
    }

</script>