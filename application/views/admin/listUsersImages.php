<div class="container">
    <h2>Images</h2>
    <?php foreach ($userImages as $userImage):?>
        <div class="row">
            <div class="col-md-9">
                <p>
                    <a class="btn btn-default" href="<?php echo site_url('/image/'
                        .$userImage['id']); ?>">
                        <img src="<?php echo site_url();?>assets/images/posts/<?php echo $userImage['upload_image'];?>" >
                    </a>
                </p>
            </div>
        </div>
        <br/>
    <?php endforeach;?>
</div>

