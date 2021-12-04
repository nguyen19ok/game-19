<?PHP
include_once('../../../core/system/config.php');
$title = 'Danh sách chờ rút vàng';
include_once('../../../core/system/head.php');

if($admin <=4)
{
    exit();
}


?>

<?PHP

if(isset($_GET['xoa']))
{
    $data = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$_GET['id']."'")->fetch_assoc();
    if($data['id'] <=0)
    {
        echo thongbao('Không tìm thấy ID này','loi');
    }
    else
    {
       
      
        $mysqli->query("DELETE FROM `nguoichoi` WHERE `id` = '".$_GET['id']."'");
        echo thongbao('Chỉnh sửa thành công','thanhcong');
    }
}




?>
<div class="sha-top-guild-s">
<div class="deposit-title"></div>
<div class="top-guild-table">
<div class="title-table">
<div class="item item-top">ID</div>
<div class="item item-name">Tài khoản</div>
<div class="item item-sv">Tên hiển thị</div>
<div class="item item-sv">Vàng</div>

<div class="item item-amount">Email</div>
<div class="item item-gif">Hành động</div>

</div>
<div class="content-table">
    
   <?PHP
$list_chuyen = $mysqli->query("SELECT * FROM `nguoichoi` ORDER by `id`");
$i=1;

                  
                    $data_chuyen = '';
                    while($chuyen = $list_chuyen->fetch_assoc())
                    {
	    $c = new users($chuyen['id']);


                        $data_chuyen.='
						<div class="table-row">
						<div class="item">'.$chuyen['id'].'</div>
						<div class="item"><img src="'.$c->thongtin->avatar.'" width="30">'.$c->taikhoan.'</div>
						<div class="item">'.$c->thongtin->ten.'</div>

												<div class="item">'.number_format($chuyen['xu']).'</div>

						<div class="item">'.($chuyen['email']).'</div>
						<div class="item">

	                    <a href="?xoa&id='.$chuyen['id'].'">[Xóa]</a></div>
						
						</div>';
							
							
						++$i;
					}
                    
                    
                    ?>
					


                                        <?=$data_chuyen?>
                                       
                    
</div>
	
</div>
</div>
                
           
<?PHP
include_once('../../../core/system/end.php');
?>