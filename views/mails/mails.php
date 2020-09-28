<?php
require_once('../../includes/sessions.php');
require_once('../../includes/functions.php');

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("Location:../../index.php?login_first");
}

if ( isset( $_POST['delmail-submit'])) {
	$mailid=$_POST['delete_id'];
   
    $result="DELETE FROM contact WHERE contact_id='$mailid'";
	$exec = Query($result);

    if($exec) {
		$_SESSION['successMessage'] = "Mail Deleted Successfully";
		Redirect_To('mails.php?deletesuccess');
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
  <title>Admin | Mails List
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
                    <a href="">Mails List
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
                    <a href="../mails/mails.php"><i class="fa fa-envelope"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-bell"></i>
                    </a>
                  </li>
                  <li>
                    <a href="../admin/jsonread.php"><?php echo $_SESSION['username']; ?><i class="fa fa-chevron-down"></i>
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
                <ul class="nav child_menu">
                  <li><a href="../post/managepost.php">Manage Posts</a></li>
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
				$sql = "SELECT * FROM contact ORDER BY date_time";
			
                $exec = Query($sql);
							
                if (mysqli_num_rows($exec) < 1) {
			?>
				<p class="bdl2_message">You have 0 Mails at the moment!</p>
				
					<?php
						}else{
					?>
					
			<div class="container">
			        
				<div class="row">
					<div class="col-lg-12" style="height: 540px;">
                    <p class="bdl2_message" style="left: 25px;">
							<?php echo Message(); ?>
						</p>
          <form action="userlist.php">
          
						
			    <table class="body-users">
				
					<tbody>
					    <tr>
							<th>Mail No.</th>
							<th>Date time</th>
							<th>Mail</th>
                            <th>Query</th>
							<th>Delete</th>
					    </tr>

							<?php
								while ($post = mysqli_fetch_assoc($exec)) {
                                $id = $post['contact_id'];
								$post_date = $post['date_time'];
                                $query = $post['query'];
								$eml = $post['mail'];
							
							?>

					    <tr>
							<td><?php echo $postNo; ?></td>
							<td><?php echo $post_date; ?></td>
							<td><?php echo $eml; ?></td>
							<td><?php echo $query; ?></td>

              <td>
							<form action="mails.php?delete_mail_id=<?php echo $id;?>" method="post">
								<input type="hidden" name="delete_id" value="<?php echo $id;?>">
								<button type="submit" name="delmail-submit" class="btn btn-sm btn-info waves-effect waves-light" onclick="return confirm('Are you sure to delete this data?')"><i class="fa fa-trash-o"></i></button>
							</form>
              </td>
              
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