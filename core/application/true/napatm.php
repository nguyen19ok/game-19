<?PHP
include_once('../../../core/system/config.php');

$title = 'Nạp ATM';


include_once('../../../core/system/head.php');




if($id <=0)
{
    echo thongbao('Vui lòng đăng nhập','loi');
     echo '<script>window.location.href="/guest/dangnhap.html"</script>';
    exit();
}


?>
<div class="noti-info">
<h2>Chiết khấu nạp ATM <?=$system->data->cknapatm?>%</h2>
<p>
Nạp <b><?=number_format(100000)?></b> được <b><?=number_format(100000*$system->data->cknapatm/100)?> vàng</b><br>
<b>
- Chuyển tiền theo thông tin phía dưới</br>
- <font color="red">LƯU Ý:</font> Nhập đúng nội dung chuyển khoản</br>

- Sau 5 phút không nhận được tiền, xin vui lòng liên hệ hỗ trợ</b></br></br>

<a class="btn btn-primary m-1" href="/true/napatm.html">Nạp ATM</a> - <a class="btn btn-primary m-1" href="/true/napthe.html">Nạp Thẻ</a>

 </p>
 </div>
 
<div class="sha-deposit-info">
<div class="w-deposit" style="width:100%;">
<div class="b-c-header">
<div class="deposit-title"></div>
<div class="deposit-ques"></div>
</div>
<div class="deposit-body">

<form name="napthe" action="/true/napthe.html" method="post" >
<div class="wrap-section"><label>Ngân Hàng</label>
<input type="text" class="form-control"  value="<?=$system->data->tenatm?>" readonly></div>
<div class="wrap-section">
<label>Số TK</label>
<input type="text" class="form-control" value="<?=$system->data->sotkatm?>" readonly></div>
<div class="wrap-section">
<label>Chi Nhánh</label>
<input type="text" class="form-control" value="<?=$system->data->chinhanhatm?>" readonly></div>
<div class="wrap-section"><label>Chủ TK</label>
<input type="text" class="form-control"  value="<?=$system->data->chutkatm?>" readonly></div>
<div class="wrap-section"><label>Nội Dung Chuyển Khoản
<input type="text" class="form-control" value="<?=$system->data->ndatm?><?=$id?>" readonly></div>




</form>

</div>
</div>

</div>


<?PHP


include_once('../../../core/system/end.php');