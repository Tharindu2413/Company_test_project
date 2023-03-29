@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Manage Product Section...</h4>
                    {{-- <span class="ml-1">Datatable</span> --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <a type="button" class="btn btn-rounded btn-primary" href="{{ route('products.create') }}">Add New
                    Product</a>
            </div>
        </div>
        <!-- row -->
        @if ($message = Session::get('deleted'))
            <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
                <span><i class="mdi mdi-delete"></i></span>
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                            class="mdi mdi-close"></i></span>
                </button> Deleted! {{ $message }}.
            </div>
        @elseif ($message = Session::get('success'))
            <div class="alert alert-success solid alert-right-icon alert-dismissible fade show">
                <span><i class="mdi mdi-checkbox-marked-circle-outline"></i></span>
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                            class="mdi mdi-close"></i></span>
                </button> Success! {{ $message }}.
            </div>
        @endif



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Categories Details Table</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Product Name</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->description }}</td>
                                           
                                            <td>
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="POST">
                                                    {{-- <a class="btn btn-primary"
                                                        href="{{ route('categories.show', $category->id) }}">Show</a> --}}
                                                    @can('product-edit')l
                                                        <a class="btn btn-primary"
                                                            href="{{ route('products.edit', $product->id) }}"><i
                                                            class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    @endcan


                                                    @csrf
                                                    @method('DELETE')
                                                    @can('product-delete')
                                                        <button type="submit" class="btn btn-danger btn btn-danger show-alert-delete-box"><i class="fa fa-trash-o"></i></button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                            </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>



    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
