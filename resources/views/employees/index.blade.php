@extends('template.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
           
            <div class="search">
                <i class="fa fa-search"></i>               
                <input type="text" class="form-control"  name="textsearch" id="textsearch" placeholder="Filter by">
                <button class="btn btn-primary" id="search">Search</button>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    
                    <h4>Insert Employee<a href="{{url('add-employee')}}" class="btn btn-primary float-end">Add Employee</a></h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Profile</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody> 
                           
                          </tbody>
                       
                    </table>
                    <div class="d-flex justify-content-between">
                        <div>
                            <select onchange="fetchdata()" class="selectpicker" id="selectbox">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="pagination"></div>
                        
                       
                    </div>
                  
                   
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('js/fetchajax.js')}}"></script>
<script type="text/javascript" src="{{asset('js/filter.js')}}"></script>
@endsection
