<!doctype html>
<html class="no-js" lang="">
<?php session_start();
?>
<script type="text/javascript">



  function FileUrl(value, rowData) {
    if (value == null || value == "") {
      return "<a href='javascript:void(0)'onclick=showImg('" + value + "');><a/>";
    } else {
      return "<a href= www.google.com>" + value + "<a/>";
    }
  }
  var current_user_level = "student";

</script>
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

<body background="background.jfif">
<div id="top_grid" style="width: 100%;height: 50px">
  <div id="top_left"  style="width:80%;float:left;">
    <div align="left" style="margin-top: 20px">
      <h1>CWRU COVID-19 Information Center</h1>
    </div>
  </div>
  <div id="top_right" style="width:20%;float:right;">
    <p align="right">
      <button id="Login" class="easyui-linkbutton" onclick="toggleLogin()">Sign In</button>
      <script>
        function toggleLogin() {
          if (current_user_level === "student") {
            showLogin();
            current_user_level = "administrator";
          } else {
            signOut();
            current_user_level = "student";
          }
        }
        function showLogin(){
          document.getElementById("pop").style.display = "block";
          document.getElementById("pop").style.opacity = "1";
        }

        function closeLogin() {
          document.getElementById("pop").style.display = "none";
        }
      </script>
    </p>
  </div>
</div>
<div align="center" class="pop" id="pop" style="border-style: solid;position:absolute;top:50%;left:50%;z-index:999;width:310px;transform:translate(-50%, -50%);background:rgb(240, 248, 255);height:155px;display:none">

  <div class="easyui-panel" title="login" style="width:300px;padding:10px;">
    <div onclick="closeLogin()" style="position:absolute;top:-1px;right:-1px;width:40px;height:40px;font-size:25px;font-weight:600;cursor:pointer;text-align:center;">&times;</div>
    <form id="ff" action="login.php" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>username:</td>
          <td><input name="name" class="f1 easyui-textbox"></input></td>
        </tr>
        <tr>
          <td>password:</td>
          <td><input name="password" class="f1 easyui-textbox"></input></td>
        </tr>

        <tr>
          <td></td>
          <td><input type="submit" value="Submit"></input></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<script>

  $(function(){
    $('#ff').form({
      success:function(data){
        var authority = data;
        closeLogin();
        if (authority.trim() == "administrator") {
          alert("welcome dear "+data+"!");
          adminSignIn();
        } else if (authority.trim() == "faculty") {
          alert("welcome dear "+data+"!");
          facultySignIn();
        }
        else
        {
          alert("please input your username and password again!");
        }
      }
    });
  });

  function signOut() {
    $('#tt').tabs();
    $('#tt').tabs('close', 'Home');
    $('#tt').tabs('close', 'Faculty');
    $('#tt').tabs('close', 'Users');
    $('#tt').tabs('close', 'Account');
    $('#tt').tabs('close', 'Information');
    $('#tt').tabs();
    $('#tt').tabs('add', {
      title:'Information',
      href: 'information_partial.php',
      closable:false
    });
    $('#Login').linkbutton({text:'Sign In'})
  }

  function adminSignIn() {
    $('#tt').tabs();
    $('#tt').tabs('close', 'Survey');
    $('#tt').tabs('close', 'Live Data');
    $('#tt').tabs('close', 'News');
    $('#tt').tabs('close', 'Information');
    $('#tt').tabs();
    $('#tt').tabs('add', {
      title:'Home',
      href: 'home.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'Survey',
      href: 'survey.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'Faculty',
      href: 'faculty.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'Live Data',
      href: 'livedata.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'News',
      href: 'news.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'Information',
      href: 'information.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'Users',
      href: 'users.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'Account',
      href: 'account.php',
      closable:false
    });
    $('#tt').tabs();
    $('#Login').linkbutton({text:'Sign Out'})
  }

  function facultySignIn() {
    $('#tt').tabs();
    $('#tt').tabs('close', 'Survey');
    $('#tt').tabs('close', 'Live Data');
    $('#tt').tabs('close', 'News');
    $('#tt').tabs('close', 'Information');
    $('#tt').tabs();
    $('#tt').tabs('add', {
      title:'Survey',
      href: 'survey.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'Faculty',
      href: 'faculty.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'Live Data',
      href: 'livedata.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'News',
      href: 'news.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'Information',
      href: 'information_partial.php',
      closable:false
    });
    $('#tt').tabs('add', {
      title:'Account',
      href: 'account_partial.php',
      closable:false
    });
    $('#tt').tabs();
    $('#Login').linkbutton({text:'Sign Out'})
  }

</script>
<div align="center" style="margin:20px auto 0;width: 100%;">
  <div id="tt" class="easyui-tabs" style="width:100%;height:800px;">

    <!--Survey tab-->
    <div title="Survey">
      <?PHP include ("survey.php"); ?>
    </div>

    <!--Live Data tab-->
    <div title="Live Data">
      <?PHP include ("livedata.php"); ?>
    </div>

    <!--News tab-->
    <div title="News">
      <?PHP include ("news.php"); ?>
    </div>

    <!--Information tab-->
    <div title="Information">
      <?PHP include ("information_partial.php"); ?>
    </div>

  </div>
</div>

</body>

</html>
