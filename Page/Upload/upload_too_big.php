<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NoodleBeat - Upload</title>
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
                <a href="../Contact/contact.php">Contact</a>
                <a href="../Profile/profile.php">Profile</a>
                <a class="active" href="../Upload/upload.php">Upload</a>
                <a href="../Register/register.php" style="float: right; border-left: 1px solid black; border-right: none;">Register</a>
                <a href="../Sign-In/sign_in.php" style="float: right; border-left: 1px solid black; border-right: none;">Sign In</a>
            </div>  
        </div>
        
        <div class="upload-content">
            <h1>Upload</h1>
            <div class="input-fields">
                <p style="color: red;">File is too big.</p>
                <form action="../../PHP/uploadFile.php" method="POST" enctype="multipart/form-data">
                    Select File: <input type="file" name="upload" id="upload"><br><br>
                    Title: <input type="text" name="title" placeholder="Enter Title"><br>
                    Genre:
                    <select name="genre">
                       <option value="Hip Hop">Hip Hop</option>
                        <option value="Pop">Pop</option>
                        <option value="R&B">R and B</option>
                        <option value="EDM">EDM</option>
                        <option value="Rock">Rock</option>
                        <option value="Jazz">Jazz</option>
                        <option value="Classical">Classical</option>
                        <option value="Miscellaneous">Miscellaneous</option>
                    </select><br><br>
                    
                    <input type="submit" value="Post">
                </form>
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
        
        <!--Table Scroll-->
        <script>
            $(window).on("load resize ", function() {
                var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
                $('.tbl-header').css({'padding-right':scrollWidth});
            }).resize();
        </script>
        
        <!--Table Sort-->
        <script>
            function sortTable(n) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById("tableData");
                switching = true;
                //Set the sorting direction to ascending:
                dir = "asc"; 
                /*Make a loop that will continue until
                no switching has been done:*/
                while (switching) {
                    //start by saying: no switching is done:
                    switching = false;
                    rows = table.rows;
                    /*Loop through all table rows (except the
                    first, which contains table headers):*/
                    for (i = 1; i < (rows.length - 1); i++) {
                        //start by saying there should be no switching:
                        shouldSwitch = false;
                        /*Get the two elements you want to compare,
                        one from current row and one from the next:*/
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        /*check if the two rows should switch place,
                        based on the direction, asc or desc:*/
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        /*If a switch has been marked, make the switch
                        and mark that a switch has been done:*/
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        //Each time a switch is done, increase this count by 1:
                        switchcount ++;      
                    } else {
                        /*If no switching has been done AND the direction is "asc",
                        set the direction to "desc" and run the while loop again.*/
                        if (switchcount == 0 && dir == "asc") {
                            dir = "desc";
                            switching = true;
                        }
                    }
                }
            }
        </script>
<!---------------------------------------Colors----------------------------------->
        <!--Primary Color: #009afd-->
        <!--Navbar Color: #ededed-->
        <!--Navbar Hover Color: #0062ff-->
    </body>
</html>