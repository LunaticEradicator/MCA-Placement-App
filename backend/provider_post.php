<?php
require_once "./includes/providersConfigSession.inc.php";
require_once "./includes/logout/providers/viewLogoutProvider.inc.php";
require_once "./includes/login/providers/viewLoginProviders.inc.php";

require_once "./includes/create/providers/viewCreateProvider.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Post a Job</title>
  <link rel="stylesheet" href="./css/provider_post.css" />
  <link rel="stylesheet" href="./css/first.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
    }

    header {
      background-color: #c4a35a;
      color: white;
      padding: 4px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: -8px -7px 10px -7px;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      height: 100px;
      width: auto;
    }

    .logo-text {
      font-size: 250%;
      font-weight: bold;
      margin-left: 20px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
      margin-right: 30px;
    }

    nav ul li {
      display: inline;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
    }

    nav ul li a:hover {
      text-decoration: underline;
    }

    .job-post-section {
      text-align: center;
      padding: 60px 20px;
    }

    .job-post-form {
      background-color: white;
      padding: 30px;
      display: inline-block;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .job-post-form input,
    .job-post-form textarea {
      width: 300px;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .job-post-form button {
      padding: 10px 20px;
      background-color: #19582d;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .job-post-form button:hover {
      background-color: #c4a35a;
    }

    footer {
      background-color: #c4a35a;
      color: white;
      text-align: center;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="logo">
      <a href="provider.php" class="nav-item">
        <i class="fas fa-home"></i>
        <span>Home</span>
      </a>
    </div>
    <nav class="nav-icons">
      <a href="provider_profile.php" class="nav-item">
        <i class="fas fa-user"></i>
        <span>Profile</span>
      </a>
      <a href="provider_post.php" class="nav-item">
        <i class="fas fa-briefcase"></i>
        <span>Job</span>
      </a>
      <a href="logout.php" class="nav-item">
        <?php
        providerLogout();
        ?>
      </a>
    </nav>
  </header>

  <section class="job-post-section">

    <?php
    providerJobCreate();
    viewCreateErrors();
    ?>
    <!-- <h1>Post a Job</h1>
    <form class="job-post-form">
      <input type="text" placeholder="Job Title" required /><br />
      <textarea placeholder="Job Description" rows="5" required></textarea><br />
      <input type="text" placeholder="Location" required /><br />
      <input type="text" placeholder="Required Skills " required /><br />
      <input type="text" placeholder="Company Name" required /><br />
      <input type="email" placeholder="Contact Email" required /><br />
      <button type="submit">Submit Job</button>
    </form> -->
  </section>

  <footer>
    <p>&copy; 2025 Placement Cell. All rights reserved.</p>
  </footer>
</body>

</html>
