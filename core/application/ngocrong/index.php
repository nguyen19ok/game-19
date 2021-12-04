<?PHP
include_once('../../../core/system/config.php');

?>
<style>
.class-input {
	border: 0 solid #fff;
	background: rgba(255, 255, 255, 0);
	text-align: center
}

@media(min-width:0px) and (max-width:480px) {
	.khung-tx {
		width: 100%!important
	}
	.chat-wrap {
		width: 100%!important;
		max-width: 250px!important;
		display: none!important
	}
	.khung-tx .font_size_35 {
		font-size: 5.5vw!important;
		font-weight: 700
	}
	.khung-tx .font_size_25 {
		font-size: 4.2vw!important;
		font-weight: 700
	}
	.khung-tx .font_size_18 {
		font-size: 3.7vw!important;
		font-weight: 700
	}
	.khung-tx .font_size_100 {
		font-size: 18.5vw!important;
		font-weight: 700
	}
}

#game-taixiu {
	z-index: 10000000000;
	height: 0;
	width: 100%;
	font-weight: 700
}

#game-taixiu #khung-tx {
	position: relative;
	margin: auto
}

.khung-tx {
	width: 55%;
	display: block;
	margin-bottom: 11%;
	max-width: 600px;
	position: relative;
	float: left;
	margin-right: -3%
}

.khung-tx .button-top {
	right: 0;
	top: 0;
	z-index: 2;
	width: 7.5%;
	position: absolute;
	cursor: pointer
}

.khung-tx .button-top img {
	width: 100%;
	cursor: pointer;
	z-index: 100;
	position: absolute
}

.khung-tx .money-xiu,
.khung-tx .money-tai {
    color: #fef66c;
	text-shadow: 0 0 8px black, 0 0 8px #000;
	text-align: center
}

.khung-tx .cuoc-xiu,
.khung-tx .cuoc-tai {
	color: #7aff00;
    text-shadow: 0 0 8px black, 0 0 8px #000;
    text-align: center;
    font-weight: 600;
    height: 18%;
    margin-top: 27%;
}

.khung-tx .user-xiu {
    font-size: 14px;
	color: #fff !important;
    text-shadow: 0 0 8px black, 0 0 8px #000;
    text-align: center;
    height: 20%;
    margin-left: -42%;
    width: 100%;
    margin-top: -9%;

}
.khung-tx .user-tai {
    font-size: 14px;
    color: #fff !important;
    text-shadow: 0 0 8px black, 0 0 8px #000;
    text-align: center;
    height: 20%;
    margin-left: 42%;
    width: 100%;
    margin-top: -9%;

}

.khung-tx .input-xiu,
.khung-tx .input-tai {
    color: transparent;
    text-shadow: 0 0 0 #fff;
    &: focus {;
    outline: none;
    }: ;
    color: #fff !important;
    font-weight: 600;
    position: absolute;
    text-align: center;
    height: 20%;
    margin-top: -2.5%;
    width: 23%;
    padding: 0;
    z-index: 49;
    cursor: pointer;
    outline: unset !important;
}

.khung-tx .input-cuoc-hide div {
	height: 60%;
	width: 97%;
	margin-top: 8%;
	border-radius: 25px;
	border: 2px solid rgba(255, 255, 255, 0)
}

.khung-tx .input-cuoc-hide.active div {
	animation: changesolid .35s infinite alternate;
	-webkit-animation: changesolid .35s infinite alternate;
	-moz-animation: changesolid .35s infinite alternate;
	-ms-animation: changesolid .35s infinite alternate;
	-o-animation: changesolid .35s infinite alternate
}

.placered::placeholder {
  color:#ff0 !important;
}

.placered::-ms-placeholder {
  color:#ff0 !important;
}

.placered::-moz-placeholder {
  color:#ff0 !important;
}

.placered::-webkit-input-placeholder {
  color:#ff0 !important;
}

.placered::-o-input-placeholder {
  color:#ff0 !important;
}


.placewhite::placeholder {
	color: rgba(255, 255, 255, 0.8)!important
}

.placewhite::-ms-placeholder {
	color: rgba(255, 255, 255, 0.8)!important
}

.placewhite::-moz-placeholder {
	color: rgba(255, 255, 255, 0.8)!important
}

.placewhite::-webkit-input-placeholder {
	color: rgba(255, 255, 255, 0.8)!important
}

.placewhite::-o-input-placeholder {
	color: rgba(255, 255, 255, 0.8)!important
}

.khung-tx .clock-big {
/*text-shadow: 0 0 8px black, 0 0 8px #000;*/
    font-weight: 800;
    position: absolute;
    top: 42%;
    left: 49%;
    color: #FFFFFF;
    
}

.khung-tx .btn-xiu,
.khung-tx .btn-tai {
width: 6.5%;
    float: left;
    height: 110%;
    border: 0;
    background: url(../image/Tài%20xỉu/ico-white.png) 0 0 / cover no-repeat;
    margin: 0 .5%;
    cursor: pointer;
}

.khung-tx .btn-tai {
	background-image: url(../image/Tài%20xỉu/ico-black.png)
}

.khung-tx .his {
    float: left;
    width: 57%;
    text-align: center;
    margin-left: 16.7%;
    margin-top: -5.0%;
    height: 14.8%;
    margin-bottom: -1%;
    padding: 2.05% 0;
}

.khung-tx .group-button {
	float: left;
	width: 100%;
	text-align: center;
	height: auto;
	margin-top: 2%;
	display: none;
	-webkit-touch-callout: none!important;
	-webkit-user-select: none!important;
	-khtml-user-select: none!important;
	-moz-user-select: none!important;
	-ms-user-select: none!important;
	user-select: none!important
}

.khung-tx .group-button .button {
cursor: pointer;
    width: 9.6%;   
    height: 85%;    
    margin-right: 6px;    
    padding: 5px 0;

    text-align: center;
    border-radius: 35px;
    margin: 5px 3px 5px 0px;
    background-size: 100% 100%;
    background-repeat: no-repeat;
    color: #20003d;
    /* font-family: 'helveticaneuecondensedblack'; */
    outline: 0;
    border-radius: 50%;
    box-shadow: 5px 5px 15px #222222;
    line-height: 15px;
    font-size: 13px;
    font-weight: bold;
    border: none;
    

	float: left;

	background: url(../image/Tài%20xỉu/btn_muccuoc.png) 0 0 / cover no-repeat;
	position: relative;
	background-size: 100% 100%;
margin-right: 6px;	
}

.khung-tx .group-button .button.blue {
	height: 100%;
	width: 23%;
	margin-left: 16%;
	background-image: url(../lib2/imgdep/close.png)
}

.khung-tx .group-button .button.green {
    background-image: url(../images/dice/btn-dangnhap.png);
    background-color: transparent;
    color: #fff;
    width: 94px;
    padding: 8px 0 10px 0;
    text-indent: -999em;
    box-shadow: 5px 5px 15px #222222;
    -webkit-transform: scale(1, 1);
    -moz-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    -o-transform: scale(1, 1);
    transform: scale(1, 1);
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -ms-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;

	background-image: url(../lib2/imgdep/datcuoc.png)
}

.khung-tx .group-button .button.red {
	height: 100%;
	width: 23%;
	background-image: url(../lib2/imgdep/huy.png)
}

.khung-tx .group-button .middle {
	position: absolute;
	white-space: nowrap;
	color: #fff;
	text-shadow: 0 0 8px black, 0 0 8px #000
}

.khung-tx .group-button .middle:after {
	content: attr(data-txt)
}

.khung-tx .his div:hover~ :nth-child(14) {
	-webkit-animation: none!important;
	-moz-animation: none!important;
	-o-animation: none!important;
	animation: none!important
}

.khung-tx .his div:hover {
	animation: updown .5s infinite alternate;
	-webkit-animation: updown .5s infinite alternate;
	-moz-animation: updown .5s infinite alternate;
	-ms-animation: updown .5s infinite alternate;
	-o-animation: updown .5s infinite alternate
}

.khung-tx .his div:nth-child(14) {
	animation: updown .5s infinite alternate;
	-webkit-animation: updown .5s infinite alternate;
	-moz-animation: updown .5s infinite alternate;
	-ms-animation: updown .5s infinite alternate;
	-o-animation: updown .5s infinite alternate
}

.btn-cuocMoney {
	outline: 0;
	padding: .5%;
	color: #333;
	border-radius: 5px;
	background-color: #fff;
	border-color: #ccc;
	box-shadow: 0 0 5px 3px #000;
	border: 0 solid #000;
	font-weight: 900;
	cursor: pointer
}

.btn-cuocMoney:hover,
.btn-cuocMoney:focus {
	background-color: #673AB7!important;
	color: #fff!important
}

.btn-tattay {
    font-family: nexa_bold;    
	outline: 0;
	transform: scale(0.95);
	padding: .5%;
	color: #fff;
	text-shadow: 0 0 3px black, 0 0 3px #000;
	border-radius: 5px;
	background-color: #f55541;
	border-color: #ccc;
	box-shadow: 0 0 5px 3px #000;
	border: 0 solid #000;
	font-weight: 900;
	cursor: pointer
}

.btn-cancel {
    font-family: nexa_bold;
	outline: 0;
	transform: scale(0.95);
	padding: .5%;
	color: #fff;
	text-shadow: 0 0 3px black, 0 0 3px #000;
	border-radius: 5px;
	background-color: #f0ad4e;
	border-color: #ccc;
	box-shadow: 0 0 5px 3px #000;
	border: 0 solid #000;
	font-weight: 900;
	cursor: pointer
}

.btn-agree {
    font-family: nexa_bold;    
	outline: 0;
	transform: scale(0.95);
	padding: .5%;
	color: #fff;
	text-shadow: 0 0 3px black, 0 0 3px #000;
	border-radius: 5px;
	background-color: #00a65a;
	border-color: #ccc;
	box-shadow: 0 0 5px 3px #000, 0 0 5px 3px #000;
	border: 0 solid #000;
	font-weight: 900;
	cursor: pointer
}

.khung-tx .tai-wrap,
.khung-tx .xiu-wrap {
	width: 23%;
    height: 60%;
    float: left;
    margin-top: 5%;
}

.khung-tx .tai-wrap .money-tai,
.khung-tx .xiu-wrap .money-xiu {
	height: 20%;
	margin-top: 11%;
	width: 100%
}

.khung-tx .tai-wrap .icon,
.khung-tx .xiu-wrap .icon {
	background: url(../image/Tài%20xỉu/tai_default.png) 0 0 /cover no-repeat;
	width: 60%;
	height: 28%;
	margin-left: 20%
}

.khung-tx .xiu-wrap .icon {
	background-image: url(../image/Tài%20xỉu/xiu_default.png)
}

.khung-tx .tai-wrap .icon.kq {
	background-image: url(../image/Tài%20xỉu/tai_default.png)!important;
	background-size: 100% auto;
	background-repeat: no-repeat;
	-webkit-animation: zoomout .5s infinite alternate;
	-moz-animation: zoomout .5s infinite alternate;
	animation: zoomout .5s infinite alternate
}

.khung-tx .xiu-wrap .icon.kq {
	background-image: url(../image/Tài%20xỉu/xiu_default.png)!important;
	background-size: 100% auto;
	background-repeat: no-repeat;
	-webkit-animation: zoomout .5s infinite alternate;
	-moz-animation: zoomout .5s infinite alternate;
	animation: zoomout .5s infinite alternate
}

.khung-tx #vung-taixiu {
    margin-top: -20px;
    margin-left: -7px;
	position: absolute;
	width: 100%;
	height: 100%;
	background: url(../image/Tài%20xỉu/bat.png) 0 0 / cover no-repeat;
	border: 0 solid #fff;
	z-index: 51;
	cursor: pointer;
	display: none
}

.khung-tx .clock,
.khung-tx .clock img {
	position: absolute;
	width: 100%;
	height: 100%
}

.khung-tx #game-taixiu2 {

	    width: 32%;
    height: 60%;
    float: left;
    margin-top: 10%;
    position: relative;
    background-position: center;
    background-size: 100%;
}

.khung-tx #game-taixiu2.nantx .vung {
	display: block
}

.khung-tx #game-taixiu2 #vung-taixiu .vung_number span {
	display: table-cell;
	text-align: center;
	vertical-align: middle
}

.khung-tx #game-taixiu2 #vung-taixiu .vung_number {
	display: table;
	width: 30%;
	height: 32%;
	background: #000;
	border-radius: 50%;
	color: #fff;
	margin-top: 50%;
	margin-left: 50%;
	transform: translate(-50%, -50%);
	-webkit-transform: translate(-50%, -50%);
	-moz-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	-o-transform: translate(-50%, -50%)
}

.khung-tx #game-taixiu2 .kq-num div {
	position: absolute
}

.khung-tx #game-taixiu2 .kq-num {
	position: absolute;
	height: 26%;
	width: 25%;
	margin-top: 3%;
	margin-left: 72%;
	opacity: 0;
	border: 2.5px solid rgba(0, 0, 0, 0.5);
	border-radius: 50%;
	background: #f29d38;
	font-weight: bolder;
	color: #fff
}

.khung-tx #game-taixiu2 .roll-play {
	position: absolute;
    left: -30%;	
	top: -25%;
	width: 100%;
	height: 22%;
	text-align: center;
	color: #fff;
	border-radius: 15px;
}

.khung-tx #game-taixiu2 .clock-small {
background: url(../image/Tài%20xỉu/bg-text.png) center center no-repeat;
    position: absolute;
    /* background: rgba(0, 0, 0, 0.7); */
    top: 77%;
    width: 86%;
    height: 14%;
    left: 50%;
    text-align: center;
    color: #ccc1c1;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    /* transform: translateX(-50%); */
    border-radius: 15px;
}

.khung-tx #game-taixiu2.time .vung,
.khung-tx #game-taixiu2.time .effect,
.khung-tx #game-taixiu2.time .clock-small,
.khung-tx #game-taixiu2.time .kq-num {
	display: none
}

.khung-tx #game-taixiu2.time .clock-big {
	display: block
}

.chat-wrap {
	width: 25%;
	display: block;
	max-width: 270px;
	position: relative;
	float: left
}

.chat-wrap.off {
	display: none
}

.chat-wrap .chat-content {
	height: 72%;
	overflow: hidden;
	padding: 10% 10% 0;
	position: relative
}

.chat-wrap .chat-inner {
	overflow: hidden;
	height: 100%
}

.chat-wrap .chat-footer {
	width: 93%;
	height: 14%;
	margin-top: 1%;
	background: none;
	font-size: 20px;
	font-weight: 600
}

.chat-wrap .chat-input {
	width: 100%;
	height: 100%;
	background: none;
	border: 0 solid #fff;
	padding: 0 12%;
	color: #fff;
	z-index: 49
}

.chat-wrap .chat-inner p {
	margin: 0;
	color: #fff;
	line-height: 1.05;
	cursor: default
}

.chat-wrap .chat-inner p .u-name {
	color: #CDDC39;
	font-weight: 400
}

.khung-tx .effect {
	background: url(../lib/img/ngocrong/ef.png) 0 0 / cover no-repeat;
	visibility: visible;
	z-index: 5;
	height: 100%;
	margin-top: -8%;
	opacity: 0
}

.khung-tx .his .tooltip_tx {
	position: absolute;
	color: #fff;
	background: rgba(0, 0, 0, 0.6);
	padding: 3px 15px;
	margin-top: 4%;
	left: 12.5%;
	white-space: nowrap;
	z-index: 49;
	display: none
}

.khung-tx .clogame {
    margin-left: 25%;
    margin-top: 38%;
}

.khung-tx .wingame, .khung-tx .allgame {
    margin-top: 483%;
    margin-left: -30%;
}

.khung-tx .hisgame {
    margin-top: -21%;
    margin-left: -243%;
}

.khung-tx .guigame {
    margin-top: -21%;
    margin-left: -147%;
}

.khung-tx .nangame {
    margin-top: 325%;
    margin-left: 55%;
}
</style>
<div id="game-taixiu" class="khung_game_show actigame">
<div id="khung-tx">
<div class="khung-tx">
<div class="button-top">
<img class="clogame zoom-hove" src="../image/Tài xỉu/close.png">
<img class="wingame zoom-hove" src="../image/Tài xỉu/thongke.png" style="display:none;">
<img class="hisgame zoom-hove" src="../image/Tài xỉu/lichsu.png">
<img class="guigame zoom-hove" src="../image/Tài xỉu/help.png">

<img class="nangame zoom-hove" src="../image/Tài%20xỉu/btn_nan_0.png">
<img class="allgame zoom-hove" src="../image/Tài xỉu/thongke.png">
</div>
<div class="move-here ui-draggable-handle" style="position:absolute;width: 100%;height: 81%;z-index: 1;">
<div class="note_here font_size_18" style="position: absolute;display: flex;width: 100%;height:70%;top: 15%;text-align: center;z-index:50;">
</div>
</div>
<div class="font_size_20" style="position:absolute;width: 118%;
    height: 115%;">
<div class="tai-wrap" style="margin-left:4%;">
<div class="icon"></div>
<div class="money-tai">0</div>
<input type="number" class="input-tai class-input font_size_20 placered" placeholder="" style="z-index: 50;">

<div class="cuoc-tai"></div>
<div class="user-tai">0</div>
</div>
<div id="game-taixiu2" class="time">
<div class="clock"></div>
<div class="vung ui-draggable ui-draggable-handle" id="vung-taixiu" style="display:none;">
<div class="vung_number" style=""><span>00</span></div>
</div>
<div class="kq-num"><div class="middle"></div></div>
<div class="roll-play"><span>0</span></div>
<div class="clock-big font_size_100 middle">00</div>
<div class="clock-small">00</div>
<div class="effect"></div>
</div>
<div class="xiu-wrap">
<div class="icon"></div>
<div class="money-xiu">0</div>
<input type="number" class="input-xiu class-input font_size_20 placered" placeholder="" style="z-index: 50;">

<div class="cuoc-xiu"></div>
<div class="user-xiu">0</div>
</div>
<div class="his" style="z-index: 49;" onmouseout="hide_roll_tx()">
    
<?PHP
$data_bc = $mysqli->query("SELECT * FROM `phien_ngocrong`   ORDER by id DESC LIMIT 13");
$log = array();
while($result=$data_bc->fetch_assoc())
{
    $phien = json_decode($result['data'],true);
    $log[] = '<div onmouseover="show_roll_tx($(this))" class="btn-'.$phien['ketqua'].'" data-title="#'.$phien['phien'].' ('.$phien['x1'].'-'.$phien['x2'].'-'.$phien['x3'].')'.($phien['x1']+$phien['x2']+$phien['x3']).'-'.($phien['ketqua'] == "xiu" ? 'Xỉu' : 'Tài').'"></div>';
}
$max = count($log)-1;
while($max >= 0)
{
    echo $log[$max];
    $max = $max - 1;
}

?>

<span class="tooltip_tx font_size_18"></span>
</div>
<div style="    position: absolute;
    top: -12%;
    width: 50%;
    height: 20%;
    left: 25%;background: url() 0% 0% /cover;">
</div>

<div class="group-button font_size_20" style="display: none;height: 40%;width: 90%;margin-left: 4%;">
<div class="so_khac" style="width: 100%;height: 35%;margin-left: 10%;">

<div class="button money"><div class="middle" data-txt="1K"></div></div>
<div class="button money"><div class="middle" data-txt="5K"></div></div>

<div class="button money"><div class="middle" data-txt="10K"></div></div>
<div class="button money"><div class="middle" data-txt="50K"></div></div>
<div class="button money"><div class="middle" data-txt="100K"></div></div>
<div class="button money"><div class="middle" data-txt="500K"></div></div>


</div>
<div class="group-button" style="margin-left: -8%;">
                                        <button class="btn-tattay" ng-click="cuocMoney(0,true)">Tất tay</button>
                                        <button class="btn-agree" ng-click="asubmit()">Đồng ý</button>
                                        <button class="btn-cancel" ng-click="cancelMoney()">Hủy</button>
                                    </div>
                                    



<div class="so_khac" style="width: 100%;height: 35%;display:none;">
<div class="button money2"><div class="middle" data-txt="1"></div></div>
<div class="button money2"><div class="middle" data-txt="2"></div> </div>
<div class="button money2"><div class="middle" data-txt="3"></div> </div>
<div class="button money2"><div class="middle" data-txt="4"></div> </div>
<div class="button money2"><div class="middle" data-txt="5"></div> </div>
<div class="button money2"><div class="middle" data-txt="6"></div> </div>
<div class="button money2"><div class="middle" data-txt="7"></div> </div>
<div class="button money2"><div class="middle" data-txt="8"></div> </div>
<div class="button money2"><div class="middle" data-txt="9"></div> </div>
<div class="button money2"><div class="middle" data-txt="0"></div> </div>
<div class="button money2"><div class="middle" data-txt="000"></div></div>
<div class="button money2"><div class="middle" data-txt="Xóa"></div></div>
<div class="button blue"><div class="middle" data-txt="Số Nhanh"></div></div>
<div class="button green"><div class="middle" data-txt="Đặt Cược"></div></div>
<div class="button red"><div class="middle" data-txt="Hủy"></div></div>
</div>
<div class="so_khac" style="width: 100%;height: 35%;display:none;">
<div class="button money2"><div class="middle" data-txt="1"></div></div>
<div class="button money2"><div class="middle" data-txt="2"></div> </div>
<div class="button money2"><div class="middle" data-txt="3"></div> </div>
<div class="button money2"><div class="middle" data-txt="4"></div> </div>
<div class="button money2"><div class="middle" data-txt="5"></div> </div>
<div class="button money2"><div class="middle" data-txt="6"></div> </div>
<div class="button money2"><div class="middle" data-txt="7"></div> </div>
<div class="button money2"><div class="middle" data-txt="8"></div> </div>
<div class="button money2"><div class="middle" data-txt="9"></div> </div>
<div class="button money2"><div class="middle" data-txt="0"></div> </div>
<div class="button money2"><div class="middle" data-txt="000"></div></div>
<div class="button money2"><div class="middle" data-txt="Xóa"></div></div>
<div class="button blue"><div class="middle" data-txt="Số Nhanh"></div></div>
<div class="button green"><div class="middle" data-txt="Đặt Cược"></div></div>
<div class="button red"><div class="middle" data-txt="Hủy"></div></div>
</div>
</div>
</div>
<img src="../image/Tài xỉu/bkg.png" width="100%">
</div>
</div>
</div>




<script>

 
    

    



function show_roll_tx(_0x9ca2x2) {
    var _0x9ca2x3 = _0x9ca2x2['offset']();
    var _0x9ca2x4 = $('#game-taixiu .his')['offset']();
    $('#game-taixiu .tooltip_tx')['html'](_0x9ca2x2['attr']('data-title'))['css']({
        'margin-left': (_0x9ca2x3['left'] - _0x9ca2x4['left']) + 'px'
    })['show']()
}

function soi_roll_tx() {
    $['ajax']({
        type: 'post',
        url: './user-play',
        data: {
            soicau: true,
            kiemtra: 1
        },
        success: function (_0x9ca2x6) {
            var _0x9ca2x7 = JSON['parse'](_0x9ca2x6);
            if (_0x9ca2x7['error'] == 0) {
                thong_bao(_0x9ca2x7['tb'], _0x9ca2x7['ms'])
            } else {}
        }
    })
}

function hide_roll_tx(_0x9ca2x2) {
    $('#game-taixiu .tooltip_tx')['hide']()
 
}

function set_roll_tx(_0x9ca2x2, _0x9ca2x6) {

    if (_0x9ca2x2 < 15) {
        m = 20
    } else {
        m = -15
    };
    setTimeout(function () {

        $('#khung-tx .effect')['css']({

            '\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x2D\x70\x6F\x73\x69\x74\x69\x6F\x6E\x2D\x79': 0 + (34 - _0x9ca2x2) * 2.94105 + '%',
            '\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x2D\x69\x6D\x61\x67\x65': 'url(../lib/img/tx/ef.png)',
            '\x6F\x70\x61\x63\x69\x74\x79': '1'
        });
        if (_0x9ca2x2 != 34) {
            set_roll_tx(_0x9ca2x2 + 1, _0x9ca2x6)
        } else {
            $('#khung-tx .effect')['css']('background-image', ' url(../lib/img/tx/xx' + Math['floor'](_0x9ca2x6['xn1']) + '_1.png),url(../lib/img/tx/xx' + Math['floor'](_0x9ca2x6['xn2']) + '_2.png),url(../lib/img/tx/xx' + Math['floor'](_0x9ca2x6['xn3']) + '_3.png)');
            $('#game-taixiu .kq-num div')['html'](_0x9ca2x6['xn4']);
            setTimeout(function() {
                $('#game-taixiu .effect')['css']({
                    '\x6F\x70\x61\x63\x69\x74\x79': '0'
                });
                $('#game-taixiu .kq-num')['css']({
                    '\x6F\x70\x61\x63\x69\x74\x79': '0'
                })
            }, 18000)
        }
    }, 30 + m)
}

function tattay_tx() {
    var _0x9ca2x2 = Math['floor']($('#khung-tx')['val']());
    if (_0x9ca2x2 == 0) {
        thong_bao('Th\xF4ng B\xE1o', 'Vui L\xF2ng Ch\u1ECDn T\xE0i Ho\u1EB7c X\u1EC9u')
    } else {
        if (_0x9ca2x2 == 1) {
            $('#khung-tx input.input-tai')['val'](Math['floor']($('.mymoney')['html']()['replace'](/\./g, '')))
        } else {
            if (_0x9ca2x2 == 2) {
                $('#khung-tx input.input-xiu')['val'](Math['floor']($('.mymoney')['html']()['replace'](/\./g, '')))
            }
        }
    }
}

function btn_money_tx(_0x9ca2xc) {
    var _0x9ca2x2 = Math['floor']($('#khung-tx')['val']());
    if (_0x9ca2x2 == 0) {
        thong_bao('Th\xF4ng B\xE1o', 'Vui L\xF2ng Ch\u1ECDn T\xE0i Ho\u1EB7c X\u1EC9u')
    } else {
        if (_0x9ca2x2 == 1) {
            $('#khung-tx input.input-tai')['val'](Math['floor'](_0x9ca2xc['find']('.middle')['attr']('data-txt')['replace'](/\K/g, '000')['replace'](/\M/g, '000000')) + Math['floor']($('#khung-tx input.input-tai')['val']()))
        } else {
            if (_0x9ca2x2 == 2) {
                $('#khung-tx input.input-xiu')['val'](Math['floor'](_0x9ca2xc['find']('.middle')['attr']('data-txt')['replace'](/\K/g, '000')['replace'](/\M/g, '000000')) + Math['floor']($('#khung-tx input.input-xiu')['val']()))
            }
        }
    };
    return false
}

function btn_khac_tx(_0x9ca2xc) {
    var _0x9ca2x2 = Math['floor']($('#khung-tx')['val']());
    var _0x9ca2xc = _0x9ca2xc['find']('.middle')['attr']('data-txt');
    if (_0x9ca2x2 == 0) {
        thong_bao('Th\xF4ng B\xE1o', 'Vui L\xF2ng Ch\u1ECDn T\xE0i Ho\u1EB7c X\u1EC9u')
    } else {
        if (_0x9ca2x2 == 1) {
            if (_0x9ca2xc == 'X\xF3a') {
                $('#khung-tx input.input-tai')['val'](Math['floor'](String($('#khung-tx input.input-tai')['val']())['slice'](0, -1)))
            } else {
                $('#khung-tx input.input-tai')['val'](Math['floor']($('#khung-tx input.input-tai')['val']() + '' + _0x9ca2xc))
            }
        } else {
            if (_0x9ca2x2 == 2) {
                if (_0x9ca2xc == 'X\xF3a') {
                    $('#khung-tx input.input-xiu')['val'](Math['floor'](String($('#khung-tx input.input-xiu')['val']())['slice'](0, -1)))
                } else {
                    $('#khung-tx input.input-xiu')['val'](Math['floor']($('#khung-tx input.input-xiu')['val']() + '' + _0x9ca2xc))
                }
            }
        }
    };
    return false
}

function dat_tx() {
    var _0x9ca2x2 = Math['floor']($('#khung-tx')['val']());
    if (_0x9ca2x2 == 0) {
        thong_bao('Th\xF4ng B\xE1o', 'Vui L\xF2ng Ch\u1ECDn T\xE0i Ho\u1EB7c X\u1EC9u')
    } else {
        if (_0x9ca2x2 == 1) {
            var _0x9ca2xf = $('#khung-tx input.input-tai')['val']();
            $('#khung-tx input.input-tai')['val']('');
            var _0x9ca2x10 = 'tai'
        } else {
            if (_0x9ca2x2 == 2) {
                var _0x9ca2xf = $('#khung-tx input.input-xiu')['val']();
                $('#khung-tx input.input-xiu')['val']('');
                var _0x9ca2x10 = 'xiu'
            }
        };
        
        
        socket.emit("ducnghia",json({
            ducnghia : 'thoigian',
            game : 'ngocrong',
            xu : _0x9ca2xf,
            cuoc : _0x9ca2x10,
            
        }));
    };
    return false
}
function resetNum() {
        var aB = document.querySelector("#game-taixiu2 .kq-num .middle");
        aB.textCotent = "";
}

function cuoc_tx(_0x9ca2x2) {
    if (_0x9ca2x2 == 1) {
        $('#khung-tx input.input-tai')['focus']();
        $('#khung-tx .group-button')['show']('fade', {}, 500);
        $('#khung-tx')['val'](1);
        $('#khung-tx input.input-tai')['val'](Math['floor']($('#khung-tx input.input-tai')['val']()) + 0);
        $('#khung-tx input.input-xiu')['val']('');
        $('#khung-tx .input-cuoc-hide')['removeClass']('active');
        $('#khung-tx .input-tai.input-cuoc-hide')['addClass']('active')
    } else {
        if (_0x9ca2x2 == 2) {
            $('#khung-tx input.input-xiu')['focus']()['select']();
            $('#khung-tx .group-button')['show']('fade', {}, 500);
            $('#khung-tx')['val'](2);
            $('#khung-tx input.input-xiu')['val'](Math['floor']($('#khung-tx input.input-xiu')['val']()) + 0);
            $('#khung-tx input.input-tai')['val']('');
            $('#khung-tx .input-cuoc-hide')['removeClass']('active');
            $('#khung-tx .input-xiu.input-cuoc-hide')['addClass']('active')
        } else {
            if (_0x9ca2x2 == 3) {
                $('#khung-tx .group-button')['hide']('fade', {}, 500);
                $('#khung-tx .input-cuoc-hide')['removeClass']('active');
                $('#khung-tx input.input-xiu')['val']('');
                $('#khung-tx input.input-tai')['val']('')
            }
        }
    };
    return false
}

function nan_taixiu(_0x9ca2x2) {
    if (_0x9ca2x2['val']() == 1) {
        _0x9ca2x2['attr']('src', '../image/Tài%20xỉu/btn_nan_0.png')['val'](0);
        $('#game-taixiu2')['removeClass']('nantx')
    } else {
        _0x9ca2x2['attr']('src', '../image/Tài%20xỉu/btn_nan_2.png')['val'](1);
        $('#game-taixiu2')['addClass']('nantx')
    };
    return false
}

function kq_taixiu(_0x9ca2x6, _0x9ca2xc) {
    $('#game-taixiu2 .clock img')['css']({
        'opacity': 0
    });

    
    if ($('#game-taixiu2')['hasClass']('nantx') == false && _0x9ca2xc == false) {
        ketquatxvung = _0x9ca2x6;
        $('#vung-taixiu')['show']()['css']({
            'left': '0px',
            'top': '0px'
        })
    } else {
        if (_0x9ca2x6 != false) {
            if ($('#game-taixiu2')['hasClass']('nantx') == true) {
                               var removeNum = document.querySelector("#game-taixiu2 .kq-num .middle");
                                  removeNum.innerHTML = "";
            }

             
            ketquatxvung = false;
            $('.' + _0x9ca2x6['color'] + ' .icon')['addClass']('kq')['delay'](timeclock)['queue'](function () {
                $(this)['removeClass']('kq')['dequeue']()
            });
            $('#game-taixiu .kq-num')['css']({
                'opacity': '1'
            });
            $('#vung-taixiu')['hide']();
            $('#game-taixiu .his div')['first']()['remove']();
            if (_0x9ca2x6['color'] == 'xiu-wrap') {
                var _0x9ca2x3 = '<div class=\"btn-xiu\" onmouseover=\"show_roll_tx($(this))\" data-title=\"#' + _0x9ca2x6['roll'] + ' (' + _0x9ca2x6['xn1'] + '-' + _0x9ca2x6['xn2'] + '-' + _0x9ca2x6['xn3'] + ')' + _0x9ca2x6['xn4'] + '-Xỉu\"></div>'
            } else {
                if (_0x9ca2x6['color'] == 'tai-wrap') {
                    var _0x9ca2x3 = '<div class=\"btn-tai\" onmouseover=\"show_roll_tx($(this))\" data-title=\"#' + _0x9ca2x6['roll'] + ' (' + _0x9ca2x6['xn1'] + '-' + _0x9ca2x6['xn2'] + '-' + _0x9ca2x6['xn3'] + ')' + _0x9ca2x6['xn4'] + '-T\xE0i"></div>'
                }
            };
            $('#game-taixiu .his span')['before'](_0x9ca2x3);
            check_win('tai-xiu', _0x9ca2x6['color'])
        }
    }
}

function chat_taixiu(_0x9ca2x6) {
    if (_0x9ca2x6 != 0) {
        $('#chat-swiper p')['first']()['remove']();
        $('#chat-swiper div')['append']($['parseHTML']('<p>' + _0x9ca2x6 + '</p>'))
    };
    var _0x9ca2x15 = $('#chat-swiper p')['length'],
        _0x9ca2x16 = 0,
        _0x9ca2x17 = 0;
    for (_0x9ca2x17 = 0; _0x9ca2x17 < _0x9ca2x15; _0x9ca2x17++) {
        _0x9ca2x16 += $('#chat-swiper p')['eq'](_0x9ca2x17)['height']()
    };
    var _0x9ca2x18 = '-' + (_0x9ca2x16 - $('#chat-swiper')['height']() + '20');
    $('#chat-swiper')['animate']({
        top: _0x9ca2x18 + 'px'
    }, 200);
    $('#chat-swiper')['css']({
        'top': $('#chat-swiper')['val']() + ''
    })
}
$(document)['ready'](function () {
    $('#game-taixiu')['draggable']({
        start: function () {
            $('.actigame')['removeClass']('actigame');
            $(this)['addClass']('actigame')
        },
        cancel: '.group-button',
        handle: '.move-here'
    });
    $('#vung-taixiu')['draggable']({
        drag: function () {
            var _0x9ca2x19 = $(this)['position']();
            if (_0x9ca2x19['left'] > Math['floor']($(this)['width']() * 0.91)) {
                kq_taixiu(ketquatxvung, true)
            };
            if (_0x9ca2x19['top'] > Math['floor']($(this)['height']() * 0.91)) {
                kq_taixiu(ketquatxvung, true)
            };
            if (_0x9ca2x19['left'] < Math['floor']('-' + $(this)['width']() * 0.91)) {
                kq_taixiu(ketquatxvung, true)
            };
            if (_0x9ca2x19['top'] < Math['floor']('-' + $(this)['height']() * 0.91)) {
                kq_taixiu(ketquatxvung, true)
            }
        }
    });
    check_all(1);
    $('#khung-tx .tai-wrap .input-tai')['on']('click touchstart mousedown touchend', function () {
        if (check_click($(this)) == true) {
            cuoc_tx(1)
        }
    });
    $('#khung-tx .xiu-wrap .input-xiu')['on']('click touchstart mousedown touchend', function () {
        if (check_click($(this)) == true) {
            cuoc_tx(2)
        }
    });
    $('#khung-tx .clogame')['on']('click touchstart mousedown touchend', function () {
        if (check_click($(this)) == true) {
            $('#game-taixiu')['hide']('fade', {}, 500)
        }
    });
    $('#khung-tx .wingame')['on']('click touchstart mousedown touchend', function () {
        if (check_click($(this)) == true) {
            showwinner('tai-xiu')
        }
    });
    $('#khung-tx .hisgame')['on']('click touchstart mousedown touchend', function () {
        $('#khung-lstx')['addClass']('action-show');

        getContent('/ngocrong/cuoc.html')
    });
    $('#khung-tx .guigame')['on']('click touchstart mousedown touchend', function () {
$('#khung-hdtx')['addClass']('action-show');
    });
  
    $('#khung-tx .nangame')['on']('click', function () {
        if (check_click($(this)) == true) {
            nan_taixiu($(this))
        }
    });
    $('#khung-tx .allgame')['on']('click touchstart mousedown touchend', function () {
        getContent('/ngocrong/phien.html')
    });
    $('#khung-tx .group-button .button.blue')['on']('click touchstart mousedown touchend', function () {
        if (check_click($(this)) == true) {
            cuoc_tx(3)
        }
    });
    $('#khung-tx .group-button .button.money2')['on']('click touchstart mousedown touchend', function () {
        if (check_click($(this)) == true) {
            btn_khac_tx($(this))
        }
    });
    $('#khung-tx .group-button .button.money')['on']('click touchstart mousedown touchend', function () {
        if (check_click($(this)) == true) {
            btn_money_tx($(this))
        }
    });
    $('#khung-tx .group-button .btn-tattay')['on']('click touchstart mousedown touchend', function () {
        if (check_click($(this)) == true) {
            tattay_tx()
        }
    });
    $('#khung-tx .group-button .btn-agree')['on']('click touchstart mousedown touchend', function () {
        if (check_click($(this)) == true) {
            dat_tx()
        }
    });
    $('#khung-tx .group-button .btn-cancel')['on']('click touchstart mousedown touchend', function () {
        if (check_click($(this)) == true) {
            cuoc_tx(3)
        }
    })
})
</script>