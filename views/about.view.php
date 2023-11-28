<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>
    <main>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 text-lg">
            <h3 class="font-bold mt-3">About <span
                        class="uppercase bg-gray-300 p-1 text-purple-500 text-base rounded underline">WebNote</span>
            </h3>
            <div class="mt-5" style="line-height: 1.7;">
                <p>We are focused on user happiness🔥🔥🔥.</p>
                <p>All notes are stored in our databases in various data centers. <span
                            class="font-bold text-indigo-500">We've got you covered</span> 💥.</p>

                <p>
                    If you encounter any issues while using this site contact us through
                    <a href="mailto:admin@app.co" class="text-blue-500">admin@app.co</a>.
                </p>
                <?php if (!$_SESSION): ?>
                    <p>
                        To quickly get started <a href="/register" class="text-blue-500">Register</a> or <a
                                href="/login" class="text-blue-500">Login</a> if you already have an account.
                    </p>
                <?php endif; ?>
            </div>
            <div class="bg-gray-200 mt-3 max-w-md text-center rounded-xl">
                <div>
                    <span>Corp:</span>
                    <span class="text-purple-500">WebNote</span>
                </div>
                <div>
                    <span>Email:</span>
                    <span class="text-purple-500"><a href="mailto:admin@app.co" class="hover:underline">admin@app.co</a></span>
                </div>
                <div>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </main>
<?php require base_path("views/partials/footer.php") ?>