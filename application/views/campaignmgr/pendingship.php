<div class="row">
    <div class="col-xs-12" style="overflow-x: scroll;">

        <?php if ($update == "true"): ?>
            <div class="alert alert-success" id="passwordnotmath">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                อัพเดทข้อมูลเรียบร้อย
            </div>
        <?php endif; ?>
        <table class="table table-hover tb-cart" style="min-width:850px">
            <thead> 
                <tr>  
                    <th>order ref</th>
                    <th>#</th>
                    <th>รายการสินค้า</th> 
                    <th>จำนวน</th> 
                    <th>ยอดรวม</th> 
                    <th>วันที่สั่ง</th> 
                    <th  style="width:350px;">ที่อยู่จัดส่ง</th> 
                    <th  style="width:100px;">เบอร์ติดต่อ</th> 
                    <th style="width:350px;">ยืนยันการส่ง</th> 
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
                        <td style="text-align: left;"><?= $row->billingname . "<br/>" . $row->billingaddress1 . " " . $row->billingaddress2; ?></td> 
                        <td><?= $row->billingtel ?></td>  

                        <td><button class="btn btn-success" onclick="submit('<?= $row->orderdetailid ?>', '<?= $row->ref ?>', '<?= $row->title ?>', '<?= $row->amount ?>')">ยืนยันการส่ง</button> </td> 
                    </tr> 
                <?php endforeach; ?>   
            </tbody> 
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalconfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title customtitle" id="myModalLabel">ยืนยันการจัดส่ง</h4>
            </div>
            <form method="post" class="form form-inline" > 
                <div class="modal-body" style="text-align: left;">

                    <div class="row"> 
                        <div class="col-xs-12">
                            <label for="orderref" class="">order ref</label>
                            <p id="orderref" style="font-weight: bold;color:#000"></p>
                        </div>
                        <div class="col-xs-12">
                            <label for="pruductname" class="">รายการสินค้า</label>
                            <p id="pruductname" style="font-weight: bold;color:#000"></p>
                        </div>
                        <div class="col-xs-12">
                            <label for="amount" class="">จำนวน</label>
                            <p id="amount" style="font-weight: bold;color:#000"></p>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="tracking" class="">Tracking</label>
                            <input  required="required" type="text"  name="tracking" id="tracking" placeholder="เช่น EMS tracking"    autofocus="autofocus" class="form-control">
                        </div>
                    </div>  
                    <br/>
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="remark" class="">Remark</label>
                            <input   type="text"  name="remark" id="remark" placeholder="เช่น ส่ง Kerry"   autofocus="autofocus" class="form-control">
                        </div>
                    </div> 
                    <input id="orderdetailid" name="orderdetailid" type="hidden" /> 

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button   type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>


    function submit(id, ref, name, amount) {
        $("#orderref").html(ref);
        $("#amount").html(amount);
        $("#pruductname").html(name);
        $("#orderdetailid").val(id);
        $("#modalconfirm").modal("show");
    }
</script>