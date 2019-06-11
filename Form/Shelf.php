<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/10
 * Time: 13:21
 */
//搜索, 生成搜索表單

$tabstr = "";
$res = false;
$shelfSearch = __get('shelfSearch');
if(!empty(__get('btnShelfSearch')))
{

    $res = $conn->getAllRow("select ShelfID,Description from shelfs where ShelfID like '{$shelfSearch}'");
//    echo $conn->lastSql;
    if($res)
    {
        $id = 1;
        foreach ($res as $row)
        {
            $tabstr .= '<tr>' . '<td>' . $id++ . '</td>';
            $tabstr .= "<td>{$row[0]}</td><td>{$row[1]}</td>";
            $tabstr .= "<td><input class='shelfChkbox' type='checkbox' name='{$row[0]}' value='{$row[0]}'/></td></tr>";
        }
    }
}

//創建
$shelfID = __get('iptShelfCreate');
$shelfDesc = __get('iptShelfDescription');
if($subact == 'create' && !empty($shelfID) )
{
    if($conn->query("insert into shelfs (ShelfID, Description) value ('{$shelfID}','{$shelfDesc}')"))
    {
        __showMsg("創建成功.");
        $shelfID = $shelfDesc = "";
    } else {
        __showMsg("創建失敗." . $conn->getErr());
    }
}

//是否顯示創建
$showShelfCreate = $subact=="create" ? 'block' : 'none';

?>
<script type="text/javascript">
	$(document).ready(function(e) {
        $('#btnShowShelfBatchCreate').click(function (e) {      //顯示批量上傳
            $('#divShelfCreate').hide();
            $('#divShelfSearchResult').hide();
            $('#divShelfBatchCreate').show();
        });

        $('#btnShelfSearch').click(function (e) {               //搜索
            if($('#shelfSearch').val() =="")
            {
                alert("搜索條件不能為空.")
                return false;
            } else {
                $('#formShelf').submit();
            }
        });

        $('#btnShelfCreate').click(function (e) {               //單個創建
            if($('#iptShelfCreate').val().length != 7)
            {
                alert("儲位ID的長度為7位,請確認.");
                return false;
            } else {
                $('#formShelfCreate').submit();
            }
        });
        
        $('#btnShowShelfCreate').click(function (e) {           //顯示創建
            $('#divShelfSearchResult').hide();
            $('#divShelfBatchCreate').hide();
            $('#divShelfCreate').show();
        });

        $('#selAll').click(function (e) {                       //全部选中或取消选择
            if($(this).is(':checked')) {
                $('.shelfChkbox').prop('checked',true);
            } else {
                $('.shelfChkbox').prop('checked', false);
            }
        });
    });
</script>
<style>
    #divShelfSearchResult td{
        border: 1px solid #ddd;
    }
</style>
<div>
  <form id="formShelf" name="formShelf" method="post" action="?act=shelf">
		<label for="textfield">查詢條件</label>
          <input type="text" name="shelfSearch" id="shelfSearch" value="<?php echo $shelfSearch ?>"/>
      <?php __createButton('submit','btnShelfSearch','btnShelfSearch',null,'查詢',null,null) ?>
      <?php __createButton('button','btnShowShelfCreate','btnShowShelfCreate',null,'創建儲位',null,null) ?>
      <?php __createButton('submit','btnShowShelfBatchCreate','btnShowShelfBatchCreate',null,'批量創建',null,null) ?>
      <?php __createButton('submit','btnBatchDel','btnBatchDel',null,'刪除選中儲位',null,null) ?>
  </form>
</div>
<div style="display:none;" id="divShelfBatchCreate">
  <form id="form2" name="form2" method="post" action="">
    <label for="textfield2"></label>
    <input type="file" name="textfield2" id="textfield2" />
      <?php __createButton('submit','btnBatchUpload','btnBatchUpload',null,'批量上傳',null,null) ?>
  </form>
</div>
<div id="divShelfCreate" style="display: <?php echo $showShelfCreate ?>;">
  <form action="?act=shelf&amp;subact=create" method="post" enctype="multipart/form-data" name="formShelfCreate" id="formShelfCreate">
    儲位名稱

    <input type="text" name="iptShelfCreate" id="iptShelfCreate" value="<?php echo $shelfID ?>" />
    儲位說明
    <input type="text" name="iptShelfDescription" id="iptShelfDescription" value="<?php echo $shelfDesc ?>" />
      <?php __createButton('button','btnShelfCreate','btnShelfCreate',null,'創建',null,null) ?>
  </form>
</div>
<div id="divShelfSearchResult" style="display: <?php echo $res ? 'block' : 'none' ?>">
    <table>
        <tr>
            <td>項次</td>
            <td>儲位ID</td>
            <td>說明</td>
            <td><input type="checkbox" id="selAll" name="selAll"/></td>
        </tr>
        <?php echo $tabstr   ?>
    </table>
</div>
