<!-- Required Js -->
<script src="<?php echo site_url('assets/js/vendor-all.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/plugins/bootstrap.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/plugins/feather.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/pcoded.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/plugins/form.validation.js');?>"></script>
<script src="<?php echo site_url('assets/js/plugins/select2.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/plugins/daterangepicker.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/plugins/bootstrap-datepicker.js');?>"></script>
<script src="<?php echo site_url('assets/js/plugins/sweetalert.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/custom.js');?>"></script>

<script src="<?php echo site_url('assets/js/plugins/daterangepicker/daterangepicker.js');?>"></script>
<script src="<?php echo site_url('assets/js/plugins/daterangepicker/moment.min.js');?>"></script>

<?php if(isset($scripts)):?>
    <?php foreach($scripts as $j):?>
            <script src="<?php echo site_url($j);?>"></script>
    <?php endforeach;?>
<?php endif;?>
<?php if(!empty($footer)):?>
   <?php echo $footer;?>
<?php endif;?>


<?php if(!empty($miscellaneous)):?>
   <?php echo $miscellaneous;?>
<?php endif;?>

</body>

</html>
