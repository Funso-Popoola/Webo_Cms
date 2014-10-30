var Paginator = function(id,options){
	//this.offset = 5;
	var offset;
	var selector;
	//var selector = 'div';
	var containerID = '.control';
	if(options.length > 0){
		var offset = options[0];
		var selector = options[1];
	}
	var count;
	var id = '#'+id;
	this.currentPage = 1;
	var pointer = 0;
	var numPages;
	//Paginator.showPage(0,1);
	/*this.sPage = function(a,b){
		showPage(0,1);
	}
	this.nPage= function(cPage){
		nextPage(cPage);
	}
	this.pPage = function(cPage){
		prevPage(cPage);
	}*/
	this.init = function(){
		while(count==undefined){
			count = $(id).find(selector);
		}
		showPage(1,1);
		numPages = roundUp(count.length,offset)+1;
	}


	var showPage = function(pointer,currentPage){
		//alert(id+"||"+selector+"||"+count.length+"||"+numPages+"||"+currentPage+"||"+offset+"||"+pointer);
		clss = id.replace(/\#/g,'.');
		$(id).find(selector).css('display','none');
		for(var i=pointer;i<=(currentPage*offset);i++){
			$(id).find(selector+'#'+i+clss).css('display','');
			//alert($(id).find(selector+'#'+i+clss).attr('class')+"||"+id+"||"+i);
			$(id).find(selector+'#'+i+clss).find('*').css('display','');
			$(count[i]).find(selector+'#'+i+clss).children().css('display','');
		}
		showControls(id,containerID,currentPage);
	}

	function roundUp(num,den){
		if(num<den){
			return 0;
		}else{
			return 1+roundUp(num-den,den);
		}
	}

	this.nextPage = function(currentPage){
		console.log(count.length);
		if(currentPage<(numPages)){
			currentPage++;
			pointer+=offset;
			//alert('cPage>>'+currentPage+'\n pointer>>'+pointer);
			showPage(pointer,currentPage);
		}
		
	}
	this.prevPage = function(currentPage){
		if(currentPage>1){
			currentPage--;
			pointer-=offset;
			//alert('cPage>>'+currentPage+'\n pointer>>'+pointer);
			showPage(pointer,currentPage);
		}
	}

	var showControls = function(ID,containerID,currentPage){
		iD = id;
		$(''+iD+containerID).html('');
		iD = ID.replace(/\#/g,'');
		//alert(ID);
		var text = '<ul class="pagination" style="margin-right: 50px;">';
		//alert("ccccc>>"+currentPage)
		text+='<li><a href="#" onclick="'+iD+'.prevPage('+currentPage+'); return false;">Prev</a></li>';
		text+='<li><a href="#">'+currentPage+'</a></li>';
		text+= '<li><a href="#" onclick="'+iD+'.nextPage('+currentPage+'); return false;">Next</a></li>';
		text+='</ul>';
		$('#'+iD+containerID).html(text);
		//alert('#'+id+containerID);
	}
	
}
$(document).ready(function(){
	window.loadCon = function(con, page){
		con = JSON.parse(con);
		if(page == 'news'){
			var in_the_media = "";
			var itm = 0;
			var ann = 0;
			var announcements = "";
			if(con.title.length > 0){
				for(var i=0;i<con.title.length;i++){
					if(con.type[i] == 'In_the_Media'){
						itm++;
						in_the_media+="<a id='"+itm+"' href='#' class='list-group-item in_the_media'>";
						in_the_media+="<h4 class='list-group-item-heading'>"+con.title[i]+"</h4>";
						in_the_media+="<p class='list-group-item-text'>"+con.content[i]+ "</p>";
						in_the_media+="<span style='color:#000'> by "+con.author[i]+" on "+con.date_upload[i]+"</span></a>";
					}else if(con.type[i] == 'Announcement'){
						ann++;
						announcements+="<a id='"+ann+"' href='#' class='list-group-item announcements'>";
						announcements+="<h4 class='list-group-item-heading'>"+con.title[i]+"</h4>";
						announcements+="<p class='list-group-item-text'>"+con.content[i]+ "</p>";
						announcements+="<span style='color:#000'> by "+con.author[i]+" on "+con.date_upload[i]+"</span></a>";
					}

				}
			}
			//alert(in_the_media);
			$(in_the_media).prependTo('.paginator#in_the_media');
			$(announcements).prependTo('.paginator#announcements');
		}else if(page == 'people'){
			var staff = "";
			var alumni = "";
			var stgp = "";

			var stud = 1;
			var st = 1;		
			var alum = 1;
			if(con.name.length > 0){
				for(var i=0;i<con.name.length;i++){
					if(con.category[i] == 'staff'){
						st++;
						staff+= "<div id='"+st+"'class='row staff'>";
			            staff+="<img src='images/images014.jpg' align='left' hspace='10px' height='150px' width='150px' class='img-thumbnail' />";
			            staff+="<p align='justify'><h3><a href='"+con.link[i]+"'>"+con.name[i]+"</a></h3>";
			            staff+="<p align='justify'><a href='"+con.link[i]+"'>"+con.description[i]+"</a>";
			            staff+="</div>";
					}else if(con.category[i] == 'stud_group'){
						stud++;
						stgp+= "<div id='"+stud+"'class='row stud_group'>";
			            stgp+="<img src='images/images014.jpg' align='left' hspace='10px' height='150px' width='150px' class='img-thumbnail' />";
			            stgp+="<p align='justify'><h3><a href='"+con.link[i]+"'>"+con.name[i]+"</a></h3>";
			            stgp+="<p align='justify'><a href='"+con.link[i]+"'>"+con.description[i]+"</a>";
			            stgp+="</div>"; 
					}else if(con.category[i] == 'alumni'){
						alum++;
						alumni+= "<div id='"+alum+"'class='row alumni'>";
			            alumni+="<img src='images/images014.jpg' align='left' hspace='10px' height='150px' width='150px' class='img-thumbnail' />";
			            alumni+="<p align='justify'><h3><a href='"+con.link[i]+"'>"+con.name[i]+"</a></h3>";
			            alumni+="<p align='justify'><a href='"+con.link[i]+"'>"+con.description[i]+"</a>";
			            alumni+="</div>"; 
					}
				}
			}
			//alert(in_the_media);
			$(staff).prependTo('#staff.paginator');
			$(stgp).prependTo('#stud_group.paginator');
			$(alumni).prependTo('#alumni.paginator');
		}else if(page == 'courses'){
			var courses = "";
			if(con.code.length > 0){
				courses = "<table class='table table-striped table-bordered table-condensed'>";
				courses += "<table class='table table-striped table-bordered table-condensed'>";
				courses += "<thead><tr><th>S/N</th><th>Course Code</th><th>Course Title</th><th>Description</th></tr></thead>";
				courses += "<tbody>";
				for(var i=0;i<con.code.length;i++){
					courses+= "<tr class = 'courses' id = '"+(i+1)+"'><td>"+(i+1)+"</td><td>"+con.code[i]+"</td><td>"+con.title[i]+"</td><td>"+con.description[i]+"</td></tr>";
				}
				courses+="</tbody>"; 
        		courses+="</table>"; 
			}
			$(courses).prependTo('#courses.paginator');
		}else if(page == 'research'){
			var papers = "";
			var pp = 0;
			var pnp = 0;
			var lbs = 0;
			var conf = 0;
			var projs = "";
			var labs = "";
			var conff = "";
			if(con.title.length > 0){
				papers = "<table class='table table-striped table-bordered table-condensed'>";
				papers += "<table class='table table-striped table-bordered table-condensed'>";
				papers += "<thead><tr><th>Title</th><th>Description</th><th>Author</th></tr></thead>";
				papers += "<tbody>";

				projs = "<table class='table table-striped table-bordered table-condensed'>";
				projs += "<table class='table table-striped table-bordered table-condensed'>";
				projs += "<thead><tr><th>Title</th><th>Description</th><th>Author</th></tr></thead>";
				projs += "<tbody>";

				conff = "<table class='table table-striped table-bordered table-condensed'>";
				conff += "<table class='table table-striped table-bordered table-condensed'>";
				conff += "<thead><tr><th>Title</th><th>Description</th><th>Author</th></tr></thead>";
				conff += "<tbody>";

				labs = "<table class='table table-striped table-bordered table-condensed'>";
				labs += "<table class='table table-striped table-bordered table-condensed'>";
				labs += "<thead><tr><th>Title</th><th>Description</th><th>Author</th></tr></thead>";
				labs += "<tbody>";


				for(var i=0;i<con.title.length;i++){
					if(con.type[i] == 'Papers'){
						pp++;
						papers+="<tr class = 'papers' id = '"+(pp+1)+"'><td>"+(pp+1)+"</td><a href='"+con.url[i]+"'>"+con.title[i]+"<a/></td><td>"+con.description[i]+"</td><td>"+con.author[i]+"</td></tr>";
					}else if(con.type[i] == 'Proj_and_Pub'){
						pnp++;
						projs+="<tr class = 'proj_and_pub' id = '"+(i+1)+"'><td>"+(i+1)+"</td><a href='"+con.url[i]+"'>"+con.title[i]+"<a/></td><td>"+con.description[i]+"</td><td>"+con.author[i]+"</td></tr>";
					}else if(con.type[i] == 'Labs'){
						lbs++;
						labs+="<tr class = 'labs' id = '"+(i+1)+"'><td>"+(i+1)+"</td><a href='"+con.url[i]+"'>"+con.title[i]+"<a/></td><td>"+con.description[i]+"</td><td>"+con.author[i]+"</td></tr>";
					}else if(con.type[i] == 'Conf'){
						conf++;
						conff+="<tr class = 'conf' id = '"+(i+1)+"'><td>"+(i+1)+"</td><a href='"+con.url[i]+"'>"+con.title[i]+"<a/></td><td>"+con.description[i]+"</td><td>"+con.author[i]+"</td></tr>";
					}					
					
					papers+="</tbody>"; 
	        		papers+="</table>"; 
				
					
					projs+="</tbody>"; 
	        		projs+="</table>"; 
				
					labs+="</tbody>"; 
	        		labs+="</table>"; 
				
					
					
					conff+="</tbody>"; 
	        		conff+="</table>"; 
				}
			}
			//alert(in_the_media);
			$(papers).prependTo('.paginator#papers');
			$(labs).prependTo('.paginator#labs');
			$(conff).prependTo('.paginator#conf');
			$(projs).prependTo('.paginator#proj_and_pubs');
		}
			/*if(con.staff.hasOwnProperty('name')){
				var text="";
				if(con.staff.name.length > 0){
					for(var i=0;i<con.staff.name.length;i++){
						text+= "<div id='"+i+"'class='row'>";
			            text+="<img src='images/images014.jpg' align='left' hspace='10px' height='150px' width='150px' class='img-thumbnail' />";
			            text+="<p align='justify'><h3><a href='"+con.staff.link[i]+"'>"+con.staff.name[i]+"</a></h3>";
			            text+="<p align='justify'><a href='"+con.staff.link[i]+"'>"+con.staff.description[i]+"</a>";
			            text+="</div>"; 
					}
					$(text).prependTo('#staff.paginator');
				}
			}*/

			/*if(con.stud_group.hasOwnProperty('name')){
				var text="";
				if(con.stud_group.name.length > 0){
					for(var i=0;i<con.stud_group.name.length;i++){
						text+= "<div id='"+i+"'class='row'>";
			            text+="<img src='images/images014.jpg' align='left' hspace='10px' height='150px' width='150px' class='img-thumbnail' />";
			            text+="<p align='justify'><h3><a href='"+con.stud_group.link[i]+"'>"+con.stud_group.name[i]+"</a></h3>";
			            text+="<p align='justify'><a href='"+con.stud_group.link[i]+"'>"+con.stud_group.description[i]+"</a>";
			            text+="</div>"; 
					}
					$(text).prependTo('#stud_group.paginator');
				}
			}*/

			/*if(con.alumni.hasOwnProperty('name')){
				var text="";
				if(con.alumni.name.length > 0){
					for(var i=0;i<con.alumni.name.length;i++){
						text+= "<div id='"+i+"'class='row'>";
			            text+="<img src='images/images014.jpg' align='left' hspace='10px' height='150px' width='150px' class='img-thumbnail' />";
			            text+="<p align='justify'><h3><a href='"+con.alumni.link[i]+"'>"+con.alumni.name[i]+"</a></h3>";
			            text+="<p align='justify'><a href='"+con.alumni.link[i]+"'>"+con.alumni.description[i]+"</a>";
			            text+="</div>"; 
					}
					$(text).prependTo('#alumni.paginator');
				}
			}*/
	}
});