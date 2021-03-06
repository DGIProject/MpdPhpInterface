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
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">MpdPHP</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#"> {install.commons.installation} </a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron" style="text-align: center">
                {install.index.welcome}
                <form class="form-horizontal" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <label for="langSelect" class="col-sm-2 control-label"> {install.index.form.language} </label>
                        <div class="col-sm-4">
                            <select name="lang" class="form-control" id="langSelect">
                                <?php 
                                    foreach ($listLang as $lang)
                                    {
                                        echo "<option value='$lang[1]'>$lang[0]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" id="submitBtn" class="btn btn-default"> {commons.btn.valid} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /.container -->

<script src="view/commons/js/bootstrap.min.js"></script>
<script src="view/install/js/index.js"></script>
</body>
</html>