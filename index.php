<html>
    <head><title>LOGIN</title>
    <style>
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
            <h2>LOGIN</h2>
            <label>Username<input type="text" name="uname" class="username-bar" required></label><br><br>
            <label>Password<input type="password" name="password" class="username-bar" required></label><br><br>
            <button type="submit" name="submit" class="submit-btn">Login</button>
</form>









        
        <?php
        session_start();
    $conn=mysqli_connect("localhost","root","","Short_course");
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        if (isset($_POST['submit'])) {
        
        $uname=$_POST['uname'];
        $pswrd=md5($_POST['password']);

        $select="SELECT username, password from users WHERE username='$uname' AND password='$pswrd'";
         
    $result=mysqli_query($conn,$select);

    

            if (mysqli_num_rows($result)>=1) {
                
                
                if ($uname == 'dos') {
                    $_SESSION['name'] = $uname;
                    echo'<script>
                alert("WELCOME BACK!!");
                </script>';
                    header("Location: doshome.php");
                } else {
                    $_SESSION['uname'] = $uname;
                    echo'<script>
                alert("WELCOME BACK!!");
                </script>';
                    header("Location: traineehome.php");
                }
                exit();        
        
            }
            else {
                echo'<script>';
                echo'alert("INCORRECT LOGIN")';
                echo'</script>';
            }

        

    
    



}
    }

    

        ?>
        Don't have an account yet <a href="signup.php" class="signup">SIGNUP</a>
</center>
    </body>
</html>
