<!-- Sidebar -->
<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button" class="sm:hidden absolute top-4 left-4">
    <i class="fa-solid fa-bars"></i>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r border-gray-600">
    <div class="h-full px-3 py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route('admin.posts.index')}}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 transition-all duration-200">
                    <i class="fa-solid fa-newspaper"></i>
                    <span class="ml-3">Posts</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
