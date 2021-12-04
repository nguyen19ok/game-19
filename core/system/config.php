<?PHP
ini_set('session.gc_maxlifetime', 86400);
// each client should remember their session id for EXACTLY 1 day
session_set_cookie_params(86400);

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vip    = array("10","20","150","400","1000","5000");
$mysqli = new mysqli("localhost","vknvagcj_game","Game123@@@@","vknvagcj_game"); 
$mysqli -> set_charset("utf8");
/**/
$root = $_SERVER['DOCUMENT_ROOT'];

/**/
$tien = $_SESSION['tien'] >=1 ? 1 : 0;
$system = new hethong;
/*Bug*/
$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$url = $_SERVER['PHP_SELF'];
$check_log = $mysqli->query("SELECT * FROM `log` WHERE `ip` = '".$ip."' AND `uid` = '".$_SESSION['id']."' AND `url` = '".$url."' AND `get1` = '".json_encode($_GET)."' AND `post` = '".json_encode($_POST)."' ")->fetch_assoc();
if($check_log['id'] <=0)
{
    $mysqli->query("INSERT INTO `log` SET `ip` = '".$ip."', `uid` = '".$_SESSION['id']."', `url` = '".$url."', `get1` = '".json_encode($_GET)."', `post` = '".json_encode($_POST)."' ");
}
##  TÍNH THỜI GIAN
function mobile(){
    if(isset($_SERVER['HTTP_USER_AGENT']) and !empty($_SERVER['HTTP_USER_AGENT'])){
       $user_ag = $_SERVER['HTTP_USER_AGENT'];
       if(preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
          return true;
       };
    };
    return false;
}
$mobile = mobile();
function thoigiantinh($time)
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $now = time();
    $giay = $time - $now;
    if($giay <=0)
    {
        $text = 'Đã hết hạn';
    }
    else
    if($giay <=60)
    {
        $text = 'Còn vài giây';
    }
    else
    if($giay >=60 AND $giay < 3600)
    {
        $text = ''.round($giay/60).' phút nữa';
    }
    else
    if($giay >=3600 AND $giay <86400)
    {
        $text = ''.round($giay/60/60).' giờ nữa';
    }
    else
    if($giay >=86400)
    {
        $text = ''.round($giay/60/60/24).' ngày nữa';
    }
    return $text;
}
function thoigian($time)
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $now = time();
    $giay  = $now - $time;
    ## 1 phút = 60s
    ## 1h = 60 phút
    ## 1h = 3600 giây.
    ## 24h = 86400;
    
    if($giay < 60)
    {
        $text = 'Vài giây trước';
    }
    else
    if($giay >=60 AND $giay < 3600)
    {
        $text = ''.round($giay/60).' phút trước';
    }
    else
    if($giay >=3600 AND $giay <86400)
    {
        $text = ''.round($giay/60/60).' giờ trước';
    }
    else
    if($giay >=86400)
    {
        $text = ''.round($giay/60/60/24).' ngày trước';
    }
    
    return $text;
    
}

##  DUCNGHIA

/*Anti bug*/
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$gio = date('H');
$phut= date('i');
$giay= date('s');
$thoigian = ''.$gio.':'.$phut.':'.$giay.' '.$ngay.'/'.$thang.'/'.$nam.'';
$ngaythangnam = ''.$ngay.'/'.$thang.'/'.$nam.'';
$id = $_SESSION['id'];
$kmess = $_SESSION['kmess'] > 50 && $_SESSION['kmess'] < 100 ? $_SESSION['kmess'] : 100;
$page = isset($_REQUEST['p']) && $_REQUEST['p'] > 0 ? intval($_REQUEST['p']) : 1;
$start = isset($_REQUEST['p']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);
$admin = 0;
if($id >=1)
{
    $datauser = new users($id);
    $user     = $datauser;
    $uid      = $id;
    $u        = $user;
    $admin    = $datauser->admin;
    $check_login = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$_SESSION['id']."'")->fetch_assoc();
    # INSERT VIP
    
    # INSERT ONLINE
    
    $u->upthongtin('online',time()+100);
    # BAN
    if($u->thongtin->ban >=1)
    {
        session_destroy();
    }
    # ERROR
    # INSERT
    if($u->thongtin->time_ngocrong <= time() AND $u->thongtin->cuoc_ngocrong >=1)
    {
        $datauser->upthongtin('cuoc_ngocrong',0);
    }
    if($u->thongtin->time_chanle <= time() AND $u->thongtin->cuoc_chanle >=1)
    {
        $datauser->upthongtin('cuoc_chanle',0);
    }
    if($u->thongtin->time_baucua <= time() AND $u->thongtin->cuoc_baucua >=1)
    {
        $datauser->upthongtin('cuoc_baucua',0);
    }
    
    
    if($check_login['id'] <=0)
    {
        session_destroy();
    }
}

if($admin <=0)
{
    if(isset($_POST)){
        foreach($_POST as $index => $value){
            if(is_string($_POST[$index]))
            {
                if($index != "game" AND $index !="cuoc")
                {
                    $_POST[$index]=$mysqli->real_escape_string($_POST[$index]);
                }


            }
        }
    }
    if(isset($_GET))
    {
        foreach($_GET as $index => $value)
        {
            if(is_string($_GET[$index]))
            {
                $_GET[$index]=$mysqli->real_escape_string($_GET[$index]);
            }
        }
    }

}

class doanhthu
{
    public $ngay;
    public $thang;
    public $nam;
    
    public function doanhthu($ngay,$thang,$nam)
    {
        global $mysqli;
        $check = $mysqli->query("SELECT * FROM `doanhthu` WHERE `ngay` = '".$ngay."' AND `thang` = '".$thang."' AND `nam` = '".$nam."'")->num_rows;
        if($check <=0)
        {
            $mysqli->query("INSERT INTO `doanhthu` SET `ngay` = '".$ngay."', `thang` = '".$thang."',  `nam` = '".$nam."' ");
        }
        $users = $mysqli->query("SELECT * FROM `doanhthu` WHERE  `ngay` = '".$ngay."' AND `thang` = '".$thang."' AND `nam` = '".$nam."'")->fetch_array();
        foreach($users as $key => $value)
        {
            $this->{$key} = $value;
        }
        $this->data = json_decode($this->data);
        if (!isset($this->data)) 
        {
            $this->data = new stdClass();
        }
    }
    
    public function up($name, $value)
    {
        global $mysqli;
        $this->data->$name = $this->data->$name + $value;
        $mysqli->query("UPDATE `doanhthu` SET `data` = '" . json_encode($this->data,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "' WHERE `id` = '".$this->id."'");
    }
}

$doanhthu = new doanhthu($ngay,$thang,$nam);
/*Sử lý tiền tài xỉu*/
class hethong
{
    public function __construct()
    {
        $json = file_get_contents(__DIR__.'/head.json');
        $this->data = json_decode($json);
        
    }
    public function set($name,$value)
    {
        
        $this->data->$name = $value;
        file_put_contents(__DIR__.'/head.json', json_encode($this->data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));

    }
}



class users
{
    public $id;
    public function users($id)
    {
        global $mysqli;
        $users = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '" . $id . "'")->fetch_array();
        foreach($users as $key => $value)
        {
            $this->{$key} = $value;
        }
        $this->thongtin = json_decode($this->thongtin);
        if (!isset($this->thongtin)) 
        {
            $this->thongtin = new stdClass();
        }
    }
    public function chucvu()
    {
        if($this->admin <=0) $chucvu = 'Người chơi';
        else if($this->admin ==1) $chucvu = 'Cộng tác viên 1';
        else if($this->admin ==2) $chucvu = 'Cộng tác viên 2';
        else if($this->admin ==3) $chucvu = 'Cộng tác viên 3';
        else if($this->admin ==4) $chucvu = 'T-Mod';
        else if($this->admin ==5) $chucvu = 'Mod';
        else if($this->admin ==6) $chucvu = 'Game Master';
        else $chucvu = 'Quản trị viên';
        
        if($this->admin <=0) $mau = '#ffff26;';
        else if($this->admin ==1) $mau = '#5F04B4';
        else if($this->admin ==2) $mau = '#0B6121';
        else if($this->admin ==3) $mau = '#868A08';
        else if($this->admin ==4) $mau = '#FFBF00';
        else if($this->admin ==5) $mau = '#00BFFF';
        else if($this->admin ==6) $mau = '#FA5858';
        else $mau = '#FF0000';
        return '<font color="'.$mau.'">'.$chucvu.'</font>';
    }
    public function name2()
    {
        /*
        ducnghia :
        0 => người chơi min 10.000 max 50.000 phí 5%
        1 => đại lý cấp 1  min 5.000 max 150.000 phí 300 + 1%;
        2 => đại lý cấp 2 min 2.500 max 300.000 phí 250 + 0.8%;
        3 => đại lý cấp 3 min 1.000 max 600.000 phí 200 + 0.5%;
        4 => T-mod => khong gioi han, khong mat phi, thử việc T-Mod.
        5 => Mod => nhu t-mod => moi quyen
        6 => GM => co quyen thay doi ket qua tro choi
        7 => Admin => toi cao.
        
        */
        if($this->admin <=0) $mau = '#ffff26;';
        else if($this->admin ==1) $mau = '#5F04B4';
        else if($this->admin ==2) $mau = '#0B6121';
        else if($this->admin ==3) $mau = '#868A08';
        else if($this->admin ==4) $mau = '#FFBF00';
        else if($this->admin ==5) $mau = '#00BFFF';
        else if($this->admin ==6) $mau = '#FA5858';
        else $mau = '#FF0000';
        return '<font color="'.$mau.'">'.$this->thongtin->ten.'</font>';
        
    }
    
    public function name()
    {
        /*
        ducnghia :
        0 => người chơi min 10.000 max 50.000 phí 5%
        1 => đại lý cấp 1  min 5.000 max 150.000 phí 300 + 1%;
        2 => đại lý cấp 2 min 2.500 max 300.000 phí 250 + 0.8%;
        3 => đại lý cấp 3 min 1.000 max 600.000 phí 200 + 0.5%;
        4 => T-mod => khong gioi han, khong mat phi, thử việc T-Mod.
        5 => Mod => nhu t-mod => moi quyen
        6 => GM => co quyen thay doi ket qua tro choi
        7 => Admin => toi cao.
        
        */
        if($this->admin <=0) $mau = '#ffff26;';
        else if($this->admin ==1) $mau = '#5F04B4';
        else if($this->admin ==2) $mau = '#0B6121';
        else if($this->admin ==3) $mau = '#868A08';
        else if($this->admin ==4) $mau = '#FFBF00';
        else if($this->admin ==5) $mau = '#00BFFF';
        else if($this->admin ==6) $mau = '#FA5858';
        else $mau = '#FF0000';
        return '<font color="'.$mau.'">'.$this->thongtin->ten.'</font>';
        
    }
    public function up($name, $value)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `$name` = '".$value."' WHERE `id` = '" . $this->id . "'");
    }
    
    public function info()
    {
        return $this->id;
    }
    
    public function upthongtin($name,$value)
    {
        global $mysqli;
        $this->thongtin->$name = $value;
        $mysqli->query("UPDATE `nguoichoi` SET `thongtin` = '" . json_encode($this->thongtin,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "' WHERE `id` = '" . $this->id . "'");
    }
    
    public function upxu($vnd)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `xu` = `xu` +  '" . $vnd . "' WHERE `id` = '" . $this->id . "'");
    }
    public function upwin($vnd)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `win` = `win` +  '" . $vnd . "' WHERE `id` = '" . $this->id . "'");
    }
    
    public function upxu2($vnd)
    {
        global $mysqli;
        $mysqli->query("UPDATE `nguoichoi` SET `tien` = `tien` +  '" . $vnd . "' WHERE `id` = '" . $this->id . "'");
    }
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}

function random($length) {

return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

}

function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}

function az($length = 10) {

return md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length));

}

function tron($k)
{
    if($k < 1000) return $k;
    else if($k>=1000 AND $k < 1000000) return number_format($k/1000).'K';
    else if($k>=1000000) return number_format($k/1000000).'M';
}



function right()
{
    global $id, $u;
    if($id >=1)
    {
        return '<ul class="navbar-nav float-right">
                      <li class="nav-item dropdown">
                            <a onclick="list_chat()" class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                                
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <span class="with-arrow"><span class="bg-danger"></span></span>
                                <ul class="list-style-none" id="result_msg">
                                  
                                  
                                    <li>
                                        <a class="nav-link text-center link text-dark" href="/chat/messenger.html"> <b>Xem tất cả</b> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="'.$u->thongtin->avatar.'" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                                    <div class=""><img src="'.$u->thongtin->avatar.'" alt="user" class="img-circle" width="60"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0">Xin chào, '.$u->name().'</h4>
                                        <p class=" mb-0"><b class="mymoney">'.$u->xu.'</b> xu</p> 
                                    </div>
                                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
</div>
                                </div>
                                
                                
                                <a class="dropdown-item" href="/profile/profile.html"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                                <a class="dropdown-item" href="/profile/sodu.html"><i class="ti-wallet mr-1 ml-1"></i> Lịch sử xu</a>
                                <a class="dropdown-item" href="/profile/nick.html"><i class="ti-email mr-1 ml-1"></i> Lịch sử mua nick</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/profile/login.html"><i class="ti-settings mr-1 ml-1"></i> Lịch sử đăng nhập</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="outgame()"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>
                        
                    </ul>';
    }
    
    return '<ul class="navbar-nav float-right">
                      
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                                    <div class=""><img src="/assets/images/users/1.jpg" alt="user" class="img-circle" width="60"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0">Xin chào, khách</h4>
                                        <p class=" mb-0 mymoney">0</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="/guest/dangnhap.html"><i class="ti-user mr-1 ml-1"></i> Đăng nhập</a>
                                <a class="dropdown-item" href="/guest/dangki.html"><i class="far fa-address-book mr-1 ml-1"></i> Đăng kí</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/guest/quenmatkhau.html"><i class="ti-settings mr-1 ml-1"></i> Quên mật khẩu ?</a>
                                <div class="dropdown-divider"></div>
                                
                            </div> 
                        </li>
                        
                    </ul>';
}


function left()
{
    global $id, $u;
    if($id >=1)
    {
        /*Menu CTV*/
        if($u->admin >=1)
        {
          //ctv
        }
        
        
        /*End*/
        if($u->admin >=5)
        {
            $menu_admin.='';
            /*
                - Menu của hệ thống
            */
            

          $menu_admin.= '<li class="nav-parent">
<a>
<i style="color:#ffa800" class="fa fa-user" aria-hidden="true"></i>
<span>Quản lý</span>
</a>
<ul class="nav nav-children" style="">
<li><a href="/admin/search.html">Tìm kiếm người chơi</a></li>
<li><a href="/admin/users.html">Danh sách người chơi</a></li>
<li><a href="/admin/tongquan.html">Thống kê</a></li>
</ul>
</li>';
                    
                    
                    
                      $menu_admin.= '<li class="nav-parent">
<a>
<i style="color:#ffa800" class="fa fa-user" aria-hidden="true"></i>
<span>Hệ Thống</span>
</a>
<ul class="nav nav-children" style="">
<li><a href="/admin/page.html">Cài đặt trang</a></li>
<li><a href="/admin/system.html">Cài đặt system</a></li>
<li><a href="/admin/tile.html">Tỉ lệ</a></li>
</ul>
</li>';
            
              
                      $menu_admin.= '<li class="nav-parent">
<a>
<i style="color:#ffa800" class="fa fa-user" aria-hidden="true"></i>
<span>Chức năng</span>
</a>
<ul class="nav nav-children" style="">
<li><a href="/admin/giftcode.html">Mã quà tặng</a></li>
<li><a href="/admin/rutvang.html">Rút vàng</a></li>
<li><a href="/admin/napvang.html">Nạp vàng</a></li>


<li><a href="/admin/napxu.html">Nạp xu</a></li>

</ul>
</li>';
            
                  
            
            
            
            
            
                        
          
                        

                        
                       // $menu_admin.='<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-bars"></i><span class="hide-menu">Shop nick </span></a>
                            //<ul aria-expanded="false" class="collapse  first-level">
                            //    <li class="sidebar-item"><a href="/admin/shopnick_danhmuc.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Quản lý danh mục </span></a></li>
                           //     <li class="sidebar-item"><a href="/admin/shopnick_list.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Danh sách nick </span></a></li>
                               // <li class="sidebar-item"><a href="/admin/shopnick_themnick.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Thêm nick </span></a></li>
                          //  </ul>
                        //</li>
                        
                         
                       // ';
            $menu_admin.='<li class="nav-item">
<a data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened" href="/admin/tool.html">
<i style="color: #03a9f4;" class="fa fa-location-arrow" aria-hidden="true"></i>
<span>Tool</span>
</a>
</li>';
            
        }
        
        return '
        
      

        
        
        <li class="nav-item">
<a data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened" href="/profile/profile.html?id='.$u->id.'">
<i style="color: #f403f3;" class="fa fa-user" aria-hidden="true"></i>
<span>Cá nhân</span>
</a>
</li>

   
  
        <li class="nav-parent">
<a>
<i style="color:#00ff01" class="fa fa-plus" aria-hidden="true"></i>
<span>Nạp xu</span>
</a>
<ul class="nav nav-children">
<li><a  href="/true/napthe.html">-Nạp xu bằng Card</a></li>
<li><a  href="/true/napvang.html">-Nạp xu bằng vàng</a></li>
<li><a  href="/true/naptsr.html">-Nạp xu bằng thesieure</a></li>
</ul>
</li>

<li class="nav-item">
<a data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened" href="/true/chuyentien.html">
<i style="color: #b4f403;" class="fa fa-location-arrow" aria-hidden="true"></i>
<span>Chuyển xu</span>
</a>
</li>
<li class="nav-item">
<a data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened" href="/true/rutvang.html">
<i style="color: #ab42ca;" class="fa fa-mail-forward" aria-hidden="true"></i>
<span>Rút vàng</span>
</a>
</li>

'.$menu_admin.'


<li class="nav-parent">
<a>
<i style="color:#00ffb2" class="fa fa-gamepad" aria-hidden="true"></i>
<span>Tài xỉu</span>
</a>
<ul class="nav nav-children" style="">
<li><a href="/ngocrong/phien.html">Phiên Tài xỉu</a></li>
<li><a href="/ngocrong/cuoc.html">Lịch sử cược</a></li>
<li><a href="/ngocrong/huongdan.html">Hướng dẫn</a></li>
</ul>
</li>

<li class="nav-parent">
<a>
<i style="color:#ffa800" class="fa fa-gamepad" aria-hidden="true"></i>
<span>Bầu cua</span>
</a>
<ul class="nav nav-children" style="">
<li><a href="/baucua/phien.html">Phiên</a></li>
<li><a href="/baucua/cuoc.html">Lịch sử cược</a></li>
<li><a href="/baucua/huongdan.html">Hướng dẫn</a></li>
</ul>
</li>




<li class="nav-item">
<a data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened" href="/true/top.html">
<i style="color: #cc51ff;" class="fa fa-credit-card" aria-hidden="true"></i>
<span>Bảng xếp hạng</span>
</a>
</li>


<li class="nav-item">
<a data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened" href="/true/topday.html">
<i style="color: #4ef6ac;" class="fa fa-credit-card" aria-hidden="true"></i>
<span>Top ngày</span>
</a>
</li>




<li class="nav-item">
<a data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened" href="/true/giftcode.html">
<i style="color: #cc51ff;" class="fa fa-gift" aria-hidden="true"></i>
<span>GiftCode</span>
</a>
</li>













<li class="nav-item">
<a data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened" href="#" onclick="outgame();" >
<i style="color: #03a9f4;" class="fa fa-sign-out" aria-hidden="true"></i>
<span>Đăng xuất</span>
</a>
</li>






</li>


'


;
        
        
        
        
    }
    
    
    if($id <=0)
    {
        return '<li class="nav-parent">
<a>
<i style="color:#ffa800" class="fa fa-user" aria-hidden="true"></i>
<span>Đăng nhập</span>
</a>
<ul class="nav nav-children">
<li><a href="/guest/dangnhap.html">Đăng nhập tài khoản</a></li>
<li><a href="/guest/dangki.html">Đăng ký tài khoản</a></li>
</ul>
</li>';
        
        
        
        
        
    }
}





function trang($url, $start, $total, $kmess) {
    $out[] = '<ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li class="disabled"><a  href="' . strtr($url, array('%' => '%%')) . 'p=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="active"><a class="undefined">' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '>');
    }
    $out[] = '</ul>';
    return implode('', $out);
}

function thongbao($msg,$type)
{
    return '<div id="checkpopup" class="dragon-notice-gold action-show" style="opacity: 1;">
<div class="overlay"></div>
<div class="notice-gold-content">
<div class="notice-gold-header">
<div class="notice-gold-title"></div>
<a href="#" onclick="confirm_popup()"><div class="notice-gold-close"></div></a>
</div>
<div class="notice-gold-body">
<p>'.$msg.'</p>
<a href="#" onclick="confirm_popup()"><div class="notice-gold-confim"></div></a>
</div>
</div>
</div>    
';
    
   /* 
    return '<div class="alert alert-'.($type == 'thanhcong' ? 'success' : '').''.($type == 'canhbao' ? 'warning' : '').''.($type == 'loi' ? 'danger' : '').'"> '.$msg.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
</div>';
*/


}
function json($data)
{
    $data->postdata->cookie = $_COOKIE;
    $data->postdata->get = $_GET;
    $data->postdata->post = $_POST;
    $data->game = md5(time());
    $data->ducnghia->game->form->error = array("time" => 1);
    $data->{'system'}->game = array("Tác giả" => "", "facebook" => "https://facebook.com/", "email" => "@gmail.com", "Tên dự án" => "Web game tài xỉu, mini Ngọc Rồng Online");
    $data->{'while'}->json = true;
    $data->mudules = array(
        "php_version" =>  phpversion()
        );
    //return json_encode($data,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return json_encode($data);
}
function top()
{
    return include_once('head.php');
}
function trangthai($c)
{
    if($c ==0) return '<b><font color="red">Chờ</font></b>';
    if($c ==1) return '<b><font color="green">Thành công</font></b>';
    if($c ==2) return '<b><font color="yellow">Thất bại</font></b>';
    
}
function close()
{
    return  include_once('end.php');
}

function head()
{
    return header('Content-Type: application/json;charset=utf-8');
}
function html($code)
{
    return htmlspecialchars($code);
}

function sodu($uid,$truoc,$xu,$noidung)
{
    global $thoigian, $mysqli;
    $mysqli->query("INSERT INTO `sodu` SET `uid` ='".$uid."', `truoc` = '".$truoc."', `sau` = '".($truoc+$xu)."', `time` = '".time()."', `xu` = '".$xu."', `noidung` = '".$noidung."', `thoigian` = '".$thoigian."'");
    
}
/*Sử lý tiền*/

/*xxxxxx*/