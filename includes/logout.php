<?php

session_start();

unset($_SESSION['username']);
unset($_SESSION['password']);

//unset($_SESSION);

session_destroy();

header("Location:../index.php?");

class Logout
{

}