<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <title>SKillSwap|Profile</title>
    <style>
        .meeting-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .meeting-table th,
        .meeting-table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .even-row {
            background-color: #f2f2f2;
        }

        .odd-row {
            background-color: #ffffff;
        }

        .meeting-box {
            margin-bottom: 10px;
        }

        .btn-success {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #0056b3;
        }

        input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        th{
            background-color: blue;
            color: white;
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
                            <span class="text nav-text">ManageMeet Link</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('user.myBookedMeetings') }}" style="background-color: #695CFE; border-radius: 5px;">
                            <i class='bx bx-pie-chart-alt icon' style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">My Booking</span>
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

                    <li class="nav-link">
                        <a href="{{ route('display.messages') }}">

                            <i class='bx bxs-report bx-rotate-90-alt icon' ></i>
                            <span class="text nav-text">My Reports</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('creator.details') }}">

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
            <table class="meeting-table">
                <thead>
                    <tr>
                        <th>Date and Time</th>
                        <th>Booked by</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookedMeetings as $index => $meeting)
                    <tr class="{{ $index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                        <td>{{ $meeting->datetime }}</td>
                        <td>{{ $meeting->user->name }}</td>
                        <td>
                            @if ($meeting->datetime >= now() && !$meeting->completed)
                            <form method="post" action="{{ route('user.meeting.update', $meeting->id) }}" onsubmit="return validateMeetingDateTime(this)">
                                @csrf
                                <div class="form-group">
                                    <input type="datetime-local" class="form-control" name="new_datetime" required>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button> 
                            </form>
                            <script>
                                function validateMeetingDateTime(form) {
                                    const input = form.querySelector('input[name="new_datetime"]');
                                    const selectedDatetime = new Date(input.value);
                                    const now = new Date();
                                    const oneHourLater = new Date(now.getTime() + (1 * 60 * 60 * 1000));

                                    if (selectedDatetime < oneHourLater) {
                                        alert('Please select a date and time at least one hour later than the current date and time.');
                                        return false;
                                    }

                                    return true;
                                }
                            </script>

                            <br>

                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>


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