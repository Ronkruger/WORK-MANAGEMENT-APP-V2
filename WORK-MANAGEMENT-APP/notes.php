<?php

//mysqli connectivity, select database
$connect= new mysqli("localhost","root","","work-management-app") or die("ERROR:could not connect to the database!!!");

//extract all html field
extract($_POST);
if(isset($save))
{
//store textarea values in <pre> tag
$msg="<pre>$a</pre>";

//insert values in textarea table
$query="insert into textarea values('','$e','$msg')";
$connect->query($query);
echo "Data saved";	

}

//click on display button to show all values entered by you
if(isset($disp))
{
	$query="select * from textarea";
	$result=$connect->query($query);
	echo "<table border=1>";
	echo "<tr><th>Email</th><th>Message</th></tr>";
	while($row=$result->fetch_array())
		{
		echo "<tr>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['message']."</td>";
		echo "</tr>";
		}
	echo "</table>";	
}
?>
