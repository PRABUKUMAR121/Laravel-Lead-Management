@extends('concept.index')
@section('menu','Team Manager')
@section('page','Add Team Manager')
@section('page_subtitle','Add Team Manager')
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
                                    <h5 class="card-header">Add Team Manager</h5>
                                    <div class="card-body">
                                     <form action="{{url('add-tm')}}" method="post">

                <!-- Row 1 -->
                <div class="form-row">
             
                    <div class="form-group col-md-4">
                        <label>Team  Manager</label>
                        <input type="text" name="team_manager" class="form-control" required>
                    </div>
                </div>

                <!-- Remarks Row -->
              
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