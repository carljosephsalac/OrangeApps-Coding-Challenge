<div class="navbar bg-base-100 shadow-sm">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">Student Management System</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li class="flex justify-center">
                <details class="flex justify-center items-center">
                    <summary>{{ Auth::user()->name }}</summary>
                    <ul class="bg-base-100 rounded-t-none p-2 w-full">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <li class="flex justify-center">
                                <button type="submit" class="w-full flex justify-center">Logout</button>
                            </li>
                        </form>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
</div>
