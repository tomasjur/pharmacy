@extends('layouts.app')

@section('content')
    {{--<center><a href="{{ route('add-employee') }}" class="btn btn-primary" style="width: 50px;
            height: 50px;
            padding: 1px 13px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;"><h1>+</h1></a></center><br>--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div>
                    <div>
                        <center><h2>Edit employee</h2></center>
                        <br>
                        <form method="get" action="{{route('employeeEdited', $employee->id)}}">
                            <div class="form-group">
                                <table class="table">
                                    <tr>
                                        <th><label>First Name</label></th><td><input type="text" name="first_name" value="{{$employee->first_name}}"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Last Name</label></th><td><input type="text" name="last_name" value="{{$employee->last_name}}"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Phone</label></th><td><input type="tel" name="phone" value="{{$employee->phone}}"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Email</label></th><td><input type="email" name="email" value="{{$employee->email}}"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Working years</label></th><td><input type="number" name="working_years" value="{{$employee->working_years}}"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><center><button type="submit" class="btn btn-primary">Update</button></center></th>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
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
