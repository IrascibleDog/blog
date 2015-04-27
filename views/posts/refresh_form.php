<p>updating post a new post:</p>

<form method="post" action="?controller=posts&action=refresh">
    <label>author: </label><input type="text" name="post_author" value="<?php $post->author ?>"/>
    <label>Blogpost: </label><textarea name="post_cont"><?php $post->content ?></textarea>
    <input type="submit" value='update blogpost' autocomplete="off" />
</form>