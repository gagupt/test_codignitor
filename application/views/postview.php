<!doctype html>
<html>
<head>
    <style>
        .content {
            max-width: 1000px;
            margin: auto;
            padding: 10px;
        }

        tr.separated td {
            /* set border style for separated rows */
            border-bottom: 1px solid green;
        }

    </style>
</head>

<body style="background-color:rgb(240,248,255);">
<div class="content">
    <?php

    if (isset($view) && $view == 1) {
        ?>
        <table width="900">
            <tr>
                <!--            <td height="30" width="10%">S.no</td>-->
                <!--                <td height="30" width="10%"><h4>Username</h4></td>-->
                <td height="30" width="160%" align="center"><h4>Timeline</h4></td>
                <!--                <td height="30" width="10%" align="center"><h4>Posted At</h4></td>-->
                <!--                <td height="30" width="10%">&nbsp;</td>-->
            </tr>
            <?php
            $sno = 1;
            foreach ($response as $val) {
                echo '<tr>
                        <td height="30" width="100">
                        <a href="' . site_url() . '/user/getPublicProfile?username=' . $val['username'] . '">
                        <h5>' . $namemap[$val['username']] . '</h5></a>
                        </td>
                        </tr>
                        <tr>
                        <td height="30" width="100" align="center" style="font-size: large">' . $val['text'] . '</td>
                        <td height="30" width="100" style="font-size: small">' . $val['timestamp'] . '</td>
                        </tr>
                        <tr class="separated">
                        <td height="30" style="font-size: small"><a href="' . site_url() . '/user/index?edit=' . $val['id'] . '">Edit</a>
                        <a href="' . site_url() . '/user/deletePost?delete=' . $val['id'] . '">Delete</a></td>
                    </tr>';
                $sno++;
            }
            ?>
        </table>
        <?php
    }

    // Edit user
    if (isset($view) && $view == 2) {
        ?>
        <form method='post' action=''>
            <table>
                <tr>
                    <td>Post</td>
                    <td><input type='text' name='txt_name' value='<?php echo $response[0]['text']; ?>'></td>
                </tr>
                <td>&nbsp;</td>
                <td><input type='submit' name='submit' value='Submit'></td>
                </tr>
            </table>
        </form>
        <?php
    }

    ?>
</div>
</body>
</html>