var findHiddenChildren = function(parent){
	var size = $(parent).children('div');
	var count = 0;
	//alert(typeof size);
	//alert('div.col>>'+size.length);
	$(size).each(function(a,b){
		if($(b).children('div').hasClass('a')){
			var sub_count = 0;
			var total = $(b).children('div');
			//console.log($(total).children);
			
			$(total).each(function(k,v){
				//alert(k+'\n'+$(v).css('display'));
				if($(v).css('display')=='block'){
					count++;
					return false;
				}
			});
			//count = sub_count;
			//count++;
		}
		
	});
	return count;
}

window.rearrange = function(){
	var divider = 0;
	//console.log($('.row').children);
	$('.row').each(function(k,v){
		//alert('>>>>'+$(v).attr('class'))
		divider+=findHiddenChildren(v);
		//alert(e);
		var child = $(v).children('div');
		$(child).each(function(a,b){
			if($(b).children('div').hasClass('a')){
				var t = $(b).attr('class');
				var y = t.split("-");
				y[2] = 12/divider;
				text = y[0]+'-'+y[1]+'-'+y[2];
				$(child).removeAttr('class').addClass(text);
			}
		});
		
	});

	//alert(divider);
	/*for(var i in total){
		var sub_total = $(i).children('div');
		var sub_count;
		for(var k in sub_total){
			if($(k).css('display')=='none'){
				sub_count++;
			}
		}
	}*/
	//var v = findHiddenChildren(total);
	//alert(divider);
	



	
  }

$(document).ready(function(){

});