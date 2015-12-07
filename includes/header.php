<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<head>
	<title><?=$title?></title>
	<meta charset="utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header">
		<div>
			<a href="index.php"><img class="logo" src="images/logo.png" width="513" height="84" alt="" title=""></a>
			<a href="index.php"><img  src="images/waitress.png" width="332" height="205" alt="" title=""></a>
			<ul class="navigation">
                
                <?=makeLinks($nav1,'<li>','</li>','<li class="active">')?>
                
                <!-- <li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="shake.php">Menu</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
				<li>
					<a href="blog.php">Blog</a>
				</li> -->
			</ul>
		</div>
	</div>
<div id="body">
        <div id="content">
            <div>
                <div>
        <!-- header ends here -->