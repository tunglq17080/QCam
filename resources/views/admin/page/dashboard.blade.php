@extends('admin.master')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Sales Chart and browser state-->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block">
                        <div>
                            <h5 class="card-title mb-0">Sales Chart (VND)</h5>
                        </div>
                        <div class="ms-auto">
                            <ul class="list-inline text-center font-12">
                                <li><i class="fa fa-circle text-success"></i> COD</li>
                                <li><i class="fa fa-circle text-info"></i> Momopay</li>
                                <li><i class="fa fa-circle text-primary"></i> Bitcoin</li>
                            </ul>
                        </div>
                    </div>
                    <div class="" id="sales-chart" style="height: 355px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
@push('scripts')
    <script src="js/dashboard1.js"></script>
@endpush