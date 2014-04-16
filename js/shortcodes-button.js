jQuery(document).ready(function(){
	jQuery("#sc_select").change(function() {
		send_to_editor(jQuery("#sc_select :selected").val());
		return false;
    });
});