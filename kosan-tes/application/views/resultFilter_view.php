<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Spesifikasi Kosan Baru</title>
<link href="/kosan-tes/assets/css/global.css" rel="stylesheet" />
<link href="/kosan-tes/assets/css/resultFilter_view.css" rel="stylesheet" />
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
    <table id="table-header">
  	<tr>
    <th style="width:500px">Nama Kosan</th>
    <th>Harga Kosan</th>
    </tr>          
    </table>
  <?php foreach($result_filter->result() as $item){
  if($item->Harga >= $lowPrice && $item->Harga <= $highPrice){ //filter harga
  ?>
  <div id="table-content">
    <div id="imgCars">
    <img src="<?php echo "/kosan-tes/assets/kosan images/".$item->ID_TYPE.".jpg"?>" width="200" height="100"  />
    <div id="nameCars">
	<?php echo anchor('kosan/showKosanSpesification/'.$item->ID_TYPE."/Informasi Umum",$item->TYPE_NAME);?>
    </div>
    </div>
    <div align="center" id="priceCars">
	<p><?php echo "Rp ".$item->Harga.",-";?></p>
    </div>
  </div>
  <?php }
	else {
		$this->session->unset_userdata("is_active");
		$this->session->set_userdata("is_active",1);
		redirect("kosan/showDataFilterView");
	}
  }?>
  <div id="pagination">
  <?php 
					for($i = 1; $i <= $total_pages; $i++){ ?>
					<?php	
					 if($halaman != $i){  ?>
					  <a href="<?php echo base_url() . "index.php/kosan/showKosanFilter/"?>?page=<?php echo $i?>"><?php echo $i?></a> 
					 <?php }else{  ?>
					  <a href="<?php echo base_url() . "index.php/kosan/showKosanFilter/"?>?page=<?php echo $i?>" class="active"><?php echo $i?></a> 
					 <?php
					 } ?>
					 <?php
					} ?>
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