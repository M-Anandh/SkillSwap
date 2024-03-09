<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->

    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('web/styles/adminup.css')}}">

    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="ad.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <title>SKillSwap|ManageFiles</title>
    <!--<title>Dashboard Sidebar Menu</title>-->
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
                        <a href="/admin/announce">
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

                    <!-- Include the CSRF token in a hidden form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>

                <!-- <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li> -->

            </div>
        </div>

    </nav>

    <section class="home">
        <!-- <div class="text" style="padding: 0px;"> -->
            <div class="container">
                

                <!-- resources/views/admin/showfiles.blade.php -->

                <table border='1'>
                    <tr>
                        <th>Name</th>
                        <th>Download</th>
                        <th>Delete</th>
                    </tr>
                    @forelse ($files as $file)
                    <tr>
                        <td>{{ $file->original_name }}</td>
                        <td><a href="{{ route('admin.download', ['id' => $file->id]) }}" target="_blank">Download</a></td>
                        <td>
                            <form method="post" action="{{ route('admin.delete', ['id' => $file->id]) }}">
                                @csrf
                                @method('delete')
                                <button class="delete-btn" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No files uploaded yet.</td>
                    </tr>
                    @endforelse
                </table>


            </div>

            <script>
                document.getElementById('fileID').addEventListener('change', handleFileSelection);

                function triggerFileInput() {
                    document.getElementById('fileID').click();
                }

                // Function to handle file selection
                function handleFileSelection(e) {
                    document.getElementById('fileName').innerText = e.target.files[0].name;
                }

                // Function to handle file upload
                function uploadFile() {
                    const form = document.getElementById('uploadForm');
                    const progressBar = document.getElementById('uploadProgress');

                    // Prevent double form submission
                    if (!isFormSubmitted()) {
                        const xhr = new XMLHttpRequest();

                        // Track upload progress
                        xhr.upload.addEventListener('progress', function(e) {
                            if (e.lengthComputable) {
                                const percentComplete = (e.loaded / e.total) * 100;
                                progressBar.value = percentComplete;
                            }
                        });

                        // Handle successful upload
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                alert('File uploaded successfully!');
                                resetForm();
                            } else {
                                alert('File upload failed. Please try again.');
                            }
                        };

                        // Handle upload errors
                        xhr.onerror = function() {
                            alert('File upload failed. Please try again.');
                        };

                        // Submit the form asynchronously
                        xhr.open('POST', form.action, true);
                        xhr.setRequestHeader('X-CSRF-TOKEN', form.querySelector('input[name="_token"]').value);
                        const formData = new FormData(form);
                        xhr.send(formData);
                    }
                }

                // Function to check if form is already submitted
                function isFormSubmitted() {
                    const formSubmitted = document.getElementById('uploadForm').getAttribute('data-submitted');
                    if (formSubmitted === 'true') {
                        return true;
                    } else {
                        document.getElementById('uploadForm').setAttribute('data-submitted', 'true');
                        return false;
                    }
                }

                // Function to reset the form after successful upload
                function resetForm() {
                    document.getElementById('uploadForm').reset();
                    document.getElementById('fileName').innerText = '';
                    document.getElementById('uploadForm').removeAttribute('data-submitted');
                    document.getElementById('uploadProgress').value = 0;
                }
            </script>



        <!-- </div> -->
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