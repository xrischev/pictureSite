<head>
    <title>ciBlog</title>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css">
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>viewImage">View image</a>
            <a class="navbar-brand" href="<?php echo base_url(); ?>contacts">Contacts</a>
            <?php if(!$this->session->userdata('logged_in')) : ?>
                <a class="navbar-brand"  href="<?php echo base_url(); ?>users/register">Register</a>
                <a class="navbar-brand pull-right"  href="<?php echo base_url(); ?>users/login">Login</a>
            <?php endif;?>
            <?php if($this->session->userdata('logged_in')) : ?>
                <?php if($this->session->userdata('isAdmin')) : ?>
                    <a class="navbar-brand"  href="<?php echo base_url(); ?>admin/users/statistic">Statistic users</a>
                    <a class="navbar-brand"  href="<?php echo base_url(); ?>admin/users/list">List users</a>
                <?php endif;?>
                <a class="navbar-brand" href="<?php echo base_url(); ?>allUsers">All users</a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>uploadImage">Upload Image</a>
                <a class="navbar-brand"  href="<?php echo base_url(); ?>users/profile">Profile</a>
                <a class="navbar-brand pull-right"  href="<?php echo base_url(); ?>users/logout">Logout</a>
            <?php endif;?>
        </div>

        <?php if($this->session->flashdata('user_register')):?>
            <?php echo '<p class="alert alert-success">'.$this->
                session->flashdata('user_register').'</p>';?>
        <?php endif;?>

        <?php if($this->session->flashdata('login_failed')):?>
            <?php echo '<p class="alert alert-danger">'.$this->
                session->flashdata('login_failed').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('user_loggedin')):?>
            <?php echo '<p class="alert alert-success">'.$this->
                session->flashdata('user_loggedin').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('user_loggedout')):?>
            <?php echo '<p class="alert alert-success">'.$this->
                session->flashdata('user_loggedout').'</p>';?>
        <?php endif;?>

        <?php if($this->session->flashdata('profile_updated')):?>
            <?php echo '<p class="alert alert-success">'.$this->
                session->flashdata('profile_updated').'</p>';?>
        <?php endif;?>

    </div>
</nav>

