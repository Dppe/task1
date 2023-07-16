<?php
unset($_SESSION['email']);
  
  header('Location:index.php?action=loginpage');
  exit;
?>