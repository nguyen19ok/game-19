<?PHP
include_once('../../../core/system/config.php');

head();

 

$taikhoan = html($_POST['name']);

if(empty($taikhoan))
{
    $d->error = 0;
}
else
{
    $char = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."' or `id` = '".$taikhoan."' LIMIT 1");
    if($char->num_rows <=0)
    {
        $d->error = 0;
    }
    else
    {
        $set = $char->fetch_assoc();
        $data = json_decode($set['thongtin']);
        $d->error = 1;
        $d->name = $data->ten;
    }
}

echo json($d);