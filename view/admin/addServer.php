<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MpdPhpInterface - Admin</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">MpdPhpInterface</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="admin.php">Status</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div id="playlist" class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <form class="form-horizontal" method="post" onsubmit="return false;">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label"> {install.step2.form.name} </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder=" {install.step2.form.name} ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputHostName" class="col-sm-2 control-label"> {install.step2.form.hostName} </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputHostName" placeholder=" {install.step2.form.hostName} ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPort" class="col-sm-2 control-label"> {install.step2.form.port} </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPort" placeholder=" {install.step2.form.port} ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-2 control-label">{install.step2.form.password}</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="{install.step2.form.password}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" id="submitBtn" class="btn btn-default"> {commons.btn.valid} </button>
                                    <a href="admin.php" class="btn btn-info">{commons.btn.cancel}</a>
                                </div>
                            </div>
                        </form>
                        <div class="alert alert-danger" id="errorCo" style="display: none">
                            {install.step2.form.errorCo}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container -->

<script src="view/commons/js/bootstrap.min.js"></script>
<script src="view/admin/js/addServer.js"></script>
</body>
</html>