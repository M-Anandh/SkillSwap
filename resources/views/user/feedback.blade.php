<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('web/styles/profile.css')}}">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <title>SKillSwap|Feedback</title>


    <style>
    body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
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

                    <li class="nav-link">
                        <a href="{{ route('user.skills.index') }}">
                            <i class='bx bx-search icon'></i>
                            <span class="text nav-text">Find Expert</span>
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
                        <a href="{{ route('feedback.create') }}"  style="background-color: #695CFE; border-radius: 5px;">
                            <i class='bx bx-comment-edit bx-rotate-90-alt icon'style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">Request Source</span>
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


@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

<form action="{{ route('feedback.store') }}" method="post">
    @csrf

    {{-- Assuming you have set up authentication --}}
    @auth
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" required readonly>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ Auth::user()->email }}" required readonly>
    @endauth

    <label for="message">Message:</label>
    <textarea name="message" rows="4" required></textarea>

    <button type="submit">Submit Feedback</button>
</form>




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

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>