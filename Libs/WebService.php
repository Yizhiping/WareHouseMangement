<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/12
 * Time: 10:15
 */
require_once "lib/nusoap.php";        //引用NuSoap
class WebService
{
    private $url = 'Http://172.24.248.15/sfiswebservice/sfistspwebservice.asmx?WSDL';
//   private $url = 'http://172.24.255.10/SFISWebService_SZASCD0QA/SFISTSPWebService.asmx?WSDL';        //測試地址
    private $uid = 'TSP_BBPE';  //賬號
    private $pwd = 'wk4jd9';    //密碼
    private $device = "";       //撥號
    private $opid = "";         //工號
    private $SoapClient;
    public $result;            //執行結果的源代碼
    public $err;               //發生錯誤時的錯誤內容


    /**
     * WebService constructor.
     * @param $device   撥號
     * @param $opid     工號
     */
    public function __construct($device, $opid)
    {
        $this->SoapClient = new nusoap_client($this->url,'wsdl');
        $this->SoapClient->timeout = 2000;
        $this->device = $device;
        $this->opid = $opid;

    }

    public function GetDatabaseInformation()
    {
        return $this->getResult(__FUNCTION__, $this->SoapClient->call(__FUNCTION__,array()));
    }

    /**
     * @param $isn  查詢的序列號
     * @param $type 查詢類型
     * @param string $chkdat1   CheckData1
     * @param string $chkdat2   CheckData2
     * @return array|bool   成功返回結果,失敗返回false
     */
    public function WTSP_GETVERSION($isn, $type, $chkdat1=' ', $chkdat2=' ' )
    {
        $paras = array(
                'programId'=>$this->uid,
                'programPassword'=>$this->pwd,
                'ISN'=>$isn,
                'device'=>$this->device,
                'type'=>$type,
                'ChkData'=>$chkdat1,
                'ChkData2'=>$chkdat2
                );
        return $this->getResult(__FUNCTION__, $this->SoapClient->call(__FUNCTION__,$paras));
    }

    /**
     * @param $methodName   方法名稱
     * @param $obj  從SoapCall返回的對象
     * @return array|bool 如果執行失敗返回false, 執行成功返回結果.
     */
    private function getResult($methodName, $obj)
    {
        $this->result = $obj[$methodName . 'Result'];
        $arr = explode(chr(127),$obj[$methodName . 'Result'] );

        if($arr[0] == '1')
        {
            return $arr;
        } else {
            $this->err = $arr[1];
            return false;
        }

    }
}