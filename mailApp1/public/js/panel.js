$(function () {
	$.ajax({
		url: 'http://localhost:8000/api/sendtabledata',
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
		url: 'https://api.sendgrid.com/api/stats.get.json?api_user=teched&api_key=123abc12&days=1',
		dataType:'json',
		success:function(data){
			var ctx = document.getElementById("myChart");
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ["Number Of Clicks", "Opens", "Bounces", "Unsubscribes", "Complains", "Delivers", 'Drops'],
					datasets: [{
						label: '# of Votes',
						data: [data[1]['clicks'], data[1]['opens'], data[1]['bounces'], data[1]['unsubscribes'], data[1]['blocked'], data[1]['delivered'], data[1]['spam_drop']],
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

});