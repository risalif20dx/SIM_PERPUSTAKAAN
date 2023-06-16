@extends('templates_admin/master')
@section('body')
<body>
    

    <h2 class="text-center">DATA BUKU</h2>
    <div class="container">
    <button id="myButton">Tambah</button>
    <table id="tes" border=1>
                    
    </table>
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