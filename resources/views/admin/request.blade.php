<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">

    <link rel="stylesheet" href="sidebar.css">
    
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .feedback-container {
            max-width: 800px;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
        <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <title>SKillSwap|Request</title>
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
                        <a href="{{ route('dashboard') }}">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
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
                            <span class="text nav-text">Manage Resources</span>
                        </a>
                    </li>


                    <li class="nav-link">
                        <a href="{{ route('feedback.index') }}">
                            <i class='bx bx-comment-edit bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Requests</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="{{ route('send.message.form') }}">
                            <i class='bx bxs-report bx-rotate-90-alt icon'></i>
                            <span class="text nav-text">Send Report</span>
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
        <div class="text">

        <h1>Feedbacks</h1>

<div class="feedback-container">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->message }}</td>
                    <td>{{ $feedback->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
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

</body>
</html>