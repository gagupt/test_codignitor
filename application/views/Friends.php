<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>
<body>

<h2>Your connections</h2>

<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Followings')" id="defaultOpen">Followings</button>
    <button class="tablinks" onclick="openCity(event, 'Followers')" id="defaultOpen">Followers</button>
    <button class="tablinks" onclick="openCity(event, 'Find_Friends')">Find Friends</button>
    <!--    <button class="tablinks" onclick="openCity(event, 'Received')">Request Received</button>-->
    <!--    <button class="tablinks" onclick="openCity(event, 'Sent')">Request Sent</button>-->
</div>

<div id="Followings" class="tabcontent">
    <table>
        <?php
        if (isset($friends)) {
            foreach ($friends as $item) {
                echo '<tr>
               <td height="30" width="100"> 
                <a href="' . site_url() . '/user/getPublicProfile?username=' . $item['username2'] . '">
                        <h5>' . $namemap[$item['username2']] . '</h5></a>
                     </td>
                        <td height="30" style="font-size: small">
 <a href="' . site_url() . '/user/removeFriend?username2=' . $item['username2'] . '">Unfollow</a>
                        </td>
                    </tr>';
            }
        }
        ?>
    </table>
</div>

<div id="Followers" class="tabcontent">
    <table>
        <?php
        $unamefrnd = array();
        foreach ($friends as $friend) {
            $unamefrnd[$friend['username2']] = $friend['username2'];
        }
        if (isset($followers)) {
            foreach ($followers as $item) {
                if (!in_array($item['username1'], $unamefrnd) && $item['username1'] != $this->session->userdata('username')) {
                    echo '<tr>
               <td height="30" width="100"> 
                <a href="' . site_url() . '/user/getPublicProfile?username=' . $item['username1'] . '">
                        <h5>' . $namemap[$item['username1']] . '</h5></a>
                     </td>
                        <td height="30" style="font-size: small">
 <a href="' . site_url() . '/user/addFriend?username2=' . $item['username1'] . '">Follow Back</a>
                        </td>
                    </tr>';
                } else {
                    echo '<tr>
               <td height="30" width="100"> 
                <a href="' . site_url() . '/user/getPublicProfile?username=' . $item['username1'] . '">
                        <h5>' . $namemap[$item['username1']] . '</h5></a>
                     </td>
                    </tr>';
                }
            }
        }
        ?>
    </table>
</div>

<div id="Find_Friends" class="tabcontent">
    <table>
        <?php
        $unamefrnd = array();
        foreach ($friends as $friend) {
            $unamefrnd[$friend['username2']] = $friend['username2'];
        }
        if (isset($user1list)) {
            foreach ($user1list as $item) {
                //print_r($item['username']);
                if (!in_array($item['username'], $unamefrnd) && $item['username'] != $this->session->userdata('username')) {
                    echo '<tr>
               <td height="30" width="100"> 
                <a href="' . site_url() . '/user/getPublicProfile?username=' . $item['username'] . '">
                        <h5>' . $item['name'] . '</h5></a>
                     </td>
                        <td height="30" style="font-size: small">
 <a href="' . site_url() . '/user/addFriend?username2=' . $item['username'] . '">Follow</a>
                        </td>
                    </tr>';
                }
            }
        }
        ?>
    </table>
</div>


<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();
</script>

</body>
</html>
