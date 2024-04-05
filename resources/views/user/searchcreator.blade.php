<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <title>SKillSwap|Search Creator</title>
    <style>
       body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

form {
    margin-bottom: 20px;
}

input[type="text"] {
    padding: 10px;
    width: 300px; 
}

button {
    padding: 10px;
    background-color: #3498db; 
    color: white;
    border: none;
    cursor: pointer;
}

.users-container {
    display: flex;
    flex-wrap: wrap;
}

.user-box {
    background-color: #ecf0f1;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    text-align: center; 
    width: calc(25% - 20px); 
    box-sizing: border-box; 
}

.user-box img {
    width: 100px; 
    height: 100px; 
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 10px;
}

.user-box h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #695CFE; 
}

.user-box p {
    margin: 5px 0;
    color: #FF5733; 
}

.user-box a {
    display: block;
    margin-top: 10px;
    text-decoration: none;
    color: #695CFE; 
}

.user-box a:hover {
    text-decoration: underline;
}

.form-group {
    margin-top: 15px;
}

.form-control {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    box-sizing: border-box;
    border: 1px solid #d1d1d1;
    border-radius: 4px;
}

.btn-success {
    background-color: #2ecc71;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    margin-top: 15px; 
}

@media only screen and (max-width: 767px) {
        .user-box {
            width: 100%; 
        }
    }

   
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .user-box {
            width: calc(33.33% - 20px); 
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .user-box {
            width: calc(25% - 20px); 
        }
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
                        <a href="{{ route('announcements.without.delete') }}" >
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
                            event.preventDefault(); 

                            document.getElementById('logout-form').submit();
                        });
                    </script>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>

                

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
                <p>No Creator found</p>
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
    var now = new Date();
    var year = now.getFullYear();
    var month = (now.getMonth() + 1).toString().padStart(2, '0');
    var day = now.getDate().toString().padStart(2, '0');
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

    document.getElementById('meeting_datetime').min = currentDateTime;
  </script>

</body>

</html>