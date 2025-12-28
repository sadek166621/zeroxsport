<header class="border-bottom sticky-header">
    <nav class="nav nav-pills flex-row gap-2 p-2">
        <a class="nav-link {{ (Route::current()->getName() == 'admin.profile')? 'active':'' }}" aria-current="page" href="{{ route('admin.profile') }}">General</a>
        <a class="nav-link {{ (Route::current()->getName() == 'edit.profile')? 'active':'' }}" href="{{ route('edit.profile') }}">Edit Profile</a>
        <a class="nav-link {{ (Route::current()->getName() == 'change.password')? 'active':'' }}" href="{{ route('change.password') }}">Change Password</a>
    </nav>
</header>

<style>
    .sticky-header {
        position: sticky;
        top: 0;
        z-index: 100;
        background-color: white;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         margin-bottom: 10px;
    }


    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        color: #fff;
        background-color: green;
    }
</style>