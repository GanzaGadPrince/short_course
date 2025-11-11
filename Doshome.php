<?php
session_start();


if (!$_SESSION["name"]) {
    header("location: logout.php");
    exit();
}?>



<!DOCTYPE html>
<html lang="en">
<head>
    <style>


    header {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}


.navbox {
    display: flex;
    justify-content: space-between;
    align-items: center;
}


.home{
    font-size: larger;
    margin-right: 45px;
    color: black;
    text-decoration: none;
}


.home:hover{
    border-bottom: 2px solid #ff5500;
}


.product{
    font-size: larger;
    margin-right: 45px;
    color: black;
    text-decoration: none;
}


.product:hover{
    border-bottom: 2px solid #ff5500;
}


.about{
    font-size: larger;
    color: black;
    text-decoration: none;
}


.about:hover{
    border-bottom: 2px solid #ff5500;
}


.accdrp{
    border: none;
    font-size: 20px;
    margin-right: 15px;
}


.dropbtn {
    font-size: larger;
    margin-right: 45px;
    color: black;
    text-decoration: none;
    border: none;
    
}


.dropdown {
  position: relative;
  display: inline-block;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border-bottom: 2px solid #ff5500;
}


.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}


.dropdown-content a:hover {background-color: #ddd;}


.dropdown:hover .dropdown-content {display: block;}


.dropdown:hover .dropbtn {
    border-bottom: 2px solid #ff5500;
    cursor: pointer;

    }
    .submit-btn{
    height: 1cm;
    width: 3cm;
    border-radius: 10px;
    margin-left: 20px;
    border:none;
    margin: 10px;
    font-weight: 600;
    padding: 3px;
}

    </style>


</head>

<body>


    <header>


        <div class="navbox">

            <div class="nov">

            <a href="nav.html" class="home">Home</a>

            <div class="dropdown">
                <div class="dropbtn">Modules</div>
                <div class="dropdown-content">
                  <a href="cmodule.php">Add new</a>
                  <a href="dmodule.php">View Modules</a>
                  <a href="smodule.php">Search Module</a>
                </div>
              </div>


              <div class="dropdown">
                <div class="dropbtn">Trainee</div>
                <div class="dropdown-content">
                  <a href="ctrainee.php">Add new</a>
                  <a href="dtrainees.php">View Trainees</a>
                </div>
              </div>


            <div class="dropdown">
                <div class="dropbtn">Marks</div>
                <div class="dropdown-content">
                  <a href="cmarks.php">Add new</a>
                  <a href="dmarks.php">View Marks</a>
                </div>
              </div>


                </div>


                <div class="dropdown">
                <div class="dropbtn"><form action="logout.php">
<button type="submit" name="submit" class="submit-btn">Logout</button>
</form></div>


              </div>
              </div>
        </div>    
        </div>
    </header>
</body>
</html>
