

function check() {		

	if ( $('#jobTitle').val() != '' && $('#jobDescription').val() != '' && $('#jobLocation').val() != '' ) {
		$('#btn').attr('disabled',false);
	}
	else {
		$('#btn').attr('disabled',true);
	}
}
	
function test() {	

	let jobs = [];

	fetch('api/recent-jobs', {
		method: 'get',
		headers: {
			'Accept': 'application/json'
			//'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	})
	.then(response=>{
		return response.json();
	})
	.then(data=>{
		
		jobs = data;
		console.log(jobs)
	})

	setTimeout(function(){
  		$('#freshJobs').text(jobs[1].job_title);
  		$('#freshJobs').append('<br />'+jobs[1].job_location);
	}, 1000);

	
}
