<?php
 
 include "dbconnect.php";


 $sql = "SELECT Room FROM roomlist";
 $result = $conn->query($sql);

 $options='';

 if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        $options .= '<option value="' . $row["Room"] . '">' . $row["Room"] . '</option>';

    }

} else {

    $options = '<option value="">No options available</option>';

}








 ?>