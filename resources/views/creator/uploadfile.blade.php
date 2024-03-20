<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('web/styles/File.css')}}">

    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="File.css">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <title>SKillSwap|UploadFiles</title>
</head>

<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="assets/logo1.jpg" alt="">
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
                        <a href="{{ route('upload-form') }}" style="background-color: #695CFE; border-radius: 5px;">
                            <i class='bx bx-file-find bx-rotate-90-alt icon'style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">Upload Resource</span>
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
        <div class="text" style="padding: 0px;">
  
        <div class="upload-form">
        <h2>Uploads The File Here</h2>
        <form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data" onsubmit="uploadFile()">
            @csrf
            <label for="name">Title:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="name">Description</label>
            <input type="text" id="name" name="description" required>

            <label for="file">Choose a file:</label>
            <input type="file" id="file" name="file" accept=".pdf, .doc, .docx" required>

            <div class="progress-container">
                <div class="progress-bar" id="progressBar"></div>
            </div>

            <input type="submit" value="Upload File">
        </form>
    </div>

    <script>
        function uploadFile() {
            var progressBar = document.getElementById("progressBar");
            var width = 0;
            var interval = setInterval(function () {
                if (width >= 100) {
                    clearInterval(interval);
                } else {
                    width++;
                    progressBar.style.width = width + "%";
                }
            }, 20);
        }
    </script>
   @if (count($uploadedFiles) > 0)
    <ul style="list-style-type: none; padding: 0;">
        @foreach ($uploadedFiles as $file)
            <li style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px;">
                <strong>Name:</strong> {{ $file->original_name }}<br>
                <strong>Description:</strong> {{ $file->description }}<br>
                <form action="{{ route('delete.file', ['id' => $file->id]) }}" method="post" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" style="background-color: #dc3545; color: #fff; border: none; padding: 5px 10px; cursor: pointer; float: right;">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No uploaded files.</p>
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