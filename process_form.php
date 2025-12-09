<?php
// Set content type to HTML
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .success-message {
            color: green;
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .display-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .display-table th, .display-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .display-table th {
            background-color: #f2f2f2;
            width: 35%;
        }
    </style>
</head>
<body>

    <main class="container">
        <?php
        // Check if the form was submitted using the POST method
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Collect and Sanitize input data
            $fullName = htmlspecialchars($_POST['fullName'] ?? 'N/A');
            $email = htmlspecialchars($_POST['email'] ?? 'N/A');
            $phone = htmlspecialchars($_POST['phone'] ?? 'N/A');
            $course = htmlspecialchars($_POST['course'] ?? 'N/A');
            $timing = htmlspecialchars($_POST['timing'] ?? 'N/A');
            $comments = htmlspecialchars($_POST['comments'] ?? 'No comments');

            // Map course code to full name for better display
            $courseMap = [
                'cs' => 'Computer Science Fundamentals',
                'webdev' => 'Web Development',
                'datascience' => 'Data Science',
                'N/A' => 'Not Selected'
            ];
            $courseDisplay = $courseMap[$course] ?? $course;

            // Display success message and submitted data
            echo '<div class="success-message">Registration Successful!</div>';
            echo '<h2>Submitted Application Details</h2>';
            
            echo '<table class="display-table">';
            echo '<tr><th>Full Name</th><td>' . $fullName . '</td></tr>';
            echo '<tr><th>Email Address</th><td>' . $email . '</td></tr>';
            echo '<tr><th>Phone Number</th><td>' . $phone . '</td></tr>';
            echo '<tr><th>Selected Course</th><td>' . $courseDisplay . '</td></tr>';
            echo '<tr><th>Preferred Timing</th><td>' . $timing . '</td></tr>';
            echo '<tr><th>Comments</th><td>' . $comments . '</td></tr>';
            echo '</table>';

        } else {
            // Handle cases where the script is accessed directly without form submission
            echo '<p style="color: red; text-align: center;">Error: Form was not submitted.</p>';
        }
        ?>
        <p style="text-align: center; margin-top: 20px;"><a href="index.html">Go back to Registration</a></p>
    </main>
    
</body>
</html>