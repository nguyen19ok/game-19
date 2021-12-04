$('#mo').click(function() {  
$('#dong').toggle('fast','linear');  
});
$('#mo2').click(function() {  
$('#dong2').toggle('fast','linear');  
});
var loadcontent ='<img src="/images/loading.gif" witdh="20">';
$(document).ready(function(){
$('#data').html(loadcontent);
$('#data').load('f5-taixiu.php');
var refreshId = setInterval(function(){
$('#data').load('f5-taixiu.php');
$('#data').slideDown('slow');
},1000);
});
var loadcontent ='<img src="/images/loading.gif" witdh="20">';
$(document).ready(function(){
$('#lstx').html(loadcontent);
$('#lstx').load('f5-lstaixiu.php');
var refreshId = setInterval(function(){
$('#lstx').load('f5-lstaixiu.php');
$('#lstx').slideDown('slow');
},3000);
});
var loadcontent ='<img src="/images/loading.gif" witdh="20">';
$(document).ready(function(){
$('#ls_cuoc').html(loadcontent);
$('#ls_cuoc').load('ls_cuoc.php');
var refreshId = setInterval(function(){
$('#ls_cuoc').load('ls_cuoc.php');
$('#ls_cuoc').slideDown('slow');
},1000);
});
var loadcontent ='<img src="/images/loading.gif" witdh="20">';
$(document).ready(function(){
$('#soicau_chitiet').html(loadcontent);
$('#soicau_chitiet').load('soicau_chitiet.php');
var refreshId = setInterval(function(){
$('#soicau_chitiet').load('soicau_chitiet.php');
$('#soicau_chitiet').slideDown('slow');
},1000);
});



var loadcontent ='<img src="/images/loading.gif" witdh="20">';
$(document).ready(function(){
$('#chatbox').html(loadcontent);
$('#chatbox').load('chatbox.php');
var refreshId = setInterval(function(){
$('#chatbox').load('chatbox.php');
$('#chatbox').slideDown('slow');
},1000);
});
$(document).ready(function(){
	$('#btnChatbox').click(function(){
		var ndchat = $('#ndchat').val();
		var url = "chatbox.php";
		var data = {"btnChatbox": "", "ndchat": ndchat};
		$('#chatbox').load(url, data);
		return false;
	});
});
var divValue = document.getElementById("divValue");
type.addEventListener("change", function() {
  selectGame();
});
function selectGame() {
  if (type.value == 1) {
    divValue.innerHTML = '<div class="btn-group" style="width: 100%;"><div class="row" style="width: 100%;"><div class="col-6"><button  type="submit" id="btnCuocChan" name="btnCuocChan" class="btn btn-info form-control rounded font-weight-bold text-uppercase" >Chẵn</button></div><div class="col-6"><button type="submit" id="btnCuocLe" name="btnCuocLe" class="btn btn-warning form-control rounded font-weight-bold text-uppercase text-white" >Lẻ</span></button></div> <div class="col-6 mt-3"><button type="submit" id="btnCuocTai" name="btnCuocTai" class="btn btn-success form-control rounded font-weight-bold text-uppercase"   >Tài </button></div><div class="col-6 mt-3"><button type="submit" id="btnCuocXiu" name="btnCuocXiu" class="btn btn-danger form-control rounded font-weight-bold text-uppercase text-white" >Xỉu </button> </div> </div></div>';
  }  else if (type.value == 2) {
    divValue.innerHTML = '<div class="btn-group" style="width: 100%;"><div class="row" style="width: 100%;"><div class="col-6" style="padding-right : 2px;"><button type="submit" id="btnCuocTaiChan" name="btnCuocTaiChan" class="btn btn-info form-control rounded font-weight-bold text-uppercase">Chẵn - Tài </button></div><div class="col-6 text-right" style="padding-right : 2px;"> <button type="submit" id="btnCuocXiuChan" name="btnCuocXiuChan" class="btn btn-warning form-control rounded font-weight-bold text-uppercase text-white">Chẵn - Xỉu </button></div> <div class="col-6 mt-3 text-right"  style="padding-right : 2px;"><button type="submit" id="btnCuocTaiLe" name="btnCuocTaiLe" class="btn btn-success form-control rounded font-weight-bold text-uppercase text-white">Lẻ - Tài </button></div> <div class="col-6 mt-3  text-right"  style="padding-right : 2px;"><button type="submit" id="btnCuocXiuLe" name="btnCuocXiuLe" class="btn btn-danger form-control rounded font-weight-bold text-uppercase text-white" >Lẻ - Xỉu </button></div></div> </div>';
  }
}
/*
$(document).ready(function(){
	$('#btnCuocTai').click(function(){
		var money = $('#money').val();
		var type=$('select option:selected').val();
        var url = "bang-cuoc.php";
		var data = {"btnCuocTai": "", "money": money, "type": type};
		$('#bangcuoc').load(url, data);
		return false;
	});
});
$(document).ready(function(){
	$('#btnCuocXiu').click(function(){
		var money = $('#money').val();
		var url = "bang-cuoc.php";
		var data = {"btnCuocXiu": "", "money": money};
		$('#bangcuoc').load(url, data);
		return false;
	});
});
$(document).ready(function(){
	$('#btnCuocChan').click(function(){
		var money = $('#money').val();
		var url = "bang-cuoc.php";
		var data = {"btnCuocChan": "", "money": money};
		$('#bangcuoc').load(url, data);
		return false;
	});
});
$(document).ready(function(){
	$('#btnCuocLe').click(function(){
		var money = $('#money').val();
		var url = "bang-cuoc.php";
		var data = {"btnCuocLe": "", "money": money};
		$('#bangcuoc').load(url, data);
		return false;
	});
});
$(document).ready(function(){
	$('#btnCuocTaiLe').click(function(){
		var money = $('#money').val();
		var url = "bang-cuoc.php";
		var data = {"btnCuocTaiLe": "", "money": money};
		$('#bangcuoc').load(url, data);
		return false;
	});
});
$(document).ready(function(){
	$('#btnCuocTaiChan').click(function(){
		var money = $('#money').val();
		var url = "bang-cuoc.php";
		var data = {"btnCuocTaiChan": "", "money": money};
		$('#bangcuoc').load(url, data);
		return false;
	});
});
$(document).ready(function(){
	$('#btnCuocXiuLe').click(function(){
		var money = $('#money').val();
		var url = "bang-cuoc.php";
		var data = {"btnCuocXiuLe": "", "money": money};
		$('#bangcuoc').load(url, data);
		return false;
	});
});
$(document).ready(function(){
	$('#btnCuocXiuChan').click(function(){
		var money = $('#money').val();
		var url = "bang-cuoc.php";
		var data = {"btnCuocXiuChan": "", "money": money};
		$('#bangcuoc').load(url, data);
		return false;
	});
});
*/
setInterval(function(){
 $( "#list-win" ).load( "f5-listwin.php" );
 }, 500);
setInterval(function(){
 $( "#list-nap" ).load( "f5-listnap.php" );
 }, 500);
 function soicau(id)
{
    $.ajax(
        {
            url : '/soicau-load.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}