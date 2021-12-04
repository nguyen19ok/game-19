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
    $data = $mysqli->query("SELECT * FROM `logrut` WHERE `id` = '".$_GET['id']."'")->fetch_assoc();
    if($data['id'] <=0)
    {
        echo thongbao('Không tìm thấy ID này','loi');
    }
    else
    {
       
      
        $mysqli->query("DELETE FROM `logrut` WHERE `id` = '".$_GET['id']."'");
        echo thongbao('Chỉnh sửa thành công','thanhcong');
    }
}
if(isset($_GET['hoan']))
{
    $data = $mysqli->query("SELECT * FROM `logrut` WHERE `id` = '".$_GET['id']."'")->fetch_assoc();
    if($data['id'] <=0)
    {
        echo thongbao('Không tìm thấy ID này','loi');
    }
    else
    {
        if($data['code'] != 1)
        {
        $xu = ($data['vnd']);
       $n = new users($data['uid']);
        $n->upxu($xu);
        
        $mysqli->query("DELETE FROM `logrut` WHERE `id` = '".$_GET['id']."'");
        echo thongbao('Chỉnh sửa thành công','thanhcong');
        }
    }
}

if(isset($_GET['code']))
{
    $data = $mysqli->query("SELECT * FROM `logrut` WHERE `id` = '".$_GET['id']."'")->fetch_assoc();
    if($data['id'] <=0)
    {
        echo thongbao('Không tìm thấy ID này','loi');
    }
    else
    {
       
        $doanhthu->up('xu_rutvang',-($v->xu));
        $doanhthu->up('vang_chorut',-($v->vang));
        $doanhthu->up('xu_thanhcong',$v->xu);
        $doanhthu->up('vang_thanhcong',$v->vang);
        $mysqli->query("UPDATE  `logrut` SET `code` = '".$_GET['code']."' WHERE `id` = '".$_GET['id']."'");
        echo thongbao('Chỉnh sửa thành công','thanhcong');
    }
}



?>
<div class="sha-top-guild-s">
<div class="deposit-title"></div>
<div class="top-guild-table">
<div class="title-table">
<div class="item item-top">STT</div>
<div class="item item-name">Thời gian</div>
<div class="item item-sv">Tài khoản</div>
<div class="item item-sv">Thông tin</div>

<div class="item item-amount">Vàng rút</div>
<div class="item item-gif">Thực nhận</div>
<div class="item item-gif">Trạng thái</div>
<div class="item item-gif">Hành động</div>

</div>
<div class="content-table">
    
   <?PHP
$list_chuyen = $mysqli->query("SELECT * FROM `logrut` ORDER by `id`");
$i=1;

                  
                    $data_chuyen = '';
                    while($chuyen = $list_chuyen->fetch_assoc())
                    {
						    $c = new users($chuyen['uid']);
	

                        $data_chuyen.='
						<div class="table-row">
						<div class="item">'.$i.'</div>
						<div class="item">'.$chuyen['thoigian'].'</div>
						<div class="item"><img src="'.$c->thongtin->avatar.'" width="30">'.$c->taikhoan.'</div>
												<div class="item">'.$chuyen['thongtin'].'</div>

												<div class="item">'.number_format($chuyen['vnd']).'</div>

						<div class="item">'.number_format($chuyen['thucnhan']).'</div>
						<div class="item">'.trangthai($chuyen['code']).'</div>
						<div class="item">
						<a href="?code=1&id='.$chuyen['id'].'">[Hoàn tất]</a>
						<a href="?code=2&id='.$chuyen['id'].'">[Hủy]</a>
						<a href="?hoan&id='.$chuyen['id'].'">[Hoàn]</a> 
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