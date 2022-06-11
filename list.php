<?php
include("includes/header.php");
?>
<div class="jumbotron clearfix">
  <h1>List Characters</h1>
</div>

<?php
$result = mysqli_query($con, "Select * from characterslab");
while ($row = mysqli_fetch_array($result)) {
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $occupation = $row['occupation'];
  $age = $row['age'];
  $description = $row['description'];
  echo "<div class=\"listbox\">";
  echo "\n<h2>$first_name $last_name</h2>";
  echo "\n<div><b>Age: </b>$age</div>";
  echo "\n<div><b>Occupation: </b>$occupation</div>";
  echo "\n<div><b>Description: </b><em>$description</em></div>";
  echo "</div>";
}
?>

<?php
include("includes/footer.php");
?>