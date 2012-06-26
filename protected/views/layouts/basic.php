<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-4 left_side">
		<p>
			<?php require_once('left_sidebar.php'); ?>
		</p>
	</div>
	<div id="content" class="span-14">
		<?php echo $content; ?>
	</div><!-- content -->
	<div class="span-4 right_side">
    <?php var_dump($this->whoOnline()); ?>
	</div>
</div>
<?php $this->endContent(); ?>
