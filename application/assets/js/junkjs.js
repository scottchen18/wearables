//create js array of video contents
var video_p = new Array();
 	video_p[0] = '<iframe id="video_p" width="200" height="113" src="//www.youtube.com/embed/OwLvM5QRzls" frameborder="0" allowfullscreen></iframe>';
	video_p[1] = '<iframe id="video_p" width="560" height="315" src="//www.youtube.com/embed/988rYhS0WdU" frameborder="0" allowfullscreen></iframe>'
	video_p[4] = '<iframe id="video_p" src="//player.vimeo.com/video/58047636" width="500" height="281" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

var video_c = new Array();
	video_c[0] = '<p class="p1">Microsoft<br><strong>Windows 8 - Work your Game</strong></p><p class="p3">The Windows 8 Work Your Game program challenged six influential Canadians to improve their golf game for a chance to win $8,000 for the charity of their choice. <br>This was an awesome program, we produced a total of 12 videos turned around in under a two week time-frame.<br><br><strong>Agency:</strong> High Road<br><strong>Producer:</strong> PJ Lee<br><strong>Director:</strong> Evan Bellam<br><strong>DP:</strong> Tony Edgar <br><strong>2nd Unit Cam:</strong> Dan Wallace<br><strong>Sound:</strong> Alex Gheorghe<br><strong>Original Score by:</strong> Terence Lam<br><strong>Editors:</strong> Dan Wallace/Evan Bellam/Mark Delottinville<br><strong>GFX:</strong> PJ Lee<br></p>';
	video_c[1] = '<p class="p1">American Express<br><strong>The Power of Influence</strong></p';
	
function display_video(index){

		$('#video_row_1').fadeOut('fast',function(){
			$('#video_row_1').show();
			$('#video_row_1 .c_video').html(video_c[index]);
			$('#video_row_1 .p_video').html(video_p[index]);
			$('#video_p').attr('width',$('.p_video').width());
			$('#video_p').attr('height',($('.p_video').width() * (0.565)));

			if($('.c_video').height() > $('#video_p').attr('height')){
				$('.p_video').css('padding-top',(($('.i_video').height() - $('#video_p').attr('height')) / (-2.5)));
			}
			$('#video_row_1').hide();
			$('#video_row_1').fadeIn('fast',function(){});
		});	
 }