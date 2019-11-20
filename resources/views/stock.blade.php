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

                    <div>
                        {{--{{json_encode($data)}}--}}
                        <table class="table">
                            {{--<tr>
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
                                        <a href="javascript:void(0)" id="edit-user" data-id="{{ $value['id'] }}"
                                           class="btn btn-warning">Edit</a>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
