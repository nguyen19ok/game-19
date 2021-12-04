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
<a href="/true/chuyentien.html">
<div class="item">Chuyển tiền</div>
</a>
</div>
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


<div class="w-info w-content">
<div class="entry-info">
<div class="b-c-header"><div class="b-c-header"><h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Thông tin cá nhân</h5></div></div>
<div class="b-c-content">
<div class="b-c-table">

<div class="sha-top-guild-s">
<div class="deposit-title"></div>
<div class="top-guild-table">
<div class="title-table">
<div class="item item-top" style="color: rgb(255, 233, 3);">Game</div>
<div class="item item-name" style="color: rgb(255, 233, 3);">Tiền thắng/ thua</div>
<div class="item item-sv" style="color: rgb(255, 233, 3);">Số thắng/ thua</div>
<div class="item item-amount" style="color: rgb(255, 233, 3);">Chuỗi thắng/ thua</div>
<div class="item item-gif" style="color: rgb(255, 233, 3);">Số thắng cao/ thua</div>
</div>
<div class="content-table">
<div class="table-row">
<div class="item" >Ngọc rồng</div>
<div class="item" ><?=number_format($p->thongtin->ngocrong_win)?>/ <?=number_format($p->thongtin->ngocrong_lose)?></div>
<div class="item" ><?=number_format($p->thongtin->taixiu_thang)?>/ <?=number_format($p->thongtin->taixiu_thua)?></div>
<div class="item" ><?=number_format($p->thongtin->taixiu_chuoithang)?>/ <?=number_format($p->thongtin->taixiu_chuoithua)?></div>
<div class="item" ><?=number_format($p->thongtin->taixiu_chuoithangcaonhat)?>/ <?=number_format($p->thongtin->taixiu_chuoithuacaonhat)?></div>
</div>
<div class="table-row">
<div class="item" >Chẳn lẻ</div>
<div class="item" ><?=number_format($p->thongtin->chanle_win)?>/ <?=number_format($p->thongtin->chanle_lose)?></div>
<div class="item" ><?=number_format($p->thongtin->chanle_thang)?>/ <?=number_format($p->thongtin->chanle_thua)?></div>
<div class="item" ><?=number_format($p->thongtin->chanle_chuoithang)?>/ <?=number_format($p->thongtin->chanle_chuoithua)?></div>
<div class="item" ><?=number_format($p->thongtin->chanle_chuoithangcaonhat)?>/ <?=number_format($p->thongtin->chanle_chuoithuacaonhat)?></div>
</div>
<div class="table-row">
<div class="item" >Bầu cua</div>
<div class="item" ><?=number_format($p->thongtin->baucua_win)?>/ <?=number_format($p->thongtin->baucua_lose)?></div>
<div class="item" ><?=number_format($p->thongtin->baucua_thang)?>/ <?=number_format($p->thongtin->baucua_thua)?></div>
<div class="item" ><?=number_format($p->thongtin->baucua_chuoithang)?>/ <?=number_format($p->thongtin->baucua_chuoithua)?></div>
<div class="item" ><?=number_format($p->thongtin->baucua_chuoithangcaonhat)?>/ <?=number_format($p->thongtin->baucua_chuoithuacaonhat)?></div>
</div>
<div class="table-row">
<div class="item" >Tất cả</div>
<div class="item" ><?=number_format($p->thongtin->baucua_win+$p->thongtin->chanle_win+$p->thongtin->ngocrong_win)?>/ <?=number_format($p->thongtin->baucua_lose+$p->thongtin->chanle_lose+$p->thongtin->ngocrong_lose)?></div>
<div class="item" ><?=number_format($p->thongtin->baucua_thang+$p->thongtin->taixiu_thang+$p->thongtin->chanle_thang)?>/ <?=number_format($p->thongtin->baucua_thua+$p->thongtin->taixiu_thua+$p->thongtin->chanle_thua)?></div>
<div class="item" ><?=number_format($p->thongtin->baucua_chuoithang+$p->thongtin->chanle_chuoithang+$p->thongtin->taixiu_chuoithang)?>/ <?=number_format($p->thongtin->baucua_chuoithua+$p->thongtin->chanle_chuoithua+$p->thongtin->taixiu_chuoithua)?></div>
<div class="item" ><?=number_format($p->thongtin->baucua_chuoithangcaonhat+$p->thongtin->chanle_chuoithangcaonhat+$p->thongtin->taixiu_chuoithangcaonhat)?>/ <?=number_format($p->thongtin->baucua_chuoithuacaonhat+$p->thongtin->chanle_chuoithuacaonhat+$p->thongtin->taixiu_chuoithuacaonhat)?></div>
</div>										
										
		

</div>
</div>
</div>
</div>
</div>







           
<?PHP
include_once('../../../core/system/end.php');
?>