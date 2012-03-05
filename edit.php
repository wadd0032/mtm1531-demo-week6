<?php

require_once 'includes/filter-wrapper.php';

$errors = array();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	if (empty($id)) {
		header('Location: index.php');
		exit;
	}

$dino_name = filter_input(INPUT_POST, 'dino_name', FILTER_SANITIZE_STRING);
$period = filter_input(INPUT_POST, 'period', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($dino_name)) {
		$errors['dino_name'] = true;
	}
	
	if (empty($period)) {
		$errors['period'] = true;
	}
	
	if (empty($errors)) {
		require_once 'includes/db.php';
		
		$sql = $db->prepare('
			UPDATE dinosaurs
			SET dino_name = :dino_name, period = :period
			WHERE id = :id
		');
		$sql->bindValue(':dino_name', $dino_name, PDO::PARAM_STR);
		$sql->bindValue(':period', $period, PDO::PARAM_STR);
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
} else {
	require_once 'includes/db.php';

	$sql = $db->prepare('
		SELECT id, dino_name, period 
		FROM dinosaurs
		WHERE id = :id
	');
	
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();
	
	$dino_name = $results['dino_name'];
	$period = $results['period'];
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Dinosaur Info</title>
</head>

<body>

	<form method="post" action="edit.php?id=<?php echo $id; ?>">
		<div>
			<label for="dino_name">Dinosaur Name<?php if (isset($errors['dino_name'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="dino_name" name="dino_name" value="<?php echo $dino_name; ?>" required>
		</div>
		
		<div>
			<label for="period">Period<?php if (isset($errors['period'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="period" name="period" value="<?php echo $period; ?>" required>
		</div>
		
		<button type="submit">Save</button>

</body>
</html>