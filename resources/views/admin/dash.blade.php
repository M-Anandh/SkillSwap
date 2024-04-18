<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">

    <link rel="stylesheet" href="sidebar.css">
    
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <title>SKillSwap|Admin</title>

<style>
        .container {
            width: 80%;
            margin: auto;
        }

        .row {
            margin-bottom: 20px;
        }

        .col-md-3, .col-md-6 {
            box-sizing: border-box;
            padding: 0 15px;
            margin-bottom: 20px;
        }

        .col-md-3 {
            width: 20%;
            float: left;
            border: 1px solid black;
            margin: 20px;
        }

        .col-md-6 {
            width: 50%;
            float: left;
        }

        /* Clearfix to fix the floating elements */
        .row::after {
            content: "";
            display: table;
            clear: both;
        }
        .col-md-3 a{
            text-decoration: none;
            padding-left: 30px;
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
                    <span class="profession">Admin</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box"  style="display: none;">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ route('dashboard') }}" style="background-color: #695CFE; border-radius: 5px;">
                            <i class='bx bx-home-alt icon'style="color: white;" ></i>
                            <span class="text nav-text"style="color: white;">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('admin.creatorapproval') }}">
                            <i class='bx bx-user-check bx-rotate-90-alt icon' ></i>
                            <span class="text nav-text">Approval</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('manage.users.index') }}">
                            <i class='bx bx-id-card bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Manage Users</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('user.allMeetings') }}">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">All Bookings</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('admin.showform') }}">
                            <i class='bx bx-cloud-upload bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Manage Resource</span>
                        </a>
                    </li>


                    <li class="nav-link">
                        <a href="{{ route('feedback.index') }}">
                            <i class='bx bx-comment-edit bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Requests</span>
                        </a>
                    </li>  

                    <li class="nav-link" >
                        <a href="{{ route('reports.create') }}" >

                            <i class='bx bxs-report bx-rotate-90-alt icon' ></i>
                            <span class="text nav-text">Send Reports</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="{{ route('announcements.index') }}">
                            <i class='bx bx-notification bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Notfiy</span>
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
    document.getElementById('logout-link').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default link behavior

        // Assuming you have a hidden form with the ID 'logout-form'
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
        <div class="text1">
        <div class="container">

        <div class="row" style="padding-top: 20px;">
            <div class="col-md-3" style="background-color:red; color:white;">
                <h3> Number of  &nbsp;&nbsp;&nbsp; Users:  {{ $totalType0Users }}</h3>
                <br>
                <a href="/manage/users">More Info<i class='bx bx-right-arrow-alt'></i></a>
            </div>

            <div class="col-md-3" style="background-color:darkgreen; color:white;">
                <h3>Number of Creators : {{ $totalType2Users }}</h3>
                <br>
                <a href="/manage/users">More Info<i class='bx bx-right-arrow-alt'></i></a>
            </div>

            <div class="col-md-3" style="background-color:#FFC30F; color:white;">
                <h3> Number of Meetings: {{ $totalMeetings }}</h3>
                <br>
                <a href="/all-meetings">More Info<i class='bx bx-right-arrow-alt'></i></a>
            </div>

            <div class="col-md-3" style="background-color:#6495ED; color:white;">
                <h3> Number of Resource: {{ $totalFiles }}</h3>
                <br>
                <a href="/admin/showform">More Info<i class='bx bx-right-arrow-alt'></i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <canvas id="type0UsersChart"></canvas>
            </div>

            <div class="col-md-6">
                <canvas id="type2UsersChart"></canvas>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <canvas id="meetingsChart"></canvas>
            </div>

            <div class="col-md-6">
                <canvas id="fileUploadsChart"></canvas>
            </div>
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


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
    </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx0 = document.getElementById('type0UsersChart').getContext('2d');
        var ctx1 = document.getElementById('type2UsersChart').getContext('2d');
        var ctx2 = document.getElementById('meetingsChart').getContext('2d');
        var ctx3 = document.getElementById('fileUploadsChart').getContext('2d');

        var data0 = {
    labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7"],
    datasets: [{
        label: 'Users',
        data: [{{ $type0UsersLast7Days }}],
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
        fill: true // To fill the area under the line
    }]
};

var options0 = {
    scales: {
        y: {
            beginAtZero: true, // Start the y-axis from zero
            stepSize: 1, // Set step size to 1 to display whole numbers
            grid: {
                display: true // Display gridlines
            }
        }
    }
};

var type0UsersChart = new Chart(ctx0, {
    type: 'line',
    data: data0,
    options: options0
});



        var data1 = {
            labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7"],
            datasets: [{
                label: 'Creators',
                data: [{{ $type2UsersLast7Days }}],
                backgroundColor: 'rgba(255, 44, 187, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        var options1 = {
            scales: {
                y: {
                    beginAtZero: false,
                    suggestedMin: 1,
                    suggestedMax: 3,
                    stepSize: 1
                }
            }
        };

        var type2UsersChart = new Chart(ctx1, {
            type: 'line',
            data: data1,
            options: options1
        });

        var data2 = {
            labels: {!! json_encode($meetingDates) !!},
            datasets: [{
                label: 'Meetings Booked',
                data: {!! json_encode($meetingCounts) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        var options2 = {
            scales: {
                y: {
                    beginAtZero: false,
                    suggestedMin: 1,
                    suggestedMax: 3,
                    stepSize: 1
                }
            }
        };

        var meetingsChart = new Chart(ctx2, {
            type: 'line',
            data: data2,
            options: options2
        });

        var data3 = {
            labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7"],
            datasets: [{
                label: 'File Uploads',
                data: [{{ $fileUploadsLast7Days }}],
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }]
        };

        var options3 = {
            scales: {
                y: {
                    beginAtZero: false,
                    suggestedMin: 1,
                    suggestedMax: 3,
                    stepSize: 1
                }
            }
        };

        var fileUploadsChart = new Chart(ctx3, {
            type: 'line',
            data: data3,
            options: options3
        });
    </script>

</body>
</html>