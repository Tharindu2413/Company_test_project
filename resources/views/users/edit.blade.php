@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit User</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="basic-form">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                </button>
                                <strong>Error!</strong> Please Check your inputs.
                            </div>
                        @endif
                   
                            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id], 'class' => 'form-valide-with-icon']) !!}

                            <div class="form-group">
                                <label class="text-label">Name</label>
                               

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                 

                                    {!! Form::text('name', null, array('placeholder' => 'Enter a Name..','class' => 'form-control')) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label">Email</label>
                            
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                    </div>
                          

                                    {!! Form::text('email', null, array('placeholder' => 'Enter a Email..','class' => 'form-control')) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label">User Role</label>
                          
                                <div class="input-group transparent-append">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-pencil-square-o"></i> </span>
                                    </div>
                                   
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','option', 'id' => 'inputState')) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label">Password *</label>
                            
                                <div class="input-group transparent-append">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                  
                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control', 'id' => 'val-username1')) !!}


                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-label">Confirm Password *</label>
                                <div class="input-group transparent-append">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                              

                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control', 'id' => 'val-password1')) !!}


                                </div>
                            </div>

                            <div class="form-group" style="margin-left:91%;">
                                <div class="input-group transparent-append">
                                    <button class="btn btn-primary">Update User</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--**********************************
        Content body end
        ***********************************-->


    <!--**********************************
        Footer start
        ***********************************-->
   
@endsection
