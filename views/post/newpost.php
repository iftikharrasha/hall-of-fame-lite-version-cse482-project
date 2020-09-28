<?php
	require_once('../../includes/sessions.php');
	require_once('../../includes/functions.php');
	
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
		header("Location:../../index.php?login_first");
	}
	
	date_default_timezone_set('Asia/Manila');
	$time = time();
	
	if ( isset( $_POST['post-submit'])) {
		$title = mysqli_real_escape_string($con, $_POST['post-title']);
		$category = mysqli_real_escape_string($con, $_POST['post-category']);
		$content = mysqli_real_escape_string($con, $_POST['post-content']);
		$image = $_FILES['post-image']['name'];
		$author = $_SESSION['username'];
		$dateTime = strftime('%Y-%m-%d',$time);
		$title_length = strlen($title);
		$content_lenght = strlen($content);
		$imageDirectory = "../../images/upload/" . basename($_FILES['post-image']['name']);
		
		if ( empty($title)) {
			$_SESSION['errorMessage'] = "Title Is Emtpy";
			Redirect_To('newpost.php');
		}else if ( $title_length > 50) {
			$_SESSION['errorMessage'] = "Title Is Too Long";
			Redirect_To('newpost.php');
		}else if ( empty($content)) {
			$_SESSION['errorMessage'] = "Content Is Empty";
			Redirect_To('newpost.php');
		}else if ( $content_lenght > 1450) {
			$_SESSION['errorMessage'] = "Content Is Too Long";
			Redirect_To('newpost.php');
		}else {
			$query = "INSERT INTO post (post_date_time, title, category, author, image, post) 
			VALUES ('$dateTime', '$title', '$category', '$author', '$image', '$content')";
			
			$exec = Query($query);
			if ($exec) {
				move_uploaded_file($_FILES['post-image']['tmp_name'], $imageDirectory);
				$_SESSION['successMessage'] = "Post Added Successfully";
			}else {
				$_SESSION['errorMessage'] = "Something Went Wrong Please Try Again";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | New Post
    </title>
    <link rel="stylesheet" href="https://use.typekit.net/nfp7kim.css">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <body>
    <div class="header-position">
      <a class="header-brand" href="">
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
                      </i>
                      <?php echo $_SESSION['username']; ?>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../about.php">About
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../contact.php">Contact Us
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
                      <a href="">New Post
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
                      <a href="../mails/mails.php">
                        <i class="fa fa-envelope">
                        </i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-bell">
                        </i>
                      </a>
                    </li>
                    <li>
                      <a href="../admin/jsonread.php">
                        <?php echo $_SESSION['username']; ?>
                        <i class="fa fa-chevron-down">
                        </i>
                      </a>
                    </li>
                    <li>
                      <a href="../../includes/logout.php">Log Out 
                        <i class="fa fa-power-off">
                        </i>
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
        </p>
    </div>
    </div>
  <div class="container-admin">
    <div class="body-content">
      <div class="body-adleft">
        <div class="nav_title" style="border: 0;">
          <a href="" class="site_title">
            <i class="fa fa-asterisk">
            </i>
            <span>HOF - ADMIN
            </span>
          </a>
        </div>
        <div class="body-adleft-1">
          <div class="menu_section">
            <h3>
            </h3>
            <ul class="nav1 side-menu">
              <li>
                <a href="../admin/dashboard.php">
                  <i class="fa fa-home">
                  </i> Home 
                  <span
                        class="fa fa-chevron-down">
                  </span>
                </a>
                <ul class="nav child_menu">
                  <li>
                    <a href="../admin/dashboard.php"> Dashboard
                    </a>
                  </li>
                </ul>
              </li>
              <li class="active">
                <a href="../post/managepost.php">
                  <i class="fa fa-industry">
                  </i> Posts
                  <span
                        class="fa fa-chevron-down">
                  </span>
                </a>
                <ul class="nav child_menu" style="display: block;">
                  <li>
                    <a href="../post/managepost.php">Manage Posts
                    </a>
                  </li>
                  <li style="background-color: #5a728b;">
                    <a href="../post/newpost.php">New Post
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="../category/categories.php">
                  <i class="fa fa-stack-overflow">
                  </i> Categories
                  <span
                        class="fa fa-chevron-down">
                  </span>
                </a>
                <ul class="nav child_menu">
                  <li>
                    <a href="../category/categories.php">Category List
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="../users/userlist.php">
                  <i class="fa fa-graduation-cap">
                  </i> Users
                  <span
                        class="fa fa-chevron-down">
                  </span>
                </a>
                <ul class="nav child_menu">
                  <li>
                    <a href="../users/userlist.php">User List
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="sidebar-footer">
          <a title="Settings" href="#">
            <span class="fa fa-cog" aria-hidden="true">
            </span>
          </a>
          <a title="Main Site" href="#">
            <span class="fa fa-phone" aria-hidden="true">
            </span>
          </a>
          <a title="Main Site" href="#">
            <span class="fa fa-send" aria-hidden="true">
            </span>
          </a>
          <a title="Logout" href="../../includes/logout.php">
            <span class="fa fa-power-off" aria-hidden="true">
            </span>
          </a>
        </div>
        <!--</div>-->
      </div>
      <div class="body-right">
        <div class="register">
          <p class="bdl2_message">
            <?php echo Message(); ?>
          </p>
          <form action="newpost.php" method="POST" enctype="multipart/form-data">
            <label class="admin-label al11" for="fname">Post Title
            </label>
            <br>
            <input class="field f3" type="text" id="fname" name="post-title">
            <br>
            <label class="admin-label al4" for="lname">Category
            </label>
            <br>
            <select class="field f6" name="post-category" id="post-category">
<?php
	$sql = "SELECT * FROM category";
	
	$exec = Query($sql);
	while($row = mysqli_fetch_assoc($exec)){
		echo "<option>$row[cat_name]</option>";
	}
?>
            </select>
            <br>
            <label class="admin-label al5" for="post-image">Feature Image
            </label>
            <br>
            <input class="field f7" id="fname" type="File" name="post-image">
            <br>
            <label class="admin-label al6" for="lname">Description
            </label>
            <br>
            <textarea class="field f8" id="w3review" name="post-content" rows="10">
            </textarea>
            <button name="post-submit" class="submit s3">Publish
            </button>
          </form>
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
    <a href="#" class="peace">Team Epsilon
    </a>
  </footer>
  </body>
</html>
