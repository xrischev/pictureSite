<div class="container">
    <h2>All Users</h2>
    <?php foreach ($users as $user): ?>
        <div class="row">
            <div class="col-sm-12">
                <label>
                    Name : <span> <?php echo $user['userName']; ?></span>
                    <span> <?php echo form_open('admin/userDelete/' . $user['id'] ); ?>
                        <input type="submit" value="Delete" class="btn btn-danger"></span>
                    <button>  <a class="btn btn-default" href="<?php echo site_url('/admin/userImages/'
                            . $user['id']); ?>">View images</button>
                    </a>
                </label>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="pagination-links">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>

