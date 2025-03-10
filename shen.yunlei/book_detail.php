<?php 
		
	include_once "lib/php/functions.php";
	include_once "parts/templates.php";
	$product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0];

	$images = explode(",", $product->images);

	$image_elements = array_reduce($images, function($r,$o){
		return $r."<img src='$o'>";
	});

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Book Detail</title>
	
	<?php include "parts/meta.php"; ?>


	<script src="js/product_thumbs.js"></script>
</head>
<body>

	<?php include "parts/navbar.php"; ?>
	
	<div class="container">
		<h2>Book Details</h2>
		<nav>
			<a href="shop.php">Back</a>
		</nav>

		<div class="grid gap">
			<div class="col-xs-12 col-md-7 ">
				<div class="card soft">
					<div class="image-main">
						<img src="<?= $product->thumbnail ?>">
					</div>
					<div class="image-thumbs">
						<?= $image_elements ?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-5">
				<form class="card soft flat" method="post" action="cart_actions.php?action=add-to-cart">
					<input type="hidden" name="product-id" value="<?=$product->id ?>">

					<div class="card-section">
						<h2 class="product-title"><?=$product->title ?></h2>
						<div class="product-price">&dollar;<?=$product->price ?></div>
					</div>

					<div class="card-section">
						<h2>Description</h2>
						<p style="text-align: left;"><?= $product->description ?></p>
					</div>

					<div class="card-section">
						<div class="form-control">
							<label for="product-amount" class="form-label">Amount</label>
							<div class="form-select">
								<select id="product-amount" name="product-amount">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
								</select>
							</div>
						</div>


						<div class="form-control">
							<label for="product-format" class="form-label">Format</label>
							<div class="form-select">
								<select id="product-format" name="product-format">
									<option>Audible</option>
									<option>Paperback</option>
									<option>Hardcover</option>
								</select>
							</div>
						</div>
					</div>


					<div class="card-section">
						<input type="submit" class="form-button" value="Add To Cart">
					</div>
				</form>
			</div>
		</div>


		<h2>Books you may like</h2>
		<?php recommendedSimilar($product->genre,$products->id); ?>


		
	</div>

	<?php include "parts/footer.php" ?>

</body>
</html>