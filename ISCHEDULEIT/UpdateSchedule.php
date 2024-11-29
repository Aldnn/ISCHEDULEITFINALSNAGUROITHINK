<?php include "dbconnect.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content ="width=device-width, initial-scale=1.0">
     <title> ISCHEDULEIT HOME</title>
     <link rel="stylesheet" href="style.css">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
  <body>


    <div class= "wrapper">
    <div class="UpdateSchedule">
    <form action="update.php" method="post">
    <input type="hidden" name="schedule_id" value="<?php echo $existing_schedule_id; ?>"> <!-- Add this line -->

        <select id="select-Subject" name="subject_description">
        <option value="">Select Subject</option>
          <?php include_once "GetSubject.php"; echo $options ?>

        </select>


<select id="select-Teacher" name="teacher">

    <option value="">Select Teacher</option>

    <?php include_once "GetTeacher.php"; echo $options ?>

</select>


<div id="select-Day">

    <label><input type="checkbox" name="day[]" value="M"> Monday</label>

    <label><input type="checkbox" name="day[]" value="T"> Tuesday</label>

    <label><input type="checkbox" name="day[]" value="W"> Wednesday</label>

    <label><input type="checkbox" name="day[]" value="TH"> Thursday</label>

    <label><input type="checkbox" name="day[]" value="F"> Friday</label>

    <label><input type="checkbox" name="day[]" value="Sat"> Saturday</label>

</div>


<select id="select-Room" name="room">

    <option value="">Select Room</option>

    <?php include_once "GetRoom.php"; echo $options ?>

</select>


<div class="timeStart">

    <input autocomplete="off" required="" type="time" name="start_time" id="start_time">

    <label for="Time">Time from</label>

</div>


<div class="timeEnd">

    <input autocomplete="off" required="" type="time" name="end_time" id="end_time">

    <label for="Time">Time to</label>

</div>


<div class="inputGroup3">

    <input autocomplete="off" required="" type="text" name="course">

    <label for="Course">Course</label>

</div>


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


<div class="button-submit">

    <button type="submit">UPDATE</button>

</div>

</form>
  </div>
</div>





    </div>


    <div class="button-back">
                <button type="button" onclick ="window.location.href='Schedule.php'">
                  <-
                      
                </button>
</div>





  </body>


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



          .wrapper{
          border-radius: 50px;
          background-color:#fff;
          height: 900px;
          width: 700px;
          margin-top: 150px;
          margin-left: 500px;
          display: flex;
          justify-content: center;
          align-items: center;
      }


      .btn {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn:hover {
  background-color: #3e8e41;
}

#select-Subject,

#select-Teacher,

#select-Room,

#select-department {

    position: relative; /* Set to relative */

    width: 200px;

    padding: 10px;

    border: 2px solid #ccc;

    border-radius: 5px;

    font-size: 16px;

    margin: 10px 0; /* Added margin for spacing */

}


#select-Day {

    position: relative; /* Set to relative */

    border: 1px solid #ccc;

 padding: 10px;

    width: 100%; /* Adjust width as needed */

    height: auto; /* Adjust height as needed */

    overflow-y: auto;

    margin: 10px 0; /* Added margin for spacing */

}


#select-Day label {

    display: block;

    margin-bottom: 10px;

}


.timeStart,

.timeEnd,

.inputGroup3 {

    font-family: 'Montserrat', sans-serif;

    margin: 1em 0;

    max-width: 200px;

    position: relative; /* Set to relative */

}


.timeStart input,

.timeEnd input,

.inputGroup3 input {

    font-size: 100%;

    padding: 0.8em;

    outline: none;

    border: 2px solid rgb(200, 200, 200);

    background-color: transparent;

    width: 100%;

}


.button-submit button {
    margin-left: 100px;
    margin-top: 50px;
    display: flex;
    padding: 1.4em 4.5em;

    font-size: 12px;



    width: 15em;

    text-transform: uppercase;

    letter-spacing: 3.5px;

    font-weight: 500;

    color: #fff;

    background-color: #0652b5c6;

    border: none;

    border-radius: 25px;

    transition: all 0.3s ease 0s;

    cursor: pointer;

    outline: none;

   

}


.button-back button {

    display: flex;

    font-size: 20px;

    text-transform: uppercase;

    width: 65px;

    color: #fff;

    background-color: #670d04c6;

    border: none;

    border-radius: 13%;

    transition: all 0.3s ease 0s;

    cursor: pointer;

    outline: none;

    margin: 20px 0; /* Added margin for spacing */

}


.modal {

    display: none; /* Hidden by default */

    position: fixed; /* Stay in place */

    z-index: 1; /* Sit on top */

    left: 0;

    top: 0;

    width: 100%; /* Full width */

    height: 100%; /* Full height */

    overflow: auto; /* Enable scroll if needed */

    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */

}


.modal-content {

    background-color: #fefefe;

    margin: 15% auto; /* 15% from the top and centered */

    padding: 20px;

    border: 1px solid #888;

    width: 80%; /* Could be more or less, depending on screen size */

}


.close {

    color: #aaa;

    float: right;

    font-size: 28px;

    font-weight: bold;

}


.close:hover,

.close:focus {

    color: black;

    text-decoration: none;

    cursor: pointer;

}