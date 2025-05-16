<?php
include "configure.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT status FROM teammember WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $new_status = ($row['status'] === 'active') ? 'inactive' : 'active';

        $update = "UPDATE teammember SET status = '$new_status' WHERE id = $id";
        mysqli_query($con, $update);
    }
}

header("Location: team_member.php");
exit();
?>
