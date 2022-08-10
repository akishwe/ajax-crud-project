@extends('layouts.app')
@section('content')

    <div class="container">
        <!-- main app container -->
        <div class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">


                        <div id="errors-list"></div>
                        <form method="post" id="handleAjax" action="{{ url('do-login') }}" name="postform">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" />
                                @csrf
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function() {

                $(document).on("submit", "#handleAjax", function() {
                    var e = this;

                    $(this).find("[type='submit']").html("LOGIN...");

                    $.post($(this).attr('action'), $(this).serialize(), function(data) {

                        $(e).find("[type='submit']").html("LOGIN");
                        if (data.status) {
                            window.location = data.redirect_location;
                        }
                    }).fail(function(response) {

                        $(e).find("[type='submit']").html("LOGIN");
                        $(".alert").remove();
                        var erroJson = JSON.parse(response.responseText);
                        for (var err in erroJson) {
                            for (var errstr of erroJson[err])
                                $("#errors-list").append("<div class='alert alert-danger'>" + errstr +
                                    "</div>");
                        }

                    });
                    return false;
                });
            });
        </script>


    @stop
