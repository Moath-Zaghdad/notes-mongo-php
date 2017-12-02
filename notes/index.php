<?php

  $RootDirectory = "../";
  if(!empty($_GET['id']))
  {
    require($RootDirectory.'ConnectToMongo.php');
    $collection = $client->Notes->block;
    $cursor =  $collection->find([ '_id' => new MongoDB\BSON\ObjectId($_GET['id']) ]);
  }
?> 
<!DOCTYPE html>
<html lang="en">
<?php require($RootDirectory.'layouts/head.php'); ?>
<body>



  <?php require($RootDirectory.'layouts/header.php'); ?>
  <div class="container">


<form action="<?= $RootDirectory.'notes/'.(empty($cursor)?'create':'update')?>.php" method="post">

<div class="field is-grouped">
  <p class="control">
  	<button class="button is-link">
      <?= (empty($cursor)?'Save':'Update')?>
    </button>
  </p>

<?php  foreach ($cursor as $doc) { ?>
<input type="hidden" name="id" value="<?= $doc->{_id} ?>">
  <p class="control">
    <a class="button is-danger" href="<?=$RootDirectory.'notes/delete.php?id='.$doc->{_id}?>">
      Delete
    </a>
  </p>
</div>


  <div class="control is-large">
    <input class="input is-large" type="text" placeholder="The note title" name="title" required value="<?= $doc->{title} ?>">
  </div>


<?php foreach ($doc->{content}->jsonSerialize() as $key => $value) { ?>

<textarea class="textarea" placeholder="The content of the note" rows="10" name="content"><?= $value ?></textarea>

<?php } ?>
<?php } ?>
<?php if(empty($cursor)) {?>
  <p class="control">
    <a class="button is-danger" href="<?=$RootDirectory.'notes'?>">
      Delete
    </a>
  </p>
</div>
  <div class="control is-large">
    <input class="input is-large" type="text" placeholder="The note title" name="title" required >
  </div>
<textarea class="textarea" placeholder="The content of the note" rows="10" name="content" ></textarea>

<?php } ?>

</form>


  </div>
  <?php require($RootDirectory.'layouts/footer.php'); ?>
</section>

</body>
</html>