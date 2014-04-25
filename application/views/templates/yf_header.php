<html>
    <head>
        <title>.:: YF Estimator ::.</title>
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        
        <!--jQuery dependencies-->
        <!--
        TO USE IN PRODUCTION
        =======================
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/base/jquery-ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/jquery/themes/base/jquery-ui.css" />
        <script src="<?php echo base_url(); ?>js/jquery/jquery-1.8.3.js"></script>    
        <script src="<?php echo base_url(); ?>js/jquery/ui/minified/jquery-ui.min.js"></script>
        
        <!--ParamQuery Grid files-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/grid/pqgrid.min.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>js/grid/pqgrid.min.js"></script>
        
        <!-- YF App Helper JS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/grid/yfhelper.js"></script>
        
         <script>
		$(function() {
		$( "#yfTopMenu" ).menu();
		});
		</script>
		<style>
			.ui-menu { width: 150px; font-size:11px; }
		</style>
        
    </head>
    <body>
    	<ul id="yfTopMenu">
    		<li>
    			<a href="#">Project</a>
    			<ul>
    				<li><a href="<?php echo base_url(); ?>project/new">Add Project</a></li>
    			</ul>
    		</li>
    		<li>
    			<a href="#">Estimate</a>
    			<ul>
    				<li><a href="<?php echo base_url(); ?>estimate/new">Add Estimate</a></li>
    			</ul>
    		</li>
    	</ul>