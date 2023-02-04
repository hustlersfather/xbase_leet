<?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: login.html");
    exit();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
?>
<!DOCTYPEhtml>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="revisit-after" content="2 days">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="/cdn-cgi/apps/head/5OOZijtrf_Bpx-OYIJIWKuxGuQM.js"></script>
	<link rel="shortcut icon" href="../../favicon.ico" />
<title>OdinShop</title>
<link rel="stylesheet" href="files/bootstrap/3/css/bootstrap.min.css">
<script src="files/js/jquery-3.4.1.min.js"></script>
<script src="files/js/clipboard.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="files/js/bootstrap.min.js"></script>
<script src="files/js/bootbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="files/css/flags.css" 
https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css>
<style>
	
<script type="text/javascript">
             function ajaxinfo() {
                $.ajax({
                    type: 'GET',
                    url: 'ajaxinfo.html',
                    timeout: 10000,

                    success: function(data) {
                        if (data != '01') {
                            var data = JSON.parse(data);
                            for (var prop in data) {
                                $("#" + prop).html(data[prop]).show();
                            }
                        } else {
                            window.location = "logout.html";
                        }
                    }
                });

            }
            setInterval(function() {
                ajaxinfo()
            }, 3000);

            ajaxinfo();

$(document).keydown(function(event){
    if(event.which=="17")
        cntrlIsPressed = true;
});

$(document).keyup(function(){
    cntrlIsPressed = false;
});

var cntrlIsPressed = false;


function pageDiv(n,t,u,x){
  if(cntrlIsPressed){
    window.open(u, '_blank');
    return false;
  }
        var obj = { Title: t, Url: u };
        if ( ("/"+obj.Url) != location.pathname) {
        	if (x != 1) {history.pushState(obj, obj.Title, obj.Url);}
        	else{history.replaceState(obj, obj.Title, obj.Url);}

    	}
      document.title = obj.Title;
    $("#mainDiv").html('<div id="mydiv"><img src="files/img/load2.gif" class="ajax-loader"></div>').show();
    $.ajax({
    type:       'GET',
    url:        'divPage'+n+'.html',
    success:    function(data)
    {
        $("#mainDiv").html(data).show();
        newTableObject = document.getElementById('table');
        sorttable.makeSortable(newTableObject);
        $(".sticky-header").floatThead({top:60});
        if(x==0){ajaxinfo();}
      }});
    if (typeof stopCheckBTC === 'function') { 
    var a = stopCheckBTC();
     }

}

$(window).on("popstate", function(e) {
        location.replace(document.location);

});


$(window).on('load', function() {
$('.dropdown').hover(function(){ $('.dropdown-toggle', this).trigger('click'); });
   pageDiv(0,'Main - AlhwaShop','index.html',1);
   var clipboard = new Clipboard('.copyit');
    clipboard.on('success', function(e) {
      setTooltip(e.trigger, 'Copied!');
      hideTooltip(e.trigger);
      e.clearSelection();
   });

});


function setTooltip(btn, message) {
  console.log("hide-1");
  $(btn).tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
     console.log("show");
}

function hideTooltip(btn) {
  setTimeout(function() {$(btn).tooltip('hide'); console.log("hide-2");}, 1000);
}

	</script>

<body style="padding-top: 70px; padding-bottom: 70px;">

      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar white">
      <div class="container">
        <a class="navbar-brand font-weight-bold title" href="../home/main.html">Brand</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="list-unstyled navbar-nav mr-auto">
            <li class="nav-item dropdown ml-4 mb-0">
              <a class="nav-link dropdown-toggle title" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> Homepage </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../home/home-parallax.html">Home Parallax</a>
                <a class="dropdown-item" href="../home/home-slider.html">Home Slider</a>
                <a class="dropdown-item" href="../home/home-video-background.html">Home Video Background</a>
                <a class="dropdown-item" href="../home/home-gradient.html">Home Gradient</a>
                <a class="dropdown-item" href="../home/home-gradient-animation.html">Home Gradient Animation</a>
                <a class="dropdown-item" href="../home/home-video.html">Home Video</a>
                <a class="dropdown-item" href="../home/home-onepage.html">One Page Layout</a>
                <a class="dropdown-item" href="../home/coming-soon.html">Coming Soon</a>
              </div>
            </li>
            <li class="nav-item dropdown ml-4">
              <a class="nav-link dropdown-toggle title" id="navbarDropdownMenuLink12" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Features </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../features/features.html">Features</a>
                <a class="dropdown-item" href="../features/feature-detail.html">Feature Detail</a>
                <a class="dropdown-item" href="../features/services.html">Services</a>
                <a class="dropdown-item" href="../features/typography.html">Typography</a>
              </div>
            </li>
            <li class="nav-item ml-4">
              <a class="nav-link title" href="../pricing/pricing.html" data-offset="90">Pricing</a>
            </li>
            <li class="nav-item dropdown ml-4">
              <a class="nav-link dropdown-toggle title" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Pages </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../pages/about.html">About us</a>
                <a class="dropdown-item" href="../pages/testimonials.html">Testimonials</a>
                <a class="dropdown-item" href="../pages/contact.html">Contact</a>
                <a class="dropdown-item" href="../pages/register.html">Register</a>
                <a class="dropdown-item" href="../pages/login.html">Login</a>
                <a class="dropdown-item" href="../pages/gallery.html">Gallery</a>
                <a class="dropdown-item" href="../pages/faq.html">FAQ</a>
                <a class="dropdown-item" href="../pages/404.html">Error 404</a>
              </div>
            </li>
            <li class="nav-item dropdown ml-4">
              <a class="nav-link dropdown-toggle title" id="navbarDropdownMenuLink3" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Blog </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../blog/blog-standard.html">Blog Standard</a>
                <a class="dropdown-item" href="../blog/blog-3columns.html">Blog 3 Columns</a>
                <a class="dropdown-item" href="../blog/blog-post.html">Blog Post</a>
              </div>
            </li>
          </ul>
      <ul class="nav navbar-nav navbar-right">
                        <?php
$uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$q = mysqli_query($dbcon, "SELECT resseller FROM users WHERE username='$uid'") or die(mysqli_error());
$r         = mysqli_fetch_assoc($q);
$reselerif = $r['resseller'];
if ($reselerif == "1") {
    $uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
    $q = mysqli_query($dbcon, "SELECT soldb FROM resseller WHERE username='$uid'") or die(mysqli_error());
    $r = mysqli_fetch_assoc($q);

    echo '<li><a href="https://Alhwa.to/seller/index.html"><span class="badge" title="Seller Panel"><span class="glyphicon glyphicon-cloud"></span><span id="seller"></span></span></a></li>';
} else {
} ?>      
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tickets <span id="alltickets">
<?php
$sze112  = mysqli_query($dbcon, "SELECT * FROM ticket WHERE uid='$uid' and seen='1'");
$r844941 = mysqli_num_rows($sze112);
if ($r844941 == "1") {
    echo '<span class="label label-danger">1</span>';
}
?>
</span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="tickets.html" onclick="pageDiv(11,'Tickets - AlhwaShop','tickets.html',0); return false;">Tickets <span class="label label-info"><span id="tickets"></span></span><?php
$s1 = mysqli_query($dbcon, "SELECT * FROM ticket WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span></a></li>
            <li><a href="reports.html" onclick="pageDiv(12,'Reports - AlhwaShop','reports.html',0); return false;">Reports <span class="label label-info"><span id="reports"></span></span> <?php
$s1 = mysqli_query($dbcon, "SELECT * FROM reports WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span> </a></li>

           </ul>
        </li>

        <li><a href="addBalance.html" onclick="pageDiv(13,'Add Balance - AlhwaShop','addBalance.html',0); return false;"><span class="badge"><b><span id="balance"></span></b> <span class="glyphicon glyphicon-plus"></span><span> </a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account  <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="setting.html" onclick="pageDiv(14,'Setting - AlhwaShop','setting.html',0); return false;">Setting <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li><a href="orders.html" onclick="pageDiv(15,'Orders - AlhwaShop','orders.html',0); return false;">My Orders <span class="glyphicon glyphicon-shopping-cart pull-right"></span></a></li>
            <li><a href="addBalance.html" onclick="pageDiv(13,'Add Balance - AlhwaShop','addBalance.html',0); return false;">Add Balance <span class="glyphicon glyphicon-usd pull-right"></span></a></li>
            
            <li class="divider"></li>
            <li><a href="logout.html" >Logout <span class="glyphicon glyphicon-off pull-right"></span></a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<div id="mainDiv">


</div>
</body>
</html>

