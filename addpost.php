<?php
	require_once('./includes/sessions.php');
	require_once('./includes/functions.php');
	
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
		header("Location:./login.php?login_first");
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
		$imageDirectory = "./images/upload/" . basename($_FILES['post-image']['name']);
		
		if ( empty($title)) {
			$_SESSION['errorMessage'] = "Title Is Emtpy!";
			Redirect_To('addpost.php');
		}else if ( $title_length > 50) {
			$_SESSION['errorMessage'] = "Title Is Too Long!";
			Redirect_To('addpost.php');
		}else if ( empty($content)) {
			$_SESSION['errorMessage'] = "Content Is Empty!";
			Redirect_To('addpost.php');
		}else if ( $content_lenght > 1450) {
			$_SESSION['errorMessage'] = "Content Is Too Long!";
			Redirect_To('addpost.php');
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
    <title>Admin | Add Post
    </title>
    <link rel="stylesheet" href="https://use.typekit.net/nfp7kim.css">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <div class="header-position">
      <a class="header-brand" href="">
        <img src="./images/logo.png" alt="">
      </a>
      <header class="container-header">
        <div class="top-nav">
          <div class="container-top">
            <nav class="navbar-top">
              <div class="collapse-top">
                <ul class="navbar-nav">
                  <li class="nav-item">
<?php
	if(isset($_SESSION["username"])){
		echo '
			<a class="nav-link" href="profile.php">
			<i class="fa fa-user"></i>' . $_SESSION["username"] . '
		';
	}else{
		echo '
			<a class="nav-link" href="login.php">
			<i class="fa fa-user"></i>My Account
		';
	}
?>
                  </a>
                </li>
              <li class="top-search">
                <form action="blog.php">
                  <input type="text" name="search" id="search" placeholder="Search Here">
                </form>
              </li>
              </ul>
          </div>
          </nav>
        </div>
    </div>
    <div class="header-middle">
      <div class="container-middle">
        <div class="menu">
          <nav class="navbar-middle">
            <div class="collapse-middle">
              <ul class="navbar-nav">
                <li>
                  <a href="index.php">Home
                  </a>
                </li>
                <li>
                  <a href="blog.php">Blog
                  </a>
                </li>
                <li>
                  <a href="login.php">Login
                  </a>
                </li>
                <li>
                  <a href="about.php">About
                  </a>
                </li>
                <li>
                  <a href="contact.php">Contact
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
<div class="contents">
  <div class="body-content">
    <div class="body-left">
      <div class="body-left-1">
        <p class="blog align1">Categories
        </p>
        <div class="blog-content nc1">
          <a href="" class="top-blog">Business
          </a>
          <span>
            <i class="fa fa-comment" aria-hidden="true">
            </i> 11 blogs 
          </span>
        </div>
        <div class="blog-content nc2">
          <a href="" class="top-blog">Alumni
          </a>
          <span>
            <i class="fa fa-comment" aria-hidden="true">
            </i> 11 blogs 
          </span>
        </div>
        <div class="blog-content nc3">
          <a href="" class="top-blog">Club
          </a>
          <span>
            <i class="fa fa-comment" aria-hidden="true">
            </i> 04 blogs 
          </span>
        </div>
        <div class="blog-content nc4">
          <a href="" class="top-blog">ECE
          </a>
          <span>
            <i class="fa fa-comment" aria-hidden="true">
            </i> 09 blogs 
          </span>
        </div>
        <div class="blog-content nc5">
          <a href="" class="top-blog">Startup
          </a>
          <span>
            <i class="fa fa-comment" aria-hidden="true">
            </i> 14 blogs 
          </span>
        </div>
        <div class="blog-content nc6">
          <a href="" class="top-blog">Festival
          </a>
          <span>
            <i class="fa fa-comment" aria-hidden="true">
            </i> 02 blogs 
          </span>
        </div>
        <div class="blog-content nc7">
          <a href="" class="top-blog">Achievments
          </a>
          <span>
            <i class="fa fa-comment" aria-hidden="true">
            </i> 02 blogs 
          </span>
        </div>
      </div>
      <!--</div>-->
    </div>
    <div class="body-right">
      <div class="register">
        <p class="bdl2_message">
          <?php echo Message(); ?>
        </p>
        <form action="addpost.php" method="POST" enctype="multipart/form-data">
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
