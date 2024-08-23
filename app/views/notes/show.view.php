<?php require base_path("views/partials/head.php");?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>
<main>
  <div class="mx-auto flex flex-col gap-4 max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class=""><a href="/notes" class="text-blue-500 hover:underline">Go back</a></p>
    <p><?= $note['body']?></p>
    <form method="POST">
      <input type="hidden" name="__request_method" value="DELETE">
      <button class="text-red-500">Delete</button>
    </form>
  </div>
</main>
<?php require base_path("views/partials/footer.php"); ?>