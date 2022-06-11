<?php
session_start();
if (isset($_SESSION['auyfgigafa'])) {
	// echo "Logged in";
} else {
	// echo "Not logged In";
	header("Location: login.php");
}
?>

<?php
include("../includes/header.php");

if (isset($_POST['submit'])) {
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$age = $_POST['age'];
	$occupation = trim($_POST['occupation']);
	$description = trim($_POST['description']);

	$valid = 1;
	$msgPreError = "\n<div class=\"alert alert-danger\" role=\"alert\">";
	$msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
	$msgPost = "\n</div>";

	//Valid First Name 
	if ((strlen($first_name) < 2) || (strlen($first_name) > 20)) {
		$valid = 0;
		$valFirstNameMsg = "Please enter a first name between 2 to 20 characters.";
	}

	//Valid Last Name 
	if ((strlen($last_name) < 2) || (strlen($last_name) > 20)) {
		$valid = 0;
		$valLastNameMsg = "Please enter a last name between 2 to 20 characters.";
	}

	//Valid Age 
	if ($age == "") {
		$valid = 0;
		$valAgeMsg = "Please enter an age";
	}

	//Valid Name 
	if ((strlen($occupation) < 3) || (strlen($occupation) > 40)) {
		$valid = 0;
		$valOccupationMsg = "Please enter an occupation between 3 to 50 characters.";
	}

	if ($description != "") {
		if ((strlen($description) < 2) || (strlen($description) > 200)) {
			$valid = 0;
			$valDescriptionMsg = "Please enter a description that is greater than 2 characters & less than or equal to 200 characters.";
		}
	}

	if ($valid == 1) {
		mysqli_query($con, "insert into characterslab(first_name, last_name, age, occupation, description) values('$first_name', '$last_name','$age', '$occupation', '$description')") or die(mysqli_error($con));
		$msgSuccess = "Success. A new character has been added.";

		//Clear variables if everything is good. Doesn't leave form pre populated.
		$first_name = "";
		$last_name = "";
		$age = "";
		$occupation = "";
		$description = "";
	}
}
?>
<h2>Insert</h2>
<?php
if ($msgSuccess) {
	echo $msgPreSuccess . $msgSuccess . $msgPost;
}
?>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<div class="form-group">
		<label for="first_name">Firstname:</label>
		<input type="text" name="first_name" class="form-control" value="<?php echo $first_name ?>">
		<?php
		if ($valFirstNameMsg) {
			echo $msgPreError . $valFirstNameMsg . $msgPost;
		}
		?>
	</div>
	<div class="form-group">
		<label for="last_name">Lastname:</label>
		<input name="last_name" class="form-control" value="<?php echo $last_name ?>">
		<?php
		if ($valLastNameMsg) {
			echo $msgPreError . $valLastNameMsg . $msgPost;
		}
		?>
	</div>
	<div class="form-group">
		<label for="age">Age:</label>
		<input name="age" class="form-control" value="<?php echo $age ?>">
		<?php
		if ($valAgeMsg) {
			echo $msgPreError . $valAgeMsg . $msgPost;
		}
		?>
	</div>
	<div class="form-group">
		<label for="occupation">Occupation:</label>
		<input name="occupation" class="form-control" value="<?php echo $occupation ?>">
		<?php
		if ($valOccupationMsg) {
			echo $msgPreError . $valOccupationMsg . $msgPost;
		}
		?>
	</div>
	<div class="form-group">
		<textarea name="description" id="" cols="30" rows="10" class="form-control"><?php if ($description) {
																						echo $description;
																					} ?></textarea>
		<?php
		if ($valDescriptionMsg) {
			echo $msgPreError . $valDescriptionMsg . $msgPost;
		}
		?>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-info" value="Submit">
	</div>


</form>
<?php
include("../includes/footer.php");
?>