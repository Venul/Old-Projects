<?php
$host="62.149.150.155"; $user="Sql547995"; $pass="efe7c4ff"; $dbase="Sql547995_1";
$db = @mysql_connect($host,$user,$pass) or die("Could not connect: " . mysql_error()); mysql_select_db($dbase,$db);

if (isset($_GET["q"]) and $_GET["q"] > 0) {

//print_r($_GET);

	$result=mysql_query("SELECT * FROM price WHERE id='".$_GET[w]."' and active=1");
	$price=mysql_fetch_array($result,MYSQL_ASSOC);

		$ballcost = Array($price[ball_40],$price[ball_60],$price[ball_65],$price[ball_80],$price[ball_100],$price[ball_150]);
		$packprice = Array(
			Array(0,$price[pack_40BL8],$price[pack_40BL12]),
			Array(0,$price[pack_60CR1],$price[pack_60BL1]),
			Array(0,$price[pack_65CR1],$price[pack_65BL1]),
			Array(0,$price[pack_80CR1],$price[pack_80BL1]),
			Array(0,$price[pack_100CR1],$price[pack_100BL1]),
			Array(0,$price[pack_150CR1]));

//    [hand_40] =&gt; 0.40
//    [hand_60] =&gt; 0.45
//    [hand_65] =&gt; 0.45
//    [hand_80] =&gt; 0.55
//    [hand_100] =&gt; 0.70
//    [hand_150] =&gt; 1.00

//echo 'prepare cost '.$price[prepare_cost]*$_GET[c];
//echo 'stamp cost '.$price[print_cost]*$_GET[c]*$_GET[q];
//echo 'balls cost '.$ballcost[$_GET[s]]*$_GET[q];
//echo 'pack cost '.$packprice[$_GET[s]][$_GET[p]]*$_GET[q];

$price=round(($price[prepare_cost]*$_GET[c]+$price[print_cost]*$_GET[c]*$_GET[q]+$ballcost[$_GET[s]]*$_GET[q]+$packprice[$_GET[s]][$_GET[p]]*$_GET[q])/$_GET[q],2);

}else{$price=0;}

if (isset($_GET["d"]) and $_GET["d"] != '') {

	$result2=mysql_query("SELECT * FROM utenti WHERE promocod='".$_GET[d]."'");
	$discount=mysql_fetch_array($result2,MYSQL_ASSOC); $sconto=$discount[sconto];

}else{ $sconto='';}

$summ=$price*$_GET[q]-($price*$_GET[q]*$sconto/100);

echo number_format($summ, 2, ',', '.' ).'|'.$sconto;
?>