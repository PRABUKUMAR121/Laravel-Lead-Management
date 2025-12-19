@extends('concept.index')
@section('menu','Leads List')
@section('page','Edit Lead')
@section('page_subtitle','Edit Lead')
@section('main-content')
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="http://127.0.0.1:8000/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/libs/css/style.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/vendor/inputmask/css/inputmask.css" />
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
                                     

                <!-- Row 1 -->
                @foreach($leads as $lead)
                <form action="{{url('lead/edit/'.$lead->id)}}" method="post">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Lead Given date</label>
                        <input type="date" name="lead_given_date" value="{{$lead->lead_given_date}}" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lead Name</label>
                        <input type="text" name="lead_name" value="{{$lead->lead_name}}" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" name="email" value="{{$lead->email}}" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Phone</label>
                        <input type="number" name="phone" value="{{$lead->phone}}" class="form-control">
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Company Name</label>
                        <input type="text" name="company" value="{{$lead->company}}" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Lead Source</label>
                        <select name="lead_source" class="form-control">
                            <option value="" {{$lead->lead_source==''? 'selected':''}}>Select</option>
                            <option {{$lead->lead_source=='Website'? 'selected':''}}>Website</option>
                            <option {{$lead->lead_source=='Phone Call'? 'selected':''}}>Phone Call</option>
                            <option {{$lead->lead_source=='Email'? 'selected':''}}>Email</option>
                            <option {{$lead->lead_source=='Referral'? 'selected':''}}>Referral</option>
                            <option {{$lead->lead_source=='Social Media'? 'selected':''}}>Social Media</option>
                            <option {{$lead->lead_source=='Walk-in'? 'selected':''}}>Walk-in</option>
                        </select>
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Assigned To</label>
                        <select name="assigned_to" class="form-control">
                            <option value="" {{$lead->assigned_to==''? 'selected':''}}>Select Executive</option>
                            <option {{$lead->assigned_to=='Rajesh'? 'selected':''}}>Rajesh</option>
                            <option {{$lead->assigned_to=='Priya'? 'selected':''}}>Priya</option>
                            <option {{$lead->assigned_to=='Gayathri'? 'selected':''}}>Gayathri</option>
                            <option {{$lead->assigned_to=='Sowndarya'? 'selected':''}}>Sowndarya</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Assigned Date</label>
                        <input type="date" name="assigned_date" value="{{$lead->assigned_date}}" class="form-control" >
                    </div>

                    <div class="form-group col-md-4">
                        <label>Lead Priority</label>
                        <select name="lead_priority" class="form-control">
                            <option {{$lead->lead_priority=='Low'? 'selected':''}}>Low</option>
                            <option {{$lead->lead_priority=='Medium'? 'selected':''}}>Medium</option>
                            <option {{$lead->lead_priority=='High'? 'selected':''}}>High</option>
                            <option {{$lead->lead_priority=='Urgent'? 'selected':''}}>Urgent</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Lead Status</label>
                        <select name="lead_status"  class="form-control">
                            <option {{$lead->lead_status=='New'? 'selected':''}}>New</option>
                            <option {{$lead->lead_status=='Contacted'? 'selected':''}}>Contacted</option>
                            <option {{$lead->lead_status=='Qualified'? 'selected':''}}>Qualified</option>
                            <option {{$lead->lead_status=='Not Interested'? 'selected':''}}>Not Interested</option>
                            <option {{$lead->lead_status=='Converted'? 'selected':''}}>Converted</option>
                        </select>
                    </div>
                </div>

                <!-- Single Line Row -->
                <div class="form-group">
                    <label>Sales Stage / Closed Status</label>
                    <select name="closed_status" class="form-control">
                        <option value="">Select Stage</option>
                        <option {{$lead->closed_status=='Pipeline'? 'selected':''}}>Pipeline</option>
                        <option {{$lead->closed_status=='Projection'? 'selected':''}}>Projection</option>
                        <option {{$lead->closed_status=='Negotiation'? 'selected':''}}>Negotiation</option>
                        <option {{$lead->closed_status=='Closed - Won'? 'selected':''}}>Closed - Won</option>
                        <option {{$lead->closed_status=='Closed - Lost'? 'selected':''}}>Closed - Lost</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                        <label>Solution Date</label>
                        <input type="date" name="solution_date" value="{{$lead->solution_date}}" class="form-control" >
                    </div>

                <!-- Remarks Row -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Enquiry Remarks</label>
                        <textarea name="enquiry_remarks"  class="form-control" rows="3">{{$lead->enquiry_remarks}}</textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Solution Remarks</label>
                        <textarea name="solution_remarks" class="form-control" rows="3">{{$lead->solution_remarks}}</textarea>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="text-right">
                    <button type="reset" class="btn btn-secondary">Clear</button>
                    <button type="submit" class="btn btn-primary">Save Lead</button>
                </div>
                @csrf
                 </form>
                @endforeach

           
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                          <script src="http://127.0.0.1:8000/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="http://127.0.0.1:8000/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="http://127.0.0.1:8000/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="http://127.0.0.1:8000/assets/libs/js/main-js.js"></script>
    <script src="http://127.0.0.1:8000/assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
@endsection