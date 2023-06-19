@extends('templates_admin/master')
@section('body')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">LIBRARY</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2" onclick=window.location.href="{{route('databuku')}}">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-ls font-weight-bold text-success text-uppercase mb-1">
                                                DATA BUKU</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-book fa-3x" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2"  onclick=window.location.href="{{route('data_anggota')}}">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-ls font-weight-bold text-info text-uppercase mb-1">DATA ANGGOTA
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-3x" aria-hidden="true"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2" onclick=window.location.href="{{route('sirkulasi')}}">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-ls font-weight-bold text-warning text-uppercase mb-1">
                                                SIRKULASI</div>
                                            
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-recycle fa-3x" aria-hidden="true"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                <table id="tes" border=1>
                    
                </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            @section('script')
            <!-- <script>
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
                                   </tr>
                                `)
                            }

                        },
                        error: function (jqXhr, textStatus, errorMessage) { // error callback 
                            console.log("error")
                        }
                    });
                });

                
            </script> -->
            @endsection
           @endsection