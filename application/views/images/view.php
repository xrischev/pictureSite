<div class="container">
    <h2>Images</h2>
    <?php foreach ($posts as $post):?>
        <div class="row">
            <div class="col-md-9">
                <p>
                    <a class="btn btn-default" href="<?php echo site_url('/image/'
                        .$post['id']); ?>">
                        <img src="<?php echo site_url();?>assets/images/posts/<?php echo $post['upload_image'];?>" >
                    </a>
                </p>
            </div>
            <div class="col_md-3">
                <smal><strong>
                        <?php if($this->session->userdata('isAdmin')) : ?>
                            <a class="btn btn-default" href="<?php echo site_url('/image/'
                                .$post['id']); ?>"
                            </a>View
                        <?php endif;?>
                    </strong></smal>
                <br/>
                <br/>
            </div>
        </div>
        <br/>
    <?php endforeach;?>
    <div class="pagination-links">
        <?php echo $this->pagination->create_links();?>
    </div>
</div>

