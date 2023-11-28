<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div>
            <span class="text-red-500">Note: </span>
            <p class="mb-4  text-lg bg-gray-200 max-w-sm p-3">Click on a note to view it or edit it.</p>
        </div>
        <div class="flex flex-col max-w-md rounded">
            <div class="bg-gray-200 p-4 ">
                <h3 class="uppercase text-purple-500 text-center font-bold">All Notes</h3>
                <ul>
                    <?php foreach ($notes as $note): ?>
                        <li>
                            <a href="/note?id=<?= $note['notes_id'] ?>"
                               class="text-blue-500 hover:underline text-lg">
                                <?= htmlspecialchars($note['body']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <p class="mt-6 self-center">
                <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <a href="/notes/create" class="text-white font-bold uppercase">New Note</a>
                </button>
            </p>
        </div>
    </div>
</main>
<?php require base_path("views/partials/footer.php") ?>

