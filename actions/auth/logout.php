<?php
session_start();
session_destroy();
header("Location: /smart-parents/index.php");
exit();

