@extends('templates_admin/master')
@section('body')
<body>
    

    <h2 class="text-center">DATA ANGGOTA</h2>
    <div class="container">
    <table id="tes2" border=1>
    <button id="myButton" data-toggle="modal" data-target="exampleModal">Tambah</button>
                    
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
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
                        url: "<?= config('webservice.backend') . '/api/view/anggota' ?>",
                        // data: { myData: 'This is my data.' },  // data to submit
                        success: function (data,status,xhr) {   // success callback function
                            console.log(data)
                            for(i in data['anggota']){
                                $("#tes2").append(`
                                   
                                   <tr>
                                    <td>${data['anggota'][i].nama}</td>
                                    <td>${data['anggota'][i].no_identitas}</td>
                                    <td>${data['anggota'][i].status}</td>
                                    <td>${data['anggota'][i].jabatan}</td>
                                    <td>${data['anggota'][i].email}</td>
                                    <td>${data['anggota'][i].alamat}</td>
                                    <td>${data['anggota'][i].no_telepon}</td>
                                    <td><button id="myButton">Edit</button><button id="myButton">Delete</button></td>
                                   </tr>
                                `)
                            }

                        },
                        error: function (jqXhr, textStatus, errorMessage) { // error callback 
                            console.log("error")
                        }
                    });
                });

                
            </script>
            @endsection
           @endsection