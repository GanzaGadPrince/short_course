<html>
    <head><title>Signup</title>
    <style>
        .signup{
    text-decoration:none;
    color:#ff5500;
}
.signup:hover{
    font-size:larger;
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
            <form method="post">
            <h2>SIGNUP</h2>
            <label>username: <input type="text" name="uname" class="username-bar" required></label><br><br>
            <label>Password: <input type="password" name="pswrd" class="username-bar" required></label><br><br>
            <label>User type: <input type="text" name="utype" class="username-bar" required></label><br><br>
            <button type="submit" name="submit" class="submit-btn">Signup</button>
</form>        








    <?php
    session_start();
    $conn= mysqli_connect("localhost","root","","Short_course");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
        
    $uname=$_POST['uname'];
    $pswrd=md5($_POST['pswrd']);
    $utype=$_POST['utype'];

    

    $select="SELECT username from users WHERE username='$uname'";
    $result2=mysqli_query($conn,$select);

    $select_dos="SELECT username from users WHERE username='Dos'";
    $result_dos=mysqli_query($conn,$select_dos);  

    $select_check_student="SELECT * from trainees WHERE Firstname='$uname' OR Lastname='$uname'";
    $result_check_student=mysqli_query($conn,$select_check_student);

    

    
    if (mysqli_num_rows($result_dos) > 0) {
        
        if (mysqli_num_rows($result_check_student)>0) {
            
        
        $insert = "INSERT into users(username, password, usertype) values('$uname','$pswrd','$utype')";
        $result = mysqli_query($conn, $insert);
        if ($result) {
            $_SESSION['name'] = $uname;
            if ($utype != "Dos") {
                if (mysqli_num_rows($result2)<1) {
                   echo '<script>alert("WELCOME!!");</script>';
                   $_SESSION['uname'] = $uname;
                header("Location: Traineehome.php"); 
                }else {
                    echo '<script>alert("USER ALREADY EXIST!!");</script>';
                }
                
            } else {
                echo '<script>alert("THE DOS ALREADY EXIST");</script>';
            }
            
        } else {
            echo '<b>PROBLEM INSERTING DATA</b>';
        }
    }else {
        echo '<script>alert("MAKE SURE YOU ARE A STUDENT");</script>';
    }

} else {
        $insert = "INSERT into users(username, password, usertype) values('$uname','$pswrd','$utype')";
        $result = mysqli_query($conn, $insert);
        if ($result) {
           
            echo '<script>alert("WELCOME!!");</script>';
            if ($utype == "Dos") {
                $_SESSION['name'] = $uname;
                header("Location: Doshome.php");
            } else {
                $_SESSION['uname'] = $uname;
                header("Location: Traineehome.php");
            }
            exit();
        } else {
            echo '<b>PROBLEM INSERTING DATA</b>';
        }
    }
    
    

}

}
    ?>
Already have an account <a href="index.php" class="signup">LOGIN</a>

</center>
    </body>
</html>