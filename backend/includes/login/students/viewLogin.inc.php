<!-- query file -->
<?php
function studentLogin()
{
    echo '<h1>Login Student</h1>';
    echo '<form class="login-form" action="./includes/login/students/login.inc.php" method="POST">';
    echo '<input type="text" name="studentName" placeholder="Enter Name">';
    echo '<br>';
    echo '<input type="text" name="studentPassword" placeholder="Enter Password">';
    echo '<br>';
    echo '<button>Login</button>';
    echo '</form>';
}

function studentLoginHeader()
{
    if (isset($_SESSION["studentId"]) && !empty($_SESSION['studentId'])) {
        echo '
        <style>
            .provider-header {
               display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    margin: 10px auto;
    max-width: 90%;
    border-radius: 16px;
    background: linear-gradient(135deg, #f0c27b, #4b1248);
    color: white;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
            }
        .header_div{
        display:flex;
        }
            .provider-header::before {
                content: "";
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
                animation: glow 6s infinite linear;
                z-index: 0;
            }

            // @keyframes glow {
            //     0% { transform: rotate(0deg); }
            //     100% { transform: rotate(360deg); }
            // }

            .welcome-msg {
                position: relative;
                z-index: 1;
                background: rgba(255, 255, 255, 0.1);
                padding: 16px 24px;
                border-radius: 12px;
                backdrop-filter: blur(6px);
                -webkit-backdrop-filter: blur(6px);
                font-size: 18px;
                font-weight: 500;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 6px;
                letter-spacing: 0.3px;
            }

            .welcome-msg strong {
                color: #ffe600;
                font-size: 20px;
                font-weight: 700;
                margin: 0 2px;
            }

            @media (max-width: 768px) {
                .provider-header {
                    flex-direction: column;
                    padding: 20px 15px;
                }

                .welcome-msg {
                    text-align: center;
                    font-size: 16px;
                }

                .welcome-msg strong {
                    font-size: 18px;
                }
            }
        </style>

        <div class="header_div">
        <div class="provider-header">
           <p class="welcome-msg">
        Welcome,
        <strong>' . htmlspecialchars($_SESSION["studentUsername"]) . '</strong> 
        <strong>(' . htmlspecialchars($_SESSION["studentRollno"]) . ')</strong>
    </p>
        </div>
    </div>
        ';
    }
}

function loginErrors()
{
    if (isset($_SESSION["loginErrors"])) {
        $errors = $_SESSION["loginErrors"];
        // echo "<br>";
        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }
        unset($_SESSION["loginErrors"]);
    } elseif (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<p id='login-success' style='color: green;'>Login Successful</p>";
        echo "<script>
                setTimeout(function() {
                    document.getElementById('login-success').style.display = 'none';
                }, 2000); // Hide after 2 seconds
              </script>";
    }
}
?>
