<style type="text/css">
.traduction{
	width: 100%;
	height: 15rem;
	margin-bottom: 5rem;
	border-bottom: 1px grey;

}

.key{
	display: inline-block;
	width: 29%;
	height: 100%;
}

.key textarea{
	width: 100%;
	height:100%;
	min-height: 100%;
}

.value{
	display: inline-block;
	width: 70%;
}

.lang{
	width: 100%;
}

#save{
	float: right;
	margin-right: 2rem;
}
</style>

<?php if(isset($_GET['msg']) && $_GET['msg'] == 'success' ): ?>
<div id="message" class="updated notice notice-success is-dismissible">
	<p>Translations updated.</p>
	<button type="button" class="notice-dismiss">
		<span class="screen-reader-text">Dismiss this notice.</span>
	</button>
</div>
<?php endif;?>
<h1>Translation</h1>

<article>

	<form id="form" method="post" action="<?php echo admin_url('admin-post.php') ?>"> 
	<button id="save" type="submit">Save</button>
	<button id="add">Add new</button>

    <input type="hidden" name="action" value="franslate_form">
	<?php wp_nonce_field('franslate_form_nonce', 'franslate_form_nonce'); ?>

	<input id="counter" type="hidden" name="counter" value="">

	<?php $i = 0; 
		foreach ($json as $key => $langs): 
		$i++; 
		$key = stripcslashes($key);

	?>
		<div id="trad-<?echo$i?>" class="traduction">
			<div class="key">
				<label>Key</label>
				<textarea name="key-<?echo$i?>" class="cle" disabled><? echo $key; ?></textarea>
			</div>
			<div class="value">
			<?php foreach ($langs as $key => $value) {
				$value = stripcslashes($value);
				switch ($key) {
					case 'en':
						echo '<label>English</label><textarea name="en-'.$i.'" class="lang en" disabled>'.$value.'</textarea>';
						break;
					case 'fr':
						echo '<label>French</label><textarea name="fr-'.$i.'" class="lang fr" disabled>'.$value.'</textarea>';
						break;
					case 'nl':
						echo '<label>Dutch</label><textarea name="nl-'.$i.'" class="lang nl" disabled>'.$value.'</textarea>';
						break;
					default:
						# code...
						break;
				}

			} ?>
			</div>
			<div class="command">
				<button id="edit-<? echo $i?>" class='edit'>Edit</button>
				<button id="del-<? echo $i?>" class='del'>Delete</button>
			</div>
		</div>
	<?php endforeach;?>

	

	

</form>
</article>



<script type="text/javascript">

 var i = <?php echo $i; ?>;

</script>

