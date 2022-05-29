@extends('base')

@if (\Session::has('message'))
    <div class="alert alert-danger">
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
                    <h4>Add Appointment Time</h4>
                </div>
            </div>
        </div>

        <form action="/create-appointment" method="POST" onsubmit="return validateForm()" name="myForm">
            @csrf
            <div class="card-body">
                <div class="col-8 offset-2">
                    <label><h6><b>Select Doctor:</b></h6></label>
                    <select class="form-control" name="doctor_id">
                        <option selected disabled>Select Doctor</option>
                        @foreach($result as $r)
                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                        @endforeach
                    </select>
                    <!-- @if($errors->has('doctor_id'))
                        <div class="error" style="color:red;">{{ $errors->first('doctor_id') }}</div>
                    @endif -->


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
                                <td><input type="text" class="start_time" name="m_start_time" placeholder="Start Time" readonly></td>
                                <td><input type="text" class="end_time" name="m_end_time" placeholder="End Time" readonly></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="tuesday" name="tuesday" value="2">
                                    <label>Tuesday</label><br>
                                </td>
                                <td><input type="text" class="start_time" name="t_start_time" placeholder="Start Time" readonly></td>
                                <td><input type="text" class="end_time" name="t_end_time" placeholder="End Time" readonly></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="wednesday" name="wednesday" value="3">
                                    <label>Wednesday</label><br>
                                </td>
                                <td><input type="text" class="start_time" name="w_start_time" placeholder="Start Time" readonly></td>
                                <td><input type="text" class="end_time" name="w_end_time" placeholder="End Time" readonly></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="thursday" name="thursday" value="4">
                                    <label>Thursday</label><br>
                                </td>
                                <td><input type="text" class="start_time" name="th_start_time" placeholder="Start Time" readonly></td>
                                <td><input type="text" class="end_time" name="th_end_time" placeholder="End Time" readonly></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="friday" name="friday" value="5">
                                    <label>Friday</label><br>
                                </td>
                                <td><input type="text" class="start_time" name="f_start_time" placeholder="Start Time" readonly></td>
                                <td><input type="text" class="end_time" name="f_end_time" placeholder="End Time" readonly></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="saturday" name="saturday" value="6">
                                    <label>Saturday</label><br>
                                </td>
                                <td><input type="text" class="start_time" name="s_start_time" placeholder="Start Time" readonly></td>
                                <td><input type="text" class="end_time" name="s_end_time" placeholder="End Time" readonly></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="sunday" name="sunday" value="7">
                                    <label>Sunday</label><br>
                                </td>
                                <td><input type="text" class="start_time" name="su_start_time" placeholder="Start Time" readonly></td>
                                <td><input type="text" class="end_time" name="su_end_time" placeholder="End Time" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>

                    <div id="errors" style="color:red;">
                    </div>

                    <button type="submit" class="btn btn-success mt-1 mr-2">Save</button>
                    <a href="/index">
                        <button type="button" class="btn btn-warning mt-1">Cancel</button>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script type="text/javascript">

    //************************************************
    //Form Validation
    //************************************************
    function validateForm() {
        var form = document.forms["myForm"];
        $('#errors').html('');
        var err = [];

        if(form["doctor_id"].value == "Select Doctor")
        {
            err.push("Please select Doctor<br>");
        }

        if(form["monday"].checked == true)
        {
            if (form["m_start_time"].value == "" || form["m_end_time"].value == "") 
            {
                err.push("Please select Time for Monday<br>");
            }

            // if (form["m_start_time"].value.replace(/:/g, '') > form["m_end_time"].value.replace(/:/g, ''))
            // {
            //     err.push("End Time must be greater than Start Time for Monday<br>");
            // }
        }

        if(form["tuesday"].checked == true)
        {
            if (form["t_start_time"].value == "" || form["t_end_time"].value == "") 
            {
                err.push("Please select Time for Tuesday<br>");
            }
        }

        if(form["wednesday"].checked == true)
        {
            if (form["w_start_time"].value == "" || form["w_end_time"].value == "") 
            {
                err.push("Please select Time for Wednesday<br>");
            }
        }

        if(form["thursday"].checked == true)
        {
            if (form["th_start_time"].value == "" || form["th_end_time"].value == "") 
            {
                err.push("Please select Time for Thursday<br>");
            }
        }

        if(form["friday"].checked == true)
        {
            if (form["f_start_time"].value == "" || form["f_end_time"].value == "") 
            {
                err.push("Please select Time for Friday<br>");
            }
        }

        if(form["saturday"].checked == true)
        {
            if (form["s_start_time"].value == "" || form["s_end_time"].value == "") 
            {
                err.push("Please select Time for Saturday<br>");
            }
        }

        if(form["sunday"].checked == true)
        {
            if (form["su_start_time"].value == "" || form["su_end_time"].value == "") 
            {
                err.push("Please select Time for Sunday<br>");
            }
        }

        if (err != '')
        {
            $('#errors').append(err);
            return false;
        }
    }


    $(document).ready(function() {
        
        $('.start_time').timepicker({ timeFormat: 'H:mm:ss' });
        $('.end_time').timepicker({ timeFormat: 'H:mm:ss' });

    });
</script>