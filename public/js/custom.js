

	function check() {		

		if ( $('#jobTitle').val() != '' && $('#jobDescription').val() != '' && $('#jobLocation').val() != '' ) {
			$('#btn').attr('disabled',false);
		}
		else {
			$('#btn').attr('disabled',true);
		}
	}
	
