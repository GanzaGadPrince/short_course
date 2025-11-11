<html>
    <head><title>MODULE</title>
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
            <h2>ADD NEW MODULE</h2>
            <label>Module name: <input type="text" name="modulename" class="username-bar" required></label><br><br>
            <button type="submit" name="submit" class="submit-btn">Submit</button>
</form>        








    <?php
    $conn= mysqli_connect("localhost","root","","Short_course");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
        
    $modulename=$_POST['modulename'];

    $insert="INSERT into module(modulename) values('$modulename')";

    $result= mysqli_query($conn,$insert);

    if ($result) {
        echo"$modulename <b>ADDED SUCCESSFULLY</b>";
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