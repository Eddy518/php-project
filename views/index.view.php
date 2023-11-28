<?php require base_path("views/partials/head.php")?>
<?php require base_path("views/partials/nav.php")?>
<?php require base_path("views/partials/banner.php")?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 space-y-5 ">
        <div class="text-lg">
        Welcome <strong class="text-emerald-500"><?= $_SESSION['user']['email'] ?? 'guest user' ?></strong>  to the home page.
        <div class="mt-7">
            Quickly jot down your ideas and tasks in the <a href="/notes" class="text-blue-500">Notes</a> section.
        </div>
        </div>
        <?php if (!$_SESSION) : ?>
        <div class="font-bold bg-gray-200 rounded-xl p-6 max-w-2xl mt-6 text-md">
            <a href="/register" class="text-blue-500 hover:underline">Create an account</a> or <a href="/login" class="text-blue-500 hover:underline">login</a> with us to save your notes for future references.
        </div>
        <?php endif; ?>
    </div>
</main>
<?php require base_path("views/partials/footer.php")?>

