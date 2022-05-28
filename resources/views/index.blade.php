@extends('base')

@if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
@endif

<div class="container p-4">
    <h2><center>Doctor Appointment Management</center></h2>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h4>Doctors List</h4>
                </div>
                <div class="col-md-4">
                    <a href="/add-appointment-view">
                        <button type="button" class="btn btn-primary float-right">Add Appointment Time</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($result as $r)
                    <tr>
                        <td data-toggle="modal" data-target="#addConference"><a href="#" onclick="theFunction({{$r->id}});"><u>{{ $r->name }}</u></a></td>
                        <td>{{ $r->address }}</td>
                        <td>
                            <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="Edit Availability Time" name="edit" value="{{ $r->id }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>

                            <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="Delete" name="delete" value="{{ $r->id }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addConference" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appointment Time Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                    </tr>
                    </thead>
                    <tbody id="doctor_details">
                        <!-- Appending from JQuery -->
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script type="text/javascript">

    //************************************************
    //Get Doctor Availability Details
    //************************************************
    function theFunction(doctor_id){

        $.ajax({
            url: "/get-doctor-availability/" + doctor_id,
            type: 'GET',
            success: function(result){
                $('#doctor_details').html('');
                $.each(result.data, function( key, value ) 
                {
                    var data = '<tr><td>'+value.id+'</td></tr>';
                    $('#doctor_details').append(data);
                });                  
            }
        });
    }

    $(document).ready(function() {
        //************************************************
        //Delete Doctor Record
        //************************************************
        $('[name=delete]').click(function (){
            var value = $(this).val();
            
            swal("Are you sure you want to delete?", {
              dangerMode: true,
              buttons: true,
            }).then((Delete) => 
            {
                if (Delete)
                {
                    $.ajax({
                          url: "/delete-doctor/" + value,
                          type: 'GET',
                          success: function(){
                              swal({
                                title: "Deleted successfully!",
                              }).then(function(){ 
                                  location.reload();
                                 }
                              );
                          }
                    });
                }    
            }).catch(swal.noop);
        });
    });
</script>