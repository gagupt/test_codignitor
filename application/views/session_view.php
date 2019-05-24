<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "utf-8">
    <title>CodeIgniter Session Example</title>
</head>

<body>
Welcome <?php echo $this->session->userdata('username'); ?>
<br>
<a href = 'http://gauravtestnew.com/index.php/main/logout'>
    Click Here</a> to logout.
</body>

</html>