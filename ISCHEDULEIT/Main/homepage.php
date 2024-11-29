<?php
include "dbconnect.php";
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
   <container>
      <div class="sidebar">
          <div class="logo_content">
             <div class = "title">
              <div class ="title_name">ISCHEDULEIT</div>
             </div>
             <i class='bx bx-menu' id="btn" style='color:#ffffff'  ></i>
             </div>
                <ul class="nav list">
                  <li>
                    <a href="hometest.php">
                      <i class='bx bx-home' style='color:#ffffff' ></i>
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
                    <a href="SchedulePortal.php">
                      <i class='bx bx-power-off' id="log out" style="color:#ffffff  " ></i>
                      <span class="links_name">Log Out</span>
                    </a>
                    <span class="tooltip">Log Out</span>
                  </li>
                </ul>
               </div>
                           
              <div class="image-container">
                <div class="image">
                  <img src="CPC Schedule Illustration.png">
                </div>
              </div>

              <div class="Table-Wrapper">
              <table class="Available-Subjects">
                <thead>
                  <th>Subjects Available</th>
                  
                </thead>
                <tbody>
                <tr>
                  <td>
                    <?php include_once "GetSubject.php"; echo $options?>
                  </td>
                 
                </tr>
              </tbody>
              </table>

              <table class="Available-Teachers">
                <thead>
                  <th>Teachers Available</th>
                  
                </thead>
                <tbody>
                <tr>
                  <td>
                    <?php include_once "GetTeacher.php"; echo $options?>
                  </td>
                 
                </tr>
              </tbody>
              </table>


              <table class="Available-Rooms">
                <thead>
                  <th>Rooms Available</th>
                  
                </thead>
                <tbody>
                <tr>
                  <td>
                  <?php include_once "GetRoom.php"; echo $options ?>
                  </td>
                 
                </tr>
              </tbody>
              </table>
                           
              </div>
            
          
            
              
            
               <script>
                let btn = document.querySelector("#btn");
                let sidebar = document.querySelector(".sidebar");

                btn.onclick = function(){
                  sidebar.classList.toggle("active");
                }
               </script>
          
          
       </header>
      
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
.sidebar {
position: fixed;
top: 0;
left: 0;
height: 100%;
width: 90px;
background: #0652b5;
padding: 6px 20px;
transition: all 0.5s ease;
}

.sidebar.active {
width: 230px;
}


.sidebar .logo_content .title {
color: #ffffff;
display: flex;
height: 60px;
width: 100%;
align-items: center;
opacity: 0;
pointer-events: none;
}


.sidebar.active .logo_content .title {
opacity: 1;
pointer-events: none;
}

.logo_content .title {
font-size: 21px;
margin-right: 5px;
}


.logo_content .title .title_name {
font-size: 20px;
font-weight: 500;
}

.sidebar #btn {
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


.sidebar.active #btn {
left: 91%;
}

.sidebar ul {
margin-top: 20px;
}

.sidebar ul li {
position: relative;
height: 60px;
width: 100%;
list-style: none;
margin: 0 5px;
line-height: 40px;
}

.sidebar ul li .tooltip {
position: absolute;
left: 130px;
top: 0%;
transform: translate(-50%, -50%);
height: 60px;
width: 122px;
background: #ffff;
box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
border-radius: 5px;
line-height: 60px;
text-align: center;
transition: 0s;
opacity: 0;
pointer-events: none;
display: block;
}


.sidebar.active ul li .tooltip {
display: none;
}


.sidebar ul li:hover .tooltip {
top: 50%;
transition: all 0.6s ease;
opacity: 1;
}


.sidebar ul li a {
color: #fef5f5;
display: flex;
align-items: center;
text-decoration: none;
transition: all 0.3s ease;
border-radius: 14px;
white-space: nowrap;
}

.sidebar ul li a:hover {
color: #1b0505;
background: #f7f7f7c3;
}

.sidebar ul li i {
height: 14px;
min-width: 50px;
border-radius: 12px;
text-align: center;
}


.sidebar .links_name {
opacity: 0;
}


.sidebar.active .links_name {
opacity: 1;
pointer-events: auto;
}


.image {
margin-left: 400px;
margin-top: 30px;
}


.Available-Subjects {
position: relative;
border-collapse: collapse;
margin: 15px 0;
font-size: 0.9em;
width: -500px;
margin-top: -200px;
margin-left: 5px;
}


.Available-Subjects thead tr {
background-color: #0652b5;
color: #ffff;
text-align: left;
font-weight: bold;
}


.Available-Subjects th {
padding: 15px 30px;
}


.Available-Subjects td {
padding: 15px 30px;
}


.Available-Subjects tbody {
display: block;
max-height: 110px;
overflow-y: auto;
}


.Available-Subjects tbody tr {
border-bottom: 1px solid #1f1414;
background-color: #fff;
}


.Available-Teachers {
position: absolute;
border-collapse: collapse;
margin: 15px 0;
font-size: 0.9em;
width: 150px;
margin-top: 210px;
margin-left: -401px;
}


.Available-Teachers thead tr {
background-color: #0652b5;
color: #ffff;
text-align: left;
font-weight: bold;
}


.Available-Teachers th {
padding: 15px
   110px;

}

.Available-Teachers td {
padding: 10px 30px;
}


.Available-Teachers tbody {
display: block;
max-height: 110px;
overflow-y: auto;
}


.Available-Teachers tbody tr {
border-bottom: 1px solid #1f1414;
background-color: #fff;
}

.Available-Rooms {
position: absolute;
border-collapse: collapse;
margin: 15px 0;
font-size: 0.9em;
width: 150px;
height: 200px;
margin-top: 230px;
margin-left: 420px;
}


.Available-Rooms thead tr {
background-color: #0652b5;
color: #ffff;
text-align: left;
font-weight: bold;
}


.Available-Rooms th {
padding: 10px 110px;
}


.Available-Rooms td {
padding: 10px 103px;
}


.Available-Rooms tbody {
display: block;
max-height: 110px;
overflow-y: auto;
}


.Available-Rooms tbody tr {
border-bottom: 1px solid #1f1414;
background-color: #fff;
}


.Table-Wrapper {
display: flex;
justify-content: center;
align-items: center;
background-color: #fef3f3;
border-radius: 25px;
height: 460px;
width: 55%;
margin-left: 400px;
margin-top: 30px;
}


@media (max-width: 768px) {

  .body{
    overflow-x: hidden;
  }

.sidebar {
  width: 80px;
}


.sidebar.active {
  width: 200px;
}


.sidebar .logo_content .title {
  font-size: 18px;
}


.sidebar #btn {
  font-size: 18px;
  height: 40px;
  width: 40px;
  left: 55%;
}

.sidebar ul li {
  height: 50px;
}


.sidebar ul li a {
  font-size: 14px;
}

.Available-Subjects,
.Available-Teachers,
.Available-Rooms {
  width: 20%;
  margin-left: 0;
}

.Available-Subjects th,
.Available-Teachers th,
.Available-Rooms th {
  padding: 10px 15px;
}

.Available-Subjects td,
.Available-Teachers td,
.Available-Rooms td {
  padding: 10px 15px;
}

.Available-Subjects{
  margin-top: -350px;
  margin-left: -130px;
}
.Available-Rooms{
  margin-left: -130px;
  margin-top: 10px;
}

.Available-Teachers{
  margin-left: -130px;
}

.Table-Wrapper {
  height: auto;
  width: 1px;
  display:block;
}
.image{
  margin-left: 550px;
}

@media (max-width: 480px) {

  body{
    overflow-x: hidden;
  }
.sidebar {
  width: 60px;
}

.sidebar.active {
  width: 180px;
}


.sidebar .logo_content .title {
  font-size: 16px;
}

.sidebar #btn {
  font-size: 16px;
  height: 35px;
  width: 35px;
  left: 35px;
}


.sidebar ul li {
  height: 45px;
}

.sidebar ul li a {
  font-size: 12px;
}


.Available-Subjects,
.Available-Teachers,
.Available-Rooms {
  width: 20%;
  margin-left: 0;
}


.Available-Subjects th,
.Available-Teachers th,
.Available-Rooms th {
  padding: 8px 10px;
}

.Available-Subjects td,
.Available-Teachers td,
.Available-Rooms td {
  padding: 8px 10px;
}

.Table-Wrapper {
  width: 1px;
  height: auto;
  margin-left: 1.0%;
  display: block;
}
.Available-Subjects{
  margin-top: -350px;
  margin-left: 180px;
}
.Available-Rooms{
  margin-top: 50px;
  margin-left: 220px;
}
.Available-Teachers{
  margin-top: 250px;
  margin-left: 150px;
}

.image{
  margin-left: 500px;
  
}
}
}
</style>