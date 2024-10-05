<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $query = "SELECT title, description, skill_image FROM skills WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $imagePath = 'uploads/' . htmlspecialchars($row['skill_image']);
            $title = htmlspecialchars($row['title']);
            $description = htmlspecialchars($row['description']);
        } else {
            $error_message = 'No details found for this skill.';
        }
        mysqli_stmt_close($stmt);
    } else {
        $error_message = 'Error preparing SQL statement.';
    }
} else {
    $error_message = 'No skill ID provided.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Details</title>
    <style>
    /* General Styles for the Container */
.container.resume-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 25px;
    border-radius: 12px;
    background-color: #1f1f1f; /* Matches the dark theme of the homepage */
    box-shadow: 0 8px 16px rgba(0, 188, 212, 0.3);
    color: #f0f0f0; /* Light text for better contrast */
}

/* Resume Header */
.resume-header {
    text-align: center;
    border-bottom: 2px solid #00bcd4;
    padding-bottom: 20px;
    margin-bottom: 20px;
}

.resume-header h1 {
    font-size: 2.8rem;
    font-family: 'Montserrat', sans-serif;
    color: #00bcd4;
    margin: 0;
}

/* Resume Body */
.resume-body {
    text-align: center;
}

.resume-img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 188, 212, 0.3);
    margin-bottom: 20px;
    border: 3px solid #00bcd4; /* Accent border for a cohesive look */
}

.resume-body p {
    font-size: 1.3rem;
    font-family: 'Lato', sans-serif;
    color: #e0e0e0;
    line-height: 1.8;
    margin-bottom: 20px;
}

/* Button Style */
.btn-secondary {
    display: inline-block;
    padding: 12px 30px;
    font-size: 1.1rem;
    color: #ffffff;
    background-color: #00bcd4;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    text-align: center;
    font-family: 'Montserrat', sans-serif;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-secondary:hover {
    background-color: #0288d1;
    transform: scale(1.05);
    cursor: pointer;
}

/* Error Message */
.error-message {
    color: #e74c3c; /* Bright red for visibility */
    text-align: center;
    font-size: 1.2rem;
    font-family: 'Lato', sans-serif;
}
</style>
</head>
<body>
    <div class="container resume-container">
        <?php if (isset($error_message)) { ?>
            <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
        <?php } else { ?>
            <div class="resume-header">
                <h1><?php echo htmlspecialchars($title); ?></h1>
            </div>
            <div class="resume-body">
                <img src="<?php echo htmlspecialchars($imagePath); ?>" class="resume-img" alt="Skill Image">
                <p><?php echo htmlspecialchars($description); ?></p>
                <a href="index.php" class="btn-secondary">Back to Home</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
