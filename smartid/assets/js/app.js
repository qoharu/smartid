$(document).ready(function(){
    $.getJSON(base_url+'api/getstasiun', function(data){
    	$('select.stasiun').html("");
	    var html = '';
	    var len = data.length;
	    for (var i = 0; i< len; i++) {
	        html += '<option value="' + data[i].id_stasiun + '">' + data[i].nama_stasiun + '</option>';
	    }
	    $('select.stasiun').append(html);
	});

	$("select.stasiun").change(function (){
		$("#waktuBerangkat").html("");
		$.getJSON(base_url+'api/getwaktu/'+$("#stasiunAsal").val()+'/'+$("#stasiunTujuan").val(), function(data){
		    var html = '';
		    var len = data.length;
		    for (var i = 0; i< len; i++) {
		        html += '<option value="' + data[i].id_waktu + '">' + data[i].waktu + '</option>';
		    }
		    $('#waktuBerangkat').append(html);
		});
		$.getJSON(base_url+'api/getharga/'+$("#stasiunAsal").val()+'/'+$("#stasiunTujuan").val(), function(data){
		    $('#hargaTiket').html(data[0].harga);
		    $('#valHargaTiket').val(data[0].id_harga);
		});
	});

	$("#btnDatauser").click(function(){
		hideAll();
		$('#btnDatauser').addClass("btn-danger");
		$.getJSON(base_url+'api/getdatauser/', function(data){
		    var html = '';
		    var len = data.length;
		    for (var i = 0; i< len; i++) {
		    	html += '<tr>';
		        html += '<td>' + i+1 + '</td>';
		        html += '<td>' + data[i].id_user + '</td>';
		        html += '<td>' + data[i].no_id + '</td>';
		        html += '<td>' + data[i].nama + '</td>';
		        html += '<td>' + data[i].mac_address + '</td>';
		        html += '<td>' + data[i].waktu_login + '</td>';
		        html += '<td>' + data[i].email + '</td>';
		        html += '<td>' + data[i].no_hp + '</td>';
		        html += '<td>' + data[i].alamat + '</td>';
		        html += '<td>' + '<button class="btn btn-danger btn-xs" >Hapus</button> <button class="btn btn-warning btn-xs" >Edit</button>' + '</td>';
		        html += '</tr>';
		    }
		    $('#contentDatauser').append(html);
		    $('#datauser').slideDown();
		});
	});

	$("#btnDatatiket").click(function(){
		hideAll();
		$('#btnDatatiket').addClass("btn-danger");
		$.getJSON(base_url+'api/getdatatiket/', function(data){
		    var html = '';
		    var len = data.length;
		    for (var i = 0; i< len; i++) {
		    	html += '<tr>';
		        html += '<td>' + i+1 + '</td>';
		        html += '<td>' + data[i].id_user + '</td>';
		        html += '<td>' + data[i].no_id + '</td>';
		        html += '<td>' + data[i].nama + '</td>';
		        html += '<td>' + data[i].mac_address + '</td>';
		        html += '<td>' + data[i].waktu_login + '</td>';
		        html += '<td>' + data[i].email + '</td>';
		        html += '<td>' + data[i].no_hp + '</td>';
		        html += '<td>' + data[i].alamat + '</td>';
		        html += '<td>' + '<button class="btn btn-danger btn-xs" >Hapus</button> <button class="btn btn-info btn-xs" >Edit</button>' + '</td>';
		        html += '</tr>';
		    }
		    $('#contentDatauser').append(html);
		    $('#datauser').slideDown();
		});
	});

	$("#btnDaftarhadir").click(function(){
		hideAll();
		$('#btnDatatiket').addClass("btn-danger");
		$.getJSON(base_url+'api/getdatatiket/', function(data){
		    var html = '';
		    var len = data.length;
		    for (var i = 0; i< len; i++) {
		    	html += '<tr>';
		        html += '<td>' + i+1 + '</td>';
		        html += '<td>' + data[i].id_user + '</td>';
		        html += '<td>' + data[i].no_id + '</td>';
		        html += '<td>' + data[i].nama + '</td>';
		        html += '<td>' + data[i].mac_address + '</td>';
		        html += '<td>' + data[i].waktu_login + '</td>';
		        html += '<td>' + data[i].email + '</td>';
		        html += '<td>' + data[i].no_hp + '</td>';
		        html += '<td>' + data[i].alamat + '</td>';
		        html += '<td>' + '<button class="btn btn-danger btn-xs" >Hapus</button> <button class="btn btn-info btn-xs" >Edit</button>' + '</td>';
		        html += '</tr>';
		    }
		    $('#contentDatauser').append(html);
		    $('#datauser').slideDown();
		});
	});

	var hideAll = function(){
		$('#contentDatauser').html("");
		$('#contentDatatiket').html("");
		$('#contentDaftarhadir').html("");

		$('#daftarhadir').hide();
		$('#datatiket').hide();
		$('#datauser').hide();

		$('#btnDaftarhadir').removeClass("btn-danger");
		$('#btnDatatiket').removeClass("btn-danger");
		$('#btnDatauser').removeClass("btn-danger");

	}
});