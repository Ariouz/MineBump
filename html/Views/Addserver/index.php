<?php 

$this->title = "Ajouter un serveur";

$this->additional_header = '
<head>
<link href="css/addserver.css.php" rel="stylesheet" type="text/css" media="screen" >
</head>

';

if(isset($addServerProcess) and $addServerProcess != null){

	$addServerProcess->processData($_SESSION['id'], array_merge($_POST, $_FILES));
}

 ?>

<div class="content" align="center">
	<div class="add_server_form">
		<h1 class="title">Ajout de Serveur</h1>
		<form method="post" action="" enctype="multipart/form-data">
			<?php 

			if($controller->getError() != null){
				?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $controller->getError(); ?>
				</div>
				<?php
			}

			if(isset($addServerProcess) and $addServerProcess->getError() != null){
				?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $addServerProcess->getError(); ?>
				</div>
				<?php
			}

			if(isset($addServerProcess) and $addServerProcess->getSuccess() != null){
				?>
				<div class="alert alert-success" role="alert">
				  <?php echo $addServerProcess->getSuccess(); ?>
				</div>
				<?php
			}

		 ?>
				<div class="form_entry">
					<i class='bx bx-user input_icon'></i>
					<input type="text" name="server_name" id="server_name" placeholder="Nom du Serveur" value="<?php if(isset($_POST['server_name'])){echo $_POST['server_name'];} ?>">
				</div>
				<div class="form_entry">
					<i class='bx bx-envelope input_icon'></i>
					<textarea rows="6" name="server_short_desc" id="server_short_desc" placeholder="Description rapide" maxlength="255"><?php if(isset($_POST['server_short_desc'])){echo $_POST['server_short_desc'];} ?></textarea>
				</div>
				<div class="form_entry">
					<i class='bx bx-lock-alt input_icon'></i>
					<textarea rows="12" name="server_long_desc" id="server_long_desc" placeholder="Description complète" minlength="300"><?php if(isset($_POST['server_long_desc'])){echo $_POST['server_long_desc'];} ?></textarea>
				</div>
			<div class="add_server_form_part">
				<div class="form_entry">
					<i class='bx bx-lock-alt input_icon'></i>
					<input class="media" type="text" name="server_website" id="server_website" placeholder="Site web" value="<?php if(isset($_POST['server_website'])){echo $_POST['server_website'];} ?>">
				</div>
				<div class="form_entry">
					<i class='bx bx-lock-alt input_icon'></i>
					<input class="media" type="text" name="server_discord" id="server_discord" placeholder="Serveur Discord" value="<?php if(isset($_POST['server_discord'])){echo $_POST['server_discord'];} ?>">
				</div>
				<div class="form_entry">
					<i class='bx bx-lock-alt input_icon'></i>
					<input class="media" type="text" name="server_ip" id="server_ip" placeholder="Adresse IP" value="<?php if(isset($_POST['server_ip'])){echo $_POST['server_ip'];} ?>">
				</div>
			</div>
				<div class="form_entry">
					<label><i class='bx bx-images input_icon_file'></i> Bannière (728*90 recommandé)</label><br>
					<input class="input_file" type="file" name="server_banner" id="server_banner" accept="image/*" data-multiple-caption="{count} files selected">
					<label for="server_banner">Choisir un fichier</label>
				</div>
				<div class="form_entry">
					<label><i class='bx bx-images input_icon_file'></i> Logo (format carré recommandé)</label><br>
					<input class="input_file" type="file" name="server_logo" id="server_logo" accept="image/*" data-multiple-caption="{count} files selected">
					<label for="server_logo">Choisir un fichier</label>
				</div>
			<div class="add_server_form_part">
				<div class="form_entry">
					<label>Modes de jeu (3 max)*</label><br>
					<select multiple="multiple" class="form_select" id="server_games[]" name="server_games[]">
						<option value="" selected="" disabled>Selectionner</option>
						<option value="skyblock">Skyblock</option>
						<option value="pvp">Pvp</option>
						<option value="mini-jeux">Mini-Jeux</option>
						<option value="survie">Survie</option>
						<option value="freebuild">FreeBuild</option>
						<option value="semi-rp">Semi-Rp</option>
						<option value="autre">Autre</option>
					</select>
				</div>
				<div class="form_entry">
					<label>Versions (2 max)*</label><br>
					<select multiple="multiple" class="form_select" id="server_versions[]" name="server_versions[]">
						<option value="" selected="" disabled>Selectionner</option>
						<option value="1.19">1.19</option>
						<option value="1.18.2">1.18.2</option>
						<option value="1.18">1.18</option>
						<option value="1.17">1.17</option>
						<option value="1.16.4">1.16.4</option>
						<option value="1.16.2">1.16.2</option>
						<option value="1.16">1.16</option>
						<option value="1.15">1.15</option>
						<option value="1.14.4">1.14.2</option>
						<option value="1.14">1.14</option>
						<option value="1.13">1.13</option>
						<option value="1.12.2">1.12.2</option>
						<option value="1.12">1.12</option>
						<option value="1.11">1.11</option>
						<option value="1.10">1.10</option>
						<option value="1.9">1.9</option>
						<option value="1.8.9">1.8.9</option>
						<option value="1.8.8">1.8.8</option>
						<option value="1.8">1.8</option>
						<option value="1.7.10">1.7.10</option>
						<option value="1.7">1.7</option>
						<option value="1.6.1">1.6.1</option>
					</select>
				</div>
			</div><br>
			<span class="selects_tip">* <i>CTRL + Click pour en selectionner plusieurs.</i></span>
			<button type="submit" class="form_submit" id="add_server_submit" name="add_server_submit">Ajouter mon serveur !</button>
		</form>
	</div>
</div>

<script type="text/javascript">
	var inputs = document.querySelectorAll( '.input_file' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( "\'" ).pop();

		if( fileName )
			label.innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});
</script>