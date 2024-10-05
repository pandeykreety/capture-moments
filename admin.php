
<?php
session_start();
if (!isset($_SESSION['username'])) {
    
    header("Location: http://localhost/capturek/login.php");
    exit();
}


?>
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
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <style>
    body {
    background: url('background.webp') no-repeat center center fixed;
    background-size: cover;
    color: #ffffff;
    padding-top: 50px;
    font-family: 'Arial', sans-serif;
    height: 100vh
    }

    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5); /* This will create a dark overlay */
        z-index: -1; /* Ensure this stays behind the content */
    }

    .container {
        max-width: 800px;
        margin: auto;
        background: rgba(255, 255, 255, 0.1); /* Add a slight transparency to the container */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .admin-section {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #f39c12;
        border-color: #e67e22;
        color: #ffffff;
    }

    .btn-primary:hover {
        background-color: #e67e22;
        border-color: #d35400;
    }

    .btn-primary.active {
        background-color: #d35400;
        border-color: #c0392b;
    }

    .form-control, .form-select {
        background-color: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        border: 1px solid #ffffff;
    }

    .form-control::placeholder {
        color: #ecf0f1;
    }

    .card {
        background-color: rgba(0, 0, 0, 0.7);
        border-radius: 10px;
        color: #ffffff;
        margin-bottom: 15px;
        overflow: hidden;
    }

    .list-group-item {
        background-color: rgba(0, 0, 0, 0.7);
        color: #ffffff;
        border: 1px solid #ffffff;
    }

    .nav-buttons {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .nav-buttons .btn {
        flex: 1;
        margin: 5px;
        border-radius: 25px;
    }

    #break, #break2 {
        flex-basis: 48%;
        height: 55px;
        background-color: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        border: 1px solid #ffffff;
        text-align: center;
        line-height: 55px;
        border-radius: 25px;
    }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Admin Panel</h1>
        
        <!-- Admin panel ko nav buttons -->
        <div class="nav-buttons mb-4">
            <button class="btn btn-primary active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHome" aria-expanded="true" aria-controls="collapseHome">
                Manage Home Page
            </button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGallery" aria-expanded="false" aria-controls="collapseGallery">
                Manage Gallery
            </button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSkills" aria-expanded="false" aria-controls="collapseSkills">
                Manage Skills/Experience
            </button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                Manage Image Categories
            </button>
            
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInquiries" aria-expanded="false" aria-controls="collapseInquiries" id="break">
                View Inquiries
            </button>
            
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdmins" aria-expanded="false" aria-controls="collapseAdmins" id="break2">
                Manage Admins
            </button>
        </div>

        

        <!-- Home Page Section ko starting -->
        <div class="admin-section">
    <div class="collapse show" id="collapseHome">
        <div class="card card-body mt-3">
            <form method="post">
                <div class="mb-3">
                    <label for="homeTitle" class="form-label">Home Title</label>
                    <input type="text" class="form-control" id="homeTitle" placeholder="Enter home page title" name="title" value="<?php 
                        include 'connect.php';
                        $query = "SELECT title FROM home";          
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {            
                            $row = mysqli_fetch_assoc($result);
                            echo htmlspecialchars($row['title']); // Display current title
                        } 
                    ?>">
                </div>
                
                <div class="mb-3">
                    <label for="homeDescription" class="form-label">Home Description</label>
                    <textarea class="form-control" id="homeDescription" rows="5" placeholder="Enter description" name="description"><?php 
                        $query = "SELECT description FROM home";          
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {            
                            $row = mysqli_fetch_assoc($result);
                            echo htmlspecialchars($row['description']); // Display current description
                        } 
                    ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="homeTitle2" class="form-label">Home Title 2</label>
                    <input type="text" class="form-control" id="homeTitle2" placeholder="Enter home page title" name="title2" value="<?php 
                        $query = "SELECT title2 FROM home";          
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {            
                            $row = mysqli_fetch_assoc($result);
                            echo htmlspecialchars($row['title2']); // Display current title2
                        } 
                    ?>">
                </div>
                
                <div class="mb-3">
                    <label for="homeDescription2" class="form-label">Home Description 2</label>
                    <textarea class="form-control" id="homeDescription2" rows="5" placeholder="Enter description" name="description2"><?php 
                        $query = "SELECT description2 FROM home";          
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {            
                            $row = mysqli_fetch_assoc($result);
                            echo htmlspecialchars($row['description2']); // Display current description2
                        } 
                    ?></textarea>
                </div>

                <input type="submit" class="btn btn-primary" name="home" value="Update">
            </form>
        </div>
    </div>
</div>



        <!-- Gallery Section ko starting-->
        <?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connect.php';

// Handle image upload
if (isset($_POST['image_upload'])) {
    $imageCategory = $_POST['image_category'];
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array(strtolower($fileType), $allowedTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $insertSql = "INSERT INTO image_information (img_name, img_category) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $insertSql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'ss', $fileName, $imageCategory);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "<script>alert('Image uploaded successfully');</script>";
            } else {
                echo "Error: Could not prepare SQL statement.";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    } else {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG, & GIF files are allowed.');</script>";
    }
}

// Handle image deletion
if (isset($_POST['delete_image'])) {
    $imageId = $_POST['image_id'];
    $deleteSql = "DELETE FROM image_information WHERE id = ?";
    $stmt = mysqli_prepare($conn, $deleteSql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $imageId);
        $deleteResult = mysqli_stmt_execute($stmt);

        if ($deleteResult) {
            echo "<script>alert('Image deleted successfully');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
        } else {
            echo "<script>alert('Failed to delete image');</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Could not prepare SQL statement.";
    }
}

// Handle image editing
if (isset($_POST['edit_image'])) {
    $imageId = $_POST['edit_image_id'];

    // Fetch the existing data for the selected image
    $fetchSql = "SELECT * FROM image_information WHERE id = ?";
    $stmt = mysqli_prepare($conn, $fetchSql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $imageId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $imageData = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Could not prepare SQL statement.";
    }
}

// Handle image update
if (isset($_POST['update_image'])) {
    $imageId = $_POST['image_id'];
    $newCategory = $_POST['edit_image_category'];

    // Check if a new image file was uploaded
    if ($_FILES['edit_image']['name']) {
        // Handle the new image upload
        $targetDir = "uploads/";
        $fileName = basename($_FILES["edit_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array(strtolower($fileType), $allowedTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["edit_image"]["tmp_name"], $targetFilePath)) {
                // Get the old image name to delete it after updating
                $oldImageSql = "SELECT img_name FROM image_information WHERE id = ?";
                $stmt = mysqli_prepare($conn, $oldImageSql);
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'i', $imageId);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $oldImageData = mysqli_fetch_assoc($result);
                    $oldImageName = $oldImageData['img_name'];
                    mysqli_stmt_close($stmt);

                    // Update the database with new image and category
                    $updateSql = "UPDATE image_information SET img_name = ?, img_category = ? WHERE id = ?";
                    $stmt = mysqli_prepare($conn, $updateSql);
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, 'ssi', $fileName, $newCategory, $imageId);
                        $updateResult = mysqli_stmt_execute($stmt);

                        if ($updateResult) {
                            // Delete the old image file
                            if (file_exists("uploads/" . $oldImageName)) {
                                unlink("uploads/" . $oldImageName);
                            }
                            echo "<script>alert('Image and category updated successfully');</script>";
                            echo "<script>window.location.href = window.location.href;</script>";
                        } else {
                            echo "<script>alert('Failed to update image');</script>";
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "Error: Could not prepare SQL statement.";
                    }
                }
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        } else {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG, & GIF files are allowed.');</script>";
        }
    } else {
        // If no new image was uploaded, update only the category
        $updateSql = "UPDATE image_information SET img_category = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $updateSql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'si', $newCategory, $imageId);
            $updateResult = mysqli_stmt_execute($stmt);

            if ($updateResult) {
                echo "<script>alert('Category updated successfully');</script>";
                echo "<script>window.location.href = window.location.href;</script>";
            } else {
                echo "<script>alert('Failed to update category');</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: Could not prepare SQL statement.";
        }
    }
}
?>

<!-- Gallery code -->
<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connect.php';

// Handle image upload
if (isset($_POST['image_upload'])) {
    $imageCategory = $_POST['image_category'];
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array(strtolower($fileType), $allowedTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $insertSql = "INSERT INTO image_information (img_name, img_category) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $insertSql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'ss', $fileName, $imageCategory);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "<script>alert('Image uploaded successfully');</script>";
            } else {
                echo "Error: Could not prepare SQL statement.";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    } else {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG, & GIF files are allowed.');</script>";
    }
}

// Handle image deletion
if (isset($_POST['delete_image'])) {
    $imageId = $_POST['image_id'];
    $deleteSql = "DELETE FROM image_information WHERE id = ?";
    $stmt = mysqli_prepare($conn, $deleteSql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $imageId);
        $deleteResult = mysqli_stmt_execute($stmt);

        if ($deleteResult) {
            echo "<script>alert('Image deleted successfully');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
        } else {
            echo "<script>alert('Failed to delete image');</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Could not prepare SQL statement.";
    }
}

// Handle image editing
if (isset($_GET['edit_image_id'])) {
    $imageId = $_GET['edit_image_id'];

    // Fetch the existing data for the selected image
    $fetchSql = "SELECT * FROM image_information WHERE id = ?";
    $stmt = mysqli_prepare($conn, $fetchSql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $imageId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $imageData = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Could not prepare SQL statement.";
    }
}

// Handle image update
if (isset($_POST['update_image'])) {
    $imageId = $_POST['image_id'];
    $newCategory = $_POST['edit_image_category'];

    // Check if a new image file was uploaded
    if ($_FILES['edit_image']['name']) {
        // Handle the new image upload
        $targetDir = "uploads/";
        $fileName = basename($_FILES["edit_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array(strtolower($fileType), $allowedTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["edit_image"]["tmp_name"], $targetFilePath)) {
                // Get the old image name to delete it after updating
                $oldImageSql = "SELECT img_name FROM image_information WHERE id = ?";
                $stmt = mysqli_prepare($conn, $oldImageSql);
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'i', $imageId);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $oldImageData = mysqli_fetch_assoc($result);
                    $oldImageName = $oldImageData['img_name'];
                    mysqli_stmt_close($stmt);

                    // Update the database with new image and category
                    $updateSql = "UPDATE image_information SET img_name = ?, img_category = ? WHERE id = ?";
                    $stmt = mysqli_prepare($conn, $updateSql);
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, 'ssi', $fileName, $newCategory, $imageId);
                        $updateResult = mysqli_stmt_execute($stmt);

                        if ($updateResult) {
                            // Delete the old image file
                            if (file_exists("uploads/" . $oldImageName)) {
                                unlink("uploads/" . $oldImageName);
                            }
                            echo "<script>alert('Image and category updated successfully');</script>";
                            echo "<script>window.location.href = window.location.href;</script>";
                        } else {
                            echo "<script>alert('Failed to update image');</script>";
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "Error: Could not prepare SQL statement.";
                    }
                }
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        } else {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG, & GIF files are allowed.');</script>";
        }
    } else {
        // If no new image was uploaded, update only the category
        $updateSql = "UPDATE image_information SET img_category = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $updateSql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'si', $newCategory, $imageId);
            $updateResult = mysqli_stmt_execute($stmt);

            if ($updateResult) {
                echo "<script>alert('Category updated successfully');</script>";
                echo "<script>window.location.href = window.location.href;</script>";
            } else {
                echo "<script>alert('Failed to update category');</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: Could not prepare SQL statement.";
        }
    }
}
?>

<!-- HTML code -->
<div class="admin-section">
    <div class="collapse" id="collapseGallery">
        <div class="card card-body mt-3">
            <!-- Image upload form -->
            <form enctype="multipart/form-data" method="post">
                <div class="mb-3">
                    <label for="galleryCategory" class="form-label">Image Category</label>
                    <select class="form-control" id="galleryCategory" name="image_category">
                        <?php
                        // Fetch categories
                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$row['image_category'].'">'.$row['image_category'].'</option>';
                            }
                        }
                        ?>                                
                    </select>
                </div>
                <div class="mb-3">
                    <label for="galleryImage" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="galleryImage" name="image">
                </div>
                <input type="submit" class="btn btn-primary" name="image_upload" value="Upload">
            </form>

            <h2 class="text-center mt-4">Manage previous uploads</h2>
            <br>
            <?php
            // Fetch and display images
            $sql = "SELECT * FROM image_information";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <td><img src="uploads/' . $row['img_name'] . '" width="100"></td>
                            <td>' . $row['img_category'] . '</td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="image_id" value="' . $row['id'] . '">
                                    <button type="submit" class="btn btn-danger" name="delete_image">Delete</button>
                                </form>
                                <!-- Change Edit button to a link with an anchor -->
                                <a href="?edit_image_id=' . $row['id'] . '#editForm" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>';
                }

                echo '</tbody>
                    </table>';
            } else {
                echo 'No images found.';
            }
            ?>

            <?php
            // Display the edit form if edit_image_id is set
            if (isset($_GET['edit_image_id']) && isset($imageData)) {
            ?>
                <!-- Add an anchor here -->
                <a id="editForm"></a>
                <h3>Edit Image</h3>
                <form enctype="multipart/form-data" method="post">
                    <input type="hidden" name="image_id" value="<?php echo $imageData['id']; ?>">
                    <div class="mb-3">
                        <label for="editCategory" class="form-label">Image Category</label>
                        <select class="form-control" id="editCategory" name="edit_image_category">
                            <?php
                            // Fetch categories
                            $sql = "SELECT * FROM category";
                            $catResult = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($catResult) > 0) {
                                while ($catRow = mysqli_fetch_assoc($catResult)) {
                                    $selected = ($catRow['image_category'] == $imageData['img_category']) ? 'selected' : '';
                                    echo '<option value="' . $catRow['image_category'] . '" ' . $selected . '>' . $catRow['image_category'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editImage" class="form-label">Upload New Image (optional)</label>
                        <input type="file" class="form-control" id="editImage" name="edit_image">
                    </div>
                    <input type="submit" class="btn btn-primary" name="update_image" value="Update">
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>



        <!-- Skills/Experience ko Section -->

        
        <div class="admin-section">
            <div class="collapse" id="collapseSkills">
                <div class="card card-body mt-3">
                    <form enctype="multipart/form-data" method="post">
                        <div class="mb-3">
                            <label for="skillsTitle" class="form-label">Skills/Experience Title</label>
                            <input type="text" class="form-control" id="skillsTitle" placeholder="Enter title" name="skill_title">
                        </div>
                        <div class="mb-3">
                            <label for="skillsDescription" class="form-label">Skills/Experience Description</label>
                            <textarea class="form-control" id="skillsDescription" rows="5" placeholder="Enter description" name="skill_description"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="skillsImage" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="skillsImage" name="image">
                        </div>
                        <button type="submit" name="skill_submit" class="btn btn-primary">Save Changes</button>
                    </form>
                    

                </div>
            </div>
        </div>

        <!-- Image Categories ko Section -->
        <div class="admin-section">
            <div class="collapse" id="collapseCategories">
                <div class="card card-body mt-3">
                    <form id="categoryForm" method="post">
                        <div class="mb-3">
                            <label for="newCategory" class="form-label">Add New Category</label>
                            <input type="text" class="form-control" id="newCategory" placeholder="Enter new category" name="newcategory">
                        </div>
                        <input type="Submit" class="btn btn-primary" id="addCategory" name="category" value="Add Category" >
                    </form>
                    <hr>
                    <h4>Existing Categories</h4>
                    <ul class="list-group" id="categoryList">
                        <?php
                        include 'connect.php';
                        $sql="SELECT * FROM category";
                        $result=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                echo '<li class="list-group-item">'.$row['image_category'].'</li>';
                            }
                        }

                        ?>
                        
                    </ul>
                </div>
            </div>
        </div>

        <!-- View Inquiries Section -->
        <div class="admin-section">
            <div class="collapse" id="collapseInquiries">
                <div class="card card-body mt-3">
                    
                    <div id="viewInquiries" class="admin-section">
                <div class="card card-body">
                    <h2 class="text-center mb-4">View Customer Inquiries</h2>
                    <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM customer_inquiry";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                        <td>' . $row['id'] . '</td>
                                        <td>' . $row['name'] . '</td>
                                       <td><a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a></td>

                                        <td>' . $row['message'] . '</td>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="id" value="' . $row['id'] . '">
                                                <button type="submit" class="btn btn-danger" name="delete_inquiry">Delete</button>
                                            </form>
                                        </td>
                                    </tr>';
                            }

                            echo '</tbody>
                                </table>';
                        } else {
                            echo 'No inquiries found.';
                        }

                        if (isset($_POST['delete_inquiry'])) {
                            $inquiryId = $_POST['inquiry_id'];

                            $deleteSql = "DELETE FROM customer_inquiry WHERE inquiry_id = '$inquiryId'";
                            $deleteResult = mysqli_query($conn, $deleteSql);

                            if ($deleteResult) {
                                echo "<script>alert('Inquiry deleted successfully');</script>";
                            } else {
                                echo "<script>alert('Failed to delete inquiry');</script>";
                            }
                        }
                    ?>
                </div>
            </div>

                </div>
            </div>
        </div>

        <!-- Manage Admins Section -->
        <div class="admin-section">
            <div class="collapse" id="collapseAdmins">
                <div class="card card-body mt-3">
                    
                <div id="manageAdmin" class="admin-section">
                <div class="card card-body">
                    <h2 class="text-center mb-4">Manage Admin Account</h2>
                    <form method="post">
                        <div class="mb-3">
                            <label for="adminUsername" class="form-label">New Admin Username</label>
                            <input type="text" class="form-control" id="adminUsername" name="adminUsername" placeholder="Enter username">
                        </div>
                        <div class="mb-3">
                            <label for="adminPassword" class="form-label">New Admin Password</label>
                            <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="addAdmin">Add Admin</button>
                    </form>
                    <hr>
                    <h4>Existing Admins</h4>
                    <ul class="list-group">
                        <?php
                        include 'connect.php';
                        $sql="SELECT * FROM admin";
                        $result=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                echo '<li class="list-group-item d-flex justify-content-between align-items-center">'.$row['username'].'
                                <form method="post">
                                    <input type="hidden" name="admin_id" value="' . $row['id'] . '">
                                    <button type="submit" class="btn btn-danger" name="delete_admin">Delete</button>
                                </form>
                                </li>';
                            }
                        }

                        if (isset($_POST['addAdmin'])) {
                            $username = $_POST['adminUsername'];
                            $password = $_POST['adminPassword'];

                            $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                echo "<script>alert('Admin added successfully');</script>";
                            } else {
                                echo "<script>alert('Failed to add admin');</script>";
                            }
                        }

                        if (isset($_POST['delete_admin'])) {
                            $adminId = $_POST['admin_id'];

                            $deleteSql = "DELETE FROM admin WHERE admin_id = '$adminId'";
                            $deleteResult = mysqli_query($conn, $deleteSql);

                            if ($deleteResult) {
                                echo "<script>alert('Admin deleted successfully');</script>";
                            } else {
                                echo "<script>alert('Failed to delete admin');</script>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

                </div>
            </div>
        </div>

    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.nav-buttons .btn');
            const sections = document.querySelectorAll('.collapse');

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    // Collapse all sections and remove active class from all buttons
                    sections.forEach(section => {
                        section.classList.remove('show');
                    });
                    buttons.forEach(btn => {
                        btn.classList.remove('active');
                    });

                    // Expand the selected section and add active class to the clicked button
                    const target = button.getAttribute('data-bs-target');
                    document.querySelector(target).classList.add('show');
                    button.classList.add('active');
                });
            });
        });
    </script>
    <br>
  <center>  <a href="logout.php" class="btn btn-danger">Logout</a> </center>
  <br>
  <br>
</body>
</html>
<?php
include 'connect.php';
if(isset($_POST['category']))
{    
    $category=$_POST['newcategory'];
    $sql="INSERT INTO category (image_category) VALUES ('$category')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "<script>alert('Category added successfully');</script>";
    }
    else
    {
        echo "<script>alert('Failed to add category');</script>";
    }
}
?>
<?php
include 'connect.php';
if (isset($_POST['image_upload'])) {
  if (isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $fileName = $image['name'];
    $size = $image['size'];
    $fileTemp = $image['tmp_name'];
    $type = $image['type'];
    echo "<br>";
    $size_converted = $size / 1048576;
    $date = date("Y-m-d-H-i-s");

    $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
    $newfilename = $date . "." . $extension;
    $category = $_POST['image_category'];
    if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") {
      if ($size_converted < 5) {
        move_uploaded_file($fileTemp, 'uploads/' . $newfilename);
        $query = "INSERT INTO image_information(img_category,img_name) VALUES('$category','$newfilename')";
        $res = mysqli_query($conn, $query);
        echo "<script>alert('File uploaded successfully');</script>";
      } else {
        die("<script>alert('Error: File is too large');</script>");
      }
    } else {
      die("<script>alert('Error: File is not supported');</script>");
    }
  } else {
    echo "<script>alert('No files');</script>";
  }
}
?>
<?php
include 'connect.php';

if (isset($_POST['home'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $title2 = mysqli_real_escape_string($conn, $_POST['title2']);
    $description2 = mysqli_real_escape_string($conn, $_POST['description2']);

    $updateQuery = "UPDATE home SET title='$title', description='$description', title2='$title2', description2='$description2' WHERE id=1";

    // Debugging: Output the query and form data
    echo "<pre>";
    echo "SQL Query: " . $updateQuery . "\n";
    echo "Form Data: \n";
    echo "Title: $title \n";
    echo "Description: $description \n";
    echo "Title2: $title2 \n";
    echo "Description2: $description2 \n";
    echo "</pre>";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Home content updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating home content: " . mysqli_error($conn) . "');</script>";
    }
}

mysqli_close($conn);
?>


<?php
include 'connect.php';

if (isset($_POST['skill_submit'])) {
    $title = $_POST['skill_title'];
    $description = $_POST['skill_description'];

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileNameCmps = explode('.', $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadFileDir = './uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Insert data into database
            $sql = "INSERT INTO skills (title, description, skill_image) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'sss', $title, $description, $newFileName);
                mysqli_stmt_execute($stmt);

                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    // Redirect after successful insertion
                    header("Location: admin.php?success=1");
                    exit();
                } else {
                    echo "Error: Could not insert data.";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Error: Could not prepare SQL statement.";
            }
        } else {
            echo "Error: Failed to upload file.";
        }
    } else {
        echo "Error: No file uploaded or upload error.";
    }
}

// Handle the deletion of skills
if (isset($_POST['delete_skill'])) {
    $skillId = $_POST['skill_id'];

    $deleteSql = "DELETE FROM skills WHERE id = ?";
    $stmt = mysqli_prepare($conn, $deleteSql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $skillId);
        $deleteResult = mysqli_stmt_execute($stmt);

        if ($deleteResult) {
            header("Location: admin.php?delete=1");
            exit();
        } else {
            echo "<script>alert('Failed to delete skill');</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Could not prepare SQL statement.";
    }
}

// Fetch skills from the database
$sql = "SELECT * FROM skills";
$result = mysqli_query($conn, $sql);
?>

<div class="admin-section">
    <div class="collapse" id="collapseSkills">
        <div class="card card-body mt-3">

            
            <h2 class="text-center mt-4">Manage Skills/Experience</h2>
            <br>
            <?php
            if (mysqli_num_rows($result) > 0) {
                echo '<table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <td><img src="uploads/' . htmlspecialchars($row['skill_image']) . '" width="100"></td>
                            <td>' . htmlspecialchars($row['title']) . '</td>
                            <td>' . htmlspecialchars($row['description']) . '</td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="skill_id" value="' . $row['id'] . '">
                                    <button type="submit" class="btn btn-danger" name="delete_skill">Delete</button>
                                </form>
                                <form method="get" style="display:inline;">
                                    <input type="hidden" name="edit_skill_id" value="' . $row['id'] . '">
                                    <button type="submit" class="btn btn-warning" name="edit_skill">Edit</button>
                                </form>
                            </td>
                        </tr>';
                }

                echo '</tbody>
                    </table>';
            } else {
                echo 'No skills found.';
            }
            ?>

            <!-- Edit Skill Form -->
            <?php
            if (isset($_GET['edit_skill_id'])) {
                $editSkillId = $_GET['edit_skill_id'];

                $editSql = "SELECT * FROM skills WHERE id = ?";
                $stmt = mysqli_prepare($conn, $editSql);
                mysqli_stmt_bind_param($stmt, 'i', $editSkillId);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $editRow = mysqli_fetch_assoc($result);
                mysqli_stmt_close($stmt);
            ?>
                <div class="mt-4">
                    <h3>Edit Skill</h3>
                    <form enctype="multipart/form-data" method="post">
                        <input type="hidden" name="edit_skill_id" value="<?php echo htmlspecialchars($editRow['id']); ?>">
                        <div class="mb-3">
                            <label for="editSkillsTitle" class="form-label">Skills/Experience Title</label>
                            <input type="text" class="form-control" id="editSkillsTitle" name="edit_skill_title" value="<?php echo htmlspecialchars($editRow['title']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="editSkillsDescription" class="form-label">Skills/Experience Description</label>
                            <textarea class="form-control" id="editSkillsDescription" rows="5" name="edit_skill_description"><?php echo htmlspecialchars($editRow['description']); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editSkillsImage" class="form-label">Upload New Image (optional)</label>
                            <input type="file" class="form-control" id="editSkillsImage" name="edit_image">
                        </div>
                        <button type="submit" name="update_skill" class="btn btn-primary">Update Skill</button>
                    </form>
                </div>
            <?php
            }

            // Handle the update of skills
            if (isset($_POST['update_skill'])) {
                $editSkillId = $_POST['edit_skill_id'];
                $editTitle = $_POST['edit_skill_title'];
                $editDescription = $_POST['edit_skill_description'];

                if (isset($_FILES['edit_image']) && $_FILES['edit_image']['error'] == 0) {
                    $fileTmpPath = $_FILES['edit_image']['tmp_name'];
                    $fileName = $_FILES['edit_image']['name'];
                    $fileNameCmps = explode('.', $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $uploadFileDir = './uploads/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $updateSql = "UPDATE skills SET title = ?, description = ?, skill_image = ? WHERE id = ?";
                        $stmt = mysqli_prepare($conn, $updateSql);

                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'sssi', $editTitle, $editDescription, $newFileName, $editSkillId);
                            mysqli_stmt_execute($stmt);

                            if (mysqli_stmt_affected_rows($stmt) > 0) {
                                header("Location: admin.php?update=1");
                                exit();
                            } else {
                                echo "Error: Could not update data.";
                            }
                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Error: Could not prepare SQL statement.";
                        }
                    } else {
                        echo "Error: Failed to upload file.";
                    }
                } else {
                    $updateSql = "UPDATE skills SET title = ?, description = ? WHERE id = ?";
                    $stmt = mysqli_prepare($conn, $updateSql);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, 'ssi', $editTitle, $editDescription, $editSkillId);
                        mysqli_stmt_execute($stmt);

                        if (mysqli_stmt_affected_rows($stmt) > 0) {
                            header("Location: admin.php?update=1");
                            exit();
                        } else {
                            echo "Error: Could not update data.";
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "Error: Could not prepare SQL statement.";
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
