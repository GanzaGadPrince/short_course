<?php
session_start();


if (!$_SESSION["uname"]) {
    header("location: logout.php");
    exit();
}else {
    $username = $_SESSION['uname'];
?>



<html>
    <head><title>Marks Report</title>
    <style>
        .tr1{
            font-size:large;
            font-weight:bold;
            padding-bottom:5px;
            margin-bottom:1px;
        }
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
<?php


$conn=mysqli_connect("localhost","root","","Short_course");



if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST['submit'])) {






            $select="SELECT module.Modulename, marks.Assessmentmarks, marks.exammarks from marks join module on marks.modulecode=module.modulecode join Trainees on marks.Trainee = Trainees.Trainee where Trainees.Firstname='$username'";
            $result=mysqli_query($conn,$select);
            $avg=0;
            if ($result) {
                echo'<table border=0><tr>
                <td><center class="tr1">Module Title</center></td>
                <td><center class="tr1">Assessment</center></td>
                <td><center class="tr1">Exam</center></td>
                <td><center class="tr1">Total</center></td>
                <td><center class="tr1">Decision</center></td></tr>';
                    foreach ($result as $data) {
                        $sum=$data['Assessmentmarks'] + $data['exammarks'];
                        echo"<tr>";
                        echo"<td><center>";
                        echo $data['Modulename'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Assessmentmarks'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['exammarks'];
                        echo"</center>\n</td>";
                        echo"<td><center>".$sum;
                        echo"</center></td>";
                        echo"<td><center>";
                        echo"</center></td>";
                        echo"</tr>"; 
                        $avg=$avg+$sum;
                       
                    }    
                    }

                    echo"<tr>"; 
                    echo"<td colspan=4><center>Average";
                    echo"</center></td>";
                    echo"<td><center>";
                    echo $avg/mysqli_num_rows($result);
                    echo"</center></td>";
                    echo"</tr>";
                    echo"</table><br><br>";
    }

}


$back1='<a href="Traineehome.php" class="bck">GO BACK</a>';
        
        echo $back1;
        

}
?>
<button onclick="window.print();" class="bck">Print</button>

</center>
</body>

</html>