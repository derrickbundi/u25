@extends('layouts.dashboard.main')
@section('title', 'Categories')
@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-success float-right" style="margin:2px;" data-toggle="modal"
                    data-target="#add_category">
                    <i data-feather="plus" class="icon-sm"></i>&nbsp;ADD CATEGORY
                </button>
                <button class="btn btn-success float-right" style="margin:2px;" data-toggle="modal" data-target="#add_tag">
                    <i data-feather="plus" class="icon-sm"></i>&nbsp;ADD TAG
                </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">
                                Categories
                            </h6>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="seasons">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Category Name</th>
                                        <th>Blogs</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $season)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $season->name }}</td>
                                        <td>{{ $season->blogs_count }}</td>
                                        <td>{{ $season->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            @if($season->is_active == true)
                                            <span class="badge badge-success">active</span>
                                            @else
                                            <span class="badge badge-danger">not active</span>
                                            @endif
                                        </td>
                                        <td class="form-inline">
                                            @if($season->is_active == true)
                                            <form action="{{ route('dashboaard.category_suspend', base64_encode($season->id)) }}"
                                                method="POST">
                                                @csrf
                                                <button class="btn btn-outline-info" style="margin:2px;">
                                                    <i data-feather="lock" class="icon-sm"></i>
                                                </button>
                                            </form>
                                            @else
                                            <form action="{{ route('dashboaard.category_unsuspend', base64_encode($season->id)) }}"
                                                method="POST">
                                                @csrf
                                                <button class="btn btn-outline-danger" style="margin:2px;">
                                                    <i data-feather="unlock" class="icon-sm"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">
                                Tags
                            </h6>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="tags">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tag Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <button class="btn btn-outline-warning">
                                                    <i data-feather="edit" class="icon-md"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- pop up -->
<div class="modal close_modal" id="add_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;">
                    Add Category
                </h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.add_category') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label>Category Name*</label>
                            <input type="text" name="name" {{ $errors->has('name') ? 'has-error' : '' }} required
                                style="height:42px;" class="form-control" placeholder="Category Name*">
                            <small class="text-danger">{{$errors->first('name')}}</small>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success btn-block"
                        style="height: 42px;text-transform:uppercase;">Add Category</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal close_modal" id="add_tag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;">
                    Add Tag
                </h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.add_tag') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label>Tag Name*</label>
                            <input type="text" name="name" {{ $errors->cood->has('name') ? 'has-error' : '' }} required
                                style="height:42px;" class="form-control" placeholder="Tag Name*">
                            <small class="text-danger">{{$errors->cood->first('name')}}</small>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success btn-block"
                        style="height: 42px;text-transform:uppercase;">Add Tag</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#seasons').DataTable({
        "drawCallback": function(settings) {
        feather.replace()
        }
        })
        $('#tags').DataTable({
        "drawCallback": function(settings) {
        feather.replace()
        }
        })
    });
</script>
@if (count($errors->cood) > 0)
<script>
    $(document).ready(function () {
        $('#add_tag').modal('show')
    });
</script>
@endif
@if (count($errors) > 0)
<script>
    $(document).ready(function () {
        $('#add_category').modal('show')
    });
</script>
@endif
@endsection