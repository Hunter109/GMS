<?php
ini_set('session.gc_maxlifetime', 1440);
ini_set('session.cookie_lifetime', 1440);

session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: http://localhost/GMS/admin.php");
}
