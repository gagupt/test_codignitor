<html>

<body>

<div style="width: 390px; height: 200px; overflow-y: scroll;">

    <?php
    if (isset($notifications)) {
        foreach ($notifications as $notification) {
            echo
                '<a href="' . site_url() . '/user/getPublicProfile?username=' . $notification['username2'] . '">
                        ' . $namemap[$notification['username2']] . '</a>'
                . ' followed you';
            echo '<br />';
            echo '<br />';
        }
    }
    ?>
</div>


</body>
</html>
