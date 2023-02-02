<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check</title>
	
	<style>
		form{border-style: groove;border-radius: 5px;background-color: #f2f2f2;padding: 20px;}
		input{padding: 12px 10px;margin: 5px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;}
		button[type=submit] {background-color: #4CAF50;font-size: 15px;color: white;padding: 14px 20px;margin: 8px 0;border: none; border-radius: 4px;cursor: pointer;}
		p{color: red;font-size: 20px;}
	</style>

</head>
<body>
	<center>
		<?php include('config.php');?>
		<form method="post">
    		<div>
        		<label>Your First Name:</label>
       			<input type="text" name="first" required />
    		</div>
	
			<div>
      			<label>Your Last Name:</label>
        		<input type="text" name="last" required />
    		</div>

			<div>
        		<label> Room Number :</label>
        		<input type="tex" name="room" required />
    		</div>
	
			<div>
        		<label> Your Date :</label>
        		<input type="date" name="date" required />
    		</div>

    		<button type="submit" name="submit">Check</button>

<?php
session_start();

if (isset($_POST['submit'])) {

    $first = $_POST['first'];
	$last = $_POST['last'];
    $date = $_POST['date'];
	$room = $_POST['room'];
    $query = $connection->prepare("SELECT * FROM members WHERE first='$first'and last='$last'and date='$date' and room='$room' ");
    $query->bindParam("first", $first, PDO::PARAM_STR);
    $query->execute();
	$result = $query->fetchall();

    if ( !$result ) {
        echo '<p>Your name is not in the members list</p>';
    }else{
	?>
	<br>
	<?php
		echo "<p>Your Name: $first $last</p><br>";
		echo "<p>Your reservation date: $date</p><br>";
		echo "<p>Your room number: $room</p><br>";
	}
}
	?>
	</form>
</center>
</body>
</html>