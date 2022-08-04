@extends('template.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
            <h6 class="alert alter-success">{{session('status')}}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Edit Employee Data<a href="{{url('employee')}}" class="btn btn-danger float-end">Back</a></h4>
                </div>
                <div class="card-body">
                    <form action="{{url('update-employee/'.$emp->id )}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$emp->emp_name}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{$emp->emp_email}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Contact</label>
                            <input type="text" class="form-control" name="contact" value="{{$emp->emp_contact}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="{{$emp->emp_address}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Profile</label>
                            <input type="file" class="form-control" name="profile" value="{{$emp->emp_profile}}"  accept="image/png, image/gif, image/jpeg, image/jpg">
                            <img src="{{asset('uploads/employee_profile/'.$emp->emp_profile)}}" width="70px" height="70px" alt="Image">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="submit">Update Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
{{-- <script type="text/javascript" src="{{asset('js/fetchajax.js')}}"></script> --}}
@endsection
