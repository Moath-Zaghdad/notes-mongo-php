<?php  $RootDirectory = "";?>

<!DOCTYPE html>
<html lang="en">
<?php require($RootDirectory.'layouts/head.php'); ?>
<body>

    <?php require($RootDirectory.'layouts/header.php'); ?>
    <div class="container">

        <?php

        require($RootDirectory.'ConnectToMongo.php');
        $collection = $client->Notes->block;



        $cursor = $collection->find([ ]);

        require($RootDirectory.'layouts/table-template.php')

        ?>



    </div>
    <?php require($RootDirectory.'layouts/footer.php'); ?>
</section>

</body>
</html>