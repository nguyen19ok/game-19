<?PHP
include_once('../../../core/system/config.php');

if($_POST[url]) {
    $anh = $_POST[url];
} else {
	$anh = $_FILES["files"]["tmp_name"][0];
}
$file = file_get_contents($anh);
$url = 'https://api.imgur.com/3/image';
$headers = array("Authorization: Client-ID f22b79927014872");
$pvars  = array('image' => base64_encode($file));
$curl = curl_init();
curl_setopt_array($curl, array(
   CURLOPT_URL=> $url,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_POST => 1,
   CURLOPT_RETURNTRANSFER => 1,
   CURLOPT_HTTPHEADER => $headers,
   CURLOPT_POSTFIELDS => $pvars
));
$json_returned = curl_exec($curl); // blank response
$img = json_decode($json_returned,true);

if(!$img['data']['link']) {
  $n->error = "true";  
}
else  {
    $n->error = "false";
    $n->url = $img['data']['link'];
    $url =  $n->url;
}
$j->from = 'DucNghia';
$j->facebook='fb.com/ducnghiast';
echo json_encode($n);