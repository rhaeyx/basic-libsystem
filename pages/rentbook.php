<?php session_start(); 
include '../connect.php';
if ($_SESSION['user'] != 'student') return header('Location: /index.php');

if (!isset($_GET['id'])) {
  return header('Location: /pages/books.php');
}

if (isset($_GET['id'])) {
  $query = "SELECT COUNT(*) as count FROM books WHERE `rented`=1";
  $result = $mysqli->query($query);
  $rented_books = $result->fetch_assoc()['count'];
  
  $id = $_GET['id'];
  $query = "SELECT * FROM books WHERE `id` = '$id'";
  $result = $mysqli->query($query);
  $book = $result->fetch_assoc();
  $unrent = $book['rented'] ? 0 : 1;

  if ($unrent == 1) {
    if ($rented_books >= 2) {
      $_SESSION['error'] = "Cannot rent more than 2 books at once. Return the books you rented first.";
      return header('Location: /pages/books.php');
    }
    if ($book['archived'] == 1) {
      $_SESSION['error'] = "Cannot borrow an archived book.";
      return header('Location: /pages/books.php');
    }
  }

  $query = "UPDATE `books` SET `rented`=$unrent WHERE `id` = '$id'";
  $result = $mysqli->query($query);

  $oneWeekFromNow = strtotime('+1 week');  // Get the timestamp for a week from now
  $dayOfWeek = date('l', $oneWeekFromNow);  // Get the day of the week
  $date = date('F j, Y', $oneWeekFromNow);  // Get the date

  $_SESSION['msg'] = "Successfully returned book: ".$book['id']." - ".$book['title']." | Fine: Php 0.00";
  if ($unrent == 1) {
    $_SESSION['msg'] = "Successfully rented book: ".$book['id']." - ".$book['title']." due on $date ($dayOfWeek)";
  }
  return header('Location: /pages/rentedbooks.php');
} 
?>

<?php include '../header.php' ?>
<?php include '../navbar.php' ?>