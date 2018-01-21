<?php

class Select_model extends CI_Model {

    function userdetail($id) {
        $query = $this->db->query("select * from `user`  where id = '$id'");
        return $query->row();
    }

    function userbalance($userid) {
        $query = $this->db->query("SELECT sum(amount)as total FROM `userbalance` where userid = '$userid' group by userid");
        return $query->row();
    }

    function campaignuser($id) {
        $query = $this->db->query("SELECT  * FROM `campaign` where id = '$id'");
        return $query->row();
    }

    function alluser() {
        $query = $this->db->query("SELECT  * FROM `user`");
        return $query->result();
    }

    function newuser() {
        $query = $this->db->query("SELECT  * FROM `user` order by createdate desc limit 0,4");
        return $query->result();
    }

    function allcampaign() {
        $query = $this->db->query("SELECT  * FROM `campaign`");
        return $query->result();
    }

    function orderbycampaignuser($userid) {
        $query = $this->db->query("SELECT o.*,o.id as orderdetailid,i.*,i.*,o.createdate as orderdate FROM `orderdetail` o
            inner join items i
            on i.id = o.itemid WHERE o.campaignid in 
(select id from campaign c where c.userid = '$userid') and o.status = 0
order by o.createdate desc");
        return $query->result();
    }

    function orderbycampaignuser_pendingship($userid) {
        $query = $this->db->query("SELECT o.*,o.id as orderdetailid,i.*,o.createdate as orderdate,oo.billingaddress1,oo.billingaddress2,oo.billingname,oo.billingtel,oo.billingemail FROM `orderdetail` o
            inner join items i
            on i.id = o.itemid 
             left join `order` oo
             on oo.id = o.orderid
            WHERE o.campaignid in 
(select id from campaign c where c.userid = '$userid') and o.status = 1
order by o.createdate desc");
        return $query->result();
    }

    function orderbycampaignuser_shiped($userid) {
        $query = $this->db->query("SELECT o.*,o.id as orderdetailid,i.*,i.*,o.createdate as orderdate,oo.billingaddress1,oo.billingaddress2,oo.billingname,oo.billingtel,oo.billingemail FROM `orderdetail` o
            inner join items i
            on i.id = o.itemid 
             left join `order` oo
             on oo.id = o.orderid
            WHERE o.campaignid in 
(select id from campaign c where c.userid = '$userid') and o.status = 2
order by o.createdate desc");
        return $query->result();
    }

    function orderbycampaignuser_cancel($userid) {
        $query = $this->db->query("SELECT o.*,o.id as orderdetailid,o.updatedate as canceldate,i.*,i.*,o.createdate as orderdate FROM `orderdetail` o
            inner join items i
            on i.id = o.itemid WHERE o.campaignid in 
(select id from campaign c where c.userid = '$userid') and o.status = -1
order by o.createdate desc");
        return $query->result();
    }

    function userwithdraws($userid) {
        $query = $this->db->query("SELECT * FROM `userbalance` where userid = '$userid'  and remark = 'WITHDRAW' order by createdate desc");
        return $query->result();
    }

    function financedetail($id) {
        $query = $this->db->query("select * from `finance`  where userid = '$id'");
        return $query->row();
    }

    function address($userid) {
        $query = $this->db->query("select * from `address`  where userid = '$userid'");
        return $query->row();
    }

    function finace_num($userid) {
        $query = $this->db->query("select * from `finance`  where userid = '$userid'");
        return $query->num_rows();
    }

    function userfromemail($email) {
        $query = $this->db->query("select * from `user`  where email = '$email'");
        return $query->num_rows();
    }

    function orderlist($custid, $status) {
        $query = $this->db->query("select o.*,$status as orderstatus from `order` o  where (select count(id) from orderdetail where orderid = o.id and status = $status) > 0 and o.custid = '$custid' order by o.createdate desc");
        return $query->result();
    }

    function items($id = "", $all = false) {
        $wh = "";
        $lm = "limit 0,8";
        if ($id != "") {
            $wh = " and b.id = '$id'";
            $lm = "";
        }
        if ($all) {
            $lm = "";
        }
        $query = $this->db->query("select a.* from items a
inner join campaign b
on a.campaignid = b.id
where a.status = 1
$wh
and a.start <= curdate()
and a.end >= curdate() order by a.createdate desc $lm");
        return $query->result();
    }

    function itemrelate($campaignid, $itemid) {
        $query = $this->db->query("select a.* from items a
inner join campaign b
on a.campaignid = b.id
where a.status = 1
and b.id = '$campaignid'
    and a.id != '$itemid'
and a.start <= curdate()
and a.end >= curdate()");
        return $query->result();
    }

    function campaign($id = "") {
        $wh = "";
        if ($id != "") {
            $wh = " and b.id = '$id'";
        }
        $query = $this->db->query("select  b.*,a.* from   campaign b  inner join user  a
            on b.userid = a.id 
where b.status != -1
$wh
and b.campaignstart <= curdate()
and b.campaignend >= curdate() order by b.createdate desc");
        return $query->result();
    }

    function itemdetail($id) {
        $query = $this->db->query("select a.*,b.title as campaigntitle
            ,b.description  as campaigndesc
            ,b.shipfrom 
            ,b.shipto 
            ,c.fbid
            ,c.firstname 
            ,c.lastname 
            ,b.campaignstart
            ,b.campaignend
            ,b.userid
             from items a
inner join campaign b
on a.campaignid = b.id
inner join user c
on b.userid = c.id
where a.status = 1
and a.id = '$id'
and a.start <= curdate()
and a.end >= curdate()");
        return $query->row();
    }

    function orderdetailbyid($id) {
        $query = $this->db->query("SELECT a.*,b.custid 
FROM  orderdetail a
left join `order` b on a.orderid  = b.id 
where a.id = '$id'");
        return $query->row();
    }

    function orderdetail($id, $status) {
        $query = $this->db->query("SELECT * 
FROM  orderdetail a
inner join items  b
on a.itemid = b.id
where a.orderid = '$id' and a.status  = $status");
        return $query->result();
    }

    function customerdetail($cond) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query->row();
    }

    function billnotificationusers($cond) {
        $this->db->select('*');
        $this->db->from('billnotificationusers');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function shippingrate($merchatid, $unit) {
        $this->db->select('*');
        $this->db->from('shippingrate');
        $this->db->where('merchantid', $merchatid);
        $this->db->where('unit<=', $unit);
        $this->db->limit(1);
        $this->db->order_by("unit", "desc");
        $query = $this->db->get();
        return $query;
    }

    function shippingrateconfig($cond) {
        $this->db->select('*');
        $this->db->from('shippingrate');
        $this->db->order_by("unit", "asc");
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function lineuid($cond) {
        $this->db->select('lineuid');
        $this->db->from('merchantlineuid');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function billtoken($cond, $limit = "") {
        if ($limit != "") {
            $this->db->limit($limit);
        }
        $this->db->select('*');
        $this->db->from('billtoken');
        $this->db->order_by("createdate", "desc");
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function v_merchantlineuid($cond) {
        $this->db->select('lineuid');
        $this->db->from('v_merchantlineuid');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function v_adminsummary($cond) {
        $this->db->select('*');
        $this->db->from('v_adminsummary');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function v_notificationtousers($cond) {
        $this->db->select('*');
        $this->db->from('v_notificationtousers');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function v_order($cond, $notin = null, $in = null) {
        if ($notin != null) {
            $this->db->where_not_in('status', $notin);
        }
        if ($in != null) {
            $this->db->where_in('status', $in);
        }
        $this->db->select('*');
        $this->db->from('v_order');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function orderexcel($cond, $notin = null, $in = null) {
        if ($notin != null) {
            $this->db->where_not_in('status', $notin);
        }
        if ($in != null) {
            $this->db->where_in('status', $in);
        }
        $this->db->select('DATE_FORMAT(submitdate,\'%d/%m/%Y\')   as `วันที่ส่งข้อมูล`,DATE_FORMAT(submitdate,\'%H:%i:%s\')   as `เวลาที่ส่งข้อมูล`,fullname as ชื่อ-สกุล,billingaddress ที่อยู่สำหรับจัดส่ง,CONCAT("_",tel) เบอร์โทร,total จำนวนเงินโอน, paymentinfo เวลาโอน, accno เลขบัญชี, bankname ธนาคาร , orderitems รายการสินค้า , 	sumamount ยอดสั่งรวม/ชิ้น');
        $this->db->from('v_order');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function category($cond) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function v_cate($cond) {
        $this->db->select('*');
        $this->db->from('v_cate');
        $this->db->where($cond);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    function paymentmethod($cond) {
        $this->db->select('*');
        $this->db->from('paymentmethod');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function bank($cond) {
        $this->db->select('*');
        $this->db->from('bank');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function province($cond) {
        $this->db->select('*');
        $this->db->from('province');
        $this->db->order_by('PROVINCE_NAME', 'asc');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function amphur($cond) {
        $this->db->select('*');
        $this->db->from('amphur');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function district($cond) {
        $this->db->select('*');
        $this->db->from('district');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function customer($cond) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function v_itemswithstock($cond, $billtokenid) {
        $this->db->select('*');
        $this->db->from('v_itemswithstock');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function googleanalytic($cond) {
        $this->db->select('*');
        $this->db->from('googleanalytic');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function article($cond) {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->where($cond);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query;
    }

    function imagescover($cond) {
        $this->db->select('*');
        $this->db->from('imagescover');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function itemswithstock($cond, $billtokenid) {
        $this->db->select('a.*,sum(b.amount) as itemstock');
        $this->db->from('items a');
        $this->db->join("billtokenstock b", " a.id = b.itemid and  b.billtokenid = $billtokenid", "left");
        $this->db->where($cond);
        $this->db->group_by("a.id");
        $query = $this->db->get();
        return $query;
    }

    function user($cond) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function v_serchorderbytelandmerchantuid($tel, $lineuid) {
        $this->db->select('*');
        $this->db->where('tel', $tel);
        $this->db->where('lineuid', $lineuid);
        $this->db->where('status >=', 1);
        $this->db->from('v_serchorderbytelandmerchantuid');
        $this->db->order_by("paiddate", "desc");
        $this->db->limit(10);
        $query = $this->db->get();
        return $query;
    }

    function v_salehistory($lineuid, $merchantid, $limit = 0, $offset = 10) {
        $query = $this->db->query("select sum(`a`.`total`) AS `total`,cast(`a`.`submitdate` as date) AS `date`,`b`.`uid` AS `uid`,(select group_concat(concat(`a`.`id`) separator ', ')) AS `orderitems`,`b`.`merchantid` AS `merchantid` from (`order` `a` join `ordertoken` `b` on((`a`.`id` = `b`.`orderid`))) where ((`a`.`status` in (2,3)) and (`a`.`closestatus` = 0) and (b.uid = '$lineuid') and (`b`.`merchantid` = $merchantid)) group by cast(`a`.`submitdate` as date)  order by a.submitdate desc limit $limit , $offset");
        return $query;
    }

    function merchantin($tokens) {
        $this->db->select('*');
        $this->db->where_in('token', $tokens);
        $this->db->from('merchant');
        $query = $this->db->get();
        return $query;
    }

    function v_merchantuid($cond) {
        $this->db->select('*');
        $this->db->from('v_merchantuid');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function merchantlineuid($cond) {
        $this->db->select('*');
        $this->db->from('merchantlineuid');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function ordertoken($cond) {
        $this->db->select('*');
        $this->db->from('ordertoken');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function order($cond) {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query;
    }

    function orderids($uid) {
        $this->db->select('orderid');
        $this->db->from('ordertoken');
        $this->db->where_in("uid", $uid);
        $query = $this->db->get();
        return $query;
    }

    function orderin_statusopen($orderids) {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where("status", 1);
        $this->db->where_in("id", $orderids);
        $query = $this->db->get();
        return $query;
    }

    function getcustomerlist($merchantid) {
        $query = $this->db->query("SELECT tb .*,(SELECT tk . token from customer c
inner join `order` o  
on c . id = o . custid
inner join ordertoken tk 
on tk . orderid = o . id
WHERE c . tel = tb . customertel order by o . id desc limit 1) as lastestordertoken from(SELECT a .* FROM `v_serchorderbytelandmerchantuid` a     group by a . customertel)  tb
where tb . merchantid = $merchantid");

        return $query->result();
    }

    function getorderitems($orderid) {
        $query = $this->db->query("select  
ii.name,
sum(oo.amount) as sum
from orderdetail  oo
JOIN
items ii
on oo.itemid = ii.id
where orderid  in ($orderid)
 group by ii.id");

        return $query->result();
    }

    function getordersumbybilltoken($billtoken) {
        $query = $this->db->query("select   unix_timestamp(b . createdate) as row1,COUNT(a . id) as row2,SUM(b . total) as row3
from ordertoken a
join `order` b
on a . orderid = b . id
where a . billtoken = '$billtoken'
    and b . closestatus = 0
    and createdate BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()
GROUP BY DATE(b . createdate)
limit 0,30");

        return $query;
    }

    function getdashboarddata($merchantid) {
        $query = $this->db->query("SELECT
    (select count(id)  from  `order` where merchantid = $merchantid and closestatus = 0) as bills
, (select count(id)  from  `order` where status in(2, 3) and merchantid = $merchantid and closestatus = 0) as paid
, (select count(id)  from  `order` where status in(1) and merchantid = $merchantid and closestatus = 0) as unpaid
, (select sum(total)  from  `order` where status in(2, 3) and MONTH(updatedate) = MONTH(CURRENT_DATE()) and merchantid = $merchantid and closestatus = 0) as monthlytotal
FROM `dual`");

        return $query;
    }

}

?>