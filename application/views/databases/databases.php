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
          <h1 class="page-header">Databases</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo base_url('databases/edit/mysql') ?>">
                <span class="placeholder-span <?php echo $mysql->conn_id ?  "connected" : "disconnected" ?>"></span>
              </a>
              <h4>SQL</h4>
              <span class="text-muted"><?php echo $mysql->conn_id ?  "Connected" : "Disconnected" ?></span>
            </div>

            <div class="col-xs-6 col-sm-3 placeholder">
              <a href="<?php echo base_url('databases/edit/mongodb') ?>">
              <span class="placeholder-span <?php echo (isset($this->mongo_db->connect->connected) && $this->mongo_db->connect->connected) ?  "connected" : "disconnected" ?>"></span>
              </a>
              <h4>MONGODB</h4>
              <span class="text-muted"><?php echo isset($this->mongo_db->connect->connected) && $this->mongo_db->connect->connected ?  "Connected" : "Disconnected" ?></span>
            </div>

          </div>

          <h2 class="sub-header">Action</h2>
          <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#select" aria-controls="home" role="tab" data-toggle="tab">Select</a></li>
              <li role="presentation"><a href="#insert" aria-controls="profile" role="tab" data-toggle="tab">Insert</a></li>
              <li role="presentation"><a href="#update" aria-controls="messages" role="tab" data-toggle="tab">Update</a></li>
              <li role="presentation"><a href="#delete" aria-controls="settings" role="tab" data-toggle="tab">Delete</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="select" style="padding: 10px;">
                <div id="form">
                  <h3>Parameter</h3>
                  <form class="form-inline" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName2">Records</label>
                      <input type="text" class="form-control" name="record" title="Number of record you want to select" value="100" placeholder="Number of record you want to select">
                    </div>
                    <input type="hidden" name="action" value="select">
                    <button type="submit" class="btn btn-default" title="start to execute">Go</button>
                  </form>
                </div><!--end #form -->
                <?php if(!empty($result)) {?>
                <div id="result">
                  <h3>Result</h3>
                  <?php
                    print_r($result);
                  ?>
                </div><!--end result -->
                <?php } ?>
              </div><!--end tab Select -->
              <div role="tabpanel" class="tab-pane" id="insert">...</div>
              <div role="tabpanel" class="tab-pane" id="update">...</div>
              <div role="tabpanel" class="tab-pane" id="delete">...</div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url('assets/js/vendor/holder.min.js');?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>
  </body>
</html>
