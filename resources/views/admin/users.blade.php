 @extends('admin.app')

@section('content') 
 <div class="main-content">
        <div class="topbar"> 
            <h1>Dashboard</h1>
            <div class="admin-profile">
                <div class="admin-avatar">
                    <!-- Display admin initials -->
                    <?php 
                        $adminInitials = 'AU';
                        if (isset($adminUser) && !empty($adminUser->name)) {
                            $names = explode(' ', $adminUser->name);
                            $initials = '';
                            foreach ($names as $name) {
                                $initials .= strtoupper(substr($name, 0, 1));
                            }
                            $adminInitials = substr($initials, 0, 2);
                        }
                        echo $adminInitials;
                    ?>
                </div>
                <div>
                    <div class="fw-bold">
                        <?php echo isset($adminUser) ? $adminUser->name : 'Admin User'; ?>
                    </div>
                    <div class="small text-muted">Administrator</div>
                </div>
            </div>
        </div> 
        
        @include('admin.navbar')
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-list-check me-2"></i> Users Log
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr> 
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Registered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No users found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection