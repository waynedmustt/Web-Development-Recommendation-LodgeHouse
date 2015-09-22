<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Spesifikasi Kosan Baru</title>
<link href="/kosan-tes/assets/css/global.css" rel="stylesheet" />
<style media="screen" type="text/css">
#body {
	padding:10px 0;
	padding-bottom:60px;	/* Height of the footer */
}
#container {
	min-height:100%;
	position:relative;
}
</style>
<style type="text/css">
#title {
	font-size:x-large;
	font-weight:bolder;
	text-shadow: 0 3px 1px #000;
}
#gallery {
	clear: both;
	width: 830px;
	margin: 0 auto;
}
img {
	background:none repeat scroll 0 0 #DDE3E7;
	border:1px solid #CDD3D6;
	border-radius:4px 4px 4px 4px;
	padding:9px;
	float:left;
	margin-right:10px;
}
#menuSpek {
	width:170px;
	padding:5px;
}
#menuSpek ul {
	margin-left: -30px;
	list-style: none;
}
#menuSpek li {
	display: inline;
}
#menuSpek a {
	background-color:#DDE3E7;
	color: #646769;
	display: block;
	float: left;
	font-weight: bold;
	height: 50px;
	line-height: 28px;
	margin-top: 8px;
	text-align: center;
	width: 120px;
	border-radius:4px 4px 4px 4px;
	font-size: 1.1em;
	text-decoration:none;
	border:3px solid #E8AD35;
	padding:0 10px;
}
#menuSpek a:hover {
	color:#000;
	background-color:#FFF;
	border:3px solid #4199D3;
}
#menuSpek .activeMenu a {
	color:#000;
	background-color:#FFF;
	border:3px solid #4199D3;
}
#spek {
	color:#372412;
	font-size:16px;
	font-weight:bold;
	font-family:Arial, Helvetica, sans-serif;
	margin-left:30px;
	margin-bottom:30px;
	margin-right:50px;
}
#spek legend {
	background-color:#372412;
	color:#FFEA6F;
	text-align:center;
	width:200px;
	padding:0 5px;
}
#spek label {
	width:100px;
	float:right;
}
.spekName {
	width:180px;
	vertical-align:top;
}
table {
	border:1px solid #FFF;padding:5px;
}
.content {
	min-height:500px;
	border:5px solid #372412;
	margin:10px 0;
	border-radius:4px 4px 4px 4px;
	background:#FFEA6F;
	box-shadow:2px 2px 8px 8px #000;
}
#car-name {
	margin:10px 0 0 10px;
	height:180px;
}
</style>
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
        <li ><?php echo anchor('kosan', 'Beranda', array('accesskey'=>'1'));?></li>
        <li class="active"><?php echo anchor('kosan/showDataFilterView', 'Spesifikasi Kosan Baru', array('accesskey'=>'2'));?></li>
        <li><?php echo anchor('ahp', 'Cari Alternatif Kosan', array('accesskey'=>'3'));?></li>
      </ul>
    </div>
    <!-- Header end --> 
  </div>
  <div id="body"> 
    <!-- Body start -->
    <div id="gallery">
      <label id="title">Spesifikasi Kosan</label>
      <div class="content" >
	  <?php foreach($kosan->result() as $item) {?>
        <div id="car-name"> <img src="<?php echo "/kosan-tes/assets/kosan images/".$item->ID_TYPE.".jpg"?>" width="276" height="142"  />
          <h2 style="text-transform:none;font-weight:bold; color:#372412;text-shadow: 0 2px 1px #FFF;"> <?php echo $item->TYPE_NAME;?> </h2>
          <label style="color:#372412; font-size:16px;font-family:Arial, Helvetica, sans-serif;font-weight:bold;"> Jenis Kosan : <?php echo $item->JENIS_NAME; ?><br />
            Harga : Rp <?php echo $item->Harga; ?>,- </label>
        </div>
		<?php }?>
        <div id="menuSpek" style="float:right;margin:-100px 20px 0 0;">
          <ul>
		  <?php foreach($list_criteria_nw->result() as $item_dua){?>
            <li ><?php echo anchor('kosan/showKosanSpesification/'.$this->uri->segment(3)."/".$item_dua->CRITERIA_NAME, $item_dua->CRITERIA_NAME);?></li>
			<?php }?>
          </ul>
        </div>
        <div id="spek">
          <legend ><?php 
		 $jenis_criteria = $this->uri->segment(4); 
		 $jenis_criteria=trim($jenis_criteria);
		 $jenis_criteria=str_ireplace("%20"," ",$jenis_criteria);
		  echo $jenis_criteria;?></legend>
          <table>
            <?php foreach($kosan_specification->result() as $row){?>
            <tr>
              <td class="spekName"><?php echo $row->SPEKNWEIGHT_NAME;?></td>
              <td><?php echo " : ".$row->DESKRIPSI;?></td>
            </tr>
			<?php }?>
          </table>
        </div>
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