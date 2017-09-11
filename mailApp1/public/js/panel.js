$(function () {
	$.ajax({
		url: '/api/sendtabledata',
		dataType:'json',
		success:function(data){
			for (var i = 0; i < data['details'].length; i++) {
				$('tbody').append(function(){
					var x = "<tr><td>"+data['details'][i].email+"</td><td>"+data['details'][i].name+"</td></tr>";
					return x;
				});
			}
		}
	});
	$('#csvForm').submit(function(submitEvent){
		var filename = $('#csvFile').val();
		var ext = filename.replace(/^.*\./, '');
		if(ext==filename){
			ext = '';
		}else{
			ext = ext.toLowerCase();
		}

		switch(ext){
			case 'txt': break;
			default : submitEvent.preventDefault(); alert('upload a file with .txt extension');
		}
	});


	$.ajax({
		url: '/getstatsdata',
		success:function(data){
			var obj = JSON.parse(data);
			var ctx = document.getElementById("myChart");
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ["Number Of Clicks", "Opens", "Bounces", "Unsubscribes", "Complains", "Delivers", 'Drops'],
					datasets: [{
						label: '# of Votes',
						data: [obj[1]['clicks'], obj[1]['opens'], obj[1]['bounces'], obj[1]['unsubscribes'], obj[1]['blocked'], obj[1]['delivered'], obj[1]['spam_drop']],
						backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)',
						'rgba(255, 255, 128, 0.2)'
						],
						borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)',
						'rgba(255, 255, 128, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});
		}
	});	
	function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

});