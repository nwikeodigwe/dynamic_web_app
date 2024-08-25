<?php require base_path("views/partials/head.php")?>
<?php require base_path("views/partials/nav.php")?>
<?php require base_path("views/partials/banner.php")?>
<main>
    <div class="mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input type="hidden" name="__request_method" value="PATCH" />
            <input type="hidden" name="id" value="<?= $note['id']?>" />
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                    <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                        <div class="mt-2">
                            <textarea  id="body" name="body" rows="3" value="This is the value" placeholder="Here's an idea for a note..." class="block w-full rounded-md border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['body'] ?? ''?></textarea>

                            <?php if (isset($errors['body'])):?>
                                <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/notes" class="py-2 px-4 bg-gray-200 hover:bg-gray-100">Cancel</a>
                <button type="submit" class="text-white py-2 px-4 bg-blue-400 hover:bg-blue-500">Save</button>
            </div>
        </form>
    </div>
</main>
<?php require base_path("views/partials/footer.php")?>