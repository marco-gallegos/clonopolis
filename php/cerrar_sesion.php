<?php
try {
  session_destroy();
} catch (Exception $e) {
  echo 0;
  die();
}
echo 1;

 ?>
