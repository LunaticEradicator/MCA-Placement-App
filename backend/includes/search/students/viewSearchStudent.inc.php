<!-- SELECT * 
FROM job_listings
WHERE required_skills LIKE '%Java%'; -->
<!-- implement search required_skills !!!!!!!!!!!! -->

<!-- <?php
        function studentSearch($searchResults = [])
        {
            if (isset($_SESSION['studentId']) && !empty($_SESSION['studentId'])) {
                // Display the search form
                echo "<h2>Search Student</h2>";
                // echo '<form action="index.php" method="POST">';  // Ensure form action points to the current page (index.php)
                echo '<form action="index.php" method="POST">';  // Ensure form action points to the current page (index.php)
                echo '<input type="text" name="studentSearch" placeholder="Search for a student or item" required>';
                echo '<button type="submit">Search</button>';
                echo '</form>';

                // Check if the search has been submitted and display results
                if (!empty($_POST['studentSearch'])) {
                    // If search results are not empty, display them
                    if (!empty($searchResults)) {
                        echo "<h3>Search Results:</h3>";
                        foreach ($searchResults as $item) {
                            echo "<div class='item'>";
                            echo "<p><strong>Student Name:</strong> " . htmlspecialchars($item['username']) . "</p>";
                            // You can display more details like email, phone, etc. (uncomment these lines if needed)
                            // echo "<p><strong>Email:</strong> " . htmlspecialchars($item['email']) . "</p>";
                            // echo "<p><strong>Phone:</strong> " . htmlspecialchars($item['phone']) . "</p>";
                            echo "</div>";
                        }
                    } else {
                        // If no results, show a message only after a search
                        echo "<p>No results found for your search.</p>";
                    }
                } else {
                    echo "<p>Enter a student name to search.</p>";
                }
            } else {
                echo "<h2>Cannot Search Profile [You are not logged in]</h2>";
            }
        }
        ?> -->
