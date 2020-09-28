<?php
	require_once('../../includes/sessions.php');
	require_once('../../includes/functions.php');
	
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
		header("Location:../../index.php?login_first");
	}
	
	//all Categories
	$allCategory= mysqli_query($con, "SELECT * FROM category");
	date_default_timezone_set('Asia/Manila');
	$time = time();
	
	if ( isset( $_POST['cat-submit'])) {
		$dateTime = strftime('%Y-%m-%d',$time);
		$cat_name = mysqli_real_escape_string($con, $_POST['category']);
		$author = $_SESSION['username'];
		
		if ( empty($cat_name)) {
			$_SESSION['errorMessage'] = "Field Is Emtpy";
			Redirect_To('categories.php');
		}else {
			$query = "INSERT INTO category (cat_datetime, cat_name, cat_creator) 
			VALUES ('$dateTime', '$cat_name', '$author')";
			
			$exec = Query($query);
			if ($exec) {
				$_SESSION['successMessage'] = "Category Added Successfully";
				Redirect_To('categories.php?category_added');
			}else {
				$_SESSION['errorMessage'] = "Please Try Again!";
			}
		}
	}
	
	if ( isset( $_POST['delcat-submit'])) {
		$catid=$_POST['delete_id'];
		
		$result="DELETE FROM category WHERE cat_id='$catid'";
		
		$exec = Query($result);
		if($exec) {
			$_SESSION['successMessage'] = "Category Deleted Successfully";
			Redirect_To('categories.php?deletesuccess');
		} else {
			$_SESSION['errorMessage'] = "Please Try Again!";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Category
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
                      <a href="">Category
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
              <li>
                <a href="../post/managepost.php">
                  <i class="fa fa-industry">
                  </i> Posts
                  <span
                        class="fa fa-chevron-down">
                  </span>
                </a>
                <ul class="nav child_menu">
                  <li>
                    <a href="../post/managepost.php">Manage Posts
                    </a>
                  </li>
                  <li>
                    <a href="../post/newpost.php">New Post
                    </a>
                  </li>
                </ul>
              </li>
              <li class="active">
                <a href="../category/categories.php">
                  <i class="fa fa-stack-overflow">
                  </i> Categories
                  <span
                        class="fa fa-chevron-down">
                  </span>
                </a>
                <ul class="nav child_menu" style="display: block;">
                  <li style="background-color: #5a728b;">
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
        <div class="body-deptright-1">
          <div class="blog-content nc1">
            <p class="bdl2_message">
              <?php echo Message(); ?>
            </p>
            <form action="categories.php" method="post">
              <label class="top-blog t1">Add Category
              </label>
              <span>
                <input class="sp1" name="category" type="text" placeholder="" minlength="3" value="">
              </span>
              <button class="submit s5 s6" name="cat-submit" type="submit">submit
              </button>
            </form>
          </div>
        </div>
        <div class="body-deptright-2">
          <table class="body-dept-below">
            <thead>
              <tr>
                <th>Category List
                </th>
                <th>EDIT
                </th>
                <th>DELETE
                </th>
              </tr>
            </thead>
            <tbody>
<?php
	foreach ($allCategory as $category){
?>
              <tr>
                <td>
                  <?=$category['cat_name']?>
                </td>
                <td class="jsgrid-align-center">
                  <a title="Edit" class="btn btn-sm btn-info" href="categories.php">
                    <i class="fa fa-pencil-square-o">
                    </i>
                  </a>
                </td>
                <td class="jsgrid-align-center">
                  <form action="categories.php" method="post">
                    <input type="hidden" name="delete_id" value="<?=$category['cat_id']?>">
                    <button type = "submit" name="delcat-submit" class="btn btn-sm btn-info waves-effect waves-light" onclick="return confirm('Are you sure to delete this data?')">
                      <i class="fa fa-trash-o">
                      </i>
                    </button>
                  </form>
                </td>
              </tr>
<?php
	}
?>
            </tbody>
          </table>
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
