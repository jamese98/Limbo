<!-- redirect.php
redirect to another page for Limbo
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php

function redirect($page){
	#Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

  #Remove trailing slashes then append page name to URL and the print id.
  $url = rtrim($url, '/\\');
  $url .= '/' . $page;

  // session_start();
  // header("Location: $url");

  # Execute redirect then quit.
  echo "<script type='text/javascript'> document.location = '$url'; </script>";

  exit();
}


?>