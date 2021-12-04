<?PHP
include_once('../../../core/system/config.php');

$title = 'Thêm ngân hàng';


include_once('../../../core/system/head.php');





if($id <=0)
{
    echo thongbao('Vui lòng đăng nhập','loi');
    echo '<script>window.location.href="/index.php"</script>';

    
    
    exit();
}
if(isset($_GET['del']))
{
    $data = $mysqli->query("SELECT * FROM `bank` WHERE `id` = '".$_GET['id']."' AND `uid` = '".$id."' ")->fetch_assoc();
    if($data['id'] <=0)
    {
        echo thongbao('Không tìm thấy ID này','loi');
    }
    else
    {
       
      
        $mysqli->query("DELETE FROM `bank` WHERE `id` = '".$_GET['id']."'");
        echo thongbao('Xoá thành công','thanhcong');
    }
}





?>
<div class="noti-info"><h2><span style="color:#e74c3c">Lưu ý:</span></h2>
<p><span style="color:#e74c3c"><strong>Nhập đúng chính xác thông tin tài khoản ngân hàng để khi rút tiền về, Hệ thống sẽ duyệt nhanh hơn</strong></span></p></div>
<div class="sha-deposit-info">
<div class="w-deposit" style="width:100%;">


<div class="b-c-header">
<h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Thêm ngân hàng</h5>
</div>
    <div class="text-danger text-center" id="log_addbank"></div>

<form  id="form_addbank" class="form pt-3">
<div class="deposit-body">
<div class="wrap-section ">
<label>Ngân hàng</label>
<div class="row-select">
<select name="nganhang" >
	<option value="">Chọn ngân hàng</option>
    <option value="MOMO">MOMO</option>
    <option value="VIETTEL PAY">VIETTEL PAY</option>
    <option value="ZALO PAY">ZALO PAY</option>
    <option value="AIRPAY">AIRPAY</option>
    <option value="VIETINBANK">VIETINBANK</option>
    <option value="VIETCOMBANK">VIETCOMBANK</option>
    <option value="AGRIBANK">AGRIBANK</option>
    <option value="TPBANK">TPBANK</option>
    <option value="HDB">HDB</option>
    <option value="VPBANK">VPBANK</option>
    <option value="MBBANK">MBBANK</option>
    <option value="OCEANBANK">OCEANBANK</option>
    <option value="BIDV">BIDV</option>
    <option value="SACOMBANK">SACOMBANK</option>
    <option value="ACB">ACB</option>
    <option value="ABBANK">ABBANK</option>
    <option value="NCB">NCB</option>
    <option value="IBK">IBK</option>
    <option value="CIMB">CIMB</option>
    <option value="EXIMBANK">EXIMBANK</option>
    <option value="SEABANK">SEABANK</option>
    <option value="SCB">SCB</option>
    <option value="DONGABANK">DONGABANK</option>
    <option value="SAIGONBANK">SAIGONBANK</option>
    <option value="PG BANK">PG BANK</option>
    <option value="PVCOMBANK">PVCOMBANK</option>
    <option value="KIENLONGBANK">KIENLONGBANK</option>
    <option value="VIETCAPITAL BANK">VIETCAPITAL BANK</option>
    <option value="OCB">OCB</option>
    <option value="MSB">MSB</option>
    <option value="SHB">SHB</option>
    <option value="VIETBANK">VIETBANK</option>
    <option value="VRB">VRB</option>
    <option value="NAMABANK">NAMABANK</option>
    <option value="SHBVN">SHBVN</option>
    <option value="VIB">VIB</option>
    <option value="TECHCOMBANK">TECHCOMBANK</option>  
</select>
</div>
</div>
<div class="wrap-section">
<label>Số tài khoản</label>
<input type="text" class="form-control" name="sotaikhoan" placeholder="Nhập số tài khoản" value="">
<div class="text-danger"></div></div>
<div class="wrap-section">
<label>Chủ tài khoản</label>
<input type="text" class="form-control" name="chutaikhoan" placeholder="Nhập tên chủ tài khoản" value="">
<div class="text-danger"></div></div>
<div class="wrap-section">
<label>Chi nhánh</label>
<input type="text" class="form-control" name="chinhanh" placeholder="Nhập chi nhánh" value="">
<div class="text-danger"></div></div>
<p class="deposit-notice font-weight-bold"><span></span></p>
<div class="text-center">
<button type="submit" onclick="addbank()" class="button-withdraw" style="opacity: 1;"></button>
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
<div class="item item-name">Ngân hàng</div>
<div class="item item-sv">Số tài khoản</div>
<div class="item item-amount">Chủ tài khoản</div>
<div class="item item-gif">Chi nhánh</div>
<div class="item item-gif">Thao tác</div>
</div>
<div class="content-table">
    
   <?PHP
$list_chuyen = $mysqli->query("SELECT * FROM `bank` WHERE `uid` = '".$datauser->id."' ORDER by `id` ");
$i=1;

                  
                    $data_chuyen = '';
                    while($chuyen = $list_chuyen->fetch_assoc())
                    {
					

                        $data_chuyen.='
						<div class="table-row">
						<div class="item">'.$i.'</div>
						<div class="item">'.$chuyen['bank'].'</div>
						<div class="item">'.$chuyen['sotaikhoan'].'</div>
						<div class="item">'.($chuyen['chutaikhoan']).'</div>

						<div class="item">'.($chuyen['chinhanh']).'</div>
						<div class="item"><a href="?del&id='.$chuyen['id'].'">[Xoá]</a> </div>
						
						</div>';
							
							
						++$i;
					}
                    
                    
                    ?>
                 
    <?=$data_chuyen?>


                    
</div>
	
</div>
</div>
<script>

function addbank() {
    $['ajax']({
        url: '/guest/xuli.html?addbank',
        type: 'POST',
        data: $('#form_addbank')['find']('select, textarea, input')['serialize'](),
        success: function (log) {
            
                $("#log_addbank").html(log.text);

           
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