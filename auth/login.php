<?php session_start();

$student = [
  'username' => 'student',
  'password' => 'secretpassword'
];

$librarian = [
  'username' => 'librarian',
  'password' => 'secretpassword'
];

if (!isset($_POST)) {
  echo 'asdf';
}

if (($_POST['username'] == $student['username']) && ($_POST['password'] == $student['password'])) {
  $_SESSION['user'] = $student['username'];
  return header('Location: ../pages/books.php');
}

if (($_POST['username'] == $librarian['username']) && ($_POST['password'] == $librarian['password'])) {
  $_SESSION['user'] = $librarian['username'];
  return header('Location: ../pages/books.php');
}

$_SESSION['error'] = 'Invalid username or password';
return header('Location: ../index.php');

