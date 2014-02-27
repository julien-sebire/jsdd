<?php
if (file_exists($_GET['file'] . '.md')) {
  require_once('Parsedown.php');
  $parsedown = new Parsedown();

  $md = file_get_contents($_GET['file'] . '.md');
  echo $parsedown->parse($md);
}
