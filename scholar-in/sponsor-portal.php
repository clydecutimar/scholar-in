<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "scholar-in";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $location = $conn->real_escape_string($_POST['location']);
    $prioritize_course = $conn->real_escape_string($_POST['prioritize_course']);
    $grade = $conn->real_escape_string($_POST['grade']);
    $duration_start = $conn->real_escape_string($_POST['duration_start']);
    $duration_end = $conn->real_escape_string($_POST['duration_end']);
    $benefits = $conn->real_escape_string($_POST['benefits']);
    $about = $conn->real_escape_string($_POST['about']);
    $sponsor = $conn->real_escape_string($_POST['sponsor']);
    $user_name =  $conn->real_escape_string($_SESSION['username']);

    // Upload image
    $image = $_FILES['image']['name'];
    $target_dir = "profile_images_scholarship/";
    $target_file = $target_dir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        echo "<script>alert('Image uploaded successfully!');</script>";
    } else {
        echo "<script>alert('Error uploading image.');</script>";
        $image = "";
    }

    // Insert data into the table
    $sql = "INSERT INTO scholarship (name, location, prioritize_course, grade, duration_start, duration_end, benefits, image, about, sponsor, user_name)
            VALUES ('$name', '$location', '$prioritize_course', '$grade', '$duration_start', '$duration_end', '$benefits', '$image', '$about', '$sponsor', '$user_name')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Scholarship posted successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="sponsor-portal.css">
    <title>ScholarIN - Applicant Register</title>
</head>
<body>

<img src="logo.png" alt="logo" class="logo">

<div class="user-info">
    <span>Welcome, <?php echo $_SESSION['username']; ?></span>
    <a href="sponsor-logout.php" class="btn btn-danger ml-2">Logout</a>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <a href="sponsor-portal.php" class="active">Post Scholarship </a>
            <a href="list.php">Scholarships</a>
            <a href="applications.php">Applications</a>
            <a href="contact.php">Contact</a>
        </div>
        <div class="col-md-7">
            <div class="center-box">
                <div class="container p-5 border rounded border-dark">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="name" class="form-label">Name of the Scholarship:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location:</label>
                            <input type="text" class="form-control" name="location" required>
                        </div>

                        <div class="mb-3">
                            <label for="prioritize_course" class="form-label">Prioritize Course/s:</label>
                            <textarea class="form-control" name="prioritize_course" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="grade" class="form-label">Required Grade:</label>
                            <input type="text" class="form-control" name="grade" required>
                        </div>

                        <div class="mb-3">
                            <label for="duration_start" class="form-label">Start of Application:</label>
                            <input type="date" class="form-control" name="duration_start" required>
                        </div>

                        <div class="mb-3">
                            <label for="duration_end" class="form-label">End of Application:</label>
                            <input type="date" class="form-control" name="duration_end" required>
                        </div>

                        <div class="mb-3">
                            <label for="benefits" class="form-label">Benefits:</label>
                            <textarea class="form-control" name="benefits" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image:</label>
                            <input type="file" class="form-control" name="image" accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label for="about" class="form-label">About:</label>
                            <textarea class="form-control" name="about" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="sponsor" class="form-label">Sponsor:</label>
                            <input type="text" class="form-control" name="sponsor" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div><br><br>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
