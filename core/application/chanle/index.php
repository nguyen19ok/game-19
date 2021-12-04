<?PHP
include_once('../../../core/system/config.php');

?>
<style>
#khung_id10 .button-top {
	right: 0%;
    top: 0%;
    z-index: 2;
    width: 7.5%;
    position: absolute;
    cursor: pointer;
}
#khung_id10 .button-top img {
    width: 100%;
    cursor: pointer;
    z-index: 100;
    position: absolute;
	margin-left: -20%;
}
#khung_id10 .hu {
    text-shadow: 0px 0px 4px black, 0px 0px 4px black, 0px 0px 4px black;
    position: absolute;
	left: 24%;
    top: 11.8%;
    color:#2fff38;
	text-overflow: ellipsis;
    white-space: nowrap;	
}
#khung_id10 .hu span {
display:none;
}
#khung_id10 .hu span:first-child {
display:block;
}
#khung_id10 .chen{
	margin-left: 40.5%;
    margin-top: 1%;
    width: 20%;
    height: 36%;
    position: absolute;
    background: url(/lib/img/xocdia/chen2.png) 0% 0% / 100% 100%;	
}

#khung_id10 .choncuoc-group {
	left: 82%;
    top: -20%;	
    width: 10%;
    height: 100%;
    position: absolute;
}
#khung_id10 .choncuoc-right {
    left: 86%;
    top: 33%;
    width: 16%;
    height: 62%;
    position: absolute;
}
#khung_id10 .choncuoc-right div {
background: url(/lib/img/bc/btn_dat-lai.png) 0% 0% /100% 100% no-repeat;
    width: 100%;
    height: 19%;
    border: none;
    padding: 0px;
    text-align: center;
    cursor: pointer;
    margin-bottom: 5%;
    white-space: nowrap;
}
#khung_id10 .choncuoc-bottom {
    left: 16%;
    top: 95%;
    width: 70%;
    height: 15%;
    position: absolute;
}
#khung_id10 .choncuoc-bottom div{
    height: 100%;
    width: 13%;
    background: url(/lib/img/xocdia/100.png) 0% 0% /100% 100%;
    border-radius: 100%;
	/*float: left;*/
    margin-left: 3%;	
	position: absolute;
}
#khung_id10 .choncuoc-bottom div.active{
top: -20%;		
}
#khung_id10 .choncuoc-bottom div.active{
animation: id10_button_bot 1s infinite alternate;
-webkit-animation: id10_button_bot 1s infinite alternate;
-moz-animation: id10_button_bot 1s infinite alternate;
-ms-animation: id10_button_bot 1s infinite alternate;
-o-animation: id10_button_bot 1s infinite alternate;
}

#khung_id10 .all_m[data-txt='0'],#khung_id10 .all_t[data-txt='0'],#khung_id10 .all_b[data-txt='0'],#khung_id10 .all_s div{
display: none;		
}
#khung_id10 .all_m:after,#khung_id10 .all_t:after,#khung_id10 .all_b:after{ 	
    content: attr(data-txt);
}
#khung_id10 .lichsu-roll {
	left: 17%;
    top: 82%;
    width: 68%;
    height: 9.5%;
    position: absolute;
	
}
#khung_id10 .lichsu-roll .item{
    width: 7.7%;
    position: relative;
    height: 100%;
    margin-left: 1%;
    float: left;
	background: url(/lib/img/xocdia/score2.png) 0% 0% /100% 100%;
	color:#000000;font-weight: 900;
}
#khung_id10 .lichsu-roll .item.item_1,#khung_id10 .lichsu-roll .item.item_3{
	background-image: url(/lib/img/xocdia/score1.png);
	color:#ffffff;
}


#khung_id10 .lichsu-roll .item div{
    position: absolute;	
}
#khung_id10 .choncuoc-right div:nth-child(2) {
    background-image: url(/lib/img/bc/btn_xoa.png);
}
#khung_id10 .choncuoc-right div:nth-child(3) {
    background-image: url(/lib/img/bc/btn_xac-nhan.png);
}
#khung_id10 .choncuoc-group .btn-choncuoc{
    width: 80%;
    height: 13.70%;
    background: transparent;
    border: none;
    color: #fff;
    padding: 0px;
    margin: 0px;
    text-align: center;
    font-weight: bold;
    border-radius: 100%;
    display: block;
    cursor: pointer;
    background-image: url(/lib/img/bc/chon_muc_cuoc.png);
    background-size: 100% 100%;	
	position: absolute;
	margin-left: 10%;	
}
#khung_id10 .choncuoc-group .btn-choncuoc.active{
	background-image:url(/lib/img/bc/chon_muc_cuoc_active.png)
}

#khung_id10 .note_tb{
    position: absolute;
    width: 100%;
    top: 40%;
}
#khung_id10 .note_tb .note_here{
    color: white;
    width: 100%;
    max-width: 400px;
    margin: auto;
}
#khung_id10 .note_tb .note_here p{
    margin: 0px;
    padding: 0px;
    border: 1px solid #fff;
    background: #000;
	border-radius: 25px;
}
#khung_id10 .cuoc_khung1 .all_chip{
	top: 137%;
    left: 343%;	
}
#khung_id10 .cuoc_khung2 .all_chip{
    top: 137%;
    left: 237%;	
}
#khung_id10 .cuoc_khung3 .all_chip{
    left: 450%;
    top: 300%;	
}
#khung_id10 .cuoc_khung4 .all_chip{
    top: 299%;
    left: 128%;	
}
#khung_id10 .cuoc_khung5 .all_chip{
left: 450%;
    top: 143%;	
}
#khung_id10 .cuoc_khung6 .all_chip{
    top: 143%;
    left: 128%;	
}
#khung_id10 .cuoc_khung1{
	left: 33.5%;
    top: 36%;
    width: 16%;
    height: 44%;
    position: absolute;
}
#khung_id10 .cuoc_khung2{
    left: 50.5%;
    top: 36%;
    width: 16%;
    height: 44%;
    position: absolute;
}
#khung_id10 .cuoc_khung3{
    left: 16.3%;
    top: 19.5%;
    width: 16%;
    height: 29%;
    position: absolute;
}
#khung_id10 .cuoc_khung4{
	left: 67.8%;
    top: 19.5%;
    width: 16%;
    height: 29%;
    position: absolute;
}
#khung_id10 .cuoc_khung5{
	left: 16.3%;
    top: 51.2%;
    width: 16%;
    height: 29%;
    position: absolute;
}
#khung_id10 .cuoc_khung6{
	left: 67.8%;
    top: 51.2%;
    width: 16%;
    height: 29%;
    position: absolute;
}
#khung_id10 .cuoc_khbox{
    width: 100%;
    height: 100%;
	position: relative;
	cursor: pointer;
}
#khung_id10 .all_t{
    position: absolute;
    width: 100%;
    color: yellow!important;
    text-shadow: 0px 0px 8px black, 0px 0px 8px black;
    text-align: center;
}
#khung_id10 .all_b{
    position: absolute;
    width: 100%;
    color: #eb44ff!important;
    text-shadow: 0px 0px 8px black, 0px 0px 8px black;
    text-align: center;
    bottom: 0px;
}
#khung_id10 .all_s{
    width: 100%;
    position: absolute;
}
#khung_id10 .all_x{
    width: 100%;
	height:70%;
	top:15%;
    position: absolute;
}

#khung_id10 .all_s div{
    width: 100%;height:100%;padding-bottom: 100%;
	background:url(/lib/img/xocdia/light-win.png) 0 0 /cover ;
}
#khung_id10 .all_s.active div{
display:block;
animation: id3_spin 2s infinite linear;
-webkit-animation: id3_spin 2s infinite linear;
-moz-animation: id3_spin 2s infinite linear;
-ms-animation: id3_spin 2s infinite linear;
-o-animation: id3_spin 2s infinite linear;
}
#khung_id10 .all_m{
   position: absolute;
    width: 90%;
    padding: 5%;
    color: #fe1717!important;
    text-shadow: 0px 0px 8px black, 0px 0px 8px black;
    text-align: center;
    top: 45%;
}
#khung_id10 .all_x div{
    width: 18%;
    padding-bottom: 18%;
    background: url(/lib/img/xocdia/chip1.png) 0% 0% /100% 100%;
    position: absolute;	
	transition: all 500ms ease;
	-webkit-transition: all 500ms ease;
	-o-transition: all 500ms ease;
	-moz-transition: all 500ms ease;
	-ms-transition: all 500ms ease;	
}
#khung_id10 .chip1{
background-image:url(/lib/img/xocdia/chip1.png)!important;;
}
#khung_id10 .chip2{
background-image:url(/lib/img/xocdia/chip2.png)!important;;
}
#khung_id10 .chip3{
background-image:url(/lib/img/xocdia/chip3.png)!important;;
}
#khung_id10 .chip4{
background-image:url(/lib/img/xocdia/chip4.png)!important;;
}
#khung_id10 .chip5{
background-image:url(/lib/img/xocdia/chip5.png)!important;;
}
#khung_id10 .chip6{
background-image:url(/lib/img/xocdia/chip6.png)!important;;
}

#khung_id10 .tooltip_id10{
	position: absolute;
    color: white;
    background: rgba(0, 0, 0, 0.6);
    padding: 3px 15px;
    top: 100%;
    left: -5%;
    white-space: nowrap;
    z-index: 49;
	display: none;
}
#khung_id10 .dia{
	margin-left: 40.5%;
    margin-top: 1%;
    width: 20%;
    height: 36%;
    position: absolute;
    background: url(/lib/img/xocdia/dia.png) 0% 0% / 100% 100%;
}

#khung_id10 .dia .item_1{
    width: 13.7%;
    position: absolute;
    height: 14%;
    margin-left: 1%;
    background: url(/lib/img/xocdia/score1.png) 0% 0% /100% 100%;
    color: #000000;
    font-weight: 900;
    left: 34%;
    top: 34%;
}
#khung_id10 .dia .item_1[data-txt='2']{
    background: url(/lib/img/xocdia/score2.png) 0% 0% /100% 100%;	
}

#khung_id10 .dia .item_1[data-txt='0']{
    background: url(/lib/img/xocdia/score2.png) 0% 0% /100% 100%;	
}

#khung_id10 .dia .item_1[data-txt='4']{
    background: url(/lib/img/xocdia/score2.png) 0% 0% /100% 100%;	
}

#khung_id10 .dia div:nth-child(2){
left: 51%;
}

#khung_id10 .dia div:nth-child(3){
	left: 34%;
    top: 51%;
}
#khung_id10 .dia div:nth-child(4){
	left: 51%;
    top: 51%;
}

#khung_id10 .chen{
	margin-left: 40.5%;
    margin-top: 1%;
    width: 20%;
    height: 36%;
    position: absolute;
    background: url(/lib/img/xocdia/chen2.png) 0% 0% / 100% 100%;	
}
#khung_id10 .chen .clock-small{
	color: red;
    font-weight: 700;	
}
#khung_id10 .chechen{
	margin-left: 40.5%;
    margin-top: 1%;
    width: 20%;
    height: 36%;
    position: absolute;
}
</style>
<div id="khung_id10" class="khung_game_show">
<div class="font_size_30 block_game" style="max-width: 700px;width: 65%;">
<div class="button-top">
<img src="../image/Tài xỉu/close.png" style="margin-left: -36%;margin-top: -4%;" onclick="$('#khung_id10').hide('fade', {} , 200 );">
<img src="../image/Tài xỉu/thongke.png" style="margin-top: 80%;margin-left:-1165%;" onclick="getContent('/chanle/phien.html')">
<img src="../image/Tài xỉu/help.png" style="margin-top: 200%;margin-left:-1165%;" onclick="getContent('/chanle/huongdan.html')">

<img src="../image/Tài xỉu/lichsu.png" style="margin-top: 320%;margin-left:-1165%;" onclick="getContent('/chanle/cuoc.html')">
<img class="nangame" src="../image/Tài%20xỉu/btn_nan_2.png" style="margin-top: 560%;margin-left:-1165%;" onclick="">
</div>
<div class="font_size_21">
<div class="cuoc_khung1">
<div class="cuoc_khbox">
<div class="all_t" data-txt="0"></div>
<div class="all_x" data-txt="0">
<div class="all_chip chip1"></div>
</div>
<div class="all_m middle" data-txt="0"></div>
<div class="all_b" data-txt="0"></div>
<div class="all_s middle"><div></div></div>
</div>
</div><div class="cuoc_khung2">
<div class="cuoc_khbox">
<div class="all_t" data-txt="0"></div>
<div class="all_x" data-txt="0">
<div class="all_chip chip2"></div>
</div>
<div class="all_m middle" data-txt="0"></div>
<div class="all_b" data-txt="0"></div>
<div class="all_s middle"><div></div></div>
</div>
</div><div class="cuoc_khung3">
<div class="cuoc_khbox">
<div class="all_t" data-txt="0"></div>
<div class="all_x" data-txt="0">
<div class="all_chip chip3"></div>
</div>
<div class="all_m middle" data-txt="0"></div>
<div class="all_b" data-txt="0"></div>
<div class="all_s middle"><div></div></div>
</div>
</div><div class="cuoc_khung4">
<div class="cuoc_khbox">
<div class="all_t" data-txt="0"></div>
<div class="all_x" data-txt="0">
<div class="all_chip chip4"></div>
</div>
<div class="all_m middle" data-txt="0"></div>
<div class="all_b" data-txt="0"></div>
<div class="all_s middle"><div></div></div>
</div>
</div><div class="cuoc_khung5">
<div class="cuoc_khbox">
<div class="all_t" data-txt="0"></div>
<div class="all_x" data-txt="0">
<div class="all_chip chip5"></div>
</div>
<div class="all_m middle" data-txt="0"></div>
<div class="all_b" data-txt="0"></div>
<div class="all_s middle"><div></div></div>
</div>
</div><div class="cuoc_khung6">
<div class="cuoc_khbox">
<div class="all_t" data-txt="0"></div>
<div class="all_x" data-txt="0">
<div class="all_chip chip6"></div>
</div>
<div class="all_m middle" data-txt="0"></div>
<div class="all_b" data-txt="0"></div>
<div class="all_s middle"><div></div></div>
</div>
</div>
<div class="lichsu-roll font_size_25"  onmouseout="hide_roll_id10()" >

<?PHP
$data_bc = $mysqli->query("SELECT * FROM `phien_chanle`   ORDER by id DESC LIMIT 12");
$log = array();
while($e=$data_bc->fetch_assoc())
{
    $phien = json_decode($e['data'],true);
   $log[] = '<div class="item item_'.$phien['x5'].'" onmouseover="show_roll_id10($(this))" data-title="#'.$phien['phien'].'" ><div class="middle">'.$phien['x5'].'</div></div>';
}
$max = count($log);
while($max > 0)
{
    echo $log[$max];
    $max = $max - 1;
}

?>

<span class="tooltip_id10 font_size_18" ></span>
</div>
<div class="hu font_size_24">
<div class="middle">#<font id="clphien">0</font></div>
</div>
<div class="choncuoc-right" >
<div class="zoom-hove retun"></div>
<div class="zoom-hove reset"></div>
<div class="zoom-hove play_game"></div>
</div>
<div class="choncuoc-bottom" >
<div class="zoom-hove active" data-txt="100"></div>
<div class="zoom-hove" data-txt="1000" style="background-image: url(/lib/img/xocdia/1k.png);left: 15%;"></div>
<div class="zoom-hove" data-txt="10000" style="background-image: url(/lib/img/xocdia/10k.png);left: 30%;"></div>
<div class="zoom-hove" data-txt="50000" style="background-image: url(/lib/img/xocdia/50k.png);left: 45%;"></div>
<div class="zoom-hove" data-txt="200000" style="background-image: url(/lib/img/xocdia/200k.png);left: 60%;"></div>
<div class="zoom-hove" data-txt="1000000" style="background-image: url(/lib/img/xocdia/1M.png);left: 75%;"></div>
</div>
<div class="animation dia">
<div class="item_1" data-txt="1"></div>
<div class="item_1" data-txt="2"></div>
<div class="item_1" data-txt="2"></div>
<div class="item_1" data-txt="2"></div>
</div>
<div class="animation chen" style="left: 40%;top: -3%;">
<div class="middle font_size_40 po_a clock-big" style="color:red;position: absolute;">
1
</div>
<div class="middle font_size_40 po_a clock-small" style="position: absolute;">
1
</div>
</div>
<div class="chechen" >
</div>
<div class="note_tb"><center class="note_here"></center></div>
<img src="/image/Xóc%20đĩa/bkg3.png" width="100%">
</div></div>
<script>
gid[10] = '#khung_id10 ';var kq_xocdia = null ;

function addchip_roll_id10(x,y) {

	let rand3 = Math.floor((Math.random() * 99999999) + 1);	
	$('#khung_id10 .'+x+' .all_x').append('<div class="all_chip chip'+y+' rand_'+rand3+'"></div>');
	setTimeout(function () {  $('#khung_id10 .'+x+' .all_x .rand_'+rand3+'').css({'top': Math.floor((Math.random() * 90) + 1)+'%','left': Math.floor((Math.random() * 80) + 1)+'%'}) }, 50 );

}
function chip_roll_id10(x,y) {
/*var x = 'cuoc_khung6';
var y = Math.floor(1000);*/
let chip = Math.floor($('#khung_id10 .'+x+' .all_t').val());	
var next = y - chip;
$('#khung_id10 .'+x+' .all_t').attr('data-txt',njs(y)).val(y);
if(next > 999999){
	let chia = Math.floor(next / 1000000);
	for($i=0;$i<chia;$i++){
	addchip_roll_id10(x,'6');
	next -= 1000000;
    }
}
if(next > 199999){
	let chia = Math.floor(next / 200000);
	for($i=0;$i<chia;$i++){
	addchip_roll_id10(x,'5');
	next -= 200000;
    }
}
if(next > 49999){
	let chia = Math.floor(next / 50000);
	for($i=0;$i<chia;$i++){
	addchip_roll_id10(x,'4');
	next -= 50000;
    }
}
if(next > 9999){
	let chia = Math.floor(next / 10000);
	for($i=0;$i<chia;$i++){
	addchip_roll_id10(x,'3');
	next -= 10000;
    }
}
if(next > 999){
	let chia = Math.floor(next / 1000);
	for($i=0;$i<chia;$i++){
	addchip_roll_id10(x,'2');
	next -= 1000;
    }
}
if(next > 99){
	let chia = Math.floor(next / 100);
	for($i=0;$i<chia;$i++){
	addchip_roll_id10(x,'1');
	next -= 100;
    }
}



/*for($i=1;$i<chia;$i++){
	
	rand3 = Math.floor((Math.random() * 99999999) + 1);	
	$('#khung_id10 .'+x+' .all_x').append('<div class="all_chip chip2 rand_'+rand3+'"></div>').delay(50).queue(function(){$(this).find('.'+rand3).remove().dequeue();});;
	//setTimeout(function(){ $('#khung_id10 .'+x+' .all_x .rand_'+rand3).css({'top': Math.floor((Math.random() * 90) + 1)+'%','left': Math.floor((Math.random() * 85) + 1)+'%'});; },5);

}*/




}

function kq_roll_id10(x) {
	if(x == null){
		return '';
	}
	let cau5 = Math.floor(x.cau[5]);
	var win = 0;
	$( "#khung_id10 .lichsu-roll div" ).first().remove();
	let div = '<div class="item item_'+cau5+'" onmouseover="show_roll_id10($(this))" data-title="#'+x.roll+'"><div class="middle">'+cau5+'</div></div>';
	$( "#khung_id10 .lichsu-roll span" ).before(div);	
	$( "#khung_id10 .hu div font" ).html( x.roll + 1);	
	$( "#khung_id10 .chen" ).css({'top':'-3%','left':'40%'});
	if(cau5 == 0 || cau5 == 2 || cau5 == 4){		
	$('#khung_id10 .cuoc_khung1 .all_s').addClass('active');	
	win += Math.floor($('#khung_id10 .cuoc_khung1 .all_b').attr('data-txt'))*1.98;	
	}else{
	$('#khung_id10 .cuoc_khung1 .all_x .all_chip').css({ 'top' : '', 'left' : '' });	
	}
	if(cau5 == 1 || cau5 == 3){
	$('#khung_id10 .cuoc_khung2 .all_s').addClass('active');		
	win += Math.floor($('#khung_id10 .cuoc_khung2 .all_b').attr('data-txt'))*1.98;	
	}else{
	$('#khung_id10 .cuoc_khung2 .all_x .all_chip').css({ 'top' : '', 'left' : '' });	
	}
	if(cau5 == 3){
	$('#khung_id10 .cuoc_khung3 .all_s').addClass('active');		
	win += Math.floor($('#khung_id10 .cuoc_khung3 .all_b').attr('data-txt'))*4;		
	}else{
	$('#khung_id10 .cuoc_khung3 .all_x .all_chip').css({ 'top' : '', 'left' : '' });	
	}	
	if(cau5 == 1){
	$('#khung_id10 .cuoc_khung4 .all_s').addClass('active');		
	win += Math.floor($('#khung_id10 .cuoc_khung4 .all_b').attr('data-txt'))*4;	
	}else{
	$('#khung_id10 .cuoc_khung4 .all_x .all_chip').css({ 'top' : '', 'left' : '' });	
	}
	if(cau5 == 0){		
	$('#khung_id10 .cuoc_khung5 .all_s').addClass('active');		
	win += Math.floor($('#khung_id10 .cuoc_khung5 .all_b').attr('data-txt'))*12;	
	}else{
	$('#khung_id10 .cuoc_khung5 .all_x .all_chip').css({ 'top' : '', 'left' : '' });	
	}
	if(cau5 == 4){
	$('#khung_id10 .cuoc_khung6 .all_s').addClass('active');		
	win += Math.floor($('#khung_id10 .cuoc_khung6 .all_b').attr('data-txt'))*12;		
	}else{
	$('#khung_id10 .cuoc_khung6 .all_x .all_chip').css({ 'top' : '', 'left' : '' });	
	}
	
	
	
	if(win > 0){
	note_play('#khung_id10 .note_here','Thắng '+njs(win),'faaf55');check_all('xocdia1');
	}
	check_all('xocdia1');
	kq_xocdia = null;
}
function hide_roll_id10(x) {
	$('#khung_id10 .tooltip_id10').hide();		
}	
function show_roll_id10(x) {
    var a = x.offset();
    var b = $( "#khung_id10 .lichsu-roll" ).offset();    
	$('#khung_id10 .tooltip_id10').html( x.attr( "data-title" ) ).css({'margin-left':(a.left - b.left)+'px'}).show();	
}
var GameManagerID_10 =
{currentGate:1,currentHide:0,currentPlay:0,currentMoney:100,currentTime:200,ID:'',

	play_game:function(s){
	var Pl = $(GameManagerID_10.ID+".cuoc_khbox .all_m");
	//SEND SOCKET.
	socket.emit("ducnghia",json(
	    {
	        ducnghia : 'check_chanle',
	        data     : [Pl.eq(0).attr('data-txt'),Pl.eq(1).attr('data-txt'),Pl.eq(2).attr('data-txt'),Pl.eq(3).attr('data-txt'),Pl.eq(4).attr('data-txt'),Pl.eq(5).attr('data-txt')],
	        
	    }
	    ));
	    /*
	$.ajax(
	    {
	        type:'post',url:'./user-play',
	        data:
	        {
	        play_xocdia: true,
	        t : datenow,
	        play_dat: [Pl.eq(0).attr('data-txt'),Pl.eq(1).attr('data-txt'),Pl.eq(2).attr('data-txt'),Pl.eq(3).attr('data-txt'),Pl.eq(4).attr('data-txt'),Pl.eq(5).attr('data-txt')],	
	        }
	        ,success:function(s)
	        {
	            var obj = JSON.parse(s);	
	            if(obj.error == 0)
	            {
	                thong_bao(obj.tb, obj.ms );
	            }
	            else
	            {
	                note_play('#khung_id10 .note_here',obj.ms,'faaf55');check_all('xocdia1');
	                socket.emit("fmgkh",encode(JSON.stringify({ id : obj.id , data : obj.c })));
	            }
	        GameManagerID_10.retun_money(1);
	        }
	        
	    });
	    */



	},
	Set_bet:function(s){
	$(this.ID+'.choncuoc-bottom div').removeClass('active')	
	s.addClass('active');	
	this.currentMoney = s.attr('data-txt');
	},
	add_money:function(s){
	y = s.find('.all_m').attr('data-txt');	
	s.find('.all_m').attr('data-txt',Math.floor(this.currentMoney) + Math.floor(y));	
		
	},
	reset_money:function(s){
	$(this.ID+".cuoc_khbox .all_m").attr('data-txt','0');	
		
	},	
	retun_money:function(s){
	$(this.ID+".cuoc_khbox .all_m").attr('data-txt','0');	
		
	},	
	nan_xd:function(x){
	if(x.val() == 1){
	x.attr("src","../image/Tài%20xỉu/btn_nan_2.png").val(0);
	}else{
	x.attr("src","../image/Tài%20xỉu/btn_nan_0.png").val(1);
	}
	return false;		
	},		
	Set_button:function(s){
	this.ID = s;
	$( s ).draggable({start: function() {
	$('.actigame').removeClass('actigame')
	$(this).addClass('actigame');
	}});	
	$( s+".chen" ).draggable( {      drag: function() {
	var thisposition = $(this).position();
	if( thisposition.left > Math.floor($(this).width()*0.91) )
       kq_roll_id10(kq_xocdia); 
	if( thisposition.top > Math.floor($(this).height()*0.91) )
		kq_roll_id10(kq_xocdia);
	if( thisposition.left < Math.floor('-'+$(this).width()*0.91) )
		kq_roll_id10(kq_xocdia);
	if( thisposition.top < Math.floor('-'+$(this).height()*0.91) )
		kq_roll_id10(kq_xocdia);		
	
      },
	 });
	/*
	$(s+".dang_quay").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){GameManagerID_9.play();}});
	
	$(s+".tu_quay").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){GameManagerID_9.tu_quay($(this));}});
	
	$(s+".sieu_toc").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){GameManagerID_9.sieu_toc($(this));}});
	*/
	$(s+".nangame").on("click", function () { if(check_click($(this)) == true){GameManagerID_10.nan_xd($(this));}});	
	$(s+".play_game").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){GameManagerID_10.play_game($(this));}});	
	$(s+".choncuoc-right .reset").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){GameManagerID_10.reset_money($(this));}});	
	$(s+".cuoc_khbox").on("click touchstart mousedown touchend", function () { if(check_click2($(this)) == true){GameManagerID_10.add_money($(this));}});	
	$(s+".choncuoc-bottom div.zoom-hove").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){GameManagerID_10.Set_bet($(this));}});
	}
	
}

GameManagerID_10.Set_button('#khung_id10 ');

</script>