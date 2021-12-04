<?PHP
include_once('../../../core/system/config.php');

head();
 function convertBase64ToImage($photo = null, $path = null) {
    if (!empty($photo)) {
        $photo = str_replace('data:image/png;base64,', '', $photo);
        $photo = str_replace(' ', '+', $photo);
        $photo = str_replace('data:image/jpeg;base64,', '', $photo);
        $photo = str_replace('data:image/gif;base64,', '', $photo);
        $entry = base64_decode($photo);
        $image = imagecreatefromstring($entry);
        $white = imagecolorallocate($image, 51, 51, 51, 1);
        $font = 'font.ttf'; 
        imagettftext($image, 24, 0, 5, 24, $white, $font, 'TOICONTRE');
        $fileName = time() . ".png";
        $directory = "cache/" . $fileName;

        if (!empty($path)) {
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $saveImage = imagepng($image, $directory);

        //imagedestroy($image);

        if ($saveImage) {
            return $fileName;
        } else {
            return false; // image not saved
        }
    }
}
$url = 'https://api.imgur.com/3/image';
$headers = array("Authorization: Client-ID f22b79927014872");
$upload = convertBase64ToImage($_POST['img']);
$file = file_get_contents('./cache/'.$upload);

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
unlink('core/application/true/cache/'.$upload);
if(!$img['data']['link']) {
  $n->error = "true";  
}
else  {
    $n->error = "false";
    $n->url = $img['data']['link'];
    $url =  $n->url;
}
$n->from = 'DucNghia';
$n->facebook='fb.com/ducnghiast';
echo json_encode($n);
curl_close ($curl); 