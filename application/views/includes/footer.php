<footer class="grid_4">
<h2>Copyright 2011 &nbsp; © &nbsp; Stephen Cronin</h2>
</footer>
</div><!-- CLOSE .container_5 -->
</body>
<!-- JQUERY PLUGIN -->
<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/custom-theme/jquery-ui-1.8.16.custom.css'; ?>" type="text/css" />

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-animate-css-rotate-scale.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.quicksand.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvas.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/filter.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/libs/jquery.masonry.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/myCode.js"></script>

<?php $is_logged_in = $this->session->userdata('is_logged_in');
if($is_logged_in == true)
{ ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin.js"></script>
<?php }
?>

</html>