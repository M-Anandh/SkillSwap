<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset("web/styles/registerstyle.css")}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header>User Registration</header>

        <form action="" method="post">
        @csrf
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name="name" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" placeholder="Enter birth date" name="dob" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="Enter your email" name="email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" placeholder="Enter mobile number" name="phone" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender"  required>
                                <option disabled selected>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Profile-Photo</label>
                            <input type="file" placeholder="Upload Your profile photo" name="photo">
                        </div>
                    </div>
                </div>
                <div class="details family">
                    <span class="title">Account Information</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" placeholder="Enter your username" name="username" required>
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" placeholder="Enter Your Password" name="password" required>
                        </div>
                        <div class="input-field">
                            <label>Re-Type Password</label>
                            <input type="password" placeholder="Enter Your password" name="cpassword" required>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="submit">
                    <span class="btnText">Submit</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
            <?php

session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'myskill';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['name'];
            $dob=$_POST['dob'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $gender=$_POST['gender'];
            $photo=$_POST['photo'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
        
            $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' OR phone='$phone'";
            $check_result = mysqli_query($conn, $check_query);
        
            $errors = [];
        
            while ($row = mysqli_fetch_assoc($check_result)) {
                if ($row['username'] == $username) {
                    $errors['username'] = "Username already exists. Please choose a different one.";
                }
        
                if ($row['email'] == $email) {
                    $errors['email'] = "Email already exists. Please choose a different one.";
                }
        
                if ($row['phone'] == $phone) {
                    $errors['phone'] = "Phone number already exists. Please choose a different one.";
                }
            }
        
        
            if (empty($errors)) {
                // $target_dir = "uploads/";
                // $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
                // move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file);
        
                $insert_query = "INSERT INTO users (Name, dob, email,phone,gender,username,password) VALUES ('$fullname', '$dob', '$email', '$phone', '$gender','$username', '$password')";
                $insert_result = mysqli_query($conn, $insert_query);
        
                if ($insert_result) {
                    unset($_SESSION['registration_data']);
        
                    echo "<script>alert('Registration successful. You can now login.');</script>";
                    echo "<script>window.location.href='login.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Registration failed. Please try again.');</script>";
                }
            } //else {
                // $_SESSION['registration_errors'] = $errors;
                // $_SESSION['registration_data'] = [
                //     'fullname' => $fullname,
                //     'username' => $username,
                //     'email' => $email,
                //     'dob' => $dob,
                //     'gender' => $gender,
                //     'phone' => $phone,
                //     'address' => $address,
                //     'city' => $city,
                // ];
        
                echo "<script>alert('Registration failed. Please check the form for errors.');</script>";
            }
       // }
        ?>
        </form>
</body>
</html>