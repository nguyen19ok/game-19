<?PHP
include_once('../../../core/system/config.php');

$title = 'Top đại gia';


include_once('../../../core/system/head.php');

echo '<div class="page-header">

<h2>Top đại gia</h2>
</div>'; 


$dataTop = $mysqli->query("SELECT * FROM `nguoichoi` ORDER by xu DESC LIMIT $start, 31");
$log = array();
$currtip=0;
while($top=$dataTop->fetch_assoc())
{
    if($top['taikhoan']!='admin')
    {
   $msg.='<tr id="count"><td>TOP'.$currtip.' - '.$top['taikhoan'].' </td> <td>'.number_format($top['xu']).' </td>    </tr>';
    }
    $currtip++;
}




?>
<div class="row">

              <div class="col-lg-12 grid-margin stretch-card" id="head_game_lstx">
                <div class="card">
                  <div class="card-body">
                     <header class="panel-heading">

<h2 class="panel-title">Bảng xếp hạng</h2>
</header>
<div class="panel-body">
                    <table id="customers" class="table table-bordered">
                      <thead>
                        <tr>
                          <th> Tên </th>
                          <th> Tiền có </th>
                          
                        </tr>
                      </thead>
                      <tbody id="top_taixiu">
                        <?=$msg?>
    
                      </tbody>
                    </table>
                    <div id="secon"></div>
                  </div>
                </div>
              </div>
            </div>
            </div>
<?PHP


include_once('../../../core/system/end.php');
