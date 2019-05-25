<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        /* Style the body */
        body {
            font-family: Arial;
            margin: 0;
        }

        /* Header/logo Title */
        .header {
            padding: 60px;
            text-align: center;
            background: #1abc9c;
            color: white;
        }

        /* Style the top navigation bar */
        .navbar {
            display: flex;
            background-color: #333;
        }

        /* Style the navigation bar links */
        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }

        /* Change color on hover */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Column container */
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        /* Create two unequal columns that sits next to each other */
        /* Sidebar/left column */
        .side {
            flex: 30%;
            background-color: #f1f1f1;
            padding: 20px;
        }

        /* Main column */
        .main {
            flex: 70%;
            background-color: white;
            padding: 20px;
        }

        /* Fake image, just for this example */
        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        /* Footer */
        .footer {
            padding: 20px;
            text-align: center;
            background: #ddd;
        }

        .content {
            max-width: 500px;
            margin: auto;
            padding: 10px;
        }

        /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 700px) {
            .row, .navbar {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<!-- Note -->
<div style="background:yellow;padding:5px">
    <h4 style="text-align:center">Welcome <?php echo $this->session->userdata('username'); ?>
    </h4>
</div>

<!-- Header -->
<div class="header">
    <h1>Facebook Return</h1>
    <p>A small social network</p>
</div>

<!-- Navigation Bar -->
<div class="navbar">
    <a href="http://gauravtestnew.com/index.php/user">Home</a>
    <a href="http://gauravtestnew.com/index.php/user/getProfile">Profile</a>
    <a href="#">Settings</a>
    <a href="#">Friends</a>
    <a href="http://gauravtestnew.com/index.php/main/logout">Logout</a>
</div>

<!-- The flexible grid (content) -->
<div class="row">
    <div class="side">
        <h2>Notifications</h2>


        <div class="fakeimg" style="height:60px;">Image</div>
        <br>
        <div class="fakeimg" style="height:60px;">Image</div>
        <br>
        <div class="fakeimg" style="height:60px;">Image</div>

        <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
        <h3>Online Users</h3>
        <div class="fakeimg" style="height:60px;">Image</div>
        <br>
        <div class="fakeimg" style="height:60px;">Image</div>
        <br>
        <div class="fakeimg" style="height:60px;">Image</div>
        <p>Lorem ipsum dolor sit ame.</p>
    </div>
    <div class="main">
        <form method="post" action="http://gauravtestnew.com/index.php/user/createPost">
            <textarea rows="4" cols="100" name="textarea" placeholder="Whats in your mind..."></textarea>
            <input type="submit" value="Post">
        </form>


        <?php
        if (isset($profile)) {
            if (isset($profile)) {
                $data1['profile'] = $profile;
            }
            if (isset($userdata)) {
                $data1['userdata'] = $userdata;
            }
            $this->load->view('profile', $data1);
        } else {
            if (isset($view)) {
                $data1['view'] = $view;
            }
            if (isset($response)) {
                $data1['response'] = $response;
            }
            $this->load->view('user_view', $data1);
        }
        ?>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <h2>copy right @nowhere</h2>
</div>

</body>
</html>
