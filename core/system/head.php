<?PHP

$title= isset($title) ? $title : $system->data->tieude;
if(!isset($_POST['load']))
{
?>
<!DOCTYPE html>
<html lang="en" translate="no" style="font-size: 5.93377px;">  
<head>

        
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="<?=$system->data->description?>">
            <meta name="author" content="<?=$system->data->author?>">
            <link rel="icon" type="image/png" sizes="16x16" href="/lib2/icoc.png">
            <title><?=$title?></title>
    		<script src="/dist/js/jquery.js"></script>
    		<link href="/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
            <link href="/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
            <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
            <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="/dist/js/app.min.js?ducnghia3"></script>
            <script src="/dist/js/app.init.js"></script>
            <script src="/dist/js/app-style-switcher.js"></script>
            <script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
            <script src="/assets/extra-libs/sparkline/sparkline.js"></script>
            <script src="/dist/js/waves.js"></script>
            <script src="/dist/js/sidebarmenu.js"></script>      
            <script src="/assets/libs/chartist/dist/chartist.min.js"></script>
            <script src="/assets/extra-libs/c3/d3.min.js"></script>
            <script src="/assets/extra-libs/c3/c3.min.js"></script>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
            <script src="/lib/js/jquery-ui.js?v=1.0.0"></script>
            <script src="/lib/js/jquery.ui.touch-punch.min.js?v=1"></script>
            <script src="/lib/js/socket.io.js"></script>
            <link rel="stylesheet" href="/lib/css/to.css?v1">
            <script src="/assets/frontend/home/sweetalert.min.js"></script>
            <link rel="stylesheet" href="/assets/frontend/home/sweetalert.css">                               
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
            <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="7e0da9fa554703ac4b0a9c09-|49" defer=""></script>    
            <link rel="stylesheet" href="/lib2/css/font_size2.css?v1">
            <link rel="stylesheet" href="/lib2/css/swiper4.min.css?v=1x">
            <link rel="stylesheet" href="/lib2/css/all2-22-2020.css?v=1">        
            <script src="/lib2/js/notice.js?v=0.1.0"></script>
            <script src="/lib2/js/notice.js?v=0.1.0"></script>        
            <script src="/lib2/js/jquery-ui.js?v=1.0.0"></script>
            <script src="/lib2/js/jquery.ui.touch-punch.min.js?v=1"></script>           
            <script>
                var socket = io("<?=$system->data->socket?>");
                socket.emit("login",<?=$id >=1 ? $id : -1?>);
                var ketquatxvung = false,timeclock = 0,khunggame = [],hugame = [],gid = [],kq_xocdia=null;
            </script>
            <script src="/lib/js/function.js?v=<?=time()?>"></script>
            <link rel="stylesheet" href="/static/css/style.css" />
            <script src="/static/js/main.js"></script>
            <script src="/static/js/home.js"></script>
            <script src="/assets/libs/chart.js/dist/Chart.min.js"></script>
            <script src="/assets/libs/echarts/dist/echarts-en.min.js"></script>
            <script src="/assets/libs/raphael/raphael.min.js"></script>
            <script src="/assets/libs/morris.js/morris.min.js"></script>  
            <script>!function(e){function r(r){for(var n,a,c=r[0],i=r[1],f=r[2],s=0,p=[];s<c.length;s++)a=c[s],Object.prototype.hasOwnProperty.call(o,a)&&o[a]&&p.push(o[a][0]),o[a]=0;for(n in i)Object.prototype.hasOwnProperty.call(i,n)&&(e[n]=i[n]);for(l&&l(r);p.length;)p.shift()();return u.push.apply(u,f||[]),t()}function t(){for(var e,r=0;r<u.length;r++){for(var t=u[r],n=!0,c=1;c<t.length;c++){var i=t[c];0!==o[i]&&(n=!1)}n&&(u.splice(r--,1),e=a(a.s=t[0]))}return e}var n={},o={2:0},u=[];function a(r){if(n[r])return n[r].exports;var t=n[r]={i:r,l:!1,exports:{}};return e[r].call(t.exports,t,t.exports,a),t.l=!0,t.exports}a.e=function(e){var r=[],t=o[e];if(0!==t)if(t)r.push(t[2]);else{var n=new Promise((function(r,n){t=o[e]=[r,n]}));r.push(t[2]=n);var u,c=document.createElement("script");c.charset="utf-8",c.timeout=120,a.nc&&c.setAttribute("nonce",a.nc),c.src=function(e){return a.p+"static/js/"+({}[e]||e)+"."+{0:"4f333776",4:"242a3f7a",5:"7329ef6f",6:"fcaaa283",7:"bae77c3c",8:"c13304c8",9:"7dcc29f8",10:"9b554edf",11:"b7141542"}[e]+".chunk.js"}(e);var i=new Error;u=function(r){c.onerror=c.onload=null,clearTimeout(f);var t=o[e];if(0!==t){if(t){var n=r&&("load"===r.type?"missing":r.type),u=r&&r.target&&r.target.src;i.message="Loading chunk "+e+" failed.\n("+n+": "+u+")",i.name="ChunkLoadError",i.type=n,i.request=u,t[1](i)}o[e]=void 0}};var f=setTimeout((function(){u({type:"timeout",target:c})}),12e4);c.onerror=c.onload=u,document.head.appendChild(c)}return Promise.all(r)},a.m=e,a.c=n,a.d=function(e,r,t){a.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,r){if(1&r&&(e=a(e)),8&r)return e;if(4&r&&"object"==typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(a.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var n in e)a.d(t,n,function(r){return e[r]}.bind(null,n));return t},a.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(r,"a",r),r},a.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},a.p="/",a.oe=function(e){throw console.error(e),e};var c=this["webpackJsonpnroz-client"]=this["webpackJsonpnroz-client"]||[],i=c.push.bind(c);c.push=r,c=c.slice();for(var f=0;f<c.length;f++)r(c[f]);var l=i;t()}([])</script>                
	   
           
</head>
 
			<body>
			<div class="main-game" id="cvs_ga"></div>
			<body class="fixed-enable">
			<div id="splash-screen" class="splash-screen" style="display: none;">
			<div class="loading-dot">
			<i class="fas fa-spinner fa-spin"></i>
			</div>
			</div>        
			<section class="w-dragon">        
			<header class="header-fixed">
			<div class="container-header">
			<div class="sha-row">
			<div class="deposit-withdraw">
			<a onclick="checkmenubar()" href="#"><div class="menu-bar"></div></a>
			<div class="w-logo"><a href="/index.php"><div style="
   
    font-family: nexa_bold;
    color: #ffe608;

    display: block;
  
    font-size: 40px;

">V99</div></a></div>
			<a href="/true/napatm.html"><div class="w-d-w deposit hidden-xs"></div></a>
			<a href="/true/rutvang.html"><div class="w-d-w withdraw hidden-xs"></div></a>
			<a href="/profile/index.html"><div class="w-d-w bt-more hidden-xs"></div></a>
			</div>
			<?php if ($datauser->id<=0) { ?>
			<div class="login-button"><div class="login-log" id="open-login"></div></div>
				<div class="login-button"><div class="login-reg" id="open-regis" ></div></div>
				<style>

				</style>
			<?php } else { ?>
			<div class="login">
			<div class="icon"></div>
			<div class="info">
			<a href="/profile/index.html"><h3>Hi, <?=$datauser->taikhoan?></h3></a>
			<a href="/profile/index.html">
			<div class="amount-money">
			<?php
			echo'<p class="mymoney">'.number_format($u->xu).'</p>';
			?>
			</div>
			</a>
			</div>
			<?php } ?>
			</div>
			</div>
			</div>
			<div class="header-nav-menu" id="checkmnb">
			<ul>
			<li><a href="/true/napatm.html"><span class="nav-deposit"></span></a></li>
			<li><a href="/true/rutvang.html"><span class="nav-withdraw"></span></a></li>
			<li><a href="/profile/index.html"><span class="nav-more"></span></a></li>
			</ul>
			</div>
			</header>
			<?php 
			if ($datauser->id<=0){
			?>
			<!--Form login--> 
			<div class="dragon-login" id="khung-login">
			<div class="overlay"></div>
			<div class="login-content">
			<div class="login-header">
			<div class="login-title"></div>
			<div class="login-close" id="end-login"></div>
			</div>
			<div class="login-body">
			<div class="text-danger text-center" id="log_login"></div>
			<form action="#" id="form_login">
			<div class="login-form">
			<div class="text-danger text-center pb-4"></div>
			<input type="text" class="form-control" name="taikhoan" placeholder="Tên đăng nhập" autocomplete="off" value="">
			<div class="text-danger"></div>
			<input type="password" class="form-control" name="matkhau" placeholder="Mật khẩu" autocomplete="off" value="">
			<div class="text-danger"></div>
			</div>
			<div class="login-option">
			<a id="open-rspass">Quên mật khẩu?</a>
			</div>
			<div class="login-button">
		
			<button type="submit" onclick="login()" class="button-lgr button-login" style="opacity: 1;"></button>
			</div>
			</form>
			</div>
			</div>
			</div>   
			<script>
			$("#open-login").on("click touchstart mousedown touchend", function () {
			if(check_click($(this)) == true){
			$('#khung-login')['addClass']('action-show');
			}
			}); 
			$("#end-login").on("click touchstart mousedown touchend", function () {
			 if(check_click($(this)) == true){
			$('#khung-login')['removeClass']('action-show');
			}
			});
			</script>        
			<!--Form register-->   
			<div class="dragon-regis" id="khung-regis">
			<div class="overlay"></div>
			<div class="regis-content">
			<div class="regis-header">
			<div class="regis-title"></div>
			<div class="regis-close" id="end-regis"></div>
			</div>
			<div class="regis-body">
			<div class="text-danger text-center" id="log_reg"></div>
			<form action="#" id="form_reg">
			<div class="regis-form">
			<input type="text" class="form-control" name="taikhoan" placeholder="Tên đăng nhập" autocomplete="off" value="">
			<input type="text" class="form-control" name="name" placeholder="Tên hiển thị" autocomplete="off" value="">

			<input type="text" class="form-control" name="email" placeholder="Địa chỉ Email (dùng để khôi phục mật khẩu)" autocomplete="off" value="">

			<input type="password" class="form-control" name="matkhau" placeholder="Mật khẩu" autocomplete="off" value="">
			<input type="password" class="form-control" name="matkhau2" placeholder="Nhập lại mật khẩu" autocomplete="off" value="">

			</div>
			<div class="regis-option"><p>Bạn đã có tài khoản? <span id="open-login">Đăng nhập</span></p><span id="open-rspass">Quên mật khẩu?</span></div>
			<div class="regis-button"><button type="submit" class="button-register" onclick="register()" style="opacity: 1;"></button></div>
			</form>
			</div>
			</div>
			</div>
			<script>
			$(".login-button .login-reg").on("click touchstart mousedown touchend", function () {
			if(check_click($(this)) == true){
			$('#khung-regis')['addClass']('action-show');
			}
			}); 
			$("#end-regis").on("click touchstart mousedown touchend", function () {
			 if(check_click($(this)) == true){
			$('#khung-regis')['removeClass']('action-show');
			}
			});
			</script>

			<!--Form resetpass-->
			<div class="dragon-rspass" id="khung-rspass">
			<div class="overlay"></div>
			<div class="rspass-content">
			<div class="rspass-header">
			<div class="rspass-title"></div>
			<div class="rspass-close" id="end-rspass"></div>
			</div>
			<div class="rspass-body">
			<div class="text-danger text-center" id="log_rspass"></div>
			<form action="#" id="form_rspass">
			<div class="rspass-form">
			<div class="text-danger text-center pb-4"></div>
			<input type="text" class="form-control" name="taikhoan" placeholder="Tên đăng nhập" autocomplete="off" value="">
			<div class="text-danger"></div>
			<input type="text" class="form-control" name="email" placeholder="Email" autocomplete="off" value="">
			<div class="text-danger"></div>
			</div>

			<div class="rspass-button">
			<button type="button" onclick="resetpass()" class="button-lgr button-rspass" style="opacity: 1;"></button>
			</div>
			</form>
			</div>
			</div>
			</div> 
			<script>
			$("#open-rspass").on("click touchstart mousedown touchend", function () {
			if(check_click($(this)) == true){
			$('#khung-rspass')['addClass']('action-show');
			}
			}); 
			$("#end-rspass").on("click touchstart mousedown touchend", function () {
			 if(check_click($(this)) == true){
			$('#khung-rspass')['removeClass']('action-show');
			}
			});
			</script>
									<script>
			$("#open-regis").on("click touchstart mousedown touchend", function () {
			if(check_click($(this)) == true){
			$('#khung-regis')['addClass']('action-show');
			}
			}); 
			$("#end-regis").on("click touchstart mousedown touchend", function () {
			 if(check_click($(this)) == true){
			$('#khung-regis')['removeClass']('action-show');
			}
			});
			</script>
			<?php 
			}
			?>
			<!-- Huong dan tai xiu-->
			<div class="dragon-guide" id="khung-hdtx" style="opacity: 1;">
			<div class="overlay"></div>
			<div id="body-hdtx" class="khung_game_show actigame" style="z-index: 10000;top: 200px;">
			<div class="guide-form">
			<div class="guide-header">
			<div class="guild-title"></div>
			<div class="guild-close" id="end-hdtx"></div></div>
			<div class="guild-content">
			<p>Mini game tài xỉu số 1 Ngọc Rồng Online<br>
			<?=$system->data->huongdan_ngocrong?><br>
			</p>
			</div></div></div></div>
			<script>
			$( "#body-hdtx" ).draggable({start: function() {
			$('.actigame').removeClass('actigame')
			$(this).addClass('actigame');
			}});
			 $("#end-hdtx").on("click touchstart mousedown touchend", function () {
			 if(check_click($(this)) == true){
			$('#khung-hdtx')['removeClass']('action-show');
			}
			});
			</script>
			</aside>
			<section role="main" class="dragon-content" >
			<div class="container"><div id="ducnghia">   
			<?PHP } ?>
			<?PHP
			if(isset($_POST['load']))
			{
				echo '<script>$(\'title\').html(\''.$title.'\');</script>';
			}