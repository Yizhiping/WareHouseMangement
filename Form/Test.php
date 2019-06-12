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

//var_dump($sfis->GetDatabaseInformation());
//print_r($sfis->WTSP_GETVERSION('W000805010-001','GET_TABLE','PALLET;MO,PALLET,ITEM,MODEL,SO,SOLINE,QTY;PALLET'));
$res = $sfis->WTSP_GETVERSION('W000792545','GET_TABLE','SO;SO,SOLINE,ITEM,MODEL;SO');
//$res = $sfis->WTSP_GETVERSION('Z0192440D','GET_TABLE','PALLET;PALLET,ITEM,MODEL,SO,SOLINE,QTY;PALLET');


if($res != false)
{
    print_r($res);
} else {
    echo $sfis->err;
}

/*
 *
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