<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    
    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">
    <!-- <link rel="stylesheet" href="{{ asset('web/styles/announce.css')}}"> -->


    <link rel="stylesheet" href="sidebar.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .announcement {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .announcement h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .announcement p {
            color: #555;
        }

        .delete-btn {
            color: #fff;
            background-color: #d9534f;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }

        .delete-btn:hover {
            background-color: #c9302c;
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
                        <a href="/admin/announce">
                            <i class='bx bx-notification bx-rotate-90-alt icon' style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">Notfiy</span>
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
        <div class="text">
        <h2>Add Announcement</h2>
    <form method="post" action="">
    @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="content">Content:</label>
        <textarea name="content" required></textarea><br>

        <input type="submit" value="Add Announcement">
    </form>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skillchat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling addition of announcements
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "INSERT INTO announcements (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Announcement added successfully.')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handling deletion of announcements
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $sql = "DELETE FROM announcements WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Announcement deleted successfully.')</script>";
    } else {
        echo "Error deleting announcement: " . $conn->error;
    }
}

// Displaying announcements
$sql = "SELECT * FROM announcements WHERE expires_at > NOW() ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>{$row['title']}</h2>";
        echo "<p>{$row['content']}</p>";
        echo "<p><small>Expires on: {$row['expires_at']}</small></p>";

        // Display delete button if not expired
        if (strtotime($row['expires_at']) > time()) {
            echo "<a href='?delete={$row['id']}'>Delete</a>";
        }

        echo "</div>";
        echo "<hr>";
    }
} else {
    echo "No announcements.";
}

$conn->close();
?>

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