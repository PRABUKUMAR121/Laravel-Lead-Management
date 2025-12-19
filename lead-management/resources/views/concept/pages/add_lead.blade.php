@extends('concept.index')
@section('menu','Leads')
@section('page','Add Lead')
@section('page_subtitle','Add Lead')
@section('main-content')
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
</head>
 <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                   
                                    <p class="{{session('class')}}">{{Session::get('message')}}</p>

                                    @if($errors->any())
                                    @foreach($errors->all() as $error)
                                    <p class="btn btn-danger">{{$error}}</p><br>
                                    @endforeach
                                    @endif

                                </div>
                                <div class="card">
                                    <h5 class="card-header">Basic Form</h5>
                                    <div class="card-body">
                                     <form action="{{url('add-lead')}}" method="post">

                <!-- Row 1 -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Lead Given date</label>
                        <input type="date" name="lead_given_date" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lead Name</label>
                        <input type="text" name="lead_name" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Phone</label>
                        <input type="number" name="phone" class="form-control">
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Company Name</label>
                        <input type="text" name="company" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Lead Source</label>
                        <select name="lead_source" class="form-control">
                            <option value="">Select</option>
                            <option>Website</option>
                            <option>Phone Call</option>
                            <option>Email</option>
                            <option>Referral</option>
                            <option>Social Media</option>
                            <option>Walk-in</option>
                        </select>
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Assigned To</label>
                        <select name="assigned_to" class="form-control">
                            <option value="">Select Executive</option>
                            <option>Rajesh</option>
                            <option>Priya</option>
                            <option>Gayathri</option>
                            <option>Sowndarya</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Assigned Date</label>
                        <input type="date" name="assigned_date" class="form-control" >
                    </div>

                    <div class="form-group col-md-4">
                        <label>Lead Priority</label>
                        <select name="lead_priority" class="form-control">
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                            <option>Urgent</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Lead Status</label>
                        <select name="lead_status" class="form-control">
                            <option>New</option>
                            <option>Contacted</option>
                            <option>Qualified</option>
                            <option>Not Interested</option>
                            <option>Converted</option>
                        </select>
                    </div>
                </div>

                <!-- Single Line Row -->
                <div class="form-group">
                    <label>Sales Stage / Closed Status</label>
                    <select name="closed_status" class="form-control">
                        <option value="">Select Stage</option>
                        <option>Pipeline</option>
                        <option>Projection</option>
                        <option>Negotiation</option>
                        <option>Closed - Won</option>
                        <option>Closed - Lost</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                        <label>Solution Date</label>
                        <input type="date" name="solution_date" class="form-control" >
                    </div>

                <!-- Remarks Row -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Enquiry Remarks</label>
                        <textarea name="enquiry_remarks" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Solution Remarks</label>
                        <textarea name="solution_remarks" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="text-right">
                    <button type="reset" class="btn btn-secondary">Clear</button>
                    <button type="submit" class="btn btn-primary">Save Lead</button>
                </div>
                @csrf

            </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                          <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
@endsection