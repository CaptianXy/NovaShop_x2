<?php
session_start();
setcookie("remember_token","",time()-3600,"/");
session_destroy();
header("location:login.php");
