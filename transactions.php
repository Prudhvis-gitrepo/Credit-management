<!DOCTYPE html>
<html>
<head>
	<title>All Transactions</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<a href="homepage.php">Go back</a>
	<?php include 'dbconfig.php';
	$query="select a.user_name as auser_name,a.user_email as auser_email,transfered_amount,c.user_name as cuser_name,c.user_email as cuser_email from users a inner join transactions b inner join users c on a.id=b.from_id and c.id=b.to_id order by b.trans_id desc";
	$result=mysqli_query($db,$query);

	echo '<h1>Transactions</h1><table width="100%"><thead>
	<tr><th colspan="2">from</th>
		<th colspan="2">to</th>
	</tr>
	<tr>
		<th>name</th>
		<th>email</th>
		<th>name</th>
		<th>email</th>
		<th>amount</th>
	</tr>
</thead>
<tbody>';
	while($row=mysqli_fetch_assoc($result)){
		echo '<tr><td>'.$row['auser_name'].'</td><td>'.$row['auser_email'].'</td><td>'.$row['cuser_name'].'</td><td>'.$row['cuser_email'].'</td><td>'.$row['transfered_amount'].'</td></tr>';
	}
	echo '</tbody></table>';
	?>
</body>
</html>