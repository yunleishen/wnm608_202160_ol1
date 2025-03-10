<?php 

include_once 'lib/php/functions.php';
include_once "parts/templates.php";

$cart = getCartItems();

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<title>Check Out</title>
	<?php include "parts/meta.php"; ?>
</head>
<body>

	<?php include "parts/navbar.php"; ?>
	


	<div class="container">
		<div class="grid gap">
			<div class="col-xs-12 col-md-5">
				<div class="card soft">
					<h2>Item Review</h2>
					<div class="card-section">
					<?php  

					echo array_reduce($cart, function($r,$o){
						$totalfixed = number_format($o->total,2,'.','');
						return $r."<div class = 'display-flex'>
								<div class = 'flex-stretch'>$o->title</div>
								<div class = 'flex-none'>&dollar;$totalfixed</div>
								</div>";
					})
					?>
					</div>
					<?= cartTotals(); ?>
				</div>
			</div>
			<div class="col-xs-12 col-md-7">
				<div class="card soft">
					<h2>Check Out</h2>


					<form class="from">
						<h2>Address</h2>
						<div class="container" id="forms">
							<div class="form-control">
								<label class="form-label">Street address</label>
								<input type="text" placeholder="Street address" class="form-input">
							</div>
							<div class="form-control">
								<label class="form-label">Zip</label>
								<input type="number" placeholder="Zip" class="form-input">
							</div>
							<div class="form-control">
								<label class="form-label">City</label>
								<input type="text" placeholder="City" class="form-input">
							</div>
							<div class="form-control">
								<label class="form-label">State</label>
								<div class="form-select">
									<select>
										<option value="">AL</option>
										<option value="">AK</option>
										<option value="">AS</option>
										<option value="">AZ</option>
										<option value="">AR</option>
										<option value="">CA</option>
										<option value="">CO</option>
										<option value="">CT</option>
										<option value="">DE</option>
										<option value="">DC</option>
										<option value="">FL</option>
										<option value="">GA</option>
										<option value="">GU</option>
										<option value="">HI</option>
										<option value="">ID</option>
										<option value="">IL</option>
										<option value="">IN</option>
										<option value="">IA</option>
										<option value="">KS</option>
										<option value="">KY</option>
										<option value="">LA</option>
										<option value="">ME</option>
										<option value="">MD</option>
										<option value="">MA</option>
										<option value="">MI</option>
										<option value="">MN</option>
										<option value="">MS</option>
										<option value="">MO</option>
										<option value="">MT</option>
										<option value="">NE</option>
										<option value="">NV</option>
										<option value="">NH</option>
										<option value="">NJ</option>
										<option value="">NM</option>
										<option value="">NY</option>
										<option value="">ND</option>
										<option value="">MP</option>
										<option value="">OH</option>
										<option value="">OK</option>
										<option value="">OR</option>
										<option value="">PA</option>
										<option value="">PR</option>
										<option value="">RI</option>
										<option value="">SC</option>
										<option value="">SD</option>
										<option value="">TN</option>
										<option value="">TX</option>
										<option value="">TU</option>
										<option value="">VT</option>
										<option value="">VA</option>
										<option value="">VI</option>
										<option value="">WA</option>
										<option value="">WV</option>
										<option value="">WI</option>
										<option value="">WY</option>
									</select>
								</div>
							</div>
						</div>
				

						<h2>Payment</h2>
						<div class="form-control">
							<lable for="payment-name" class="form-label">Full Name</lable>
							<input id="payment-name" type="text" placeholder="Name" class="form-input">
						</div>
						<div class="form-control">
							<lable for="payment-number" class="form-label">Card Number</lable>
							<input id="payment-number" type="text" placeholder="####-####-####-####" class="form-input">
						</div>
						<div class="form-control">
							<div class="grid gap">
								<div class="col-xs-12 col-md-6">
									<lable for="payment-expiration" class="form-label">Expiration</lable>
									<input id="payment-expiration" type="text" placeholder="MM-YY" class="form-input">
								</div>
								<div class="col-xs-12 col-md-6">
									<lable for="payment-CVV" class="form-label">CVV</lable>
									<input id="payment-CVV" type="text" placeholder="CVV" class="form-input">
								</div>
							</div>
						</div>
						<div class="form-control">
							<lable for="payment-zip" class="form-label">Zip Code</lable>
							<input id="payment-zip" type="text" placeholder="Zip Code" class="form-input">
						</div>
						<div class="form-control">
							<a href="comfirmation.php" class="form-button">Place Order</a>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>



	<?php include "parts/footer.php" ?>

</body>
</html>










