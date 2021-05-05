<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset = "utf-8">
<link rel="icon" href="/src/logo.png">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.img-overlay-wrap {
  position: relative;
  display: inline-block; 
  transition: transform 150ms ease-in-out;
  width: 100%;
  
}

.img-overlay-wrap img {
   display: block;
   width: 100%;
   height: auto;
   
}

.img-overlay-wrap .svg {
  position: absolute;
  top: 0;
  left: 0;
}
.top-container {
  background-color: #fff;
  padding: 30px;
  text-align: center;
}

.header {
  padding: 10px 16px;
  background: #555;
  color: #fff!important;
  z-index:99999;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}
</style>
<title>BAKTHI</title>
</head>
<body>
<div class="header" id="myHeader">
<a href='/bakthi'><img src="/src/close.png" height="30px" width="30px"></a>
</div>
<?php
if (!$_GET['v'] || $_GET['v']<2){
    echo "<script>window.open('/bakthi','_top');</script>";
}
$f = scandir('links')[$_GET['v']];
$fin = file_get_contents('links/'.$f.'/img.txt');
$fin = explode("\n",$fin);
sort($fin);
$fin = array_unique($fin);
$fin2 = file_get_contents('links/'.$f.'/svg.txt');
$fin2 = explode("\n",$fin2);
sort($fin2);
$fin2 = array_unique($fin2);
$p1 = '<div class="img-overlay-wrap"><img src="';
$p2 = '"><img src="';
$p3 = '" class="svg"></div><br><br>';

foreach(array_combine($fin,$fin2) as $one => $two){
    echo $p1.$one.$p2.$two.$p3;
}
?>
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
</body>
</html>
