<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('home') }}">Home</a></li>
                @auth
                <li>
                    <a>Admin</a>
                    <ul class="p-2 z-10">
                        <li><a href="{{ route('posts.index') }}">Posts</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
        <a class="btn btn-ghost normal-case text-xl">{{ config('app.name') }}</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ route('home') }}">Home</a></li>
            @auth
                <li><a href="{{ route('feed') }}">Feed</a></li>
                <li tabindex="0" class="z-10">
                    <details>
                        <summary>Admin</summary>
                        <ul class="p-2">
                            <li><a href="{{ route('posts.index') }}">Posts</a></li>
                        </ul>
                    </details>
                </li>
            @endauth
        </ul>
    </div>
    <div class="navbar-end">
        @guest
            <a class="btn" href="{{ route('login') }}">Login</a>
            <a class="btn btn-primary ml-3" href="{{ route('register') }}">Register</a>
        @else
            <ul class="menu menu-horizontal px-1">
                <li tabindex="0" class="z-10">
                    <details>
                        <summary>{{ auth()->user()->name }}</summary>
                        <ul class="p-2">
                            <li><a href="{{ route('profile.edit') }}">Edit profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input type="submit" value="Logout">
                                </form>
                            </li>
                        </ul>
                    </details>
                </li>
            </ul>
        @endguest
    </div>
</div>
