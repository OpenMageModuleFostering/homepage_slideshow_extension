var chk = jQuery.noConflict();
chk(".slideshow-revolution").ready(function(){
	var i=1;
	chk("#btn1").click(function(){
		i++;
		chk(".slideshow-revolution .content").append('<div class=" post_revolution post_revolution'+ i +'">'+
		'<button style="float: right" id="addimage'+ i +'"  type="button" title="Add Image" ><span><span><span>Add Image</span></span></span></button><button style="float: right; margin-right: 10px" id="addtext"  type="button" title="Add Text" ><span><span><span>Add text</span></span></span></button></br>'+
		'<input id="image" class="input-file" type="file" title="Image" value="" name="image"/>'+
		'<label>Transition</label> <select class=" select" name="transition" id="transition">'+
		'<option selected="selected" value="boxslide">Boxslide</option>'+
		'<option value="boxfade">Boxfade</option>'+
		'<option value="slotzoom-horizontal">Slotzoom Horizontal</option>'+
		'<option value="slotslide-horizontal">Slotslide Horizontal</option>'+
		'<option value="slotfade-horizontal">Slotfade Horizontal</option>'+
		'<option value="slotzoom-vertical">Slotzoom Vertical</option>'+
		'<option value="slotslide-vertical">Slotslide Vertical</option>'+
		'<option value="slotfade-vertical">Slotfade Vertical</option>'+
		'<option value="curtain-1">Curtain 1</option>'+
		'<option value="curtain-2">Curtain 2</option>'+
		'<option value="curtain-3">Curtain 3</option>'+
		'<option value="slideleft">Slide Left</option>'+
		'<option value="slideright">Slide Right</option>'+
		'<option value="slideup">Slide up</option>'+
		'<option value="slidedown">Slide Down</option>'+
		'<option value="fade">Fade</option></select>'+
		'<label style="margin-left: 10px; margin-right: 5px">Data slotamount</label><input id="data-slotamouny" type="text" title="Data slotamouny " value="" name="data-slotamouny" size="3" />'+
		'<label style="margin-left: 10px; margin-right: 5px">Data Delay</label><input id="data-delay" type="text" title="Data delay" value="" name="data-delay" size="3" />'+
		'<div class="content_revolution'+ i +'" style="margin-top: 10px;"></div></div>'	
		);
			
			
			for ( var j = 0; j <= i; j++) {
				chk('#addimage'+ j +'').click(function(){
						chk('.post_revolution'+ j +' .content_revolution'+ j +'').append(
							'<div class="caption"><input id="image" class="input-file" type="file" title="Image" value="" name="image"/>'+
							'<label style="margin-right: 5px">Data x</label><input id="data-x" type="text" title="Data-x" value="" name="data-x" size="3" />'+
							'<label style="margin-right: 5px; margin-left: 5px">Data y</label><input id="data-y" type="text" title="Data-y" value="" name="data-y" size="3" />'+
							'<label style="margin-right: 5px; margin-left: 5px">Data speed</label><input id="data-speed" type="text" title="Data Speed" value="" name="data-speed" size="3" />'+
							'<label style="margin-right: 5px; margin-left: 5px">Data start</label><input id="data-start" type="text" title="Data-start" value="" name="data-start" size="3" />'+
							'<label style="margin-right: 5px; margin-left: 5px">Data easing</label> <select class=" select" name="data-easing" id="data-easing">'+
								'<option selected="selected" value="easeInOutSine">easeInOutSine</option>'+
								'<option value="easeInOutQuad">easeInOutQuad</option>'+
								'<option value="easeInOutCubic">easeInOutCubic</option>'+
								'<option value="slotslide-horizontal">Slotslide Horizontal</option>'+
								'<option value="easeInOutQuart">easeInOutQuart</option>'+
								'<option value="easeInOutQuint">easeInOutQuint</option>'+
								'<option value="easeInOutExpo">easeInOutExpo</option>'+
								'<option value="easeInOutCirc">easeInOutCirc</option>'+
								'<option value="easeInOutElastic">easeInOutElastic</option>'+
								'<option value="easeInOutBack">easeInOutBack</option>'+
								'<option value="easeInOutBounce">easeInOutBounce</option>'+
								'<option value="easeOutSine">easeOutSine</option>'+
								'<option value="easeOutQuad">easeOutQuad</option>'+
								'<option value="easeOutCubic">easeOutCubic</option>'+
								'<option value="easeOutQuart">easeOutQuart</option>'+
								'<option value="easeOutQuint">easeOutQuint</option>'+
								'<option value="easeOutExpo">easeOutExpo</option>'+
								'<option value="easeOutCirc">easeOutCirc</option>'+
								'<option value="easeOutElastic">easeOutElastic</option>'+
								'<option value="easeOutBack">easeOutBack</option>'+
								'<option value="easeOutBounce">easeOutBounce</option>'+
								'<option value="easeInSine">easeInSine</option>'+
								'<option value="easeInQuad">easeInQuad</option>'+
								'<option value="easeInCubic">easeInCubic</option>'+
								'<option value="easeInQuart">easeInQuart</option>'+
								'<option value="easeInQuint">easeInQuint</option>'+
								'<option value="easeInExpo">easeInExpo</option>'+
								'<option value="easeInCirc">easeInCirc</option>'+
								'<option value="easeInElastic">easeInElastic</option>'+
								'<option value="easeInBack">easeInBack</option>'+
								'<option value="easeInBounce">easeInBounce</option></select>'+
							'</div>'
						);
					});
			}
	});
	
});