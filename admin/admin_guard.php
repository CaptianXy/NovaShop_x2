<?php
session_start();
if($_SESSION['role']!=='admin'){
 header("location:../index.php");
 exit;
}
