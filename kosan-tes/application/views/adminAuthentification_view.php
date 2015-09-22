<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style media="screen" type="text/css">
html, body {
	margin:0;
	padding:0;
	height:100%;
	background: #372412 url(/kop-202Mobil/assets/images/img01.gif) repeat-x;
	font-size: 13px;
	color: #FFFFFF;
}
#body {
	padding:10px;
	padding-bottom:60px;	/* Height of the footer */
}
h1, h2, h3 {
	text-transform: lowercase;
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
blockquote {
	padding-left: 1em;
}
blockquote p, blockquote ul, blockquote ol {
	line-height: normal;
	font-style: italic;
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
/* Header */
#header {
	width: 830px;
	height: 230px;
	margin: 0 auto;
	background: url(/kop-202Mobil/assets/images/img02.jpg) no-repeat;
}
/* Logo */

#logo {
	height: 170px;
	background: url(/kop-202Mobil/assets/images/logo_3.jpg) no-repeat left 65%;
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
	background: url(/kop-202Mobil/assets/images/img03.jpg) no-repeat;
}
#gallery {
	clear: both;
	width: 830px;
	height: 300px;
	margin: 0 auto;
}
#top-photo h2 {
	height: 1.4em;
	font-size: 1em;
}
#top-photo p {
	margin: 0;
	padding: 0 0 10px 0;
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
.form-legend {
    background: url("/snakes&ladders/image/Originals/ui-bg-gloss/ui-bg_gloss-wave_16_121212_500x100.png") repeat scroll 50% 60% transparent;
    border-radius: 8px 8px 8px 8px;
    color: #FFFFFF;
    font-family: "Kristen ITC";
    font-size: 18px;
    font-weight: bolder;
    margin-bottom: 30px;
    margin-left: 1.04%;
    padding: 15px 10px 10px;
	border:1px solid #FFF;
}
.form-req {
    color: #D10000;
    font-size: 1.4em;
    font-style: normal;
    font-weight: bold;
}
[type="password"], [type="text"] {
    background: none repeat scroll 0 0 #0EABF2;
    border:1px solid #FFF;
    border-radius: 8px 8px 8px 8px;
    box-shadow: 0 0 2px #FFF;
    color: #FFFFFF;
    margin:0 20px 10px 0;
    padding: 5px 5px 5px 10px;
    text-align: justify;
	float:right;
}
p{margin-left:30px;}
input:focus {
    background-color: #FFFFFF;
    box-shadow: 0 0 20px #FF0000;
    color: #0000FF;
}
.form-button {
    background-color: #235485;
    border-radius: 20px 20px 20px 20px;
    color: #FFFFFF;
    font-size: 1em;
    margin-bottom: 10px;
    padding: 2px 10px;
}
.form-button:hover{
	background-color:#28C8D0;
	}
#submit{ margin-right:30px;}
label{ font-size:16px;}
</style>
<link href="/kop-202Mobil/assets/css/global.css" rel="stylesheet" />
</head>

<body>
<div id="container">
  <div id="header"> 
    <!-- Header start -->
    <div id="logo">
      <h1><a href="#">New Car Solution</a></h1>
    </div>
    <div id="menu">
    </div>
    <!-- Header end --> 
  </div>
  <div id="body"> 
    <!-- Body start -->
    <div id="gallery">

        <div style=" width:400px; height:240px; margin:0 auto; border:1px solid #FFF;border-radius: 8px 8px 8px 8px;background-color:#FFEA6F;color:#372412;box-shadow:2px 2px 8px 8px #000;">
		<p class="form-legend" style="margin:0 0 30px 0;">Silahkan Masukkan Akun Anda</p>
        <?php echo form_open("admin/login")?>
        <p>
  		<label class="form-lbl" >ID Pengguna <span class="form-req">*</span>:
  		  <input name="username" size="35%"   type="text" />
	  	</label></p>
        <p>
  		<label class="form-lbl" > Kata  Sandi <span class="form-req">*</span>:   
  		  <input name="password" size="35%"  type="password" />
	  	</label></p>
        <p style="float:right;">
  		<input name="login" class="form-button"  id="submit" type="submit" value="LOGIN" /><?php echo form_close();?>
        </p>
		</div>
      
    </div>
    <!-- Body end --> 
  </div>
  <?php if(validation_errors() != '' ||$this->session->flashdata('messageError') != FALSE):?>
  <div align="justify" id="error-message" class="form-msg-error" >
    <p style="float:left;margin:0 10px;"><img src="/snakes&ladders/image/gambar/form-ic-error.png"/> ERROR!!!</p>
    <p align="center" style="margin-top:5px;"><?php echo validation_errors('<p align="right" style="float:left;width:300px;margin:-10px auto 0 auto;">','</p>');?><?php echo $this->session->flashdata('messageError');?> </p>
  </div>
  <?php else:?>
  <div id="footer"> 
    <!-- Footer start -->
    <p>&copy;2011 All Rights Reserved. &nbsp;&bull;&nbsp; Designed by KoTA-202</p>
    <!-- Footer end --> 
  </div>
  <?php endif?>
</div>
</body>
</html>