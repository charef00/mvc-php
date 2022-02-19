<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create produit</title>
</head>
<body>

	<form action="http://localhost/projetmvc/produit/save" method="POST">
		<label>name</label>
		<input type="text" name="name"><br>
		<label>quantity</label>
		<input type="number" name="quantity"><br>
		<button>save</button>
	</form>

</body>
</html>