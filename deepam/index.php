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
  z-index:999999;
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
<title>deepam</title>
</head>
<body>
<div class="header" id="myHeader">
  <a href='/'><img src="/src/close.png" height="30px" width="30px"></a>
</div>
<?php
$f = scandir('links');
$p0 = '<a href="/deepam/get.php?v=';
$p1 = '<img src="';
$p2 = '">';
$c = 2;
foreach($f as $folder){
  if ($folder[0] == '.'){continue;}
  $fin = file_get_contents('links/'.$folder.'/img.txt');
  $fin = explode("\n",$fin);
  sort($fin);
  $fin = array_unique($fin);
  $p1 = '<div class="img-overlay-wrap"><img src="';
  $p2 = '">';
  echo "<a href='/deepam/get.php?v=".$c."'>".$p1.$fin[1].$p2."</a>";
  $c++;
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
