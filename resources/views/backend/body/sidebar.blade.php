<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">

            {{-- Services --}}
             <li class="uppercase font-bold mt-3">Main</li>
             <li class="my-1">
                 <a href="{{ route('admin.dashboard') }}" class="flex justify-start items-center">
                     <i class="w-4" data-feather="box"></i>
                     <span class="ml-4 hover:translate-x-3 transition duration-300 ease-in-out"> Dashboard</span>
                 </a>
             </li>


            {{-- home slide --}}
            <li class="uppercase font-bold mt-3">Home slide set up</li>
            <li class="my-1">
                <a href="{{ route('home.slide') }}" class="flex justify-start items-center">
                    <i class="w-4" data-feather="box"></i>
                    <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out">home slide</span>
                </a>
            </li>
            {{-- about --}}
            <li class="uppercase font-bold mt-3">About set up</li>
            <li class="my-1">
                <a href="{{ route('about.show') }}" class="flex justify-start items-center">
                    <i class="w-4" data-feather="box"></i>
                    <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out">About</span>
                </a>
            </li>
            {{-- Portfolio --}}
            <li class="uppercase font-bold mt-3">Portfolio set up</li>
            <li class="my-1">
                <a href="{{ route('portfolio.all') }}" class="flex justify-start items-center">
                    <i class="w-4" data-feather="box"></i>
                    <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out">all Portfolio</span>
                </a>
            </li>
            <li class="my-1">
                <a href="{{ route('portfolio.index') }}" class="flex justify-start items-center active">
                    <i class="w-4" data-feather="box"></i>
                    <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out active">New Portfolio</span>
                </a>
            </li>


            {{-- Services --}}
            <li class="uppercase font-bold mt-3">Services</li>
            <li class="my-1">
                <a href="{{ route('service.all') }}" class="flex justify-start items-center">
                    <i class="w-4" data-feather="box"></i>
                    <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out">all Services</span>
                </a>
            </li>
            <li >
                <a href="{{ route('service.page') }}" class="flex justify-start items-center">
                    <i class="w-4" data-feather="box"></i>
                    <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out">New Service</span>
                </a>
            </li>

            {{-- Blog blog--}}
            <li class="uppercase font-bold mt-3">Blogs</li>
            <li class="my-1">
                <a href="{{ route('blog.index') }}" class="flex justify-start items-center">
                    <i class="w-4" data-feather="box"></i>
                    <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out">Blogs</span>
                </a>
            </li>
            <li class="my-1">
                <a href="{{ route('blog.create') }}" class="flex justify-start items-center">
                    <i class="w-4" data-feather="box"></i>
                    <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out">new Blogs</span>
                </a>
            </li>


             {{-- Blog blog category--}}
             <li class="uppercase font-bold mt-3">Blogs category</li>

             <li class="my-1">
                 <a href="{{ route('blog.category.index') }}" class="flex justify-start items-center">
                     <i class="w-4" data-feather="box"></i>
                     <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out">Blog category</span>
                 </a>
             </li>
             <li class="my-1">
                 <a href="{{ route('blog.category.create') }}" class="flex justify-start items-center">
                     <i class="w-4" data-feather="box"></i>
                     <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out">New Blog category</span>
                 </a>
             </li>



             {{-- Footer --}}
             <li class="uppercase font-bold mt-3">Footer set up</li>
             <li class="my-1">
                 <a href="{{ route('footer.edit') }}" class="flex justify-start items-center">
                     <i class="w-4" data-feather="box"></i>
                     <span class="ml-4  hover:translate-x-3  transition duration-300 ease-in-out">edit footer</span>
                 </a>
             </li>



        </ul>
    </div>
</nav>

<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item" href="../demo1/dashboard.html">
                <img src="../assets/images/screenshots/light.jpg" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item active" href="../demo2/dashboard.html">
                <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
            </a>
        </div>
    </div>
</nav>
