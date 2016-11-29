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
              <li class="active"><a href="homeUser.php">HOME</a></li>
              <li><a href="historyUser.php">History</a></li>
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
    
        <h2>Pemesanan Tiket</h2><br>
    <form action="homeUser.php" method="POST" class="form-group row">
        Dari <input type="text" name="dari" class="form-control"><br>
        Ke <input type="text" name="ke" class="form-control"><br>
        Jadwal Keberangkatan <input type="text" name="jadwal" class="form-control"><br>
        Jumlah Pesanan <input type="text" name="jumlah" class="form-control"><br>
        <input type="submit" name="addOrder" value="Beli" class="btn btn-success">
        <input type="reset" value="Reset" class="btn btn-warning">
    </form>
    </div>
</body>
</html>

<?php
    require('library.php');
    if(isset($_POST['addOrder']))
    {
        $nama = $userRow['user_name'];
        $dari = $_POST['dari'];
        $ke = $_POST['ke'];
        $jadwal = $_POST['jadwal'];
        $jumlah =$_POST['jumlah'];
        $total = $jumlah*500000;
        $statusPemb = 'Belum';
        
        $Lib = new Library();
        $add = $Lib->addOrder($nama, $dari, $ke, $jadwal, $jumlah, $total, $statusPemb);
        if($add == "Success"){
            header('Location: historyUser.php');
        }
    }
    
    
 ?>      
    </div>

</div>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>