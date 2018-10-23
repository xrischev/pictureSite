<div class="container">
    <?php echo form_open('users/login'); ?>
    <div class="row">
        <div class="col-md-10 col-md-offset-10">
            <h1 class="text-center"><?php echo $title;?></h1>
            <div>
                <input type="text" name="username" class="form-control"  required placeholder="enter email">
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="enter password"  required autofocus>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
</div>