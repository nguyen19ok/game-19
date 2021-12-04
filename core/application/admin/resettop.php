<?PHP
include_once('../../../core/system/config.php');
$title = 'Reset Top Ngày';
include_once('../../../core/system/head.php');

if($admin <=4)
{
    exit();
}

if(isset($_POST['reset']))
{
            $mysqli->query("UPDATE `nguoichoi` SET `win` = '0'");
            echo thongbao('Dữ liệu đã được lưu','thanhcong');
        }

?>
                <script src="/assets/libs/tinymce/tinymce.min.js"></script>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Reset Top Ngày</h4>
                                <form name="reset" action="/admin/resettop.html" class="form pt-3" id="formlogin" method="post">
                                    <div class="form-group">
                                    <div class="input-group mb-3">
                                  <input type="text" value="Reset Top Ngày" name="reset" aria-describedby="basic-addon11">
                                    </div>
                                    <button  type="submit" class="btn btn-success mr-2">Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
           
<?PHP
include_once('../../../core/system/end.php');
?>