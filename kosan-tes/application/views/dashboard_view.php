<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kosan AHP</title>
<link href="<?php echo base_url()?>assets/css/global.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assets/css/dashboard.css" rel="stylesheet" />
</head>
<body>
<div id="container">
  <div id="header"> 
    <!-- Header start -->
    <div id="logo">
      <h1><a href="#">Kosan AHP</a></h1>
    </div>
    <div id="menu">
      <ul>
        <li class="active"><?php echo anchor('kosan', 'Beranda', array('accesskey'=>'1'));?></li>
        <li><?php echo anchor('kosan/showDataFilterView', 'Spesifikasi Kosan Baru', array('accesskey'=>'2'));?></li>
        <li><?php echo anchor('ahp', 'Cari Alternatif Kosan', array('accesskey'=>'3'));?></li>
      </ul>
    </div>
    <!-- Header end --> 
  </div>
 
  <div id="body"> 
  <!-- Body start -->
    <div id="gallery">
      <div id="top-photo">
      <p><a href="#"><img src="/kosan-tes/assets/kosan images/2.jpg"/></a></p>
      </div>
    </div>
    <!-- Body end --> 
  </div>
  <div id="footer"> 
    <!-- Footer start -->
    <p>&copy;2015 All Rights Reserved. &nbsp;&bull;&nbsp; Designed by KoTA-210</p>
    <!-- Footer end --> 
  </div>
</div>
</body>
</html>