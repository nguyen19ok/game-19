<?PHP
include_once('core/system/config.php');
include_once('core/system/head.php');


?>



 <!--Form thong bao-->


<div class="banner">
<div class="menu-game--btn">
<a href="/true/napatm.html"><span class="nav-deposit"></span></a>
<a href="/true/rutvang.html"><span class="nav-withdraw"></span></a>
</div>


<div class="menu-game--item">
<a href="#" onclick="Load_Game(1,'game-taixiu','ngocrong')">
<img src="https://i.imgur.com/16QuTFY.jpg" alt="banner">
</a>
<a href="#" onclick="Load_Game(10,'khung_id10','chanle')">
<img src="https://i.imgur.com/BLfXLUD.jpg" alt="banner">
</a>
<a href="#" onclick="Load_Game(2,'khung_baucua','baucua')">
<img src="https://i.imgur.com/fsYuNvs.jpg" alt="banner">
</a>
</div>
</div>

     


<div class="sha-bet-chat">
<div class="w-bet">
<div class="b-c-header">
<h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Thông Báo</h5>
</div>
<div class="bet-body">
<center><?=$system->data->thongbao?></center>
</div>
</div>

<div class="w-chat"><div class="b-c-header"><div class="chat-title"></div></div>

<div class="b-c-content">
    <div class="text-danger text-center" id="log_chat"></div>

 <div class="w-form"><form id="form_chat">
    
<input type="text" id="name_chat" name="name_chat" placeholder="Nhập nội dung chat" autocomplete="off" >
                <span><button onclick="chat()" type="submit"></button></span>
             



</form></div>   
<span id="lethinh123" ></span>

    <div class="items" id="chat">

 
</div>

    
    
    
</div>
</div>

</div>
                    
                    
                    
                    
                    
              
                    


<div class="sha-top-day">
<div class="top-day-title"></div>
<div class="top-day-table">
<div class="title-table">
<div class="item item-top"></div>
<div class="item item-name"></div>
<div class="item item-amount"></div>
</div>
<div class="content-table">
<?php
            $i = 1;
            $sql_top = $mysqli->query("SELECT * FROM `nguoichoi` WHERE xu > '0' AND `admin` = '0' ORDER by `xu` DESC LIMIT 10");
         
                    
while($row = $sql_top->fetch_assoc())
{
                    $check_user = json_decode($row['thongtin'],true);

?>
    
<div class="table-row">
<div class="item top<?=$i?>">

<span class="top-cup"></span>
<span class="top-title"></span>
</div>
<div class="item"><?=$check_user['ten']?></div>
<div class="item"><?=format_cash($row['xu'])?></div>
</div>
<?php
$i++;
}
?>


</div></div></div>
<style>


    .w-dragon .sha-top-day .top-day-title {
    width: 29.5rem;
        
    }
    .w-dragon .sha-top-day .top-day-table .title-table .item-amount {
    background-position: -91.5rem -38rem;
    width: 6rem;
}
.w-dragon .sha-top-day .top-day-table .content-table .table-row .item {
    flex-basis: 35%;
    text-align: center;
    color: #000;
    font-family: nexa_bold;
}
.w-dragon .sha-top-day .top-day-table .content-table .table-row .item .top-title {

    margin-right: 16.3rem;
}
@media (max-width: 680px)
.w-dragon .sha-top-day .top-day-table .content-table .table-row .item.top1,.w-dragon .sha-top-day .top-day-table .content-table .table-row .item.top2, .w-dragon .sha-top-day .top-day-table .content-table .table-row .item.top3  {
    flex-basis: 34%;
}
.w-dragon .sha-top-day .top-day-table .content-table .table-row .item.top1 {
    height: 5.5rem;
    background-image: url(/static/media/frame_image.b1480b2b.png);
    background-size: 192rem 409.2rem;
    background-repeat: no-repeat;
    background-position: -171.3rem -29.8rem;
    
}
.w-dragon .sha-top-day .top-day-table .content-table .table-row .item.top2 {
    height: 5.5rem;
    background-image: url(/static/media/frame_image.b1480b2b.png);
    background-size: 192rem 409.2rem;
    background-repeat: no-repeat;
    background-position: -171.3rem -35.8rem;
    
}
.w-dragon .sha-top-day .top-day-table .content-table .table-row .item.top3 {
    height: 5.5rem;
    background-image: url(/static/media/frame_image.b1480b2b.png);
    background-size: 192rem 409.2rem;
    background-repeat: no-repeat;
    background-position: -171.3rem -41.8rem;
    
}
</style>                    
                    
                    
                    
                    
              
                    
                    
                    
                    
                    
                    
                    
                    
                    
            
                    
                    
                    
                    
                
   
                  
                    

                    
                    
                    
                    
                    
                    
                    
            
                    
                    
                    
                    
                
   
<hr>
<script>
  
    
 var loadcontent ='<b><font style=font-size: 8pt color=#f22 face=Verdana>Đang tải dữ liệu…</font></b>';
$(document).ready(function(){
$('#chat').html(loadcontent,3000);
$('#chat').load('/guest/xuli.html?f5-chat');
var refreshId=setInterval(function(){
$('#chat').load('/guest/xuli.html?f5-chat');
$('#chat').slideDown('slow');
},1000);

});
 
 
 


 function chat() {
    $['ajax']({
        url: '/guest/xuli.html?chat',
        type: 'POST',
        data: $('#form_chat')['find']('select, textarea, input')['serialize'](),
        success: function (log) {
            if(log.code <=0)
            {
                $("#log_chat").html(log.text);
            }
                      $('#name_chat')['val']('');

            
            
            
        }
    })
}

   
    
    
    
</script>   
<style>
    .w-dragon .banner { 
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 0;
    border-radius: 20px;
    background-color: white;
    flex-direction: column;
        
    }
        .w-dragon .banner .nav-deposit { 
    display: inline-block;
    background-image: url(/static/media/frame_image.b1480b2b.png);
    background-size: 192rem 409.2rem;
    width: 20.5rem;
    height: 5rem;
    background-position: -0.5rem -20rem;
    background-color: black;
    background-repeat: no-repeat;
    margin-right: 20px;
        border-radius: 5px;
        
    }
    .w-dragon .banner .nav-withdraw { 
    background-position: -24.5rem -19.9rem;
    display: inline-block;
    background-image: url(/static/media/frame_image.b1480b2b.png);
    background-size: 192rem 409.2rem;
    width: 20.5rem;
    height: 5rem;
    background-repeat: no-repeat;
    background-color: black;
       border-radius: 5px;

        
    }


    .w-dragon .banner .menu-game--item { 

    max-width: 300px;
    align-items: center;
    justify-content: center;
    display: flex;
  
        
    }
    
        .w-dragon .banner .menu-game--item a:not(:first-child) { 
   
    margin-left: 20px;
        
    }
        .w-dragon .banner .menu-game--btn { 
            justify-content: center;
    display: flex;
    align-items: center;
    margin-bottom: 20px;
  
        
    }
    
</style>




<?PHP
include_once('core/system/end.php');
?>