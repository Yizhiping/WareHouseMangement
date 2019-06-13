<?php
define('EOL', '<br />');
require_once "../Libs/func.php";

$isn = __get('isn');
$type = __get('type');
$chkdat = __get('chkdat');
$chkdat2= __get('chkdat2');

?>

<form method="post">
    <label for="isn">ISN</label><input type="text" name="isn" value="<?PHP echo $isn ?>">
<!--    <label for="type">TYPE</label><input type="text" name="type" value="--><?PHP //echo $type ?><!--"><br />-->
<!--    <label for="chkdat">CHKDAT</label><input style="width: 400px;" type="text" name="chkdat" value="--><?PHP //echo $chkdat ?><!--"><br />-->
<!--    <label for="chkdat2">CHKDAT</label><input style="width: 400px;" type="text" name="chkdat2" value="--><?PHP //echo $chkdat2 ?><!--"><br />-->
    <input type="submit" value="Search">
</form>

<?php
date_default_timezone_set('Asia/ShangHai');
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/11
 * Time: 8:34
 */

require_once "../Libs/WebService.php";

$sfis = new WebService('111111','S09264888');

//第一步, 取得刷入條碼對應的SFIS ISN
$res = $sfis->WTSP_GETVERSION($isn,'ITEMINFO',null,null);
$sfisSN = $res[5];
$item = $res[2];
$mfmodel = $res[3];

//第二部, 使用ISN取得對應產品信息
$res = $sfis->WTSP_GETVERSION($sfisSN,'GET_TABLE','ISN;MODEL,PALLET,ITEM,MO,SO;ISN',null);
$res = explode(',',$res[2]);
$model = $res[1];
$pallet = $res[2];
$mo = $res[4];
$so = $res[5];

//第三部, 使用pallet取得對應棧板數量
$res = $sfis->WTSP_GETVERSION($pallet,'GET_TABLE','PALLET;QTY;PALLET',null);
$res = explode(',',$res[2]);
$palletQty = $res[1];


echo "Search SN: {$isn}" . EOL;
echo "SFIS SN: {$sfisSN}" . EOL;
echo "90: {$item}" . EOL;
echo "MFMODEL: {$mfmodel}" . EOL;
echo "MODEL: {$model}" . EOL;
echo "MO: {$mo}" . EOL;
echo "SO: {$so}" . EOL;
echo "PALLET: {$pallet}" . EOL;
echo "Qty: {$palletQty}";




/*
 *
 * 0=>1
1=>TYPE:[ITEMINFO] GET INFO ISN:[748A0DD24457/183239860001698] TYPE:[ITEMINFO] OK!!(TSP_GETVERSION)
2=>90B2AA100010
3=>TG2482A/NA-85/1000954/ARRIS;
4=>183239860001698
5=>183239860001698
6=>
7=>
 * Array
(
    [0] => 1
    [1] => TYPE:[GET_TABLE] DATA GET OK!(TSP_GV_GET_TABLE)(TSP_GETVERSION)
    [2] => ,E934,W000792545,10,90
    [3] =>
    [4] =>
    [5] =>
    [6] =>
    [7] =>
)

Array
(
    [0] => 1
    [1] => TYPE:[GET_TABLE] DATA GET OK!(TSP_GV_GET_TABLE)(TSP_GETVERSION)
    [2] => ,W000792545,10,90B2-9L10020,E934
    [3] =>
    [4] =>
    [5] =>
    [6] =>
    [7] =>
)

 */
?>

