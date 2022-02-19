<?php 

require_once __DIR__."/../model/Produit.php";
/**
 * 
 */
class ProduitController
{
	
	public function __construct()
	{
		
	}

	public function index()
	{
		$produits=Produit::select();
		require_once __DIR__."/../view/produit/index.php";
	}

	public function create()
	{
		require_once __DIR__."/../view/produit/create.php";
	}

	public function save()
	{
		$name=$_POST['name'];
		$quantity=$_POST['quantity'];
		$produit=new Produit($name,$quantity);
		$produit->save();
		header("Location: http://localhost/projetmvc/produit/index");
	}

	public function edit($id)
	{
		$produit=Produit::edit($id);
		require_once __DIR__."/../view/produit/edit.php";
	}

	public function update($id)
	{
		$name=$_POST['name'];
		$quantity=$_POST['quantity'];
		$produit=new Produit($name,$quantity);
		$produit->update($id);
		header("Location: http://localhost/projetmvc/produit/index");
	}
	public function delete($id)
	{
		$produits=Produit::delete($id);
		header("Location: http://localhost/projetmvc/produit/index");
	}


}