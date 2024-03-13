<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
user::valid();
session_destroy();
header("Location:".site_url('login'));