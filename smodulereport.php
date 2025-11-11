<html>
    <head><title>MODULE</title>
    <style>
    tr, td {
    border-bottom: 5px solid #ddd;
    }
    table{
        margin: 50px;
        width:77%;
        height:40%;
    }
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
    <body>
        <center>
<?php
$conn=mysqli_connect("localhost","root","","Short_course");



if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST['submit'])) {


        $module=$_POST['module'];


        

        


        $module_select_check="SELECT * from module where Modulecode='$module'";
        $module_result_check=mysqli_query($conn,$module_select_check);





        if (mysqli_num_rows($module_result_check) > 0) {

            $sele= "SELECT concat(trainees.firstname,' ', trainees.lastname) as names, module.Modulename, marks.Assessmentmarks, marks.exammarks from marks join trainees on marks.trainee=trainees.trainee join module on module.Modulecode=marks.Modulecode where marks.Modulecode=$module";
            $result=mysqli_query($conn,$sele);
           $avg=0;
            $no=1;
            if ($result) {
                 
                echo"<table border=0><tr>
                <td><center>NO</center></td>
                <td><center>Trainee Names</center></td>
                <td><center>Module</center></td>
                <td><center>Assessment</center></td>
                <td><center>Exam</center></td>
                <td><center>Total</center></td></tr>";
                    foreach ($result as $data) {
                        $sum=$data['Assessmentmarks'] + $data['exammarks'];
                        echo"<tr>";
                        echo"<td><center>";
                        echo $no;
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['names'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Modulename'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Assessmentmarks'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['exammarks'];
                        echo"</center>\n</td>";
                        echo"<td><center>$sum";
                        echo"</center></td>";
                        echo"</tr>"; 
                        $no=$no++;
                        $avg=$avg+$sum;
                    }   
                    


                    echo"<tr>";
                    echo"<td colspan=5><center>Class Average";
                    echo"</center></td>";
                    echo"<td><center>";
                    echo $avg/mysqli_num_rows($result);
                    echo"</center></td>";
                    echo"</tr>";
                    echo"</table><br><br>";
        
        
                    }
        }
        else {
            echo"NO SUCH MODULE";
        }

        
    }

}

$back='<br><br><a href="doshome.php" class="bck">HOME</a>';

$back1='<a href="smodule.php" class="bck">GO BACK</a>';
        echo $back;
        echo $back1;
        


?>
<button onclick="window.print();" class="bck">Print</button>

</center>
</body>

</html>
