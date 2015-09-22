<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alternatif Kosan</title>
<style media="screen" type="text/css">
html, body {
	margin:0;
	padding:0;
	height:100%;
	background: #372412 url(/kosan-tes/assets/images/img01.gif) repeat-x;
	font-size: 13px;
	color: #FFFFFF;
}
#body {
	padding:10px;
	padding-bottom:60px;	/* Height of the footer */
}
h1, h2, h3 {
	text-transform: capitalize;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-weight: normal;
	color: #FFFFFF;
}
h1 {
	letter-spacing: -2px;
	font-size: 3em;
}
h2 {
	letter-spacing: -1px;
	font-size: 2em;
}
h3 {
	font-size: 1em;
}
a {
	color: #FFEA6F;
}
a:hover {
	text-decoration: none;
}
img {
	border: none;
}
#container {
	min-height:100%;
	position:relative;
}
p {
	margin:0;
}
/* Header */
#header {
	width: 830px;
	height: 230px;
	margin: 0 auto;
	background: url(/kosan-tes/assets/images/img02.jpg) no-repeat;
}
/* Logo */

#logo {
	height: 170px;
	background: url(/kosan-tes/assets/images/logo_3.jpg) no-repeat left 65%;
}
#logo h1 {
	float: left;
	margin-left:27px;
	padding: 45px 40px 0 50px;
	letter-spacing: -2px;
	font-size: 48px;
}
#logo h2 {
	float: right;
	padding: 68px 0 0 0;
	font-size: 24px;
}
#logo a {
	text-decoration: none;
	color:#930;
}
/* Menu */
#menu {
	width: 830px;
	height: 70px;
	background: url(/kosan-tes/assets/images/img03.jpg) no-repeat;
}
#menu ul {
	margin: 0 auto;
	padding: 0;
	list-style: none;
}
#menu li {
	display: inline;
}
#menu a {
	display: block;
	float: left;
	width: 270px;
	height:70px;
	padding-top: 35px;
	text-transform: lowercase;
	text-decoration: none;
	text-align: center;
	letter-spacing: -1px;
	font-size: 24px;
	color: #FFFFFF;
}
#menu a:hover {
	background: url(/kosan-tes/assets/images/img09.jpg) no-repeat;
	color: #FFFFFF;
}
#menu .active a {
	background: url(/kosan-tes/assets/images/img09.jpg) no-repeat;
	color: #372412;
}
#gallery {
	clear: both;
	width: 830px;
	height: 300px;
	margin: 0 auto;
}
#footer {
	clear: both;
	padding: 3px 0;
	background: #FFEA6F;
	border-top: 3px solid #E8AD35;
	text-align: center;
	font-size: smaller;
	color: #E8AD35;
	vertical-align:bottom;
	position:absolute;
	bottom:0;
	width:100%;
	height:40px;			/* Height of the footer */
}
#footer p {
	margin:0;
	padding:10px;
}
</style>
<style type="text/css">
#tahap-ahp {
	
	width:820px;
	font-size:11px;
	color: #FFEA6F;
	font-family: Arial, sans-serif;
	padding:5px;
	vertical-align:middle;
}
#filter-box {
	margin-top:5px;
	border:3px solid #000;
	width:800px;
	height:250px;
	font-family:Arial, Helvetica, sans-serif;
	box-shadow:2px 2px 8px 8px #000;
	border-radius: 14px ;
	background-color:#FFEA6F;color:#372412;
}
#header-filter {
	padding:8px 15px;
	font-size:16px;
	font-weight:bold;
	border-bottom:1px solid #FFF;
	border-radius: 10px 10px 0 0;
	background-color:#630;
}
#header-filter p{color:#FFEA6F;}

.content-filter {
	height:190px;
	font-size:14px;
	padding:15px;
}
.content-filter p {
	font-weight:bold;
	font-size:16px;
}
.content-filter ul {
	list-style:none outside none;
	padding:0;
	float:left;
	margin-top:5px;
}
.content-filter li {
	width:150px;
	float:left;
	margin:5px 0;
}
#jenis-criteria{height:100px;width:300px;margin:10px auto 0 auto;}
.form-button {
    background-color: #235485;
    border-radius: 4px 4px 4px 4px;
    color: #FFFFFF;
    font-size: 1em;
    margin-bottom: 10px;
    padding: 2px 10px;
	float:right; 
	margin:40px 20px 0 0;
}
.form-button:hover{
	background-color:#28C8D0;
}
</style>
<link href="/kosan-tes/assets/css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
<script src="/kosan-tes/assets/development-bundle/jquery-1.5.1.js" ></script>
<script src="/kosan-tes/assets/development-bundle/ui/jquery.ui.core.js"></script>
<script src="/kosan-tes/assets/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="/kosan-tes/assets/development-bundle/ui/jquery.ui.mouse.js"></script>
<script src="/kosan-tes/assets/development-bundle/ui/jquery.ui.slider.js" ></script>
<link href="/kosan-tes/assets/development-bundle/themes/ui-lightness/jquery.ui.slider.css" rel="stylesheet" />
<link href="/kosan-tes/assets/css/global.css" rel="stylesheet" />
</head>
<script>
	$(function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 300000,
			max: 1550000,
			values: [ 300000, 1550000],
			slide: function( event, ui ) {
				$( "#lowPrice" ).val(ui.values[ 0 ]);				               
				$( "#highPrice" ).val(ui.values[ 1 ] );
			}
		});
		$( "#lowPrice" ).val($( "#slider-range" ).slider( "values", 0 ));
		$( "#highPrice" ).val($( "#slider-range" ).slider( "values", 1 ) );
	});
</script>
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
        <li><?php echo anchor('kosan/showDataFilterView', 'Spesifikasi Kosan Baru', array('accesskey'=>'2'));?></li>
        <li class="active"><?php echo anchor('ahp', 'Cari Alternatif Kosan', array('accesskey'=>'3'));?></li>
      </ul>
    </div>
    <!-- Header end --> 
  </div>
  <div id="body"> 
    <!-- Body start -->
    <div id="gallery">
	<div id="tahap-ahp"> Cari Alternatif Kosan :
        <label >Langkah 1</label>
        »
        <label><?php echo anchor("ahp/showResultFilter","Langkah 2")?></label>
        »
        <label class="active" style="color:#FFF"> Langkah 3</label>
      </div>
 <?php echo form_open('ahp/showComparisonPriority');?>
      <div id="filter-box" >
        <div id="header-filter">
          <p>Pilih Kriteria Sesuai Keinginan Anda:</p>
        </div>
        <div id="jenis-criteria" class="content-filter">
        <p>Minimal Kriteria yang dipilih 2 kriteria.</p>
          <ul>
          <?php foreach($criterias->result_array() as $row):?>
			<li>
              <input type="checkbox" class="checkbox" name="cbCriteria[]" id="<?php echo $row['CRITERIA_NAME'];?>" value="<?php echo $row['CRITERIA_NAME'];?>" />
              <?php echo $row['CRITERIA_NAME'];?></li>
          <?php endforeach;?>
            <li>
              <input type="checkbox" id="semua" value="" />
              Semua </li>
          </ul>
        </div>
        <?php foreach($slctdKosan as $row):?>
        <?php echo form_hidden("slctdKosan[]",$row);?>
        <?php endforeach;?>
        <input type="submit" class="form-button" name="lanjut" value="Lanjut" />
      </div>
    </div>
    <?php echo form_close();?>
    <!-- Body end --> 
  </div>
  <div id="footer"> 
    <!-- Footer start -->
	<?php if($isErrorMessage == 1){ ?>
		<p> <?php echo $errorMessage; ?></p>
	<?php	} else { ?>
    <p>&copy;2015 All Rights Reserved. &nbsp;&bull;&nbsp; Designed by KoTA-210</p>
	<?php }?>
    <!-- Footer end --> 
  </div>
</div>
<script type="text/javascript">
$('#semua').click(function() {
if($('#semua').attr('checked')){
	$('[type=checkbox]').attr('checked','checked');
	}else{
	$('[type=checkbox]').removeAttr('checked');
	} 
});
$('[class=checkbox]').click(function() {
		 $('#semua').removeAttr('checked');
}); 
</script>
</body>
</html>