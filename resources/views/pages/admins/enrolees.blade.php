@section('mytitle', '| Students list')

@extends('layouts.app')

@section('content')

<div class="wrapper">
	
    @include('component.sidebar')
    @include('component.info_msg')
    <div class="dashboard-content">
        <div class="text">  
            <div class="container-fluid">
                <div class="row p-3">
                    <h1 class="fw-light" id="dashusers"><i class="fad fa-users"></i> Students list</h1>
                    <div class="col-md-12 offset-md-0 mb-5 p-5 card-table">
                        <div class="form-inline">
                            <div class="form-group mb-2">
                                <label for="selectTriggerFilter">Filter role:</label>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <div class="" id="selectTriggerFilter"></div>
                            </div>
                        </div>
                        <table id="example" class="table table-striped table-hover table-bordered display nowrap" cellspacing="0" width="100%";>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Level</th>
                                    <th>Tracks</th>
                                    <th>Strand</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($users as $user) --}}
                                <tr class="data-row">
                                    {{-- <input type="hidden" name="" id="fname" class="fname" value="{{$user->firstName}}">
                                    <input type="hidden" name="" class="lname" value="{{$user->lastName}}">
                                    <input type="hidden" name="" class="mname" value="{{$user->middleName}}"> --}}
                                    <td>1</td>
                                    <td>Nunez, John Ed Paul</span></td>
                                    <td>Grade 7</td>
                                    <td>Academics</td>
                                    <td>STEM</td>
                                    <td>12-10-21</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-primary tooltip-actbtn" href=""><i class="far fa-eye"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">View</p>
                                            </div>
                                        </a>
                                        
                                        <div class="btn btn-outline-success tooltip-actbtn" id="edit-user" data-user-id=""><i class="fas fa-pencil-alt"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">Approve</p>
                                            </div>
                                        </div>

                                        <div class="btn btn-outline-danger tooltip-actbtn"  id="delete-user" data-user-id=""><i class="fal fa-user-times"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">Decline</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Level</th>
                                    <th>Tracks</th>
                                    <th>Strand</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let btn = document.querySelector("#btn-menu");
        let sidebar = document.querySelector(".sidebar");
        let searchBtn = document.querySelector(".bx-search");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        searchBtn.onclick = function(){
            sidebar.classList.toggle("active");
        }

        jQuery(document).ready(function($) {
        $('#example').DataTable({
            responsive: true,
            initComplete: function () {
            this.api().columns(5).every( function () {
                var column = this;
                var select = $('<select class="form-control form-select"><option value="" selected>All</option></select>')
                    .appendTo( '#selectTriggerFilter' )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
            
        });
        
        $(document).on('click', '#example tbody tr button', function() {       
            $("#modaldata tbody tr").html("");
            $("#modaldata tbody tr").html($(this).closest("tr").html());
            $("#exampleModal").modal("show");
        });
        } );   
             
    </script>

</div>
@endsection