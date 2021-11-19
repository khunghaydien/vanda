<?php
if (isset($url[0]) && $url[0] == 'en') {
  require 'en/libs/startup.php';
  require 'en/libs/database.php';
  require 'en/libs/functions.php';
  require 'en/libs/model.php';
  require 'en/libs/controller.php';
} else {
  require 'libs/startup.php';
  require 'libs/database.php';
  require 'libs/functions.php';
  require 'libs/model.php';
  require 'libs/controller.php';
}
?>
