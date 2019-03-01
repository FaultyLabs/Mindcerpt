<main class="mt-5 pt-5 col-md-6">  
    <h2>Create a Post</h2>
    <hr>
    <?php if($postMessage) : ?>
        <?php if ($postMessage ==  'success'): ?>
            <p style="color: green;">Success! Your Post has been published.</p>
        <?php elseif ($postMessage == 'error'): ?>
            <p style="color: green;">Oops! Something went wrong.</p>
        <?php endif; ?>
    <?php endif; ?>
    <form role="form" enctype="multipart/form-data" method="post" action="<?php echo URL_ROOT; ?>post/create">
        <div class="form-group">
            <label>Title</label>
            <input name="post_title" type="text" class="form-control" placeholder="" required autofocus>
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea class="form-control" name="post_body" id="" cols="30" rows="10" required autofocus></textarea>
        </div>
        <!-- <div class="form-group">
            <label>Category</label>
            <input name="post_category" type="text" class="form-control" placeholder="" required autofocus>
        </div> -->

        <div class="form-group">
            <h4>Add a tag</h4>
            <?php if ($tags) : ?>
                <?php foreach($tags as $tag) : ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="<?= $tag->tag_name ?>" value=<?= $tag->tag_id ?> id="defaultCheck<?= $tag->tag_id ?>">
                    <label class="form-check-label" for="defaultCheck<?= $tag->tag_id ?>">
                        <?= $tag->tag_name ?>
                    </label>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Publish</button>
    </form>
    <!-- <form role="form" enctype="multipart/form-data" method="" action="<?php //echo URL_ROOT; ?>friend/requestFriend">
        <button name="submit" type="submit" class="btn btn-primary">RequestFriend</button>
    </form> -->
</main>