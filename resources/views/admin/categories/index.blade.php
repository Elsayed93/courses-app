@extends('admin.master')
@push('head')
    <style>
        table,
        th,
        td {
            text-align: center;
        }

        table div {
            margin: auto;
            cursor: default !important;
        }


    </style>
@endpush
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div class="col-md-6">
                @include('partials.session')
            </div>

            <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-block btn-primary">
                        Add Category
                    </a>
                </div>
            </div>


            <div class="box-body border-radius-none" style="margin-top:20px;">
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>name</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($categories->count() > 0)
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($category->active == 1)
                                                <div class="btn btn-block btn-primary" style="width:fit-content">
                                                    Active
                                                </div>
                                            @else
                                                <div class="btn btn-block btn-warning" style="width:fit-content">Not Active
                                                </div>
                                            @endif
                                        </td>

                                        <td>

                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-warning btn-sm" title="edit">
                                                Edit
                                                <i class="fa fa-edit"></i>
                                            </a>



                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="post" id="deleteForm" style="display: inline-block;">
                                                @method('DELETE')
                                                @csrf

                                                <button type="submit" class="btn btn-danger btn-sm delete" title="delete">
                                                    Delete
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="4" id="nocategories">@lang('categories.There is no categories.')</td>
                            @endif

                        </tbody>
                    </table>
                    {{ $categories->appends(request()->query())->links() }}

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.box-body -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
