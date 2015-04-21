<p>adding a new post:</p>

<form method="post" action="?controller=posts&action=append">
    <label>author: </label><input type="text" name="post_author" />
    <label>Blogpost: </label><textarea name="post_cont"></textarea>
    <input type="submit" value='create blogpost' autocomplete="off" />
</form>