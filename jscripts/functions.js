$(document).ready(function(){if($('.gal').length>0){$('.gal').cycle({fx:'scrollHorz',speed:1200,timeout:10000,next:'.gal_next',prev:'.gal_prev',manualTrump:false,pause:1});jQuery.easing.def='easeInOutCubic';}
if($(".anim li a").length>0){$(".anim li a").hover(function(){if(!$(this).parent().hasClass("act")){$(this).stop().animate({paddingLeft:'15px',width:255+'px'},150);}},function(){if(!$(this).parent().hasClass("act")){$(this).stop().animate({paddingLeft:'0px',width:270+'px'},150);}})}
if($('.lnws').length>0){$('.lnws').cycle({fx:'scrollLeft',speed:1500,timeout:10000,pause:6});}
if($('.lnws1').length>0){$('.lnws1').cycle({fx:'scrollUp',speed:1500,timeout:3000,pause:6});}
if($("#hdb").length>0&&$(".hdclick").length>0){$(".hdclick").click(function(){if($("#hdb").hasClass("open")){$("#hdb").removeClass("open");$("#hdb").addClass("close");$("#hdb").slideUp(200);return false;}else{$("#hdb").removeClass("close");$("#hdb").addClass("open");$("#hdb").slideDown(200);return false;}});}
if($(".home_clmn").length>0){$(".home_clmn li div a").hover(function(){$(this).stop().animate({opacity:0},300);},function(){$(this).stop().animate({opacity:1},300);});}if($('#top').length > 0){$('#top').click(function(){$('html, body').animate({scrollLeft:0},'slow');return false;});}});