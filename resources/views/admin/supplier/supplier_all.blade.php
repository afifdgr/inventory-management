@extends('layouts.app')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Supplier All</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('supplier.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light"
                                style="float:right;">Add Supplier</a> <br> <br>

                            <h4 class="card-title">Supplier All Data</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php($i = 1)
                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $supplier->name }}</td>
                                            <td>{{ $supplier->mobile_no }}</td>
                                            <td>{{ $supplier->email }}</td>
                                            <td>{{ $supplier->address }}</td>
                                            <td>
                                                <a href="{{ route('supplier.edit', $supplier->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('supplier.delete', $supplier->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                        class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
