<?PHP
include_once('../../../core/system/config.php');
$title = 'Nạp vàng cho thành viên';
include_once('../../../core/system/head.php');


if($admin <=4)
{
    echo 'Bạn không đủ quyền để vào khu vực này';
    exit();
}





$log = $mysqli->query("SELECT * FROM `log_nap`    ORDER by id DESC LIMIT $start, $kmess");
$hethan = 0;
$hetdung = 0;
while($giftcode = $log->fetch_assoc())
{
    $da = json_decode($giftcode['data'],true);
    $table.='<tr>
    <td>'.$giftcode['id'].'</td>
    <td>'.$da['thoigian'].'</td>
    <td>'.(new users($giftcode['uid']))->name().'</td>
    <td>'.(new users($da['id']))->name().'</td>
    <td>'.number_format($da['xu']).'</td>
    </tr>';
    
}
if($mysqli->query("SELECT * FROM `log_nap` ")->num_rows > $kmess)
{
    $trang = '<center>' . trang('?', $start, $mysqli->query("SELECT * FROM `log_nap` ")->num_rows, $kmess) . '</center>';
}


?>
<div class="sha-deposit-info">
<div class="w-deposit" style="width: 100%;">
<div class="b-c-header"><h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Tặng vàng</h5></div>
<div class="deposit-body">
        <div class="text-danger text-center" id="log_tangvang"></div>

<form id="form_tangvang" class="form pt-3">
                                   
                                    
                                  <div class="form-group">
                                        <label>ID Tài khoản (số)</label>
                                        <div class="input-group mb-3">
                                           
                                            <input  type="text" class="form-control" value="1"  aria-label="tieude" name="id" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label>Xu :</label>
                                        <div class="input-group mb-3">
                                           
                                            <input  type="number" class="form-control" value="0"  aria-label="tieude" name="xu" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    
                                    

                                  

                                    <button onclick="tangvang()"   type="submit" class="button-withdraw"></button>
                                </form>
                                
                               
                                <hr>
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#ID</th>
                                            <th scope="col">Thời gian</th>
                                            <th scope="col">Người nạp</th>
                                            <th scope="col">Người được nạp</th>
                                            <th scope="col">Số tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$table?>
                                       
                                    </tbody>
                                </table>
                                <?=$trang?>
                                
                            </div>
                        </div>
                    </div>
                  
                    <!-- Column -->
                    <!-- Column -->
                    
                    <!-- Column -->
                </div>
                
<script>
function tangvang() {
    $['ajax']({
        url: '/guest/xuli.html?tangvang',
        type: 'POST',
        data: $('#form_tangvang')['find']('select, textarea, input')['serialize'](),
        success: function (log) {
            
                $("#log_tangvang").html(log.text);
           
        }
    })
}

 
</script>                                
<?PHP

include_once('../../../core/system/end.php');