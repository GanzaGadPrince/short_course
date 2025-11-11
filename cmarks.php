<html>
    <head><title>Marks</title>
    <style>
        .bck{
    font-size: larger;
    margin-right: 45px;
    color: black;
    text-decoration: none;
    background-color: #ff5500;
    padding: 7px;
    border-radius:10px;
}
.bck:hover{
    border-bottom: 2px solid #ff5500;

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
    <body>

    <?php
    $conn=mysqli_connect("localhost","root","","Short_course");
    $sele="SELECT * from module";
    $result=mysqli_query($conn,$sele);

    $tsele="SELECT * from trainees";
    $tresult=mysqli_query($conn,$tsele);

    
    ?>


        <center>
            <h2>ADD MARKS</h2>
            <form method="post">
                
            <label>Trainee: <select name="trainee" class="username-bar" required>
                    <option>Names</option>
                        <?php
                            if (mysqli_num_rows($result)>0) {
                                foreach ($tresult as $ddata) {
                                    echo"<option value='" . $ddata['Trainee'] . "'>" . $ddata['Firstname'] . " " . $ddata['Lastname'] . "</option>";
                                }  
                            }else {
                                echo"INPUT DATA FIRST";
                            }
                            ?>
            </select></label><br><br>




            <label>Module: <select name="module" class="username-bar" required>
                    <option>Name</option>
                        <?php
                            if (mysqli_num_rows($result)>0) {
                                foreach ($result as $mdata) {
                                    echo"<option value='" . $mdata['Modulecode'] . "'>" . $mdata['Modulename'] . "</option>";
                                }  
                            }else {
                                echo"INPUT DATA FIRST";
                            }
                            ?>
            </select></label><br><br>

            <label>Assessment Marks: <input type="number" name="amarks" class="username-bar" required></label><br><br>

            <label>Exam Marks: <input type="number" name="emarks" class="username-bar" required></label><br><br>

            

            


            <button type="submit" name="submit" class="submit-btn">Submit</button>
            </form>










                <?php
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                if (isset($_POST['submit'])) {
                    $trainee=$_POST['trainee'];
                    $module=$_POST['module']; 
                    $amarks=$_POST['amarks'];
                    $emarks=$_POST['emarks'];


                    $insert="INSERT into marks(Trainee, Modulecode, Assessmentmarks, exammarks) values('$trainee','$module','$amarks','$emarks')";
                    
                    $donne=mysqli_query($conn,$insert);
                    if ($donne) {
                        echo"<b>NEW MARKS ADDED SUCCESSFULLY</b>";


                

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