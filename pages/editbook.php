<?php session_start(); 
include '../connect.php';
if ($_SESSION['user'] != 'librarian') return header('Location: /index.php');

if (!isset($_GET['id']) && empty($_POST)) {
  return header('Location: /pages/books.php');
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM books WHERE `id` = '$id'";
  $result = $mysqli->query($query);
  $book = $result->fetch_assoc();
} 

if (!empty($_POST)) {
  $id = $_POST['book_id'];
  $title = $_POST['book_title'];
  $category = $_POST['category'];
  $publish_month = $_POST['publish_month'];
  $publish_year = $_POST['publish_year'];

  $query = "UPDATE `books` SET `title`='$title', `category`='$category', `publish_month`='$publish_month', `publish_year`='$publish_year' WHERE `id` = '$id'";
  $result = $mysqli->query($query);
  if ($result) {
    $msg = "Successfully updated.";
    return header('Location: /pages/books.php');
  } else {
    $msg = "Something went wrong, please try again later.";
  }
}
?>

<?php include '../header.php' ?>
<?php include '../navbar.php' ?>

<div class="max-w-2xl mx-auto bg-white p-16">
  <?php if (isset($msg)): ?>
    <div
      class="mb-4 rounded-lg bg-green-100 px-6 py-5 text-base text-green-700"
      role="alert">
      <?php echo $msg; ?>
    </div>
  <?php endif; ?>
	<form action="editbook.php" method="POST">
    <div class="grid gap-6 mb-6 lg:grid-cols-2">
        <div class="col-span-2">
            <label for="book_title" class="block mb-2 text-sm font-medium text-gray-900 w-full">Book ID</label>
            <input value="<?php echo $book['id'] ?>" type="hidden" id="book_id" name="book_id" class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            <input disabled value="<?php echo $book['id'] ?>" type="text" class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="col-span-2">
            <label for="book_title" class="block mb-2 text-sm font-medium text-gray-900 w-full">Book Title</label>
            <input value="<?php echo $book['title'] ?>" type="text" id="book_title" name="book_title" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="col-span-2">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 w-full">Category</label>
            <input value="<?php echo $book['category'] ?>" type="text" id="category" name="category" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div>
            <label for="publish_month" class="block mb-2 text-sm font-medium text-gray-900 ">Month Published</label>
            <input value="<?php echo $book['publish_month'] ?>" type="text" id="publish_month" name="publish_month" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div>
            <label for="publish_year" class="block mb-2 text-sm font-medium text-gray-900 ">Year Published</label>
            <input value="<?php echo $book['publish_year'] ?>" type="text" id="publish_year" name="publish_year" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="col-span-2 flex justify-end">
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update</button>
        </div>
    </div>
</form>
</div>