<div class="container">
 <div class="row">
     <div class="col-sm-12">
         <div class="col-sm-6">
             <h2>Last 5 registered users</h2>
             <?php foreach ($users as $user): ?>
                 <div class="row">
                     <div class="col-sm-12">
                         <label>
                             Name : <span> <?php echo $user['userName']; ?></span>
                         </label>,
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
         <div class="col-sm-6">
             <h2>Last 5 uploaded pictures</h2>
             <?php foreach ($pictures as $picture): ?>
                 <div class="row">
                     <div class="col-sm-12">
                         <img src="<?php echo site_url();?>assets/images/posts/<?php echo $picture['upload_image'];?>" >
                         <label>
                             Uploaded by : <span> <?php echo $picture['userName']; ?></span>
                         </label>,
                     </div>
                 </div>
             <br>
             <?php endforeach; ?>
         </div>
     </div>
 </div>
</div>