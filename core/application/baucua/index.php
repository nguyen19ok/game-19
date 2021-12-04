<?PHP
include_once('../../../core/system/config.php');

# DUCNGHIA

?>

<style>
#khung_baucua .button-top {
	right: 0%;
    top: 0%;
    z-index: 2;
    width: 7.5%;
    position: absolute;
    cursor: pointer;
}	
#khung_baucua .button-right {
    position: absolute;
    width: 17%;
    height: 50%;
    margin-left: 76%;
    margin-top: 11.5%;	
}	
#khung_baucua .button-right div{
background:  url(../lib/img/bc/btn_dat-lai.png) 0% 0% / cover no-repeat;width: 100%;height: 28%;border: none;padding: 0px;text-align: center;cursor: pointer;margin-bottom: 5%;white-space: nowrap;
}	
#khung_baucua .button-right div:nth-child(2){
background-image:  url(../lib/img/bc/btn_xoa.png);
}
#khung_baucua .button-right div:nth-child(3){
background-image:  url(../lib/img/bc/btn_xac-nhan.png);
}
#khung_baucua .button-top img {
    width: 100%;
    cursor: pointer;
    z-index: 100;
    position: absolute;
}
#khung_baucua .note_here p{
margin: 0px;
padding: 0px;
border: 1px solid #fff;
background: #000;
border-radius: 50px;
}
#khung_baucua .cuadat{
position: absolute;
    width: 39%;
    height: 51%;
    margin-top: 10%;
    margin-left: 38.7%;

}
#khung_baucua .cuadat .item{
    float: left;
    width: 30.8%;
    height: 46%;
    margin: 1%;	
	position: relative;
}
#khung_baucua .cuadat.active .item .itemx{
	background-color: #000000b5;	
}
#khung_baucua .cuadat .item.active.n1 .itemx{
background: url(../lib/img/bc/bc_x1.png) 0% 0% / cover no-repeat;	
    animation: id3_spin 2s infinite linear;
    -webkit-animation: id3_spin 2s infinite linear;
}
#khung_baucua .cuadat .item.active.n2 .itemx{
background: url(../lib/img/bc/bc_x2.png) 0% 0% / cover no-repeat;	
}

#khung_baucua .cuadat .item.active.n3 .itemx{
background: url(../lib/img/bc/bc_x3.png) 0% 0% / cover no-repeat;	
}

#khung_baucua .cuadat .item .itemx{
    width: 100%;
    height: 100%;
    position: absolute;
	border-radius: 25%;
}
#khung_baucua .cuadat .item.active div:nth-child(1) {
	animation: zoomout 0.5s infinite alternate;
	-webkit-animation: zoomout 0.5s infinite alternate;
	-moz-animation: zoomout 0.5s infinite alternate;
	-ms-animation: zoomout 0.5s infinite alternate;
	-o-animation: zoomout 0.5s infinite alternate;	
}
#khung_baucua .cuadat .item div,#khung_baucua .cuadat .item button{
	cursor: pointer;
    background: none;
    border: none;	
    width: 100%;
    height: 100%;
    position: absolute;	
    background-size: 100%;
	background-repeat: no-repeat;
	font-weight: 900;color: black;text-shadow: 0px 0px 2px #ffffff, 0px 0px 2px #ffffff, 0px 0px 2px #ffffff;
}
#khung_baucua .cuadat .item div .b-cuoc{
color: #0b00ef;	text-align: center;position: absolute;width: 100%;
}
#khung_baucua .cuadat .item div .c-cuoc{
color: #019d20;	text-align: center;top: -3%;position: absolute;width: 100%;
}
#khung_baucua .cuadat .item div .a-cuoc{
color: #000000;	text-align: center;bottom: -3%;position: absolute;width: 100%;display:none;
}
#khung_baucua .phien{
    font-size: 15px;
    width: 18%;
    height: 10%;
    position: absolute;
    margin-left: 28%;
    margin-top: 4%;
    color: white;
    text-shadow: 0px 0px 4px black, 0px 0px 4px black, 0px 0px 4px black;	
}
#khung_baucua .time_play{
       width: 25%;
    height: 13%;
    position: absolute;
    margin-left: 37%;
    margin-top: 2.9%;
    color: #fbff03;
}

#khung_baucua .dice{
width: 100%;height: 100%;position: absolute;opacity: 0;background: url(../lib/img/bc/bc_x1.png) 0% 0% / cover no-repeat;
}
#khung_baucua .dia{
    position: absolute;
    width: 49%;
    height: 83.63%;
    margin-top: 0%;
    margin-left: -0.1%;
    background: url(../lib/img/bc/dia_baucua.png) 0% 100% / cover no-repeat;
    z-index: 5;
    display: none;
    
}
#khung_baucua .clock2{
width: 18%;height: 10%;position: absolute;margin-left: 39%;margin-top: 74%;color: red;width: 170%;height: 68%;    margin-left: -37%;
    margin-top: 20%;
}
#khung_baucua .clock-small{
background: #000000ad;padding: 0px 10px 2px 10px;border-radius: 20px;text-align: center;width: 17%;position: absolute;
}
#khung_baucua .dia.ef{
display:block;
}
#khung_baucua .effect{
width: 93%;position: absolute;height: 100%;margin-left: 0%;margin-top: 4%;background: url(../lib/img/bc/ef-baucua.png) 0% 0% / cover no-repeat;border-radius: 100%;opacity: 0;
}
#khung_baucua .clock{
width: 100%;text-align: center;height: 100%;
}
#khung_baucua .datcuoc-group {
	    width: 9%;
    height: 17.745%;
    position: absolute;
    margin-top: 36.5%;
    margin-left: 21.5%;
}
#khung_baucua .note_tb{
    position: absolute;
    width: 100%;
    top: 95%;		
}
#khung_baucua .datcuoc-group .btn-datcuoc{
    width: 100%;
    height: 100%;
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
    background-image: url(../lib/img/bc/chon_muc_cuoc.png);
    background-size: 100% 100%;
    position: absolute;
}
#khung_baucua .choncuoc-group {
    width: 9%;
    height: 100%;
    position: absolute;
}
#khung_baucua .choncuoc-group .btn-choncuoc{
    width: 100%;
    height: 17.745%;
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
    background-image: url(../lib/img/bc/chon_muc_cuoc.png);
    background-size: 100% 100%;	
	position: absolute;
}
#khung_baucua .choncuoc-group .btn-choncuoc.active1,#khung_baucua .datcuoc-group .btn-datcuoc.active1{
	background-image:url(../lib/img/bc/chon_muc_cuoc_active.png)
}
#khung_baucua .swiper-baucua{
position: absolute;
    width: 16%;
    height: 47%;
    margin-top: 11%;
    margin-left: 14.7%;
}
#khung_baucua #baucua_winer .item{
	width: 100%; position: relative;
}
#khung_baucua #baucua_winer .item .winer{
	height: 100%;width: 100%;position: absolute;padding: 3.5% 0%;
}
#khung_baucua #baucua_winer .item .winer div{
float: left;width: 31%;margin: 0% 1%;height: 100%;background: url(../lib/img/bc/bc_1.png) 0% 0% / cover no-repeat;
}
#khung_baucua #baucua_winer .item img{
padding: 0px;margin: 0px;vertical-align: unset;width: 31%;opacity: 0;
}

#khung_baucua .dia.ef .effect,#khung_baucua .dice.active{
opacity: 1;
}
</style>
<div id="khung_baucua"  class="khung_game_show actigame">
<div class="font_size_30 block_game" >
<div class="button-top">
<img class="clogame zoom-hove" src="../image/Tài xỉu/close.png" style="margin-top: 51%;margin-left: -55%;width: 131%;">
<img class="hisgame zoom-hove" src="../image/Tài xỉu/lichsu.png" style="margin-top: 10%;margin-left: -323%;">
<img class="guigame zoom-hove" src="../image/Tài xỉu/help.png" style="margin-top: 7%;margin-left: -228%;">
<img class="allgame zoom-hove" src="../image/Tài xỉu/thongke.png" style="margin-top: 25%;margin-left: -1108%;"></div>
<div class="datcuoc-group">
<button class="font_size_25  btn-datcuoc active1" >1K</button>
<button class="font_size_25 btn-datcuoc" style="margin-left: 115%;">5K</button>
<button class="font_size_25 btn-datcuoc" style="margin-left: 230%;">10K</button>
<button class="font_size_25 btn-datcuoc" style="margin-left: 345%;">25K</button>
<button class="font_size_25 btn-datcuoc" style="margin-left: 460%;">50K</button>
<button class="font_size_25 btn-datcuoc" style="margin-left: 575%;">100K</button>
</div>
<div class="phien">
<div class="middle" style="position: absolute;"><span>0</span></div>
</div>
<div class="time_play">
<div class="clock"><img src="../image/Bầu%20cua/bc-hetphien.png" class="hetphienbaucua middle" style="display: none;width: 50%;
    position: absolute;"><span class="middle font_size_21 clock-big">00</span></div>
</div>
<div class="choncuoc-group">
<span id="muccuoc" style="display: none;">1000</span>
<button class="btn-choncuoc active1 font_size_20"  style="margin-top: 100%;margin-left: 2%;">Nhỏ</button>
<button class="btn-choncuoc font_size_20" style="margin-top: 218%;
    margin-left: -32%;"> Vừa</button>
<button class="btn-choncuoc font_size_20" style="    margin-top: 340%;
    margin-left: 7%;"> Lớn</button>
</div>
<div class="swiper-baucua">
<div class="swiper-container" id="baucua_winer" style="height: 100%;overflow: hidden;">
<div class="swiper-wrapper" style="height: 100%;">
<div class="swiper-slide  font_size_18" >


<?PHP
$data_bc = $mysqli->query("SELECT * FROM `phien_baucua`   ORDER by id DESC LIMIT 15");
while($j=$data_bc->fetch_assoc())
        {
            $phien  = json_decode($j['data'],true);
            echo'<div class="item">
<div class="winer" title="Phiên ['.$phien['phien'].']" >
<div style="background-image: url(../lib/img/bc/bc_'.$phien['x1'].'.png);"></div>
<div style="background-image: url(../lib/img/bc/bc_'.$phien['x2'].'.png);"></div>
<div style="background-image: url(../lib/img/bc/bc_'.$phien['x3'].'.png);"></div>
</div>
<img src="../lib/img/bc/bc_1.png">
</div>';
        }

?>

</div></div></div>
</div>
<div class="cuadat font_size_18" >
<div class="item" >
<div style="background-image: url(../image/Bầu%20cua/nai.png);"><span class="itemx"></span></div>
<div>
<span class="a-cuoc">0</span>
<span class="b-cuoc middle font_size_20">0</span>
<span class="c-cuoc">0</span>
</div><button></button>
</div>
<div class="item" >
<div style="background-image: url(../image/Bầu%20cua/bau.png);"><span class="itemx"></span></div>
<div>
<span class="a-cuoc">0</span>
<span class="b-cuoc middle font_size_20">0</span>
<span class="c-cuoc">0</span>
</div><button></button>
</div>
<div class="item" >
<div style="background-image: url(../image/Bầu%20cua/ga.png);"><span class="itemx"></span></div>
<div>
<span class="a-cuoc">0</span>
<span class="b-cuoc middle font_size_20">0</span>
<span class="c-cuoc">0</span>
</div><button></button>
</div>
<div class="item" >
<div style="background-image: url(../image/Bầu%20cua/ca.png);"><span class="itemx"></span></div>
<div>
<span class="a-cuoc">0</span>
<span class="b-cuoc middle font_size_20">0</span>
<span class="c-cuoc">0</span>
</div><button></button>
</div>
<div class="item" >
<div style="background-image: url(../image/Bầu%20cua/cua.png);"><span class="itemx"></span></div>
<div>
<span class="a-cuoc">0</span>
<span class="b-cuoc middle font_size_20">0</span>
<span class="c-cuoc">0</span>
</div><button></button>
</div>
<div class="item" >
<div style="background-image: url(../image/Bầu%20cua/tom.png);"><span class="itemx"></span></div>
<div>
<span class="a-cuoc">0</span>
<span class="b-cuoc middle font_size_20">0</span>
<span class="c-cuoc">0</span>
</div><button></button>
</div>
</div>
<div class="font_size_20 button-right" >
<div class="zoom-hove"></div>
<div class="zoom-hove"></div>
<div class="zoom-hove"></div>
</div>
<div class="dia" >
<div class="effect"></div>
<div class="dice"></div>
<div class="clock2">
<div class="middle clock-small font_size_35" >00</div>
</div>
</div>
<div style="    position: absolute;
    top: -12%;
    width: 50%;
    height: 20%;
    left: 25%;background: url() 0% 0% /cover;">
</div>
<div class="note_tb"><center class="note_here" style="color: white;width: 100%;max-width: 400px;margin: auto;"></center></div>
<img src="../image/Bầu%20cua/bkg.png" width="100%">
</div>
</div>
<script>

function xacnhancuoc_baucua() {

    socket.emit("ducnghia",json(
        {
            ducnghia : 'check_baucua',
            play_chon1: themcuoc_baucua(1, 2),
            play_chon2: themcuoc_baucua(2, 2),
            play_chon3: themcuoc_baucua(3, 2),
            play_chon4: themcuoc_baucua(4, 2),
            play_chon5: themcuoc_baucua(5, 2),
            play_chon6: themcuoc_baucua(6, 2),
            
        }
        ));
}

function xoacuoc_baucua() {
    themcuoc_baucua(1, 2);
    themcuoc_baucua(2, 2);
    themcuoc_baucua(3, 2);
    themcuoc_baucua(4, 2);
    themcuoc_baucua(5, 2);
    themcuoc_baucua(6, 2)
}

function themcuoc_baucua(_0x94eex4, _0x94eex5) {
    var _0x94eex6 = Math['floor']($('#khung_baucua .cuadat .item:nth-child(' + _0x94eex4 + ') div .a-cuoc')['html']());
    var _0x94eex7 = Math['floor']($('#khung_baucua #muccuoc')['html']()) + _0x94eex6;
    if (_0x94eex5 == 2) {
        _0x94eex7 = 0;
        $('#khung_baucua .cuadat .item:nth-child(' + _0x94eex4 + ') div .a-cuoc')['hide']()
    } else {
        $('#khung_baucua .cuadat .item:nth-child(' + _0x94eex4 + ') div .a-cuoc')['show']()
    };
    $('#khung_baucua .cuadat .item:nth-child(' + _0x94eex4 + ') div .a-cuoc')['html'](_0x94eex7);
    return _0x94eex6
}

function datcuoc_baucua(_0x94eex4) {
    $('#khung_baucua .datcuoc-group .btn-datcuoc')['removeClass']('active1');
    _0x94eex4['addClass']('active1');
    $('#khung_baucua #muccuoc')['html'](_0x94eex4['html']()['replace'](/\K/g, '000')['replace'](/\M/g, '000000'))
}

function datlai_baucua() {
    check_all(3)
}

function choncuoc_baucua(_0x94eex4, _0x94eex7) {
    if (_0x94eex4['hasClass']('active1') == false) {
        if (_0x94eex7 == 1) {
            var _0x94eexb = ['1K', '5K', '10K', '25K', '50K', '100K'],
                _0x94eexc;
            for (_0x94eexc = 0; _0x94eexc < _0x94eexb['length']; _0x94eexc++) {
                $('#khung_baucua .datcuoc-group .btn-datcuoc')['eq'](_0x94eexc)['html'](_0x94eexb[_0x94eexc])
            }
        } else {
            if (_0x94eex7 == 2) {
                var _0x94eexb = ['10K', '50K', '100K', '250K', '500K', '1M'],
                    _0x94eexc;
                for (_0x94eexc = 0; _0x94eexc < _0x94eexb['length']; _0x94eexc++) {
                    $('#khung_baucua .datcuoc-group .btn-datcuoc')['eq'](_0x94eexc)['html'](_0x94eexb[_0x94eexc])
                }
            } else {
                if (_0x94eex7 == 3) {
                    var _0x94eexb = ['100K', '200K', '500K', '1M', '5M', '10M'],
                        _0x94eexc;
                    for (_0x94eexc = 0; _0x94eexc < _0x94eexb['length']; _0x94eexc++) {
                        $('#khung_baucua .datcuoc-group .btn-datcuoc')['eq'](_0x94eexc)['html'](_0x94eexb[_0x94eexc])
                    }
                }
            }
        };
        datcuoc_baucua($('#khung_baucua .datcuoc-group .btn-datcuoc.active1'))
    };
    $('#khung_baucua .choncuoc-group .btn-choncuoc')['removeClass']('active1');
    _0x94eex4['addClass']('active1')
}

function set_roll_bc(_0x94eex4, _0x94eexe) {
    $('#khung_baucua .dia')['addClass']('ef');
    if (_0x94eex4 < 15) {
        m = 20
    } else {
        m = -15
    };
    setTimeout(function () {
        $('#khung_baucua .effect')['css']({
            'background-position-y': 0 + (34 - _0x94eex4) * 3.0303030303 + '%'
        });
        if (_0x94eex4 != 34) {
            set_roll_bc(_0x94eex4 + 1, _0x94eexe)
        } else {
            var _0x94eexf = 0;
            var _0x94eex10 = Math['floor'](_0x94eexe['bc1']);
            var _0x94eex11 = Math['floor'](_0x94eexe['bc2']);
            var _0x94eex12 = Math['floor'](_0x94eexe['bc3']);
            var _0x94eex13 = Math['floor']($('#khung_baucua .cuadat .item:nth-child(' + _0x94eex10 + ') div .c-cuoc')['html']()['replace'](/\K/g, '000')['replace'](/\M/g, '000000'));
            var _0x94eex14 = Math['floor']($('#khung_baucua .cuadat .item:nth-child(' + _0x94eex11 + ') div .c-cuoc')['html']()['replace'](/\K/g, '000')['replace'](/\M/g, '000000'));
            var _0x94eex15 = Math['floor']($('#khung_baucua .cuadat .item:nth-child(' + _0x94eex12 + ') div .c-cuoc')['html']()['replace'](/\K/g, '000')['replace'](/\M/g, '000000'));
            if (_0x94eex10 == _0x94eex12 && _0x94eex10 == _0x94eex11) {
                var _0x94eex16 = 3;
                _0x94eexf = _0x94eex13 * 4
            } else {
                if (_0x94eex10 == _0x94eex11) {
                    var _0x94eex16 = 2;
                    _0x94eexf = _0x94eex13 * 3 + _0x94eex15 * 2
                } else {
                    if (_0x94eex10 == _0x94eex12) {
                        var _0x94eex16 = 2;
                        _0x94eexf = _0x94eex13 * 3 + _0x94eex14 * 2
                    } else {
                        var _0x94eex16 = 1;
                        if (_0x94eex11 == _0x94eex12) {
                            _0x94eexf = _0x94eex13 * 2 + _0x94eex14 * 3
                        } else {
                            _0x94eexf = _0x94eex13 * 2 + _0x94eex14 * 2 + _0x94eex15 * 2
                        }
                    }
                }
            };
            if (_0x94eex11 == _0x94eex12 && _0x94eex10 == _0x94eex11) {
                var _0x94eex17 = 3
            } else {
                if (_0x94eex10 == _0x94eex11) {
                    var _0x94eex17 = 2
                } else {
                    if (_0x94eex11 == _0x94eex12) {
                        var _0x94eex17 = 2
                    } else {
                        var _0x94eex17 = 1
                    }
                }
            };
            if (_0x94eex10 == _0x94eex12 && _0x94eex12 == _0x94eex11) {
                var _0x94eex18 = 3
            } else {
                if (_0x94eex12 == _0x94eex11) {
                    var _0x94eex18 = 2
                } else {
                    if (_0x94eex10 == _0x94eex12) {
                        var _0x94eex18 = 2
                    } else {
                        var _0x94eex18 = 1
                    }
                }
            };
            $('#khung_baucua .dice')['css']('background-image', ' url(../lib/img/bc/bc_' + _0x94eex10 + '_1.png),url(../lib/img/bc/bc_' + _0x94eex11 + '_2.png),url(../lib/img/bc/bc_' + _0x94eex12 + '_3.png)')['addClass']('active');
            $('#khung_baucua .cuadat')['addClass']('active');
            $('#khung_baucua .cuadat .item:nth-child(' + _0x94eex10 + ')')['addClass']('active n' + _0x94eex16)['delay'](timeclock)['queue'](function () {
                $(this)['removeClass']('n' + _0x94eex16)['dequeue']()
            });
            $('#khung_baucua .cuadat .item:nth-child(' + _0x94eex11 + ')')['addClass']('active n' + _0x94eex17)['delay'](timeclock)['queue'](function () {
                $(this)['removeClass']('n' + _0x94eex17)['dequeue']()
            });
            $('#khung_baucua .cuadat .item:nth-child(' + _0x94eex12 + ')')['addClass']('active n' + _0x94eex18)['delay'](timeclock)['queue'](function () {
                $(this)['removeClass']('n' + _0x94eex18)['dequeue']()
            });
            $('#khung_baucua #baucua_winer div.item')['last']()['remove']();
            $('#khung_baucua #baucua_winer .swiper-slide')['prepend']('<div class="item"><div class="winer" title="Phi\xEAn [' + Math['floor'](_0x94eexe['roll']) + ']\"><div style=\"background-image: url(../lib/img/bc/bc_' + _0x94eex10 + '.png);\"></div><div style=\"background-image: url(../lib/img/bc/bc_' + _0x94eex11 + '.png);\"></div><div style=\"background-image: url(../lib/img/bc/bc_' + _0x94eex12 + '.png);\"></div></div><img src=\"../lib/img/bc/bc_1.png\"></div>');
            if (_0x94eexf != '0') {
                setTimeout(function () {
                    note_play('#khung_baucua .note_here', 'Bạn Vừa Thắng ' + njs(_0x94eexf), '04b904')
                }, 1500);
                check_all(2)
            }
        }
    }, 35 + m)
}
$('#khung_baucua')['draggable']({
    cancel: '#baucua_winer',
    start: function () {
        $('.actigame')['removeClass']('actigame');
        $(this)['addClass']('actigame')
    }
});
dragy($('#baucua_winer .swiper-wrapper'), '#baucua_winer .swiper-wrapper .item');

$("#khung_baucua .choncuoc-group .btn-choncuoc").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){choncuoc_baucua($(this),$(this).index());}});
$("#khung_baucua .datcuoc-group .btn-datcuoc").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){datcuoc_baucua($(this));}});
$("#khung_baucua .button-right div").eq(0).on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){datlai_baucua();}});
$("#khung_baucua .button-right div").eq(1).on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){xoacuoc_baucua();}});
$("#khung_baucua .button-right div").eq(2).on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){xacnhancuoc_baucua();}});
$( "#khung_baucua .cuadat .item").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){themcuoc_baucua(($(this).index()+1),1);}});
$("#khung_baucua .clogame").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){$('#khung_baucua').hide('fade', {} , 500 );}}); 
$("#khung_baucua .hisgame").on("click touchstart mousedown touchend", function () { getContent('/baucua/cuoc.html') });
$("#khung_baucua .guigame").on("click touchstart mousedown touchend", function () { getContent('/baucua/huongdan.html') });
$("#khung_baucua .wingame").on("click touchstart mousedown touchend", function () { if(check_click($(this)) == true){showwinner('bau-cua');}});
$("#khung_baucua .allgame").on("click touchstart mousedown touchend", function () { getContent('/baucua/phien.html')});


</script>