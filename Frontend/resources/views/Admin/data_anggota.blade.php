@extends('templates_admin/master')
@section('body')
<body>
    

    <h2 class="text-center">DATA BUKU</h2>
    <div class="container">
    <table id="tes2" border=1>
                    
    </table>
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