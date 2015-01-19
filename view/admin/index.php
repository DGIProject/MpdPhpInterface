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
                <div class="col-md-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li> Liste des serveurs</li>
                    </ul>
                    <ul id="serverList" class="nav nav-pills nav-stacked">
                        <?php
                        $i=0;
                        foreach ($serversList as $server)
                        {
                            echo "<li id='li_$i'><a href='#' id='server_$i' onclick='getStatus($i)'>".$server['name']."</a></li>";
                            $i++;
                        }
                        ?>
                    </ul>
                    <hr>
                    <a href="?type=addServer" class="btn btn-success btn-sm">Create</a>
                </div>
                <div class="col-md-10">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a id="StatusNameServer" class="navbar-brand" href="#">Test</a>
                            </div>
                            <div class="collapse navbar-collapse text-right">
                                <form class="navbar-form navbar-left">
                                    <button type="button" id="mpd_play" data-command="play" class="btn mpd-controls-click"><span class="glyphicon glyphicon-play"></span></button>
                                    <button type="button" id="mpd_stop" data-command="stop" class="btn mpd-controls-click"><span class="glyphicon glyphicon-stop"></span></button>
                                    <button type="button" id="mpd_previous" data-command="previous" class="btn mpd-controls-click"><span class="glyphicon glyphicon-backward"></span></button>
                                    <div class="form-group">
                                        <div class="form-group col-sm-2"><input style="display: inline-block" data-command="seekcur" type="range" class="form-control mpd-controls-change" max="100" min="0"/></div>
                                    </div>
                                    <button type="button" id="mpd_next" data-command="next" class="btn mpd-controls-click"><span class="glyphicon glyphicon-forward"></span></button>
                                </form>


                                <button type="button" id="buttonAddMusic" class="btn btn-primary navbar-btn" data-toggle="popover" data-placement="bottom" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><span class="glyphicon glyphicon-plus"></span> Add Music</button>
                                <button type="button" class="btn btn-info navbar-btn"><span class="glyphicon glyphicon-share"></span></button>
                                <div class="btn-group navbar-btn" data-toggle="buttons">
                                    <label class="btn btn-default active">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Visible
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="options" id="option2" autocomplete="off"> Non visible
                                    </label>
                                </div>
                            </div>
                        </div>
                    </nav>
                        <div class="jumbotron">

                            <ul id="myTab" class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#status" id="status-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">{admin.index.status}</a></li>
                                <li role="presentation"><a aria-expanded="true" href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">{admin.index.settings}</a></li>

                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="status" aria-labelledby="home-tab">
                                    <h3>{admin.index.state}</h3>

                                    <div id="contentInfoServer">

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                                    <br/>
                                    <form onsubmit="return false;" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="mpd_consume" class="col-sm-4 control-label">{mpd.consume}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control mpd-controls-change" data-command="consume" type="checkbox" id="mpd_consume" name="mpd_consume"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mpd_crossfade" class="col-sm-4 control-label">{mpd.xfade}</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control mpd-controls-change" data-command="crossfade" id="mpd_crossfade" name="mpd_crossfade"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mpd_mixrampdb" class="col-sm-4 control-label">{mpd.mixrampdb}</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control mpd-controls-change" data-command="mixrampdb" id="mpd_mixrampdb" name="mpd_mixrampdb"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mpd_mixrampdelay" class="col-sm-4 control-label">{mpd.mixrampdelay}</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control mpd-controls-change" data-command="mixrampdelay" id="mpd_mixrampdelay" name="mpd_mixrampdelay"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mpd_random" class="col-sm-4 control-label">{mpd.random}</label>
                                            <div class="col-sm-8">
                                                <input type="checkbox" class="form-control mpd-controls-change" data-command="random" id="mpd_random" name="mpd_random"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mpd_repeat" class="col-sm-4 control-label">{mpd.repeat}</label>
                                            <div class="col-sm-8">
                                                <input type="checkbox" class="form-control mpd-controls-change" data-command="repeat" id="mpd_repeat" name="mpd_repeat"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mpd_setvol" class="col-sm-4 control-label">{mpd.volume}</label>
                                            <div class="col-sm-8">
                                                <input type="range" class="form-control mpd-controls-change" data-command="setvol" min="-1" max="100" id="mpd_setvol" name="mpd_setvol"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mpd_single" class="col-sm-4 control-label">{mpd.single}</label>
                                            <div class="col-sm-8">
                                                <input type="checkbox" class="form-control mpd-controls-change" data-command="single" id="mpd_single" name="mpd_single"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mpd_replay_gain_mode" class="col-sm-4 control-label">{mpd.single}</label>
                                            <div class="col-sm-8">
                                                <select name="mpd_replay_gain_mode" class="form-control mpd-controls-change" data-command="replay_gain_mode" id="mpd_replay_gain_mode">
                                                    <option value="0">Off</option>
                                                    <option value="1">Track</option>
                                                    <option value="2">Album</option>
                                                    <option value="3">Auto</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-info" style="display: none;">Oops ! There is nothing here</div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container -->

<script src="view/commons/js/bootstrap.min.js"></script>

<script type="text/javascript">
    /*window.onload = function() {
        //$('#buttonAddMusic').popover('show');
    };

    document.getElementById('buttonAddMusic').onclick = function() {
        console.log('onclick');

        $('#buttonAddMusic').popover('toggle');
    };

    $('#buttonAddMusic').on('shown.bs.popover', function () {
        console.log('ok');
    });*/
</script>
<script src="view/admin/js/index.js"></script>
</body>
</html>