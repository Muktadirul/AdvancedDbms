<?php
session_start();//session is a way to store information (in variables) to be used across multiple pages.  
if(session_destroy()){
    header("Location: LoginView.php");
}  


