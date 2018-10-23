<div class="container">
    <h2>View image</h2>
    <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $image['upload_image']; ?>">
    <smal>Posted on :<?php echo $image['created_at']; ?></smal>
    <span>
        <?php if ($this->session->userdata('isAdmin')) : ?>
            <?php echo form_open('uploadImage/delete/' . $image['id']); ?>
            <input type="submit" value="Delete" class="btn btn-danger">
        <?php endif; ?>
    </span>
    <br/>
    <hr>
    <?php if ($this->session->userdata('user_id') == $image['user_id'] && !$this->session->userdata('isAdmin')): ?>
        <?php echo form_open('uploadImage/delete/' . $image['id']); ?>
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    <?php endif ?>
    <h3>Comments
        <span>
        <?php if ($this->session->userdata('isAdmin')) : ?>
        <button>
                <a class="btn btn-default" href="<?php echo site_url('/imageComment/'
                    . $image['id']); ?>">View comment
            </a>
        </button>
        <?php endif; ?>
    </span>
    </h3>
    <?php if ($comments): ?>
        <?php foreach ($comments as $comment): ?>
            <div class="well">
                <h5><?php echo $comment['body']; ?></h5>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No Comments To Display</p>
    <?php endif; ?>
    <hr>
    <?php echo validation_errors(); ?>
    <?php if ($this->session->userdata('user_id')): ?>
        <h3>Add Comment</h3>
        <?php echo form_open('comments/create/' . $image['id']); ?>
        <div class="form_group">
            <label>Body</label>
            <textarea type="text" name="body" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn-btn-primary">Submit</button>
        </form>
    <?php endif ?>
</div>


