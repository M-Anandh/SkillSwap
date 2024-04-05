<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset("web/styles/contactcs.css")}}">
  <link rel="stylesheet" href="{{ asset("web/styles/style.css")}}">
  <link rel="stylesheet" href="{{ asset("web/styles/navstyle.css")}}">
  <link rel="stylesheet" href="{{ asset("web/styles/foot.css")}}">
  <link rel="icon" type="image/x-icon" href="{{ asset("web/assets/logo1.jpg")}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Fontawesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
    <title>SKillSwap|Contact</title>

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
          <a href="{{ route('login') }}" class="dropbtn" id="glow">JOIN US</a>
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
      <h3>Get in Touch with Us</h3>
      <h2>contact us</h2>
      <div class="line">
        <div></div>
        <div></div>
        <div></div>
      </div>
      <!-- <p class = "text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda iste facilis quos impedit fuga nobis modi debitis laboriosam velit reiciendis quisquam alias corporis, maxime enim, optio ab dolorum sequi qui.</p> -->
    </div>


    <div class="contact-body">
      <div class="contact-info">
        <div>
          <span><i class="fas fa-mobile-alt"></i></span>
          <span>Phone No.</span>
          <span class="text">+91 7824964829</span>
        </div>
        <div>
          <span><i class="fas fa-envelope-open"></i></span>
          <span>E-mail</span>
          <span class="text">skillswap@info.com</span>
        </div>
        <div>
          <span><i class="fas fa-map-marker-alt"></i></span>
          <span>Address</span>
          <span class="text">ITPL Road

            Whitefield, Madurai,

            Tamil Nadu, PIN 625014,

            India</span>
        </div>
        <div>
          <span><i class="fas fa-clock"></i></span>
          <span>Opening Hours</span>
          <span class="text">Monday - Friday (24hrs)</span>
        </div>
      </div>

      <div class="contact-form">
        <form>
          <div>
            <input type="text" class="form-control" placeholder="First Name">
            <input type="text" class="form-control" placeholder="Last Name">
          </div>
          <div>
            <input type="email" class="form-control" placeholder="E-mail">
            <input type="text" class="form-control" placeholder="Phone">
          </div>
          <textarea rows="5" placeholder="Message" class="form-control"></textarea>
          <input type="submit" class="send-btn" value="send message">
        </form>

        <div>
          <img src="{{ asset("web/assets/contact-png.png")}}" alt="">
        </div>
      </div>
    </div>

    <div class="map">
      <!-- <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d223700.1490386933!2d-97.11558670486288!3d28.829485511234168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864266db2e2dac3b%3A0xeee20d566f63267d!2sVictoria%2C%20TX%2C%20USA!5e0!3m2!1sen!2snp!4v1604921178092!5m2!1sen!2snp"
        width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
        tabindex="0"></iframe> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125766.13086999334!2d78.04042126852059!3d9.917995902635546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00c582b1189633%3A0xdc955b7264f63933!2sMadurai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1712315703308!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

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

  </section>
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