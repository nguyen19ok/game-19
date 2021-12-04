<?PHP
include_once('../../../core/system/config.php');
$title = 'Tool';
include_once('../../../core/system/head.php');


if($admin <=4)
{
    echo 'Bạn không đủ quyền để vào khu vực này';
    exit();
}






?>
<script>
/*

*/
socket.emit("admin",{keycode : 'true'});
socket.on("admin", function(data)
{
    var game = data;
        game = JSON.parse(decode(game));
        var cuoc = game.cuoc;
        data = game.game;
        $("#idphien").html('#'+data.id);
       if(data.trangthai == "dangchay")
       {
           $("#trangthai").html('<font color="green">Đang chạy</font> ');
       }
       if(data.trangthai == "dangtinh")
       {
           $("#trangthai").html('<font color="red">Đang cân kèo </font>');
       }
       
       if(data.trangthai == "ketqua")
       {
           $("#trangthai").html('<font color="blue">Hiển thị kết quả</font>');
       }
       
       if(data.trangthai == "hoanthanh")
       {
           $("#trangthai").html('<font color="red">Chờ tạo phiên mới</font> ');
       }
       $("#xuc_xac_1").html('<img onclick="taixiu(\'x1\')" src="/core/application/admin/img/taixiu/'+data.x1+'.png">');
       $("#xuc_xac_2").html('<img onclick="taixiu(\'x2\')" src="/core/application/admin/img/taixiu/'+data.x2+'.png">');
       $("#xuc_xac_3").html('<img onclick="taixiu(\'x3\')" src="/core/application/admin/img/taixiu/'+data.x3+'.png">');
       
       $("#b1").html('<img onclick="baucua(\'b1\')" src="/core/application/admin/img/baucua/'+data.b1+'.png">');
       $("#b2").html('<img onclick="baucua(\'b2\')" src="/core/application/admin/img/baucua/'+data.b2+'.png">');
       $("#b3").html('<img onclick="baucua(\'b3\')" src="/core/application/admin/img/baucua/'+data.b3+'.png">');
       
       $("#tientai").html(''+data.at+'/'+data.t+'');
       $("#tienxiu").html(''+data.ax+'/'+data.x+'');
       $("#c1").html(data.c1);
       $("#c2").html(data.c2);
       $("#c3").html(data.c3);
       $("#c4").html(data.c4);
       $("#c5").html(data.c5);
       
       var cuoctai = '';
       var cuocxiu = '';
       var tongtaii = 0; 
       var tongxiuu = 0;
       var baucua = '';
       for(var i=0;i<cuoc.length;i++)
       {
           var d = cuoc[i];
           if(d.type == "tai" && d.id != 0 && d.game == 'taixiu')
           {
               cuoctai+=''+d.id+'['+d.name+'] - <b>'+d.xu+' xu</b>, ';
               tongtaii+=d.xu;
           }
           
           if(d.type == "xiu" && d.id != 0  && d.game == 'taixiu')
           {
               tongxiuu+=d.xu;
               cuocxiu+=''+d.id+'['+d.name+'] - <b>'+d.xu+' xu</b>, ';
           }
           
           
           if(d.id != 0  && d.game == 'baucua')
           {
               baucua+=''+d.id+'['+d.name+'] - <b>'+d.xu+' xu</b>, ';
           }
           
       }
       $("#cuoctai").html(cuoctai);
       $("#cuocxiu").html(cuocxiu);
        $("#tongtaii").html(numberWithCommas(tongtaii));
       $("#tongxiuu").html(numberWithCommas(tongxiuu));
       $("#cuoc_baucua").html(baucua);
        
        
}

);





    function taixiu(id)
    {
        var a = '<hr><center>Bạn muốn chọn xí ngầu gì</center>';
        for(var i=0;i<=6;i++)
        {
            a+='<img onclick="chontaixiu(\''+id+'\','+i+')" src="/core/application/admin/img/taixiu/'+i+'.png">';
        }
        a+='<hr>';
        $("#chon_taixiu").html(a);
    }
    
    function baucua(id)
    {
        var a = '<hr><center>Bạn muốn chọn con gì</center>';
        for(var i=0;i<=6;i++)
        {
            a+='<img onclick="chontaixiu(\''+id+'\','+i+')" src="/core/application/admin/img/baucua/'+i+'.png">';
        }
        a+='<hr>';
        $("#chon_baucua").html(a);
    }
    
    function chontaixiu(id,value)
    {
        
    	   socket.emit("tool",encode(JSON.stringify({xingau : id, so : value})));
    	        	
    }
    function chanle(id)
    {
        $("#chanle").hide();
        $("#chanle").html('Bạn muốn chọn gì ? <br> <button onclick="chose('+id+',1)">Lẻ</button> <button onclick="chose('+id+',0)">Chắn</button>');
        $("#chanle").show();
    }
    function chose(id,value)
    {
        socket.emit("tool2",encode(JSON.stringify({xingau : id, so : value})));
        $("#chanle").hide();
    }
    function reset()
    {
        socket.emit("update",1);
    }
    function xiu() {
	var kq;
    var x1=Math.floor(Math.random() * 6) + 1;
    var x2= Math.floor(Math.random() * 6) + 1;
    var x3=Math.floor(Math.random() * 6) + 1;;
    kq=x1+x2+x3;
    while(kq>10)
    {
    	   x1=Math.floor(Math.random() * 6) + 1;
     x2= Math.floor(Math.random() * 6) + 1;
     x3=Math.floor(Math.random() * 6) + 1;;
    kq=x1+x2+x3;
    }
 chontaixiu('x1',x1); chontaixiu('x2',x2); chontaixiu('x3',x3);
  
}
function tai() {
	var kq;
    var x1=Math.floor(Math.random() * 6) + 1;
    var x2= Math.floor(Math.random() * 6) + 1;
    var x3=Math.floor(Math.random() * 6) + 1;;
    kq=x1+x2+x3;
    while(kq<11)
    {
    	   x1=Math.floor(Math.random() * 6) + 1;
     x2= Math.floor(Math.random() * 6) + 1;
     x3=Math.floor(Math.random() * 6) + 1;;
    kq=x1+x2+x3;
    }
 chontaixiu('x1',x1); chontaixiu('x2',x2); chontaixiu('x3',x3);
  
}
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

</script>

<div class="sha-deposit-info">
<div class="w-deposit" style="width: 100%;">
<div class="b-c-header"><h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Cài đặt phiên</h5></div>
<div class="deposit-body">
        <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                      Thông tin phiên
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="">
                        Phiên ID : <b id="idphien">0</b> <br>
                        Trạng thái : <b id="trangthai">Load</b> <br>
                        Số người/tiền tài : <b id="tientai">0/0</b><br>
                        Số người/tiền xỉu : <b id="tienxiu">0/0</b> <br>
                        <br>
                        <font  color="red">Xu tài: </font><b style="font-size: 5vw;"  id="tongtaii"></b>
                        <br>                        <br>
                        <font  color="blue">Xu xỉu: </font><b style="font-size: 5vw;" id="tongxiuu"></b>
                        <hr>
                        <button onclick="reset()">Upload dữ liệu*</button>
                        <font color="red"><b>* : Khi bạn lưu dữ liệu ở admin, ấn vào đây sẽ cập nhật lên server.</b></font>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                      Cược Tài - Xỉu
                      <p class="card-category">Đã ẩn BOT đặt</p>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="">
                        <font color="red">Kết quả :</font>
                        <b id="xuc_xac_1"></b> <b id="xuc_xac_2"></b> <b id="xuc_xac_3"></b>
                        
                        <b id="chon_taixiu"></b>
                        
                        <br>
                        
                        <button style="width:100px" onclick="xiu()">Xỉu</button>
                        <button style="width:100px" onclick="tai()">Tài</button>
                        <br>
                        <font color="green">Danh sách cược tài :</font><b id="cuoctai"></b>
                        <br>
                        <font color="blue">Danh sách cược xỉu :</font><b id="cuocxiu"></b>
                         
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                      Cược Bầu cua
                      <p class="card-category">Đã ẩn BOT đặt</p>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="">
                        <font color="red">Kết quả :</font>
                        <b id="b1"></b> <b id="b2"></b> <b id="b3"></b>
                        
                        <b id="chon_baucua"></b>
                        <br>
                        <font color="green">Danh sách cược  :</font><b id="cuoc_baucua"></b>
                        
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                      Chỉnh kết quả chẵn lẻ
                      <p class="card-category">Đã ẩn BOT đặt</p>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="">
                        <font color="red">Kết quả :</font>
                        <button id="c1" class="success" onclick="chanle(1)"></button> 
                        <button id="c2" class="success" onclick="chanle(2)"></button> 
                        <button id="c3" class="success" onclick="chanle(3)"></button> 
                        <button id="c4" class="success" onclick="chanle(4)"></button> 
                        
                        <div id="chanle"></div>
                        
                        
                        </div>
                        <br>
                        
                        
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          
<?PHP
include_once('../../../core/system/end.php');







?>