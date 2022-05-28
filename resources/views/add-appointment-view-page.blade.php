@extends('base')

<div class="container p-4">
    <h2><center>Doctor Appointment Management</center></h2>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h4>Add Appointment Time</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-8 offset-2">
                <label><h6><b>Select Doctor:</b></h6></label>
                <select class="form-control">
                    <option selected disabled>Select Doctor</option>
                    @foreach($result as $r)
                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                    @endforeach
                </select>

                <div class="mt-3">
                <label><h6><b>Select Availability:</b></h6></label>
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" id="monday" name="monday" value="1">
                                <label>Monday</label><br>
                            </td>
                            <td><input type="text" id="timepicker" name="start_time" readonly></td>
                            <td><input type="text" id="timepicker" name="end_time" readonly></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="tuesday" name="tuesday" value="2">
                                <label>Tuesday</label><br>
                            </td>
                            <td><input type="text" id="timepicker" name="start_time" readonly></td>
                            <td><input type="text" id="timepicker" name="end_time" readonly></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="wednesday" name="wednesday" value="3">
                                <label>Wednesday</label><br>
                            </td>
                            <td><input type="text" id="timepicker" name="start_time" readonly></td>
                            <td><input type="text" id="timepicker" name="end_time" readonly></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="thursday" name="thursday" value="4">
                                <label>Thursday</label><br>
                            </td>
                            <td><input type="text" id="timepicker" name="start_time" readonly></td>
                            <td><input type="text" id="timepicker" name="end_time" readonly></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="friday" name="friday" value="5">
                                <label>Friday</label><br>
                            </td>
                            <td><input type="text" id="timepicker" name="start_time" readonly></td>
                            <td><input type="text" id="timepicker" name="end_time" readonly></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="saturday" name="saturday" value="6">
                                <label>Saturday</label><br>
                            </td>
                            <td><input type="text" id="timepicker" name="start_time" readonly></td>
                            <td><input type="text" id="timepicker" name="end_time" readonly></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="sunday" name="sunday" value="7">
                                <label>Sunday</label><br>
                            </td>
                            <td><input type="text" id="timepicker" name="start_time" readonly></td>
                            <td><input type="text" id="timepicker" name="end_time" readonly></td>
                        </tr>
                    </tbody>
                </table>
                </div>

                <button type="button" class="btn btn-success mt-1 mr-2">Save</button>
                <a href="/index">
                    <button type="button" class="btn btn-warning mt-1">Cancel</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // $('#timepicker').click(function (){
        //     alert('hai');
        // });

        $('#timepicker').timepicker({ timeFormat: 'H:mm:ss' });


    });
</script>

