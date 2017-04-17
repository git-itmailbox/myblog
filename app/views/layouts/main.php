<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<nav role="navigation" class="navbar navbar-default">
    <div class="navbar-header">
        <a href="/" class="navbar-brand">MyBlog</a>
    </div>

    <!-- Collection of nav links and other content for toggling -->

    <div id="navbarCollapse" class="collapse navbar-collapse">

        <ul class="nav navbar-nav">
            <li class=""><a href="/">Home</a></li>
            <li class=""><a href="/main/create">Create new post</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class=""><a href="/main/register">Registration</a></li>

            <?php if(!$user): ?>
                <li><a href="/main/login">Login</a></li>
            <?php endif; ?>

            <?php if($user): ?>
                <li><a href="/main/logout">Logout  ( <?= $user->login ?> )</a> </li>
            <?php endif; ?>

        </ul>

    </div>

</nav>
<?=$content?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/myjs.js"></script>

</body>
</html>