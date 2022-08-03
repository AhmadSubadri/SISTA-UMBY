$(document).ready(function() {
	for (B = 1; B <= 1; B++) {
		Barisbaru();
	}
	$('#newlist').click(function(e) {
		e.preventDefault();
		Barisbaru();
	});

	$("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
});

function Barisbaru() {
	$(document).ready(function() {
		$("[data-toggle='tooltip']").tooltip();
	});
	var Nomor = $("#tableLoop tbody tr").length + 1;
	var Baris = '<tr>';
	Baris += '<td>';
	Baris +=
	'<textarea type="text" name="judul[]" class="form-control" placeholder="Judul" required=""></textarea>';
	Baris += '</td>';
	Baris += '<td>';
	Baris +=
	'<textarea type="text" name="keterangan[]" class="form-control" placeholder="Keterangan" required=""></textarea>';
	Baris += '</td>';
	Baris += '<td width="200px">';
	Baris +=
	'<input type="date" name="start[]" class="form-control" placeholder="Tanggal mulai">';
	Baris += '</td>';
	Baris += '<td width="200px">';
	Baris +=
	'<input type="date" name="end[]" class="form-control" placeholder="Tanggal berakhir">';
	Baris += '</td>';
	Baris += '<td class="text-center" width="50px">';
	Baris +=
	'<a class="btn-mini btn-danger btn-circle" data-toggle="tooltip" id="HapusBaris"><i class="ti-trash" style="color:white;"></i></a>';
	Baris += '</td>';
	Baris += '</tr>';

	$("#tableLoop tbody").append(Baris);
	$("#tableLoop tbody tr").each(function() {
		$(this).find('td:nth-child(2) input').focus();
	});

}

$(document).on('click', '#HapusBaris', function(e) {
	e.preventDefault();
	var Nomor = 1;
	$(this).parent().parent().remove();
	$('tableLoop tbody tr').each(function() {
		$(this).find('td:nth-child(1)').html(Nomor);
		Nomor++;
	});
});