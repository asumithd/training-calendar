<?php	if(isset($_SESSION['message'])): ?>
  <div class="container">
    <div class="justify_content_center">
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
         <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
         ?>
      </div>
          <?php endif ?>
    </div>

  </div>
