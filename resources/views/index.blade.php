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
                        <button type="button" class="btn btn-info float-right">Add Appointment Time</button>
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
                            <i class="fa fa-pencil" aria-hidden="true" title="Edit Availability Time"></i>
                            <i class="fa fa-trash" aria-hidden="true" title="Delete"></i>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



