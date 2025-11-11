<html>
    <head>
        <title>Marks</title>
    
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
    </style>
    </head>
    <body>
<center>

<?php


$conn= mysqli_connect("localhost","root","","Short_course");

$sele= "SELECT concat(trainees.firstname,' ', trainees.lastname) as names, marks.Assessmentmarks, marks.Exammarks from marks join trainees on marks.trainee=trainees.trainee ORDER BY sum(marks.Assessmentmarks+marks.Exammarks) DESC";
            $result=mysqli_query($conn,$sele);
            $no=1;
            if ($result) {
                echo"<table border=0><tr>
                <td><center>NO</center></td>
                <td><center>Trainee Names</center></td>
                <td><center>Assessment</center></td>
                <td><center>Exam</center></td>
                <td><center>Total</center></td></tr>";
                    foreach ($result as $data) {
                        echo"<tr>";
                        echo"<td><center>";
                        echo $no;
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['names'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Assessmentmarks'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Exammarks'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Assessmentmarks']+$data['Exammarks'];
                        echo"</center>\n</td>";
                        echo"</tr>"; 
                        $no=$no++;
                    }   
        
        
                    }

        
    
$back='<br><br><a href="doshome.php" class="bck">GO BACK</a>';
        echo $back;
        


?>
<button onclick="window.print();" class="bck">Print</button>

</center>
    </body>
</html>