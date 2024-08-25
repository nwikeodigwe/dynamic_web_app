<?php require base_path("views/partials/head.php")?>
<?php require base_path("views/partials/nav.php")?>
<?php require base_path("views/partials/banner.php")?>
<main>
  <div class="mx-auto flex flex-col gap-4 max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class=""><a href="/notes" class="text-blue-500 hover:underline">Go back</a></p>
    <p><?= $note['body']?></p>
    <div class="flex items-center gap-4">
      <a href="/note/edit?id=<?=$note['id']?>" class="text-white py-2 px-4 bg-blue-400 hover:bg-blue-500 hover:shadow-md">Edit</a>
      <form method="POST">
          <input type="hidden" name="__request_method" value="DELETE">
          <button class="text-white py-2 px-4 bg-red-400 hover:bg-red-500">Delete</button>
      </form>
    </div>
  </div>
</main>
<?php require base_path("views/partials/footer.php")?>