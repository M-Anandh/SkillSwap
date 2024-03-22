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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            font-family: fangsong;
    color: brown;
        }
        .home ul {
            list-style-type: none;
            padding: 0;
            margin: 20px auto;
            max-width: 600px;
        }
        .home li {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .home li strong {
            font-weight: bold;
            color: #683b26;
            font-family: serif;
            font-size:large;
        }
        .home li:nth-child(even) {
            background-color: #f9f9f9;
        }

        .delete1{
            margin: 10px 0px 0px 0px;
            background-color: red;
            border: 1px solid red;
            padding: 5px;
            color: white;
            border-radius: 5px;
        }

        .delete1:hover{
            cursor: pointer;
            background-color: darkred;

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
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('profile.show') }}">
                            <i class='bx bx-link bx-rotate-90-alt icon' ></i>
                            <span class="text nav-text">Manage Meet</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('user.myBookedMeetings') }}">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">My Booking</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('chatify') }}" target="_blank">
                            <i class='bx bx-conversation bx-rotate-90-alt icon' ></i>
                            <span class="text nav-text">Messages</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('upload-form') }}">
                            <i class='bx bx-file-find bx-rotate-90-alt icon' ></i>
                            <span class="text nav-text">Upload Resources</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('display.messages') }}" style="background-color: #695CFE; border-radius: 5px;">

                            <i class='bx bxs-report bx-rotate-90-alt icon' style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">My Reports</span>
                        </a>
                    </li>

                   
                    <li class="nav-link">
                        <a href="{{ route('creator.details') }}">

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
    <h1>MY REPORTS</h1>
    <ul>
    @foreach ($messages->sortByDesc('created_at') as $message)
        <li>
        <div class="message-content">
                <strong>From:</strong> Admin<br>
                <strong>Message:</strong> {{ $message->message }}
            </div>
            <form action="{{ route('message.delete', $message->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="delete1" type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>


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