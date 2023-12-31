
<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="flex items-center">
                        <img class="h-8 w-8 rounded"
                            src="https://github.com/enjeck/libre-logos/blob/main/src/images/logos/20-geometric-stacked-shapes.png?raw=true"
                            alt="">
                        <span class="uppercase font-bold text-purple-500 px-3">WebNote</span>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/" class="<?= (checkURL('/'))? 'bg-gray-900 text-white' : 'text-gray-300';?> hover:bg-gray-700  px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                        <a href="/about" class="<?= (checkURL('/about'))? 'bg-gray-900 text-white' : 'text-gray-300';?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
                        <?php if($_SESSION['user'] ?? false): ?>
                             <a href="/notes" class="<?= (checkURL('/notes'))? 'bg-gray-900 text-white' : 'text-gray-300';?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Notes</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>
                    <?php if($_SESSION['user'] ?? false): ?>
                    <div class="ml-3">
                        <form action="/sessions" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="text-red-500 hover:text-rose-400">Log Out</button>
                        </form>
                    </div>
                    <?php endif; ?>
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div class="z-auto">
                            <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <?php if($_SESSION['user'] ?? false): ?>
                                <img class="h-8 w-8 rounded-full" src="https://i.pravatar.cc/300?u=<?= $_SESSION['user']['email']?>" alt="">
                            </button>

                            <?php else: ?>
                                <a href="/register" class="<?= (checkURL('/register'))? 'bg-gray-900 text-white' : 'text-gray-300';?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium z-50">Register</a>
                                <a href="/login" class="<?= (checkURL('/login'))? 'bg-gray-900 text-white' : 'text-gray-300';?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium z-50">Login</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>