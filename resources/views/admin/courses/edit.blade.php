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
            <form id="quickForm" action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="courseName">course Name</label>
                        <input type="text" name="name" class="form-control" id="courseName"
                            placeholder="Enter course name" value="{{ $course->name }}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3"
                            placeholder="Enter course description ...">{{ $course->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" name="rating" class="form-control" id="rating"
                            placeholder="Enter course rating" min="0" max="10" value="{{ $course->rating }}">
                    </div>

                    <div class="form-group">
                        <label for="views">Views</label>
                        <input type="number" name="views" class="form-control" id="views" placeholder="Enter course views"
                            value="{{ $course->views }}">
                    </div>

                    <div class="form-group">
                        <label for="levels">Course levels</label>
                        <select class="custom-select rounded-0" id="levels" name="levels">
                            <option value="beginner" {{ $course->levels == 'beginner' ? 'selected' : '' }}>
                                Beginner
                            </option>

                            <option value="immediate" {{ $course->levels == 'immediate' ? 'selected' : '' }}>
                                Immediate
                            </option>

                            <option value="high" {{ $course->levels == 'high' ? 'selected' : '' }}>
                                High
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="hours">Course Hours</label>
                        <input type="number" name="hours" class="form-control" id="hours" placeholder="Enter course hours"
                            min="0" value="{{ $course->hours }}">
                    </div>


                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select class="custom-select rounded-0" id="categories" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $course->category->id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- image --}}
                    <div class="form-group">
                        <label for="exampleImage">Image</label>
                        <input type="file" class="form-control imgInp" id="exampleImage" name="image" accept="image/*">
                    </div>

                    {{-- image preview --}}
                    <div class="form-group">
                        <img src="{{ $course->image ? asset('uploads/courses_images/' . $course->image) : asset('uploads/courses_images/default.jpg') }}"
                            alt="course image" class="img-thumbnail image-show" width="100">
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
