@extends('layouts.app')

@section('content')
    <center><a href="{{ route('employeeAdd') }}" class="btn btn-primary" style="width: 50px;
            height: 50px;
            padding: 1px 13px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;"><h1>+</h1></a></center><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div>
                    {{--<div class="card-header">Dashboard</div>--}}
                    <div class="col-sm-12">

                        {{--@if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif--}}
                    </div>
                    <div>
                        {{--{{json_encode($data)}}--}}
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Working time (years)</th>
                                <th><i>Actions</i></th>
                            </tr>
                            @foreach(json_decode(json_encode($data), true) as $value)
                                <tr>
                                    <td>{{ $value['id'] }}</td>
                                    <td>{{ $value['first_name'] }}</td>
                                    <td>{{ $value['last_name'] }}</td>
                                    <td>{{ $value['phone'] }}</td>
                                    <td>{{ $value['email'] }}</td>
                                    <td>{{ $value['working_years'] }}</td>
                                    <td>
                                        <a href="/employees/edit/{{$value['id']}}" id="employeeEdit" data-id="{{ $value['id'] }}"
                                           class="btn btn-warning">Edit</a>
                                        <a class="btn btn-danger" data-mytitle="Title" data-mydesctiption="Description"
                                           data-catid="{{$value['id']}}" data-toggle="modal" data-target="#delete"
                                            id="employeeDelete">Delete</a>
                                        {{--<a href="{{route('employeeDelete', $value['id'])}}" id="employeeDelete" data-id="{{ $value['id'] }}"
                                           class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>}}--}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Modal--}}
    <div class="modal" tabindex="-1" role="dialog" id="delete" aria-labelledby="deleteModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('employeeDelete', $value['id'])}}" method="get">
                    {{--{{method_field('delete')}}--}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                        <input type="hidden" name="category_id" id="cat_id" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--<script>
        $(document).on('click', '.edit', funtion(){
            var id = $(this).atrr('id');
            $('#form_result').html('');
        });
    </script>--}}
    {{--<script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('click', '#edit-user', function () {
                var user_id = $(this).data('id');
                $.get('ajax-crud/' + user_id +'/edit', function (data) {
                    $('#userCrudModal').html("Edit User");
                    $('#btn-save').val("edit-user");
                    $('#ajax-crud-modal').modal('show');
                    $('#user_id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                })
            });
    </script>--}}
@endsection
