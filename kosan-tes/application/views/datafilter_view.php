<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Spesifikasi Kosan baru</title>
<link href="<?php echo base_url()?>assets/css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assets/development-bundle/themes/ui-lightness/jquery.ui.slider.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assets/css/global.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assets/css/dataFilter_view.css" rel="stylesheet" />
<script src="<?php echo base_url()?>assets/development-bundle/jquery-1.5.1.js" ></script>
<script src="<?php echo base_url()?>assets/development-bundle/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url()?>assets/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url()?>assets/development-bundle/ui/jquery.ui.mouse.js"></script>
<script src="<?php echo base_url()?>assets/development-bundle/ui/jquery.ui.slider.js" ></script>
<script src="<?php echo base_url()?>assets/js/dataFilter_view.js" ></script>
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
    <div align="center" id="gallery" >
      <fieldset id="filter-box">
        <?php echo form_open('kosan/showKosanFilter');?>
        <ul>
        <li>Jenis Kosan : 
          <select name= "jenis_kosan">
            <option  value="*">-Pilih Semua-</option>
            <?php foreach($jenis_kosan->result() as $item):?>
            <option value= "<?php echo $item->ID_JENIS; ?>"><?php echo $item->JENIS_NAME; ?> </option>
            <?php endforeach?>
          </select>
        </li>
	    <li>Area Kosan : 
          <select name="area_kosan">
            <option  value="**">-Pilih Semua-</option>
			<?php foreach($area_kosan->result() as $item_area):?>
            <option  value="<?php echo $item_area->ID_AREA; ?>"><?php echo $item_area->AREA_NAME; ?>
            </option>
            <?php endforeach?>
          </select>
        </li>
        </ul>
        <div id="rentang-harga">
                Rentang Harga (Min): <label>Rp </label><input type="text" id="lowPrice" name="lowPrice"/>
   
        s/d Rentang Harga (Max): <label>Rp </label><input type="text" id="highPrice" name="highPrice"  />
		</div>
		<div >
        <p id="slider-range" ></p>
      <input type="submit" id="cari" class="form-button" name="cari" value="CARI"/>
      	</div>
        <?php echo form_close();?>
      </fieldset>
    </div>    
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
</body>
</html>