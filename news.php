
<div  style="width:100%;height:700px;margin:auto 0px;">
  <table id ="xxoo" class="easyui-datagrid" title="Top News in Ohio" style="width:100%;height:700px"
         data-options="singleSelect:true,url:'result.json',method:'get'">
    <thead>
    <tr>
      <th data-options="field:'title',width:500">Title</th>
      <th data-options="field:'organizations',width:200,align:'left'">Organization</th>
      <th data-options="field:'out_date',width:200,align:'left'">Time</th>
      <th data-options="field:'news_link',width:500,align:'left'">link</th>
    </tr>
    </thead>
  </table>


  <div style="width: 50%;height: 100px;float: left">
    <form id="searchnews" action="searchnews.php" method="post" target="hidden-form2">
      <div style="width:400px;margin-bottom: 10px">
        <span>organization:</span>
        <input name="delete_name"  type="text" class=" copy-username">
        <input style="margin-top: 10px" type="submit" value="search" ">
      </div>
    </form>
  </div>

  <div style="width: 50%;height: 100px;float: left">
    <form id="searchallnews" action="searchallnews.php" method="post" target="hidden-form2">
      <div style="width:400px;margin-bottom: 10px">

        <input style="margin-top: 10px" type="submit" value="searchallnews">
      </div>
    </form>
  </div>
  <IFRAME style="display:none" name="hidden-form2"></IFRAME>
  <!-- <a id="btn" href="javascript:location.reload()" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">refresh</a>-->


  <script>
    $(function(){
      $('#searchnews').form({
        success:function(data){
          $('#xxoo').datagrid('reload');
          alert("successful!");
        }
      });
    });


    $(function(){
      $('#searchallnews').form({
        success:function(data){
          $('#xxoo').datagrid('reload');
          alert("successful!");
        }
      });
    });
  </script>
</div>








