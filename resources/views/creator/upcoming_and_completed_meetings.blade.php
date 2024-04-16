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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-info {
            text-align: right;
        }

        .meeting-columns {
            display: flex;
            justify-content: space-between;
        }

        .meeting-column {
            width: 48%;
        }

        .meeting-table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        .meeting-table th,
        .meeting-table td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .meeting-table th {
            background-color: #f4f4f4;
        }

        .even-row {
            background-color: #f9f9f9;
        }

        .odd-row {
            background-color: #fff;
        }




        .dashboard-content {
            margin-top: 30px;
        }

        .activity-graph {
            margin-top: 30px;
        }

        .upcoming-meetings .meeting-table th {
            background-color: #3498db;
           
            color: #fff;
           
        }

        .upcoming-meetings .even-row {
            background-color: #d4e6f1;
        }

        .upcoming-meetings .odd-row {
            background-color: #fff;
        }

        .completed-meetings .meeting-table th {
            background-color: #27ae60;
            color: #fff;
           
        }

        .completed-meetings .even-row {
            background-color: #c8e6c9;
        }

        .completed-meetings .odd-row {
            background-color: #fff;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .meeting-columns {
                flex-direction: column;
            }

            .meeting-column {
                width: 100%;
                margin-bottom: 20px;
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
                    <li class="nav-link" style="background-color: #695CFE; border-radius: 5px;">
                        <a href="{{ route('user.dash') }}">
                            <i class='bx bx-home-alt icon' style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">Dashboard</span>
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
                            <span class="text nav-text">Upload Resources</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('reports.index') }}">

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
        <div class="dashboard-container" style="    font-family: 'Times New Roman', Times, serif">
            <div class="header">
                <h1></h1>
                <div class="user-info">
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </div>

            <div class="meeting-columns">
                <div class="meeting-column upcoming-meetings">
                    <h2>Upcoming Meetings</h2>
                    <table class="meeting-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upcomingMeetings as $meeting)
                            <tr>
                                <td>{{ $meeting->datetime }}</td>
                                <td>{{ $meeting->user->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="meeting-column completed-meetings">
                    <h2>Completed Meetings</h2>
                    <table class="meeting-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($completedMeetings->take(3) as $index => $meeting)
                            <tr class="{{ $index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                                <td>{{ $meeting->datetime }}</td>
                                <td>{{ $meeting->user->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p style="padding-top: 10px;">Number of Completed Meetings: {{ $completedMeetingsCount }}</p>

                </div>
            </div>



            <div class="activity-graph">
                <h2>Last 7 Days Activity</h2>
                <div class="chart-container">
                    <canvas id="activityChart"></canvas>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var activityData = <?php echo json_encode($activityData); ?>;

            if (activityData) {
                var ctx = document.getElementById('activityChart').getContext('2d');
                var activityChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: activityData.labels,
                        datasets: [{
                            label: 'Meeting Activity',
                            data: activityData.meetingCounts,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: false
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'day',
                                    displayFormats: {
                                        day: 'MMM d'
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }
        });
    </script>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>

</body>

</html>