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
});