<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="bootstrap/js/jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/style.css" type="text/css"  />
<title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li><a href="homeUser.php">HOME</a></li>
              <li class="active"><a href="historyUser.php">History</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="clearfix"></div>
    	
    
<div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    
        <h2>Daftar Pemesanan Tiket</h2>
    <table border="1" width="60%">
    <tr>
    <th>Dari</th>
    <th>Ke</th>
    <th>Jadwal</th>
    <th>Jumlah</th>
    <th>Total</th>
    <th>Status Pembayaran</th>
    </tr>
    <?php
    require("library.php");
    $Lib = new Library();
    $namaku = $userRow['user_name'];
    $show = $Lib->showOrder1("Select dari, ke, jadwal, jumlah, total, statusPemb from customer where nama = '$namaku'");
    while($data = $show->fetch(PDO::FETCH_OBJ)){
        echo "
        <tr>
        <td>$data->dari</td>
        <td>$data->ke</td>
        <td>$data->jadwal</td>
        <td>$data->jumlah</td>
        <td>$data->total</td>
        <td>$data->statusPemb</td>
        
        </tr>";
    };  
    ?>
    
    
    </table>
       
    </div>

</div>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

