<?php
session_name('member_session');
session_start();
session_destroy();
header("Location: ../login.php");
exit();
