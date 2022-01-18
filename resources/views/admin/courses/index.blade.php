@extends('admin.master')

@push('head')

@endpush

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>courses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">courses</li>
                    </ol>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-6">
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Add course</a>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    @include('partials.session')
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>




    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">courses</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>description</th>
                                        <th>category_id </th>
                                        <th>rating</th>
                                        <th> views</th>
                                        <th>levels</th>
                                        <th>hours</th>
                                        <th>image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($courses->count() > 0)

                                        @foreach ($courses as $index => $course)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{ $course->description }}</td>
                                                <td>{{ $course->category->name }}</td>
                                                <td>{{ $course->rating }}</td>
                                                <td>{{ $course->views }}</td>
                                                <td>{{ $course->levels }}</td>
                                                <td>{{ $course->hours }}</td>
                                                <td>
                                                    <img src="{{ $course->image ? asset('uploads/courses_images/' . $course->image) : asset('uploads/courses_images/default.jpg') }}"
                                                        alt="course image" class="img-thumbnail image-show" width="100">
                                                </td>
                                                <td>
                                                    @if ($course->active == 1)
                                                        <span class="badge bg-primary">Active</span>
                                                    @else
                                                        <span class="badge bg-warning">Not Active</span>

                                                    @endif

                                                </td>
                                                <td style="width: 200px;">

                                                    <a href="{{ route('admin.courses.edit', $course->id) }}"
                                                        class="btn btn-warning btn-sm" title="edit">
                                                        Edit
                                                        <i class="fa fa-edit"></i>
                                                    </a>



                                                    <form action="{{ route('admin.courses.destroy', $course->id) }}"
                                                        method="post" id="deleteForm" style="display: inline-block;">
                                                        @method('DELETE')
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger btn-sm delete"
                                                            title="delete">
                                                            Delete
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>

                                        @endforeach

                                    @else
                                        <th colspan="4" style="text-align:center">
                                            There is no courses
                                        </th>
                                    @endif

                                </tbody>
                            </table>
                            {{ $courses->links() }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('js')



@endpush
