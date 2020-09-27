<?php
require_once('./includes/sessions.php');
require_once('./includes/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall of Fame | Blog</title>
    <link rel="stylesheet" href="https://use.typekit.net/nfp7kim.css">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./fonts/icomoon/style.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="header-position">
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
												<a class="nav-link" href="./views/admin/dashboard.php">
													<i class="fa fa-user"></i>' . $_SESSION["username"] . '
											';
										 }else{
											echo '
												<a class="nav-link" href="#">
													<i class="fa fa-user"></i> My Account
											';
									}
									
									?>
								  </a>
								</li>
								<li class="top-search">
											<form>
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
                            <a class="navbar-brand" href="">
                                <img src="./images/logo.png" alt="">
                            </a>
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
            <p class="date"><span id="datetime"></span></p>
            
        </div>
    </div>
    
    <div class="contents">
        <div class="body-content">
                <div class="body-left">
                    <div class="body-left-1">
                        <p class="blog align1">Categories</p>
						<div class="container">
								<?php
									$sql = "SELECT cat_name FROM category Limit 7";
									$exec = Query($sql);
									if (mysqli_num_rows($exec) > 0) {
									while ($category = mysqli_fetch_assoc($exec)) {
								?>
							<div class="row">
									<div class="col-12">
										<div class="blog-content nc1">
											<a href="blog.php?category=<?php echo $category['cat_name'] ?>" class="top-blog"><?php echo $category['cat_name'] ?></a>
											<span><i class="fa fa-comment" aria-hidden="true"></i> 11 blogs </span>
										</div>
									</div>
							</div>
									<?php
										}
									}
									?>
						</div>
                    </div>

                </div>
                <div class="body-right">
                    <p class="blog align5">All Posts</p>
					<div class="container" style="height: 540px;">
						<?php
							//Columns must be a factor of 12 (1,2,3,4,6,12)
							$numOfCols = 1;
							$rowCount = 0;
							$bootstrapColWidth = 12 / $numOfCols;
						
							$page = 1;
							$query = "";
							if ( isset($_GET['search'])) {
								if ( empty($_GET['search'])) {
									Redirect_To('halloffame.php');
								}else {
									$search = $_GET['search'];
									$query = "SELECT * FROM post WHERE post_date_time LIKE '%$search%' OR title LIKE '%$search%' OR category LIKE '$search%' LIMIT 6";
								}
							}else if ( isset($_GET['category'])) {
								$query = "SELECT * FROM post WHERE category = '$_GET[category]' LIMIT 5";
							}else if ( isset($_GET['page'])){
								$page = $_GET['page'];
								$showPost = ($page * 6) - 6;
								if ($page <= 0) {
									$showPost = 0;
								}
									$query = "SELECT * FROM post ORDER BY post_date_time DESC LIMIT $showPost,6";
							}else{
									$query = "SELECT * FROM post ORDER BY post_date_time DESC LIMIT 0,6";
							}

							$exec = Query($query) or die(mysqli_error($con));
							if( $exec ) {
								if (mysqli_num_rows($exec) > 0) {
									while ( $post = mysqli_fetch_assoc($exec) ) {
										$post_id = $post['post_id'];
										$post_date = $post['post_date_time'];
										$post_title = $post['title'];
										$post_category = $post['category'];
										$post_author = $post['author'];
										$post_image = $post['image'];
										$views = $post['views'];
										$post_content = substr($post['post'], 0,70) . '...';
										$rows = array(1);
										
										foreach ($rows as $row){
											if($rowCount % $numOfCols == 0) {
						?>
							
						<div class="row">
								<?php }
									$rowCount++;
								?>
							<div class="col-lg-<?php echo $bootstrapColWidth; ?>">
								<div class="blog-1">
									<p class="top-blog"><?php echo htmlentities($post_title); ?></p>
									<p class="about about2"><?php echo htmlentities($post_content); ?></p>
									<div class="views">
										<p class="vp1"><?php echo htmlentities($views); ?><p>
										<p class="vp2">views<p>
									</div>
									<a href="seepost.php?id=<?php echo $post_id;?>" class="read read-2">Read More</a>
								</div>
							</div>
								<?php
									if($rowCount % $numOfCols == 0) {
								?>
						</div>
							<?php 	
										}

									}
								}

								}else {
									echo "<span class='lead'>No result<span>";
								}
							   }
							?>
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
										<li><a href="blog.php?page=<?php echo $page - 1; ?>"><</a></li>
											<?php
												}
												$sql = "SELECT COUNT(*) FROM post";
												$exec = Query($sql);
												$rowCount = mysqli_fetch_array($exec);
												$totalRow = array_shift($rowCount);
												$postPerPage = ceil($totalRow / 6);

												for ($count = 1; $count <= $postPerPage; $count++){
													if ($page == $count) {
											?>
							            <li class="active"><a href="blog.php?page=<?php echo $count ?>"><?php echo $count ?></a></li>
											<?php
												}else {
											?>
										<li><a href="blog.php?page=<?php echo $count ?>"><?php echo $count ?></a></li>
											<?php
												}		
											}
											if($page < $postPerPage) {
											?>
							            <li><a href="blog.php?page=<?php echo $page + 1; ?>">></a></li>
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
	  <script>
		var dt = new Date();
		document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));
      </script>
	  
</body>
</html>