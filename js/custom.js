$.expander.defaults.slicePoint = 1000;
$(document).ready(function () {
	 //$('div.expandable p').expander();
	 $('div.expandable k').expander({
	    slicePoint:       1700,  // default is 100
	    expandPrefix:     ' ', // default is '... '
	    expandText:       'Read More', // default is 'read more'
	    collapseTimer:    0, // re-collapses after 5 seconds; default is 0, so no re-collapsing
	    userCollapseText: 'Read Less'  // default is 'read less'
	  });
});
