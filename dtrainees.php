<html>
    <head>
        <title>Trainees</title>
    
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

$sele= "SELECT * from trainees";
            $result=mysqli_query($conn,$sele);
            $no=1;
            if ($result) {
                echo"<table border=0><tr>
                <td><center>NO</center></td>
                <td><center>Trainee ID</center></td>
                <td><center>Firstname</center></td>
                <td><center>Lastname</center></td>
                <td><center>Gender</center></td>
                <td><center>Telephone</center></td></tr>";
                    foreach ($result as $data) {
                        echo"<tr>";
                        echo"<td><center>";
                        echo $no;
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Trainee'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Firstname'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Lastname'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Gender'];
                        echo"</center>\n</td>";
                        echo"<td><center>";
                        echo $data['Telephone'];
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