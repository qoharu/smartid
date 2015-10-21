$(document).ready(function(){
	setInterval(function() {
		$.getJSON(base_url+'api/getUserTerdaftar/', function(data){
		    var html = '';
		    var len = data.length;
		    for (var i = 0; i< len; i++) {
		    	html += '<tr>';
		        html += '<td>' + i+1 + '</td>';
		        html += '<td>' + data[i].id_user + '</td>';
		        html += '<td>' + data[i].no_id + '</td>';
		        html += '<td>' + data[i].nama + '</td>';
		        html += '<td>' + data[i].waktu_login + '</td>';
		        html += '<td>' + data[i].email + '</td>';
		        html += '</tr>';
		    }
		    $('#contentTerdaftar').html("");
		    $('#contentTerdaftar').append(html);
		});
    }, 2000);
})