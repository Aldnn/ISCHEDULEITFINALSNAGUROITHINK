<?php
 
 include "dbconnect.php";


 $semester = $_GET['semester'];


if ($semester == '1') {

    $sql = "SELECT Subject_Code FROM subject_1st_sem";

} else if ($semester == '2') {

    $sql = "SELECT Subject_Code FROM subject_2nd_sem";

} else {

    echo json_encode([]);

    exit;

}


$result = $conn->query($sql);

$subjects = [];


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        $subjects[] = $row;

    }

}


echo json_encode($subjects);

$conn->close();







 ?>
