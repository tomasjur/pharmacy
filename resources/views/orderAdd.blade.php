@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div>
                    <div>
                        <center><h2>Add a new order</h2></center>
                        <br>
                        <form method="get" action="{{route('orderAdded')}}">
                            <div class="form-group">
                                <table class="table">
                                    <tr>
                                        <th><label>Supplier</label></th><td><input type="text" name="supplier"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Product</label></th><td><input type="text" name="product"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Quantity</label></th><td><input type="number" name="quantity"></td>
                                    </tr>
                                    <tr>
                                        <th><label>Price</label></th><td><input type="text" name="price"></td>
                                    </tr>
                                    {{--<tr>
                                        <th><label>Working years</label></th><td><input type="number" name="working_years"></td>
                                    </tr>--}}
                                    <tr>
                                        <th colspan="2"><center><button type="submit" class="btn btn-primary">Add</button></center></th>
                                    </tr>
                                </table>
                            </div>
                        </form>
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
