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
                        <td>{{ $r->name }}</td>
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


<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

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