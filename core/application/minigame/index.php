<?PHP
include_once('../../../core/system/config.php');
?>
<style>
.circle.open .ring {
    top: 0;
    left: 0;
    height: 290px;
    width: 290px;
    opacity: 1;
    z-index: 99990;
    -webkit-transform: scale(1) rotate(0);
    -moz-transform: scale(1) rotate(0);
    -transform: scale(1) rotate(0);
}
.circle .center {
    background: url(../image/minigame/icon-home.png) no-repeat center center;
    bottom: 0;
    color: #fff;
    height: 80px;
    top: 105px;
    left: 105px;
    line-height: 80px;
    position: absolute;
    right: 0;
    text-align: center;
    width: 80px;
    -webkit-transition: all .4s ease-out;
    -moz-transition: all .4s ease-out;
    transition: all .4s ease-out;
    z-index: 99999;
    cursor: pointer;
    animation: shahover 2s linear 0s infinite normal;    
}

.jBox-title, .jBox-content, .jBox-container {
    position: relative;
    word-break: break-word;
    width: inherit !important;
    border-radius: 0 !important;
}
.jBox-title, .jBox-content, .jBox-container {
    position: relative;
    word-break: break-word;
    width: inherit !important;
    border-radius: 0 !important;
}
.circle .ring {
    top: 85px;
    left: 85px;
    height: 86px;
    width: 86px;
    background: url(../image/minigame/bg_minigame.png) no-repeat;
    background-size: 100%;
    border-radius: 50% !important;
    opacity: 0;
    -webkit-transform-origin: 50% 50%;
    -moz-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -webkit-transform: scale(0.1) rotate(
-270deg);
    -moz-transform: scale(0.1) rotate(-270deg);
    -transform: scale(0.1) rotate(-270deg);
    -webkit-transition: all .4s ease-out;
    -moz-transition: all .4s ease-out;
    transition: all .4s ease-out;
}
.ring {
    position: absolute;
}
.circle .menuItem {
    display: block;
    line-height: 40px;
    position: absolute;
    text-align: center;
    background: no-repeat center center;
}
.circle .baucua {
    background: url(../image/ico-bc.png) no-repeat;
    background-size: 100%;
    width: 70px;
    height: 70px;
    top: 205px;
    right: 104px;
    cursor: pointer;
}

.circle .xocdia {
    background: url(../image/ico-xd.png) no-repeat;
    background-size: 100%;
    width: 64px;
    height: 89px;
    top: 61px;
    right: 206px;
}
.circle .taixiu {
    background: url(../image/ico-tx.png) no-repeat;
    background-size: 100%;
    width: 70px;
    height: 73px;
    top: 154px;
    right: 205px;
}
.circle .vongquay {
    background: url(../image/minigame/vongquay1.png) no-repeat;
    background-size: 100%;
    width: 115px;
    height: 66px;
    top: 18px;
    right: 89px;
}
.circle .daquy {
    background: url(../image/minigame/icondaquy.png) no-repeat;
    background-size: 100%;
    width: 72px;
    height: 69px;
    top: 165px;
    right: 18px;
}
.circle .daomo {
    background: url(../image/minigame/daomo1.png) no-repeat;
    background-size: 100%;
    width: 72px;
    height: 69px;
    top: 68px;
    right: 19px;
}

</style>
<div id="khung_minigame" class="khung_minigame_show actigame" style="z-index: 10000;
    left: 167px;
    top: 60px;">
<div class="jBox-container"><div class="jBox-content" style="width: auto; height: auto;">
 <section id="allgame" style="display: block; position: relative; left: -2px; top: -2px;" class="wrap-game circle" data-jbox-content-appended="1">
                    <div id="notify_circle" style="display: block;">
                        <span id="timertx_circle" class="timer" style="display: none;">0</span>
                        <span id="kq_circle" class="kqtx_notify kqtai"></span>
                    </div>
                    <div class="icon ring">
                        <section id="modalgamepoker">
                            <a  href="#" onclick="Load_Game(2,'khung_baucua','baucua')" class="menuItem baucua hvr-pulse-grow "></a>

                        </section>
                        <section id="modalgamesx">
                            <a  href="#"  onclick="Load_Game(10,'khung_id10','chanle')"  title="" class="menuItem xocdia hvr-pulse-grow"></a>
                        </section>
                        <section id="modalgametx">
                            <a href="#" onclick="Load_Game(1,'game-taixiu','ngocrong')" title="" class="menuItem taixiu hvr-pulse-grow"></a>
                        </section>
                
              

                    </div>
                    <a class="center" href="#" onclick="myFunction()"></a>
                    <div class="pulse1"></div>
                </section></div></div>
</div>
<script>
	


function myFunction() {
	
var thinhle = $('#allgame').hasClass('open');

if (thinhle==true) {
            $('.wrap-game')['removeClass']('open');

} else {
            $('.wrap-game')['addClass']('open');

}

}



$( "#khung_minigame" ).draggable({start: function() {
$('.actigame').removeClass('actigame')
$(this).addClass('actigame');
}});

    
</script>