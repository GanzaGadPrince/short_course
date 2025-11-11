<html>
    <head>
        <title>Module</title>
    
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

$sele= "SELECT * from module";

$result= mysqli_query($conn,$sele);
if (mysqli_num_rows($result)>0) {
   echo"<table><tr>
    <td><center>Module code</center></td>
    <td><center>Module Name</center></td></tr>";
    foreach ($result as $data) {
        echo"<tr>";
        echo"<td><center>";
        echo $data['Modulecode'];
        echo"</center></td>";
        echo"<td><center>";
        echo $data['Modulename'];
        echo"</center></td></tr>";
    }    
    }
    else {
        echo"PLEASE INPUT DATA FIRST";
    }
    echo"</table><br><br>";


        $back='<a href="doshome.php" class="bck">GO BACK</a>';
        echo $back;
        ?>

</center>
    </body>
</html>