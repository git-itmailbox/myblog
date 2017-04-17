<div class="container">
    <div class="post bg-info">

        <?php if (isset($post) && $post) : ?>
            <div class="row text-center">
                <div class="col-md-12">
                    <h2><?= $post->title ?></h2>
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
                        <div class="col-md-12">
                            <?= $post->text ?>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">Author: <?= $post->author_name ?>
                            ( <?= $author->f_name . " " . $author->l_name ?> )
                        </div>
                        <div class="col-md-2 pull-right"><?= $post->created_at ?></div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="row">
                <div class="col-md-12 text-center ">
                    Post is not found
                </div>
            </div>

        <?php endif; ?>
    </div>
</div>
