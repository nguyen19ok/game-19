<?PHP
include_once('../../../core/system/config.php');
$to = html($_GET['id']);
$title = 'Danh sách trò chuyện';

if($to >=1)
{
    $c = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id`= '".$to."'")->num_rows;
    if($c >=1)
    {
        $p = new users($to);
        $title = 'Trò chuyện với '.$p->thongtin->ten.' ';
    }

}
include_once('../../../core/system/head.php');

if($c <=0 AND $to >=1)
    {
        echo thongbao('Không tồn tại người dùng này','loi');
        exit();
    }

### TÁC GIẢ : TRẦN ĐỖ ĐỨC NGHĨA.
### DUCNGHIAIT


if($id <=0)
{
    echo thongbao('Vui lòng đăng nhập để tiếp tục','loi');
    exit();
}

?>
            <!-- ============================================================== -->
            <!-- Left Part  -->
            <!-- ============================================================== -->
            <div class="left-part bg-white fixed-left-part">
                <!-- Mobile toggle button -->
                <a class="ti-menu ti-close btn btn-success show-left-part d-block d-md-none" href="javascript:void(0)"></a>
                <!-- Mobile toggle button -->
                <div class="p-15">
                    <h4>Chat Sidebar</h4>
                </div>
                <div class="scrollable position-relative" style="height:100%;">
                    <div class="p-15">
                        <h5 class="card-title">Search Contact</h5>
                        <form>
                            <input class="form-control" type="text" placeholder="Search Contact">
                        </form>
                    </div>
                    <hr>
                    <ul class="mailbox list-style-none">
                        <li>
                            <div class="message-center chat-scroll">
                                <?PHP
                                $list = $mysqli->query("SELECT * FROM `sms_list` WHERE `from` = '".$id."' ORDER by `time` DESC LIMIT 5");
                                while($sms = $list->fetch_assoc())
                                {
                                    $text = '';
                                    $time = '';
                                    $new = $mysqli->query("SELECT * FROM `sms` WHERE `from` = '".$id."' AND `to` = '".$sms['to']."' OR `to` = '".$id."' AND `from` = '".$sms['to']."' ORDER by `id` DESC LIMIT 1")->fetch_assoc();
                                    if($new['id'] >=1)
                                    {
                                        $text = $new['text'];
                                        $time = $new['time'];
                                    }
                                    $to = new users($sms['to']);
                                    
                                    echo'<a  href="/chat/messenger.html?id='.$to->id.'" class="message-item" '.($sms['new']>=1 ? 'style="background-color: #dee2e6;"' : '').'><span class="user-img"> <img src="'.$to->thongtin->avatar.'" alt="user" class="rounded-circle"> <span class="profile-status '.($to->thongtin->online >= time() ? 'online' : 'offline').' pull-right"></span> </span><div class="mail-contnet"><h5 class="message-title">'.$to->name2().'</h5> <span class="mail-desc">'.$text.'</span> <span class="time" ducnghia="'.$time.'"></span> </div></a>';
    
                                }
                                
                                ?>
                                
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Left Part  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Part  Mail Compose -->
            <!-- ============================================================== -->
            <div class="right-part">
                <div class="p-20">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Chat Messages</h4>
                            <div class="chat-box scrollable" style="height:calc(100vh - 300px);">
                                <!--chat Row -->
                                <ul class="chat-list">
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="../../assets/images/users/1.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">James Anderson</h6>
                                            <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing &amp; type setting industry.</div>
                                        </div>
                                        <div class="chat-time">10:56 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="../../assets/images/users/2.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Bianca Doe</h6>
                                            <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                        </div>
                                        <div class="chat-time">10:57 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">I would love to join the team.</div>
                                            <br>
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">Whats budget of the new project.</div>
                                            <br>
                                        </div>
                                        <div class="chat-time">10:59 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="../../assets/images/users/3.jpg" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Angelina Rhodes</h6>
                                            <div class="box bg-light-info">Well we have good budget for the project</div>
                                        </div>
                                        <div class="chat-time">11:00 am</div>
                                    </li>
                                    <!--chat Row -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-field m-t-0 m-b-0">
                                        <input id="textarea1" placeholder="Type and enter" class="form-control border-0" type="text">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a class="btn-circle btn-lg btn-cyan float-right text-white" href="javascript:void(0)"><i class="fas fa-paper-plane"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->


<?PHP
include_once('../../../core/system/end.php');

