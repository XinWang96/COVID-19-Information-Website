<div align="center" class="easyui-layout" style="width:100%;height:800px;margin:auto 0px;">
<?php
    $myfilename = "information.txt";
    if(file_exists($myfilename)){
      echo file_get_contents($myfilename);
    }
?>
  <div style="width:200px;margin-top:50px;">
    <button href="#" class="easyui-linkbutton" style="padding:5px 0px;width:100%;" id="infoEditBtn">
      <span style="font-size:14px;">Edit</span>
    </button>
  </div>

  <script>
    var editBtn = document.getElementById('infoEditBtn');
    var editables = document.querySelectorAll('#ul1');
    editBtn.addEventListener('click', function(e) {
      if (!editables[0].isContentEditable) {
        editables[0].contentEditable = 'true';
        editBtn.innerHTML = 'Save Changes';
        editBtn.style.backgroundColor = '#6F9';
      } else {
        // Disable Editing
        editables[0].contentEditable = 'false';
        // Change Button Text and Color
        editBtn.innerHTML = 'Edit';
        editBtn.style.backgroundColor = '#F96';
        // Save the data in localStorage
        for (var i = 0; i < editables.length; i++) {
          localStorage.setItem(editables[i].getAttribute('id'), editables[i].innerHTML);
        }
      }
    });
  </script>
</div>
