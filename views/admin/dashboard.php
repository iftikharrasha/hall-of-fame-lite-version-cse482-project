<?php
require_once('../../includes/sessions.php');
require_once('../../includes/functions.php');

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("Location:../../index.php?login_first");
}

 //total post counts
$countPosts= mysqli_query($con, "SELECT COUNT(post_id) as TOTAL FROM post");
$totalPosts = mysqli_fetch_assoc($countPosts);

 //total Categories counts
$countCategory= mysqli_query($con, "SELECT COUNT(cat_id) as TOTAL FROM category");
$totalCategories = mysqli_fetch_assoc($countCategory);

 //total Admin counts
$countAdmins= mysqli_query($con, "SELECT COUNT(id) as TOTAL FROM admin");
$totalAdmins = mysqli_fetch_assoc($countAdmins);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN
  </title>
  <link rel="stylesheet" href="https://use.typekit.net/nfp7kim.css">
  <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
  <div class="header-position">
    <a class="header-brand" href="../../index.php">
      <img src="../../images/logo.png" alt="">
    </a>
    <header class="container-header">
      <div class="top-nav">
        <div class="container-top">
          <nav class="navbar-top">
            <div class="collapse-top">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fa fa-user">
                    </i><?php echo $_SESSION['username']; ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <div class="header-middle">
        <div class="container-middle">
          <div class="menu-admin">
            <nav class="navbar-middle">
              <div class="collapse-middle">
                <ul class="navbar-nav">
                  <li>
                    <a href="">Dashboard
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-envelope"></i>
                    </a>
                  </li>
                  <li>
                    <a href="alumni.html"><i class="fa fa-bell"></i>
                    </a>
                  </li>
                  <li>
                    <a href="alumni.html"><?php echo $_SESSION['username']; ?><i class="fa fa-chevron-down"></i>
                    </a>
                  </li>
                  <li>
                    <a href="../../includes/logout.php">Log Out <i class="fa fa-power-off"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <div class="date-bar">
      <p class="date">
        <span id="datetime">
        </span>
      </p>
    </div>
  </div>
  <div class="container-admin">
    <div class="body-content">
      <div class="body-adleft">
        <div class="nav_title" style="border: 0;">
          <a href="" class="site_title"><i class="fa fa-asterisk"></i>
            <span>HOF - ADMIN</span></a>
        </div>
        <div class="body-adleft-1">
          <div class="menu_section">
            <h3></h3>
            <ul class="nav1 side-menu">
              <li class="active">
                <a href="dashboard.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: block;">
                  <li style="background-color: #5a728b;"><a href="dashboard.php"> Dashboard</a></li>
                </ul>
              </li>

              <li>
                <a href="../post/managepost.php"><i class="fa fa-industry"></i> Posts<span
                    class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="../post/managepost.php">Manage Posts</a></li>
                  <li><a href="../post/newpost.php">New Post</a></li>
                </ul>
              </li>

              <li>
                <a href="../category/categories.php"><i class="fa fa-stack-overflow"></i> Categories<span
                    class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="../category/categories.php"> Category List</a></li>
                </ul>
              </li>


              <li>
                <a href="../users/userlist.php"><i class="fa fa-graduation-cap"></i> Users<span
                    class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="../users/userlist.php">User List</a></li>
                  <li><a href="../users/adduser.php">Add User</a></li>
                </ul>
              </li>


              <li>
                <a href="../mails/mails.php"><i class="fa fa-external-link"></i> Mails<span
                    class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="../mails/mails.php">See List</a></li>
                </ul>
              </li>

            </ul>
          </div>


        </div>

        <div class="sidebar-footer">
          <a title="Settings" href="#">
            <span class="fa fa-cog" aria-hidden="true"></span>
          </a>

          <a title="Main Site" href="#">
            <span class="fa fa-phone" aria-hidden="true"></span>
          </a>

          <a title="Main Site" href="#">
            <span class="fa fa-send" aria-hidden="true"></span>
          </a>

          <a title="Logout" href="../../index.php">
            <span class="fa fa-power-off" aria-hidden="true"></span>
          </a>
        </div>

      </div>
      <div class="body-right">
        <div class="body-adright-1">
          <div class="blog-content stat1">
            <p class="top-blog">Posts</p>
            <span><?php echo $totalPosts['TOTAL']; ?></span>
          </div>
          <div class="blog-content stat2">
            <p class="top-blog">Pending</p>
            <span>17</span>
          </div>
          <div class="blog-content stat3">
            <p class="top-blog">Approved</p>
            <span>58</span>
          </div>
          <div class="blog-content stat4">
            <p class="top-blog">Rejected</p>
            <span>12</span>
          </div>
          <div class="blog-content stat5">
            <p class="top-blog">Users</p>
            <span>434</span>
          </div>
          <div class="blog-content stat6">
            <p class="top-blog">Categories</p>
            <span><?php echo $totalCategories['TOTAL']; ?></span>
          </div>
          <div class="blog-content stat7">
            <p class="top-blog">Mails</p>
            <span>03</span>
          </div>
          <div class="blog-content stat8">
            <p class="top-blog">Admins</p>
            <span><?php echo $totalAdmins['TOTAL']; ?></span>
          </div>
        </div>
        <div class="body-adright-2">
          <div class="calendar">
            <div class="month">
              <ul>
                <li>September<br><span style="font-size:18px">2020</span></li>
              </ul>
            </div>

            <ul class="weekdays">
              <li>Sa</li>
              <li>Su</li>
              <li>Mo</li>
              <li>Tu</li>
              <li>We</li>
              <li>Th</li>
              <li>Fr</li>
            </ul>

            <ul class="days">
              <li>1</li>
              <li>2</li>
              <li>3</li>
              <li>4</li>
              <li>5</li>
              <li>6</li>
              <li>7</li>
              <li>8</li>
              <li>9</li>
              <li>10</li>
              <li>11</li>
              <li>12</li>
              <li>13</li>
              <li>14</li>
              <li>15</li>
              <li>16</li>
              <li>17</li>
              <li>18</li>
              <li>19</li>
              <li>20</li>
              <li>21</li>
              <li>22</li>
              <li>23</li>
              <li>24</li>
              <li>25</li>
              <li>26</li>
              <li>27</li>
              <li>28</li>
              <li>29</li>
              <li><span class="active">30</span></li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
  
  <footer class="foot">
    <p class="comp">nsu.halloffame@info.com
    </p>
    <p class="comp2">+880-1728293845
    </p>
    <p class="comp3">Bashundhara, R/A, Dhaka
    </p>
    <p class="comp4">Developed & Maintained by
    </p>
    <a href="http://www.peacebusters.team/" class="peace">Peacebusters
    </a>
  </footer>
</body>
<script>
  var dt = new Date();
  document.getElementById("datetime").innerHTML = (("0" + dt.getDate()).slice(-2)) + "." + (("0" + (dt.getMonth() + 1)).slice(-2)) + "." + (dt.getFullYear()) + " " + (("0" + dt.getHours()).slice(-2)) + ":" + (("0" + dt.getMinutes()).slice(-2));
</script>

</html>