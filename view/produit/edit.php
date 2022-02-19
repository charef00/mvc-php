<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>edit produit</title>
</head>
<body>
<h1>Edit Produit</h1>
	<form action="http://localhost/projetmvc/produit/update/<?=$produit['id']?>" method="POST">
		<label>name</label>
		<input type="text" name="name" value="<?=$produit['name']?>"><br>
		<label>quantity</label>
		<input type="number" name="quantity" value="<?=$produit['quantity']?>"><br>
		<button>update</button>
	</form>

</body>
</html>