<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alternatif Kosan</title>
<link href="/kosan-tes/assets/css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
<link href="/kosan-tes/assets/development-bundle/themes/ui-lightness/jquery.ui.slider.css" rel="stylesheet" />
<link href="/kosan-tes/assets/css/global.css" rel="stylesheet" />
<link href="/kosan-tes/assets/css/dataFilter_view.css" rel="stylesheet" />
<style>
#gallery {min-width:1050px;min-height:1050px;margin-bottom:30px;overflow:auto;}
#gallery ul{float:left; list-style:none outside none; padding:0;}
#level1{
	padding:5px;
	border:1px solid #FFF;
	margin:15px 0;background-color:#FFEA6F;
	color:#372412;
	box-shadow:2px 2px 8px 8px #000;
	border-radius: 14px;font-size:14px;font-weight:bold; 
	text-align:center;
}
#child{
	padding:5px;
	border:1px solid #FFF;
	margin:15px 0;background-color:#F00;
	color:#FFF;
	box-shadow:2px 2px 8px 8px #000;
	border-radius: 14px;font-size:14px;font-weight:bold; 
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
        <li ><?php echo anchor('kosan/showDataFilterView', 'Spesifikasi Mobil Baru', array('accesskey'=>'2'));?></li>
        <li class="active"><?php echo anchor('ahp', 'Cari Alternatif Mobil', array('accesskey'=>'3'));?></li>
      </ul>
    </div>
    <!-- Header end --> 
  </div>
  <div id="body"> 
    <!-- Body start -->
    <div id="gallery" style="overflow:none;">
    <div align="center" style="width:300px;font-size:16px;font-weight:bold; height:40px;margin:0 auto;border:1px solid #FFF;padding-top:20px;	background-color:#FFEA6F;
	color:#372412;box-shadow:2px 2px 8px 8px #000;border-radius: 14px;">
    Alternatif Kosan
    </div>
    <button type="submit" class="form-button" name="kembali" style="position:absolute; margin-top:-30px; margin-left:-90px; " onclick="history.go(-1);">Kembali</button>
	<?php for($i=0;$i<count($slctdCriterias);$i++):?>

    <ul style="float:left;margin-left:70px;margin-top:15px;">
    <li id="level1"><?php echo $slctdCriterias[$i]."<br /> Bobot : ".$prioritasCriterias[$i]?></li>
   
		<ul>
        
		<?php for($j=0;$j<count($kosan);$j++):?>
    	
        <li id="child"><?php echo $slctdKosan[$kosan[$j]]['name']."<br /> Bobot : ".$subKosanRangking[$i][$kosan[$j]];?>
        </li>
        
        <?php endfor;?>
        </ul>

    </ul>
    <?php endfor;?>
    </div>
    <!-- Body end --> 
  </div>

</div>
</body>
</html>