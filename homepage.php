<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"</script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#mytable").on('click','.transferbtn',function(){
				var row=$(this).closest("tr");
				var from = parseInt(row.find("td:eq(0)").text(),10);
				$.cookie('from_id',from,{expires:10, path:'transfer.php'});

				var cur_credit_of_from=parseInt(row.find("td:eq(2)").text(),10);
				$("#amt").attr('max',cur_credit_of_from);
				//alert(from_id);
				$("#myModal").css('display','block');
				$(".close").click(function(){
					$("#myModal").css('display',"none");
				});
				$(window).click(function(event){
					if (event.target.id =="myModal" ) {
   						$("#myModal").css('display','none') ;
					}
				});
			});
		});
	</script>
</head>
<body>
	<a href="transactions.php">See all transactions</a>
	<?php include 'dbconfig.php';
	$query="select * from users";
	$result=mysqli_query($db,$query);

	echo '<table width="100%" id="mytable"><thead><tr>
		<th>No</th>
		<th>Transfer from</th>
		<th>current credit</th>
		<th>email</th>
	</tr>
</thead>
<tbody>';
	while($row=mysqli_fetch_assoc($result)){
		echo '<tr><td>'.$row['id'].'</td><td><button class="transferbtn">'.$row['user_name'].' </button></td><td>'.$row['current_credit'].'</td><td>'.$row['user_email'].'</td></tr>';
	}
	echo '</tbody></table>';
	mysqli_free_result($result);
?>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="transfer.php" method="POST">
    	<label for="to">Transfer to:</label>
    	<select id="to" name="to">
	<option value="0">--to--</option>';
	<?php 
	$result=mysqli_query($db,$query);
	while($row=mysqli_fetch_assoc($result)){
		echo '<option value="'.$row['id'].'">'.$row['user_name'].'</option>';
	}
	mysqli_close($db);
	?>
</select>
	<br>
	<label for="amt">Amount:</label>

	<input type="number" id="amt" name="amt" max="0">
	<br><br>
	<input type="submit" value="submit" name="submit">
    </form>
  </div>

</div>
</body>
</html>