<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<table>
	<tr>
    <th>id</th>
    <th>name</th>
    <th>quantity</th>
    <th>action</th>
  </tr>
  <?php  
  foreach ($produits as $produit) 
  {
  	echo "<tr><td>".$produit['id']."</td><td>".$produit['name']."</td><td>".$produit['quantity']."</td><td>
  			<a href='http://localhost/projetmvc/produit/delete/".$produit['id']."'>delete</a>
  			<a href='http://localhost/projetmvc/produit/edit/".$produit['id']."'>edit</a>
  		<td></tr>";
  }
  ?>
  
</table>
</body>
</html>