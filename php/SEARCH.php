<?php
require("CRUD.php");

class Item extends Crud {
  private $category;
  private $author;
  private $title;
  
  public function __construct($category, $author, $title) {
    $this->category = $category;
    $this->author = $author;
    $this->title = $title;
  }
  
  public function getCategory() {
    return $this->category;
  }
  
  public function getAuthor() {
    return $this->author;
  }
  
  public function getTitle() {
    return $this->title;
  }
}

$items = array(
  new Item('category1', 'author1', 'title1'),
  new Item('category2', 'author2', 'title2'),
  new Item('category1', 'author3', 'title3'),
  new Item('category3', 'author1', 'title4'),
  new Item('category2', 'author4', 'title5'),
);

function filterItems($items, $category = null, $author = null, $title = null) {
  $filteredItems = array();
  
  foreach($items as $item) {
    if(($category == null || $item->getCategory() == $category) &&
       ($author == null || $item->getAuthor() == $author) &&
       ($title == null || $item->getTitle() == $title)) {
      array_push($filteredItems, $item);
    }
  }
  
  return $filteredItems;
}

// Example usage
$category = 'category1';
$author = 'author1';
$title = 'title1';

$filteredItems = filterItems($items, $category, $author, $title);

foreach($filteredItems as $item) {
  echo $item->getTitle() . ' by ' . $item->getAuthor() . ' in ' . $item->getCategory() . '<br>';
}
























class Item {
  private $id;
  private $category;
  private $author;
  private $title;
  
  public function __construct($id, $category, $author, $title) {
    $this->id = $id;
    $this->category = $category;
    $this->author = $author;
    $this->title = $title;
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function getCategory() {
    return $this->category;
  }
  
  public function getAuthor() {
    return $this->author;
  }
  
  public function getTitle() {
    return $this->title;
  }
}

class Database {
  private $host;
  private $username;
  private $password;
  private $dbname;
  private $conn;
  
  public function __construct($host, $username, $password, $dbname) {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;
    
    $this->conn = new mysqli($host, $username, $password, $dbname);
    
    if($this->conn->connect_error) {
      die('Connection failed: ' . $this->conn->connect_error);
    }
  }
  
  public function filterItems($category = null, $author = null, $title = null) {
    $sql = "SELECT * FROM items WHERE 1";
    
    if($category) {
      $sql .= " AND category LIKE '%" . $this->conn->real_escape_string($category) . "%'";
    }
    
    if($author) {
      $sql .= " AND author LIKE '%" . $this->conn->real_escape_string($author) . "%'";
    }
    
    if($title) {
      $sql .= " AND title LIKE '%" . $this->conn->real_escape_string($title) . "%'";
    }
    
    $result = $this->conn->query($sql);
    
    $items = array();
    
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $item = new Item($row['id'], $row['category'], $row['author'], $row['title']);
        array_push($items, $item);
      }
    }
    
    return $items;
  }

  
}

// Example usage
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mydb';

$db = new Database($host, $username, $password, $dbname);

$category = 'Books';
$author = 'John Doe';

$filteredItems = $db->filterItems($category, $author);

foreach($filteredItems as $item) {
  echo $item->getTitle() . ' by ' . $item->getAuthor() . ' in ' . $item->getCategory() . '<br>';
}






















?>