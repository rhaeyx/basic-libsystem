<?php session_start(); 
include '../connect.php';
if ($_SESSION['user'] != 'librarian') return header('Location: /index.php');

if (!isset($_GET['id'])) {
  return header('Location: /pages/books.php');
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM books WHERE `id` = '$id'";
  $result = $mysqli->query($query);
  $book = $result->fetch_assoc();
  $unarchive = $book['archived'] ? 0 : 1;

  $query = "UPDATE `books` SET `archived`=$unarchive WHERE `id` = '$id'";
  $result = $mysqli->query($query);

  $_SESSION['msg'] = "Successfully updated book: ".$book['id']." - ".$book['title'];
  return header('Location: /pages/books.php');
} 
?>

<?php include '../header.php' ?>
<?php include '../navbar.php' ?>