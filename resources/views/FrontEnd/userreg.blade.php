<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset("web/styles/registerstyle.css")}}">
    <title>Creator Regisration Form </title>
</head>
<body>
    <div class="container">
        <header>Creator Registration</header>

        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name="name"   required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" placeholder="Enter birth date" name="dob" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="Enter your email" name="email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" placeholder="Enter mobile number" name="phone" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender" required>
                                <option disabled selected>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Profile-Photo</label>
                            <input type="file" placeholder="Upload Your profile photo" name="photo" required>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Professional Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Occupation</label>
                            <input type="text" placeholder="Occupation"name="occupation" required>
                        </div>

                        <div class="input-field">
                            <label>Year of Experience</label>
                            <input type="number" placeholder="Year of Experience" name="exp" required>
                        </div>

                        <div class="input-field">
                            <label>LinkedIn Profile</label>
                            <input type="text" id="linkedinProfile" placeholder="LinkedIn Profile Link" name="link" required>
                            <div id="linkedinError" class="error-message"></div>
                        </div>

                        <div class="input-field">
                            <label>Portfolio</label>
                            <input type="text" placeholder="Year Portfolio Link" name="portfolio">
                        </div>

                        <div class="input-field">
                            <label>Consulation Pricing</label>
                            <input type="number" placeholder="Your Consulation Pricing" name="price" required>
                        </div>

                        <div class="input-field">
                            <label>Availability for Meetings</label>
                            <select name="available" required>
                                <option disabled selected>Select Options</option>
                                <option value="All Days">All Days</option>
                                <option value="Monday to Friday">Monday to Friday</option>
                                <option value="Saturday and Sunday Only">Saturday and Sunday</option>
                            </select>
                        </div>

                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Skills</span>

                    <div class="wrapper">
                        <div class="content">
                            <ul id="skills-list">
                                
                            </ul>
                            <input type="text" name="skill" id="new-skill" spellcheck="false" placeholder="Add a skill...">
                        </div>
                        <div class="details">
                            <p><span id="remaining-skills">10</span> skills are remaining</p>
                            <button onclick="removeAllSkills()">Remove All</button>
                        </div>
                    </div>
                </div>
            
                <div class="details family">
                    <span class="title">Account Information</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" name="user" placeholder="Enter your username" required>
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter Your Password" required>
                        </div>
                        <div class="input-field">
                            <label>Re-Type Password</label>
                            <input type="password" name="password_confirmation" placeholder="Enter Your password" required>
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        <button class="submit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>

    <script>
        const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");


nextBtn.addEventListener("click", ()=> {
    allInput.forEach(input => {
        if(input.value != ""){
            form.classList.add('secActive');
        }else{
            form.classList.remove('secActive');
        }
    })
})

backBtn.addEventListener("click", () => form.classList.remove('secActive'));
    </script>

<script>
        document.getElementById('new-skill').addEventListener('keypress', function (event) {
        if (event.key === 'Enter' || event.key === ',') {
            event.preventDefault();
            addSkill();
        }
    });

    function addSkill() {
        var skillsList = document.getElementById('skills-list');
        var newSkillInput = document.getElementById('new-skill');

        if (newSkillInput.value.trim() !== '') {
            var skillEntry = document.createElement('li');
            skillEntry.textContent = newSkillInput.value.trim();

            var removeIcon = document.createElement('i');
            removeIcon.className = 'uil uil-multiply';
            removeIcon.onclick = function () {
                removeSkill(skillEntry);
            };

            skillEntry.appendChild(removeIcon);
            skillsList.appendChild(skillEntry);

            newSkillInput.value = ''; // Clear the input field

            updateRemainingSkills();
        }
    }

    function removeSkill(skillEntry) {
        var skillsList = document.getElementById('skills-list');
        skillsList.removeChild(skillEntry);
        updateRemainingSkills();
    }

    function removeAllSkills() {
        var skillsList = document.getElementById('skills-list');
        skillsList.innerHTML = ''; 
        updateRemainingSkills();
    }

    function updateRemainingSkills() {
        var skillsList = document.getElementById('skills-list');
        var remainingSkills = 10 - skillsList.childElementCount;
        document.getElementById('remaining-skills').textContent = remainingSkills;
    }

</script>
<script>
    var linkedinProfileInput = document.getElementById('linkedinProfile');
    var linkedinError = document.getElementById('linkedinError');

    linkedinProfileInput.addEventListener('blur', function () {
        validateLinkedInProfile();
    });

    function validateLinkedInProfile() {
        var linkedinProfile = linkedinProfileInput.value.trim();

        // Regular expression for a basic LinkedIn URL format
        var linkedinRegex = /^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[a-zA-Z0-9_-]+\/?$/;

        if (linkedinProfile === '' || linkedinRegex.test(linkedinProfile)) {
            linkedinError.textContent = '';
        } else {
            linkedinError.textContent = 'Invalid LinkedIn Profile Link format.';
        }
    }
</script>

</body>
</html>