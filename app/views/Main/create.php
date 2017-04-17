<div class="container">

    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <fieldset>

            <div id="legend">
                <legend class="">Create Post</legend>
            </div>
            <div class="control-group">
                <!-- Title -->
                <label class="control-label" for="title">Title</label>
                <div class="controls">
                    <input type="text" id="title" name="title" placeholder="" class="input-xlarge" required
                           value="<?php echo (isset($model->title)) ? $model->title : ""; ?>"

                    >
                    <p class="help-block">Title is required</p>
                    <p class="has-error text-danger"><?php echo (isset($errors['title'])) ? $errors['title'] : ""; ?></p>

                </div>
            </div>

            <div class="control-group">
                <!-- Text -->
                <label class="control-label" for="text">Text</label>
                <div class="controls">
                    <textarea rows="10" cols="45" name="text" class="input-xlarge"><?php echo (isset($model->text)) ? $model->text : ""; ?></textarea>
                    <p class="help-block">Please provide text of blog</p>
                    <p class="has-error text-danger"><?php echo (isset($errors['text'])) ? $errors['text'] : ""; ?></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="logo">Logo</label>
                <div class="controls">
                    <input class="" type="file" name="logo" id="logo">
                    <p class="help-block">You may upload images(png,jpg,gif)</p>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-success" type="submit">Create task</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
