<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NoodleBeat - Contact</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/main.css">
    </head>
    
    <body>

<!-----------------------------------HTML Code------------------------------------->
        
        <!--Header-->
        <div class="header">
            <img src="../../Images/NoodleBeatLogo.png">
             
        </div>
        
        <!--Navigation Bar-->
        <div class="nav-wrapper">
            <div id="navigation">
                <a href="../../index.php">Home</a>
                <a href="../Browse/browse.php">Browse</a>
                <a class="active" href="#contact">Contact</a>
                <a href="../Profile/profile.php">Profile</a>
                <a href="../Upload/upload.php">Upload</a>
                <a href="../Register/register.php" style="float: right; border-left: 1px solid black; border-right: none;">Register</a>
                <a href="../Sign-In/sign_in.php" style="float: right; border-left: 1px solid black; border-right: none;">Sign In</a>
            </div>  
        </div>
        
        <!--Contact Buttons-->
        <div class="contact-info">
            <h1>Contact Us:</h1>
            <div class="contact-left">
                <img src="../../images/envelope.jpg" style="float: left; height: 40px; padding-top: 45px;">
                <a href="mailto:contact.NoodleBeat@gmail.com"><button>contact.NoodleBeat@gmail.com</button></a>
                <p></p>
                <img src="../../images/instagram.jpg" style="height: 80px; float: left; padding-top: 60px; margin: -25px">
                <a href="https://www.instagram.com/NoodleBeatofficial/?hl=en"><button>@NoodleBeatofficial</button></a>
            </div>
            <div class="contact-right">
                <img src="../../images/twitter.jpg" style="float: left; height: 90px; padding-top: 20px;">
                <a href="https://twitter.com/NoodleBeat"><button>@NoodleBeat</button></a>
                <img src="../../images/phone.jpg" style="height: 80px; float: left; padding-top: 25px; margin: 5px">
                <button>###-###-####</button>
            </div>
        </div>

<!---------------------------------------JS Code----------------------------------->
        
        <!--Sticky Navbar-->
        <script>
            window.onscroll = function() {myFunction()};

            var navbar = document.getElementById("navigation");
            var sticky = navbar.offsetTop;

            function myFunction() {
              if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
              } else {
                navbar.classList.remove("sticky");
              }
            }
        </script>
        
<!---------------------------------------Colors----------------------------------->
        <!--Primary Color: #009afd-->
        <!--Navbar Color: #ededed-->
        <!--Navbar Hover Color: #0062ff-->
    </body>
</html>