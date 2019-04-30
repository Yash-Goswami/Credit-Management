<?php 
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'db1');
$q="select * from user";
$result=mysqli_query($con,$q);
$re=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style1.css"/>
<h1 align="center">Credit Management</h1>
</head>
<body>
<form action="transaction.php" method="post">
 <table border="2px" cellspacing="0px">
  <tr><th colspan="5">select user from this table from which you want to transfer credit</th></tr>
  <tr>
   <th>UID</th>
   <th>Uname</th>
   <th>email</th>
   <th>credit</th>
   <th>Select User</th>
  </tr>  
  <?php 
    for($i=1;$i<=$num;$i++){
	 $row=mysqli_fetch_array($result);	
	
   ?>
   <tr>
    <td><?php echo $row['uid'] ?></td>
	<td><?php echo $row['uname'] ?></td>
	<td><?php echo $row['email'] ?></td>
	<td><?php echo $row['credit'] ?></td>
	<td><input type="radio" name="y1" value="<?php echo $row['uid']?>" required/></td>
   </tr>
   <?php
    }
   ?>
  
 </table>
 <br><br>
  Select Transaction Amount:<select name="amount" required>
	    <option>5</option>
		<option>10</option>
		<option>20</option>
		<option>50</option>
		<option>100</option>
		<option>200</option>
		<option>2000</option>
 </select>
 <br><br><br>
 <table border="2px" cellspacing="0px">
   <tr><th colspan="5">select user from this table to whom you want to transfer credit</th></tr>
  <tr>
   <th>UID</th>
   <th>Uname</th>
   <th>email</th>
   <th>credit</th>
   <th>Select User</th>
  </tr>  
  <?php 
    for($i=1;$i<=$num;$i++){
	 $ro=mysqli_fetch_array($re);	
	
   ?>
   <tr>
    <td><?php echo $ro['uid'] ?></td>
	<td><?php echo $ro['uname'] ?></td>
	<td><?php echo $ro['email'] ?></td>
	<td><?php echo $ro['credit'] ?></td>
	<td><input type="radio" name="y2" value="<?php echo $ro['uid']?>" required/></td>
   </tr>
   <?php
    }
   ?>
  
 </table><br><br><br>
 <&nbsp><&nbsp><&nbsp><&nbsp><&nbsp><&nbsp><&nbsp><&nbsp><&nbsp><input type="submit" value="submit"><&nbsp><&nbsp><&nbsp><&nbsp><&nbsp><&nbsp><&nbsp><&nbsp><&nbsp>
 </form>
</body>
</html>