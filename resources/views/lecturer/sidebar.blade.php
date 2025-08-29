<style>
.sidebar {
    background: #343a40 !important;
    background-color: #343a40 !important;
}
</style>
<div class="sidebar" style="background-color: #343a40 !important;">
    <div class="sidebar-brand">
        <i class="bi bi-speedometer2"></i> Lecturer Panel
    </div>
    
    <ul class="sidebar-nav">
        <li><a href="{{ route('lecturer.dashboard') }}" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="{{ route('lecturer.users.index') }}"><i class="bi bi-people"></i> Students</a></li>
        <li><a href="{{ route('lecturer.assignments.index') }}"><i class="bi bi-gear"></i> Assignment</a></li>
       
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('lecturer.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        
    </ul>
</div>
