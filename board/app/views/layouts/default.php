<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-7">
    <title>THIS IS MY DIETCAKE<?php ($title) ?></title>

    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 50px;
      }
    </style>
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="">Activity Regarding DietCake Introduction</a>
		  <p align=right><a class="btn btn-big btn-primary" href="<?php eh(url('thread/start')) ?>">LOG OUT</a></align>
        </div>
      </div>
    </div>

	
	
	
					
				
	
	
	
    <div class="container">

      <?php echo $_content_ ?>

    </div>

    <script>
    console.log(<?php eh(round(microtime(true) - TIME_START, 3)) ?> + 'sec');
    </script>

  </body>
</html>
