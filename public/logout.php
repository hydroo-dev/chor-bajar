<?php
include("../config/db.php");
session_destroy();
header("Location: login.php");
exit();
