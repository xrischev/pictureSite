<div class="container">
    <h2>Comments</h2>
    <?php foreach ($comments as $comment): ?>
        <div class="row">
            <label>Comment</label>
            <div class="col-sm-12">
                <label>
                    body : <span> <?php echo $comment['body']; ?></span>
                </label>
                <p>
                    <?php echo form_open('comments/delete/' . $comment['id']); ?>
                    <input hidden="hidden" type="submit" name="id" value=" <?php echo  $comment['image_id']; ?>" class="btn btn-danger">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </p>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="pagination-links">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>

