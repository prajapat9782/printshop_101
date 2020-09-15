<?php
include('config.php');
session_destroy($_SESSION['user']);
unset($_SESSION['user']);
session_destroy($_SESSION['items']);
unset($_SESSION['items']);


header('Location: index.php');