<!DOCTYPE html>
<html>
<head>
    <style>
        #parent_div_1, #parent_div_2{
            width: 100px;
            height: 100px;
            float: left;
        }
    </style>
    <title>Webslesson |
        <?php echo $title; ?></title>
    <link rel="stylesheet"

          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>
<body>
<h4 align="center">New User Registration</h4>

<div class="container">
    <br/><br/><br/>
    <form method="post" action="<?php echo site_url()?>/main/register_validation">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control"/>
            <span class="text-danger"><?php echo form_error('username'); ?>

</span>
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control"/>
            <span class="text-danger"><?php echo form_error('name'); ?>

</span>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control"/>
            <span class="text-danger"><?php echo form_error('email'); ?>

</span>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" class="form-control"/>
            <span class="text-danger"><?php echo form_error('phone'); ?>

</span>
        </div>

        <div class="form-group">
            <label>Create Password</label>
            <input type="password" name="password" class="form-control"/>
            <span class="text-danger"><?php echo form_error('password'); ?>

</span>
        </div>

        <div id='parent_div_1'>
            <div class="form-group">
                <input type="submit" name="insert" value="Register" class="btn btn-info"/>
                <?php
                echo '<label class="text-danger">' . $this->session->flashdata

                    ("error") . '</label>';
                ?>
            </div>

        </div>
        <div id='parent_div_2'>
            <div class="form-group">
                <input type="button" name="register" value="Login" class="btn btn-info"
                       onclick="location.href = '<?php echo site_url() ?>/main/login';"
                />
            </div>
        </div>
    </form>
</div>
</body>
</html>