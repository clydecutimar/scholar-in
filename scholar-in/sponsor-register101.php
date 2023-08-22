<?php
// Establish a connection to the database
$servername = "localhost";
$dbname = "scholar-in";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phonenumber"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Process profile image upload
    $profileImage = "";
    if (isset($_FILES["profileimage"]) && $_FILES["profileimage"]["error"] == 0) {
        $targetDir = "profile_images_sponsor/";
        $profileImage = $targetDir . basename($_FILES["profileimage"]["name"]);
        move_uploaded_file($_FILES["profileimage"]["tmp_name"], $profileImage);
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO sponsor (name, email_address, phone_number, address, profile_image, username, password) VALUES (:name, :email, :phonenumber, :address, :profileimage, :username, :password)");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phonenumber", $phoneNumber);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":profileimage", $profileImage);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashed_password);

    // Insert the data into the database
    try {
        $stmt->execute();
        echo "<script>alert('Registration Successful!');</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ScholarIN - Sponsor Register</title>
</head>
<body style="background-color: #2096BB;">
<section class="h-100 h-custom" style="background-color: #2096BB;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <img src="https://www.gettingsmart.com/wp-content/uploads/2017/01/College-Students-Using-Laptops-Feature-Image.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">

                    <div style="display: flex; justify-content: center; align-items: center;">
                        <br> <br> <a href="home.html"> <svg width="116" height="22" viewBox="0 0 116 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3977 10.0824L9.51989 10.321C9.4536 9.98958 9.31108 9.69129 9.09233 9.42614C8.87358 9.15436 8.58523 8.93892 8.22727 8.77983C7.87595 8.61411 7.45502 8.53125 6.96449 8.53125C6.30824 8.53125 5.75474 8.67045 5.30398 8.94886C4.85322 9.22064 4.62784 9.58523 4.62784 10.0426C4.62784 10.4072 4.77367 10.7154 5.06534 10.9673C5.35701 11.2192 5.85748 11.4214 6.56676 11.5739L9.33097 12.1307C10.8158 12.4356 11.9228 12.9261 12.652 13.6023C13.3812 14.2784 13.7457 15.1667 13.7457 16.267C13.7457 17.268 13.4508 18.1463 12.8608 18.902C12.2775 19.6577 11.4754 20.2476 10.4545 20.6719C9.44034 21.0895 8.27036 21.2983 6.9446 21.2983C4.92282 21.2983 3.31203 20.8774 2.11222 20.0355C0.919034 19.187 0.219697 18.0336 0.0142046 16.5753L4.1804 16.3565C4.30634 16.973 4.61127 17.4437 5.09517 17.7685C5.57907 18.0866 6.19886 18.2457 6.95455 18.2457C7.69697 18.2457 8.29356 18.1032 8.74432 17.8182C9.2017 17.5265 9.43371 17.152 9.44034 16.6946C9.43371 16.3101 9.27131 15.9953 8.95312 15.75C8.63494 15.4981 8.14441 15.3059 7.48153 15.1733L4.83665 14.6463C3.34517 14.348 2.23485 13.831 1.50568 13.0952C0.783144 12.3594 0.421875 11.4214 0.421875 10.2812C0.421875 9.30019 0.687027 8.45502 1.21733 7.74574C1.75426 7.03646 2.50663 6.48958 3.47443 6.10511C4.44886 5.72064 5.58902 5.52841 6.89489 5.52841C8.82386 5.52841 10.3419 5.93608 11.4489 6.75142C12.5625 7.56676 13.2121 8.67708 13.3977 10.0824ZM23.3136 21.2983C21.7492 21.2983 20.4035 20.9669 19.2766 20.304C18.1564 19.6345 17.2946 18.7064 16.6914 17.5199C16.0948 16.3333 15.7965 14.9678 15.7965 13.4233C15.7965 11.8589 16.0981 10.4867 16.7013 9.30682C17.3112 8.12026 18.1763 7.19555 19.2965 6.53267C20.4168 5.86316 21.7492 5.52841 23.2937 5.52841C24.6261 5.52841 25.7927 5.77036 26.7937 6.25426C27.7946 6.73816 28.5868 7.41761 29.1701 8.29261C29.7534 9.16761 30.0749 10.1951 30.1346 11.375H26.1374C26.0247 10.6127 25.7264 9.99953 25.2425 9.53551C24.7653 9.06487 24.1388 8.82955 23.3633 8.82955C22.707 8.82955 22.1336 9.00852 21.6431 9.36648C21.1592 9.7178 20.7814 10.2315 20.5096 10.9077C20.2378 11.5838 20.1019 12.4025 20.1019 13.3636C20.1019 14.3381 20.2345 15.1667 20.4996 15.8494C20.7714 16.5322 21.1526 17.0526 21.6431 17.4105C22.1336 17.7685 22.707 17.9474 23.3633 17.9474C23.8472 17.9474 24.2814 17.848 24.6658 17.6491C25.0569 17.4503 25.3784 17.1619 25.6303 16.7841C25.8888 16.3996 26.0579 15.9389 26.1374 15.402H30.1346C30.0683 16.5687 29.7501 17.5961 29.18 18.4844C28.6166 19.366 27.8377 20.0554 26.8434 20.5526C25.8491 21.0497 24.6725 21.2983 23.3136 21.2983ZM37.0824 12.1705V21H32.8466V0.636363H36.9631V8.42188H37.142C37.4867 7.52036 38.0436 6.81439 38.8125 6.30398C39.5814 5.78693 40.5459 5.52841 41.706 5.52841C42.7666 5.52841 43.6913 5.76042 44.4801 6.22443C45.2756 6.68182 45.892 7.34138 46.3295 8.20312C46.7737 9.05824 46.9924 10.0824 46.9858 11.2756V21H42.75V12.0312C42.7566 11.09 42.518 10.3575 42.0341 9.83381C41.5568 9.31013 40.8873 9.0483 40.0256 9.0483C39.4489 9.0483 38.9384 9.17093 38.4943 9.41619C38.0568 9.66146 37.7121 10.0194 37.4602 10.4901C37.215 10.9541 37.089 11.5142 37.0824 12.1705ZM57.2198 21.2983C55.6753 21.2983 54.3396 20.9702 53.2127 20.3139C52.0924 19.651 51.2274 18.7296 50.6175 17.5497C50.0077 16.3632 49.7028 14.9877 49.7028 13.4233C49.7028 11.8456 50.0077 10.4669 50.6175 9.28693C51.2274 8.10038 52.0924 7.17898 53.2127 6.52273C54.3396 5.85985 55.6753 5.52841 57.2198 5.52841C58.7643 5.52841 60.0967 5.85985 61.217 6.52273C62.3439 7.17898 63.2122 8.10038 63.8221 9.28693C64.4319 10.4669 64.7369 11.8456 64.7369 13.4233C64.7369 14.9877 64.4319 16.3632 63.8221 17.5497C63.2122 18.7296 62.3439 19.651 61.217 20.3139C60.0967 20.9702 58.7643 21.2983 57.2198 21.2983ZM57.2397 18.017C57.9424 18.017 58.529 17.8182 58.9996 17.4205C59.4703 17.0161 59.8249 16.4659 60.0636 15.7699C60.3088 15.0739 60.4315 14.2817 60.4315 13.3935C60.4315 12.5052 60.3088 11.7131 60.0636 11.017C59.8249 10.321 59.4703 9.77083 58.9996 9.36648C58.529 8.96212 57.9424 8.75994 57.2397 8.75994C56.5304 8.75994 55.9338 8.96212 55.4499 9.36648C54.9727 9.77083 54.6114 10.321 54.3661 11.017C54.1275 11.7131 54.0082 12.5052 54.0082 13.3935C54.0082 14.2817 54.1275 15.0739 54.3661 15.7699C54.6114 16.4659 54.9727 17.0161 55.4499 17.4205C55.9338 17.8182 56.5304 18.017 57.2397 18.017ZM71.7269 0.636363V21H67.4911V0.636363H71.7269ZM79.4751 21.2884C78.5007 21.2884 77.6323 21.1193 76.87 20.7812C76.1077 20.4366 75.5045 19.9295 75.0604 19.2599C74.6229 18.5838 74.4041 17.742 74.4041 16.7344C74.4041 15.8859 74.5599 15.1733 74.8714 14.5966C75.183 14.0199 75.6072 13.5559 76.1442 13.2045C76.6811 12.8532 77.291 12.5881 77.9737 12.4091C78.6631 12.2301 79.3857 12.1042 80.1413 12.0312C81.0296 11.9384 81.7455 11.8523 82.2891 11.7727C82.8326 11.6866 83.227 11.5606 83.4723 11.3949C83.7176 11.2292 83.8402 10.9839 83.8402 10.6591V10.5994C83.8402 9.9697 83.6413 9.48248 83.2436 9.13778C82.8525 8.79309 82.2957 8.62074 81.5732 8.62074C80.8108 8.62074 80.2043 8.78977 79.7536 9.12784C79.3028 9.45928 79.0045 9.87689 78.8587 10.3807L74.9411 10.0625C75.1399 9.13447 75.531 8.33239 76.1143 7.65625C76.6977 6.97348 77.45 6.44981 78.3714 6.08523C79.2995 5.71401 80.3733 5.52841 81.593 5.52841C82.4415 5.52841 83.2536 5.62784 84.0291 5.8267C84.8113 6.02557 85.504 6.33381 86.1072 6.75142C86.7171 7.16903 87.1977 7.70597 87.549 8.36222C87.9003 9.01184 88.076 9.79072 88.076 10.6989V21H84.0589V18.8821H83.9396C83.6944 19.3594 83.3662 19.7803 82.9553 20.1449C82.5443 20.5028 82.0504 20.7846 81.4737 20.9901C80.897 21.1889 80.2308 21.2884 79.4751 21.2884ZM80.6882 18.3651C81.3113 18.3651 81.8615 18.2424 82.3388 17.9972C82.8161 17.7453 83.1906 17.4072 83.4624 16.983C83.7341 16.5587 83.87 16.0781 83.87 15.5412V13.9205C83.7375 14.0066 83.5552 14.0862 83.3232 14.1591C83.0978 14.2254 82.8426 14.2884 82.5575 14.348C82.2725 14.401 81.9875 14.4508 81.7024 14.4972C81.4174 14.5369 81.1589 14.5734 80.9268 14.6065C80.4297 14.6795 79.9955 14.7955 79.6243 14.9545C79.2531 15.1136 78.9647 15.3291 78.7592 15.6009C78.5537 15.866 78.451 16.1974 78.451 16.5952C78.451 17.1719 78.6598 17.6127 79.0774 17.9176C79.5017 18.2159 80.0386 18.3651 80.6882 18.3651ZM91.3622 21V5.72727H95.4688V8.39205H95.6278C95.9063 7.44413 96.3736 6.72822 97.0298 6.24432C97.6861 5.75379 98.4418 5.50852 99.2969 5.50852C99.509 5.50852 99.7377 5.52178 99.983 5.54829C100.228 5.57481 100.444 5.61127 100.629 5.65767V9.41619C100.43 9.35653 100.155 9.3035 99.804 9.2571C99.4527 9.2107 99.1312 9.1875 98.8395 9.1875C98.2164 9.1875 97.6596 9.32339 97.169 9.59517C96.6851 9.86032 96.3007 10.2315 96.0156 10.7088C95.7372 11.1861 95.598 11.7363 95.598 12.3594V21H91.3622ZM101.782 21V10.0613H104.965V21H101.782ZM109.207 21H106.239V10.9387L105.781 10.0613H109.216L110.933 13.608L112.576 17.1453L112.119 12.992V10.0613H115.096V21H112.249L110.028 16.6787L108.656 13.972L109.207 17.556V21Z" fill="#20A8D3"/>
                            </svg> </a>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration</h3>

                        <form action="sponsor-register101.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phonenumber" class="form-label">Phone Number:</label>
                                <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="profileimage" class="form-label">Profile Image:</label>
                                <input type="file" name="profileimage" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
