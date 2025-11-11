<html>
    <head><title>Trainee</title>
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
.submit-btn{
    height: 1cm;
    width: 3cm;
    border: 2px solid transparent;
    border-radius: 10px;
    margin-left: 20px;
    background-color: #ff5500;
    cursor: pointer;
    margin: 10px;
    font-weight: 600;
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
            <h2>ADD NEW TRAINEE</h2>
            <label>First name: <input type="text" name="fname" class="username-bar" required></label><br><br>
            <label>Last name: <input type="text" name="lname" class="username-bar" required></label><br><br>
            <label>Gender: <input type="gender" name="gender" class="username-bar" required></label><br><br>
            <label>Phone: <input type="text" name="phone" class="username-bar" required></label><br><br>
            <button type="submit" name="submit" class="submit-btn">Submit</button>
</form>        








    <?php
    $conn= mysqli_connect("localhost","root","","Short_course");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
        
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];

    $insert="INSERT into Trainees(Firstname, Lastname, Gender, Telephone) values('$fname','$lname','$gender','$phone')";

    $result= mysqli_query($conn,$insert);

    if ($result) {
        echo"$fname $lname <b>ADDED SUCCESSFULLY</b>";
    }
    else {
        echo"<b>PLEASE TRY AGAIN</b>";
    }

}

}

$back='<br><br><a href="doshome.php" class="bck">GO BACK</a>';
        echo $back;
    ?>

</center>
    </body>
</html>