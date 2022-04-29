@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Products list</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Products list</li>
                </ol>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <a href="{{ route('admin.product.create') }}" class="btn btn-info text-white">
                    <i class="fa fa-plus-circle"></i> Create New
                </a>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-primary">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="data_table" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Unit Price</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
@endsection()

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#data_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.product.list') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'unit_price', name: 'unit_price' },
                    { data: 'image_url', name: 'image' },
                    { data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                columnDefs: [
                    { targets: 3,
                        render: function(data) {
                            return '<img src="'+data+'" alt="" class="w-100">'
                        }
                    }
                ]
            });
        } );
    </script>
@endpush
