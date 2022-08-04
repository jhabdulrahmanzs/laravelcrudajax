@extends('template.layout')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
            <h6 class="alert alter-success">{{session('status')}}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Insert Employee Data<a href="{{url('employee')}}" class="btn btn-danger float-end">Back</a></h4>
                </div>
                <div id="message"></div>
                <div class="card-body">
                    <form  enctype="multipart/form-data" id="regform">
                        
                        @csrf
                        {{-- {{ method_field('PUT') }} --}}
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id='Name'>
                            <span class="error" id="name_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" id='Email'>
                            <span class="error" id="email_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Contact</label>
                            <input type="text" class="form-control" name="contact" id="Contact">
                            <span class="error" id="contact_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" id="Address">
                            <span class="error" id="address_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Profile</label>
                            <input type="file" class="form-control" name="profile" id="Profile" accept="image/png, image/gif, image/jpeg, image/jpg">
                            <span class="error" id="profile_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="Password">
                            <span class="error" id="password_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
@endsection
