<?php
require_once('../../includes/sessions.php');
require_once('../../includes/functions.php');

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("Location:../../index.php?login_first");
}

if ( isset( $_POST['delpost-submit'])) {
	$postid=$_POST['delete_id'];
   
    $result="DELETE FROM post WHERE post_id='$postid'";
	$exec = Query($result);

    if($exec) {
		$_SESSION['catSuccess'] = "Post Deleted Successfully";
		Redirect_To('managepost.php?deletesuccess');
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
  <title>Admin |Manage Posts
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
    <div class="manage-content">
      <div class="body-adleft">
        <div class="nav_title" style="border: 0;">
          <a href="" class="site_title"><i class="fa fa-asterisk"></i>
            <span>HOF - ADMIN</span></a>
        </div>
        <div class="body-adleft-1">
          <div class="menu_section">
            <h3></h3>
            <ul class="nav1 side-menu">
              <li>
                <a href="../admin/dashboard.php"><i class="fa fa-home"></i> Home <span
                    class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="../admin/dashboard.php"> Dashboard</a></li>
                </ul>
              </li>

              <li class="active">
                <a href="../post/managepost.php"><i class="fa fa-industry"></i> Posts<span
                    class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: block;">
                  <li style="background-color: #5a728b;"><a href="../post/managepost.php">Manage Posts</a></li>
                  <li><a href="../post/newpost.php">New Post</a></li>
                </ul>
              </li>

              <li>
                <a href="../category/categories.php"><i class="fa fa-stack-overflow"></i> Categories<span
                    class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="../category/categories.php">Category List</a></li>
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
                <a href="#"><i class="fa fa-external-link"></i> Mails<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">See List</a></li>
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

          <a title="Logout" href="../../includes/logout.php">
            <span class="fa fa-power-off" aria-hidden="true"></span>
          </a>
        </div>


        <!--</div>-->

      </div>
      <div class="body-right">
        <div class="body-deptright-3">
		

            <?php
                
                $postNo = 1;
				$page = 1;
				
				if ( isset($_GET['page'])){
							$page = $_GET['page'];
							$showPost = ($page * 5) - 5;
							if ($page <= 0) {
							$showPost = 0;
							}
				$sql = "SELECT * FROM post ORDER BY post_date_time LIMIT $showPost,5";
				}else{
				$sql = "SELECT * FROM post ORDER BY post_date_time LIMIT 0,5";
				}
                $exec = Query($sql);
							
                if (mysqli_num_rows($exec) < 1) {
			?>
				<p class="lead">You Have 0 Post For The Moment</p>
				<a href="newpost.php"><button class="btn btn-info">Add Post</button></a>
				
					<?php
						}else{
					?>
					
			<div class="container">
			        
				<div class="row">
					<div class="col-lg-12" style="height: 540px;">
						
						<p class="bdl2_message" style="left: 25px;">
							<?php echo ErrorMessage(); ?>
							<?php echo CatSuccess(); ?>
						</p>
						
			    <table class="body-notice-below">
				
					<tbody>
					    <tr>
							<th>Post No.</th>
							<th>Post Date</th>
							<th>Date Title</th>
							<th>Author</th>
							<th>Category</th>
							<th>Feature Image</th>
							<th>Edit</th>
							<th>Delete</th>
							<th>Details</th>
					    </tr>

							<?php
								while ($post = mysqli_fetch_assoc($exec)) {
								$post_id = $post['post_id'];
								$post_date = $post['post_date_time'];
								$post_title = $post['title'];
								$category = $post['category'];
								$author = "Admin";
								$image = $post['image'];
							
							?>

					    <tr>
							<td><?php echo $postNo; ?></td>
							<td><?php echo $post_date; ?></td>
							<td><?php 
									if(strlen($post_title) > 20 ) {
										echo substr($post_title,0,20) . '...';
									}else {
										echo $post_title;
									}
								?>
							</td>
							<td><?php echo $author; ?></td>
							<td><?php echo $category; ?></td>
							<td class="i1"><?php echo "<img class='img-responsive' src='../../images/upload/$image'"; ?></td>   
							<!--<td><?php echo "<a href='editpost.php?post_id=$post_id'>Edit</a> | <a href='deletepost.php?delete_post_id=$post_id'>Delete</a>"; ?></td>-->
							<td class="jsgrid-align-center">
								<a class="btn btn-sm btn-info" href="editpost.php?post_id=<?php echo $post_id;?>"><i class="fa fa-pencil-square-o"></i></a>
							</td>
							<td class="jsgrid-align-center">
							<form action="managepost.php?delete_post_id=<?php echo $post_id;?>" method="post">
								<input type="hidden" name="delete_id" value="<?php echo $post_id;?>">
								<button type="submit" name="delpost-submit" class="btn btn-sm btn-info waves-effect waves-light" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash-o"></i></button>
							</form>
							</td>
							<td><a href="../../seepost.php?id=<?php echo $post_id;?>"><button class="btn btn-primary">Live Preview</button></a></td>
					    </tr>
							  <?php
									$postNo++;
								}														
							  }
							  ?>
					  
					</tbody>
				</table>
				</div>
				</div>
				</div>
				
				<div class="container">
						<div class="row mt-5">
							<div class="col-lg-12 text-center">
								<div class="pagi">
									 <?php  if(!isset($_GET['category'])) { ?>
				                     <ul class="pagination">
											<?php
												if ($page > 1) {
											?>
										<li><a href="managepost.php?page=<?php echo $page - 1; ?>"><</a></li>
											<?php
												}
												$sql = "SELECT COUNT(*) FROM post";
												$exec = Query($sql);
												$rowCount = mysqli_fetch_array($exec);
												$totalRow = array_shift($rowCount);
												$postPerPage = ceil($totalRow / 5);

												for ($count = 1; $count <= $postPerPage; $count++){
													if ($page == $count) {
											?>
							            <li class="active"><a href="managepost.php?page=<?php echo $count ?>"><?php echo $count ?></a></li>
											<?php
												}else {
											?>
										<li><a href="managepost.php?page=<?php echo $count ?>"><?php echo $count ?></a></li>
											<?php
												}		
											}
											if($page < $postPerPage) {
											?>
							            <li><a href="managepost.php?page=<?php echo $page + 1; ?>">></a></li>
											<?php
													}
												}
											?>
						            </ul>
								</div>
							</div>
						</div>
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