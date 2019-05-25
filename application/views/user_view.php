<!doctype html>
<html>
<head>
    <style>
        .content {
            max-width: 500px;
            margin: auto;
            padding: 10px;
        }
    </style>
</head>

<body style="background-color:rgb(240,248,255);">
<div class="content">
<!--    <a href="http://gauravtestnew.com/index.php/user">Home</a>-->
<?php

//if (isset($view) && $view != 3) {
//    ?>
<!--    <a href="http://gauravtestnew.com/index.php/user">Home</a>-->
<!--    --><?php
//}
// All users list
if(isset($view) && $view == 1)  {
    ?>
    <table border='1'>
        <tr>
            <td height="30" width="100">S.no</td>
            <td height="30" width="100">Username</td>
            <td height="30" width="100">Name</td>
            <td height="30" width="100">Email</td>
            <td height="30" width="100">&nbsp;</td>
        </tr>
        <?php
        $sno = 1;
        foreach($response as $val){
            echo '<tr>
                        <td height="30" width="100">'.$sno.'</td>
                        <td height="30" width="100">'.$val['username'].'</td>
                        <td height="30" width="100">'.$val['name'].'</td>
                        <td height="30" width="100">'.$val['email'].'</td>
                        <td height="30" width="100"><a href="'.site_url().'/user/index?edit='.$val['id'].'">Edit</a></td>
                        <td height="30" width="100"><a href="'.site_url().'/user/deleteUser?delete='.$val['id'].'">Delete</a></td>
                    </tr>';
            $sno++;
        }
        ?>
    </table>
    <?php
}

// Edit user
if(isset($view) && $view == 2)  {
    ?>
    <form method='post' action=''>
        <table>
            <tr>
                <td>Username</td>
                <td><input type='text' name='txt_uname' value='<?php echo $response[0]['username']; ?>' ></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type='text' name='txt_name'  value='<?php echo $response[0]['name']; ?>'></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type='text' name='txt_email' value='<?php echo $response[0]['email']; ?>' ></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type='submit' name='submit' value='Submit'></td>
            </tr>
        </table>
    </form>
    <?php
}

// Add user
    if (isset($view) && $view != 3 && $view != 2) {
        ?>
        <a href="http://gauravtestnew.com/index.php/user/addUser">Add</a>
        <?php
    }
    if (isset($view) && $view == 3) {
    ?>

    <form method='post' action='http://gauravtestnew.com/index.php/user/addUser'>
        <table>
            <tr>
                <td>Username</td>
                <td><input type='text' name='txt_uname1' value=''></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type='text' name='txt_name1' value=''></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type='text' name='txt_email1' value=''></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type='submit' name='submit' value='Add'></td>
            </tr>
        </table>
    </form>
    <?php
}
?>
</div>
</body>
</html>