<div align="center" class="easyui-layout" style="width:100%;height:800px;margin:auto 0px;">
  <?php
      $myfilename = "information.txt";
      if(file_exists($myfilename)){
        echo file_get_contents($myfilename);
      }
  ?>
</div>
