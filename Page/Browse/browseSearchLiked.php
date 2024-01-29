<?php
    session_start();
    include_once "../../PHP/dbh.php";
    $searchRes = 0;
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NoodleBeat - Browse</title>
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
                <a class="active" href="../Browse/browse.php">Browse</a>
                <a href="../Contact/contact.php">Contact</a>
                <a href="../Profile/profile.php">Profile</a>
                <a href="../Upload/upload.php">Upload</a>
                <a href="../Register/register.php" style="float: right; border-left: 1px solid black; border-right: none;">Register</a>
                <a href="../Sign-In/sign_in.php" style="float: right; border-left: 1px solid black; border-right: none;">Sign In</a>

            </div>  
        </div>
        
        <!--Table-->
        <section class="tbl">
            <h1>Browse</h1>
            <div class="browser">
                <form method="POST" action="<?php $searchRes=1 ?>">
                    <input type="text" name="searchBar" placeholder="search artists, titles, genres, etc">   <button type="submit">Search</button>
                </form>
            </div>
            <table id="tableData" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <th onClick="sortTable(0)" style="width:5%;">LIKES</th>
                    <th onClick="sortTable(1)" style="width:8%;">GENRE</th>
                    <th onClick="sortTable(2)" style="width:8%;">FILE TYPE</th>
                    <th onClick="sortTable(3)" style="width:10%;">TITLE</th>
                    <th onClick="sortTable(4)" style="width:40%;">FILE</th>
                    <th onClick="sortTable(5)">ARTIST</th>
                    <th onClick="sortTable(6)">DATE UPLOADED</th>
                    <th onClick="sortTable(7)">LIKE</th>
                </tr>
                <?php
                    if($searchRes == 1){
                        $search = $_SESSION["search"];
                        $_SESSION["sql"] = "SELECT * FROM `tracks` WHERE `artist` LIKE '%$search%' OR `title` LIKE '%$search%' OR `genre` LIKE '%$search%' ORDER BY `likes` DESC;";
                        $sql = $_SESSION["sql"];
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){

                                $title = $row['title'];
                                $genre = $row['genre'];
                                $date = $row['date_uploaded'];
                                $type = $row['file_type'];
                                $likes = $row['likes'];
                                $file = $row['file'];
                                $artist = $row['artist'];
                                $id = $row['id'];

                                echo "\n<tr>\n" ;
                                echo "<td style='border-left: 1px solid black'>" . $likes . "</td>\n" ;
                                echo "<td>" . $genre . "</td>\n" ;
                                echo "<td>" . $type . "</td>\n" ;
                                echo "<td>" . $title . "</td>\n";
                                echo "<td><audio controls style='width: 100%'>
                                              <source src='../$file' type='audio/mpeg'>
                                            Your browser does not support the audio element.
                                            </audio></td>";
                                echo "<td>" . $artist . "</td>\n" ;
                                echo "<td>" . $date . "</td>\n" ;
                                echo "<td style='border-right: 1px solid black;'>
                                        <form action='../../PHP/addLikeBrowse.php' method='POST'>
                                            <input type='text' name='like' value='$id' style='display: none;'>
                                            <input type='image' src='../../images/like.png' style='width: 20%'>
                                        </form>
                                     </td>";
                                echo "</tr>\n";

                            }
                        }
                    }
                    $searchRes = 0;
                ?>
            </table>
        </section>

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