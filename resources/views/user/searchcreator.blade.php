<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->

    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!--<title>Dashboard Sidebar Menu</title>-->
    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <title>SKillSwap|Search Creator</title>
    <style>
       body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa; /* Lighter background color */
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Form Styles */
form {
    margin-bottom: 20px;
}

input[type="text"] {
    padding: 10px;
    width: 300px; /* Extend the search bar */
}

button {
    padding: 10px;
    background-color: #3498db; /* Different color for the search button */
    color: white;
    border: none;
    cursor: pointer;
}

/* Users Container Styles */
.users-container {
    display: flex;
    flex-wrap: wrap;
}

.user-box {
    background-color: #ecf0f1; /* Different color for each user box */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    text-align: center; /* Center the contents */
    width: calc(25% - 20px); /* Adjust the width for a 4-card layout with margin */
    box-sizing: border-box; 
}

/* Profile Image Styles */
.user-box img {
    width: 100px; /* Set a fixed width */
    height: 100px; /* Set a fixed height */
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 10px;
}

/* Profile Details Styles */
.user-box h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #695CFE; /* Set Name color */
}

.user-box p {
    margin: 5px 0;
    color: #FF5733; /* Set Skills color */
}

/* Profile Link Styles */
.user-box a {
    display: block;
    margin-top: 10px;
    text-decoration: none;
    color: #695CFE; /* Different color for the profile link */
}

.user-box a:hover {
    text-decoration: underline;
}

/* Form Styles within User Box */
.form-group {
    margin-top: 15px;
}

/* Meeting Input Styles */
.form-control {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    box-sizing: border-box;
    border: 1px solid #d1d1d1;
    border-radius: 4px;
}

/* Button Styles within User Box */
.btn-success {
    background-color: #2ecc71; /* Different color for the 'Book Meeting' button */
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    margin-top: 15px; /* Add margin to center the button */
}

    </style>

</head>

<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('web/assets/logo.jpg')}}" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">SkillSwap</span>
                    <span class="profession">User</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box" style="display: none;">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ route('user.interest.index') }}">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link" style="background-color: #695CFE; border-radius: 5px;">
                        <a href="{{ route('user.skills.index') }}">
                            <i class='bx bx-search icon' style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">Find Expert</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('user.meetings') }}">
                            <i class='bx bx-pie-chart-alt icon'></i>
                            <span class="text nav-text">My Booking</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('chatify') }}" target="_blank">
                            <i class='bx bx-conversation bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Messages</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('file-list.index') }}">
                            <i class='bx bx-file-find bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Resources</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('feedback.create') }}">
                            <i class='bx bx-comment-edit bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Request Source</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/user/announcements">
                            <i class='bx bx-notification bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Announcements</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('user.details') }}">

                            <i class='bx bx-user-circle bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">My Profile</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="{{ route('logout') }}" id="logout-link">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>

                    <script>
                        document.getElementById('logout-link').addEventListener('click', function(event) {
                            event.preventDefault(); // Prevent the default link behavior

                            // Assuming you have a hidden form with the ID 'logout-form'
                            document.getElementById('logout-form').submit();
                        });
                    </script>

                    <!-- Include the CSRF token in a hidden form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>

                <!-- <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li> -->

            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">
            <form method="get" action="{{ route('user.skills.index') }}">
                <input type="text" name="search" placeholder="Search by skill">
                <button type="submit">Search</button>
            </form>
            <div class="users-container">
                @forelse($users as $user)
                <div class="user-box">
                    <img src="{{ asset('storage/'.$user->profile_photo_path) }}" alt="{{ $user->name }}">


                    <h2>{{ $user->name }}</h2>
                    <p>Occupation: {{ $user->occupation }}</p>
                    <p>Experience: {{ $user->exp }}</p>
                    <p>Skills:{{$user->skill}}</p>

                    <a href="{{ $user->link }}" target="_blank">Profile Link</a>
                    <form method="post" action="{{ route('user.bookMeeting', $user->id) }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Select The Meeting Date and Time</label>
                            <input type="datetime-local" class="form-control" name="meeting_datetime"  id="meeting_datetime" required>
                        </div>
                        <button type="submit" class="btn btn-success">Book Meeting</button>
                    </form>
                </div>
                @empty
                <p>No users found with similar skills.</p>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";

            }
        });
    </script>
    <script>
    // Get the current date and time in ISO format
    var now = new Date();
    var year = now.getFullYear();
    var month = (now.getMonth() + 1).toString().padStart(2, '0');
    var day = now.getDate().toString().padStart(2, '0');
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

    // Set the min attribute of the input to the current date and time
    document.getElementById('meeting_datetime').min = currentDateTime;
  </script>

</body>

</html>