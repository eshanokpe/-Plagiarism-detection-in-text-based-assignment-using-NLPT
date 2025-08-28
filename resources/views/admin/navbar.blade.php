 <div class="row">
    <div class="col-xl-4">
        <div class="card stat-card lectures">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Users
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo isset($userCount) ? $userCount : '0'; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card-icon">
                            <i class="bi bi-people text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4">
        <div class="card stat-card developers">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Lecturers
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo isset($lecturerCount) ? $lecturerCount : '0'; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card-icon">
                            <i class="bi bi-code-slash text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card stat-card developers">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Submitted Assignment
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo isset($submissionCount) ? $submissionCount : '0'; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card-icon">
                            <i class="bi bi-code-slash text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>