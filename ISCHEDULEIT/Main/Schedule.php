
<?php
include "dbconnect.php";
$result = null; // Initialize as null
// Check if the form is submitted
if (isset($_POST['department']) && !empty($_POST['department'])) {
    $department = $_POST['department'];
    // Determine the table name based on the selected department

    $tableName = '';
    switch ($department) {
        case 'CET':
            $tableName = 'cetsched'; // Table for CET
            break;
        case 'CASE':
            $tableName = 'casesched'; // Table for CASE
            break;
        case 'CHTM':
            $tableName = 'chtmsched'; // Table for CHTM
            break;
        case 'CBMA':
            $tableName = 'cbmasched'; // Table for CBMA
            break;
        case 'Law':
            $tableName = 'lawsched'; // Table for Law
            break;
        case 'Marine':
            $tableName = 'marinesched'; // Table for Marine
            break;
        case 'Crim':
            $tableName = 'crimsched'; // Table for Criminology
            break;
        default:
            $tableName = '';
            break;
    }

    // Prepare the SQL query to fetch data from the determined table
    if ($tableName) {

        $query = "SELECT * FROM $tableName";

        $result = $conn->query($query);


        // Check if the query was successful

        if (!$result) {

            echo "Error executing query: " . $conn->error; // Output error message

            exit; // Stop further execution

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
     <title> ISCHEDULEIT HOME</title>
     <link rel="stylesheet" href="style.css">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
      <div class="sidebar">
        <div class="logo_content">
           <div class = "title">
            <div class ="title_name">ISCHEDULEIT</div>
           </div>
           <i class='bx bx-menu' id="btn" style='color:#ffffff'  ></i>
           </div>
              <ul class="nav list">
                <li>
                  <a href="homepage.php">
                    <i class='bx bx-home-alt' style='color:#ffffff'  ></i>
                    <span class="links_name">Home</span>
                  </a>
                  <span class="tooltip">Home</span>
                </li>
                <li>
                   <a href="Schedule.php">
                    <i class='bx bx-time-five' style='color:#ffffff' ></i>
                    <span class="links_name">Schedules</span>
                   </a>
                   <span class="tooltip">Schedules</span>
                </li>
                <li>
                  <a href="AdminLogin.php">
                    <i class='bx bx-power-off' id="log out" style="color:#ffffff" ></i>
                    <span class="links_name">Log Out</span>
                  </a>
                  <span class="tooltip">Log Out</span>
                </li>
              </ul>
             </div>
             
          <div id="wrapper">
            <div class="button-container">
              <div class="button-create"> 
                <button type="button" onclick ="window.location.href='AddSchedule.php'">
                 <i class='bx bxs-time'></i>
                 Create Schedule
                </button>
                </div>
               
                <div class="button-print">
                <button onclick="printTable()">
                    <i class='bx bxs-printer'></i>
                    PRINT
                  </button>
                </div>
            </div>

               
           
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
            
            <div class="table-container">
              <table class="content-table">
                <thead>
                  <th>Semester</th> 
                  <th>Subject</th>
                  <th>Day</th>
                  <th>Time</th>
                  <th>Room</th>
                  <th>Course</th>
                  <th>Campus</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                <?php

                    if ($result && $result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                            echo "<tr>

                                    <td>{$row['Semester']}</td>
                                    <td>{$row['Subject']}</td>
                                    <td>{$row['Day']}</td>
                                    <td>{$row['Time']}</td>
                                    <td>{$row['Room']}</td>
                                    <td>{$row['Course']}</td>
                                    <td>{$row['Campus']}</td>
                                    

                                    <td>


                                        <form method='POST' action='delete.php' style='display:inline;'>

                                            <input type='hidden' name='delete_id' value='{$row['schedule_id']}'>

                                            <input type='hidden' name='department' value='{$department}'> 

                                            <button type='submit' class='delete-btn'>Delete</button>

                                        </form>

                                    </td>

                                  </tr>";

                        }

                    } else {

                        echo "<tr><td colspan='7'>NO RECORDS FOUND</td></tr>";

                    }

                    ?>
                 

              </tbody>
              </table>
  

<script>
   let btn = document.querySelector("#btn");
                let sidebar = document.querySelector(".sidebar");

                btn.onclick = function(){
                  sidebar.classList.toggle("active");
                }

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
printWindow.document.write('<link rel="stylesheet" href="Schedule.php">'); 
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
    </body>    
</html>

<style> 
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Montserrat", sans-serif;
  
}

div#wrapper{
  background-color:#f4f2f2;
  border-radius: 25px;
  height: 700px;
  width: 85%;
  margin-left: 232px;
  margin-top: 60px;
  
}
body{
  position: relative;
  min-height: 100vh;
  width: 90%;
  overflow:none;
  background-image: url("cpc4.jpg");
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: cover;
  
  
}
.sidebar{
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 90px;
  background: #0652b5;;
  padding: 6px 20px;
  transition: all 0.5s ease;
}

.sidebar.active{
  width: 230px;

}

.sidebar .logo_content .title{
  color: #ffffff;
  display: flex;
  height: 60px;
  width: 100%;
  align-items: center;
  opacity: 0;
  pointer-events: none;
}

.sidebar.active .logo_content .title{
  opacity: 1;
  pointer-events: none;

}
.logo_content .title{
  font-size: 21px;
  margin-right: 5px;

}
.logo_content .title .title_name{
  font-size: 20px;
  font-weight: 500;
}
.sidebar #btn{
  color: #ffffff;
  position: absolute;
  left: 55%;
  top: 6px;
  font-size: 20px;
  height: 50px;
  width: 50px;
  text-align: center;
  line-height: 50px;
  transform: translate(-50%);
}

.sidebar.active #btn{
  left: 91%;
}
.sidebar ul{
  margin-top: 20px;

}
.sidebar ul li{
  position: relative;
  height: 60px;
  width:100%;
  list-style:none;
  margin: 0 5px;
  line-height: 40px; 
}

.sidebar ul li .tooltip{
  position: absolute;
  left: 130px;
  top: 0%;
  transform: translate(-50%, -50%);
  height: 60px;
  width: 122px;
  background: #ffff;
  box-shadow:0 5px 10px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  line-height:60px;
  text-align: center;
  transition: 0s;
  opacity: 0;
  pointer-events: none;
  display: block;
}
.sidebar.active ul li .tooltip{
  display: none;
}
.sidebar ul li:hover .tooltip{
 top: 50%;
 transition: all 0.6s ease;
 opacity: 1;
}
.sidebar ul li a{
  color: #fef5f5;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.3s ease;
  border-radius: 14px;
  white-space: nowrap;
}
.sidebar ul li a:hover{
  color: #1b0505;
  background: #f7f7f7c3;
}
.sidebar ul li  i{
  height: 14px;
  min-width: 50px;
  border-radius: 12px;
  text-align: center;
}
.sidebar .links_name{
  opacity:0;
}

.sidebar.active .links_name{
  opacity: 1;
  pointer-events:auto;
}

.button-container{
  display: flex;
  align-items:center;
}

.button-create button {
  position: absolute;
  display: flex;
  flex-wrap: wrap;
  padding: 1.3em 1em;
  font-size: 9px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #fff;
  background-color: #0652b5c6;
  border: none;
  border-radius: 45px;
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  align-items:center;
  margin-left: 290px;
  margin-top: 30px;
}

.button-create button:hover {
  background-color: #059a5f;
  box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
  color: #fff;
  transform: translateY(-7px);
}

.button-create button:active {
  transform: translateY(-1px);

}


.button-print button {
  position:absolute;
  display: flex;
  flex-wrap: wrap;
  padding: 1.3em 1em;
  font-size: 9px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #fff;
  background-color:  #0652b5c6;
  border: none;
  border-radius: 45px;
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  align-items:first baseline center;
  margin-left: 500px;
  margin-top: 30px;
}

.button-print button:hover {
  background-color: #07a26e;
  box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
  color: #fff;
  transform: translateY(-7px);
}

.button-print button:active {
  transform: translateY(-1px);
}

.button-go button {
  position: absolute;
  display: flex;
  flex-wrap: wrap;
  padding: 1.3em 1em;
  font-size: 10px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #fff;
  background-color:  #0652b5c6;
  border: none;
  border-radius: 35px;
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  align-items:first baseline center;
  margin-left: 500px;
  margin-top: 100px;
}

.button-go button:hover {
  background-color: #07a26e;
  box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
  color: #fff;
  transform: translateY(-7px);
}

.button-go button:active {
  transform: translateY(-1px);
}

.content-table {
  position:absolute;
  border-collapse: collapse;
  width: 70%; 
  font-size: 0.9em;
  margin-top: 150px;
  margin-left: 80px; 
}

.content-table thead tr {
  background-color: #0652b5;
  color: #ffff;
  text-align: left;
  font-weight: bold;
}


.content-table th {
  padding: 12px 10px;
  width:10%;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow-y:auto;
}


.content-table td {
  padding: 15px 0px;
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

.delete-btn {
padding: 5px 10px;
border: none;
border-radius: 5px;
cursor: pointer;
}

.delete-btn {
background-color: #e74c3c;
color: #fff;
}

#select-department {
  position: absolute;
  width: 200px;
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  margin-top: 100px;
  margin-left: 290px;
}





</style>

