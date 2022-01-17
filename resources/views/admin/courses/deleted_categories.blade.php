@extends('admin.master')

@push('head')

@endpush

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Deleted Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Deleted categories</li>
                    </ol>
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
                            <h3 class="card-title">Deleted categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($deletedCategories->count() > 0)

                                        @foreach ($deletedCategories as $index => $category)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    @if ($category->active == 1)
                                                        <span class="badge bg-primary">Active</span>
                                                    @else
                                                        <span class="badge bg-warning">Not Active</span>

                                                    @endif

                                                </td>
                                                <td>

                                                    <a href="{{ route('admin.restore.deleted.category', $category->id) }}"
                                                        class="btn btn-warning btn-sm" title="edit">
                                                        Restore
                                                    </a>



                                                    <form action="{{ route('admin.permanently.delete.category', $category->id) }}"
                                                        method="post" id="deleteForm" style="display: inline-block;">
                                                        @csrf

                                                        <button type="submit" class="btn btn-danger btn-sm delete"
                                                            title="delete">
                                                            Permanently Delete
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>

                                        @endforeach

                                    @else
                                        <th colspan="4" style="text-align:center">
                                            There is no deleted categories
                                        </th>
                                    @endif

                                </tbody>
                            </table>
                            {{ $deletedCategories->links() }}
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
