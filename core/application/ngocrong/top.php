<?PHP
include_once('../../../core/system/config.php');
$title = 'Thống kê Ngọc Rồng';
top(); #center;

#Data
$last_phien = $mysqli->query("SELECT * FROM `phien_ngocrong` ORDER by id DESC LIMIT 1")->fetch_assoc();
$phien = json_decode($last_phien['data']);

# function
$log_cuoctruoc = array(); # cuoc phien truoc
$log_cuoc = array(); #cuoc phien hien tai

$data = $mysqli->query("SELECT * FROM `cuoc_ngocrong` ORDER BY `id` DESC");
while($cuoc = $data->fetch_assoc())
{
    $game = json_decode($cuoc['data']);
    ### data cuoc phien truoc
    if($game->phien == $phien->phien)
    {
        $log_cuoctruoc[] = array(
            'id' => $cuoc['uid'],
            'cuoc' => $game->xu,
            'hoantra' => $game->hoantra,
            'thoigian' => $game->thoigian,
            'trangthai' => $game->code,
            'thang' => $game->nhan,
            );
    }
    ### data cuoc phien hien tai
    if($game->phien > $phien->phien)
    {
        $log_cuoc[] = array(
            'id' => $cuoc['uid'],
            'cuoc' => $game->xu,
            'hoantra' => $game->hoantra,
            'thoigian' => $game->thoigian,
            'trangthai' => $game->code,
            'thang' => $game->nhan,
            );
    }
}



close(); #close center;
