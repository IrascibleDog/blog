<p>updating post a new post:</p>

<form method="post" action="?controller=posts&action=refresh&id=<?php echo $post->id; ?>">
    <label>author: </label><input type="text" name="post_author" value="<?php echo $post->author ?>"/>
    <label>Blogpost: </label><textarea name="post_cont"><?php echo $post->content ?></textarea>
    <input type="submit" value='update blogpost' autocomplete="off" />
</form>