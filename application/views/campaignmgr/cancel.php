<div class="row">
    <div class="col-xs-12" style="overflow-x: scroll;">
           
        <form method="post" class="form form-inline" id="formsubmit" > 
            <table class="table table-hover tb-cart" style="min-width:850px">
                <thead> 
                    <tr>  
                        <th>order ref</th>
                        <th>#</th>
                        <th>รายการสินค้า</th> 
                        <th>จำนวน</th> 
                        <th>ยอดรวม</th> 
                        <th>วันที่ยกเลิก</th> 
                    </tr>
                </thead>
                <tbody> 

                    <?php foreach ($orderlist as $row): ?>
                        <tr>  
                            <td><?= $row->ref ?></td>  
                            <td><img  class="img img-rounded" style="width: 60px;" src="<?= $row->image ?>"  ></td>                          
                            <td><?= $row->title ?></td>  
                            <td><?= $row->amount ?></td> 
                            <td style="color: #F44336;">- ฿<?= number_format(($row->price + $row->fee) * $row->amount, 2) ?></td> 
                            <td><?= date("j F, Y H:i:s", strtotime($row->canceldate)); ?></td> 

                            
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