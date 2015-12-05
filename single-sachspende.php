<?php get_header(); ?>

<?php $done = get_field('done') == '1'; ?>

<div class="container">
	<?php if (current_user_can('edit_posts') && !$done) { ?>
	<br>

	<div class="pull-right">
		<button id="mark-done" onclick="setDone('<?php the_ID(); ?>')" class="btn btn-success">
			Als erledigt markieren
		</button>
	</div>

	<script>
	function setDone(id) {
		jQuery.post('<?php echo admin_url('admin-ajax.php') ?>', {
			action: 'flueba_set_sachspende_done',
			sachspende_id: id
		}, function(res, a, b, c) {
			console.log(res, a, b, c);
			// TODO handle error case
			jQuery('#status-label')
				.text('Erledigt')
				.addClass('label-success')
				.removeClass('label-warning');
			jQuery('#status-hint').fadeOut();
			jQuery('#mark-done').hide();
		});
	}
	</script>
	<?php } ?>

<?php while (have_posts()) {
	the_post(); ?>
	<h1>
		<?php the_title(); ?>
	</h1>

	<div>
		<span id="status-label" class="label <?php echo $done ? 'label-success' : 'label-warning' ?>">
			<?php echo $done ? 'Erledigt' : 'Ausstehend' ?>
		</span>
		<?php if (!$done) { ?>
		&nbsp;
		<span class="text-muted small" id="status-hint">
			Bitte mit den untenstehenden Kommentaren abgleichen, die Moderatoren aktualisieren den Status regelmäßig.
		</span>
		<?php } ?>
	</div>
	<br>

	<?php the_content(); ?>
<?php } ?>
	<hr>
	<?php comments_template(); ?>
</div>

<?php get_footer(); ?>
