<?php $this->load->view('header');?>   
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="container">
        <div class="pcoded-content">
        
            <!-- [ Main Content ] start -->
            <?php if($AdminCookie['role'] == 1):?>
            <?php $this->load->view('dashboard/admin-view');?>
            <?php endif;?>
            <?php if($AdminCookie['role'] != 1):?>
            <?php $this->load->view('dashboard/employee-view');?>
            <?php endif;?>
            <!-- [ Main Content ] end -->
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<?php $this->load->view('footer');?>    