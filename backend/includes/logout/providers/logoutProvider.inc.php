<?php
session_start(); // Start the session

$loggedOut = false;

if (isset($_SESSION['providerId']) && !empty($_SESSION['providerId'])) {
    // Clear all session data
    session_unset();
    session_destroy();
    $loggedOut = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Logging Out</title>
    <style>
        body {
            background: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .logout-container {
            background-color: #fff;
            padding: 40px 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        .logout-container h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .logout-container p {
            color: #777;
            font-size: 14px;
        }

        .spinner {
            margin: 20px auto;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #4CAF50;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="logout-container">
        <?php if ($loggedOut): ?>
            <h2>You have been logged out</h2>
            <p>Redirecting to login page...</p>
            <div class="spinner"></div>
            <meta http-equiv="refresh" content="2;url=../../../providerlogin.php" />
        <?php else: ?>
            <h2>Logout Failed</h2>
            <p>You are not logged in.</p>
        <?php endif; ?>
    </div>
</body>

</html>
