<?php
require_once "./includes/providersconfigSession.inc.php";
require_once "./includes/signup/providers/viewSignupproviders.inc.php";
require_once "./includes/login/providers/viewLoginproviders.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Provider Portal</title>
</head>

<body>

    <h1>Provider Details</h1>
    <?php
    providerLoginMessage(); // Function to display provider details if logged in
    ?>
    
    <h2>Search Provider</h2>
    <form action="search.php" method="POST">
        <input type="text" name="searchUsername" placeholder="Search Provider">
        <button>Search</button>
    </form>

    <h2>Login Provider</h2>
    <form action="./includes/login/providers/loginproviders.inc.php" method="POST">
        <input type="text" name="providerUsername" placeholder="Enter Username">
        <input type="password" name="providerPassword" placeholder="Enter Password">
        <button>Login</button>
        <?php
        loginErrors();
        ?>
    </form>

    <div>
        <h2>Signup Provider</h2>
        <form action="./includes/signup/providers/signup.inc.php" method="POST">
            <?php
            signUpForm();
            ?>
            <button>Submit</button>
        </form>
        <div>
            <?php
            viewSignupErrors();
            ?>
        </div>
    </div>

    <h2>Update Provider</h2>
    <form action="./includes/updateHandler.inc.php" method="POST">
        <input type="text" name="updateUsername" placeholder="Enter New Username">
        <input type="text" name="updateCompany" placeholder="Enter New Company Name">
        <input type="password" name="updatePassword" placeholder="Enter New Password">
        <input type="email" name="updateEmail" placeholder="Enter New Email">
        <input type="text" name="updatePhone" placeholder="Enter New Phone">
        <button>Update</button>
    </form>

    <h2>Delete Provider</h2>
    <form action="./includes/deleteHandler.inc.php" method="POST">
        <input type="text" name="deleteUsername" placeholder="Enter Username">
        <input type="password" name="deletePwd" placeholder="Enter Password">
        <button>Delete</button>
    </form>

    <h2>Logout Provider</h2>
    <form action="./includes/logout/logoutproviders.inc.php" method="POST">
        <button>Logout</button>
    </form>

</body>

</html>
