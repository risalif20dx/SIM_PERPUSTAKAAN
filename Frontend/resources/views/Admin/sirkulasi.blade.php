@extends('templates_admin/master')
@section('body')
<body>
    

    <h2 class="text-center">DATA SIRKULASI</h2>
    <div class="container">
    <table id="test3" border=1>
    <button id="myButton">Tambah</button>
                    
    </table>
    </div>
    
</body>
</html>

@section('script')
            <script>
                $( document ).ready(function() {
                    $.ajax( 
                    {
                        url: "<?= config('webservice.backend') . '/api/view/sirkulasi' ?>",
                        // data: { myData: 'This is my data.' },  // data to submit
                        success: function (data,status,xhr) {   // success callback function
                            console.log(data)
                            for(i in data['data_sirkulasi']){
                                $("#test3").append(`
                                   
                                   <tr>
                                    <td>${data['data_sirkulasi'][i].no_panggil}</td>
                                    <td>${data['data_sirkulasi'][i].id_anggota}</td>
                                    <td>${data['data_sirkulasi'][i].id_pustakawan}</td>
                                    <td>${data['data_sirkulasi'][i].waktu_pinjam}</td>
                                    <td>${data['data_sirkulasi'][i].waktu_kembali}</td>
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