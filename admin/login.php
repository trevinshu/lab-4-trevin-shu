<?php
include("/home/tshu2/data/logindata.php");
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// echo "$username & $password";

if (isset($_POST['mysubmit'])) {
    // echo 'submit';

    if (($username == $usernameGood) && (password_verify($password, $pw_enc))) {
        //SUCCESSFUL LOGIN
        session_start();
        $_SESSION['auyfgigafa'] = session_id();
        header("Location: edit.php"); //Disable when debugging

    } else {
        $msg = "Username/Password is incorrect. Please try again.";
    }
} else {
    if ($username != "" && $password != "") {
    } else {
        $msg = "Please enter an username & password";
    }
}
?>

<?php
include("../includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login To Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 600px;
            flex: 1 0 auto;
        }

        h2 {
            padding: 1rem 0;
            text-align: center;
            color: #343A40;
        }

        input[type=submit] {
            margin-right: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron clearfix">
            <h1>Login to Edit Characters</h1>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['SELF']); ?>" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" name="mysubmit" class="btn btn-primary">
            <a href="../index.php" class="btn btn-secondary">Homepage</a>
            <p>&nbsp;</p>
            <?php
            if ($msg) {
                echo "\n<div class=\"alert alert-primary\">$msg</div>";
            }
            ?>
        </form>
    </div>
    <footer>
        <?php
        include("../includes/footer.php");
        ?>
    </footer>
</body>

</html>