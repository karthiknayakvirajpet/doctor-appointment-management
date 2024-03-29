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
        <div class="card-header" style="background-color: #079EBC;">
            <div class="row">
                <div class="col-md-8">
                    <h4>Edit Appointment Time</h4>
                </div>
            </div>
        </div>

        <form action="/create-appointment" method="POST" onsubmit="return validateForm()" name="myForm">
            @csrf
            <div class="card-body" style="background-color: #E0F8FD;">
                <div class="col-8 offset-2">
                    <label><h5 style="color:brown;"><b>Doctor Name: {{ @$result[0]->name }}</b></h5></label>

                    <input type="hidden" name="doctor_id" value="{{ @$result[0]->id }}">
                    
                    <div class="mt-1">
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
                                    <input type="checkbox" id="monday" name="monday" value="1" <?php if(@$result[0]->open_status!=0)echo 'checked';?>>
                                    <label>Monday</label><br>
                                </td>
                                <td><input type="text" class="form-control start_time" name="m_start_time" placeholder="Start Time" readonly value="<?php if(@$result[0]->open_status!=0)echo @$result[0]->start_time ;?>"></td>
                                <td><input type="text" class="form-control end_time" name="m_end_time" placeholder="End Time" readonly value="<?php if(@$result[0]->open_status!=0)echo @$result[0]->end_time ;?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="tuesday" name="tuesday" value="2" <?php if(@$result[1]->open_status!=0)echo 'checked';?>>
                                    <label>Tuesday</label><br>
                                </td>
                                <td><input type="text" class="form-control start_time" name="t_start_time" placeholder="Start Time" readonly value="<?php if(@$result[1]->open_status!=0)echo @$result[1]->start_time ;?>"></td>
                                <td><input type="text" class="form-control end_time" name="t_end_time" placeholder="End Time" readonly value="<?php if(@$result[1]->open_status!=0)echo @$result[1]->end_time ;?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="wednesday" name="wednesday" value="3" <?php if(@$result[2]->open_status!=0)echo 'checked';?>>
                                    <label>Wednesday</label><br>
                                </td>
                                <td><input type="text" class="form-control start_time" name="w_start_time" placeholder="Start Time" readonly value="<?php if(@$result[2]->open_status!=0)echo @$result[2]->start_time ;?>"></td>
                                <td><input type="text" class="form-control end_time" name="w_end_time" placeholder="End Time" readonly value="<?php if(@$result[2]->open_status!=0)echo @$result[2]->end_time ;?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="thursday" name="thursday" value="4" <?php if(@$result[3]->open_status!=0)echo 'checked';?>>
                                    <label>Thursday</label><br>
                                </td>
                                <td><input type="text" class="form-control start_time" name="th_start_time" placeholder="Start Time" readonly value="<?php if(@$result[3]->open_status!=0)echo @$result[3]->start_time ;?>"></td>
                                <td><input type="text" class="form-control end_time" name="th_end_time" placeholder="End Time" readonly value="<?php if(@$result[3]->open_status!=0)echo @$result[3]->end_time ;?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="friday" name="friday" value="5" <?php if(@$result[4]->open_status!=0)echo 'checked';?>>
                                    <label>Friday</label><br>
                                </td>
                                <td><input type="text" class="form-control start_time" name="f_start_time" placeholder="Start Time" readonly value="<?php if(@$result[4]->open_status!=0)echo @$result[4]->start_time ;?>"></td>
                                <td><input type="text" class="form-control end_time" name="f_end_time" placeholder="End Time" readonly value="<?php if(@$result[4]->open_status!=0)echo @$result[4]->end_time ;?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="saturday" name="saturday" value="6" <?php if(@$result[5]->open_status!=0)echo 'checked';?>>
                                    <label>Saturday</label><br>
                                </td>
                                <td><input type="text" class="form-control start_time" name="s_start_time" placeholder="Start Time" readonly value="<?php if(@$result[5]->open_status!=0)echo @$result[5]->start_time ;?>"></td>
                                <td><input type="text" class="form-control end_time" name="s_end_time" placeholder="End Time" readonly value="<?php if(@$result[5]->open_status!=0)echo @$result[5]->end_time ;?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="sunday" name="sunday" value="7" <?php if(@$result[6]->open_status!=0)echo 'checked';?>>
                                    <label>Sunday</label><br>
                                </td>
                                <td><input type="text" class="form-control start_time" name="su_start_time" placeholder="Start Time" readonly value="<?php if(@$result[6]->open_status!=0)echo @$result[6]->start_time ;?>"></td>
                                <td><input type="text" class="form-control end_time" name="su_end_time" placeholder="End Time" readonly value="<?php if(@$result[6]->open_status!=0)echo @$result[6]->end_time ;?>"></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>

                    <div id="errors" style="color:red;">
                    </div>

                    <button type="submit" class="btn btn-success mr-2">Save</button>
                    <a href="/index">
                        <button type="button" class="btn btn-warning">Cancel</button>
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

        if(form["monday"].checked == true)
        {
            if (form["m_start_time"].value == "" || form["m_end_time"].value == "") 
            {
                err.push("Please select Time for Monday<br>");
            }
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