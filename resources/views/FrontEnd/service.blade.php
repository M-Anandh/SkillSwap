<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("web/styles/style.css")}}">
    <link rel="stylesheet" href="{{ asset("web/styles/navstyle.css")}}">
     <link rel="stylesheet" href="{{ asset("web/styles/foot.css")}}">
     <link rel="stylesheet" href="{{ asset("web/styles/service.css")}}">
    <link rel="icon" type="image/x-icon" href="{{ asset("web/assets/logo1.jpg")}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
      <title>SKillSwap|Service</title>

</head>
<body>
  <div id="preloader"></div>
    <nav class="navbar">
        <div class="brand-title">
          <a href="#"><img src="{{ asset('web/assets/logo.jpg')}}"></a>
        </div>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/index/service">Services</a></li>
            <li><a href="/index/about">About</a></li>
            <li><a href="/index/contact">Contact</a></li>
            <li class="dropdown">
              <a href="{{ route('logins') }}" class="dropbtn" id="glow">JOIN US</a>
              <!-- <div class="dropdown-content">
                <a href="#" id="sub">Login</a>
                <a href="#" id="sub">Register</a>
              </div> -->
            </li>
          </ul>
        </div>
      </nav>

      <section class="contact-section">
        <div class="contact-bg">
          <h3></h3>
          <h2>SERVICES</h2>
          <div class="line">
            <div></div>
            <div></div>
            <div></div>
          </div>
          <!-- <p class = "text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda iste facilis quos impedit fuga nobis modi debitis laboriosam velit reiciendis quisquam alias corporis, maxime enim, optio ab dolorum sequi qui.</p> -->
        </div>

        <br>
        <br>



    <!-- -------------------------------main-------------------------------------------------------- -->


    <div class="contain1" style="@import url('https://fonts.googleapis.com/css2?family=Inter:wght@500;800&family=Petrona&family=Poppins&display=swap');">
      <div class="containcontent">
        <h3 class="containtitle">1:1 Mentoring</h3>
        <p><b class="sem">Unlock Personalized Guidance:</b> Connect with <br>experienced creators for individualized <br> consultations in career development,
           skill <br>enhancement, and exam preparation. Gain <br>exclusive insights tailored to your unique journey.</p>
           <a href="{{ route('logins') }}" style="text-decoration: none;cursor: pointer;"><button class="join-button1">JOIN US</button></a>
      </div>
      <div class="contaiimg">
        <img src="{{ asset("web/assets/F1.jpg")}}">
      </div>
    </div><br><br>

    <div class="contain1" style="@import url('https://fonts.googleapis.com/css2?family=Inter:wght@500;800&family=Petrona&family=Poppins&display=swap');">
      <div class="containcontent">
        <h3 class="containtitle">Free Personalized Roadmap</h3>
        <p><b class="sem">Chart Your Path to Success:</b> Receive a <br>complimentary roadmap tailored to your goals,<br> providing a strategic plan for your personal and <br>professional journey. Navigate your future with<br> confidence.
        </p>
        <a href="{{ route('logins') }}" style="text-decoration: none;cursor: pointer;"><button class="join-button1">JOIN US</button></a>
      </div>
      <div class="contaiimg">
        <img src="{{ asset("web/assets/F2.jpg")}}">
      </div>
    </div><br><br>


    <div class="contain1" style="@import url('https://fonts.googleapis.com/css2?family=Inter:wght@500;800&family=Petrona&family=Poppins&display=swap');">
      <div class="containcontent">
        <h3 class="containtitle">Goal-Oriented Action Plans</h3>
        <p><b class="sem">Strategic Goal Setting:</b> Collaborate with creators to <br>develop actionable plans aligned with your<br> objectives, ensuring tangible progress in your<br> chosen path. Transform aspirations into achievable <br>milestones.
        </p>
        <a href="{{ route('logins') }}" style="text-decoration: none;cursor: pointer;"><button class="join-button1">JOIN US</button></a>
      </div>
      <div class="contaiimg">
        <img src="{{ asset("web/assets/F3.jpg")}}">
      </div>
    </div><br><br>

    <div class="contain1" style="@import url('https://fonts.googleapis.com/css2?family=Inter:wght@500;800&family=Petrona&family=Poppins&display=swap');">
      <div class="containcontent">
        <h3 class="containtitle">SmartLearn</h3>
        <p><b class="sem">Continuous Learning Resources:</b>
          Access a library <br>of educational materials, courses, and tutorials to <br>support ongoing skill development and knowledge<br> enhancement. Fuel your learning journey with a<br> wealth of resources at the SmartLearn Hub.
        </p>
        <a href="{{ route('logins') }}" style="text-decoration: none;cursor: pointer;"><button class="join-button1">JOIN US</button></a>
      </div>
      <div class="contaiimg">
        <img src="https://cdn.pixabay.com/photo/2017/09/27/06/28/book-2791117_640.jpg">
      </div>
    </div><br><br>

      <footer>
        <div class="row">
            <div class="col">
                <!-- <img src="assets/logo1remove.png" class="logo">
                <p>At SkillSwap, we connect you with expert creators for personalized guidance in career,
                     skills, and exams. Committed to transparency and security, SkillSwap is your partner in unlocking unique potential.
                      Join us for a journey of tailored excellence.</p> -->
                <h3>SkillSwap <div class="under" style="text-align: justify;margin-top:0px;"><span></span></div></h3>
                <p style="font-size: 15px">At SkillSwap, we connect you with expert creators for personalized guidance in career,
                    skills, and exams. Committed to transparency and security, SkillSwap is your partner in unlocking unique potential.
                     Join us for a journey of tailored excellence</p>
            </div>
            <div class="col"style="margin-left:100px;">
                <h3>Office <div class="under"style=margin-top:0px;><span></span></div></h3>
                <p>ITPL Road</p>
                <p>Whitefield, Madurai,</p>
                <p>Tamil Nadu, PIN 625014,</p>
                <p>India</p>
                <p class="email-id">anandhm0202@gmail.com</p>
                <p>+91 -7824964829</p>
            </div>
            <div class="col"style="margin-left:90px;">
                <h3>Links <div class="under"style=margin-top:0px;><span></span></div></h3>
                <ul>
                <li><a href="/">Home</a></li>
              <li><a href="/index/service">Services</a></li>
              <li><a href="/index/contact">Contact</a></li>
              <li><a href="/index/about">About</a></li>
                </ul>
            </div>
            <div class="col">
                <h3>Let's Connect <div class="under"style="margin-top:0px;"><span></span></div></h3><br>
                <div class="social-icons">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                </div>
            </div>
        </div>
        <hr>
        <p class="copyright">SkillSwap © 2024 - All rights reserved.</p>
      </footer>
      
    <script src="script2.js"></script>

    <script>
        const toggleButton = document.getElementsByClassName('toggle-button')[0]
        const navbarLinks = document.getElementsByClassName('navbar-links')[0]
    
        toggleButton.addEventListener('click', () => {
          navbarLinks.classList.toggle('active')
        })
      </script>
<script>
  var loader=document.getElementById("preloader");
  window.addEventListener("load", function(){
    loader.style.display="none";
  })
</script>





</body>
</html>