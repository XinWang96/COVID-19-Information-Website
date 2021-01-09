<div align="center" class="easyui-layout" style="width:100%;height:800px;margin:auto 0px;">
  <div style="width:100%; height: 800px">
    <form action = "changeinfo.php" method = "post" style="float: center" target="hidden-form3">
        <h1>Update Account</h1>
        <div style="width:200px;margin-top:100px">
          <b>New Password</b>
          <div name="npw" class="easyui-textbox" prompt="enter new password" iconWidth="28" style="width:100%;height:34px;padding:10px;"></div>
        </div>
        <!--<div style="width:200px;margin-top:50px">
          <b>Old Password:</b>
          <div name="oldpw" class="easyui-textbox" prompt="enter old password" iconWidth="28" style="width:100%;height:34px;padding:10px;"></div>
        </div>-->

        <div style="width:200px;margin-top:50px">
          <b>New Password Again</b>
          <div name="newpw" class="easyui-textbox" prompt="enter new password again" iconWidth="28" style="width:100%;height:34px;padding:10px;"></div>
        </div>
        <div style="width:200px;margin-top:50px;">
          <button href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" style="padding:5px 0px;width:100%;">
            <span style="font-size:14px;">Update</span>
          </button>
      </form>
    </div>
    <IFRAME style="display:none" name="hidden-form3"></IFRAME>
</div>
