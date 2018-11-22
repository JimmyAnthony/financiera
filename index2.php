<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - Multidestinos Travel</title>
<link type="text/css" rel="Stylesheet" href="css/login2.css" />
<link type="text/css" rel="Stylesheet" href="css/tipsy.css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery_tip.js"></script>
<script type="text/javascript" src="js/fx.js"></script>
<script>
$(function(){
$("#home").tipsy({gravity: 'sw'});
$("#south-east").tipsy({gravity: 'sw'});

startAnimation();
$("#btn_omit").click(function(){
$("#aviso_nav").css("display","none");

});
$(".img_user").fadeIn("slow").animate({top: "130px"});
//$(".img_user").animate({'top' : '130px'}, "slow".fadeIn('normal'));
$("#cont_user").fadeIn("slow").animate({marginRight: "0px"});
show_pass();
});

function show_pass(){
$("#cont_pass").fadeIn("slow").animate({marginTop: "0px"},function(){
$(".btn").fadeIn("slow").animate({marginLeft: "0px"});
});
}
var ani = {
	var_nube1: {
		type:	'left',
		from:	5,
		to:		screen.availWidth,
		step:	1,
		delay:	50
	},
	var_nube2: {
		type:	'left',
		from:	0,
		to:		screen.availWidth,
		step:	1,
		delay:	100,
		onstart: function(){
			this.style.display = 'block';
		}
	},
	var_nube3: {
		type:	'left',
		from:	600,
		to:		screen.availWidth,
		step:	1,
		delay:	100,
		onstart: function(){
			this.style.display = 'block';
		}
	},
	};

	function startAnimation(){
		$fx('#nube1').fxAdd(ani.var_nube1).fxRun(null,-1);
			$fx('#nube2').fxAdd(ani.var_nube2).fxRun(null,-1);
				$fx('#nube3').fxAdd(ani.var_nube3).fxRun(null,-1);
	}
</script>
  <!--[if lt IE 7 ]>
 <script type="text/javascript">
 $(document).ready(function(){
$("#aviso_nav").css("display","block");
 });
 </script>
 <![endif]--> 
</head>

<body>
<div id="nube1"><img src="img/cloud02.png" class="movible" /></div>
<div id="nube2"><img src="img/cloud01.png" class="movible" /></div>
<div id="nube3"><img src="img/cloud03.png" class="movible" /></div>
<div id="aviso_nav"><div id="cont_nav"><samp class="redd">Aviso:</samp> Su version de navegador es demasiado antiguo, se le 
recomienda que actualize o cambie por uno de estos
navegadores mas modernos para un mejor rendimiento del sistema.<div id="icons_brows">
<div class="icon"><a href="http://www.mozilla-europe.org/es/firefox/" target="_blank"><img src="img/firefox.JPG" border="0px" alt="Mozilla Firefox" style="margin-top:3px" /></a></div>
<div class="icon"><a href="http://www.google.com/chrome?hl=es" target="_blank"><img src="img/chrome.jpg" border="0px" alt="Google Chrome" style="margin-top:4px"  /></a></div>
<div class="icon"><a href="http://www.microsoft.com/spain/windows/internet-explorer/" target="_blank"><img src="img/iexplorer.jpg" border="0px" alt="Internet Explorer 8" /></a></div>
<div class="icon"><a href="http://www.apple.com/es/safari/download/" target="_blank"><img src="img/safari.jpg" border="0px" alt="Safari" /></a></div>
<div class="icon"><a href="http://www.opera.com/download/" target="_blank"><img src="img/opera.jpg" alt="Opera" border="0px" style="margin-top:4px" /></a></div>

</div><div id="txt_web"><div class="txt_w"><a href="http://www.mozilla-europe.org/es/firefox/" target="_blank"><span class="bl">Mozilla</span><br /><span class="fox">Firefox</span> </a></div><div class="txt_w"> <a href="http://www.google.com/chrome?hl=es" target="_blank"><span class="blu">G</span><span class="op">o</span><span class="amr">o</span><span class="gr">g</span><span class="blu">l</span><span class="op">e</span> <br /><span class="ocho">Chrome</span></a></div><div class="txt_w"><a href="http://www.microsoft.com/spain/windows/internet-explorer/" target="_blank"><span class="bl">Internet <br />Explorer</span> <span class="ocho">8</span></a></div><div class="txt_w"><a href="http://www.apple.com/es/safari/download/" target="_blank"><span class="bl">Safari</span></a></div><div class="txt_w"><a href="http://www.opera.com/download/" target="_blank"><span class="op">Opera</span></a></div></div>

<div id="btn_omit"></div>
</div></div>
<div id="bar"><div id="home" original-title="Volver a la página"  onclick="window.location.href='http://multidestinostravel.com/'"></div></div>

<div style="width:1500px; height:700px; background:url(img/bg_login2.jpg); margin-left:auto; margin-right:auto;">

<div id="title_img"></div>
<form action="validacion/validar_login.php" method="post">
  <table width="961" height="387" border="0" cellpadding="0" style=" position:absolute; left:5%; z-index:5;">
    <tr>
      <td width="368" height="264">&nbsp;</td>
      <td width="108" rowspan="3">
      	<div style="background:url(img/userTravel.jpg) no-repeat" class="img_user">
        	<div class="glas_cont"></div>
      	</div>
      </td>
      <td width="145">&nbsp;</td>
      <td width="320">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">&nbsp;</td>
      <td valign="bottom">
          <div id="cont_user" style="margin-right:-50px; float:right; display:none;">
          <span class="name_id">Usuario:</span><br />
                <div class="text_area">
                    <input type="text" id="user2" name="user2" class="txt_us" />
                </div>
          </div>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="33"></td>
      <td><div id="cont_pass"><span class="name_id">Contraseña:</span><br />
            <div class="text_area" style="left:530px; top:290px;">
              <input type="password" id="user" name="user" class="txt_us"/>
            </div>
      </div></td>
      <td><input type="submit" class="btn" value=""/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="name_id" style="font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Administrador</span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
<tr></tr>
</table>
</form>
</div>
</body>
</html>
