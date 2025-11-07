<html>
<head>
<title>employee</title>
</head>
<body>

<form method="POST" action="#">
Enter ID:<input type="text" name="eid"><br><br>
Enter Name:<input type="text" name="ename"><br><br>
Enter Dept:<input type="text" name="dept"><br><br>
Enter Salary:<input type="text" name="salry"><br><br>
<input type ="submit" name="submit">


</form>
</body>
</html>

<?php
$servername="localhost";
$username="root"; $password="";
$dbname="retrive";
$tbname="employee";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    die("connection failed".mysqli_connect_error());
}
else{
    echo"<br><h2 align=centre>connectede..</h2><br/>";
}
$id=$_POST['eid'];
$name=$_POST['ename'];
$dep=$_POST['dept'];
$salary=$_POST['salry'];
$query="INSERT INTO employee(eid,ename,dept,salry)
VALUES('".$id."','".$name."','".$dep."','".$salary."')";
$res=mysqli_query($conn,$query);
if($res)
{
    echo"SUBMITTED SUCCESSULLY!!";
}
else
{
    echo"ERROR";
}
echo"<br><h2 align =centre>EMPLOYEE  DETAILS</h2><br/>";
$sql="SELECT*FROM employee";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
    echo"<table border=2 align=centre>";
    echo"<tr><th>Employee ID</th>";
    echo"<th>Employee name</th>";
    echo"<th>Department</th>";
    echo"<th>Salary</th></tr>";

        while($row=mysqli_fetch_assoc($res))
{
    echo"<tr><td>$row[eid]</td>";
    echo"<td>$row[ename]</td>";
    echo"<td>$row[dept]</td>";
    echo"<td>$row[salry]</td></tr>";

}
echo"</table>";
}
else
{
    echo "0 results";
}
mysqli_close($conn);
?>