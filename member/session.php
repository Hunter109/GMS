<?php
ini_set('session.gc_maxlifetime', 1440);
ini_set('session.cookie_lifetime', 1440);

// session_start();
// if (!isset($_SESSION['member_id'])) {
//     header("Location: http://localhost/GMS/login.php");
// }
// Set a custom session name for members
session_name('member_session');
session_start();

// Now, you can use $_SESSION as usual for member-specific data
if (!isset($_SESSION['member_id'])) {
    header("Location: http://localhost/GMS/login.php");
}
