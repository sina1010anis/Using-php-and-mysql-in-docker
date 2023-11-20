<?php
//return phpinfo();

echo "Docker PHP 2".'<br><br>';


class DBConnect 
{
  private static $servername = 'db';
  private static $username = "root";
  private static $password = "password";
  private static $dbname = "php_docker";

  public static function connection ()
  {
    $conn = new PDO("mysql:host=".self::$servername.";dbname=".self::$dbname, self::$username, self::$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  }

  public static function selectData()
  {
    $stmt = self::connection()->prepare("SELECT * FROM products");
    $stmt->execute();

    return $stmt;
  }

  public static function viewData () 
  {
    foreach(self::selectData()->fetchAll() as $k=>$v) {
      echo 'Name product =><b style="color:red">'.$v['name'].'</b> - Price product => <b  style="color:red">' .$v['price'].'</b><br><br>';
    }
  }
  public static function connect()
  {
    self::connection();
    self::selectData();
    self::viewData();
  }
}

DBConnect::connect();
