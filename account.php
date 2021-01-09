<div align="center" class="easyui-layout" style="width:100%;height:800px;margin:auto 0px;">
  <div style="width:100%; height: 800px">
    <div style="width:40%; height: 800px:float:left">
      <form action = "user.php" method = "post" style="float:left" target="hidden-form2" >

        <h1>Create User</h1>
        <div style="width:200px;margin-top:100px">
          <b>New User Account:</b>
          <div name="new_username" class="easyui-textbox" prompt="enter username" iconWidth="28" style="width:100%;height:34px;padding:10px;"></div>
        </div>

        <div style="width:200px;margin-top:50px">
          <b>New User Password:</b>
          <div name="new_password" class="easyui-textbox" prompt="enter password" iconWidth="28" style="width:100%;height:34px;padding:10px;"></div>
        </div>
        <div style="width:200px;margin-top:50px">
          <button href="#" class="easyui-linkbutton" type="submit" data-options="iconCls:'icon-ok'" style="padding:5px 0px;width:100%;">
            <span style="font-size:14px;">Create</span>
          </button>
        </div>

      </form>
      <IFRAME style="display:none" name="hidden-form2"></IFRAME>
    </div>

    <div style="width:20%; height: 800px:float:right">

    </div>

    <div style="width:40%; height: 800px:float:right">
      <form action = "changeinfo.php" method = "post" style="float: right" target="hidden-form3">
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







</div>
