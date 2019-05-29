<!DOCTYPE html>
<html>
<head>
    <style>
        #parent_div_1, #parent_div_2 {
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
<div class="container">
    <br/><br/><br/>
    <form method="post" action="<?php echo site_url() . '/main/login_validation' ?>">
        <div class="form-group">
            <label>Enter Username</label>
            <input type="text" name="username" class="form-control"/>
            <span class="text-danger"><?php echo form_error('username'); ?>

</span>
        </div>
        <div class="form-group">
            <label>Enter Password</label>
            <input type="password" name="password" class="form-control"/>
            <span class="text-danger"><?php echo form_error('password'); ?>

</span>
        </div>

        <div id='parent_div_1'>
            <div class="form-group">
                <input type="submit" name="insert" value="Login" class="btn btn-info"/>
                <?php
                echo '<label class="text-danger">' . $this->session->flashdata

                    ("error") . '</label>';
                ?>
            </div>

        </div>

        <div id='parent_div_2'>
            <div class="form-group">
                <input type="button" name="register" value="New Registeration" class="btn btn-info"
                       onclick="location.href = '<?php echo site_url() ?>/main/register';"
                />
            </div>
        </div>
    </form>
</div>
</body>
</html>