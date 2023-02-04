<?php
ob_start();
session_start();
error_reporting();
date_default_timezone_set('UTC');
include "includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: ../");
    exit();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);

?>
<nav class="navbar navbar-expand-xl navbar  navbar-light " style="position: fixed; background-color: var(--color-nav); z-index: 1; top: 0px; left: 0px; right: 0px; line-height: 1.5; font-family: Lato, sans-serif; font-size: 15px; padding: 0.5rem 1rem;">
<a class="navbar-brand" href="main" style="color: var(--font-color);"><img width="40px" src="files/images/logo.png"> XBASELEET</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="">
<i class="navbar-toggler-icon"></i>
</button>
<div class="collapse navbar-collapse order-1" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">

<li class="nav-item dropdown mr-auto">
<a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-warehouse fa-sm orange-text"></i>
Hosts
</a>
<div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
	
<a class="dropdown-item waves-effect waves-light" href="rdp" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-desktop fa-fw"></i> RDPs <span class="badge badge-primary" span id"rdp"></span></span></a>
<a class="dropdown-item waves-effect waves-light" href="cPanel" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-tools fa-fw"></i> cPanels <span class="badge badge-primary<span class="badge badge-primary" span id"cpanel"></span></span></a>
<a class="dropdown-item waves-effect waves-light" href="shell" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-file-code fa-fw"></i> Shells <span class="badge badge-primary" span id"shell"></span></span></a>
<!---- <a class="dropdown-item waves-effect waves-light" href="ssh" style="color: var(--font-color);"><span class="px-2"><i class="fab fa-linux"></i> SSH/WHM <span class="badge badge-primary">158</span></span></a> --->
     </div>
</li>
<li class="nav-item dropdown mr-auto">
<a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fab fa-google-play fa-sm text-success"></i>
Send
</a>
<div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
	
<a class="dropdown-item waves-effect waves-light" href="mailer" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-leaf fa-fw"></i> Mailers <span class="badge badge-primary" span id"mailer"></span></span></a>
<a class="dropdown-item waves-effect waves-light" href="smtp" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-envelope fa-fw"></i> SMTPs <span class="badge badge-primary" span id"smtp"></span></span></a>
</div>
</li>
<li class="nav-item dropdown mr-auto">
<a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-mail-bulk fa-sm pink-color"></i> Leads</a>
<div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);=-'aria-labelledby="navbarDropdown">

<a class="dropdown-item waves-effect waves-light" href="leads-1" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-award"></i> 100% Validated Leads <span class="badge badge-primary"><span class="badge badge-primary" span id"leads-1"></span></span></a>
</div>
</li>

<li class="nav-item dropdown mr-auto">
<a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-tie fa-sm"></i> Accounts</a>
</li>

<li class="nav-item dropdown mr-auto">
<a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-friends fa-sm"></i> Accounts
</a>
<div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
<a class="dropdown-item waves-effect waves-light" href="accounts-1" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-comments-dollar"></i> Marketing <span class="badge badge-primary">105</span></span></a>
<a class="dropdown-item waves-effect waves-light" href="accounts-2" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-server"></i> Hosting / Domain <span class="badge badge-primary">15</span></span></a>
<a class="dropdown-item waves-effect waves-light" href="accounts-3" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-gamepad"></i> Games <span class="badge badge-primary">18</span></span></a>
<a class="dropdown-item waves-effect waves-light" href="accounts-12" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-network-wired"></i> Other <span class="badge badge-primary">3</span></span></a>
</div>
</li>


<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle waves-effect waves-light" role="button" style="color: var(--font-color);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fab fa-drupal text-primary fa-sm"></i> Requests
</a>
<div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
<a class="dropdown-item waves-effect waves-light" href="requests" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-user-plus"></i> Buyers Requests <span class="badge badge-primary"> 71</span></span></a>
</div>
</li>

<li class="nav-item dropdown">
<a class="nav-link waves-effect waves-light" href="offers" style="color: var(--font-color);"><i class="fas fa-user-secret text-primary fa-sm"></i> Bulk Offers</a>
</li>
</ul>

<ul class="navbar-nav profile">

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell text-danger"></i> <span class="badge badge-success">0</span></a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: var(--font-color); background-color: var(--color-nav);">
<a class="dropdown-item waves-effect waves-light" href="#" style="color: var(--font-color);">There is no new notifications</a> </div>
</li>

<li class="nav-item">
<a class="nav-link waves-effect waves-light" href="addBalance" style="color: var(--font-color);" role="button" aria-haspopup="true" aria-expanded="false"><span class="badge badge-danger">
0
<span class="px-2"><i class="fa fa-plus"></i></span></span>
</a>
</li>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Ticket <span class="badge badge-success">0</span></a>

<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: var(--font-color); background-color: var(--color-nav);">
<a class="dropdown-item waves-effect waves-light" href="orders" style="color: var(--font-color);"><span class="px-2">Report Items</span></a>
<a class="dropdown-item waves-effect waves-light" href="tickets" style="color: var(--font-color);"><span class="px-2">My Tickets <span class="badge badge-success">0</span></span></a>
<a class="dropdown-item waves-effect waves-light" href="reports" style="color: var(--font-color);"><span class="px-2">My Reports <span class="badge badge-success">0</span></span></a>
<a class="dropdown-item waves-effect waves-light" href="OpenTicket" style="color: var(--font-color);"><span class="px-2">New Ticket</span></a>
</div>
</li>


<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> hustlersfather <i class="fa fa-user-secret" style="color: var(--font-color);"></i></a>

<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: var(--font-color); background-color: var(--color-nav);">
<a class="dropdown-item waves-effect waves-light" href="setting" style="color: var(--font-color);"><span class="px-2">Setting <i class="fa fa-cog"></i></span></a>
<a class="dropdown-item waves-effect waves-light" href="seller-profile" style="color: var(--font-color);"><span class="px-2">Profile <i class="fa fa-user"></i></span></a>
<a class="dropdown-item waves-effect waves-light" href="orders" style="color: var(--font-color);"><span class="px-2">My Orders <i class="fa fa-shopping-cart"></i></span></a>
<a class="dropdown-item waves-effect waves-light" href="addBalance" style="color: var(--font-color);"><span class="px-2">Add Balance <i class="fa fa-money-bill-alt"></i></span></a>
<a class="dropdown-item waves-effect waves-light" href="logout" style="color: var(--font-color);"><span class="px-2">Logout <i class="fa fa-door-open"></i></span></a>
</div>
</li>

</ul>

</div>
</nav>

<?php
 echo'
<div class="form-group col-lg-7 ">
<div class="well">
  Hello <a class="label label-primary">'.$usrid.'</a><br>
    If you have any <b>Question</b> ,<b>Problem</b>, <b>Suggestion</b> or <b>Request</b> Please feel free to <a class="label label-default " href="tickets.html"><span class="glyphicon glyphicon-pencil"></span> Open a Ticket</a><br>
    if you want to report an order , just go to <abbr title="Account - > My Orders or Click here" >My Orders  <span class="glyphicon glyphicon-shopping-cart"></span></abbr> 
    then click on <a class="label label-primary">Report #[Order Id]</a> button<br><br>
    Our Domains are <b>Alhwa.to</b> || <b>Alhwa.xyz</b> || <b>Alhwa.shop</b> || <b>Alhwa.pw</b> - Please Save them!

</div>

    <div class="list-group" id="div2">
      	<h3><i class="glyphicon glyphicon-info-sign"></i> News</h3>'; 
		 $qq = @mysqli_query($dbcon, "SELECT * FROM news ORDER by id desc LIMIT 5") or die("error here"); 

                
while($r = mysqli_fetch_assoc($qq)){				echo'<a class="list-group-item"><h5 class="list-group-item-heading"><b>'.stripcslashes($r['content']).'</b></h5><h6 class="list-group-item-text">'.$r['date'].'</h6></a>'; 
}
 echo '

				 </div>

</div>
<div class="form-group col-lg-4 ">
	<!-- <img src="files/img/eid.jpg" style="width: 70%; height: 70%" title="Eid Mubarak"> -->
<iframe src="static.html" style="border:none;" width="400" height="270" scrolling="no">Browser not compatible.</iframe>

    ';
	?>
	<div class="well well-sm">    
                  <h4><b>Our Support team is here !</b></h4><a class="btn btn-default btn-sm" onclick="pageDiv(9,'Tickets - OluxShop','tickets.html#open',0); return false;" href="tickets.html#open"><span class="glyphicon glyphicon-pencil"></span> Open a Ticket</a>
                  <h5><b>Interested in becoming a seller at  Olux Shop ?</b></h5><a class="btn btn-primary btn-xs" href="seller.html" onclick="pageDiv(24,'Become Seller  - OluxShop','seller.html',0); return false;">Learn more</a>
                  <h5><b>Available Payment Methods </b></h5>

                  <img src="files/img/pmlogo2.png" height="48" width="49" title="PerfectMoney" onclick="pageDiv(11,'Add Balance - OluxShop','addBalance.html#perfectmoney',0); return false;" href="addBalance.html#perfectmoney" onmouseover="this.style.cursor='pointer'">
                  <img src="files/img/btclogo.png" height="48" width="49" title="Bitcoin" onclick="pageDiv(11,'Add Balance - OluxShop','addBalance.html#bitcoin',0); return false;" href="addBalance.html#bitcoin" onmouseover="this.style.cursor='pointer'">
                 
      </div>
	<?php
	echo '
                 
      </div>
  </div>
'; ?>
