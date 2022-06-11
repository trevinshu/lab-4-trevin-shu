<?php
include("includes/header.php");

$searchTerm = trim($_POST['term']);

?>


<div class="jumbotron clearfix">
    <h1>Search</h1>
</div>

<form method="POST" action="search.php">
    <input type="text" name="term" class="form-control"> <br>
    <input type="submit" name="mysubmit" class="btn btn-outline-primary">
</form>

<?php

if (isset($_POST['mysubmit']) && $searchTerm != "") {
    $sql = "select * from characterslab where first_name like '$searchTerm' or last_name like '$searchTerm' or occupation like '$searchTerm' or description like '%$searchTerm%'";

    $result = mysqli_query($con, $sql);

    //Deal with no results 

    if (mysqli_num_rows($result) > 0) {
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
    } else {

        echo "\n<br><div class=\"alert alert-warning\">No Results Found</div>\n";
    }
}
?>

<?php

include("includes/footer.php");
?>