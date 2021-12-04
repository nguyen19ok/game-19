<?PHP
include_once('../../../core/system/config.php');
$title = 'Tìm kiếm người chơi';
include_once('../../../core/system/head.php');


if($admin <=4)
{
    echo 'Bạn không đủ quyền để vào khu vực này';
    exit();
}






?>

  
              <div class="page-header">

<h2>Tìm kiếm người chơi</h2>
</div>


<div class="row">
                    <!-- Column -->
                    <div class="col-md-12">
                        <section class="panel">
<header class="panel-heading">

<h2 class="panel-title">Tìm kiếm user</h2>

</header>
<div class="panel-body">
                        
                                <h4 class="card-title">Tìm kiếm người chơi</h4>
                                <form name="dangki" action="/admin/search.html" class="form pt-3" id="formlogin" method="post">
                                   
                                    
                                  <div class="form-group">
                                        <label>Nick* :</label>

                                        
                                         <div class="input-group input-group-sm">
                                        
                                        <input aria-label="tieude" name="id" aria-describedby="basic-addon11" value="<?=(isset($_POST['id']) ? $_POST['id'] : ''.(isset($_GET['id']) ? $_GET['id'] : '').'')?>" type="text" placeholder="Nhập tên" autocomplete="off" class="form-control" style="height: 40px; font-size: 16px; font-weight: normal;">
                <span class="input-group-btn"><button name="dangki" class="btn btn-primary" style="height: 40px;width:100px;" type="submit" >Tìm kiếm</button></span></div>
                                        
                                        
                                        
                                    </div>
                                    
                                    
                                    
                                   
                                    

                                  

                                    
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                    
                                    
                                </form>
                                <hr>
                                <b>(*) :</b>
                                <br> - Bạn có thể nhập cả <b>Tên tài khoản</b>,  hoặc <b>ID</b>
                                <hr>
                               <?PHP
                               if(isset($_GET['login']))
                               {
                                   if($mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$_GET['id']."'")->num_rows <=0)
                                   {
                                       echo thongbao('Tài khoản không tồn tại','canhbao');
                                   }
                                   else
                                   {
                                       echo thongbao('Đăng nhập tài khoản này thành công, vui lòng tải lại trang','thanhcong');
                                        $_SESSION['id'] = $_GET['id'];
                                   }
                               }
                               
                               if(isset($_GET['ban']))
                               {
                                   if($mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$_GET['id']."'")->num_rows <=0)
                                   {
                                       echo thongbao('Tài khoản không tồn tại','canhbao');
                                   }
                                   else
                                   {
                                       $c = new users($_GET['id']);
                                       $c->upthongtin('ban',1);
                                       echo thongbao('Đã cấm tài khoản này','thanhcong');
                                   }
                               }
                               
                               if(isset($_GET['unban']))
                               {
                                   if($mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$_GET['id']."'")->num_rows <=0)
                                   {
                                       echo thongbao('Tài khoản không tồn tại','canhbao');
                                   }
                                   else
                                   {
                                       $c = new users($_GET['id']);
                                       $c->upthongtin('ban',0);
                                       echo thongbao('Đã mở cấm tài khoản này','thanhcong');
                                   }
                               }
                               
                               ?>
                                <hr>
                                
                                <?PHP
                                if(isset($_POST['id']) or isset($_GET['id']))
                                {
                                    if(isset($_POST['id']))
                                    {
                                        $q = $_POST['id'];
                                    }
                                    else
                                    {
                                        $q = $_GET['id'];
                                    }
                                    if($mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$q."' or `taikhoan` = '".$q."'")->num_rows <=0)
                                    {
                                        echo thongbao('Không tìm thấy.','canhbao');
                                    }
                                    else
                                    {
                                        
                                        $p = new users($mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$q."' or `taikhoan` = '".$q."' ")->fetch_assoc()['id']);
                                        ?>
                                        <center class="m-t-30"> <img src="<?=$p->thongtin->avatar?>" class="rounded-circle" width="20%">
                                    <h4 class="card-title m-t-10"><?=$p->name() .' ID: '. $p->id?> (<a href="/admin/search.html?login&id=<?=$p->id?>">ĐĂNG NHẬP</a>) </h4>
                                    <h6 class="card-subtitle"><?=$p->chucvu()?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fas fa-money-bill-alt"></i> <font class="font-medium"><?=number_format($p->xu)?></font></a></div>
                                        <?=($id !=$p->id ? '<button type="button" class="btn btn-block btn-outline-info" onclick="window_chat('.$p->id.')">Nhắn tin</button>' : '')?>
                                       <?=($p->thongtin->online >= time() ? '<button type="button" class="btn btn-rounded btn-block btn-outline-success">Đang hoạt động</button>' : '<button type="button" class="btn btn-rounded btn-block btn-outline-danger">Hoạt động '.thoigian($p->thongtin->online).'</button>')?>
                                       
                                       <?PHP 
                                       if($p->thongtin->ban >=1)
                                       {
                                           echo'<a href="/admin/search.html?unban&id='.$p->id.'"><button type="button" class="btn btn-rounded btn-block btn-outline-success">Mở khóa</button></a>';
                                       }
                                       else
                                       {
                                           echo '<a href="/admin/search.html?ban&id='.$p->id.'"><button type="button" class="btn btn-rounded btn-block btn-outline-warning">Khóa người này</button></a>';
                                       }
                                       ?>
                                       </center>
                                       <br>
                                       Email : <?=$p->email?> <br>
                                       SDT : <?=$p->sdt?> <br>
                                       Tên hiển thị : <?=$p->name()?> <br>
                                       Loại tài khoản : <?=$p->chucvu()?> <br>
                                       Xu nạp : <?=number_format($p->thongtin->xunap)?> <br>
                                       Xu hiện có : <?=number_format($p->xu)?>
                                          <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Game</th>
                                            <th scope="col">Tiền thắng/ thua</th>
                                            <th scope="col">Số thắng/ thua</th>
                                            <th scope="col">Chuỗi thắng/ thua</th>
                                            <th scope="col">Số thắng cao/ thua </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ngọc rồng</td>
                                            <td><?=number_format($p->thongtin->ngocrong_win)?>/ <?=number_format($p->thongtin->ngocrong_lose)?></td>
                                            <td><?=number_format($p->thongtin->taixiu_thang)?>/ <?=number_format($p->thongtin->taixiu_thua)?></td>
                                            
                                        <td><?=number_format($p->thongtin->taixiu_chuoithang)?>/ <?=number_format($p->thongtin->taixiu_chuoithua)?></td>
                                        
                                        <td><?=number_format($p->thongtin->taixiu_chuoithangcaonhat)?>/ <?=number_format($p->thongtin->taixiu_chuoithuacaonhat)?></td>
                                        
                                        </tr>
                                        
                                        <tr>
                                            <td>Chẳn lẻ</td>
                                            <td><?=number_format($p->thongtin->chanle_win)?>/ <?=number_format($p->thongtin->chanle_lose)?></td>
                                            <td><?=number_format($p->thongtin->chanle_thang)?>/ <?=number_format($p->thongtin->chanle_thua)?></td>
                                            
                                        <td><?=number_format($p->thongtin->chanle_chuoithang)?>/ <?=number_format($p->thongtin->chanle_chuoithua)?></td>
                                        
                                        <td><?=number_format($p->thongtin->chanle_chuoithangcaonhat)?>/ <?=number_format($p->thongtin->chanle_chuoithuacaonhat)?></td>
                                        
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td>Bầu cua</td>
                                            <td><?=number_format($p->thongtin->baucua_win)?>/ <?=number_format($p->thongtin->baucua_lose)?></td>
                                            <td><?=number_format($p->thongtin->baucua_thang)?>/ <?=number_format($p->thongtin->baucua_thua)?></td>
                                            
                                        <td><?=number_format($p->thongtin->baucua_chuoithang)?>/ <?=number_format($p->thongtin->baucua_chuoithua)?></td>
                                        
                                        <td><?=number_format($p->thongtin->baucua_chuoithangcaonhat)?>/ <?=number_format($p->thongtin->baucua_chuoithuacaonhat)?></td>
                                        
                                        </tr>
                                        
                                         <tr>
                                            <td>Tất cả</td>
                                            <td><?=number_format($p->thongtin->baucua_win+$p->thongtin->chanle_win+$p->thongtin->ngocrong_win)?>/ <?=number_format($p->thongtin->baucua_lose+$p->thongtin->chanle_lose+$p->thongtin->ngocrong_lose)?></td>
                                            <td><?=number_format($p->thongtin->baucua_thang+$p->thongtin->taixiu_thang+$p->thongtin->chanle_thang)?>/ <?=number_format($p->thongtin->baucua_thua+$p->thongtin->taixiu_thua+$p->thongtin->chanle_thua)?></td>
                                            
                                        <td><?=number_format($p->thongtin->baucua_chuoithang+$p->thongtin->chanle_chuoithang+$p->thongtin->taixiu_chuoithang)?>/ <?=number_format($p->thongtin->baucua_chuoithua+$p->thongtin->chanle_chuoithua+$p->thongtin->taixiu_chuoithua)?></td>
                                        
                                        <td><?=number_format($p->thongtin->baucua_chuoithangcaonhat+$p->thongtin->chanle_chuoithangcaonhat+$p->thongtin->taixiu_chuoithangcaonhat)?>/ <?=number_format($p->thongtin->baucua_chuoithuacaonhat+$p->thongtin->chanle_chuoithuacaonhat+$p->thongtin->taixiu_chuoithuacaonhat)?></td>
                                        
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                                        <?PHP
                                        
                                    }
                                }
                                ?>
                                
                                
                            </div>
                        </div>
                        </section>
                    </div>
                  
                
                </div>
                
<script>


  $('form').submit(function() {
         $("#splash-screen").show();
      
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            $('#ducnghia').html(this.responseText);

        }
                    $("#splash-screen").fadeOut();

    };
    xhttp.open($(this).attr('method'), $(this).attr('action'), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhttp.send("t=1&load=Y2U2ODFlZmJhMzliZDUwNzY2NjIxODQ4NDc1ZjhlN2E=&"+$(this).serialize());

    history.pushState("object or string representing the state of the page", "Xin Chao", $(this).attr('action'));   
    return false;
});
</script>                
<?PHP

include_once('../../../core/system/end.php');