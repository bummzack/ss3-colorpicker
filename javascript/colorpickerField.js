(function($) {
	$.entwine('ss', function($) {
		$('input.colorfield').entwine({
			onmatch: function() {
				$(this).minicolors({ control: 'wheel', theme: 'bootstrap' });
				this._super();
			},
			onunmatch: function() {
				$(this).minicolors('destroy');
				this._super();
			}
		});
	});
		
	if(typeof $.entwine == "undefined"){
		$('input.colorfield').minicolors({ control: 'wheel', theme: 'bootstrap' });
	}
}(jQuery));