<div class="container">
    <div class="row">
        <h2>Profile User</h2>
        <div class="col-md-7 ">
            <div class="panel panel-default">
                <div class="panel-heading"> <h2><?php echo $user['userName'];?></h2></div>
                <div class="row">
                    <?php echo form_open('users/update');?>
                    <input type="hidden" name="id" value="<?php echo $user['id'];?>">
                    <div class="form-group">
                        <div>Date Of Joining:<?php echo $user['created_at'];?></div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">User name</label>
                        <input type="text" class="form-control" name="userName" placeholder="add name"
                               value="<?php echo $user['userName'];?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Email</label>
                        <input  class="form-control" name="email" placeholder="add email" value="<?php echo $user['email'];?>" >
                    </div>
                    <button type="submit" class="btn btn-default">Edit profile</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>




