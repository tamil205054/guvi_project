<?php
session_start();
session_destroy();
header('Location: http://localhost/to-do-list/login.html');
?>