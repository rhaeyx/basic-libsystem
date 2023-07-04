<?php session_start();
include '../connect.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM books WHERE `id` = '$id'";
  $result = $mysqli->query($query);
  $book = $result->fetch_assoc();
} else {
  return header('Location: /pages/books.php');
}

?>
<?php include '../header.php' ?>
<?php include '../navbar.php' ?>
<div class="max-w-2xl mx-auto bg-white p-16">
  <div class="grid gap-6 mb-6 lg:grid-cols-2">
      <div class="col-span-2">
          <label for="book_title" class="block mb-2 text-sm font-medium text-gray-900 w-full">Book Title</label>
          <span class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"><?php echo $book['title'] ?></span>
      </div>
      <div class="col-span-2">
          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 w-full">Category</label>
          <span class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"><?php echo $book['category'] ?></span>
      </div>
      <div>
          <label for="publish_month" class="block mb-2 text-sm font-medium text-gray-900 ">Month Published</label>
          <span class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"><?php echo $book['publish_month'] ?></span>
      </div>
      <div>
          <label for="publish_year" class="block mb-2 text-sm font-medium text-gray-900 ">Year Published</label>
          <span class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"><?php echo $book['publish_year'] ?></span>
      </div>
      <?php if ($_SESSION['user'] == 'librarian'): ?>
        <div class="col-span-2 flex justify-end gap-4">
          <div class="col-span-2 flex justify-end">
            <a href="<?php echo "/pages/editbook.php?id=".$book['id'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Edit</a>
          </div>
          <div class="col-span-2 flex justify-end">
            <a href="<?php echo "/pages/deletebook.php?id=".$book['id'] ?>" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
              <?php echo $book['archived'] ? 'Unarchive' : 'Archive' ?>
            </a>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($_SESSION['user'] == 'student'): ?>
        <div class="col-span-2 flex justify-end gap-4">
          <div class="col-span-2 flex justify-end">
            <a href="<?php echo "/pages/rentbook.php?id=".$book['id'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
              <?php echo $book['rented'] ? 'Return' : 'Rent' ?>
            </a>
          </div>
        </div>
      <?php endif; ?>
  </div>
</div>