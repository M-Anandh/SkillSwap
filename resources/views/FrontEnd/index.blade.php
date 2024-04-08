<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset("web/styles/style.css")}}">
  <link rel="icon" type="image/x-icon" href="{{ asset("web/assets/logo1.jpg")}}">
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Petrona&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="{{ asset("web/styles/navstyle.css")}}">
  <link rel="stylesheet" href="{{ asset("web/styles/acc.css")}}">
  <link rel="stylesheet" href="{{ asset("web/styles/foot.css")}}">
  <style>
    /* @import url('https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Petrona&family=Poppins&display=swap'); */
  </style>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SYlIlC0pL4/W8R+8F5SOW66AZFV5FfZdwEjhAi" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet"> -->
  <title>SKillSwap</title>
</head>

<body>
  <div id="preloader"></div>
  <nav class="navbar">
    <div class="brand-title">
      <a href="#"><img src="{{ asset("web/assets/logo.jpg")}}" alt="Logo"></a>
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
          <div class="dropdown-content">
            
            <a href="{{ route('login') }}" id="sub">User</a>
            <a href="{{ route('creator.login') }}" id="sub">Creator</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="main-container">
    <header class="header1">
      <div class="column">
        <div class="title">Chart Your Career, Exchange Skills, Unlock Potential!</div>
        <div class="button-wrapper">
          <a href="{{ route('logins') }}" class="join-button">JOIN US</a>
          <a href="/index/about" class="learn-more-button">Learn More</a>
        </div>
      </div>
      <div class="column-2">
        <div class="slider-container">
          <img src="{{ asset("web/assets/1.png")}}" class="image1" />
          <img src="{{ asset("web/assets/2.png")}}" class="image1" />
          <img src="{{ asset("web/assets/3.png")}}" class="image1" />
        </div>
    </header>
  </div>


  <!-- --------------------The Features section--------------------- -->


  <div class="title-features">
    <p><b>Why Choose us</b></p>
  </div>
  <div class="title-descr">
    <p>Personalized guidance, easy scheduling, secure communication, and<br>
      transparent reviews for unlocking your unique potential effortlessly.</p><br><br>
  </div>

  <div class="services">
    <div class="service-photo">
      <img src="{{ asset("web/assets/service1.jpg")}}" class="imgtholai">
    </div>
    <div class="service-des">
      <p><b>Personalized Consultations</b></p>
      <div class="service-desr">
        <p>Tailored guidance from experts <br> for your unique journey</p>
      </div>
      <div class="service-sub">
        <div class="serice-sub1">
          <p><b>Tailored Guidance</b></p>
          <p id="sir-1">Receive customized<br> advice on career development, skill enhancement, and<br> exam
            preparation.</p>
            <a href="{{ route('logins') }}" style="text-decoration: none;cursor: pointer;"><button class="join-button1">JOIN US</button></a>
        </div>
        <div class="service-sub2">
          <p><b>Expert Creators</b></p>
          <p id="sir-2">Connect with experienced creators offering specialized insights.</p>
          <!-- <button class="join-button1">JOIN US</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="services">
    <div class="service-des">
      <p><b>Effortless Scheduling</b></p>
      <div class="service-desr">
        <p>Easy scheduling for personalized<br> consultations.</p>
      </div>
      <div class="service-sub1">
        <div class="serice-sub1">
          <p><b>User-Friendly<br> Interface</b></p>
          <p id="sir-1">Easily browse and <br>select creators based <br>on expertise.</p>
          <a href="{{ route('logins') }}" style="text-decoration: none;cursor: pointer;"><button class="join-button1">JOIN US</button></a>
        </div>
        <div class="service-sub2">
          <p><b>Flexible Bookings</b></p>
          <br>
          <p id="sir-2">Schedule<br> consultations at your <br>convenience with just <br>a few clicks.</p>
          <!-- <button class="join-button1">JOIN US</button> -->
        </div>
      </div>
    </div>
    <div class="service-photo-2">
      <img src="{{ asset("web/assets/service2.jpg")}}" class="imgtholai">
    </div>
  </div>



  <div class="services">
    <div class="service-photo">
      <img src="{{ asset("web/assets/service3.jpg")}}" class="img2">
    </div>
    <div class="service-des1">
      <p class="s3"><b>Secure Communication</b></p>
      <div class="service-desr">
        <p>Secure messaging for confidential <br>communication</p>
      </div>
      <div class="service-sub">
        <div class="serice-sub1">
          <p><b>Private Messaging <br>System</b></p>
          <p id="sir-1">Receive customized <br>advice on career<br> development, skill<br> enhancement, and<br> exam
            preparation.</p>
            <a href="{{ route('logins') }}" style="text-decoration: none;cursor: pointer;"><button class="join-button1">JOIN US</button></a>
        </div>
        <div class="service-sub2">
          <p><b>File Sharing</b></p>
          <br>
          <p id="sir-2">Seamlessly exchange<br> files, links, and<br> information within<br> the platform.</p>
          <!-- <button class="join-button1">JOIN US</button> -->
        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- --------------------------------------------------------------------------------------- -->
  <div class="testi-title">
    <p><b>Listen To What Others Have<br>
        To Say About Us </b></p>
  </div>

  <div class="testi">
    <div class="main-con"></div>
    <div class="cont">
      <p>“SkillSwap revolutionized my <br>career journey with personalized<br> consultations,effortless,scheduing,<br>
        and secure communication. Highly<br> recommended!”</p>
      <p class="he"><b>Emily<br>
          CEO at InnovateX </b></p>
    </div>
    <div class="cont">
      <p>“SkillSwap made skill<br> enhancement easy. The platform's <br>effortless scheduling and secure<br> messaging
        fostered open<br> discussions about my goals!”</p>
      <p class="he"> <b>Mark
          <br>
          Founder of TechMinds</b></p>
    </div>
    <div class="cont">
      <p>“SkillSwap clarified my career path <br>through personalized consultations,<br> seamless scheduling, and secure
        <br>communication. A transformative<br> experience!”</p>
      <p class="he"> <b>Sarahy<br>
          Director at InsightHub</b></p>
    </div>
  </div>
  </div>


  <div class="get">
    <div class="ti">
      <p>Get Started Today</p>
    </div>
    <div class="ti-par">
      <p>Elevate your journey with SkillSwap, where personalized guidance, seamless<br> scheduling,
        and secure communication converge. Empower your career and <br>skills with
        a platform designed to unlock your unique potential effortlessly</p><br>
      <!-- <button class="ti-but">JOIN US</button> -->
      <a href="{{ route('logins') }}" style="text-decoration: none;cursor: pointer;"><button class="ti-but">JOIN US</button></a>

    </div>

  </div>

  <div class="faq">
    <p>FREQUENTLY ASKED QUESTIONS</p>
  </div>

  <div class="accordian">
    <div class="accordian-item">
      <div class="accordian-item-header">
        <h4>How does SkillSwap ensure the expertise of its creators?</h4>
      </div>
      <div class="accordian-item-body">
        <div class="accordian-item-body-content">
          <p>
          Creator Verification Process:<br>
            <li>Admin team verifies creator credentials and expertise.</li>
            <li>LinkedIn profiles are checked for professional validation.</li>
            <li>Approval from the admin team is required for login access.</li>
            <li>Only verified creators can access the platform's features post-approval.</li>
          </p>
        </div>
      </div>
    </div>

    <div class="accordian-item">
      <div class="accordian-item-header">
        <h4>How can I schedule a consultation with a creator on SkillSwap ?</h4>
      </div>
      <div class="accordian-item-body">
        <div class="accordian-item-body-content">
          <p>
          Scheduling a consultation with a creator on SkillSwap is effortless.
           Simply browse through the list of experienced creators based on your desired expertise. 
           Once you've found the right match, select a convenient time slot from their availability. 
           Complete the booking process, and you're all set for your personalized consultation session.
          </p>
        </div>
      </div>
    </div>
    <div class="accordian-item">
      <div class="accordian-item-header">
        <h4>How does SkillSwap ensure the privacy of user information during messaging?</h4>
      </div>
      <div class="accordian-item-body">
        <div class="accordian-item-body-content">
          <p>
          SkillSwap ensures user privacy during messaging through robust encryption methods, safeguarding communication from unauthorized access. Secure communication channels further protect user information, enhancing confidentiality. Strict data protection policies are in place to prevent unauthorized disclosure or misuse of user data. Users also have control over their messaging settings, allowing them to manage privacy preferences and control communication access.
          </p>
        </div>
      </div>
    </div>
    

    <div class="accordian-item">
      <div class="accordian-item-header">
        <h4>Can I change my consultation booking time after it's been confirmed?</h4>
      </div>
      <div class="accordian-item-body">
        <div class="accordian-item-body-content">
          <p>
            Rescheduling Consultation Booking Time by Following these steps:<br>
            <li>Yes, you can modify your consultation booking time if needed.</li>
            <li>Log in to your SkillSwap account.</li>
            <li>Access your booking details from your dashboard or booking history.</li>
            <li>Choose the option to reschedule the appointment to a more convenient time.</li>
          </p>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>

  
<!-- -------------------------------FOOTER-------------------------------------------------------- -->
<footer>
  <div class="row">
      <div class="col">
          <!-- <img src="assets/logo1remove.png" class="logo">
          <p>At SkillSwap, we connect you with expert creators for personalized guidance in career,
               skills, and exams. Committed to transparency and security, SkillSwap is your partner in unlocking unique potential.
                Join us for a journey of tailored excellence.</p> -->
          <h3>SkillSwap <div class="under" style="text-align: justify;"><span></span></div></h3>
          <p style="font-size: 15px">At SkillSwap, we connect you with expert creators for personalized guidance in career,
              skills, and exams. Committed to transparency and security, SkillSwap is your partner in unlocking unique potential.
               Join us for a journey of tailored excellence</p>
      </div>
      <div class="col"style="margin-left:100px;">
          <h3>Office <div class="under"><span></span></div></h3>
          <p>ITPL Road</p>
          <p>Whitefield, Madurai,</p>
          <p>Tamil Nadu, PIN 625014,</p>
          <p>India</p>
          <p class="email-id">anandhm0202@gmail.com</p>
          <p>+91 -7824964829</p>
      </div>
      <div class="col"style="margin-left:90px;">
          <h3>Links <div class="under"><span></span></div></h3>
          <ul>
              <li><a href="/">Home</a></li>
              <li><a href="/index/service">Services</a></li>
              <li><a href="/index/contact">Contact</a></li>
              <li><a href="/index/about">About</a></li>
          </ul>
      </div>
      <div class="col">
          <h3>Let's Connect <div class="under"><span></span></div></h3>
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















  <script src="{{ asset("web/styles/script2.js")}}"></script>

  <script>
    const toggleButton = document.getElementsByClassName('toggle-button')[0]
    const navbarLinks = document.getElementsByClassName('navbar-links')[0]

    toggleButton.addEventListener('click', () => {
      navbarLinks.classList.toggle('active')
    })
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const sliderContainer = document.querySelector('.slider-container');
      const images = document.querySelectorAll('.image1');

      let currentIndex = 0;

      function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        updateSlider();
      }

      function updateSlider() {
        const translateValue = -currentIndex * 100 + '%';
        sliderContainer.style.transform = 'translateX(' + translateValue + ')';
      }

      setInterval(nextImage, 10000);
      sliderContainer.addEventListener('mouseenter', () => clearInterval(intervalId));
      sliderContainer.addEventListener('mouseleave', () => {
        intervalId = setInterval(nextImage, 10000);
      });

      updateSlider();
      images.forEach((image) => {
        image.addEventListener('load', () => {
          image.style.animation = 'fadeIn 0.5s ease-in-out, scaleIn 0.5s ease-in-out, desaturateIn 0.5s ease-in-out';
        });
      });
    });

  </script>

<script>
  var loader=document.getElementById("preloader");
  window.addEventListener("load", function(){
    loader.style.display="none";
  })
</script>
</body>

</html>