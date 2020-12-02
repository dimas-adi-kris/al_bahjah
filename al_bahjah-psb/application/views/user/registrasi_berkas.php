<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"> Upload Berkas </h1>
                    </div>

                    <form id="berkas">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="foto"> Pas Foto </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="foto">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ktp"> KTP </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="ktp" id="ktp">
                                    <label class="custom-file-label" for="ktp">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kk"> Kartu Keluarga </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="kk" id="kk">
                                    <label class="custom-file-label" for="kk">Choose file</label>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="akte_kelahiran"> Akte Kelahiran </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="akte_kelahiran" id="akte_kelahiran">
                                    <label class="custom-file-label" for="akte_kelahiran">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="raport"> Raport </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="raport" id="raport">
                                    <label class="custom-file-label" for="raport">Choose file</label>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ijazah"> Ijazah </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="ijazah" id="ijazah">
                                    <label class="custom-file-label" for="ijazah">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="bukti_pembayaran"> Bukti Pembarayaran </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="bukti_pembayaran" id="bukti_pembayaran">
                                    <label class="custom-file-label" for="bukti_pembayaran">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <!-- <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Saya menyetujui bahwa data yang saya isi adalah sebenar-benarnya, Jika ada kepalsuan data maka saya akan bertanggung jawab dan menerima resiko dalam bentuk apapun.
                                </label>
                            </div>
                            <hr>
                        </div> -->
                        <button type="submit" class="btn btn-success float-right" id="simpan_berkas"> Simpan </button>
                    </form>

                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
$(document).ready(function () {

    // placeholder
    $("#foto").on("change", function () {
        var file = $(this).val().split("\\").pop();
        $(this).next($(".custom-file-label")).html(file);
    });

    $("#ktp").on("change", function () {
        var file = $(this).val().split("\\").pop();
        $(this).next($(".custom-file-label")).html(file);
    });

    $("#kk").on("change", function () {
        var file = $(this).val().split("\\").pop();
        $(this).next($(".custom-file-label")).html(file);
    });

    $("#akte_kelahiran").on("change", function () {
        var file = $(this).val().split("\\").pop();
        $(this).next($(".custom-file-label")).html(file);
    });

    $("#raport").on("change", function () {
        var file = $(this).val().split("\\").pop();
        $(this).next($(".custom-file-label")).html(file);
    });

    $("#ijazah").on("change", function () {
        var file = $(this).val().split("\\").pop();
        $(this).next($(".custom-file-label")).html(file);
    });

    $("#bukti_pembayaran").on("change", function () {
        var file = $(this).val().split("\\").pop();
        $(this).next($(".custom-file-label")).html(file);
    });



    $("#simpan_berkas").click(function(event) {
    event.preventDefault();
    var form_data = new FormData($('#berkas')[0]);

    jQuery.ajax({
        type: "POST",
        url: "<?=base_url(); ?>auth/do_upload",
        data: form_data,
        processData: false,
        contentType: false,
        success: function(res) {
            alert("Upload Berkas Berhasil");
        }
    }); 
});

    
    // $("#simpan_berkas").submit(function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         url:'<?=base_url()?>auth/uploadBerkas',
    //         type: "post",
    //         data: new FormData(this),
    //         processData:false,
    //         contentType:false,
    //         cache:false,
    //         async:false,
    //         success: function(data){
    //             alert("Upload Berkas Berhasil");
    //         }

    //     });
    // });
    
});
</script>