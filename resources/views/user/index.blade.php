@extends('layouts.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .pagination svg {


            width: 20px !important;
        }

        a {
            color: inherit;
        }

        .red {
            opacity: 0.5;
        }
    </style>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUserModal">Add
                            User</button>
                    </div>
                </div>
                <div class="row" style="clear: both;margin-top: 18px;">
                    <div class="col-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr no</th>
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Date of Birth</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="user_{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->dob }}</td>
                                        <td>
                                            <a data-id="{{ $user->id }}" onclick="editUser(event.target)"
                                                class="btn btn-info">Edit</a>
                                            <a class="btn btn-danger" onclick="deleteUser({{ $user->id }})">Delete</a>
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
    <div class="modal fade" id="addUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name" class="col-sm-2">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-2">User Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2">Status</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="status" name="status"
                                placeholder="Enter Status">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2">Date of Birth</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="dob" name="user"
                                placeholder="Enter Date of Birth">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2">Password</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-2">Password Confirmation</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Enter Password Confirmation">
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="addUser()">Save</button>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="editUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="user"
                                placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-2">User Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2">Status</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="status" name="status"
                                placeholder="Enter Status">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2">Date of Birth</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="dob" name="user"
                                placeholder="Enter Date of Birth">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2">Password</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-2">Password Confirmation</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Enter Password Confirmation">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="updateUser()">Save</button>
                </div>
            </div>
        </div>
        <script>
            function addUser() {
                var name = $('#name').val();
                var username = $('#username').val();
                var email = $('#email').val();
                var dob = $('#dob').val();
                var password = $('#password').val();
                var passwordConfirmation = $('#password_confirmation').val();
                var status = $('#status').val();
                let _url = `user/create`;
                let _token = $('meta[name="csrf-token"]').attr('content');


                $.ajax({
                    url: _url,
                    type: "POST",
                    data: {
                        name: name,
                        username: username,
                        email: email,
                        dob: dob,
                        status: status,
                        password: password,
                        password_confimation: passwordConfirmation,
                        _token: _token
                    },
                    success: function(data) {
                        user = data
                        $('table tbody').append(`
                            <tr id="user_${user.id}">
                                <td>${user.id}</td>
                                <td>${ user.name }</td>
                                <td>${ user.username }</td>
                                <td>${ user.email }</td>
                                <td>${ user.dob }</td>
                                <td>${ user.status }</td>
                                <td>
                                    <a data-id="${user.id}" onclick="editUser(${user.id})" class="btn btn-info">Edit</a>
                                    <a data-id="${user.id}" class="btn btn-danger" onclick="deleteUser(${user.id})">Delete</a>
                                </td>
                            </tr>
                        `);

                        $('#name').val('');



                    },

                });
            }

            function deleteUser(id) {
                let url = `/user/${id}`;
                let token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: token
                    },
                    success: function(response) {
                        $("#user_" + id).remove();
                    }
                });
            }

            function editUser(e) {
                console.log(e);
                var id = $(e).data("id");
                console.log(id);
                var name = $("#user_" + id + " td:nth-child(2)").html();
                console.log(name);
                $("#user_id").val(id);
                $("#name").val(name);
                $('#editUserModal').modal('show');
            }

            function updateUser() {
                var name = $('#name').val();
                var id = $('#user_id').val();
                let _url = `/user/${id}`;
                let _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: _url,
                    type: "PUT",
                    data: {
                        name: name,
                        _token: _token
                    },
                    success: function(data) {
                        user = data
                        $("#user_" + id + " td:nth-child(2)").html(user.name);
                        $('#user_id').val('');
                        $('#name').val('');
                        $('#editUserModal').modal('hide');
                    }
                });
            }
        </script>

    @stop
