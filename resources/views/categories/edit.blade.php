@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit Categories</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="basic-form">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                    <button type="button" class="close h-100" data-dismiss="alert"
                                        aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                    <strong>Error!</strong> Please Check your inputs.
                                </div>
                            @endif



                            <form action="{{ route('categories.update', $category->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="category_name"
                                                value="{{ $category->category_name }}" class="form-control"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Detail:</strong>
                                            <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ $category->description }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

