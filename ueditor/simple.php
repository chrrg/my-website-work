<style>
	#editor2 {
		resize:vertical;
		overflow:auto;
		border:1px solid silver;
		border-radius:5px;
		min-height:100px;
		box-shadow: inset 0 0 10px silver;
		padding:1em;
	}
</style>
<link href="/ueditor/font-awesome.css" rel="stylesheet">
<div style="wiidth:100%;">
	<div class="container-fluid ">
		<div id='pad-wrapper'>
			<div id="editparent">
				<div id='editControls' class='span12' style=''>
					<div class='btn-group'>
						<a class='btn' data-role='undo' href='javascript://void();' style='width:20px;'><i class='icon-undo'></i></a>
						<a class='btn' data-role='redo' href='javascript://void();' style='width:20px;'><i class='icon-repeat'></i></a>
					</div>
					<div class='btn-group'>
						<a class='btn' data-role='bold' href='javascript://void();' style='width:40px;'><b>粗</b></a>
						<a class='btn' data-role='italic' href='javascript://void();' style='width:40px;'><em>斜</em></a>
						<a class='btn' data-role='underline' href='javascript://void();' style='width:60px;'><u><b>下划</b></u></a>
						<a class='btn' data-role='strikeThrough' href='javascript://void();' style='width:40px;'><strike>划</strike></a>
					</div>
					<div class='btn-group'>
						<a class='btn' data-role='justifyLeft' href='javascript://void();'><i class='icon-align-left'></i></a>
						<a class='btn' data-role='justifyCenter' href='javascript://void();'><i class='icon-align-center'></i></a>
						<a class='btn' data-role='justifyRight' href='javascript://void();'><i class='icon-align-right'></i></a>
						<a class='btn' data-role='justifyFull' href='javascript://void();'><i class='icon-align-justify'></i></a>
					</div>
					<div class='btn-group'>
						<a class='btn' data-role='indent' href='javascript://void();'><i class='icon-indent-right'></i></a>
						<a class='btn' data-role='outdent' href='javascript://void();'><i class='icon-indent-left'></i></a>
					</div>
					<div class='btn-group'>
						<a class='btn' data-role='insertUnorderedList' href='javascript://void();'><i class='icon-list-ul'></i></a>
						<a class='btn' data-role='insertOrderedList' href='javascript://void();'><i class='icon-list-ol'></i></a>
					</div>
					<div class='btn-group'>
						<a class='btn' data-role='h1' href='javascript://void();' style='width:20px;'>h<sup>1</sup></a>
						<a class='btn' data-role='h2' href='javascript://void();' style='width:20px;'>h<sup>2</sup></a>
						<a class='btn' data-role='p' href='javascript://void();' style='width:20px;'>p</a>
					</div>
					<div class='btn-group'>
						<a class='btn' data-role='subscript' href='javascript://void();' style='width:20px;'><i class='icon-subscript'></i></a>
						<a class='btn' data-role='superscript' href='javascript://void();' style='width:20px;'><i class='icon-superscript'></i></a>
					</div>
				</div>
				<div id='editor2' class='span12' name="commenttext" style='' contenteditable>

				</div>
			</div>
		</div>
	</div>
</div>
<script>

	$(function() {
		$('#editControls a').click(function(e) {
			switch($(this).data('role')) {
				case 'h1':
				case 'h2':
				case 'p':
					document.execCommand('formatBlock', false, '<' + $(this).data('role') + '>');
					break;
				default:
					document.execCommand($(this).data('role'), false, null);
					break;
			}

		})
	});
</script>
<input style="display:none;" name="text" value="" id="commenttext" />