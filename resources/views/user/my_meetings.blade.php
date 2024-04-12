<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">
    
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <style>
    h2 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        opacity: 0; /* Initially hidden */
        transition: opacity 1s ease; /* Smooth transition for opacity */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
        transition: background-color 0.3s ease; /* Smooth transition for background-color */
    }

    th {
        background-color: blue;
        color: #ffffff;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        color: #333;
    }

    input[type="text"],
    input[type="datetime-local"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .btn {
        cursor: pointer;
        padding: 10px 16px;
        font-size: 14px;
        border: none;
        border-radius: 4px;
    }

    .btn-success {
        background-color: #4caf50;
        color: white;
    }

    .btn-danger {
        background-color: #f44336;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #d6e8ed; 
    }
    tr:nth-child(odd) {
        background-color: #ffffff; 
    }
    tr:hover {
        background-color: #c0e4e5;
    }

    table.animate {
        opacity: 1;
    }
</style>

    <title>SKillSwap|HOME</title>
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
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('user.skills.index') }}">
                            <i class='bx bx-search icon' ></i>
                            <span class="text nav-text">Find Expert</span>
                        </a>
                    </li>

                    <li class="nav-link" style="background-color: #695CFE; border-radius: 5px;">
                        <a href="{{ route('user.meetings') }}">
                            <i class='bx bx-pie-chart-alt icon' style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">My Booking</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('chatify') }}" target="_blank">
                            <i class='bx bx-conversation bx-rotate-90-alt icon' ></i>
                            <span class="text nav-text">Messages</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('file-list.index') }}">
                            <i class='bx bx-file-find bx-rotate-90-alt icon' ></i>
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

                            <i class='bx bx-user-circle bx-rotate-90-alt icon' ></i>
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
    document.getElementById('logout-link').addEventListener('click', function (event) {
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
        <h2>My Meetings</h2>

<table class="table">
<thead>
    <tr>
        <th>Date and Time</th>
        <th>Booked Creator</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach($meetings as $meeting)
        <tr>
            <td>{{ $meeting->datetime }}</td>
            <td>{{ $meeting->bookedUser->name }}</td>
            <td>
                @if ($meeting->datetime >= now() && !$meeting->completed)
    <form method="post" action="{{ route('user.meeting.update', $meeting->id) }}" onsubmit="return validateMeetingDateTime(this)">
    @csrf
    <div class="form-group">
        <label class="form-label">New Date and Time</label>
        <input type="datetime-local" class="form-control" name="new_datetime" required>
    </div>
    <button type="submit" class="btn btn-success">Update Meeting</button>
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

                @if ($meeting->datetime >= now() && !$meeting->completed)

                <form method="post" action="{{ route('user.meeting.cancel', $meeting->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cancel Meeting</button>
                    </form>
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
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('table').classList.add('animate');
    });
</script>


</body>
</html>