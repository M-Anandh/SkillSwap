<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('web/styles/style.css')}}">
  <link rel="stylesheet" href="{{ asset('web/styles/navstyle.css')}}">
  <link rel="stylesheet" href="{{ asset('web/styles/foot.css')}}">
  <link rel="stylesheet" href="{{ asset('web/styles/about.css')}}">
  <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SKillSwap|About</title>

</head>

<body>
  <div id="preloader"></div>
  <nav class="navbar">
    <div class="brand-title">
      <a href="#"><img src="{{ asset('web/assets/logo.jpg')}}" alt="Logo"></a>
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
          <a href="#" class="dropbtn" id="glow">JOIN US</a>
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
      <h2>ABOUT</h2>
      <div class="line">
        <div></div>
        <div></div>
        <div></div>
      </div>
      <!-- <p class = "text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda iste facilis quos impedit fuga nobis modi debitis laboriosam velit reiciendis quisquam alias corporis, maxime enim, optio ab dolorum sequi qui.</p> -->
    </div>

    <br>
    <br>


    <div class="tit">
      <h3>Our Story</h3>
    </div>

    <div class="tit-des">
      <p>SkillSwap: Empowering Journeys, Unlocking Potential – Your Story of Personalized Excellence.</p>
    </div>

    <div class="tit-img">
      <img src="{{ asset('web/assets/about1.jpg')}}" style="height: 500px; width: 900px;">
    </div>

    <div class="tit-desc">
      <p>At SkillSwap, our story is one of empowerment and growth. Founded with the vision of creating a platform that
        transcends<br>traditional learning,
        we connect individuals with experienced creators for personalized guidance in career development,
        skill <br>enhancement, and exam preparation. Through 1:1 mentoring, free personalized roadmaps,
        and expert-led skill enhancement,<br> SkillSwap is dedicated to unlocking unique potential.
        Join our community and let SkillSwap be your partner in personalized <br>excellence.</p>
    </div>

    <div class="mission">
      <h3>Our Mission ,Vision and Values</h3>
    </div>

    <div class="misvis">
      <div class="m1">
        <img
          src="https://images.pexels.com/photos/207700/pexels-photo-207700.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2">
        <p><strong>Our Mision</strong> is to empower <br>individuals on their unique <br> journeys by providing<br>
          personalized
          guidance in<br> career development, skill<br> enhancement, and exam <br>preparation.</p>
      </div>

      <div class="m1">
        <img
          src="https://images.pexels.com/photos/249220/pexels-photo-249220.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2">
        <p><strong>Our Vision</strong> is to create a <br>transformative learning <br> platform that fosters
          <br>continuous growth,<br> connecting users with <br>experienced creators
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br> and unlocking their full<br>
          potential.
        </p>
      </div>

      <div class="m1">
        <img
          src="https://images.pexels.com/photos/7096/people-woman-coffee-meeting.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2">
        <p><strong>Our Values</strong> revolve around <br>transparency, trust, and <br>collaboration, ensuring a<br>
          platform where individuals <br>thrive on their journey<br> towards excellence with <br>confidence.</p>
      </div>

      <br><br>
    </div>

    <div class="Team"
      style="display: flex; justify-content: center; padding: 20px; font-size:20px; font-family: 'Poppins', sans-serif;">
      <h3>Our Team</h3>
    </div>

    <div class="teamimg">
      <div class="teamr1">
        <img src="{{ asset("web/team/pexels-ali-madad-sakhirani-997489.jpg")}}">
        <p class="na">Dines</p>
        <p class="role">Technology</p>
      </div>
      <div class="teamr1">
        <img src="{{ asset("web/team/pexels-chloe-1043471.jpg")}}">
        <p class="na">Sundar</p>
        <p class="role">Product</p>
      </div>
      <div class="teamr1">
        <img src="{{ asset("web/team/pexels-italo-melo-2379004.jpg")}}">
        <p class="na">Robert Fox</p>
        <p class="role">Strategy</p>
      </div>
      <div class="teamr1">
        <img src="{{ asset("web/team/pexels-linkedin-sales-navigator-2182970.jpg")}}">
        <p class="na">Jane copper</p>
        <p class="role">Data</p>
      </div>
    </div>
    <div class="teamimg">
      <div class="teamr1">
        <img src="{{ asset("web/team/pexels-nitin-khajotia-1486064.jpg")}}">
        <p class="na">Jaceob Jones</p>
        <p class="role">Technology</p>
      </div>
      <div class="teamr1">
        <img src="{{ asset("web/team/pexels-nitin-khajotia-1516680.jpg")}}">
        <p class="na">Hitesh</p>
        <p class="role">QA</p>
      </div>
      <div class="teamr1">
        <img src="{{ asset("web/team/pexels-simon-robben-614810.jpg")}}">
        <p class="na">Robert Fox</p>
        <p class="role">Technology</p>
      </div>
      <div class="teamr1">
        <img src="{{ asset("web/team/pexels-joelson-melo-50855.jpg")}}">
        <p class="na">Jane copper</p>
        <p class="role">Technology</p>
      </div>
    </div>

    <br><br><br>

    <footer>
      <div class="row">
        <div class="col">
          <!-- <img src="assets/logo1remove.png" class="logo">
              <p>At SkillSwap, we connect you with expert creators for personalized guidance in career,
                   skills, and exams. Committed to transparency and security, SkillSwap is your partner in unlocking unique potential.
                    Join us for a journey of tailored excellence.</p> -->
          <h3>SkillSwap <div class="under" style="text-align: justify;margin-top:0px;"><span></span></div>
          </h3>
          <p style="font-size: 15px">At SkillSwap, we connect you with expert creators for personalized guidance in
            career,
            skills, and exams. Committed to transparency and security, SkillSwap is your partner in unlocking unique
            potential.
            Join us for a journey of tailored excellence</p>
        </div>
        <div class="col" style="margin-left:100px;">
          <h3>Office <div class="under" style=margin-top:0px;><span></span></div>
          </h3>
          <p>ITPL Road</p>
          <p>Whitefield, Madurai,</p>
          <p>Tamil Nadu, PIN 625014,</p>
          <p>India</p>
          <p class="email-id">anandhm0202@gmail.com</p>
          <p>+91 -7824964829</p>
        </div>
        <div class="col" style="margin-left:90px;">
          <h3>Links <div class="under" style=margin-top:0px;><span></span></div>
          </h3>
          <ul>
              <li><a href="/">Home</a></li>
              <li><a href="/index/service">Services</a></li>
              <li><a href="/index/about">Contact</a></li>
              <li><a href="/index/contact">About</a></li>
          </ul>
        </div>
        <div class="col">
          <h3>Let's Connect <div class="under" style="margin-top:0px;"><span></span></div>
          </h3><br>
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

    <script src="{{ asset("web/script2.js")}}"></script>

    <script>
      const toggleButton = document.getElementsByClassName('toggle-button')[0]
      const navbarLinks = document.getElementsByClassName('navbar-links')[0]

      toggleButton.addEventListener('click', () => {
        navbarLinks.classList.toggle('active')
      })
    </script>

    <script>
      var loader = document.getElementById("preloader");
      window.addEventListener("load", function () {
        loader.style.display = "none";
      })
    </script>
</body>

</html>