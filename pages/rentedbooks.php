<?php session_start();
include '../connect.php';

$query = "SELECT * FROM books WHERE rented=1";
$result = $mysqli->query($query);
$data = [];
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}
?>
<?php include '../header.php' ?>
<?php include '../navbar.php' ?>

<section class="w-3/5 mx-auto">
<div class="flex flex-col">
  <?php if (isset($_SESSION['msg'])): ?>
    <div
      class="mb-4 rounded-lg bg-green-100 px-6 py-5 text-base text-green-700"
      role="alert">
      <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
    </div>
  <?php endif; ?>
  <?php if (isset($_SESSION['error'])): ?>
    <div
      class="mb-4 rounded-lg bg-red-100 px-6 py-5 text-base text-red-700"
      role="alert">
      <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
  <?php endif; ?>
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full text-left text-sm font-light">
          <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
              <th scope="col" class="px-6 py-4">ID</th>
              <th scope="col" class="px-6 py-4">Title</th>
              <th scope="col" class="px-6 py-4">Published</th>
              <th scope="col" class="px-6 py-4">Archived</th>
              <th scope="col" class="px-6 py-4">Rented</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $book): ?>
              <tr class="border-b dark:border-neutral-500">
                <td class="whitespace-nowrap px-6 py-4 font-mono"><?php echo $book['id'] ?></td>
                <td class="whitespace-nowrap px-6 py-4 hover:underline text-blue-300">
                  <a href="<?php echo "/pages/book.php?id=".$book['id'] ?>">
                    <?php echo $book['title'] ?>
                  </a>
                </td>
                <td class="whitespace-nowrap px-6 py-4"><?php echo $book['publish_month'] . ' ' . $book['publish_year'] ?></td>
                <td class="whitespace-nowrap px-6 py-4"><?php echo $book['archived'] ? 'Yes' : 'No' ?></td>
                <td class="whitespace-nowrap px-6 py-4"><?php echo $book['rented'] ? 'Yes' : 'No' ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</section>