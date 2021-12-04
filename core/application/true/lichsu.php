<?PHP
include_once('../../../core/system/config.php');




$title = 'Lịch sử giao dịch';
include_once('../../../core/system/head.php');
?>
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

<div class="table-row">
<a href="/true/rutvang.html">
<div class="item">Rút vàng</div>
</a>
</div>

</div>

</div>
</div>
</div>
</div>
<?php
$list_chuyen = $mysqli->query("SELECT * FROM `sodu` WHERE `uid` = '".$id."' ORDER by `id` DESC LIMIT $start, 10");
if($mysqli->query("SELECT * FROM `sodu` WHERE `uid` = '".$id."'")->num_rows > $kmess)
{
    $trang = '<center>' . trang('?', $start, $mysqli->query("SELECT * FROM `sodu` WHERE `uid` = '".$id."'")->num_rows, $kmess) . '</center>';
}                    
                    $data_chuyen = '';
                    while($chuyen = $list_chuyen->fetch_assoc())
                    {

                        $data_chuyen.='
						<div class="table-row">
						<div class="item">'.$chuyen['xu'].'</div>
						<div class="item">'.$chuyen['sau'].'</div>
						<div class="item">'.$chuyen['noidung'].'</div>
						<div class="item">'.$chuyen['thoigian'].'</div>
						</div>';
					}
						
						?>
<div class="w-info w-content">
<div class="entry-info">
<div class="b-c-header"><div class="b-c-header"><h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Lịch sử giao dịch</h5></div></div>
<div class="b-c-content scroll-x">
<div class="b-c-table">
<div class="title-table tran-table">
<div class="item item-name">Số tiền</div>
<div class="item item-sv">Số dư</div>
<div class="item item-amount">Mô tả</div>
<div class="item item-gif">Thời gian</div>
</div>
<div class="content-table tran-table">
   <?=$data_chuyen?>
   <div class="his-nav">
    <center><?=$trang?></center>
    </div>

</div>
</div>
</div>
</div>
</div>









           
<?PHP
include_once('../../../core/system/end.php');
?>