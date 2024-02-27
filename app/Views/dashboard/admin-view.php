<div class="row">
    <div class="col-xl-3 col-md-6">
        <a class="dashboard-icon-link expense-url" href="<?=site_url('expense/manage');?>">
            <div class="card feed-card">
                <div class="card-body p-t-0 p-b-0">
                    <div class="row">
                        <div class="col-4 bg-primary border-feed">
                            <i class="fas fa-rupee-sign f-40"></i>
                        </div>
                        <div class="col-8">
                            <div class="p-t-25 p-b-25" id="ExpCount">
                                <h2 class="f-w-400 m-b-10">...</h2>
                                <p class="text-muted m-0"><span class="text-primary f-w-400">Expenses</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a class="dashboard-icon-link pending-url"  href="<?=site_url('expense/manage?status=1');?>">
            <div class="card feed-card">
                <div class="card-body p-t-0 p-b-0">
                    <div class="row">
                        <div class="col-4 bg-warning border-feed">
                            <i class="fas fa-clock f-40"></i>
                        </div>
                        <div class="col-8">
                            <div class="p-t-25 p-b-25" id="ExpPending">
                                <h2 class="f-w-400 m-b-10">...</h2>
                                <p class="text-muted m-0"><span class="text-warning f-w-400">Waiting Approvals</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a class="dashboard-icon-link approved-url" href="<?=site_url('expense/manage?status=2');?>">
            <div class="card feed-card">
                <div class="card-body p-t-0 p-b-0">
                    <div class="row">
                        <div class="col-4 bg-success border-feed">
                            <i class="fas fa-check-circle f-40"></i>
                        </div>
                        <div class="col-8">
                            <div class="p-t-25 p-b-25" id="ExpApproved">
                                <h2 class="f-w-400 m-b-10">...</h2>
                                <p class="text-muted m-0"><span class="text-success f-w-400">Approved</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a class="dashboard-icon-link rejected-url" href="<?=site_url('expense/manage?status=3');?>">
            <div class="card feed-card">
                <div class="card-body p-t-0 p-b-0">
                    <div class="row">
                        <div class="col-4 bg-danger border-feed">
                            <i class="fas fa-times-circle f-40"></i>
                        </div>
                        <div class="col-8">
                            <div class="p-t-25 p-b-25" id="ExpRejected">
                                <h2 class="f-w-400 m-b-10">...</h2>
                                <p class="text-muted m-0"><span class="text-danger f-w-400">Rejected</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a class="dashboard-icon-link rejected-url user-count"  href="<?=site_url('user/manage');?>">
            <div class="card feed-card">
                <div class="card-body p-t-0 p-b-0">
                    <div class="row">
                        <div class="col-4 bg-info border-feed">
                            <i class="fas fa-user-tie f-40"></i>
                        </div>
                        <div class="col-8">
                            <div class="p-t-25 p-b-25" id="UserCount">
                                <h2 class="f-w-400 m-b-10">...</h2>
                                <p class="text-muted m-0"><span class="text-info f-w-400">Users</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>