<?PHP
include_once('../../../core/system/config.php');

$title = 'Rút vàng';


include_once('../../../core/system/head.php');





if($id <=0)
{
    echo thongbao('Vui lòng đăng nhập','loi');
    echo '<script>window.location.href="/index.php"</script>';

    
    
    exit();
}





?>
<div class="noti-info"><h2><span style="color:#e74c3c">Hệ thống rút&nbsp;vàng tự động</span></h2>

<b>&nbsp;Rút tối thiểu 200.000</b>

<p><strong>Bước 1:</strong>&nbsp;Nhấn vào “ Thêm Ngân Hàng “ phía dưới</p>

<p><strong>Bước 2:</strong>&nbsp;Nhập số tiền rút , chờ tiền về tài khoản</p>

<h3>Chiết khấu rút <?=100-$system->data->ckrut?>%,&nbsp;<span style="color:#e74c3c"><strong>rút <?=number_format(200000)?> vàng được <?=number_format(200000*$system->data->ckrut/100)?> VNĐ</strong></span></h3>
<p><strong>Sau 5 phút không nhận được tiền, liên hệ hỗ trợ</strong></p>

</div>
<div class="sha-deposit-info">
<div class="w-deposit" style="width:100%;">


<div class="b-c-header">
<div class="withdraw-title"></div>
<div class="deposit-ques"></div>
</div>
    <div class="text-danger text-center" id="log_rutvang"></div>

<form id="form_rutvang" class="form pt-3">
<div class="deposit-body">
<div class="wrap-section ">
<label>Ngân hàng</label>
<a href="/profile/addbank.html">Thêm ngân hàng</a>
<div class="row-select">
<select name="nganhang">
<?php    
$list_chuyen = $mysqli->query("SELECT * FROM `bank` WHERE `uid` = '".$datauser->id."' ORDER by `id`");
while($chuyen = $list_chuyen->fetch_assoc())
                    {    
echo'<option value="'.$chuyen['bank'].' | '.$chuyen['sotaikhoan'].' | '.$chuyen['chutaikhoan'].' | '.$chuyen['chinhanh'].'">'.$chuyen['bank'].' | '.$chuyen['sotaikhoan'].' | '.$chuyen['chutaikhoan'].' | '.$chuyen['chinhanh'].'</option>';
                    }
                    ?>
    
    
</select>
</div>
</div>

<div class="wrap-section">
<label>Số vàng cần rút</label>
<input type="number" class="form-control" name="vang" placeholder="Nhập chính xác số vàng bằng số" value="">
<div class="text-danger"></div></div>
<div class="wrap-section"><label>Mật khẩu</label>
<input type="password" class="form-control" name="matkhau" placeholder="Nhập chính xác mật khẩu" value="">
<div class="text-danger"></div></div>
<p class="deposit-notice font-weight-bold"><span></span></p>
<div class="text-center">
<button type="submit" onclick="rutvang()" class="button-withdraw" style="opacity: 1;"></button>
</div>

</div>
</form>
</div>

</div>

<div class="sha-top-guild-s">
<div class="deposit-title"></div>
<div class="top-guild-table">
<div class="title-table">
<div class="item item-top">STT</div>
<div class="item item-name">Thời gian</div>
<div class="item item-sv">Thông tin</div>
<div class="item item-amount">Số vàng</div>
<div class="item item-gif">Thực nhận</div>
<div class="item item-gif">Trạng thái</div>
</div>
<div class="content-table">
    
   <?PHP
$list_chuyen = $mysqli->query("SELECT * FROM `logrut` WHERE `uid` = '".$datauser->id."' ORDER by `id`");
$i=1;

                  
                    $data_chuyen = '';
                    while($chuyen = $list_chuyen->fetch_assoc())
                    {
							

                        $data_chuyen.='
						<div class="table-row">
						<div class="item">'.$i.'</div>
						<div class="item">'.$chuyen['thoigian'].'</div>
						<div class="item">'.$chuyen['thongtin'].'</div>
						<div class="item">'.number_format($chuyen['vnd']).'</div>

						<div class="item">'.number_format($chuyen['thucnhan']).'</div>
						<div class="item">'.trangthai($chuyen['code']).'</div>
						
						</div>';
							
							
						++$i;
					}
                    
                    
                    ?>
                  
    <?=$data_chuyen?>

   
                    
</div>
	
</div>
</div>
<script>

function rutvang() {
    $['ajax']({
        url: '/guest/xuli.html?rutvang',
        type: 'POST',
        data: $('#form_rutvang')['find']('select, textarea, input')['serialize'](),
        success: function (log) {
            
                $("#log_rutvang").html(log.text);
           
        }
    })
}

</script>
<style>
.form-control {
    display: block;
    width: 100%;
    margin-bottom: 1.5rem;
    background-color: #f3f3f3;
    height: 6rem;
    border-radius: 1rem;
    border: .1rem solid #777;
    padding: 0 1.5rem;
    font-size: 2.5rem;
    outline: 0;
    color: #000;
    font-family: nexa_light;
}
label {
        color: #5c3b1f;
    font-size: 2.1rem;
    font-family: nexa_bold;
    display: block;
    margin-bottom: 1rem;
}
</style>

<?PHP


include_once('../../../core/system/end.php');