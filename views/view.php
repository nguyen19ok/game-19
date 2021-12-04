<?PHP
include_once('../core/system/config.php');
echo 'Thẻ cào hôm nay: ';
$vangg = $mysqli->query("SELECT * FROM `napthe`");

while($vang=$vangg->fetch_assoc())
{  
    if (strpos($vang['thoigian'], $ngaythangnam) !== false&&$vang['status']=='Thành công') 
    {
    $money +=$vang['menhgia'];
    }
}
echo number_format($money);
echo '<br>Tsr hom nay: ';
$vanggg = $mysqli->query("SELECT * FROM `historytsr`");

while($vangg=$vanggg->fetch_assoc())
{  
    if (strpos($vangg['thoigian'], $ngay.'-'.$thang) !== false) 
    {
    $money2 +=$vangg['sotien'];
    }
}
echo number_format($money2);

