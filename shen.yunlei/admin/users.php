<?php

include "../lib/php/functions.php";

$users = file_get_json("../data/users.json");




function showUserPage($user){

$classes = implode(",", $user->classes);

//heredoc
echo <<<HTML
<nav class="nav">
	<ul>
		<li><a href="admin/users.php">Back</a></li>
	</ul>
</nav> 
<div>
	<h2>$user->name</h2>
	<div>
		<strong>Type</strong>
		<span>$user->type</span>
	</div>
	<div>
		<strong>Email</strong>
		<span>$user->email</span>
	</div>
	<div>
		<strong>Classes</strong>
		<span>$classes</span>
	</div>
</div>
HTML;
}






?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<title>User Admin Page</title>
	<?php include "../parts/meta.php"; ?>
</head>
<body>

	<header class="navbar">
		<div class="container display-flex">
			<div class="flex-none">
				<h1>User Admin</h1>
			</div>
			<div class="flex-stretch"></div>
			<div class="flex-none">
				<nav class="nav-flex flex-none">
					<ul>
						<li><a href="admin/users.php">User List</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	
	<div class="container">

		<div class="card soft">

			<?php 

			if (isset($_GET['id'])) {
				showUserPage($users[$_GET['id']]);
			} else {

			 ?>
			<h2>User List</h2>

			<nav class="nav">
				<ul>
			
			<?php 
			
			for($i=0;$i<count($users);$i++){
				echo "<li>
					<a href='admin/users.php?id=$i'>{$users[$i]->name}</a>
					<span>{$users[$i]->type}</span>
				</li>";
			}

			 ?>
			 	
			 	</ul>
			</nav>

			<?php } ?>
		</div>
	</div>


	


	<?php include "../parts/footer.php" ?>
</body>
</html>