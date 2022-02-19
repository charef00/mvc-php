<?php 

require_once "Connection.php";

/**
 * 
 */
class Produit
{
	private $table="produits";
	private $name;
	private $quantity;
	function __construct($name,$quantity)
	{
		$this->name=$name;
		$this->quantity=$quantity;
	}


	public function save()
	{
		$ctn=new Connection();
		$ctn->insert($this->table,["name","quantity"],[$this->name,$this->quantity]);
	}

	public static function select()
	{
		$ctn=new Connection();
		return $ctn->selectAll("produits");
	}

	public static function delete($id)
	{
		$ctn=new Connection();
		return $ctn->delete("produits",$id);
	}


	public static function edit($id)
	{
		$ctn=new Connection();
		return $ctn->selectOne("produits",$id);
	}

	public function update($id)
	{
		$ctn=new Connection();
		$ctn->update($this->table,["name","quantity"],[$this->name,$this->quantity],$id);
	}

}