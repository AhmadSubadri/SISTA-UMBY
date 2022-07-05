
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
        '<textarea type="text" name="requirement[]" class="form-control" placeholder="Requirement" required=""></textarea>';
    Baris += '</td>';
    Baris += '<td width="200px">';
    Baris +=
        '<input type="text" name="qty[]" class="form-control" placeholder="2 Lembar..." required="">';
    Baris += '</td>';
    Baris += '<td class="text-center" width="50px">';
    Baris +=
        '<a class="btn-sm btn-danger btn-circle" data-toggle="tooltip" id="HapusBaris"><i class="ti-trash" style="color:white;"></i></a>';
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

$(document).ready(function() {
    $('#savedata').submit(function(e) {
        e.preventDefault();
        simpanyes();
    });
});

function simpanyes() {
    $.ajax({
        url: $("#savedata").attr('action'),
        type: 'post',
        cache: false,
        dataType: "json",
        data: $("#savedata").serialize(),
        success: function(data) {
            if (data.success == true) {
                $('.major').val('');
                $('.type').val('');
                $('.requirement').val('');
                $('.qty').val('');
                $('#popsuccess').fadeIn(800, function() {
                    $("#modalrequirement").modal('hide');
                    $(document.location.reload(true));
                    $("#popsuccess").html(data.popsuccess).fadeOut(5000).delay(800);
                });
            } else {
                $('#popsuccess').html('<div class="alert alert-danger">Data failed to save</div>')
            }
        },
        error: function(error) {
            $('#popsuccess').fadeIn(800, function() {
                $("#modalrequirement").modal('hide');
                $(document.location.reload(true));
                $("#popsuccess").html(data.popsuccess).fadeOut(5000).delay(800);
            });
        }
    });
}

function publishCon(idpub) {
    swal("Are you sure publish this requirement ?")
        .then(
            function(isPublish) {
                if (isPublish) {
                    $.ajax({
                        type: "POST",
                        url: '<?= site_url("publish-requirementexam")?>',
                        data: {
                            id: idpub
                        },
                        error: function(data) {
                            alert("Something is wrong");
                        },
                        success: function(data) {
                            swal(`Data publish successfully !`);
                            $(document.location.reload(true));
                        }
                    });
                } else {
                    swal(`Are you sure Cancel progress ?`);
                }
            }
        );
}

function UnpublishCon(idun) {
    swal("Are you sure Unpublish this requirement ?")
        .then(
            function(isUnpublish) {
                if (isUnpublish) {
                    $.ajax({
                        type: "POST",
                        url: '<?= site_url("Unpublish-requirementexam")?>',
                        data: {
                            id: idun
                        },
                        success: function(data) {
                            swal(`Data Upublish successfully !`);
                            $(document.location.reload(true));
                        },
                        error: function(data) {
                            alert("Something is wrong");
                        }
                    });
                } else {
                    swal(`Are you sure Cancel progress ?`);
                }
            }
        );
}