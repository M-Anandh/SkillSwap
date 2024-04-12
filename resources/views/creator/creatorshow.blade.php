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
    <title>SKillSwap|Profile</title>
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
                    <span class="profession">Creator</span>
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
                        <a href="{{ route('user.dash') }}">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('profile.show') }}">
                            <i class='bx bx-link bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Manage Meet</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('user.myBookedMeetings') }}">
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
                        <a href="{{ route('upload-form') }}">
                            <i class='bx bx-file-find bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Upload Resource</span>
                        </a>
                    </li>

                    

                    <li class="nav-link" style="background-color: #695CFE; border-radius: 5px;">
                        <a href="{{ route('creator.details') }}" >

                            <i class='bx bx-user-circle bx-rotate-90-alt icon'style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">My Profile</span>
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
            <div class="profile-card">
                <div class="card-header">
                <h2 style="color:#7e1aff">Your Profile</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <img src="{{ asset('storage/'.$user->profile_photo_path) }}" alt="Profile Photo" class="img-fluid mb-2" id="profile-photo-preview">
                            <input type="text" class="form-control" name="username" value="{{ $user->user }}" disabled style="border: none; background-color: transparent; font-size: 16px; color: #ff0000;">

                            <label for="profile_photo" style="cursor: pointer; display: inline-block; padding: 10px 15px; border: 1px solid #ccc; border-radius: 5px; background-color:#7e1aff; color: #fff;">Choose New Profile Picture
                                <input type="file" id="profile_photo" name="profile_photo" accept="image/*" style="display: none;">
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control mb-1" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">E-Mail</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control mb-1" name="phone" value="{{ $user->phone }}">
                        </div>
                       
                        <div class="form-group">
                            <label class="form-label">Skills Known</label>
                            <input type="text" class="form-control" name="interests" value="{{ $user->skill }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Occupation</label>
                            <input type="text" class="form-control" name="occupations" value="{{ $user->occupation }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Linkedin Link</label>
                            <input type="text" class="form-control" value="{{ $user->link}}" disabled>
                        </div>



                            <button type="submit" class="btn btn-success">Update</button>

                    </form>
                </div>
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

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>