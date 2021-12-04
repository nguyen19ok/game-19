<?PHP
include_once('../../../core/system/config.php');
if($id <=0)
{
    echo thongbao('Vui lòng đăng nhập để tiếp tục');
    include_once('../../../core/system/end.php');
    exit();
}

$profile    =       $id;


$p  =   new users($profile);


$title = 'Thông tin cá nhân';
include_once('../../../core/system/head.php');


/*Upload avatar*/
if(isset($_GET['up']))
{
    $anh = $_FILES["files"]["tmp_name"][0];
    $file = file_get_contents($anh);
    $url = 'https://api.imgur.com/3/image';
    $headers = array("Authorization: Client-ID f22b79927014872");
    $pvars  = array('image' => base64_encode($file));
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL=> $url,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_POST => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $pvars
    ));
    $json_returned = curl_exec($curl); 
    $img = json_decode($json_returned,true);
    /*up load error*/
    if(!$img['data']['link']) {
        $n->error = "true";  
    }
    /*sussuec*/
    else
    {
        $datauser->upthongtin('avatar',$img['data']['link']);
    }
}
$p = new users($profile);
?>

<!--Form doi mat khau-->
<?php


?>
<div class="dragon-regis" id="khung-rpass">
<div class="overlay"></div>
<div class="regis-content">
<div class="regis-header">
<h2 style="color: rgb(255, 255, 255); font-size: 20px; padding-top: 10px;">Đổi mật khẩu</h2>
<div class="regis-close" id="end-rpass"></div>
</div>
<div class="regis-body"><div class="text-danger text-center" id="log_rpass"></div>
<form action="/profile/index.html" id="form_rpass">
<div class="regis-form">
<div class="text-danger text-center pb-4"></div>
<input type="password" class="form-control" name="currentPassword" placeholder="Mật khẩu hiện tại" autocomplete="off" value="">
<div class="text-danger"></div>
<input type="password" class="form-control" name="newPassword" placeholder="Mật khẩu mới" autocomplete="off" value=""><div class="text-danger"></div>
<input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" autocomplete="off" value="">
<div class="text-danger"></div>
</div>
<div class="regis-button"><button type="submit" onclick="rpass()" class="button-password" style="opacity: 1;"></button></div>
</form>
</div>
</div>
</div>
<script>
      
</script>
<!--End form-->

<!--Form giftcode -->
<?php


?>
<div class="dragon-regis" id="khung-giftcode">
<div class="overlay"></div>
<div class="regis-content">
<div class="regis-header">
<h2 style="color: rgb(255, 255, 255); font-size: 20px; padding-top: 10px;">Giftcode</h2>
<div class="regis-close" id="end-giftcode"></div>
</div>
<div class="regis-body"><div class="text-danger text-center" id="log_giftcode"></div>
<form action="/profile/index.html" id="form_giftcode">
<div class="regis-form">
<div class="text-danger text-center pb-4"></div>
<input type="text" class="form-control" name="gift" placeholder="Nhập mã quà tặng" autocomplete="off" value="">
<img src="/true/captcha.html" id="captcha"/>
<input placeholder="Captcha" type="number" class="form-control" placeholder="" id="txtcaptcha"  name="txtcaptcha" value="" aria-describedby="basic-addon11">

</div>
<div class="regis-button"><button type="submit" onclick="giftcode()" class="button-password" style="opacity: 1;"></button></div>
</form>
</div>
</div>
</div>
<script>
      
</script>
<!--End form-->



<div class="sha-deposit-info">
<div class="w-info w-sidebar">
<div class="entry-info">
<div class="b-c-header">
<div class="b-c-header">
<h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Menu</h5>
</div>
</div>
<div class="b-c-content">
<div class="b-c-table">
<div class="content-table">
<div class="table-row">
<a href="/profile/index.html"><div class="item">Thông tin tài khoản</div>
</a></div>
<div class="table-row"><a href="/true/napthe.html">
<div class="item">Nạp thẻ</div></a></div>


<div class="table-row"><a href="/true/rutvang.html">
<div class="item">Rút vàng</div></a></div>
<div class="table-row">
<a id="open-giftcode">
<div class="item">Giftcode</div>
</a>
</div>
<div class="table-row">
<a href="/true/lichsu.html">
<div class="item">Lịch sử giao dịch</div>
</a>
</div>
<div class="table-row">
<a href="/true/lichsugame.html">
<div class="item">Dữ liệu chơi game</div>
</a>
</div>
<div class="table-row"><a href="addbank.html">
<div class="item">Thêm ngân hàng</div></a></div>

<?php
if ($datauser->admin>=10) {
    $dsrutvang = $mysqli->query("SELECT * FROM `logrut` WHERE `code`='0' ")->num_rows;
    $dsnapthe = $mysqli->query("SELECT * FROM `napthe`")->num_rows;

echo'<div class="table-row"><a id="ok">
<div class="item text-danger"><b>MỞ CHỨC NĂNG ADMIN</b> <i class="fa fa-plus-circle"></i></div></a></div>';
	
?>

<div id="oke" style="display: none;">

<div class="table-row"><a href="/admin/users.html">
<div class="item text-danger">Danh sách người chơi</div></a>
</div>

<div class="table-row"><a href="/admin/page.html">
<div class="item text-danger">Cài đặt trang</div></a>
</div>
<div class="table-row"><a href="/admin/system.html">
<div class="item text-danger">Cài đặt system</div></a>
</div>
<div class="table-row"><a href="/admin/tile.html">
<div class="item text-danger">Tỉ lệ</div></a>
</div>

<div class="table-row"><a href="/admin/tool.html">
<div class="item text-danger">Tools</div></a>
</div>
<div class="table-row"><a href="/admin/giftcode.html">
<div class="item text-danger">Mã quà tặng</div></a>
</div>
<div class="table-row"><a href="/admin/rutvang.html">
<div class="item text-danger">Yêu cầu rút vàng (<?=$dsrutvang?>)</div></a>
</div>
<div class="table-row"><a href="/admin/napthe.html">
<div class="item text-danger">Danh sách nạp thẻ (<?=$dsnapthe?>)</div></a>
</div>
<div class="table-row"><a href="/admin/napxu.html">
<div class="item text-danger">Tặng vàng</div></a>
</div>
</div>
<script>
$('#ok').click(function() {  
$('#oke').toggle('fast','linear');  
}); 
</script>
<?php
}
?>

</div>
</div>
</div>
</div>
</div>
<div class="w-info w-content">
<div class="entry-info">
<div class="b-c-header"><div class="b-c-header"><h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Thông tin cá nhân</h5></div></div>
<div class="b-c-content">
<div class="b-c-table">
<div class="content-table">
    
<div class="table-row">
<div class="item"><center>Hình đại diện</br>
<img src="<?=$p->thongtin->avatar?>" class="rounded-circle" width="100px"></br>
<a id="open" style="color: rgb(5, 67, 191);">Chỉnh sửa ảnh đại diện</a></br>
<div id="close" style="display: none;">
<form id="formid"action="#" method="post">
<input type="file" name="files[]" id="inputGroupFile04"></br>
<button class="button-password" onclick="uploadavatar()" ></button>
</form>
</div>
</center></div>
<script>
$('#open').click(function() {  
$('#close').toggle('fast','linear');  
}); 
</script>
</div>

<div class="table-row">
<div class="item">#ID</div>
<div class="item"><?=$p->id?></div>
</div>
<div class="table-row">
<div class="item">Tài khoản</div>
<div class="item"><?=$p->taikhoan?></div>
</div>
<div class="table-row">
<div class="item">Nhân vật</div>
<div class="item"><?=$p->thongtin->ten?></div>
</div>



<div class="table-row">
<div class="item">Mật khẩu</div>
<div class="item" style="cursor: pointer; color: rgb(5, 67, 191);"><a id="open-rpass">Đổi mật khẩu</a></div>
</div>
<div class="table-row">
<div class="item">Đăng xuất</div>
<a href="#" onclick="outgame();"><div class="item" style="cursor: pointer; color: rgb(5, 67, 191);">Thoát</div></a>
</div>
</div>

</div>
</div>



<script>
 $("#open-rpass").on("click touchstart mousedown touchend", function () {
        if(check_click($(this)) == true){
            $('#khung-rpass')['addClass']('action-show');

        }
        
    }); 
    $("#end-rpass").on("click touchstart mousedown touchend", function () {
 if(check_click($(this)) == true){
$('#khung-rpass')['removeClass']('action-show');
}
});
 $("#open-giftcode").on("click touchstart mousedown touchend", function () {
        if(check_click($(this)) == true){
            $('#khung-giftcode')['addClass']('action-show');

        }
        
    }); 
    $("#end-giftcode").on("click touchstart mousedown touchend", function () {
 if(check_click($(this)) == true){
$('#khung-giftcode')['removeClass']('action-show');
}
});
function rpass() {
    $['ajax']({
        url: '/guest/xuli.html?rpass',
        type: 'POST',
        data: $('#form_rpass')['find']('select, textarea, input')['serialize'](),
        success: function (log) {
          
                $("#log_rpass").html(log.text);
           
            
            
            
        }
    })
}
function giftcode() {
    $['ajax']({
        url: '/guest/xuli.html?giftcode',
        type: 'POST',
        data: $('#form_giftcode')['find']('select, textarea, input')['serialize'](),
        success: function (log) {
          
                $("#log_giftcode").html(log.text);
           if (log.code == 1) {
                         $('#captcha').attr('src', '/true/captcha.html');

                }
            
            
            
        }
    })
}
</script>


           
<?PHP
include_once('../../../core/system/end.php');
?>