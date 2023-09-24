<?php
session_name('trainer_session');

session_start();
session_destroy();
header("Location: ../trainer.php");
exit();

// Set the custom session name for trainers
