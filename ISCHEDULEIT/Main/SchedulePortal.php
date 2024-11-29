<!DOCTYPE html>
<html lang="en">
    <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content ="width=device-width, initial-scale=1.0">
     <title> ISCHEDULEIT HOME</title>
     <link rel="stylesheet" href="style.css">
    </head>

    <body>
      <div class="wrapper">
        <div class="image-icon">
            <img src="CPC3-removebg-preview.png">
        </div>
     
        <div class="button-container">
            <div class="button-student">
             <button type ="button" onclick = "window.location.href ='AdminLogin.php'">Admin</button>
            </div>

         <div class="button-teacher">
          <button type ="button" onclick = "window.location.href= 'TeacherLogin.php'">Teacher</button>
            </div>
              </div>
    
    </body>

    <style>

  @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

  * {
    font-family: "Montserrat", sans-serif;
  }

  body {
    background-image: url("cpc4.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    overflow: hidden;
  }

  .wrapper {
    border-radius: 50px;
    background-color: #eeeeee;
    height: 400px;
    width: 700px;
    margin-top: 150px;
    margin-left: 450px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column; 

  }



  .button-container {
    display: flex;
    flex-direction: column; 
    gap: 25px; 
  }

  .button-student button,
  .button-teacher button {
    display: flex;
    padding: 1.3em 1em;
    font-size: 15px;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    font-weight: 500;
    color: #fff;
    background-color: #069332c6;
    border: none;
    border-radius: 45px;
    transition: all 0.3s ease 0s;
    cursor: pointer;
    outline: none;
    margin-left: 45px;
  }

  .button-student button:hover,
  .button-teacher button:hover {
    background-color: #059a5f;
    box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
    color: #fff;
    transform: translateY(-7px);
  }

  .button-student button:active,
  .button-teacher button:active {
    transform: translateY(-1px);
  }

  


  @media (max-width: 768px) {
    .wrapper {
      width: 90%; 
      margin-left: auto;
      margin-right: auto; 
    }


    .button-student button,
    .button-teacher button {
      padding: 1em 0.5em; 
      font-size: 14px; 
    }

    
  }

  @media (max-width: 480px) {

    .wrapper {
      height: 400px; 
    }

    .button-student button,
    .button-teacher button {
      font-size: 10px; 
      padding: 0.8em 0.4em; 
      margin-left: 45px;
    }

  }

</style>