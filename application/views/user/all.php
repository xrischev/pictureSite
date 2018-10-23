<div class="container">
    <h2>All Users</h2>
    <?php foreach ($users as $user): ?>
        <div class="row">
            <div class="col-sm-12">
                <label>
                    Name : <span> <?php echo $user['userName']; ?></span>
                </label>,
                <label>
                    Count image : <span><?php echo $user['countPicture']; ?></span>
                </label>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="pagination-links">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>

