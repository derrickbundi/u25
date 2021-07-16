@extends('layouts.dashboard.main')
@section('title', 'Users')
@section('body')
<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">
                        Users ({{ $users->count() }})
                    </h6>
                    <button class="btn p-0 float-right" type="button" data-toggle="modal" data-target="#add_user">
                        <i data-feather="plus" class="icon-sm mr-2"></i>
                    </button>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="profiles">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>ID NO</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    @if($user->roles[0]->name == 'user')
                                    <span class="badge badge-warning">{{ $user->roles[0]->name }}</span>
                                    @elseif($user->roles[0]->name == 'editor')
                                    <span class="badge badge-info">{{ $user->roles[0]->name }}</span>
                                    @else
                                    <span class="badge badge-success">{{ $user->roles[0]->name }}</span>
                                    @endif
                                </td>
                                <td>{{ $user->fname }} {{ $user->lname }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->id_no }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="form-inline">
                                    @if($user->suspend == NULL)
                                    <form action="{{ route('dashboard.suspend_user', base64_encode($user->id)) }}"
                                        method="POST">
                                        @csrf
                                        <button class="btn btn-outline-success" style="margin:2px;" type="submit">
                                            <i data-feather="unlock" class="icon-sm"></i>
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('dashboard.unsuspend_user', base64_encode($user->id)) }}"
                                        method="POST">
                                        @csrf
                                        <button class="btn btn-danger" type="submit" style="margin:2px;">
                                            <i data-feather="lock" class="icon-sm"></i>
                                        </button>
                                    </form>
                                    @endif
                                    <button class="btn btn-outline-danger" type="submit" style="margin:2px;">
                                        <i data-feather="trash" class="icon-sm"></i>
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

<!-- pop up -->
<div class="modal close_modal" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;">
                    Add Editor
                </h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.add_editor') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>First Name*</label>
                            <input type="text" name="fname" {{ $errors->has('fname') ? 'has-error' : '' }} required
                                style="height:42px;" class="form-control" placeholder="First Name*">
                            <small class="text-danger">{{$errors->first('fname')}}</small>
                        </div>
                        <div class="col-md-6">
                            <label>Last Name*</label>
                            <input type="text" name="lname" {{ $errors->has('lname') ? 'has-error' : '' }} required
                                style="height:42px;" class="form-control" placeholder="Last Name*">
                            <small class="text-danger">{{$errors->first('lname')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <label>Select type*</label>
                            <select class="form-control" style="height: 42px;" name="role" required>
                                <option selected data-default disabled>SELECT TYPE</option>
                                <option value="0">Editor</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Mobile*</label>
                            <input type="text" {{ $errors->has('mobile') ? 'has-error' : '' }} name="mobile" required
                                style="height:42px;" class="form-control" placeholder="Mobile*">
                            <small class="text-danger">{{$errors->first('mobile')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <label>ID Number*</label>
                            <input type="text" name="id_no" {{ $errors->has('id_no') ? 'has-error' : '' }}
                                style="height:42px;" class="form-control" placeholder="ID Number*">
                            <small class="text-danger">{{$errors->first('id_no')}}</small>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <label>Email Address*</label>
                            <input type="text" name="email" {{ $errors->has('email') ? 'has-error' : '' }} required
                                style="height:42px;" class="form-control" placeholder="Email Address*">
                            <small class="text-danger">{{$errors->first('email')}}</small>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success btn-block" style="height: 42px;">ADD USER</button>
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
        $('#profiles').DataTable({
        "drawCallback": function (settings) {
        feather.replace()
        }
        })
    });
</script>
@endsection