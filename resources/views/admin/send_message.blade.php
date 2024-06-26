<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('web/styles/adminup.css')}}">

    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="ad.css">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <title>SKillSwap|ManageFiles</title>
    <style>
        /* Style for form container */
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Style for error messages */
        .error-message {
            color: #f00;
            margin-bottom: 10px;
        }

        /* Style for form fields */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .home h1 {
            text-align: center;
            margin-top: 20px;
            font-family: fangsong;
            color: brown;
        }

        .message-list {
            list-style-type: none;
            padding: 0;
        }

        .message-list li {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .bottom-content li a:hover{
            background-color: red; 
            border-radius: 5px;
        }

        .bottom-content i:hover{
            color: white;
        }

        .bottom-content span:hover{
            color: white;
        }

    </style>
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
                        <a href="{{ route('dashboard') }}">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('admin.creatorapproval') }}">
                            <i class='bx bx-user-check bx-rotate-90-alt icon'></i>
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
                            <i class='bx bx-pie-chart-alt icon'></i>
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

                    
                    <li class="nav-link" style="background-color: #695CFE; border-radius: 5px;">
                        <a href="{{ route('reports.create') }}" >

                            <i class='bx bxs-report bx-rotate-90-alt icon'style="color: white;" ></i>
                            <span class="text nav-text" style="color: white;">Send Reports</span>
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
                        document.getElementById('logout-link').addEventListener('click', function(event) {
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
        <h1 style="font-family: fangsong;">
            <center>SEND REPORTS</center>
        </h1>
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('reports.store') }}">
    @csrf
    <div class="form-group">
        <label for="user_id">Select User:</label>
        <select name="user_id" id="user_id" class="form-control">
            @foreach($typeTwoUsers as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="message">Report Message:</label>
        <textarea name="message" id="message" class="form-control" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Report</button>
</form>


   




        <script>
            document.getElementById('fileID').addEventListener('change', handleFileSelection);

            function triggerFileInput() {
                document.getElementById('fileID').click();
            }

            function handleFileSelection(e) {
                document.getElementById('fileName').innerText = e.target.files[0].name;
            }

            function uploadFile() {
                const form = document.getElementById('uploadForm');
                const progressBar = document.getElementById('uploadProgress');

                if (!isFormSubmitted()) {
                    const xhr = new XMLHttpRequest();

                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            const percentComplete = (e.loaded / e.total) * 100;
                            progressBar.value = percentComplete;
                        }
                    });

                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            alert('File uploaded successfully!');
                            resetForm();
                        } else {
                            alert('File upload failed. Please try again.');
                        }
                    };

                    xhr.onerror = function() {
                        alert('File upload failed. Please try again.');
                    };

                    xhr.open('POST', form.action, true);
                    xhr.setRequestHeader('X-CSRF-TOKEN', form.querySelector('input[name="_token"]').value);
                    const formData = new FormData(form);
                    xhr.send(formData);
                }
            }

            function isFormSubmitted() {
                const formSubmitted = document.getElementById('uploadForm').getAttribute('data-submitted');
                if (formSubmitted === 'true') {
                    return true;
                } else {
                    document.getElementById('uploadForm').setAttribute('data-submitted', 'true');
                    return false;
                }
            }

            function resetForm() {
                document.getElementById('uploadForm').reset();
                document.getElementById('fileName').innerText = '';
                document.getElementById('uploadForm').removeAttribute('data-submitted');
                document.getElementById('uploadProgress').value = 0;
            }
        </script>


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