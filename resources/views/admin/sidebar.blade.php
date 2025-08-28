<div class="sidebar">
    <div class="sidebar-brand">
        <i class="bi bi-speedometer2"></i> Admin Panel
    </div>
    
    <ul class="sidebar-nav">
        <li><a href="{{ route('admin.dashboard.index') }}" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.users.index') }}"><i class="bi bi-people"></i> Students</a></li>
        <li><a href="{{ route('admin.lectures.index') }}"><i class="bi bi-code-slash"></i> Lectures</a></li>
        <li><a href="{{ route('admin.assignments.index') }}"><i class="bi bi-gear"></i> Assignment</a></li>
       
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>