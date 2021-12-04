<?PHP
include_once('../../../core/system/config.php');

head();


if($system)
{
    $data = $mysqli->query("SELECT * FROM `phien_ngocrong`   ORDER by id DESC LIMIT 1")->fetch_assoc();
    if($data['id'] <=0)
    {
        $d->id = 0;
    }
    else
    {
        $d->id = $data['id'];
    }
    $d->cancua = $system->data->cancua;
    $d->bot_ngocrong = $system->data->bot_ngocrong;
    $d->bot_chanle = $system->data->bot_chanle;
    $d->bot_baucua = $system->data->bot_baucua;
    
    $d->thoigian = $system->data->time_phien*1000;
    $d->thoigiancho = $system->data->time_new*1000;
    $d->bot_ngocrong_cuoc_min = explode(",",$system->data->bot_ngocrong_cuoc)[0];
    $d->bot_ngocrong_cuoc_max = explode(",",$system->data->bot_ngocrong_cuoc)[1];
    $d->bot_chanle_cuoc_min = explode(",",$system->data->bot_chanle_cuoc)[0];
    $d->bot_chanle_cuoc_max = explode(",",$system->data->bot_chanle_cuoc)[1];
    $d->bot_baucua_cuoc_min = explode(",",$system->data->bot_baucua_cuoc)[0];
    $d->bot_baucua_cuoc_max = explode(",",$system->data->bot_baucua_cuoc)[1];    
    echo json($d);
}