<?php session_start(); 
include '../connect.php';
if ($_SESSION['user'] != 'librarian') return header('Location: /index.php');

if (!empty($_POST)) {
  // Perform the count query
  $query = "SELECT COUNT(*) as count FROM books";
  $result = $mysqli->query($query);
  $row = $result->fetch_assoc();
  $books = $row['count'] + 1;

  $title = $_POST['book_title'];
  $category = $_POST['category'];
  $publish_month = $_POST['publish_month'];
  $publish_year = $_POST['publish_year'];

  $id = substr(strtoupper($title), 0, 2) . substr(strtoupper($publish_month), 0, 3) . $publish_year . "-" . substr(strtoupper($category), 0, 3) . str_pad($books, 5, '0', STR_PAD_LEFT);
  $query = "INSERT INTO `books`(`id`, `title`, `publish_month`, `publish_year`, `category`) VALUES ('$id', '$title', '$publish_month', '$publish_year', '$category');";
  $result = $mysqli->query($query);
  if ($result) {
    $msg = "Successfully added.";
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
	<form action="addbook.php" method="POST">
    <div class="grid gap-6 mb-6 lg:grid-cols-2">
        <div class="col-span-2">
            <label for="book_title" class="block mb-2 text-sm font-medium text-gray-900 w-full">Book Title</label>
            <input type="text" id="book_title" name="book_title" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="col-span-2">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 w-full">Category</label>
            <input type="text" id="category" name="category" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div>
            <label for="publish_month" class="block mb-2 text-sm font-medium text-gray-900 ">Month Published</label>
            <input type="text" id="publish_month" name="publish_month" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div>
            <label for="publish_year" class="block mb-2 text-sm font-medium text-gray-900 ">Year Published</label>
            <input type="text" id="publish_year" name="publish_year" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="col-span-2 flex justify-end">
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add</button>
        </div>
    </div>
</form>
</div>