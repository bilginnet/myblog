<div class="list-group">
    <a href="{{ route('backend.dashboard') }}" class="list-group-item list-group-item-action @if(request()->routeIs('backend.dashboard')) active @endif">
        Dashboard
    </a>
    <a href="{{ route('backend.profile.edit') }}" class="list-group-item list-group-item-action @if(request()->routeIs('backend.profile.edit')) active @endif">Edit Your Profile</a>
    <a href="{{ route('backend.password.change') }}" class="list-group-item list-group-item-action @if(request()->routeIs('backend.password.change')) active @endif">Change Password</a>
    <a href="{{ route('backend.post.index') }}" class="list-group-item list-group-item-action @if(request()->routeIs('backend.post.index')) active @endif">Posts List</a>
    <a href="{{ route('custom.logout') }}" class="list-group-item list-group-item-action">Logout</a>
</div>
