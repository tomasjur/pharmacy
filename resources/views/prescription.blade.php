@extends('layouts.app')

@section('content')
    {{--<center><a href="{{ route('employeeAdd') }}" class="btn btn-primary" style="width: 50px;
            height: 50px;
            padding: 1px 13px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;"><h1>+</h1></a></center><br>--}}

    <center>
        <svg class="icon icon-lg" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" width="10%" height="15%">
            <path d="M3.938 6.497a6.958 6.958 0 0 0-.702 1.694L0 9v2l3.236.809c.16.6.398 1.169.702 1.694l-1.716 2.861 1.414 1.414 2.86-1.716a6.958 6.958 0 0 0 1.695.702L9 20h2l.809-3.236a6.96 6.96 0 0 0 1.694-.702l2.861 1.716 1.414-1.414-1.716-2.86a6.958 6.958 0 0 0 .702-1.695L20 11V9l-3.236-.809a6.958 6.958 0 0 0-.702-1.694l1.716-2.861-1.414-1.414-2.86 1.716a6.958 6.958 0 0 0-1.695-.702L11 0H9l-.809 3.236a6.96 6.96 0 0 0-1.694.702L3.636 2.222 2.222 3.636l1.716 2.86zM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill-rule="evenodd">

            </path>
        </svg>
        <h2>This website is under construction!</h2>
    </center>
    {{--<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div>
                    --}}{{--<div class="card-header">Dashboard</div>--}}{{--

                    <div>
                        --}}{{--{{json_encode($data)}}--}}{{--
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
                                        <a href="javascript:void(0)" id="edit-user" data-id="{{ $value['id'] }}"
                                           class="btn btn-warning">Edit</a>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
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
