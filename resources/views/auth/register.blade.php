<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('web/styles/registerstyle.css')}}">

    <title>User Registration</title>
</head>
<body>
    <div class="container">
        <header>User Registration</header>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="form">
                <div class="personal-details">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" placeholder="Enter birth date" name="dob" required max="<?php echo date('Y-m-d', strtotime('-1 day')); ?>">
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" placeholder="Enter your email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="tel" placeholder="Enter mobile number" name="phone" value="{{ old('phone') }}" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender" required>
                                <option disabled selected>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Profile Photo</label>
                            <input type="file" name="photo">
                        </div>
                        <div class="input-field" style="display: none;">
                            <label>Regisration Type</label>
                            <input type="number" placeholder="User" name="approved" id="approved" readonly required>
                            <input type="hidden" name="approved_default" value="1">
                        </div>

                        <div class="input-field">
                            <label>Your Intrests</label>
                            <input type="text" name="skills" id="skills-list" spellcheck="false" placeholder="Enter Your Interest..." required>
                        </div>

                        <div class="input-field"  style="display: none;">
                            <label>Type</label>
                            <input type="number" placeholder="User" name="type" id="type" readonly>
                            <input type="hidden" name="type_default" value="0">
                        </div>

                        
                    </div>
                </div>

                <div class="account-information">
                    <span class="title">Account Information</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" placeholder="Enter your username"  name="user" value="{{ old('user') }}" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" placeholder="Enter your password" name="password" required>
                        </div>

                        <div class="input-field">
                            <label>Re-Type Password</label>
                            <input type="password" placeholder="Re-enter your password" name="password_confirmation" required>
                        </div>

                    </div>
                </div>

                <button class="submit" type="submit">
                    <span class="btnText">Submit</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </form>
    </div>
</body>
</html>
