<?php include "header.php" ?>
<body>
  <div class="container-scroller">
    <?php include "topnav.php" ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include "sidebar.php" ?>
      <!-- partial -->
	  <?php 
	  $pages_dir = 'pages';
			if(!empty($_GET['p'])){
				$pages = scandir($pages_dir, 0);
				unset($pages[0], $pages[1]);
	 
				$p = $_GET['p'];
				if(in_array($p.'.php', $pages)){
					include($pages_dir.'/'.$p.'.php');
				} else {
					include($pages_dir.'/404.php');
				}
			} else {
				include($pages_dir.'/home.php');
			}
	  
	  ?>
      
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<?php include "footer.php" ?>