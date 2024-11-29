<?php
 
 include "dbconnect.php";


 $sql = "SELECT Teacher FROM teacherlist";
 $result = $conn->query($sql);

 $options='';

 if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        $options .= '<option value="' . $row["Teacher"] . '">' . $row["Teacher"] . '</option>';

    }

} else {

    $options = '<option value="">No options available</option>';

}








 ?>