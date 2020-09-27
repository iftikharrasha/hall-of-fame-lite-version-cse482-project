<?php
require_once('./includes/sessions.php');
require_once('./includes/functions.php');

if ( isset($_GET['id']) ) {
	    $post_id = $_GET['id'];
		$post_title = "";
	    $query = "UPDATE post SET views = views+1 WHERE post_id = '$post_id'";
		$exec = Query($query);
		
		$sql = "SELECT * FROM post WHERE post_id = '$post_id'";
		$exec = Query($sql);
		if ($title = mysqli_fetch_assoc($exec)) {
			$post_title = $title['title'];
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOF | Profile</title>
    <link rel="stylesheet" href="https://use.typekit.net/nfp7kim.css">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
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
            <p class="date"><span id="datetime"></span></p>

        </div>
    </div>

    <div class="wrapped">
        <div class="top-wrapper">
            <div class="story-btn">
                <a href="addpost.php">Add Your Story +</a>
            </div>
        </div>
        <div class=" post-wrapper">
		    <?php
                if( isset($_GET['id'])) {
                  $query = "SELECT * FROM post WHERE post_id = '$_GET[id]'";
                  $exec = Query($query);
                  if (mysqli_num_rows($exec) > 0) {
                    while ($post = mysqli_fetch_assoc($exec) ) {
                      $post_id = $post['post_id'];
                      $post_date = $post['post_date_time'];
                      $post_title = $post['title'];
                      $post_category = $post['category'];
                      $post_author = $post['author'];
                      $post_image = $post['image'];
                      $post_content = $post['post'];
            ?>
					
            <div class="section">
                <h1 class="title"><?php echo htmlentities($post_title); ?></h1>
                <p class="cat-date"><i class="fa fa-calendar"></i> <?php echo htmlentities($post_date); ?></p>

            </div>

            <div class="section">
                <p class="desc"><?php echo nl2br($post_content); ?></p>
                <div class="image">
                    <img class=""
                        src="images/upload/<?php echo $post_image; ?>"
                        alt="image">
                    <p><?php echo $post_author; ?></p>
                    <p><?php echo $post_category; ?></p>
                    <div class="reacts">
                        <i class="fa fa-heart heart"> 34</i>
                        <i class="fa fa-eye view"> 124</i>
                    </div>
                </div>


            </div>
			
			<?php
     							}
     						}
     					}else {
     						Redirect_To('index.php');
     					}
     				?>
					
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