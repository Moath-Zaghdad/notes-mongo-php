<?php

	$RootDirectory = "../";
	require($RootDirectory.'ConnectToMongo.php');
	$collection = $client->Notes->block;
	$cursor =  $collection->find([ '_id' => new MongoDB\BSON\ObjectId($_GET['id']) ]);

?> 

<!DOCTYPE html>
<html lang="en">
<?php require($RootDirectory.'layouts/head.php'); ?>
<body>
	<?php require($RootDirectory.'layouts/header.php'); ?>
	<div class="container">

		<section class="hero is-medium is-primary is-bold" >
			<div class="hero-body">
				<div class="container">


					<?php foreach ($cursor as $key => $doc) { ?>


					<div class="control is-large">
						<h1 class="title" style="padding-bottom: 15px; text-align: center;"><?= $doc->{title} ?></h1>
					</div>


					<?php foreach ($doc->{content}->jsonSerialize() as $key => $value) {
						echo '<h2 class="subtitle"><strong>';
      			// echo 1+$key."- </strong>  ";
						echo $value;
						echo '</h2>';
					}
					?>

					<?php } ?>


				</div>
			</div>
		</section>


		<div class="field is-grouped">
			<p class="control" style="margin: 0 auto; padding: 15px;">
				<a class="button is-large" href="<?=$RootDirectory .'notes/index.php?id='.$doc->{_id} ?>">
					Edet
				</a>
			</p>
		</div>


	</div>
	<?php require($RootDirectory.'layouts/footer.php'); ?>
</section>
</body>
</html>


