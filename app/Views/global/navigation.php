<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<!-- [ navigation menu ] start -->
<nav class="pc-sidebar ">
	<div class="navbar-wrapper">
		<div class="m-header">
			<a href="<?=site_url('dashboard')?>" class="b-brand">
				<!-- ========   change your logo hear   ============ -->
				<img src="<?php echo site_url('assets/images/w-logo1.png');?>" alt="" class="logo logo-lg">
				<img src="<?php echo site_url('assets/images/w-logo1.png');?>" alt="" class="logo logo-sm">
			</a>
		</div>
		<div class="navbar-content">
			<ul class="pc-navbar">
                <li class="pc-item">
					<a href="<?=site_url('dashboard')?>" class="pc-link "><span class="pc-micon"><i data-feather="home"></i></span><span class="pc-mtext"> Dashboard</span></a>
				</li>
                
                <!-- [ navigation menu ] start -->
            	<?php $this->load->view('page_control');?>
            	<!-- [ navigation menu ] end -->
                
                <li class="pc-item">
					<a href="<?=site_url('login/logout')?>" class="pc-link "><span class="pc-micon"><i data-feather="log-out"></i></span><span class="pc-mtext"> Logout</span></a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- [ navigation menu ] end -->

<header class="pc-header">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="header-wrapper align-items-center">
                <?php if($AdminCookie['role'] == 1):?>
                
                <? if ($show_daterange == 1) { ?>
                    <div class="row">
                        <div id="reportrange" class="ibox-content" style="max-width: 250px; cursor: pointer;">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                    </div> 
                <? }?>
                
                <?php endif;?>
                <? if (!empty($page_title)) {
                    echo"<h4 class='mb-0'>$page_title</h4>"; 
                }?>
                <? if (!empty($btn_url) && !empty($btn_text)) {
                    echo"<a href='$btn_url' class='btn btn-info ml-3'>$btn_text</a></h4>";
                }
                ?>
        	</div>
            
        </div>
        <div class="col-sm-6">
            <div class="header-wrapper">
        		<div class="ml-auto"> 
        			<ul class="list-unstyled">
        				<li class="dropdown pc-h-item"> 
        					<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        						<img src="<?php echo site_url('assets/images/favicon.png');?>" alt="user-image" class="user-avtar">
        						<span>
        							<span class="user-name"><?=$AdminCookie["name"];?></span>
        							<span class="user-desc"><?= get_user_group($AdminCookie["role"]);?></span>
        						</span>
        					</a>
        					<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
        						<a href="<?=site_url('profile/edit')?>" class="dropdown-item">
        							<span class="pc-micon"><i data-feather="user"></i></span>
        							<span>Profile</span>
        						</a>
                                <a href="<?=site_url('login/logout')?>" class="dropdown-item">
        							<span class="pc-micon"><i data-feather="log-out"></i></span>
        							<span>Logout</span>
        						</a>
        					</div>
        				</li>
        			</ul>
        		</div>
        	</div>
        </div>
    </div>
</header>