# Welcome to the PHP MVC architecture

This is a simple MVC design pattern for building web applications in PHP. It's free and open source.

The live coding explains how the mvc architecture is put together, building it step-by-step, from scratch. If you've attended the the live coding, then you'll already know how to use it. If not, please follow the instructions below.

## Starting an application by creating the folders

1. models      for the m 
2. view        for the v
3. controllers for the c
4. create route or index file
5. create .htaccess to redirect the http request to router
## .htaccess
RewriteRule ^([a-zA-Z0-9\-\_\/]*)$ roote.php?p=$1
This line of code takes the text of the url and redirects it to the route.php file with a GET request.

## router
most of the php frameworks (laravel , symfony.. etc) have a convention on http request, that means url is created as yourdomain/controller/action/parameter.
therefore our router allows to split this url to find the controler , the method and the parameter if exists.

#controller 
Controllers respond to user actions (clicking on a link, submitting a form etc.). Controllers are stored in the `Controller` folder.
the file have the same name of controller example :the class HomeController stored in file HomeController.php 
every controller have is action : 
{
  index : display all elements, 
  create : form for create new element, 
  save : save element , 
  edit: form for edit element , 
  update : update element ,
  and delete or destroy: delete element
}
Example :
```php
/**
 * doc of controller class
 * @ param
 * @return void
 */
class ProduitController
{
	
	public function __construct()
	{
		
	}
  
	public function index()
	{
	}
	public function create()
	{
	}

	public function save()
	{
	}

	public function edit($id)
	{
	}

	public function update($id)
	{
	}
	public function delete($id)
	{
	}


}
```
## Views
Views are used to display information (normally HTML). View files go in the `View/produit` folder (view for ProduitController). 
Views can be in one of two formats: standard PHP, but with just enough PHP to show the data. 
No database access or anything like that should occur in a view file. You can render a standard PHP view in a controller, 
optionally passing in variables, like this:
```php
/**
 * get all produict from database and send them to view index.php.
 * the view have same name of action 
 * @return void
 */
public function index()
	{
		$produits=Produit::select();
		require_once __DIR__."/../view/produit/index.php";
	}
```
## Models

Models are used to get and store data in your application. They know nothing about how this data is to be presented in the views.
Model  use [PDO](http://php.net/manual/en/book.pdo.php) to access the database.
They're stored in the `model` folder . 
for example general model for create connection and make request SQL :
```php
class Connection
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database="yourdatabasename";
	private $conn;

	public function __construct()
	{

		try {
			  $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
			  // set the PDO error mode to exception
			 
		
			} catch(PDOException $e) 
			{
			  echo "Connection failed: " . $e->getMessage();
			}
	}

	public function insert($table,$tableCln,$tableVal)
	{
		$names="";
		$values="";
		$vrls="";
		for ($i=0; $i <count($tableCln) ; $i++) 
		{ 
			if ($i>0) 
			{
				$vrls=",";
			}
			$names.=$vrls."`".$tableCln[$i]."`";
			$values.=$vrls."'".$tableVal[$i]."'";
		}
		$str="INSERT INTO `$table`(".$names.") VALUES (".$values.")";
		$query=$this->conn->prepare($str);
		$query->execute();
	}

	public function selectAll($table)
	{
		$query=$this->conn->prepare("SELECT * FROM `$table`");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public function selectOne($table,$id)
	{
		$query=$this->conn->prepare("SELECT * FROM `$table` where id=$id");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC)[0];
	}
	public function update($table,$tableCln,$tableVal,$id)
	{
		$names="";
		$vrls="";
		for ($i=0; $i <count($tableCln) ; $i++) 
		{ 
			if ($i>0) 
			{
				$vrls=",";
			}
			$names.=$vrls."`".$tableCln[$i]."`='".$tableVal[$i]."'";
		}
		$str="UPDATE $table SET $names WHERE id=$id";
		$query=$this->conn->prepare($str);
		$query->execute();
	}
	public function delete($table,$id)
	{
		$query=$this->conn->prepare("DELETE FROM `$table` WHERE id=$id");
		$query->execute();
	}



}

```
