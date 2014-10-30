$(document).ready(function () {
	function addNew(id, iD){
		var text;
		$('<div>',{'id':id,class:iD}).appendTo('#'+iD+'.conDiv');
		if(iD == 'news'){
			text = '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php"><div class="form-group">\
                        <label for="news_type">Type:</label>\
                        <select id="news_type" class = "form-control" name="news_type">\
                            <option value="">--select--</option>\
                            <option value="In_the_Media">In The Media:Department In The News</option>\
                            <option value="Announcement">Announcement In The Order Of Urgency</option>\
                            <option value="Calendar">Calendar/Timetable</option>\
                            <option value="Seminars">Public Lectures and Seminars</option>\
                        </select>\
                    </div>\
                    <div class="form-group">\
                        <label for="title">Title:</label>\
                        <input id="title" class = "form-control" type="text" name="title">\
                    </div>\
                    <div class="form-group">\
                        <label for="details">Details:</label>\
                        <textarea id="news_textarea_'+id+'" class = "form-control" name="news_content"></textarea>\
                    </div>\
                    <div class="form-group">\
                        <label for="author">Author:</label>\
                        <input id="news_author" class = "form-control" type="text" name="news_author">\
                    </div>\
                    <div class="form-group">\
                    	<input type="hidden" name="date" value="2014-05-28 00:00:00"/>\
                        <input type="hidden" name="all_forms" value="news"/>\
                    </div></form>';
		}else if(iD == 'research'){
			text = '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
						<div class="form-group">\
                        <label for="news_type">Type:</label>\
                        <select id="research_type" class="form-control" name="research_type">\
                            <option value="">--select type--</option>\
                            <option value="Papers">Papers</option>\
                            <option value="Proj_and_Pu">Projects/Publications</option>\
                            <option value="Labs">Labs</option>\
                            <option value="Conf">Conference</option>\
                        </select>\
                    </div>\
                    <div class="form-group">\
                        <label for="title">Title:</label>\
                        <input id="research_title" class="form-control" type="text" name="research_title">\
                    </div>\
                    <div class="form-group">\
                        <label for="author">Author:</label>\
                        <input id="research_author" class = "form-control" type="text" name="research_author">\
                    </div>\
                    <div class="form-group">\
                        <label for="link">Link:</label>\
                        <input id="research_link"class = "form-control" type="text" name="research_link">\
                    </div>\
                    <div class="form-group">\
                        <label for="description">Description:</label>\
                        <textarea id="research_textarea_'+id+'" class = "form-control" name="research_desc"></textarea>\
                    </div>\
                    <div class="form-group">\
                    	<input type="hidden" name="date" value="2014-05-28 00:00:00"/>\
                        <input type="hidden" name="all_forms" value="research"/>\
                    </div></form>';
		}else if(iD == 'resources'){
			text = '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
					<div class="form-group">\
                        <label for="news_type">Type:</label>\
                        <select id="res_type" class="form-control" name="res_type">\
                            <option value="">--select--</option>\
                            <option value="coursenote">Course Note</option>\
                            <option value="assignment">Assignment</option>\
                        </select>\
                    </div>\
                    <div class="form-group">\
                        <label for="title">Title:</label>\
                        <input id="res_title" class = "form-control" type="text" name="res_title">\
                    </div>\
                    <div class="form-group">\
                        <label for="author">Author:</label>\
                        <input id="res_author" class = "form-control" type="text" name="res_author">\
                    </div>\
                    <div class="form-group">\
                        <label for="course">Course:</label>\
                        <input id="res_cos" class = "form-control" type="text" name="res_cos">\
                    </div>\
                    <div class="form-group">\
                        <label for="url">Upload:</label>\
                        <input id="res_url" class = "form-control" type="file" name="res_url">\
                        <p id="res_help" class="help-block" align="right"></p>\
                    </div>\
                    <div class="form-group">\
                        <label for="description">Description:</label>\
                        <textarea id="resources_textarea_'+id+'" class = "form-control" name="res_desc"></textarea>\
                    </div>\
                    <div class="form-group">\
                    	<input type="hidden" name="date" value="2014-05-28 00:00:00"/>\
                        <input type="hidden" name="all_forms" value="resources"/>\
                    </div></form>';
		}else if(iD == 'courses'){
			text = '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
					<div class="form-group">\
		                <label for="cos_type">Type:</label>\
		                <select id="cos_type" class="form-control" name="cos_type">\
		                    <option value="">--select--</option>\
		                    <option value="underg">Undergraduate</option>\
		                    <option value="postg">Postgraduate</option>\
		                </select>\
		            </div>\
		            <div class="form-group">\
		                <label for="c_code">Course Code:</label>\
		                <input id="cos_code" class = "form-control" type="text" name="cos_code">\
		            </div>\
		            <div class="form-group">\
		                <label for="c_title">Course Title:</label>\
		                <input id="cos_title" class = "form-control" type="text" name="cos_title">\
		            </div>\
		            <div class="form-group">\
		                <label for="description">Description:</label>\
		                <textarea id="courses_textarea_'+id+'" class = "form-control" name="cos_desc"></textarea>\
		            </div>\
		            <div class="form-group">\
                        <input type="hidden" name="all_forms" value="courses"/>\
                    </div></form>';
		}else if(iD == 'prog'){
			text = '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
					<div class="form-group">\
                        <label for="prog_type">Type:</label>\
                        <select id="prog_type" class="form-control" name="prog_type">\
                            <option value="">--select--</option>\
                            <option value="underg">Undergraduate</option>\
                            <option value="postg">Postgraduate</option>\
                        </select>\
                    </div>\
                    <div class="form-group">\
                        <label for="name">Name:</label>\
                        <input id="prog_name" class = "form-control" type="text" name="prog_name">\
                    </div>\
                    <div class="form-group">\
                        <label for="details">Details:</label>\
                        <textarea id="prog_textarea_'+id+'" class = "form-control" name="prog_details"></textarea>\
                    </div>\
                    <div class="form-group">\
                        <input type="hidden" name="all_forms" value="programmes"/>\
                    </div></form>';
		}else if(iD == 'staff'){
			text='<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
			<div class="form-group">\
                <label for="name">Name:</label>\
                <input id="people_name" class = "form-control" type="text" name="staff_name">\
            </div>\
            <div class="form-group">\
                <label for="link">Scholar Link:</label>\
                <input id="people_link"class = "form-control" type="text" name="staff_link">\
            </div>\
            <div class="form-group">\
                <label for="bios">Bio:</label>\
                <textarea id="staff_textarea_'+id+'" class = "form-control" name="staff_details"></textarea>\
            </div>\
            <input type="hidden" name="staff_cat" value="staff"/>\
            <input type="hidden" name="all_forms" value="people"/>\
           </form>';
		}else if(iD=='stud_group'){
			text = '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
					<div class="form-group">\
                        <label for="name">Group Name:</label>\
                        <input id="people_name" class = "form-control" type="text" name="student_name">\
                    </div>\
                    <div class="form-group">\
                        <label for="link">Website:</label>\
                        <input id="people_link" class = "form-control" type="text" name="student_link">\
                    </div>\
                    <div class="form-group">\
                        <label for="description">Description:</label>\
                        <textarea id="stud_group_textarea_'+id+'" class = "form-control" name="student_desc"></textarea>\
                    </div>\
                    <input type="hidden" name="staff_cat" value="stud_group"/>\
            		<input type="hidden" name="all_forms" value="people"/>\
           			</form>';
		}else if(iD = 'alumni'){
			text = '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
					<div class="form-group" >\
                        <label for="name">Name:</label>\
                        <input id="people_name"  class = "form-control" type="text" name="alumni_name">\
                    </div>\
                    <div class="form-group">\
                        <label for="link">Link:</label>\
                        <input id="people_link" class = "form-control" type="text" name="alumni_link">\
                    </div>\
                    <div class="form-group">\
                        <label for="description">Description:</label>\
                        <textarea id="alumni_textarea_'+id+'" class = "form-control" name="alumni_desc"></textarea>\
                    </div>\
                    <input type="hidden" name="staff_cat" value="alumni"/>\
                    <input type="hidden" name="all_forms" value="people"/></form>';
		}
		$(text).appendTo('#'+id+'.'+iD);
		var v = $('#'+id+'.'+iD).find('textarea');
		$(v).addClass('ck'+id)
		CKEDITOR.replace($(v).attr('id'));
		$('<div>',{'id':id,class:'cBlock','text':id}).appendTo('#'+iD+'.holder');
	}

	$('.holder').on('click','div',function(){
		if($(this).attr('class') == 'cBlock'){
			var id = $(this).parent().attr('id');
			//alert($('#'+id+'.conDiv').find('div#'+$(this).attr('id')+'.'+id).attr('id'));
			$('div#'+id+'.conDiv').find('div.'+id).css('display','none');
			$('div#'+id+'.conDiv').find('div#'+$(this).attr('id')+'.'+id).css('display','block');
			$('div#'+id+'.conDiv').find('div#'+$(this).attr('id')+'.'+id).find('div').css('display','block');
			$('#'+id+'.holder>div').removeClass('selected');	
			$(this).addClass('selected');
		}
		
	});

	$('.addNew').click(function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		var count = $('#'+id+'.holder>div').length;
		if(count != 0){
			$('#'+id+'.conDiv').find('div.'+id).css('display','none');
		}
		addNew(count+1,id);
		
	});
	
	$('.sub').click(function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		var v = $('#'+id+'.conDiv').find('form');
		for(var i in CKEDITOR.instances){
				//if(CKEDITOR.instances[i].name = textarea.attr('id')){
					CKEDITOR.instances[i].updateElement();
					/*var section_notes_data = CKEDITOR.instances[i].getData(); 
					$(textarea).val(section_notes_data); */
				//}
		}
		for(var i =0;i<v.length;i++){
			// pre-submit callbacks
			var callback = ''; 		
			$(v[i]).ajaxForm({
				success:function(e){
					callback = e;
				},
				error:function(){
					alert('error')
				}
			}).submit();
			
		}
		//$.post('dbEntry.php',{'count':v.length});
		if(success=='')
			callback = 'success';
		alert(callback);
		$('#'+id+'Collapse').toggleClass('in');

	});

	$('.gen').click(function(e){
		e.preventDefault();
		for(var i in CKEDITOR.instances){
				CKEDITOR.instances[i].updateElement();
		}
		var id = $(this).attr('id');
		$('#'+id+'_form').ajaxForm({
			success:function(e){alert(e)},
			error:function(){alert('error')}
		}).submit();
	});
	function getckeditor(textarea) { 
		for(var i in CKEDITOR.instances){
			if(CKEDITOR.instances[i].name = textarea.attr('id')){
				CKEDITOR.instances[i].updateElement();
				/*var section_notes_data = CKEDITOR.instances[i].getData(); 
				$(textarea).val(section_notes_data); */
			}
		}
		
	} ;

	window.loadCon = function (con){
		con = JSON.parse(con);
		if(con.news.hasOwnProperty('title')){
			if(con.news.title.length > 0){
				id = 'col1';
				for(var i=0;i<con.news.title.length;i++){
					$('#news.conDiv').find('div').css('display','none');
					//alert('i>'+i+' con>'+con.name+' id>'+id);
					addNew(i+1,'news');
					$('#news.conDiv').find('div#'+(i+1)).find('select#news_type').val(con.news.type[i]);
					$('#news.conDiv').find('div#'+(i+1)).find('input#title').val(con.news.title[i]);
					$('#news.conDiv').find('div#'+(i+1)).find('input#news_author').val(con.news.author[i]);
					$('#news.conDiv').find('div#'+(i+1)).find('textarea').val(con.news.content[i]);
				}
				$('#news.holder').find('div#'+(con.length)).addClass('selected');
			}
		}
		
		if(con.people.hasOwnProperty('name')){
			if(con.people.name.length > 0){
				var staff = 1;
				var stud_group = 1;
				var alumni = 1;
				for(var i=0;i<con.people.name.length;i++){
					var iD = con.people.category[i];
					
					if(iD == 'staff'){
						var s = staff++;
						$('#staff.conDiv').find('div').css('display','none');
						addNew(s,'staff');
						$('#staff.conDiv').find('div#'+(s)).find('input#people_name').val(con.people.name[i]);
						$('#staff.conDiv').find('div#'+(s)).find('input#people_link').val(con.people.link[i]);
						$('#staff.conDiv').find('div#'+(s)).find('textarea').val(con.people.description[i]);
					}else if(iD == 'stud_group'){
						var s = stud_group++;
						$('#stud_group.conDiv').find('div').css('display','none');
						addNew(s,'stud_group');
						$('#stud_group.conDiv').find('div#'+(s)).find('input#people_name').val(con.people.name[i]);
						$('#stud_group.conDiv').find('div#'+(s)).find('input#people_link').val(con.people.link[i]);
						$('#stud_group.conDiv').find('div#'+(s)).find('textarea').val(con.people.description[i]);
					}else if(iD == 'alumni'){
						var s = alumni++;
						$('#alumni.conDiv').find('div').css('display','none');
						addNew(s,'alumni');
						$('#alumni.conDiv').find('div#'+(s)).find('input#people_name').val(con.people.name[i]);
						$('#alumni.conDiv').find('div#'+(s)).find('input#people_link').val(con.people.link[i]);
						$('#alumni.conDiv').find('div#'+(s)).find('textarea').val(con.people.description[i]);
					}
					
					
				}
				$('#staff.holder').find('div#'+(con.length)).addClass('selected');
				$('#stud_group.holder').find('div#'+(con.length)).addClass('selected');
				$('#alumni.holder').find('div#'+(con.length)).addClass('selected');
			}
		}

		if(con.research.hasOwnProperty('title')){
			if(con.research.title.length > 0){
				for(var i=0;i<con.research.title.length;i++){
					$('#research.conDiv').find('div').css('display','none');
					//alert('i>'+i+' con>'+con.name+' id>'+id);
					addNew(i+1,'research');
					$('#research.conDiv').find('div#'+(i+1)).find('select#research_type').val(con.research.type[i]);
					$('#research.conDiv').find('div#'+(i+1)).find('input#research_title').val(con.research.title[i]);
					$('#research.conDiv').find('div#'+(i+1)).find('input#research_author').val(con.research.author[i]);
					$('#research.conDiv').find('div#'+(i+1)).find('input#research_link').val(con.research.url[i]);
					$('#research.conDiv').find('div#'+(i+1)).find('textarea').val(con.research.description[i]);
				}
				$('#research.holder').find('div#'+(con.length)).addClass('selected');
			}
		}

		if(con.resources.hasOwnProperty('title')){
			if(con.resources.title.length > 0){
				for(var i=0;i<con.resources.title.length;i++){
					$('#resources.conDiv').find('div').css('display','none');
					//alert('i>'+i+' con>'+con.name+' id>'+id);
					addNew(i+1,'resources');
					$('#resources.conDiv').find('div#'+(i+1)).find('select#res_type').val(con.resources.type[i]);
					$('#resources.conDiv').find('div#'+(i+1)).find('input#res_title').val(con.resources.title[i]);
					$('#resources.conDiv').find('div#'+(i+1)).find('input#res_cos').val(con.resources.code[i]);
					$('#resources.conDiv').find('div#'+(i+1)).find('input#res_author').val(con.resources.author[i]);
					$('#resources.conDiv').find('div#'+(i+1)).find('p#res_help').html('Current File:  '+con.resources.url[i]);
					$('#resources.conDiv').find('div#'+(i+1)).find('textarea').val(con.resources.description[i]);
				}
				$('#resources.holder').find('div#'+(con.length)).addClass('selected');
			}
		}
		
		if(con.programs.hasOwnProperty('name')){
			if(con.programs.name.length > 0){
				for(var i=0;i<con.programs.name.length;i++){
					$('#prog.conDiv').find('div').css('display','none');
					//alert('i>'+i+' con>'+con.name+' id>'+id);
					addNew(i+1,'prog');
					$('#prog.conDiv').find('div#'+(i+1)).find('select#prog_type').val(con.programs.type[i]);
					$('#prog.conDiv').find('div#'+(i+1)).find('input#prog_name').val(con.programs.name[i]);
					$('#prog.conDiv').find('div#'+(i+1)).find('textarea').val(con.programs.description[i]);
				}
				$('#prog.holder').find('div#'+(con.length)).addClass('selected');
			}
		}
		
		if(con.courses.hasOwnProperty('code')){
			if(con.courses.code.length > 0){
				for(var i=0;i<con.courses.code.length;i++){
					$('#courses.conDiv').find('div').css('display','none');
					//alert('i>'+i+' con>'+con.name+' id>'+id);
					addNew(i+1,'courses');
					$('#courses.conDiv').find('div#'+(i+1)).find('select#cos_type').val(con.courses.type[i]);
					$('#courses.conDiv').find('div#'+(i+1)).find('input#cos_code').val(con.courses.code[i]);
					$('#courses.conDiv').find('div#'+(i+1)).find('input#cos_title').val(con.courses.title[i]);
					$('#courses.conDiv').find('div#'+(i+1)).find('textarea').val(con.courses.description[i]);
				}
				$('#courses.holder').find('div#'+(con.length)).addClass('selected');
			}
		}

		$.each(con.vis,function(k,v){
			if(v == 'false'){
				$('input#'+k+'.chk').removeAttr('checked');
			}
			
		});

		$.each(con.sub_vis,function(k,v){
			if(v == 'none'){
				$('input#'+k+'.sub_chk').removeAttr('checked');
			}
			
		});

	}



	$('input.chk').change(function(e){
		var status = $(this).prop('checked');
		$.post('dbEntry.php',{'data':status,'id':$(this).attr('id'),'type':'page','action':'visibility'})
		if($(this).is(':checked')){
			//alert('on');
		}else{
			//alert('off');
		}
		//alert($(this).prop('checked'));
	});

	$('input.sub_chk').change(function(e){
		var status = $(this).prop('checked');
		$.post('dbEntry.php',{'data':status,'id':$(this).attr('id'),'type':'page','action':'visibility'})
		if($(this).is(':checked')){
			$.post('dbEntry.php',{'data':'block','id':$(this).attr('id'),'type':'content','action':'visibility'})
		}else{
			$.post('dbEntry.php',{'data':'none','id':$(this).attr('id'),'type':'content','action':'visibility'})
		}
		//alert($(this).prop('checked'));
	});


	$('button.delete').click(function(e){
		e.preventDefault();
		var id;
		var iD = $(this).attr('id');
		var a = $('#'+iD+'.conDiv').children('div');
		for(var i =0;i< a.length;i++){
			if($(a[i]).css('display')=='block'){
				id = $(a[i]).attr('id');
				break;
			}
		}
		if(iD == 'news'){
			var h = $('#news.conDiv').find('div#'+id).find('input#title').val();
			//alert('>>>>'+h+'\n id>>>'+id);
		}else if(iD == 'staff'){
			var h = $('#staff.conDiv').find('div#'+id).find('input#people_name').val();
		}else if(iD == 'stud_group'){
			var h = $('#stud_group.conDiv').find('div#'+id).find('input#people_name').val();
		}else if(iD == 'alumni'){
			var h = $('#alumni.conDiv').find('div#'+id).find('input#people_name').val();
		}else if(iD == 'research'){
			var h = $('#research.conDiv').find('div#'+id).find('input#research_title').val();
		}else if(iD == 'resources'){
			var h = $('#resources.conDiv').find('div#'+id).find('input#res_title').val();
		}else if(iD == 'courses'){
			var h = $('#courses.conDiv').find('div#'+id).find('input#cos_code').val();
		}else if(iD == 'prog'){
			var h = $('#prog.conDiv').find('div#'+id).find('input#prog_name').val();
		}
		//alert('>>>>'+h);
		$.post('dbEntry.php',{data:h,'action':'delete','caller':iD});
		alert('success');
		$('#'+iD+'.conDiv').find('div#'+id).remove();
		$('#'+iD+'.holder').find('div#'+id).remove();
		var b = $('#'+iD+'.holder').find('div')
		var a = $('#'+iD+'.conDiv').children('div');
		for(var o = 0;o<b.length;o++){
			$(b[o]).attr('id',(o+1));
			$(b[o]).text(o+1);
			$(a[o]).attr('id',(o+1));
		}
		$('#'+iD+'.conDiv').find('div#'+(id-1)).children().css('display','block');
	});

});