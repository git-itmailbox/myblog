<h1>INDEX</h1>
<div class="container">
    <table class="table table-bordered table-striped">
        <tr>
            <th>id</th>
            <th>category</th>
            <th>text</th>
            <th>title</th>
            <th>excerpt</th>
            <th>keywords</th>
            <th>description</th>
        </tr>
        <?php if(!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post->id ?></td>
            <td><?= $post->category_id?></td>
            <td><?= $post->text?></td>
            <td><?= $post->title ?></td>
            <td><?= $post->excerpt ?></td>
            <td><?= $post->keywords ?></td>
            <td><?= $post->description ?></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>


    </table>
</div>