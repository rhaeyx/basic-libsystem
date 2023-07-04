<?php if (!isset($_SESSION['user'])) return header('Location: /index.php'); ?>

<header class="bg-white">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <span class="text-lg font-semibold text-blue-500 capitalize">Hello, <?php echo $_SESSION['user'] ?></span>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
      <?php if ($_SESSION['user'] == 'librarian'): ?>
      <a href="/pages/addbook.php" class="text-sm font-semibold leading-6 text-gray-900">Add Book</a>
      <?php endif; ?>
      <a href="/pages/books.php" class="text-sm font-semibold leading-6 text-gray-900">View Books</a>
      <?php if ($_SESSION['user'] == 'student'): ?>
      <a href="/pages/rentedbooks.php" class="text-sm font-semibold leading-6 text-gray-900">Rented Books</a>
      <?php endif; ?>
      <!-- <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Marketplace</a> -->
      <!-- <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Company</a> -->
    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
      <a href="/auth/logout.php" class="text-sm font-semibold leading-6 text-gray-900">Log out</a>
      
    </div>
  </nav>
</header>