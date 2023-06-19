@extends('templates_admin/master')
@section('body')
<body>
    

    <h2 class="text-center">DATA BUKU</h2>
    <div class="container">
    <button id="myButton" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
    <table id="tes" border=1>
                    
    </table>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="no_panggil" id="no_panggil" placeholder="no panggil" class="form-control">
                <br/>
                <input type="text" name="judul_buku" id="judul_buku" placeholder="Judul Buku" class="form-control">
                <br/>
                <input type="text" name="pengarang" id="pengarang" placeholder="Pengarang" class="form-control">
                <br/>
                <input type="text" name="penerbit" id="penerbit" placeholder="Penerbit" class="form-control">
                <br/>
                <input type="text" name="deskripsi_fisik" id="deskripsi_fisik" placeholder="Deskripsi Fisik" class="form-control">
                <br/>
                <input type="text" name="bahasa" id="bahasa" placeholder="Bahasa" class="form-control">
                <br/>
                <input type="text" name="isbn_issn" id="isbn_issn" placeholder="ISBN" class="form-control">
                <br/>
                <input type="text" name="edisi" id="edisi" placeholder="Edisi" class="form-control">
                <br/>
                <input type="text" name="deskripsi_buku" id="deskripsi_buku" placeholder="Deskripsi Buku" class="form-control">
                <br/>
                <input type="text" name="sampul" id="sampul" placeholder="Sampul" class="form-control">
                <br/>
                <input type="text" name="tahun_terbit" id="tahun_terbit" placeholder="Tahun Terbit" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="btnSave()">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editdatabuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="no_panggil_edit" id="no_panggil_edit" placeholder="no panggil" class="form-control">
                <br/>
                <input type="text" name="judul_buku_edit" id="judul_buku_edit" placeholder="Judul Buku" class="form-control">
                <br/>
                <input type="text" name="pengarang_edit" id="pengarang_edit" placeholder="Pengarang" class="form-control">
                <br/>
                <input type="text" name="penerbit_edit" id="penerbit_edit" placeholder="Penerbit" class="form-control">
                <br/>
                <input type="text" name="deskripsi_fisik_edit" id="deskripsi_fisik_edit" placeholder="Deskripsi Fisik" class="form-control">
                <br/>
                <input type="text" name="bahasa_edit" id="bahasa_edit" placeholder="Bahasa" class="form-control">
                <br/>
                <input type="text" name="isbn_issn_edit" id="isbn_issn_edit" placeholder="ISBN" class="form-control">
                <br/>
                <input type="text" name="edisi_edit" id="edisi_edit" placeholder="Edisi" class="form-control">
                <br/>
                <input type="text" name="deskripsi_buku_edit" id="deskripsi_buku_edit" placeholder="Deskripsi Buku" class="form-control">
                <br/>
                <input type="text" name="sampul_edit" id="sampul_edit" placeholder="Sampul" class="form-control">
                <br/>
                <input type="text" name="tahun_terbit_edit" id="tahun_terbit_edit" placeholder="Tahun Terbit" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="btnUpdate()" data-no_panggil="">Save changes</button>
            </div>
            </div>
        </div>
    </div>

</body>
</html>

@section('script')
            <script>
                
                $( document ).ready(function() {
                    $.ajax( 
                    {
                        url: "<?= config('webservice.backend') . '/api/view' ?>",
                        // data: { myData: 'This is my data.' },  // data to submit
                        success: function (data,status,xhr) {   // success callback function
                            console.log(data)
                            for(i in data['buku']){
                                $("#tes").append(`
                                   
                                   <tr>
                                    <td>${data['buku'][i].bahasa}</td>
                                    <td>${data['buku'][i].des_buku}</td>
                                    <td><button name="editButton" data-no_panggil="${data['buku'][i].no_panggil}">Edit</button>
                                    <button data-no_panggil="${data['buku'][i].no_panggil}">Delete</button></td>
                                   
                                   </tr>
                                `)
                            }

                        },
                        error: function (jqXhr, textStatus, errorMessage) { // error callback 
                            console.log("error")
                        }
                    });

                    $(document).on('click', 'button[name="editButton"]', function(){
                        let no_panggil = $(this).data('no_panggil')

                        $.ajax( 
                            {
                                url: `<?= config('webservice.backend') . '/api/detail/' ?>${no_panggil}`,
                                // data: { no_panggil },  // data to submit
                                success: function (data,status,xhr) {   // success callback function
                                    console.log(data)
                                    $("#no_panggil_edit").val(data['buku'][0].no_panggil)
                                    $("#judul_buku_edit").val(data['buku'][0].judul)
                                    $("#pengarang_edit").val(data['buku'][0].pengarang)
                                    $("#penerbit_edit").val(data['buku'][0].penerbit)
                                    $("#deskripsi_fisik_edit").val(data['buku'][0].deskripsi_fisik)
                                    $("#bahasa_edit").val(data['buku'][0].bahasa)
                                    $("#isbn_issn_edit").val(data['buku'][0].isbn_issn)
                                    $("#edisi_edit").val(data['buku'][0].edisi)
                                    $("#deskripsi_buku_edit").val(data['buku'][0].deskripsi_buku)
                                    $("#sampul_edit").val(data['buku'][0].sampul)
                                    $("#tahun_terbit_edit").val(data['buku'][0].tahun_terbit)
                                    $('#editdatabuku').modal('show');
                                },
                                error: function (jqXhr, textStatus, errorMessage) { // error callback 
                                    console.log("error")
                                }
                            });
                    })

                });
                function btnSave(){
                        $.ajax( 
                        {
                            url: "<?= config('webservice.backend') . '/api/insert' ?>",
                            method: "POST",
                            data: { 
                                no_panggil: $("#no_panggil").val(),
                                judul_buku: $("#judul_buku").val(),
                                pengarang: $("#pengarang").val(),
                                penerbit: $("#penerbit").val(),
                                deskripsi_fisik: $("#deskripsi_fisik").val(),
                                bahasa: $("#bahasa").val(),
                                isbn_issn: $("#isbn_issn").val(),
                                edisi: $("#edisi").val(),
                                deskripsi_buku: $("#deskripsi_buku").val(),
                                sampul: $("#sampul").val(),
                                tahun_terbit: $("#tahun_terbit").val(),
                            },  // data to submit
                            success: function (data,status,xhr) {   // success callback function
                                console.log(data)
                                $("#editdatabuku").modal('close');

                            },
                            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                                console.log("error")
                            }
                        });
                    }

                    function btnUpdate(){
                        $.ajax( 
                        {
                            url: "<?= config('webservice.backend') . '/api/update' ?>",
                            method: "POST",
                            data: { 
                                no_panggil: $("#no_panggil_edit").val(),
                                judul_buku: $("#judul_buku_edit").val(),
                                pengarang: $("#pengarang_edit").val(),
                                penerbit: $("#penerbit_edit").val(),
                                deskripsi_fisik: $("#deskripsi_fisik_edit").val(),
                                bahasa: $("#bahasa_edit").val(),
                                isbn_issn: $("#isbn_issn_edit").val(),
                                edisi: $("#edisi_edit").val(),
                                deskripsi_buku: $("#deskripsi_buku_edit").val(),
                                sampul: $("#sampul_edit").val(),
                              
                            },  // data to submit
                            success: function (data,status,xhr) {   // success callback function
                                console.log(data)

                            },
                            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                                console.log("error")
                            }
                        });
                    }
                
            </script>
            @endsection
           @endsection