/**
* Name Extension: Slideshow Homepage
* Version: 1.0.0
* Author: The Cmsmart Development Team 
* Date Created: 16/09/2013
* Websites: http://cmsmart.net
* Technical Support: Forum - http://cmsmart.net/support
* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)
* Copyright © 2011-2013 Cmsmart.net. All Rights Reserved.
*/

NetBase(document).ready(function() {	
					
					
					
					NetBase('.accordion').click(function() {
						var acc=NetBase(this);
						if (acc.hasClass("selected")) {
							acc.removeClass("selected");
							acc.parent().find('.accordioncontent').slideUp(200);
						} else {
							acc.addClass("selected");
							acc.parent().find('.accordioncontent').slideDown(200);
						}
					});
					
					NetBase('.transition').each(function() {
						var tr=NetBase(this);
						tr.click(function() {
							NetBase('.transition').each(function() {
								NetBase(this).removeClass('selected');
							});
							tr.addClass('selected');
							
							var curtrans = tr.data('value');
							var curslot = NetBase('.select_slots .dragger').data('value');
							
							
							NetBase('.banner ul:first li').each(function() {								
									var li = NetBase(this);
									if (li.data('oldtransition')==undefined) {
										li.data('oldtransition',li.data('transition'));
										li.data('oldslotamount',li.data('slotamount'));
									}
									if (curtrans!="Demo") {
										li.data('transition',curtrans);
										li.data('slotamount',curslot) 
									} else {
										li.data('transition',li.data('oldtransition'));
										li.data('slotamount',li.data('oldslotamount'));
									}							
							});
						});
					});
					NetBase('.radios').each(function() {
						var radios=NetBase(this);
						radios.find('.radio').each(function() {
							var radio=NetBase(this);
							radio.click(function() {
								var radio=NetBase(this);
								if (!radio.hasClass("nonclickable")) {
										radios.find('.radio').each(function() {	NetBase(this).removeClass('selected'); });
										radio.addClass('selected');
										if (radio.data('value')=="square" || radio.data('value')=="round" || radio.data('value')=="navbar" ) {
											var bul = NetBase('.tp-bullets.simplebullets');
											var arrws = NetBase('.tparrows');
											arrws.removeClass('navbar');
											arrws.removeClass('round');
											arrws.removeClass('square');
											bul.removeClass('navbar');
											bul.removeClass('round');
											bul.removeClass('square');
											
											bul.addClass(radio.data('value'));
											arrws.addClass(radio.data('value'));
											
											if (radio.data('value')=="square" || radio.data('value')=="round") NetBase('.select_bvposition .dragger').css({'left':"60%"});
											if (radio.data('value')=="navbar") NetBase('.select_bvposition .dragger').css({'left':"42%"});
										}
										
										if (radio.data('value')=="thumb" || radio.data('valueextra')=="none") {
											NetBase('.vcentered').click();
											NetBase('.nbullet').addClass("nonclickable");
											
											NetBase('.select_bvposition .dragger').css({'left':"50%"});											
										}
										
										
										
										if (radio.data('value')=="bullet") {
											NetBase('.nbullet').removeClass("nonclickable");
											NetBase('.select_bvposition .dragger').css({'left':"60%"});
										}
										
										if (radio.data('value')=="shadow") {
											NetBase('.tp-bannershadow').removeClass('tp-shadow1');
											NetBase('.tp-bannershadow').removeClass('tp-shadow2');
											NetBase('.tp-bannershadow').removeClass('tp-shadow3');
											NetBase('.tp-bannershadow').addClass(radio.data('valueextra'));
										}
										
										
										if (radio.data('value')=="showtimer") NetBase('.tp-bannertimer').show();
										if (radio.data('value')=="hidetimer") NetBase('.tp-bannertimer').hide();
										
										if (radio.data('value')=="999999999") {
											try{
												var bullets = NetBase('.tp-bullets');
												var ca = NetBase('.tparrows');
												bullets.animate({'opacity':1},{duration:200,queue:false});
												ca.animate({'opacity':1},{duration:200,queue:false});	
											} catch(e) {}
										}
										
										if (radio.data('value')=="200") {
											try{
												var bullets = NetBase('.tp-bullets');
												var ca = NetBase('.tparrows');
												bullets.animate({'opacity':0},{duration:200,queue:false});
												ca.animate({'opacity':0},{duration:200,queue:false});	
											} catch(e) {}
										}
										
										
										
										draggers();										
										NetBase('#unvisible_button').click();
																				
								}										
							});
						});
						
					});
					
					
					
					var draggers=function() {
										NetBase('.select_slots .dragger').each(function() {
												var drag=NetBase('.select_slots .dragger');
												drag.data('value',Math.round((drag.position().left / 410) * 25));
												var curslot = drag.data('value');														
												NetBase('.tbcs').html('Transition Box Columns / Slots ('+curslot+')');
												NetBase('.banner ul:first li').each(function() {								
														var li = NetBase(this);
														if (li.data('oldtransition')==undefined) {
															li.data('oldtransition',li.data('transition'));
															li.data('oldslotamount',li.data('slotamount'));
														}
														
														li.data('slotamount',curslot);
																					
												});
										});
										
										NetBase('.select_slidetime .dragger').each(function() {
												var drag=NetBase('.select_slidetime .dragger');
												drag.data('value',Math.round(((drag.position().left / 410) * 120)+30)/10);							
												NetBase('.select_slidetime .optiontitle').html('Slide Time ('+drag.data('value')+')');							
										});
										
										NetBase('.select_bhposition .dragger').each(function() {
												var drag=NetBase('.select_bhposition .dragger');
												drag.data('value',Math.round((drag.position().left / 410) * 400)-200);							
												NetBase('.select_bhposition .optiontitle').html('Bullet Horizontal Offset ('+drag.data('value')+'px)');							
										});
										
										NetBase('.select_bvposition .dragger').each(function() {
												var drag=NetBase('.select_bvposition .dragger');
												drag.data('value',Math.round((drag.position().left / 410) * 200)-100);							
												NetBase('.select_bvposition .optiontitle').html('Bullet Vertical Offset ('+drag.data('value')+'px)');							
										});
										
										var newtext = '<pre>NetBase("YOURBANNER").revolution(<br>{<br>		delay:'+(NetBase('.select_slidetime .dragger').data('value')*1000)+',<br>		startheight:490,<br>		startwidth:890,<br><br>		thumbWidth:100,<br>		thumbHeight:50,<br>		thumbAmount:5,<br><br>		onHoverStop:"'+NetBase('.select_hovers .selected').data('value')+'",<br>		hideThumbs:200,<br>		navigationType:"'+NetBase('.select_navigationtype .selected').data('value')+'",<br>		navigationStyle:"'+NetBase('.select_bulletstyle .selected').data('value')+'",<br>		navigationArrows:"'+NetBase('.select_navarrows .selected').data('value')+'",<br><br>		touchenabled:"on",<br><br>		navOffsetHorizontal:'+NetBase('.select_bhposition .dragger').data('value')+',<br>		navOffsetVertical:'+NetBase('.select_bvposition .dragger').data('value')+'<br>		shadow:'+NetBase('.select_shadow .selected').data('value2')+'<br>		fullWidth:"off"<br>});</pre>';
										NetBase('.plugoptions').html(newtext);
					}
					
					NetBase('.dragger').draggable(
							{ 
								containment: "parent" ,
								axis: "x",
								stop: function() { 
										NetBase('#unvisible_button').click();
										draggers();
										
										
									}
							});
					
						
			});
