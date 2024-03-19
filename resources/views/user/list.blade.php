<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="{{ asset('web/styles/sidebar.css')}}">
    
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td a {
            text-decoration: none;
            color: #007BFF;
        }

        td a:hover {
            text-decoration: underline;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/logo1.jpg')}}">
    <title>SKillSwap|DownloadFiles</title>
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

                    <li class="nav-link">
                        <a href="{{ route('user.meetings') }}">
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
                        <a href="{{ route('file-list.index') }}"  style="background-color: #695CFE; border-radius: 5px;">
                            <i class='bx bx-file-find bx-rotate-90-alt icon' style="color: white;"></i>
                            <span class="text nav-text" style="color: white;">Resources</span>
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
    @if(count($files) > 0)
    <div>
        @foreach($files->sortBy('original_name') as $file)
            <div style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px;">
                <p style="margin: 0; padding-bottom: 5px; font-weight: bold;">File Name: {{ $file->original_name }}</p>
                <p style="margin: 0; padding-bottom: 10px;">Description: {{ $file->description }}</p>
                <div class="download-container">
                <a href="{{ route('files.download', ['id' => $file->id]) }}"><button class="button">
                        <svg class="circle" viewBox="0 0 76 76" >
                            <circle class="default" cx="38" cy="38" r="36"></circle>
                            <circle class="active" cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="icon">
                            <svg class="line" viewBox="0 0 4 37">
                                <line x1="2" y1="2" x2="2" y2="35"></line>
                            </svg>
                            <div>
                                <svg class="arrow" viewBox="0 0 40 32"></svg>
                                <svg class="progress" viewBox="0 0 444 10">
                                    <path
                                        d="M2,5 L42,5 C60.0089086,6.33131695 73.3422419,6.99798362 82,
                                        7 C87.572404,7.00129781 91.0932494,1.72677301 102,1.99944178 C112.906751,
                                        2.27211054 112.000464,7.99986045 122,8 C131.999536,8.00013955 132,2 142,
                                        2 C152,2 152,8 162,8 C172,8 172,2 182,2 C192,2 192,8 202,8 C212,8 212,2 222,
                                        2 C232,2 232,8 242,8 C252,8 252,2 262,2 C272,2 272,8 282,8 C292,8 292,2 302,
                                        2 C312,2 312,8 322,8 C332,8 332,2 342,2 C352,2 351.897852,7.49489262 362,
                                        8 C372.102148,8.50510738 378.620177,5.22532154 402,5 L442,5">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <span id="progressText">0%</span>
                    </button></a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p style="margin: 0;">No files found.</p>
@endif

<style>
    .button {
    --default: #cacdcd;
    --active: #00fffc;
    position: relative;
    border: none;
    outline: none;
    background: none;
    padding: 0;
    -webkit-appearance: none;
    -webkit-tap-highlight-color: transparent;
    cursor: pointer;
    transform: scale(var(--s, 1));
    transition: transform 0.2s;
  }
  .button:active {
    --s: .96;
  }
  .button svg {
    display: block;
    fill: none;
    stroke-width: var(--sw, 3px);
    stroke-linecap: round;
    stroke-linejoin: round;
  }
  .button .circle {
    width: 76px;
    height: 76px;
    transform: rotate(-90deg);
  }
  
  .button .circle circle.default {
    stroke: var(--default);
  }
  .button .circle circle.active {
    stroke: var(--active);
    stroke-dasharray: 227px;
    stroke-dashoffset: var(--active-offset, 227px);
    transition: stroke-dashoffset var(--all-transition, 4s) 
    ease var(--all-delay, 0.8s);
  }

  .button span {
    display: block; position: absolute;
    left: 0; right: 0;
    text-align: center; font-size: 10px;
    bottom: 13px; font-weight: 500;
    color: var(--active);
    opacity: var(--count-opacity, 0);
    transform: translateY(var(--count-y, 4px));
    -webkit-animation: var(--count, none) 0.3s ease forwards 
    var(--all-delay, 4.6s);
            animation: var(--count, none) 0.3s ease forwards 
            var(--all-delay, 4.6s);
    transition: opacity 0.2s ease 0.6s, transform 0.3s ease 0.6s;
  }
  .button .icon {
    --sw: 2px; width: 24px;
    height: 40px; position: absolute;
    left: 50%; top: 50%;
    margin: -20px 0 0 -12px;
  }
  
  
  .button .icon svg.line {
    width: 4px; height: 37px; stroke: var(--active);
    position: absolute; left: 10px; top: 0;
    stroke-dasharray: 0 33px var(--line-array, 33px) 66px;
    stroke-dashoffset: var(--line-offset, 33px);
    transform: translateY(var(--line-y, 0));
    opacity: var(--line-opacity, 1);
    transition: stroke-dasharray 0.2s, stroke-dashoffset 0.2s, 
    transform 0.32s ease var(--all-delay, 0.25s);
  }
  .button .icon div {
    width: 40px; height: 32px;
    position: absolute; overflow: hidden;
    left: 50%; bottom: 1px; margin-left: -20px;
    transform: translate(var(--icon-x, 0), var(--icon-y, 0));
    transition: transform 0.3s ease var(--all-delay, 4.8s);
    -webkit-animation: var(--overflow, none) 0s linear forwards 
    var(--all-delay, 4.8s);
            animation: var(--overflow, none) 0s linear forwards 
            var(--all-delay, 4.8s);
  }

  .button .icon div:before, .button .icon div:after {
    content: ""; position: absolute; z-index: 1;
    height: 2px; left: var(--l, 0); top: 15px;
    width: var(--w, 16px); background: var(--active);
    border-radius: 1px; transform-origin: var(--tx, 15px) 1px;
    transform: rotate(var(--before-rotate, 0deg)); opacity: 
    var(--tick-opacity, 0);
    transition: transform 0.4s ease var(--all-delay, 4.8s), 
    opacity 0s linear var(--all-delay, 4.8s);
  }
  .button .icon div:after {
    --l: 14px; --w: 26px; --tx: 1px;
    transform: rotate(var(--after-rotate, 0deg));
  }
  .button .icon div svg {
    stroke: var(--active);
  }

  .button .icon div svg.arrow {
    width: 40px; height: 32px; opacity: var(--arrow-opacity, 1);
    transition: opacity 0s linear var(--all-delay, 1s);
  }
  .button .icon div svg.progress {
    width: 444px; height: 10px; position: absolute;
    left: 0; top: 11px;
    transform: translateX(var(--progress-x, 0));
    opacity: var(--progress-opacity, 0);
    transition: transform var(--all-transition, 4.4s) ease var(--all-delay, 0.4s),
     opacity 0s linear var(--all-delay, 1s);
    -webkit-animation: var(--hide, none) 0s linear forwards var(--all-delay, 4.8s);
            animation: var(--hide, none) 0s linear forwards var(--all-delay, 4.8s);
  }


  .button.loading:not(.reset) {
    --line-y: -36px; --line-array: 0; --line-offset: 15px;
    --active-offset: 0; --arrow-opacity: 0; --progress-opacity: 1;
    --progress-x: -400px; --tick-opacity: 1; --before-rotate: 47deg;
    --after-rotate: -46deg; --hide: hide; --overflow: overflow;
    --icon-x: 2px; --icon-y: 7px; --count-opacity: 1;
    --count-y: 0; --count: count;
  }
  .button.reset {
    --all-delay: 0s; --all-transition: .3s;
  }
  
  @-webkit-keyframes hide {
    to { opacity: 0; }
  }
  @keyframes hide {
    to { opacity: 0; }
  }


  @-webkit-keyframes count {
    to { transform: translateY(4px); opacity: 0; }
  }
  @keyframes count {
    to { transform: translateY(4px); opacity: 0; }
  }
  @-webkit-keyframes overflow {
    to { overflow: visible; }
  }
  @keyframes overflow {
    to { overflow: visible; }
  }
  html {
    box-sizing: border-box; -webkit-font-smoothing: antialiased;
  } 
  * { box-sizing: inherit; } *:before, *:after { box-sizing: inherit; }
  body {
    min-height: 100vh; font-family: "Inter", "Inter UI", Arial;
    display: flex; justify-content: center; align-items: center;
    background: #000000;font-family: "Roboto", Arial, sans-serif;
  }
</style>

<script>
    const $ = (s, o = document) => o.querySelector(s);
const $$ = (s, o = document) => o.querySelectorAll(s);
$$('.button').forEach(button => {
    let count = { number: 0 },
        icon = $('.icon', button),
        iconDiv = $('.icon > div', button),
        arrow = $('.icon .arrow', button),
        countElem = $('span', button),
        svgPath = new Proxy({
            y: null, s: null, f: null, l: null
        }, {
            set(target, key, value) {
                target[key] = value;
                if (target.y !== null && target.s 
                    != null && target.f != null && target.l != null) {
                    arrow.innerHTML = getPath(target.y, 
                        target.f, target.l, target.s, null);
                } return true;
            },
            get(target, key) { return target[key]; }
        });

    svgPath.y = 30; svgPath.s = 0; svgPath.f = 8; svgPath.l = 32;
    button.addEventListener('click', e => {
        if (!button.classList.contains('loading')) {
            if (!button.classList.contains('animation')) {
                button.classList.add('loading', 'animation');
                gsap.to(svgPath, {
                    f: 2, l: 38, duration: .3, delay: .15
                });
                gsap.to(svgPath, {
                    s: .2, y: 16, duration: .8, delay: .15,
                    ease: Elastic.easeOut.config(1, .4)
                });
                gsap.to(count, {
                    number: '100', duration: 3.8, delay: .8,
                    onUpdate() {
                        countElem.innerHTML = Math.round(count.number) + '%';
                    }
                });

                setTimeout(() => {
                    iconDiv.style.setProperty('overflow', 'visible');
                    setTimeout(() => {
                        button.classList.remove('animation');
                    }, 600);
                }, 4820);
            }
        } else {
            if (!button.classList.contains('animation')) {
                button.classList.add('reset');
                gsap.to(svgPath, {
                    f: 8, l: 32, duration: .4
                });
                gsap.to(svgPath, {
                    s: 0, y: 30, duration: .4
                });

                setTimeout(() => {
                    button.classList.remove('loading', 'reset');
                    iconDiv.removeAttribute('style');
                }, 400);
            }
        }
        e.preventDefault();
    });
});
function getPoint(point, i, a, smoothing) {
    let cp = (current, previous, next, reverse) => {
        let p = previous || current,
            n = next || current, o = {
                length: Math.sqrt(Math.pow(n[0] - p[0], 2) + Math.pow(n[1] - p[1], 2)),
                angle: Math.atan2(n[1] - p[1], n[0] - p[0])
            },
            angle = o.angle + (reverse ? Math.PI : 0),
            length = o.length * smoothing;

        return [current[0] + Math.cos(angle) * length, current[1] + 
        Math.sin(angle) * length];
    },
        cps = cp(a[i - 1], a[i - 2], point, false),
        cpe = cp(point, a[i - 1], a[i + 1], true);
    return `C ${cps[0]},${cps[1]} ${cpe[0]},${cpe[1]} ${point[0]},${point[1]}`;
 }
 function getPath(update, first, last, smoothing, pointsNew) {
    let points = pointsNew ? pointsNew : [
        [first, 16],
        [20, update],
        [last, 16]
    ],
        d = points.reduce((acc, point, i, a) => i === 0 ? 
        `M ${point[0]},${point[1]}` : `${acc} ${getPoint(point, i, a, smoothing)}`, '');
    return `<path d="${d}" />`;
 }

</script>


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