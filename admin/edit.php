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

/*
1) Get all existing data & create dynamic nav
2) Prepopulate form fields with selected item data
3) If user submits form update the item in the database

*/

//Retrieve our "page setter" variable that will define the content. In this case which item we want to edit.

$pageID = $_GET['id'];
//Let's have a default item that is selected when we load the page

if (!isset($pageID)) {
    $tmp = mysqli_query($con, "Select id from characterslab limit 1");
    while ($row = mysqli_fetch_array($tmp)) {
        $pageID = $row['id'];
    }
}

//Step 3: If user submits form then update
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
    if ((strlen($occupation) < 3) || (strlen($occupation) > 50)) {
        $valid = 0;
        $valOccupationMsg = "Please enter an occupation between 3 to 50 characters.";
    }

    if ($description != "") {
        if ((strlen($description) < 10) || (strlen($description) > 400)) {
            $valid = 0;
            $valDescriptionMsg = "Please enter a description that is greater than 2 characters & less than or equal to 50 characters.";
        }
    }

    if ($valid == 1) {
        mysqli_query($con, "update characterslab set first_name = '$first_name',last_name = '$last_name', age = '$age', occupation = '$occupation', description = '$description' 
        where id = '$pageID'") or die(mysqli_error($con));
        $msgSuccess = "Success. The character has been updated.";
    }
}

//Step One: Create dynamic nav system

$result = mysqli_query($con, "Select * from characterslab");
while ($row = mysqli_fetch_array($result)) {
    $thisFname = $row['first_name'];
    $thisLname = $row['last_name'];
    $thisId = $row['id'];

    //With this data create some links which show the character names to the user. 

    $editLinks .= "\n<a href=\"edit.php?id=$thisId\">$thisFname $thisLname</a><br>";


    //Query String Syntax: pagename.php?var=value&var2=value2&var3=value3

}

//Step Two: Prepopulate Form Fields with existing values for selected item 

$result = mysqli_query($con, "Select * from characterslab where id='$pageID'");
while ($row = mysqli_fetch_array($result)) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $age = $row['age'];
    $occupation = $row['occupation'];
    $description = $row['description'];
}



?>
<h2>Edit</h2>
<?php
if ($msgSuccess) {
    echo $msgPreSuccess . $msgSuccess . $msgPost;
}
?>
<div class="row">
    <div class="col-sm">
        <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
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
        <p><a href="delete.php?id=<?php echo $pageID ?>" onclick="return confirm('Are you sure you want to delete this character?')" class="btn btn-danger">Delete Character</a></p>
    </div>

    <div class="col-sm">
        <h2>Characters</h2>
        <?php
        //Temp location for character links
        echo $editLinks;
        ?>
    </div>
</div>
<?php
include("../includes/footer.php");
?>