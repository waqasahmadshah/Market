<?php
include "configure.php";
mysqli_query($con, "UPDATE messages SET status = 1 WHERE status = 0");
?>
