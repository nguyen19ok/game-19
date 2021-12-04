<?PHP
include_once('../../../core/system/config.php');

$title = 'Nạp thẻ';
?>

<?php

include_once('../../../core/system/head.php');




if($id <=0)
{
    echo thongbao('Vui lòng đăng nhập','loi');
     echo '<script>window.location.href="/guest/dangnhap.html"</script>';
    exit();
}

if(isset($_POST['telco']))
{
        $thucnhandoithe = $_POST['telco'] * $system->data->tcard/100;




    if ($_POST['txtcaptcha'] != $_SESSION['captcha']) 
    {
echo thongbao('Captcha không chính xác','loi');

        echo "<script> $('#imgcap').attr('src', 'captcha.html') </script>";
    }
    else{

    
    
    
    
    
    
    
    
    
    //////////////////////
    
  $seri =   $_POST['serial'];
  $mathe =   $_POST['code'];
  $loaithe =   $_POST['telco'];
  $menhgia =   $_POST['amount'];

  
    
        if (empty($_POST['telco']) || empty($_POST['amount']) || empty($_POST['serial']) || empty($_POST['code'])) {
        
echo thongbao('Vui lòng nhập đủ thông tin','loi');
    } else {
        
         $text     = $mysqli->query("SELECT * FROM `napthe` WHERE `mathe` = '".$_POST['code']."' AND `seri` = '".$_POST['serial']."'")->fetch_assoc();
        if($text!=null)
        {
          echo thongbao('Thẻ đã tồn tại trong hệ thống','loi');
        }
        else
        {
     $code = random(7);
            $site_api = ''.$system->data->apikey.'';
            $site_callback = ''.$system->data->callback.'';
            
                    $json = json_decode(curl_get('https://card24h.com/api/card-auto.php?auto=true&type='.$_POST['telco'].'&menhgia='.$_POST['amount'].'&seri='.$_POST['serial'].'&pin='.$_POST['code'].'&APIKey='.$site_api.'&callback='.$site_callback.'&content='.$code.''), true);
                    
   

            
   
           
                    
        if (isset($json['data']))
        {
            if ($json['data']['status'] == 'error')
            {
                echo thongbao('Thất bại "'.$json['data']['msg'].'"','loi');


            }
            else if ($json['data']['status'] == 'success')
            {
                                $mysqli->query("INSERT INTO `napthe` SET `seri` = '".$seri."', `mathe` = '".$mathe."' , `loaithe` = '".$loaithe."', `menhgia` = '".$menhgia."', `thoigian` = '".$thoigian."', `status` = 'xuly', `uid` = '".$id."', `requestid` = '".$code."' ");
                                
                echo thongbao('Thành công "'.$json['data']['msg'].'" ','thanhcong');

            }
        }
            
                          
        
          
        }

}
    
    
    
/////////////////////////
    
    

    
}}

?>
<div class="noti-info">
<h2>Chiết khấu nạp thẻ <?=100-$system->data->tcard?>%</h2>
<p>
Nạp <b><?=number_format(100000)?></b> được <b><?=number_format(100000*$system->data->tcard/100)?> vàng</b><br>
<a class="btn btn-primary m-1" href="/true/napthe.html">Nạp Thẻ</a> - <a class="btn btn-primary m-1" href="/true/napatm.html">Nạp ATM</a>


 </p>
 </div>
 
<div class="sha-deposit-info">
<div class="w-deposit" style="width:100%;">
<div class="b-c-header">
<div class="deposit-title"></div>
<div class="deposit-ques"></div>
</div>
<div class="deposit-body">

<form name="napthe" action="/true/napthe.html" method="post" >
<div class="wrap-section"><label>Nhà mạng</label><select name="telco"  id="telco">
        <option value="VIETTEL">Viettel</option>
                    
                        <option value="MOBIFONE">Mobifone</option>
                      
                        <option value="VINAPHONE">Vinaphone</option>
</select></div>
<div class="wrap-section">
<label>Mệnh giá</label><select name="amount"  id="amount"><option value="">Chọn mệnh giá</option>
<option value="10000">10,000</option><option value="20000">20,000</option><option value="50000">50,000</option>
<option value="100000">100,000</option><option value="200000">200,000</option><option value="500000">500,000</option></select>
<span class="text-danger">Sai mệnh giá sẽ mất thẻ</span></div>
<div class="wrap-section"><label>Mã thẻ</label>
<input type="text" class="form-control"  id="code"  name="code" placeholder="Mã thẻ" value=""><div class="text-danger"></div></div>
<div class="wrap-section"><label>Mã serial</label>
<input type="text" class="form-control" id="serial"  name="serial" placeholder="Mã serial" value=""><div class="text-danger"></div></div>

<div class="wrap-section"><label>Captcha:</label>
                                       <img src="captcha.html" id="captcha"/>
                                            <input placeholder="Captcha" type="number" class="form-control" placeholder="" id="txtcaptcha"  name="txtcaptcha" value="" aria-describedby="basic-addon11">
                                        <div class="text-danger"></div></div>
<p class="deposit-notice font-weight-bold"><span></span></p>


<div class="text-center"><button type="submit" name="napthe" class="button-pay" style="opacity: 1;"></button>
</div>
</form>
</div>
</div>

</div>
<div class="sha-top-guild-s">
<div class="deposit-title"></div>
<div class="top-guild-table">
<div class="title-table">
<div class="item item-top">Thời gian</div>
<div class="item item-name">Loại thẻ</div>
<div class="item item-sv">Seri</div>
<div class="item item-amount">Mã thẻ</div>
<div class="item item-gif">Mệnh giá</div>
<div class="item item-gif">Trạng thái</div>

</div>
<div class="content-table">
             <?PHP
          
                    $list_chuyen = $mysqli->query("SELECT * FROM `napthe` WHERE `uid` = '".$id."' ORDER by `id` DESC ");
                    
                    $data_chuyen = '';

                    while($chuyen = $list_chuyen->fetch_assoc())
                    {

                        $data_chuyen.='<div class="table-row">
                                            <div class="item"  style="font-size: 8px;">'.$chuyen['thoigian'].'</div>
                                             <div class="item"  style="font-size: 8px;">'.$chuyen['loaithe'].'</div>
                                               <div class="item"  style="font-size: 8px;">'.$chuyen['seri'].'</div>
                                                 <div class="item"  style="font-size: 8px;">'.$chuyen['mathe'].'</div>
                                                 
                                           
                                            <div class="item"  style="font-size: 8px;">'.$chuyen['menhgia'].'</div>
                                             <div class="item"  style="font-size: 8px;">'.$chuyen['status'].'</div>
                                        </div>';
                    }
                    
                    
                    ?>
    <?=$data_chuyen?>

</div>
</div></div>

 
<script>
      $('form').submit(function() {
         $("#splash-screen").show();

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            $('#ducnghia').html(this.responseText);
                    $("#splash-screen").fadeOut();

     
        }
    };
    xhttp.open($(this).attr('method'), $(this).attr('action'), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhttp.send("t=1&load=<?=base64_encode(md5(time()))?>&"+$(this).serialize());

    history.pushState("object or string representing the state of the page", "Xin Chao", $(this).attr('action'));   
    return false;
});
</script>


<?PHP


include_once('../../../core/system/end.php');