<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deempy - Music</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <base href="http://212.47.239.34/MpdPhpInterface/"/>
    <link rel="stylesheet" href="view/commons/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-3 col-md-6">
            <div class="jumbotron">

                        <form class="form-horizontal" onsubmit="return false;" method="post">
                            <div class="form-group" style="text-align: center;">
                                {admin.login.loginText}
                            </div>
                            <div class="form-group">
                                <label for="inputUsername" class="col-sm-4 control-label">{admin.login.username}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputUsername" placeholder="{admin.login.username}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label">{admin.login.password}</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="{admin.login.password}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-6">
                                    <button type="submit" id="submitBtn" class="btn btn-default">{commons.btn.valid}</button>
                                </div>
                            </div>
                        </form>
                <div class="alert alert-danger" style="display: none" id="errorCo">
                    {admin.login.errorCo}
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container -->

<script src="view/commons/js/bootstrap.min.js"></script>
<script src="view/admin/js/login.js"></script>
</body>
</html>