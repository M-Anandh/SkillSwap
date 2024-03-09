<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('web/styles/registerstyle.css')}}">
    <title>Creator Regisration Form </title>
</head>

<body>
    <div class="container">
        <header>Creator Registration</header>

        <form method="POST" action="{{ route('creator.register') }}" enctype="multipart/form-data">
            @csrf
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name="name" required>
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
                            <input type="text" placeholder="Occupation" name="occupation" required>
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
                            <label>Meet Link</label>
                            <input type="text" placeholder="Google Meet Link.." id="meetLink" name="portfolio" required>
                            <p class="error-message" id="meetLinkError"></p>
                        </div>

                        <div class="input-field">
                            <label>Consulation Pricing</label>
                            <input type="number" placeholder="Your Consulation Pricing" name="price" required>
                        </div>

                        <div class="input-field">
                            <label>Availability for Meetings</label>
                            <select name="available" required>
                                <option disabled selected>Select Options</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
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
                    <br>

                    <!-- <div class="wrapper">
                        <div class="content">
                            <ul id="skills-list" name="skill">
                                
                            </ul>
                            <input type="text" name="skill" id="new-skill" spellcheck="false" placeholder="Add a skill...">
                        </div> -->
                    <!-- <div class="details">
                            <p><span id="remaining-skills">10</span> skills are remaining</p>
                            <button onclick="removeAllSkills()">Remove All</button>
                        </div> -->
                    <!-- <div class="input-field">
                            <label>SKill</label>
                            <input type="text" placeholder="Skills" name="skill" required>
                        </div>
                    </div> -->

                    <div class="content">
                        <label for="skills-list">Enter Skills (comma-separated):</label>
                        <input type="text" name="skills" id="skills-list" spellcheck="false" placeholder="Add a skill..." required style="width: 300px;  height:30px;" >
                    </div>


                </div>
                <br>

                <div class="details family">
                    <span class="title">Account Information</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" placeholder="Enter your username" name="user" required>
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" placeholder="Enter Your Password" name="password" required>
                        </div>
                        <div class="input-field">
                            <label>Re-Type Password</label>
                            <input type="password" placeholder="Enter Your password" name="password_confirmation" required>
                        </div>
                        <div class="input-field" style="display: none;">
                            <label>Type:</label>
                            <input type="number" placeholder="Creator" name="type" id="type" readonly required>
                            <input type="hidden" name="type_default" value="2">
                        </div>
                        <div class="input-field" style="display: none;">
                            <label>Approval Type</label>
                            <input type="number" placeholder="Creator" name="approved" id="approved" readonly required>
                            <input type="hidden" name="approved_default" value="0">
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


        nextBtn.addEventListener("click", () => {
            allInput.forEach(input => {
                if (input.value != "") {
                    form.classList.add('secActive');
                } else {
                    form.classList.remove('secActive');
                }
            })
        })

        backBtn.addEventListener("click", () => form.classList.remove('secActive'));
    </script>

    <script>
        document.getElementById('new-skill').addEventListener('keypress', function(event) {
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
                removeIcon.onclick = function() {
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

        linkedinProfileInput.addEventListener('blur', function() {
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

<script>
        function validateMeetLink() {
            var meetLinkInput = document.getElementById('meetLink').value;

            var meetLinkRegex = /^https:\/\/meet\.google\.com\/[a-z0-9-]+$/i;
            if (meetLinkRegex.test(meetLinkInput)) {
                document.getElementById('meetLinkError').innerText = "";
                return true;
            } else {
                document.getElementById('meetLinkError').innerText = "Please enter a valid Google Meet link.";
                return false;
            }
        }

        var meetLinkInput = document.getElementById('meetLink');
        meetLinkInput.addEventListener('input', validateMeetLink);
    </script>

</body>

</html>