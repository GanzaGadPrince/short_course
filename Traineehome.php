<?php
session_start();


if (!$_SESSION["uname"]) {
    header("location: logout.php");
    exit();
}else {
    $username = $_SESSION['uname'];
?>





<html>
    <head><title>HOME</title>
    <style>
        .bck{
    margin-right: 45px;
    color: black;
    text-decoration: none;
    border-top: 2px solid #ff5500;
    padding: 8px;
    padding-left:17px;
    padding-right:17px;
    border-radius:10px;
    border-bottom: 2px solid #ff5500;
}
.bck:hover{
    background-color: #ff5500;

}
.signup{
    text-decoration:none;
    color:#ff5500;
}
.signup:hover{
    font-size:larger;
}
.dropdown-content {
    margin-left:500px;
    margin-right:500px;
    align-items:center;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  border: 2px solid #ff5500;
  border-radius:30px;
  padding-top:20px;
  padding-bottom:20px;
}
.submit-btn{
    height: 1cm;
    width: 3cm;
    border-radius: 10px;
    margin-left: 20px;
    border-bottom: 2px solid #ff5500;
    border-top: 2px solid #ff5500;
    cursor: pointer;
    margin: 10px;
    font-weight: 600;
    padding: 10px;
    color: #333;
}
.submit{
    border-radius: 10px;
    background-color: #333;
    padding-left: 15px;
    padding-right: 15px;
    padding: 5px;
    color: white;
}
.submit-btn:hover{
    background-color: #ff5500;
}
h2 {
  font-size: 42px;
  font-weight: bold;
  color: #333; 
  text-align: center;
  margin-top: 20px;
}

.username-bar{
    height: 0.7cm;
    width: 6cm;
    border: 1px solid rgb(173, 160, 160);
    border-radius: 8px;
    margin-bottom: 10px;
}
    </style>
</head>
    <body>
        <center>
            <form method="post" action="traineemarksreport.php">
            <h2>HELLO <?php echo $username; ?></h2>
            
            <button type="submit" name="submit" class="submit-btn">View Marks</button>
            
</form>

<form action="logout.php">
<button type="submit" name="submit" class="submit">Logout</button>
</form>



</center>

</body>
</html>
<?php
}
?>