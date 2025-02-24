<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{ route('admin.dashboard') }}"
            class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button
            class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> New Report
        </button>
    </div>
    <nav class="text-white text-base font-semibold pt-3 " id="navItems">
        <ul>
            <li class="{{ activateSidebar(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li class="{{ activateSidebar(['admin.parcel.index']) }}">
                <a href="{{ route('admin.parcel.index') }}" class="flex items-center text-white py-4 pl-6 nav-item">
                    <i class="fas fa-sitemap mr-2"></i>
                    Parcels
                </a>
            </li>
            <li class="{{ activateSidebar(['admin.courier.index']) }}">
                <a href="{{ route('admin.courier.index') }}" class="flex items-center  text-white py-4 pl-6 nav-item">
                    <i class="fas fa-sitemap mr-2"></i>
                    Couriers
                </a>
            </li>
            <li class="{{ activateSidebar(['admin.admin.index']) }}">
                <a href="{{ route('admin.admin.index') }}" class="flex items-center  text-white py-4 pl-6 nav-item">
                    <i class="fas fa-user-shield mr-2"></i>
                    Admins
                </a>
            </li>
            <li class="{{ activateSidebar(['admin.users.index']) }}">
                <a href="{{ route('admin.users.index') }}" class="flex items-center  text-white py-4 pl-6 nav-item">
                    <i class="fas fa-users mr-2"></i>
                    Users
                </a>
            </li>
            <hr>
            <li>
                <a href="#" onClick="document.getElementById('AdminLogoutForm').submit()"
                    class="flex items-center
                    opacity-75 hover:opacity-100 text-white py-4 pl-6 nav-item mt-2">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Sign out
                </a>
                <form id="AdminLogoutForm" action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <a href="#"
        class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
        <i class="fas fa-arrow-circle-up mr-3"></i>
        Upgrade to Pro!
    </a>
</aside>
