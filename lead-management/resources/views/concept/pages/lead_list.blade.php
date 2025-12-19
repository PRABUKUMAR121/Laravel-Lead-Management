@extends('concept.index')
@section('menu','Leads')
@section('page','Lead list')
@section('page_subtitle','Lead List')
@section('main-content')
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Tables</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>
 <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Basic Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">

                                        @if(session('message'))
                                        <p class="{{session('class')}}">{{session('message')}}</p>
                                        @endif


                                   <table class="table table-striped table-bordered first">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Lead Given Date</th>
            <th>Lead Name</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Assigned To</th>
            <th>Assigned Date</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Solution Date</th>
            <th>Stage</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
@empty($leads)
 <tr>
            <th colspan="13">No Records found</th>
            
        </tr>
@endempty
@php
$i=1;
@endphp
@foreach($leads as $lead)
        <tr>

      <td>{{$i++}}</td>
            <td>{{$lead->lead_given_date}}</td>
            <td>{{$lead->lead_name}}</td>
            <td>{{$lead->company}}</td>
            <td>{{$lead->phone}}</td>
            <td>{{$lead->email}}</td>
            <td>{{$lead->assigned_to}}</td>
             <td>{{$lead->assigned_date}}</td>
            <td><span class="{{$lead->lead_priority=='High'? 'badge badge-danger':'badge badge-primary'}}">{{$lead->lead_priority}}</span></td>
             <td>{{$lead->closed_status}}</td>
              <td>{{$lead->solution_date}}</td>
              <td>{{$lead->lead_status}}</td>

            <td>
                <a href="{{url('lead/edit/').'/'.$lead->id}}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{url('lead/delete/').'/'.$lead->id}}"
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Are you sure you want to delete this lead?');">
                   Delete
                </a>
            </td>
        </tr>
@endforeach
    </tbody>

    <tfoot>
       
    </tfoot>
</table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
@endsection
