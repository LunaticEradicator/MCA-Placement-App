 <!-- query file -->
 <?php
    function studentLogin()
    {
        if (isset($_SESSION["studentId"])) {
            echo "Welcome : " . $_SESSION["studentUsername"] . "-" . $_SESSION["studentRollno"];
        }
        // else {
        //     echo "Die";
        // }
    }
    function loginErrors()
    {
        if (isset($_SESSION["loginErrors"])) {
            $errors = $_SESSION["loginErrors"];

            echo "<br>";

            foreach ($errors as $error) {
                echo "<p>" . $error . "</p>";
            }

            unset($_SESSION["loginErrors"]);
        } else if (isset($_GET["login"]) && $_GET["login"] === "success") {
            echo "<br>";

            echo "<p> Login Successful </p>";
        }
    }
