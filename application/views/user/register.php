<div class="container">
    <h2><?= $title;?></h2>
    <?php echo validation_errors();?>
    <?php echo form_open_multipart('users/register');?>
    <div class="form-group">
        <label >Username</label>
        <input type="text" class="form-control" name="username" placeholder="name">
    </div>
    <div class="form-group">
        <label >email</label>
        <input  type="email" class="form-control" name="email" placeholder="email">
    </div>
    <div class="form-group">
        <label >password</label>
        <input type="password" class="form-control" name="password" placeholder="password">
    </div>
    <button type="submit" class="btn btn-default">Register</button>
    </form>
</div>