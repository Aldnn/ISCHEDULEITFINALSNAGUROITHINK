<?php

include "dbconnect.php";
$result = null; 
if (isset($_POST['department']) && !empty($_POST['department'])) {
    $department = $_POST['department'];
    $tableName = '';
    switch ($department) {
        case 'CET':
            $tableName = 'cetsched'; 
            break;
        case 'CASE':
            $tableName = 'casesched'; 
            break;
        case 'CHTM':
            $tableName = 'chtmsched'; 
            break;
        case 'CBMA':
            $tableName = 'cbmasched'; 
            break;
        case 'Law':
            $tableName = 'lawsched'; 
            break;
        case 'Marine':
            $tableName = 'marinesched'; 
            break;
        case 'Crim':
            $tableName = 'crimsched'; 
            break;
        default:
            $tableName = '';
            break;
    }

    if ($tableName) {
        $query = "SELECT * FROM $tableName";
        $result = $conn->query($query);
        if (!$result) {
            echo "Error executing query: " . $conn->error; 
            exit; 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content ="width=device-width, initial-scale=1.0">
     <title> Teacher Web</title>
     <link rel="stylesheet" href="style.css">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
    
    <form method="POST" action="">
<select id="select-department" name="department" required>
    <option value="">Select Department</option>
    <option value="CET">CET</option>
    <option value="CASE">CASE</option>
    <option value="CHTM">CHTM</option>
    <option value="CBMA">CBMA</option>
    <option value="Law">Law</option>
    <option value="Marine">Marine</option>
    <option value="Crim">Criminology</option>
</select>

<div class="button-go">
    <button type="submit">GO</button>
</div>

</form>
<div class="button-print">
<button onclick="printTable()">PRINT</button>
</div>


<div class="button-back">
<a href="SchedulePortal.php">
    <button type="submit">LOGOUT</button>
 
            <div class="table-container">
              <table class="content-table">
                <thead>
                  <th>Teacher</th> 
                  <th>Subject</th>
                  <th>Day</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Course</th>
                </thead>
                <tbody>
                <?php
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Teacher']}</td>
                <td>{$row['Subject']}</td>
                <td>{$row['Day']}</td>
                <td>{$row['Time']}</td>
                <td>{$row['Room']}</td>
                <td>{$row['Course']}</td>
              </tr>";

    }
} else {
    echo "<tr><td colspan='7'>NO RECORDS FOUND</td></tr>";
}
?>
   </tbody>
   </table>               
      </div>    
          </div>
    
          <script>

function printTable() {
var originalTable = document.querySelector('.content-table');
var clonedTable = originalTable.cloneNode(true);
var rows = clonedTable.querySelectorAll('tr');
rows.forEach(function(row) {

    var actionsCell = row.lastElementChild;
    if (actionsCell) {
        row.removeChild(actionsCell);
    }
});

var printWindow = window.open('', '', 'height=600,width=800');
printWindow.document.write('<html><head><title>Print Schedule</title>');
printWindow.document.write('<link rel="stylesheet" href="TeacherWeb.php">'); 
printWindow.document.write('</head><body>');
printWindow.document.write(clonedTable.outerHTML); 
printWindow.document.write('</body></html>');
printWindow.document.close();
printWindow.onload = function() {
    printWindow.print(); 
    printWindow.close(); 

};

}
</script>
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
      *{
        font-family: "Montserrat", sans-serif;
      }
      body {
              background-image: url("cpc4.jpg");
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: cover;
              
          }
      
    
.content-table {
position: absolute;
border-collapse: collapse;
width: 200px;
font-size: 0.9em;
margin-top: 150px;
margin-left: 500px;
}

.content-table thead tr {
background-color: #0652b5;
color: #ffff;
text-align: left;
font-weight: bold;
}

.content-table th {
padding: 12px 15px;
width: 14%;
overflow: hidden;
text-overflow: ellipsis;
white-space: nowrap;
}

.content-table td {
padding: 15px 15px;
}

.content-table tbody tr {
border-bottom: 1px solid #eeeeee;
background-color: #fff;
}


.content-table tbody tr:nth-of-type(even) {
background-color: #eddddd;
}


.content-table tbody tr:last-of-type {
border-bottom: 2px solid #0652b5;
}


#select-department {
position: absolute;
width: 200px;
padding: 10px;
border: 2px solid #ccc;
border-radius: 5px;
font-size: 16px;
margin-top: 100px;
margin-left: 500px;
}

.button-go button,
.button-print button,
.button-back button {
position: absolute;
display: flex;
flex-wrap: wrap;
padding: 1.3em 1em;
font-size: 10px;
text-transform: uppercase;
letter-spacing: 2.5px;
font-weight: 500;
color: #fff;
background-color: #0652b5c6;
border: none;
border-radius: 35px;
transition: all 0.3s ease 0s;
cursor: pointer;
outline: none;
align-items: first baseline center;
}


.button-go button {
margin-left: 750px;
margin-top: 100px;
}

.button-print button {
margin-left: 900px;
margin-top: 100px;
}

.button-back button {
margin-left: 800px;
margin-top: 100px;
}

.button-go button:hover,
.button-print button:hover,
.button-back button:hover {
background-color: #07a26e;
box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
color: #fff;
transform: translateY(-7px);
}

.button-go button:active,
.button-print button:active,
.button-back button:active {
transform: translateY (-1px);
}

@media (max-width: 768px) {
.button-submit button {
  font-size: 8px;
  padding: 0.5em;
}


.button-logout button {
  font-size: 4px;
  width: 50px;
}


.content-table {
  width: 100%;
  margin-left: 0;
}


.content-table th, .content-table td {
  padding: 10px;
  font-size: 0.8em;
}


#select-department {
  width: 150px;
  font-size: 14px;
}

.button-go button,
.button-print button,
.button-back button {
  font-size: 8px;
  padding: 1em 0.5em;
}

.button-go button {
  margin-left: 50%;
}

.button-print button {
  margin-left: 55%;
}

.button-back button {
  margin-left: 62%;
}

}

@media (max-width: 480px) {
.button-submit button {
  font-size: 7px;
  padding: 0.4em;
}

.button-logout button {
  font-size: 3px;
  width: 40px;
}


.content-table th, .content-table td {
  padding: 8px;
  font-size: 0.7em;
}


#select-department {
  width: 120px;
  font-size: 12px;
  margin-left: 70%
}

.button-go button,
.button-print button,
.button-back button {
  font-size: 7px;
  padding: 0.8em 0.4em;
}


.button-go button {
  margin-left: 30%;
}

.button-print button {
  margin-left: 40%;
}

.button-back button {
  margin-left: 55%;
}

}