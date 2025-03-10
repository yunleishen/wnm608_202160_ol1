<?php 



function bookListTemplate($r,$o){

	return $r.<<<HTML

	<a class="col-xs-12 col-md-4" href="book_detail.php?id=$o->id">
		<figure class="figure product">
			<img src="$o->thumbnail" alt="">
			<figcaption>
				<div>$o->title</div>
				<div>&dollar;$o->price</div>
			</figcaption>
		</figure>
	</a>


	HTML;
}

function selectAmount($amount=1,$total=10){
	$output = "<select name='amount'>";
	for($i=1;$i<=$total;$i++){
		$output .="<option ".($i==$amount?"selected":"").">$i</option>";
	}
	$output .= "</select>";
	return $output;
}


function cartListTemplate($r,$o){

	$totalfixed = number_format($o->total,2,'.','');
	$selectamount = selectAmount($o->amount,10);
	return $r.<<<HTML
	<div class="display-flex" style="padding-top: 2em;">

	<div class="flex-none image-thumbs">
		<img src="$o->thumbnail">
	</div>
	<div class="flex-stretch">
		<strong>$o->title</strong>
		<form action="cart_actions.php?action=delete-cart-item" method="post" style="font-size: 0.8em; padding-top: 2em;">
			<input type="hidden" name="id" value="$o->id">
			<button type="submit" class="form-button inline" value="Delete">Delete</button>
		</form>
	</div>
	<div class="flex-none">
		<div>&dollar;$totalfixed</div>
		<form action="cart_actions.php?action=update-cart-item" method="post" onchange="this.submit()">
			<input type="hidden" name="id" value="$o->id">
			<div class="form-select" style="font-size: 0.8em; padding-top: 4em;">
				$selectamount
			</div>
		</form>
	</div>

	</div>
	HTML;
}




function cartTotals(){
	$cart = getCartItems();

	$cartprice = array_reduce($cart,function($r,$o){return $r + $o->total;},0);

	$pricefixed = number_format($cartprice,2,'.','');
	$taxfixed = number_format($cartprice*0.0725,2,'.','');
	$taxedfixed = number_format($cartprice*1.0725,2,'.','');


	return <<<HTML

	<div class="card-section display-flex">
		<div class="flex-stretch"><strong>Sub Total</strong></div>
		<div class="flex-none">&dollar;$pricefixed</div>
	</div>
	<div class="card-section display-flex">
		<div class="flex-stretch"><strong>Tax</strong></div>
		<div class="flex-none">&dollar;$taxfixed</div>
	</div>
	<div class="card-section display-flex">
		<div class="flex-stretch"><strong>Total</strong></div>
		<div class="flex-none">&dollar;$taxedfixed</div>
	</div>


HTML;
}




function recommendedProducts($a){
	$products = array_reduce($a,'bookListTemplate');

echo <<<HTML
	<div class="grid gap productlist">
		$products
	</div>
HTML;
}




function  recommendedAnything($limit=3){
	$result = makeQuery(makeConn(),"SELECT * FROM `products` ORDER BY rand() DESC LIMIT $limit");

	recommendedProducts($result);
}

function  recommendedGenre($genre,$limit=3){
	$result = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `genre`='$genre' ORDER BY `date_create` DESC LIMIT $limit");

	recommendedProducts($result);
}


function  recommendedSimilar($genre,$id=0,$limit=3){
	$result = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `genre`='$genre' AND `id`<>'$id' ORDER BY rand() LIMIT $limit");

	recommendedProducts($result);
}







