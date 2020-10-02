<!DOCTYPE html>
<html>
<body>

<?php include 'dbconfig.php';
if(isset($_POST['submit'])){
	$from=$_COOKIE['from_id'];
	$to=$_POST['to'];
	$amount=$_POST['amt'];
	unset($_POST);
	$query="update users set current_credit=current_credit-'$amount' where id='$from';";
	if(mysqli_query($db,$query)){
		$query="update users set current_credit=current_credit+'$amount' where id='$to';";
		if(mysqli_query($db,$query)){
			$query="insert into transactions(from_id,to_id, transfered_amount) values('$from','$to','$amount')";
			if(mysqli_query($db,$query)){
				mysqli_query($db,"commit");
				echo '<h3>Transaction Success</h3>';
				header("refresh:0.5 ;url=transactions.php");
			}
			else{mysqli_query($db,"roll back");
				echo 'error inserting'.mysqli_error($db);
			}
		}
		else{mysqli_query($db,"roll back");
			echo "Error updating".mysqli_error($db);}
	}
	else{
		mysqli_query($db,"roll back");
		echo "Error updating ".mysqli_error($db);
	}
}
mysqli_close($db);
?>

</body>
</html>