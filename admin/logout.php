<?php 
include('config.php');
unset($_SESSION['login']['success']); 
unset($_SESSION['login']['login_id']);
unset($_SESSION['login']['username']);
// Pre();

header('Location: login.php');