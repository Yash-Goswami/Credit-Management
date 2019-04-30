<?php 
if($_POST['y1']==$_POST['y2'])
	echo "You have selected same users.Please select different users for transaction";
else{
	$con=mysqli_connect('localhost','root');
    mysqli_select_db($con,'db1');
	$uid1=$_POST['y1'];
	$uid2=$_POST['y2'];
	$amt=$_POST['amount'];
	$q1="update user set credit=credit-$amt where uid=$uid1";
	$x=mysqli_query($con,$q1);
	$q2="update user set credit=credit+$amt where uid=$uid2";
	$y=mysqli_query($con,$q2);
	if($x===true){
		$q3="insert into transaction(from_user,credit_transfered,to_user) values($uid1,$amt,$uid2)";
	    $z=mysqli_query($con,$q3);
		if($z===true)
			echo "transaction successful";
	}
	else
		echo "credit value can't be in -ve";
	mysqli_close($con);
}

?>