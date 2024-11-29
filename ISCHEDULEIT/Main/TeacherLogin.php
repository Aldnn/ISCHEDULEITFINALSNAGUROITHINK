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
       <form action="loginteacher.php" method="POST">
          <div class="inputGroup">
            <input autocomplete="off" required="" type="text" name="teacher_id" id="Teacher">
            <label for="Teacher">Teacher ID</label>
          </div>
 
        <div class="inputGroup2">
           <input autocomplete="off" required="" type="password" name="password" id="Password">
           <label for="Password">Password</label>
        </div>
 
         <div class="button-login">
          <button type="submit">
           LOGIN
         </button>
 
        </div>
       </form>
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
        overflow: hidden;
    }


.wrapper{
    border-radius: 50px;
    background-color:#eeeeee;
    height: 400px;
    width: 700px;
    margin-top: 150px;
    margin-left: 400px;
    display: flex;
    justify-content: center;
    align-items: center;

}
.image-icon{
    position: absolute;
    margin-right: 400px;
    margin-top: -70px;
}
.inputGroup {
  font-family:  'Montserrat', sans-serif;
  margin: 1em 0 1em 0;
  max-width: 190px;
  position: relative;
  top: -40px;
  left: -10px;
}

.inputGroup input {
  font-size: 100%;
  padding: 0.8em;
  outline: none;
  border: 2px solid rgb(200, 200, 200);
  background-color: transparent;
  border-radius: 20px;
  width: 100%;
  
}

.inputGroup label {
  font-size: 100%;
  position: absolute;
  left: 0;
  padding: 0.8em;
  margin-left: 0.5em;
  pointer-events: none;
  transition: all 0.3s ease;
  color: rgb(100, 100, 100);
}

.inputGroup :is(input:focus, input:valid)~label {
  transform: translateY(-50%) scale(.9);
  margin: 0em;
  margin-left: 1.3em;
  padding: 0.4em;
  background-color: #eeeeee;
}

.inputGroup :is(input:focus, input:valid) {
  border-color: rgb(13, 13, 18);
}


.inputGroup2 {
  font-family:  'Montserrat', sans-serif;
  margin: 1em 0 1em 0;
  max-width: 190px;
  position: relative;
  left: -10px;
  top: -10px;
  
}

.inputGroup2 input {
  font-size: 100%;
  padding: 0.8em;
  outline: none;
  border: 2px solid rgb(200, 200, 200);
  background-color: transparent;
  border-radius: 20px;
  width: 100%;
 
  
}

.inputGroup2 label {
  font-size: 100%;
  position: absolute;
  left: 0;
  padding: 0.8em;
  margin-left: 0.5em;
  pointer-events: none;
  transition: all 0.3s ease;
  color: rgb(100, 100, 100);
}

.inputGroup2 :is(input:focus, input:valid)~label {
  transform: translateY(-50%) scale(.9);
  margin: 0em;
  margin-left: 1.3em;
  padding: 0.4em;
  background-color: #eeeeee;
}

.inputGroup2 :is(input:focus, input:valid) {
  border-color: rgb(13, 13, 18);
}


.button-login button {
  display:flex;
  padding: 1.3em 1em;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #fff;
  background-color:  #069332c6;
  border: none;
  border-radius: 45px;
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  left: 25%;
  top:50px;

 
}

.button-login button:hover {
  background-color: #059a5f;
  box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
  color: #fff;
  transform: translateY(-7px);
}

.button-loginbutton:active {
  transform: translateY(-1px);

}




@media (max-width: 768px) {

.wrapper {

  width: 100%; 

  margin-left: auto;

  margin-right: auto; 

  margin-top: 50px; 
  
 
}


.inputGroup, .inputGroup2 {

  max-width: 80%; 
  left: 0; 
  top: 10; 

}


.button-login button {

  left: 0; 
  width: 80%; 
}

}


@media (max-width: 480px) {

.wrapper {

  height: 500px; 
     
  padding: 20px; 
}


.inputGroup, .inputGroup2 {

  max-width: 100%; 
  left: 0; 

}


.button-login button {
  margin-top: 30%;
  padding: 1em;
  font-size: 12px;
  margin-left: 45px;

}

}
    </style>
