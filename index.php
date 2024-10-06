<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
    <?php
    $query = "SELECT
	 			CASE 
	 				WHEN student_Id = 1 THEN 'Alice Jhonson'
	 				WHEN student_Id = 2 THEN 'Bob Smith'
	 				WHEN student_Id= 3 THEN 'Diana Prince'
	 				WHEN Tstudent_Id = 4 THEN Hannah Lee'
                    student_Id = 5 THEN 'Houston'
	 			END AS student_Id, COUNT(*) AS studentCount
				FROM student_Id
	 			GROUP BY student_Id
	 		  ";

	 $stmt = $pdo->prepare($query);
	 $executeQuery = $stmt->execute();

	 if ($executeQuery) {
	 	$distanceByTripID = $stmt->fetchAll();
	 }

	 else {
	 	echo "Query failed";
	 }

	?>
	
	<table>
		<tr>
			<th>TripID</th>
			<th>Distance</th>
		</tr>
		<?php foreach ($distanceByTripID as $row) { ?>
		<tr>
			<td><?php echo $row['TripID']; ?></td>
			<td><?php echo $row['distanceCount']; ?></td>
		</tr>
		<?php } ?>
	</table> 
    
</body>
</html>
