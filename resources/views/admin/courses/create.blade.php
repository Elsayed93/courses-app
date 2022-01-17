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
                        <li class="breadcrumb-item active">Add course</li>
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
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add course</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="courseName">Course Name</label>
                        <input type="text" name="name" class="form-control" id="courseName"
                            placeholder="Enter course name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3"
                            placeholder="Enter course description ...">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" name="rating" class="form-control" id="rating"
                            placeholder="Enter course rating" min="0" max="10" value="{{ old('rating') }}">
                    </div>

                    <div class="form-group">
                        <label for="views">Views</label>
                        <input type="number" name="views" class="form-control" id="views" placeholder="Enter course views"
                            value="{{ old('views') }}">
                    </div>

                    <div class="form-group">
                        <label for="levels">Course levels</label>
                        <select class="custom-select rounded-0" id="levels" name="levels">
                            <option value="beginner" {{ old('levels') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="immediate" {{ old('levels') == 'immediate' ? 'selected' : '' }}>Immediate
                            </option>
                            <option value="high" {{ old('levels') == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="hours">Course Hours</label>
                        <input type="number" name="hours" class="form-control" id="hours" placeholder="Enter course hours"
                            min="0" value="{{ old('hours') }}">
                    </div>


                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select class="custom-select rounded-0" id="categories" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                        <img src="" alt="" class="img-thumbnail image-show" width="100" style="display: none;">
                    </div>

                    <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="active" class="custom-control-input" id="active"
                                {{ old('active') == 'on' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="active">Active .</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <!-- /.card -->


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
