<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
    <?php
    if (isset($page_title)) {
        echo $page_title;
    } else {
        echo 'SPK Penerimaan Karyawan';
    }
    ?>
	
	
	
    </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
		<a class="navbar-brand" href="#">Sistem Pelaporan Sales</a>
						<p class="navbar-brand navbar-right navbar-right"><a href="logout.php" class="btn btn-primary">Logout</a></p>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
		</div>
    </nav>
    <div class="container">
        <div class="row">
