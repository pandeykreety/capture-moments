<!DOCTYPE html>
<html lang="en">
<head>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capture Moments</title>
    <style>
    /* General Styles */
body {
    background-color: #2e2e2e;
    font-family: 'Lato', sans-serif;
    color: #f0f0f0;
    margin: 0;
}

/* Navbar */
.navbar {
    background-color: #1a1a1a !important;
    border-bottom: 3px solid #00bcd4;
    padding: 15px;
}

.navbar-nav {
    margin-left: auto;
    right: 50px;
}

.navbar-brand {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    color: #00bcd4 !important;
    font-size: 1.8rem;
    margin-left: 20px;
}

.nav a {
    color: black !important;
    padding: 9px 15px;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 16px;
    letter-spacing: 1.5px;
    transition: color 0.3s ease;
}
.bg-nav {
    --bs-bg-opacity: 1;
    background-color: rgb(182 216 214) !important;
}

.nav a:hover {
    color: #00bcd4 !important;
}

/* Hero Section */
.main_img {
    width: 100%;
    height: 90vh;
    background-size: cover; /* Change to 'contain' if you want to avoid cropping */
    background-position: center;
}

.text-area {
    position: absolute;
    top: 50%;
    width: 300px;
    transform: translateY(-50%);
    color: white;
}

.text-area.left {
    left: 8%;
    text-align: center;
}

.text-area.right {
    right: 8%;
    text-align: center;
}

.text-area .title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 34px;
    margin-bottom: 0px;
    letter-spacing: 5px;
    padding: 2px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.text-area .description {
    font-family: 'Roboto', sans-serif;
    font-size: 26px;
    position: absolute;
}

/* Portfolio Section */
#photo_background {
    padding: 50px 20px;
    background-color: #1f1f1f;
    border-bottom: 3px solid #00bcd4;
    color: #f0f0f0;
}

h2 {
    color: #00bcd4 !important;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.gallery-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.gallery-img {
    width: calc(25% - 20px);
    max-width: calc(25% - 20px);
    border: 2px solid #00bcd4;
    transition: transform 0.4s, box-shadow 0.4s;
    box-shadow: 0px 0px 15px rgba(0, 188, 212, 0.5);
}

.gallery-img:hover {
    transform: scale(1.1);
    box-shadow: 0px 0px 25px rgba(0, 188, 212, 0.8);
}

/* Category Buttons */
#categoryForm {
    text-align: center;
}

.category-menu {
    margin-bottom: 30px;
}

.category-menu button {
    margin-left: 8px;
    padding: 12px 33px;
    font-size: 16px;
    background-color: #00bcd4;
    border: none;
    color: #1f1f1f;
    border-radius: 25px;
    transition: background-color 0.3s, transform 0.3s;
}

.category-menu button:hover {
    background-color: #0288d1;
    transform: scale(1.1);
    cursor: pointer;
}

/* Skills and Experience Section */
.down-bottom {
    margin-top: 2rem;
    padding: 20px;
}

#skillcard {
    background-color: #282828;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s, box-shadow 0.3s;
}

#skillcard:hover {
    transform: scale(1.05);
    box-shadow: 0px 0px 25px rgba(0, 188, 212, 0.6);
}

.skill-title {
    font-family: 'Poppins', sans-serif;
    font-size: 26px;
    color: #00bcd4;
    text-align: center;
    margin-bottom: 20px;
}

.skill-bar {
    height: 20px;
    background-color: #ddd;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 20px;
}

.skill-bar-inner {
    height: 100%;
    width: 70%;
    background-color: #00bcd4;
    border-radius: 10px;
}

/* Contact Section */
#contact {
    background-color: #303030;
    color: #f0f0f0;
    padding: 50px;
    border-top: 3px solid #00bcd4;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 15px;
    border: 2px solid #00bcd4;
    border-radius: 8px;
    background-color: #1f1f1f;
    color: #f0f0f0;
    margin-bottom: 15px;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #0288d1;
    box-shadow: 0 0 5px rgba(0, 188, 212, 0.7);
}

/* Footer */
.footer {
    background-color: #1a1a1a;
    color: #f0f0f0;
    padding: 20px;
    text-align: center;
}

.footer a {
    color: #00bcd4;
    text-decoration: none;
}

.footer a:hover {
    text-decoration: underline;
}

/* Advanced Styles */
.display-1 {
    color: #00bcd4;
    padding: 50px !important;
    text-transform: uppercase;
    font-family: 'Montserrat', sans-serif;
}

/* Media Queries for Responsiveness */

/* Mobile Devices (Up to 600px) */
@media (max-width: 600px) {
    .navbar-brand {
        font-size: 1.4rem;
    }

    .nav a {
        font-size: 12px;
        padding: 8px 10px;
    }

    .text-area {
        width: 80%;
        font-size: 16px;
    }

    .gallery-img {
        width: calc(50% - 20px);
    }

    .skill-title {
        font-size: 22px;
    }

    .category-menu button {
        padding: 10px 20px;
        font-size: 14px;
    }

    #skillcard {
        padding: 20px;
    }

    .form-group input,
    .form-group textarea {
        padding: 10px;
    }
}

/* Tablet Devices (601px to 1024px) */
@media (min-width: 601px) and (max-width: 1024px) {
    .navbar-brand {
        font-size: 1.6rem;
    }

    .nav a {
        font-size: 14px;
        padding: 10px 12px;
    }

    .text-area {
        width: 70%;
        font-size: 18px;
    }

    .gallery-img {
        width: calc(33.3% - 20px);
    }

    .skill-title {
        font-size: 24px;
    }

    .category-menu button {
        padding: 10px 25px;
        font-size: 15px;
    }

    #skillcard {
        padding: 25px;
    }

    .form-group input,
    .form-group textarea {
        padding: 12px;
    }
}

/* Desktop Devices (Above 1024px) */
@media (min-width: 1025px) {
    .gallery-img {
        width: calc(25% - 20px);
    }

    .skill-title {
        font-size: 26px;
    }

    .category-menu button {
        padding: 12px 33px;
        font-size: 16px;
    }

    #skillcard {
        padding: 30px;
    }

    .form-group input,
    .form-group textarea {
        padding: 15px;
    }
}

</style>
    <!-- Icons ko library -->
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Mina:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mina:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
<body>
    <nav class="navbar navbar-expand-md bg-nav sticky-top border-bottom nav justify-content-center" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="logo.webp" alt="Logo" width="46" height="38" class="d-inline-block">
                CAPTURE MoMeNtS
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active mina-regular mina-bold" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mina-regular mina-bold" href="#photo_gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mina-regular mina-bold" href="#portfolio">Skills/Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mina-regular mina-bold" href="#contact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main_img">
        <img src="team1.webp" class="main_img">
        <div class="container-fluid">
        <div class="text-area left">
            <div class="title"><?php include 'connect.php';
          $query = "SELECT title2, description2 FROM home";          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {            
            while ($row = mysqli_fetch_assoc($result)) {                
              echo $row['title2'];
            }
          } 
              ?></div>
            <div class="description"><?php include 'connect.php';
          $query = "SELECT title2, description2 FROM home";          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {            
            while ($row = mysqli_fetch_assoc($result)) {                
              echo $row['description2'];
            }
          } 
              ?></div>
        </div>
        </div>
        <div class="text-area right">
            <div class="title"><?php include 'connect.php';
          $query = "SELECT title, description FROM home";          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {            
            while ($row = mysqli_fetch_assoc($result)) {                
              echo $row['title'];
            }
          } 
              ?></div>
            <div class="description"><?php include 'connect.php';
          $query = "SELECT title, description FROM home";          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {            
            while ($row = mysqli_fetch_assoc($result)) {                
              echo $row['description'];
            }
          } 
              ?></div>
        </div>
    </div>
    <div class="container-fluid" id="photo_gallery"></div>
    <div class="container-fluid" id="photo_background">
        <center><h1>Gallery</h1></center>

        <div class="category-menu">
            <form method="POST" id="categoryForm" action="#photo_background">
                
                <button type="submit" name="all">Show All</button>
                <?php
                include 'connect.php';
                
                
                $categoryQuery = "SELECT DISTINCT img_category FROM image_information";
                $categoryResult = mysqli_query($conn, $categoryQuery);

                if (mysqli_num_rows($categoryResult) > 0) {
                    while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                        $category = $categoryRow['img_category'];
                        
                        echo '<button type="submit" name="category" value="' . $category . '">' . ucwords(str_replace('_', ' ', $category)) . '</button>';
                    }
                }
                ?>
            </form>
        </div>

        <div class="gallery-row" id="gallery">
            <?php
           
            if (isset($_POST['all'])) {
                $query = "SELECT img_name FROM image_information";
            }
           
            elseif (isset($_POST['category'])) {
                $selectedCategory = $_POST['category'];
                $query = "SELECT img_name FROM image_information WHERE img_category = '$selectedCategory'";
            }
            
            else {
                $query = "SELECT img_name FROM image_information";
            }

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<img src="uploads/' . $row['img_name'] . '" class="gallery-img">';
                    
                }
            } else {
                echo '<p>No images found in the database.</p>';
            }
            ?>
        </div>
    </div>
    <div class="container-fluid" id="portfolio">
    <h1 class="text-center white_text down-bottom">Our Skills and Experience</h1>

    <div class="container-fluid" id="skills">
        <br>
        <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
include 'connect.php';

$query = "SELECT id, title, skill_image FROM skills";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $imagePath = 'uploads/' . htmlspecialchars($row['skill_image']);
        $title = htmlspecialchars($row['title']);
        $id = htmlspecialchars($row['id']);
        
        echo '<div class="col-md-4" id="skillcard">';
        echo '<div class="card" id="portfolio">';
        echo '<img src="' . $imagePath . '" class="card-img-top" alt="Skill Image" style="height: 617px;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $title . '</h5>';
        echo '<a href="view_portfolio.php?id=' . $id . '" class="btn btn-primary">View Portfolio</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>No data found in the database.</p>';
}
?>


        </div>
    </div>
</div>

    </div>

</div>

<div class="container-fluid" id="contact">
<div class="row">
    <div class="col-md-6 offset-md-3">
       <center> <h2>Contact Us</h2></center>
        
        <form method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Enter your message" name="message" required></textarea>
            </div>
            <br>
            <div class="category-menu">
            <button type="submit" name="contact" class="button">Submit</button>
            </div>
            
            
        </form>
    </div>
</div>
<br>
<br>
</div>

<footer class="bg-nav text-center py-4">
  <div class="container">
    <div class="row">
      <div class="col">
        <p>&copy; 2024 Capture Moments. All rights reserved.</p>
      </div>
      <div class="col">
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="https://www.facebook.com/" style="color: black">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://www.x.com/" style="color: black">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://www.instagram.com/kushpanthi/" style="color: black">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

<?php
include 'connect.php';
if (isset($_POST['contact'])) {
    $inquiry_name = ($_POST['name']);
    $inquiry_email = ($_POST['email']);
    $inquiry_message = ($_POST['message']);
    $query2 = "insert into customer_inquiry (name,email,message) values('$inquiry_name','$inquiry_email','$inquiry_message');";
    $inquiry_check = mysqli_query($conn, $query2);
    if($inquiry_check)
    {
        echo "<script>alert('Your inquiry has been submitted successfully');</script>";
    }
    else
    {
        echo "<script>alert('Failed to submit inquiry');</script>";
    }
    
  }
?>
