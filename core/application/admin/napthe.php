<?PHP
include_once('../../../core/system/config.php');
$title = 'Danh sách nạp thẻ';
include_once('../../../core/system/head.php');

if($admin <=4)
{
    exit();
}


?>

<?PHP
if(isset($_GET['xoa']))
{
    $data = $mysqli->query("SELECT * FROM `napthe` WHERE `id` = '".$_GET['id']."'")->fetch_assoc();
    if($data['id'] <=0)
    {
        echo thongbao('Không tìm thấy ID này','loi');
    }
    else
    {
        
        $mysqli->query("DELETE FROM  `napthe` WHERE `id` = '".$_GET['id']."'");
        echo thongbao('Chỉnh sửa thành công','thanhcong');
    }
}


$ng = $mysqli->query("SELECT * FROM `logrut`   ORDER by id DESC LIMIT $start, $kmess");
if($mysqli->query("SELECT * FROM `logrut` ")->num_rows > $kmess)
{
    $trang = '<center>' . trang('?', $start, $mysqli->query("SELECT * FROM `logrut` ")->num_rows, $kmess) . '</center>';
}
while($m = $ng->fetch_assoc())
{
   
    $c = new users($m['uid']);
    $table.='<tr><td>'.$m['id'].'</td><td>'.$m['thoigian'].'</td><td><img src="'.$c->thongtin->avatar.'" width="30">'.$c->name().'</td><td>'.$m['server'].'</td><td>'.number_format($m['vnd']).'</td> <td>'.number_format($m['no']).'</td><td>'.trangthai($m['code']).'</td> <td><a href="?code=1&id='.$m['id'].'">[Hoàn tất]</a> <a href="?code=2&id='.$m['id'].'">[Hủy]</a> </td></tr>';
}
?>
             <div class="sha-top-guild-s">
<div class="deposit-title"></div>
<div class="top-guild-table">
<div class="title-table">
<div class="item item-top">ID</div>
<div class="item item-name">Tài khoản</div>
<div class="item item-sv">Loại thẻ</div>
<div class="item item-sv">Seri</div>
<div class="item item-sv">Pin</div>
<div class="item item-sv">Mệnh giá</div>
<div class="item item-sv">Thực nhận</div>

<div class="item item-amount">Trạng thái</div>
<div class="item item-amount">Thời gian</div>

<div class="item item-gif">Hành động</div>

</div>
<div class="content-table">
    
   <?PHP
$list_chuyen = $mysqli->query("SELECT * FROM `napthe` ORDER by `id`");
$i=1;

                  
                    $data_chuyen = '';
                    while($chuyen = $list_chuyen->fetch_assoc())
                    {
	    $c = new users($chuyen['uid']);


                        $data_chuyen.='
						<div class="table-row" style="font-size:10px;">
						<div class="item">'.$chuyen['id'].'</div>
						<div class="item"><img src="'.$c->thongtin->avatar.'" width="30">'.$c->taikhoan.'</div>
						<div class="item">'.($chuyen['loaithe']).'</div>
						<div class="item">'.($chuyen['seri']).'</div>
						<div class="item">'.($chuyen['mathe']).'</div>
						<div class="item">'.number_format($chuyen['menhgia']).'</div>
						<div class="item">'.number_format($chuyen['nhan']).'</div>


						<div class="item">'.($chuyen['status']).'</div>
												<div class="item">'.($chuyen['thoigian']).'</div>

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