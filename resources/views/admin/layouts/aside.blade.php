<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ route('admin.index') }}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="{{ route('danh-muc.index') }}" class="flex items-center  text-white py-4 pl-6 nav-item">
            <i class="fas fa-boxes mr-3">       </i>
            Danh mục
        </a>
        <a href="{{ route('bai-viet.index') }}" class="flex items-center  text-white py-4 pl-6 nav-item">
            <i class="fas fa-book-open mr-3"></i>
            Bài viết
        </a>
        <a href="{{ route('user.index') }}" class="flex items-center  text-white py-4 pl-6 nav-item">
            <i class="fas fa-users mr-3"></i>
            Người dùng
        </a>

    </nav>
</aside>
