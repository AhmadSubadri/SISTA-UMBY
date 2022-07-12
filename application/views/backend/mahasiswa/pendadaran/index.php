<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h6>Unggah dokumen syarat pendadaran</h6>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 col-xl-8 sub-title">
                    #Jenis dokumen
                </div>
                <div class="col-sm-12 col-xl-2 sub-title text-center">
                    Status
                </div>
                <div class="col-sm-12 col-xl-2 sub-title text-center">
                    Aksi
                </div>
                <!-- Data -->
                <?php if(count($Data) != 0):?>
                <?php $i=1; foreach($DataSyarat as $syarat):?>
                <div class="col-sm-12 col-xl-8">
                    <b><?= $i++;?>. <?= $syarat->requirements;?><i class="text-danger">(wajib)</i></b>
                </div>
                <div class="col-sm-12 col-xl-2 text-center">
                    <label class="label label-mini label-danger">Belum upload</label>
                    <label class="label label-mini label-danger"><i class="ti-alert"></i></label>
                </div>
                <div class="col-sm-12 col-xl-2">
                    <form id="form" action="http://example.com">
                        <a href="" class="btn btn-mini btn-outline-success"><i class="ti-eye"></i> Lihat</a>
                        <input id="uploadFilea" name="file" class="form-bg-null" placeholder="name file..." hidden />
                        <div class="fileUpload btn btn-mini btn-outline-primary">
                            <span><i class="ti-upload"></i>Upload</span>
                            <input id="uploadBtna" type="file" name="file" class="upload" />
                        </div>
                    </form>
                </div>
                <div class="sub-title col-sm-12 col-xl-12"></div>
                <?php endforeach;?>
                <?php else:?>
                <div class="sub-title col-sm-12 col-xl-12 text-center">Data not availabel</div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="custom-file">
    <input type="file" name="file" class="custom-file-input" id="file" disabled>
    <label class="custom-file-label" for="file" disabled>Choose file...</label>
    <div class="invalid-feedback">Example invalid custom file feedback</div>
</div>
<progress class="progress-bar bg-c-red" id="progressBar" value="0" max="100"
    style="width:100%; display: none;"></progress>
<h3 id="status"></h3>
<p id="loaded_n_total"></p>
<style>
.fileUpload {
    position: relative;
    overflow: hidden;
    /* margin: 10px; */
}

.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
document.getElementById("uploadBtna").onchange = function() {
    // document.getElementById("uploadFilea").value = this.value;
    // document.getElementById("form").submit();
    ambilId("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    var percent = (event.loaded / event.total) * 100;
    ambilId("progressBar").value = Math.round(percent);
    ambilId("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
    $(document.location.reload(true));
};

function progressHandler(event) {
    ambilId("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    var percent = (event.loaded / event.total) * 100;
    ambilId("progressBar").value = Math.round(percent);
    ambilId("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
    $(document.location.reload(true));
}

function completeHandler(event) {
    ambilId("status").innerHTML = event.target.responseText;
    ambilId("progressBar").value = 0;
}

function errorHandler(event) {
    ambilId("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
    ambilId("status").innerHTML = "Upload Aborted";
}
</script>

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function ambilId(file) {
    return document.getElementById(file);
}

$(document).ready(function() {
    $("#upload").click(function() {
        ambilId("progressBar").style.display = "block";
        var file = ambilId("file").files[0];

        if (file != "") {
            var formdata = new FormData();
            formdata.append("file", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "<?= site_url('upload-requirement-exam')?>");
            ajax.send(formdata);
        }
    });
});

function progressHandler(event) {
    ambilId("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    var percent = (event.loaded / event.total) * 100;
    ambilId("progressBar").value = Math.round(percent);
    ambilId("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
    $(document.location.reload(true));
}

function completeHandler(event) {
    ambilId("status").innerHTML = event.target.responseText;
    ambilId("progressBar").value = 0;
}

function errorHandler(event) {
    ambilId("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
    ambilId("status").innerHTML = "Upload Aborted";
}

function DeleteId(id) {
    var dataId = $("#namefilenya").attr("data-id");
    swal("Are you sure delete this data ?")
        .then(
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: '<?= site_url('upload-requirement-exam-delete')?>',
                        data: {
                            id: id,
                            name: dataId
                        },
                        error: function() {
                            alert("Something is wrong");
                        },
                        success: function(data) {
                            swal(`Data deleted successfully !`);
                            $(document.location.reload(true));
                        }
                    });
                } else {
                    swal(`Are you sure Cancel progress ?`);
                }
            }
        );
}
</script> -->