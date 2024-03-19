<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('web/styles/announce.css')}}">


    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<style>
    /* Custom CSS for announcements */
/* Custom CSS for announcements */
.announcement-container {
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 8px;
    background-color: #f0f0f0; /* Light gray background */
}

.announcement-title {
    font-size: 18px;
    font-weight: bold;
    color: #333; /* Dark text color */
}

.announcement-content {
    margin-top: 5px;
    font-size: 14px;
    color: #666; /* Semi-dark text color */
}

.new-label {
    background-color: #ffcc00; /* Yellow background */
    color: #000; /* Black text color */
    padding: 2px 5px; /* Padding around the label */
    border-radius: 3px; /* Rounded corners */
    animation: pulse 1.5s infinite; /* Apply animation effect */
}

@keyframes pulse {
    0% { background-color: #ffcc00; }
    50% { background-color: #ff6600; }
    100% { background-color: #ffcc00; }
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
                        <a href="#">
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
                        <a href="{{ route('announcements.without.delete') }}" style="background-color: #695CFE; border-radius: 5px;">
                            <i class='bx bx-notification bx-rotate-90-alt icon' style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">Announcements</span>
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
            <h2>Annoucements</h2>
            <!-- announcements_without_delete.blade.php -->

            @if($announcements->isEmpty())
    <p>No announcements to display.</p>
@else
    @foreach($announcements as $announcement)
        <div class="announcement-container">
            <h3 class="announcement-title">{{ $announcement->title }}</h3>
            <p class="announcement-content">{{ $announcement->content }}</p>
            @if($announcement->created_at->gt(now()->subDay()))
                <span class="new-label">New</span>
            @endif
        </div>
    @endforeach
@endif




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

</body>

</html>