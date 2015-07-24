
jQuery(document).ready(function(){

	
	jQuery(".delete-package").click(function(){

		$panel = jQuery(this).closest(".panel");

		console.log('delete panel', $panel);

		
		return false;
	});

	jQuery(".add-package").click(function(){


		$last = jQuery("#package-panel");

		$size = jQuery("#package-panel").children().size();

		if( jQuery("#package-panel").children().is('h3') ){
			jQuery("#package-panel").children().remove();
			$size = 0
		}

		

		code = '<div class="panel panel-default" id="panel-'+$size+'">';
		code +='	<div class="panel-heading">';
  		code +='		<h4 class="panel-title">';
		code +='			<a data-toggle="collapse" data-parent="#package-panel" href="#package_' + $size +'">';
		code +='				Package #' + ($size+1);
		code +='			</a>';
    	code +='			<button type="button" class="btn btn-primary pull-right  btn-xs delete-package" value="package_'+$size+'" OnClick="delete_panel('+$size+')">Delete Pacakge</button>';
  		code +='		</h4>';
		code +='	</div>';
		code +='	<div id="package_'+$size+'" class="panel-collapse collapse">';
  		code +='		<div class="panel-body">';
  		code +='			<ul>';
  		code +='				<li>';
  		code +='					<div class="input-group">';
  		code +='						<select  id="package_'+ $size+'_preset" class="form-control" onchange="select_box('+$size+')" name="shipping_info[packages]['+$size+'][container][label]">';
  		for (var key in boxes) {
  			code += '						<option  value="'+ key +'">' + boxes[key].label + '</option>';
  		};
  		code +='						</select>';
  		code +='					</div>';
  		code +='				</li>';
  		code +='				<li>';
  		code +='					<div class="input-group">';
	  	code +='						<span class="input-group-addon">Outer Length</span>';
	  	code +='						<input type="text" id="shipping_info[packages]['+$size+'][container][outer_length]" name="shipping_info[packages]['+$size+'][container][outer_length]" placeholder="" value="" class="form-control" />';
		code +='					</div>';
		code +='				</li>';
		code +='				<li>';
  		code +='					<div class="input-group">';
	  	code +='						<span class="input-group-addon">Outer Width</span>';
	  	code +='						<input type="text" id="shipping_info[packages]['+$size+'][container][outer_width]" name="shipping_info[packages]['+$size+'][container][outer_width]" placeholder="" value="" class="form-control" />';
		code +='					</div>';
		code +='				</li>';
		code +='				<li>';
  		code +='					<div class="input-group">';
	  	code +='						<span class="input-group-addon">Outer Height</span>';
	  	code +='						<input type="text" id="shipping_info[packages]['+$size+'][container][outer_height]" name="shipping_info[packages]['+$size+'][container][outer_height]" placeholder="" value="" class="form-control" />';
		code +='					</div>';
		code +='				</li>';
		code +='				<li>';
  		code +='					<div class="input-group">';
	  	code +='						<span class="input-group-addon">Girth</span>';
	  	code +='						<input type="text" id="shipping_info[packages]['+$size+'][container][girth]" name="shipping_info[packages]['+$size+'][container][girth]" placeholder="" value="" class="form-control" />';
		code +='					</div>';
		code +='				</li>';
		code +='				<li>';
  		code +='					<div class="input-group">';
	  	code +='						<span class="input-group-addon">Gross Weight</span>';
	  	code +='						<input type="text" id="shipping_info[packages]['+$size+'][container][gross_weight]" name="shipping_info[packages]['+$size+'][container][gross_weight]" placeholder="" value="" class="form-control" />';
		code +='					</div>';
		code +='				</li>';
		code +='				<li>';
  		code +='					<div class="input-group">';
	  	code +='						<span class="input-group-addon">Box Weight</span>';
	  	code +='						<input type="text" id="shipping_info[packages]['+$size+'][container][box_weight]" name="shipping_info[packages]['+$size+'][container][box_weight]" placeholder="" value="" class="form-control" />';
		code +='					</div>';
		code +='				</li>';
		code +='				<li>';
  		code +='					<div class="input-group">';
	  	code +='						<span class="input-group-addon">Net Weight</span>';
	  	code +='						<input type="text" id="shipping_info[packages]['+$size+'][container][net_weight]" name="shipping_info[packages]['+$size+'][container][net_weight]" placeholder="" value="" class="form-control" />';
		code +='					</div>';
		code +='				</li>';
		code +='				<li>';
  		code +='					<div class="input-group">';
	  	code +='						<span class="input-group-addon">Max Weight</span>';
	  	code +='						<input type="text" id="shipping_info[packages]['+$size+'][container][max_weight]" name="shipping_info[packages]['+$size+'][container][max_weight]" placeholder="" value="" class="form-control" />';
		code +='					</div>';
		code +='				</li>';
		
  		code +='		</div>';
  		code +='	</div>';
  		code +='</div>';

		console.log('size', $size);

		console.log('last', $last );

		$last.append( code );

		return false;
	});
});

function delete_panel( id ){

	var parent = document.getElementById('package-panel');
	var child = document.getElementById( 'panel-' + id );
	parent.removeChild( child);
}


function select_box( id ){

	var i = document.getElementById('package_'+ id +'_preset').selectedIndex;
	var key = document.getElementById('package_'+ id +'_preset').options[ i ].value;

	var box = boxes[ key ];

	document.getElementById('shipping_info[packages]['+ id +'][container][outer_length]').value = box.outer_length ;

	document.getElementById('shipping_info[packages]['+ id +'][container][outer_height]').value = box.outer_height ;

	document.getElementById('shipping_info[packages]['+ id +'][container][outer_width]').value = box.outer_width ;

	// document.getElementById('shipping_info[packages]['+ id +'][container][gross_weight]').value = box.gross_weight ;

	document.getElementById('shipping_info[packages]['+ id +'][container][girth]').value = box.outer_width *2 + box.outer_height*2 ;

	// document.getElementById('shipping_info[packages]['+ id +'][container][net_weight]').value = box.net_weight ;

	document.getElementById('shipping_info[packages]['+ id +'][container][box_weight]').value = box.box_weight ;

	document.getElementById('shipping_info[packages]['+ id +'][container][max_weight]').value = box.max_weight ;
	
}
