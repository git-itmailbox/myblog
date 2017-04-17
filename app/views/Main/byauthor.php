<div class="container">
    <div class="row">
        <form action="/main/byauthor" method="post">
            <div class="col-md-4 col-md-offset-1 form-group">
                <label for="author">Author filter</label>
                <div class="ui-widget">
                    <input type="hidden" id="user_id" name="author_id">
                    <input id="search" name="search">
                    <input type="submit" class="btn btn-default " value="Choose">

                    <!--                    <button type="button" role="button" id="addartikulbtn" class="btn btn-success btn-sm">Add</button>-->
                    <div id="author-search-error"></div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-1 form-group">

            </div>
        </form>

    </div>
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div class="post bg-info">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2>
                            <a href="/view/<?= $post->id ?>"><?= $post->title ?></a>

                        </h2>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-sm-12">
                                <?php if (!$post->logo): ?>
                                    <img src="/img/no-image-box.png" class="img-responsive" alt="no image" width="90">
                                <?php endif; ?>
                                <?php if ($post->logo): ?>
                                    <img src="<?= $post->logo ?>" class="img-responsive" alt="Logo">
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">Author: <?= $post->author_name ?></div>
                            <div class="col-md-2 pull-right"><?= $post->created_at ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <div class="post bg-info">
            <div class="row text-center">
                <div class="col-md-12">
                <p class="text-info"><strong>No posts.</strong> </p>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>