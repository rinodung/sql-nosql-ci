<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Dashboard Template for Bootstrap</title>
    <?php echo base_url(); ?>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url('assets/css/ie10-viewport-bug-workaround.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assets/js/ie-emulation-modes-warning.js'); ?>"></script>
   
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SQL vs NOSQL comparison</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12 col-md-12 main">
          <h1 data-toggle="collapse" data-target="#server-info">Server Information</h1>
          <div id="server-info" class="collapse">
            Server: <?php echo $_SERVER['SERVER_NAME'];?>
          </div>
          

          <h1 class="page-header">Databases</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo base_url('databases/edit/mysql') ?>">
                <span class="placeholder-span <?php echo $sqlStatus ?  "connected" : "disconnected" ?>"></span>
              </a>
              <h4>SQL</h4>
              <span class="text-muted"><?php echo $sqlStatus ?  "Connected" : "Disconnected" ?></span>
            </div> 

            <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo base_url('databases/edit/mongodb') ?>">
              <span class="placeholder-span <?php echo $mongoDbStatus ?  "connected" : "disconnected" ?>"></span>
              </a>
              <h4>MONGODB</h4>
              <span class="text-muted"><?php echo $mongoDbStatus ?  "Connected" : "Disconnected" ?></span>
            </div>

          </div><!--End placeholder -->

          <h2 class="sub-header">Action</h2>
          <div  id="action">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li><a href="<?php echo base_url('databases/index') ?>">Select</a></li>
              <li><a href="<?php echo base_url('databases/insert') ?>">Insert</a></li>
              <li class="active"><a href="<?php echo base_url('databases/update') ?>">Update</a></li>
              <li><a href="<?php echo base_url('databases/delete') ?>">Delete</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane" id="select" style="padding: 10px;">
                
              </div><!--end tab Select -->
              <div role="tabpanel" class="tab-pane" d="insert" style="padding: 10px;">
                
              </div>
              <div role="tabpanel" class="tab-pane active" id="update" style="padding: 10px;">
                <div id="form">
                  
                  <form class="form-inline" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName2">Records</label>
                      <input type="text" class="form-control" name="record" title="Number of record you want to update" value="<?php echo isset($_POST['record']) ? $_POST['record']: 100?>" placeholder="Number of record you want to update">
                    </div>
                    <input type="hidden" name="action" value="update">
                    <button type="submit" class="btn btn-default" title="start to execute"
                    data-toggle="collapse" data-target="#waiting-progress">Go</button>
                  </form>

                  <div class="progress  collapse" id="waiting-progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" 
                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                      waiting...
                    </div>
                  </div><!--end waiting progress bar-->

                </div><!--end #form -->
                <?php if(!empty($result)) {?>                
                <div id="result" >                 
                  <h3>Result</h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active">
                        <a href="#result-time" aria-controls="home" role="tab" data-toggle="tab">Time</a>
                      </li>
                      <li role="presentation">
                        <a href="#result-log" aria-controls="profile" role="tab" data-toggle="tab">Log</a>
                      </li>                    
                    </ul>


                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="result-time">
                        
                        <p>SQL: <?php echo $result['sql']['time']; ?>(sec) </p>                        

                        <div class="progress">
                          <div class="progress-bar progress-bar-success" role="progressbar"
                           aria-valuenow="<?php echo $result['sql']['time']; ?>" aria-valuemin="0"
                           aria-valuemax="<?php echo $result['sql']['time']; ?>"
                           style="width: <?php echo 100 * ($result['sql']['time']/$result['nosql']['time'])?>%">
                            <?php echo $result['sql']['time']; ?>(sec)
                          </div>
                        </div>
                        <p>NOSQL: <?php echo $result['nosql']['time']; ?>(sec) </p>
                        <div class="progress">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $result['nosql']['time']; ?>" 
                          aria-valuemin="0" aria-valuemax="<?php echo $result['sql']['time']; ?>"
                          style ="width: 100%">
                            <?php echo $result['nosql']['time']; ?>(sec)
                          </div>
                        </div>

                      </div>
                      <div role="tabpanel" class="tab-pane" id="result-log">
                        <pre>
                          <?php
                            print_r($result);
                          ?>
                        </pre>
                      </div>                    
                    </div>                 
                </div><!--end result -->
                <?php } ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="delete">...</div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url('assets/js/vendor/holder.min.js');?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>

    <?php if(!empty($_POST)) {?>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

    <?php } ?>
  </body>
</html>
