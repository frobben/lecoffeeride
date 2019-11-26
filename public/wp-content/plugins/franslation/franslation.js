(function($) {


	// Edit Button
	$('.edit').click(function(e){

		e.preventDefault();

		$(this).hide();

		var tradNum = getTradNumber($(this).attr('id'));

		$('#trad-'+tradNum).find('textarea').removeAttr('disabled');

	});	

	// Delete button
	$('.del').click(function(e){

		e.preventDefault();

		var tradNum = getTradNumber($(this).attr('id'));

		$('#trad-'+tradNum).remove();

	});

	// Add button
	$('#add').click(function(e){

		e.preventDefault();

		i++;

		var box = '<div id="trad-'+i+'" class="traduction">'
				+ '<div class="key">'
				+ '<label>Key</label>'
				+ '<textarea name="key-'+i+'" class="cle"></textarea>'
				+ '</div>'
				+ '<div class="value">'
				+ '<label>English</label><textarea name="en-'+i+'" class="lang en"></textarea>'
				+ '<label>French</label><textarea name="fr-'+i+'" class="lang fr" ></textarea>'
				+ '<label>Dutch</label><textarea name="nl-'+i+'" class="lang nl" ></textarea>'
				+ '</div>'
				+ '<div class="command">'
				+ '<button id="del-'+i+'" class="del">Delete</button>'
				+ '</div>'
				+ '</div>';


		$(box).insertAfter($(this));

		$('#del-'+i).click(function(){

			$('#trad-'+i).remove();

		});
				
	});

	$('#save').click(function(e){

		e.preventDefault();

		$('textarea').removeAttr('disabled');

		$('#counter').val(i);

		$('#form').submit();

	});

	
})( jQuery );

function getTradNumber(id){

	var res = id.split('-');

	return res [1];
}