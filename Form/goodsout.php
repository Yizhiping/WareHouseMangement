<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/14
 * Time: 8:24
 */
#*******************引用庫文件**************************
require_once "Libs/Goods.php";                  //貨物庫

//*****************表單變量獲取**************************
$btnSearchGoods = __get('btnSearchGoods');      //查找按鈕
$btnGoodsOut = __get('btnGoodsOut');            //出貨按鈕
$btnGoodsChange = __get("btnGoodsChange");      //交換按鈕
$isn = __get('isn');                            //查詢的條件
$outType = __get('outType');                    //查詢的方式
$tragetShelf = __get('tragetShelf');            //目標儲位

#***********************變量定義*************************
$goods = new Goods();                               //貨物類實例化
$palletInfo = $goods->samplePalletInfo;             //貨物結構體
$res = null;                                        //搜索結果
$searchResultHtml = null;                           //html字符
$outTypeHtml = null;                                //查找方式html
$arrSearchType = array('byPalletId'=>'棧板','byShelfId'=>'儲位','bySoId'=>'訂單');
$err = false;                                       //出庫錯誤標誌位
$errPallets = array();                              //出庫失敗的棧板號

#***********************生成查找方式html*****************
foreach ($arrSearchType as $k=>$v)
{
    if($outType == $k) {
        $outTypeHtml .= "<option value='{$k}' selected='selected'>{$v}</option>";
    } else {
        $outTypeHtml .= "<option value='{$k}'>{$v}</option>";
    }
}

#***********************貨物查找*************************
if(!empty($btnSearchGoods))
{
    switch ($outType)
    {
        case 'byPalletId':
            $palletInfo['palletId'] = $isn;
            break;
        case 'byShelfId':
            $palletInfo['shelfId'] = $isn;
            break;
        case 'bySoId':
            $palletInfo['so'] = $isn;
            break;
    }
    #數據結構
    #ShelfId,PalletId,model,item,so,qty,customer,uid,datein
    if($res = $goods->getGoodsInfo($palletInfo))
    {
        $id = 0;
        $searchResultHtml .= "<table>";
        $searchResultHtml .= "<tr><td>項次</td><td>儲位</td><td>棧板號</td><td>機種</td><td>訂單</td><td>數量</td><td><input type='checkbox' id='selAll'/></td></tr>";
        foreach ($res as $r)
        {
            $id++;
            $searchResultHtml .= "<tr><td>{$id}</td><td>{$r[0]}</td><td>{$r[1]}</td><td>{$r[2]}</td><td>{$r[4]}</td><td>{$r[5]}</td><td><input type='checkbox' name='PID_{$r[1]}' class='clsSelPallet' value='{$r[1]}'/></td></tr>";
        }
        $searchResultHtml .= "</table>";
    } else {
        $searchResultHtml .= "<span>沒有找到任何結果</span>";
    }
}

#***********************出庫*****************************
if(!empty($btnGoodsOut))
{

    $isn = null;    #清空查詢條件
    #查找選中的棧板信息
    foreach ($_POST as $k=>$v)
    {
        #以PID開頭是提交的棧板號
        if(substr($k,0,4)=='PID_')
        {
            if(!$goods->goodsOut($v,$user->uid))
            {
                $err = true;
                array_push($errPallets,$v);
            }
        }
    }
    if($err)
    {
        __showMsg('操作未完成, 錯誤的棧板號為' . implode(',',$errPallets));
    } else {
        __showMsg('出貨成功.');
    }
}

#***********************儲位轉移*************************
if(!empty($btnGoodsChange))
{
    $isn = null;    #清空查詢條件
    #查找選中的棧板信息
    foreach ($_POST as $k=>$v)
    {
        #以PID開頭是提交的棧板號
        if(substr($k,0,4)=='PID_')
        {
            if(!$goods->updateShelfId($v,$tragetShelf))
            {
                $err = true;
                array_push($errPallets,$v);
            }
        }
    }
    if($err)
    {
        __showMsg('操作未完成, 錯誤的棧板號為' . implode(',',$errPallets));
    } else {
        __showMsg('儲位變更成功.');
    }
}

?>
<script type="text/javascript">
    $(document).ready(function (e) {
        $('#selAll').click(function (e) {
            if($(this).is(':checked')) {
                $('.clsSelPallet').prop('checked',true);
            } else {
                $('.clsSelPallet').prop('checked',false);
            }
        });

        $('#btnShowShelfChange').click(function (e) {
            if($('#divShelfChange').attr('display')=='block')
            {
                $('#divShelfChange').hide();
            } else {
                $('#divShelfChange').show();
            }
        });
    });
</script>
<form action="?act=goodsout" method="post" enctype="multipart/form-data" name="formGoodsOut" id="formGoodsOut">
  <label for="outType">方式:</label>
  <select name="outType" id="outType">
      <?php echo $outTypeHtml ?>
  </select>
  <label for="isn">查詢內容:</label>
  <input type="text" name="isn" id="isn" value="<?php echo $isn ?>"/>
  <input type="submit" name="btnSearchGoods" id="btnSearchGoods" value="查詢" />
  <input type="submit" name="btnGoodsOut" id="btnGoodsOut" value="出貨選定貨物" />
    <input type="button" id="btnShowShelfChange" name="btnShowShelfChange" value=" 變更儲位" />
    <div id="divShelfChange" style="display: none;">
        <label for="iptTargetShelf">目標儲位:</label>
        <?php __createList($conn->getLine('select shelfId from shelfs order by ShelfID'), 'tragetShelf', 'tragetShelf',null, $tragetShelf ); ?>
        <input type="submit" name="btnGoodsChange" id="btnGoodsChange" value="變更儲位" />
    </div>
    <div>
        <?php echo $searchResultHtml ?>
    </div>
</form>




