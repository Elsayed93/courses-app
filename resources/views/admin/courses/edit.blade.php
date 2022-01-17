@extends('admin.master')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6 ml-auto">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Home</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.courses.index') }}">courses</a>
                        </li>
                        <li class="breadcrumb-item active">Edit course</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content container mt-3">

        <div class="col-md-6">
            @include('partials.errors')
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit course</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form id="quickForm" action="{{ route('admin.courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="courseName">course Name</label>
                        <input type="text" name="name" class="form-control" id="courseName"
                            placeholder="Enter course name" value="{{ $course->name }}">
                    </div>
                    <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="active" class="custom-control-input" id="active"
                                {{ $course->active == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="active">Active .</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <!-- /.card -->


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
