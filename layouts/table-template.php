<table class="table" style="margin: 0 auto;font-size: x-large;">
  <thead>
    <tr>
      <th><abbr title="Position">Pos</abbr></th>
      <th>Title</th>
      <!-- <th>Priority</th> -->
      <th><abbr title="View">V</abbr></th>
      <th><abbr title="Edit">E</abbr></th>
      <!-- <th><abbr title="Archive">A</abbr></th> -->
      <th><abbr title="Delete">D</abbr></th>
      <th>The note</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th><abbr title="Position">Pos</abbr></th>
      <th>Title</th>
      <!-- <th>Priority</th> -->
      <th><abbr title="View">V</abbr></th>
      <th><abbr title="Edit">E</abbr></th>
      <!-- <th><abbr title="Archive">A</abbr></th> -->
      <th><abbr title="Delete">D</abbr></th>
      <th>The note</th>
    </tr>
  </tfoot>
  <tbody>

    <?php $URLRed = $RootDirectory.'notes/'; ?>

    <?php  foreach ($cursor as $key => $doc) { ?>
    <tr>

      <td><?= $key+1 ?></td>

      <td><a href="<?= $URLRed.'/view.php?id='.$doc->{_id} ?>">
        
        <?php 
        $str = $doc->{title};
        if(strlen($str) < 30)
          echo $str;
        else
          echo substr($str , 0, 30).' ...';
        ?>
      </a></td>


        <!-- <td>9/10<strong>(C)</strong></td> -->

        <td><a href="<?= $URLRed.'view.php?id='.$doc->{_id} ?>" class="button is-primary is-outlined">V</a></td>
        <td><a href="<?= $URLRed.'index.php?id='.$doc->{_id} ?>" class="button is-info is-outlined">E</a></td>
        <!-- <td><a href="<?= $URLRed.'archive.php?id='.$doc->{_id} ?>" class="button is-outlined">A</a></td> -->
        <td><a href="<?= $URLRed.'delete.php?id='.$doc->{_id} ?>" class="button is-danger is-outlined">D</a></td>

        <td><a href="<?= $URLRed.'view.php?id='.$doc->{_id} ?>">
          
          <?php 
          $str = $doc->{content}->jsonSerialize()[0];
          if(strlen($str) < 20)
            echo $str;
          else
            echo substr($str , 0, 20).' ...';
          ?>
        </a></td>
      </tr>
      <?php } ?>

    </tbody>
  </table>