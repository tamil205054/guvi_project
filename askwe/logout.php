<?php
// start the session
// log out php file 
session_start();
if(isset($_POST["confirm"]))
{   
    // destroy the session 
session_destroy();
    echo "success";
}
?>