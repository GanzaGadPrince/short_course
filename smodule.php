<html>
    <head><title>Search Module</title>
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
<?php

$conn=mysqli_connect("localhost","root","","Short_course");
                
$sele="SELECT * from module";
$result2=mysqli_query($conn,$sele);

?>
    <body>
        <center>

            <form action="smodulereport.php" method="post">

            <h2>ENTER MODULE NAME</h2>

            <label>Module:<select name="module" class="username-bar" required>
                <option>Names</option>
                <?php                
                if (mysqli_num_rows($result2)>0) {
                    foreach ($result2 as $dat) {
                        echo"<option value='".$dat['Modulecode']."'>".$dat['Modulename']."</option>";
                    }  
                }else {
                    echo"INPUT DATA FIRST";
                }                
                ?>
            </select></label><br><br>


            <button type="submit" name="submit" class="submit-btn">Search</button>

</form>

<br><br><a href="doshome.php" class="bck">GO BACK</a>


</center>

</body>
</html>