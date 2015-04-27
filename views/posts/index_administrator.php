<p>Here is a list of all posts:</p>

<?php foreach($posts as $post) { ?>
  <p>
    <?php echo $post->author; ?>
    <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>See content</a>
    <a href='?controller=posts&action=remove&id=<?php echo $post->id; ?>'>Del</a>
    <a href='?controller=posts&action=refresh_show&id=<?php echo $post->id; ?>'>update</a>
  </p>
<?php } ?>