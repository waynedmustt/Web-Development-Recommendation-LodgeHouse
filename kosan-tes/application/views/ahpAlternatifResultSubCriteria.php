<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alternatif Kosan</title>
<style media="screen" type="text/css">
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
	color: #372412;
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
#filter-box {
	margin-top:5px;
	border:3px solid #000;
	width:800px;
	height:280px;
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
	border-right:1px solid #FFF;
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
	margin:5px 0;
}
.filter1{
	width:800px;
	float:left;
	height:200px;
	clear: right;
	overflow: auto;
	position: relative;
	margin-bottom:5px;
	border-top:1px solid #DDDDDD;
	border-bottom:3px solid #FFF;
}
#jenis-mobil {
	width:300px;
	height:110px;
	border-bottom:1px solid #FFF;
}
#jenis-transmisi {
	width:150px;
	float:left;
}
#jenis-bahan-bakar {
	width:300px;
	height:50px;
}
#jenis-bahan-bakar ul{
	width:280px;
}
#jenis-bahan-bakar li {
	float:left;
	margin-right:30px;
}
#rentang-harga{
	float:left;
	width:260px;
	height:100px;
	padding-right:0;
	border-right:none;
}
[type=text]{border:0; text-align:center; background-color:transparent; color:#ffffff; font-weight:bold;}
#slider-range{margin-top:10px;}
.form-button {
	text-decoration:none;
    background-color: #235485;
	border:2px solid #DDD;
    border-radius: 4px 4px 4px 4px;
	box-shadow:1px 1px 2px 2px #000;    
	color: #FFFFFF;
    font-size: 1em;
    padding: 5px 10px;
	float:right;
	margin:0px 30px 0 0 ; 
	
}
.form-button:hover{
	background-color:#28C8D0;
}
#eq span {
		height:120px; float:left; margin:15px
	}
.filter1 a{color:#372412;text-decoration:none;font-size:16px;font-weight:bold;}
.filter1 a:hover{color:#1A1AFF;}
</style>
<link href="/kosan-tes/assets/css/global.css" rel="stylesheet" />
<script src="/kosan-tes/assets/development-bundle/jquery-1.5.1.js" ></script>
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
        <li><?php echo anchor('kosan/showDataFilterView', 'Spesifikasi Kosan Baru', array('accesskey'=>'2'));?></li>
        <li class="active"><?php echo anchor('ahp', 'Cari Alternatif Kosan', array('accesskey'=>'3'));?></li>
      </ul>
    </div>
    <!-- Header end --> 
  </div>
  <div id="body"> 
    <!-- Body start -->
    <div id="gallery" >
    <div style="width:500px;"><p style="float:left;margin-right:10px;">Kriteria : </p>
    <?php echo form_open('ahp/showKosanAlternatifSubCriteria');?>
          <select id="criteria" class="onclick" name= "criteria_id" style="margin-right:5px;">
            <?php $i=0;foreach($slctdCriterias as $item):?>
            <option value= "<?php echo $i;?>"><?php echo $item;$i++;?> </option>
            <?php endforeach?>
          </select>
        <?php 
		echo form_hidden("slctdCriterias",$slctdCriterias);
		echo form_hidden("slctdKosan",$kosan);
		$maxCriteria=count($slctdCriterias);
		for($i=0;$i<$maxCriteria;$i++){
			$label="subKosanRangking".$i;
			for($j=0;$j<count($subKosanRangking[$i]);$j++){
				echo form_hidden($label."[]",current($subKosanRangking[$i]));
				next($subKosanRangking[$i]);
			}
		}?>
        
          <input type="submit" class="form-button" name="sub" value="Lihat" style="float:none;margin-top:-10px;"/>
		  <?php echo form_close();?>
       </div>
      <div id="filter-box" >
        <div align="center" id="header-filter">
          <p>Hasil Penilaian Kriteria : <?php echo $slctdCriterias[$criteria]?></p>
</div>
        <div class="filter1" >
        <div style="font-size:14px;font-weight:bold;">
        <ul style="list-style:none;margin-left:0;padding:0; ">
		<?php for($i=1;$i<=count($slctdKosan);$i++):?>
			<li style="width:700px; padding:5px 3px;margin:5px auto;">
                <p style="float:left;width:10px;"><?php echo $i.". ";?></p>
                <img src="<?php echo "/kosan-tes/assets/kosan images/".key($KosanRangking).".jpg"?>" height="50" width="100" style="float:left;margin:0 5px 0 10px;"/>
                <p><?php echo anchor('kosan/showKosanSpesification/'.$slctdKosan[key($KosanRangking)][0]['ID_TYPE']."/informasi umum",$slctdKosan[key($KosanRangking)]['name'])?></p>
                <p>Bobot : <?php echo current($KosanRangking);next($KosanRangking)?></p>
              </li>
        <?php endfor;?>
        </ul>
        </div>
        </div>
        <?php echo anchor("ahp/showKosanAlternatifAllCriteria","Kembali",array("class"=>"form-button","style"=>"float:right;"));?>
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