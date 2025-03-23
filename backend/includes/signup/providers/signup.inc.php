<!DOCTYPE html>
<html lang="en">
<head>
    <title>Provider Signup</title>
</head>
<body>
    <h2>Provider Signup</h2>
    <?php require_once("./includes/signup/providers/viewSignupproviders.inc.php"); displaySignupErrors(); ?>

    <form action="./auth/signupproviders.inc.php" method="POST">
        <input type="text" name="providerUsername" placeholder="Enter Username" required><br>
        <input type="text" name="providerCompany" placeholder="Enter Company" required><br>
        <input type="email" name="providerEmail" placeholder="Enter Email" required><br>
        <input type="text" name="providerPhone" placeholder="Enter Phone Number" required><br>
        <input type="password" name="providerPassword" placeholder="Enter Password" required><br>
        <input type="password" name="providerConfirmPassword" placeholder="Confirm Password" required><br>
        <button type="submit">Signup</button>
    </form>

    <br>
    <a href="index.php">Already have an account? Login here</a>
</body>
</html>
