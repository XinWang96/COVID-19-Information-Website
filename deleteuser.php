<!doctype html>
<html class="no-js" lang="">
<head>
  <title>CWRU COVID-19 Information Center</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.8/themes/default/easyui.css">
  <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.8/themes/icon.css">
  <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.8/demo.css">
  <script type="text/javascript" src="jquery-easyui-1.9.8/jquery.min.js"></script>
  <script type="text/javascript" src="jquery-easyui-1.9.8/jquery.easyui.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts-all-3.js"></script>
</head>

<body>
<div style="width:100%;height:400px;">

  <script>
    function onClickRow(index, attr, value){
      console.log(arguments)
      document.querySelector('.copy-username').value = value
      document.querySelector('.copy-user').value = value
    }
  </script>

  <table id="xxoo" class="easyui-datagrid copy-table" title="userinfo" style="width:100%;height:600px"
         data-options="singleSelect:true,url:'user.json',method:'get',onClickCell:onClickRow">
    <thead>
    <tr>
      <th data-options="field:'username',width:500">username</th>
      <th data-options="field:'authority',width:200,align:'left'">authority</th>
      </th>
    </tr>
    </thead>
    <!--<script>
      document.querySelector('.copy-table').addEventListener('click', (event) => {console.log(event)})
    </script>-->
  </table>


  <!--delete user-->
  <div style="width: 50%;height: 100px;float: left">
    <form id="deleteuser" action="deletes.php" method="post" target="hidden-form2">
      <h5>delete User</h5>
      <div style="width:400px;margin-bottom: 10px">
        <input name="delete_name" readonly type="text" class=" copy-username">
        <!--<button href="#"  class="easyui-linkbutton" type="submit" data-options="iconCls:'icon-ok'" style="padding:5px 0px;width:200px;height: 20px">
          <span style="font-size:14px;">delete</span>-->
        <input style="margin-top: 10px" type="submit" value="delete">
        <!--</button>-->
      </div>
    </form>
  </div>
  <IFRAME style="display:none" name="hidden-form2"></IFRAME>


<!--upgrade user-->
  <div style="width: 50%;height: 100px;float: left">
  <form id="upgrade" action="upgrade.php" method="post" target="hidden_form_DU">
    <div style="width:200px">
      <h5>upgrade User</h5>
      <input name="delete_name" readonly type="hidden"  class=" copy-user">
      <input href="javascript:location.reload()" type="submit" value="upgrade">
    </div>
  </form>
  </div>
  <a id="btn" href="javascript:location.reload()" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">refresh</a>
  <IFRAME style="display:none" name="hidden_form_DU"></IFRAME>
  <script>
    $(function(){
      $('#deleteuser').form({
        success:function(data){
          $('#xxoo').datagrid('reload');
          alert("successful!");
        }
      });
    });
    $(function(){
      $('#upgrade').form({
        success:function(data){
          $('#xxoo').datagrid('reload');
          alert("successful!");
        }
      });
    });



  </script>
</div>
</body>
