<?PHP
include_once('../../../core/system/config.php');
$title = 'Thống kê hệ thống';
include_once('../../../core/system/head.php');

if($admin <=4)
{
    exit();
}



?>
<div class="noti-info">
<div class="noti-info">                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                               <div class="d-flex">
                                    <div class="m-r-10">
                                        <span>Số thành viên</span>
                                        <h4><?=number_format($mysqli->query("SELECT * FROM `nguoichoi`")->num_rows)?></h4>
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                               <div class="d-flex">
                                    <div class="m-r-10">
                                        <span>Số Xu</span>
                                        <h4><?=number_format($mysqli->query("SELECT SUM(xu) as 'ducnghia' FROM `nguoichoi`")->fetch_assoc()['ducnghia'])?></h4>
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                               <div class="d-flex">
                                    <div class="m-r-10">
                                        <span>Số VND</span>
                                        <h4><?=number_format($mysqli->query("SELECT SUM(vnd) as 'ducnghia' FROM `nguoichoi`")->fetch_assoc()['ducnghia'])?></h4>
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    
                </div>
<?PHP
$logia = $mysqli->query("SELECT * FROM `doanhthu` WHERE `thang` = '".$thang."' AND `nam` = '".$nam."' ORDER by `ngay` ASC");
//*Tai xiu*//
$taixiu_thang = '0';
$taixiu_thua = '0';
$taixiu_tienthang = 0;
$taixiu_tienthua = 0;
$taixiu_tienphi = 0;
$chanle_thang = '0';
$chanle_thua = '0';
$chanle_tienthang = 0;
$chanle_tienthua = 0;
$chanle_tienphi = 0;
$baucua_thang = '0';
$baucua_thua = '0';
$baucua_tienthang = 0;
$baucua_tienthua = 0;
$baucua_tienphi = 0;

$rutvang_allxu = '0';
$rutvang_allvang = '0';
$rutvang_tienxu = 0;
$rutvang_tienvang = 0;

$bannick_tienxu = '0';
$bannick_tienxu_thue = '0';
$bannick_tienvnd = '0';
$bannick_tienvnd_thue  = '0';

$bannick_tongtienxu  = 0;
$bannick_tongtienxu_thue = 0;
$bannick_tongtienvnd = 0;
$bannick_tongtienvnd_thue = 0;
$naptien_vang = '0';
$napvang_total = 0;
while($data = $logia->fetch_assoc())
{
    
    $game = json_decode($data['data'],true);
    /**/
    $naptien_vang.=','.round($game['napvang']).'';
    $napvang_total+=round($game['napvang']);
    #end
    /*Tiền nick*/
    $bannick_tienxu.= ','.round($game['tiennick_xu']).'';
    $bannick_tongtienxu+=round($game['tiennick_xu']);
    $bannick_tongtienxu_thue+=round($game['tiennick_xu_thue']);
    $bannick_tienxu_thue.= ','.round($game['tiennick_xu_thue']).'';
    $bannick_tienvnd.= ','.round($game['tiennick_vnd']).'';
    $bannick_tienvnd_thue.= ','.round($game['tiennick_vnd_thue']).'';
    $bannick_tongtienvnd+=round($game['tiennick_vnd']);
    $bannick_tongtienvnd_thue+=round($game['tiennick_vnd_thue']);
    
    #end
    /*rút vàng*/
    $rutvang_allxu.=','.round($game['xu_rutvang']).'';
    $rutvang_allvang.=','.round($game['xu_rutvang']).'';
    $rutvang_tienxu+=round($game['xu_rutvang']);
    $rutvang_tienvang+=round($game['xu_rutvang']);
    #end
    /*Tai xiu*/
    $taixiu_thang.=','.round($game['taixiu_win']).'';
    $taixiu_thua.=','.round($game['taixiu_lose']).'';
    $taixiu_tienthang+=round($game['taixiu_win']);
    $taixiu_tienthua+=round($game['taixiu_lose']);
    $taixiu_tienphi+=round($game['taixiu_phi']);
    
    $baucua_thang.=','.round($game['baucua_win']).'';
    $baucua_thua.=','.round($game['baucua_lose']).'';
    $baucua_tienthang+=round($game['baucua_win']);
    $baucua_tienthua+=round($game['baucua_lose']);
    $baucua_tienphi+=round($game['baucua_phi']);
    
     $chanle_thang.=','.round($game['chanle_win']).'';
    $chanle_thua.=','.round($game['chanle_lose']).'';
    $chanle_tienthang+=round($game['chanle_win']);
    $chanle_tienthua+=round($game['chanle_lose']);
    $chanle_tienphi+=round($game['chanle_phi']);
}
?>

 <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <h4 class="card-title">Tiền nạp</h4>
                            <div class="card-body">
                                <!---------->
                                 <canvas id="log_naptien" height="150"></canvas>
                                <!------Source----->
                                <script>
                                    new Chart(document.getElementById("log_naptien"), {
	  type: 'line',
	  data: {
		labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		datasets: [{ 
			data: [<?=$naptien_vang?>],
			label: "Tiền vàng",
			borderColor: "#3e95cd",
			fill: false
		  },
		]
	  },
	  options: {
		title: {
		  display: true,
		  text: 'Doanh thu từng ngày'
		}
	  }
	});
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-log-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Tổng quan nạp tiền</h4>
                            <canvas id="tongquan_naptien" height="200"></canvas>
                            <script>
                                new Chart(document.getElementById("tongquan_naptien"), {
		type: 'bar',
		data: {
		  labels: ["Tiền vàng"],
		  datasets: [
			{
			  label: "Tổng",
			  backgroundColor: ["#03a9f4", "#e861ff","#e40503","#e2b35b","#e40503"],
			  data: [<?=$napvang_total?>,<?=$taixiu_tienthua?>,<?=$taixiu_tienphi?>,4784,3433]
			}
		  ]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Tổng trong 30 ngày qua'
		  }
		}
	});
                            </script>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <h4 class="card-title">Tài xỉu</h4>
                            <div class="card-body">
                                <!---------->
                                 <canvas id="log_taixiu" height="150"></canvas>
                                <!------Source----->
                                <script>
                                    new Chart(document.getElementById("log_taixiu"), {
	  type: 'line',
	  data: {
		labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		datasets: [{ 
			data: [<?=$taixiu_thang?>],
			label: "Thắng",
			borderColor: "#3e95cd",
			fill: false
		  }, { 
			data: [<?=$taixiu_thua?>],
			label: "Thua",
			borderColor: "#000000",
			fill: false
		  }
		]
	  },
	  options: {
		title: {
		  display: true,
		  text: 'Doanh thu từng ngày'
		}
	  }
	});
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-log-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Tổng quan tài xỉu</h4>
                            <canvas id="tongquan_taixiu" height="200"></canvas>
                            <script>
                                new Chart(document.getElementById("tongquan_taixiu"), {
		type: 'bar',
		data: {
		  labels: ["Tiền thắng", "Tiền thua", "Tiền phí"],
		  datasets: [
			{
			  label: "Tổng",
			  backgroundColor: ["#03a9f4", "#e861ff","#e40503","#e2b35b","#e40503"],
			  data: [<?=$taixiu_tienthang?>,<?=$taixiu_tienthua?>,<?=$taixiu_tienphi?>,4784,3433]
			}
		  ]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Tổng trong 30 ngày qua'
		  }
		}
	});
                            </script>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
                
                
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <h4 class="card-title">Bầu cua</h4>
                            <div class="card-body">
                                <!---------->
                                 <canvas id="log_baucua" height="150"></canvas>
                                <!------Source----->
                                <script>
                                    new Chart(document.getElementById("log_baucua"), {
	  type: 'line',
	  data: {
		labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		datasets: [{ 
			data: [<?=$baucua_thang?>],
			label: "Thắng",
			borderColor: "#3e95cd",
			fill: false
		  }, { 
			data: [<?=$baucua_thua?>],
			label: "Thua",
			borderColor: "#000000",
			fill: false
		  }
		]
	  },
	  options: {
		title: {
		  display: true,
		  text: 'Doanh thu từng ngày'
		}
	  }
	});
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-log-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Tổng quan bầu cua</h4>
                            <canvas id="tongquan_baucua" height="200"></canvas>
                            <script>
                                new Chart(document.getElementById("tongquan_baucua"), {
		type: 'bar',
		data: {
		  labels: ["Tiền thắng", "Tiền thua", "Tiền phí"],
		  datasets: [
			{
			  label: "Tổng",
			  backgroundColor: ["#03a9f4", "#e861ff","#e40503","#e2b35b","#e40503"],
			  data: [<?=$baucua_tienthang?>,<?=$baucua_tienthua?>,<?=$baucua_tienphi?>,4784,3433]
			}
		  ]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Tổng trong 30 ngày qua'
		  }
		}
	});
                            </script>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
                
                
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <h4 class="card-title">Chẳn lẻ</h4>
                            <div class="card-body">
                                <!---------->
                                 <canvas id="log_chanle" height="150"></canvas>
                                <!------Source----->
                                <script>
                                    new Chart(document.getElementById("log_chanle"), {
	  type: 'line',
	  data: {
		labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		datasets: [{ 
			data: [<?=$chanle_thang?>],
			label: "Thắng",
			borderColor: "#3e95cd",
			fill: false
		  }, { 
			data: [<?=$chanle_thua?>],
			label: "Thua",
			borderColor: "#000000",
			fill: false
		  }
		]
	  },
	  options: {
		title: {
		  display: true,
		  text: 'Doanh thu từng ngày'
		}
	  }
	});
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-log-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Tổng quan Chẵn lẻ</h4>
                            <canvas id="tongquan_chanle" height="200"></canvas>
                            <script>
                                new Chart(document.getElementById("tongquan_chanle"), {
		type: 'bar',
		data: {
		  labels: ["Tiền thắng", "Tiền thua", "Tiền phí"],
		  datasets: [
			{
			  label: "Tổng",
			  backgroundColor: ["#03a9f4", "#e861ff","#e40503","#e2b35b","#e40503"],
			  data: [<?=$chanle_tienthang?>,<?=$chanle_tienthua?>,<?=$chanle_tienphi?>,4784,3433]
			}
		  ]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Tổng trong 30 ngày qua'
		  }
		}
	});
                            </script>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
                
                 <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <h4 class="card-title">Tiền rút</h4>
                            <div class="card-body">
                                <!---------->
                                 <canvas id="log_rutvang" height="150"></canvas>
                                <!------Source----->
                                <script>
                                    new Chart(document.getElementById("log_rutvang"), {
	  type: 'line',
	  data: {
		labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		datasets: [{ 
			data: [<?=$rutvang_allxu?>],
			label: "Tiền xu",
			borderColor: "#3e95cd",
			fill: false
		  }, { 
			data: [<?=$rutvang_allvang?>],
			label: "Tính vàng",
			borderColor: "#000000",
			fill: false
		  }
		]
	  },
	  options: {
		title: {
		  display: true,
		  text: 'Doanh thu từng ngày'
		}
	  }
	});
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-log-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Tổng quan</h4>
                            <canvas id="tongquan_rutvang" height="200"></canvas>
                            <script>
                                new Chart(document.getElementById("tongquan_rutvang"), {
		type: 'bar',
		data: {
		  labels: ["Tiền xu", "Tính vàng"],
		  datasets: [
			{
			  label: "Tổng",
			  backgroundColor: ["#03a9f4", "#e861ff","#e40503","#e2b35b","#e40503"],
			  data: [<?=$rutvang_tienxu?>,<?=$rutvang_tienvang?>,0,4784,3433]
			}
		  ]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Tổng trong 30 ngày qua'
		  }
		}
	});
                            </script>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <h4 class="card-title">Tiền bán nick </h4>
                            <div class="card-body">
                                <!---------->
                                 <canvas id="log_bannick" height="150"></canvas>
                                <!------Source----->
                                <script>
                                    new Chart(document.getElementById("log_bannick"), {
	  type: 'line',
	  data: {
		labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
		datasets: [
		    { 
			data: [<?=$bannick_tienxu?>],
			label: "Tiền xu",
			borderColor: "#3e95cd",
			fill: false
		  },
		  
		  { 
			data: [<?=$bannick_tienxu_thue?>],
			label: "Tiền thuế xu",
			borderColor: "#e40503",
			fill: false
		  },
		  
		  { 
			data: [<?=$bannick_tienvnd?>],
			label: "Tiền VNĐ",
			borderColor: "#000000",
			fill: false
		  },
		  { 
			data: [<?=$bannick_tienvnd_thue?>],
			label: "Tiền VNĐ thuế",
			borderColor: "#e2b35b",
			fill: false
		  },
		]
	  },
	  options: {
		title: {
		  display: true,
		  text: 'Doanh thu từng ngày'
		}
	  }
	});
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-log-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Tổng quan</h4>
                            <canvas id="tongquan_bannick" height="200"></canvas>
                            <script>
                                new Chart(document.getElementById("tongquan_bannick"), {
		type: 'bar',
		data: {
		  labels: ["Tiền xu", "Tính vàng", "thuế xu", "thuế vàng"],
		  datasets: [
			{
			  label: "Tổng",
			  backgroundColor: ["#03a9f4", "#e861ff","#e40503","#e2b35b","#e40503"],
			  data: [<?=$bannick_tongtienxu?>,<?=$bannick_tongtienvnd?>,<?=$bannick_tongtienxu_thue?>,<?=$bannick_tongtienvnd_thue?>,3433]
			}
		  ]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true,
			text: 'Tổng trong 30 ngày qua'
		  }
		}
	});
                            </script>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
                            </div>
    
                

           
<?PHP
include_once('../../../core/system/end.php');
?>