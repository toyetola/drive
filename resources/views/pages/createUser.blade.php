<!DOCTYPE html>
<html lang="en">
@include('header.headerassets')
<body class="layout-horizontal menu-auto-hide">
<!-- START APP WRAPPER -->
<div id="app">
    @include('header.header')
    <div class="content-wrapper">
        <div class="content container">
            <!--START PAGE HEADER -->
            <header class="page-header">
                <div class="d-flex align-items-center">
                    @if(Auth::user()->role=="Creator")
                    <div class="mr-auto">
                        <h1>Add User</h1>
                    </div>
                    @endif
                    {{--<div><button class="btn btn-success btn-rounded btn-floating" data-toggle="modal" data-target="#exampleModalCenter">Upload file</button> </div>--}}
                    {{--<ul class="actions top-right">--}}
                    {{--<li class="dropdown">--}}
                    {{--<a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">--}}
                    {{--<i class="la la-ellipsis-h"></i>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu dropdown-icon-menu dropdown-menu-right">--}}
                    {{--<div class="dropdown-header">--}}
                    {{--Quick Actions--}}
                    {{--</div>--}}
                    {{--<a href="#" class="dropdown-item">--}}
                    {{--<i class="icon dripicons-clockwise"></i> Refresh--}}
                    {{--</a>--}}
                    {{--<a href="#" class="dropdown-item">--}}
                    {{--<i class="icon dripicons-gear"></i> Manage Widgets--}}
                    {{--</a>--}}
                    {{--<a href="#" class="dropdown-item">--}}
                    {{--<i class="icon dripicons-cloud-download"></i> Export--}}
                    {{--</a>--}}
                    {{--<a href="#" class="dropdown-item">--}}
                    {{--<i class="icon dripicons-help"></i> Support--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                </div>
            </header>
            <!--END PAGE HEADER -->
            <!--START PAGE CONTENT -->

            <section class="page-content">
                    @include('includes.messages')
                    <div class="row">
                        @if(Auth::user()->role == "Creator")
                        <div class="col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-header">Add User
                                    <ul class="actions top-right">
                                        <li><a href="javascript:void(0)" data-q-action="card-expand"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </div>
                                <form action="/addUser" method="post">
                                <div class="card-body">

                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp1" autocomplete="email" name="email" placeholder="User email address">
                                                {{--<small id="emailHelp3" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                            </div>
                                            <div class="form-group">
                                                <label >First Name</label>
                                                    <input type="text" placeholder="User first name" class="form-control" autocomplete="given-name" name="firstname" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                    <input type="text" placeholder="User last name" class="form-control" autocomplete="given-name" name="lastname">
                                            </div>
                                            <div class="form-group">
                                                <label >Create a Username</label>
                                                    <input type="text" placeholder="Create a username" class="form-control" autocomplete="given-name" name="username" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Create a default Password</label> (<small>Can be changed by the user</small>*)
                                                <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password" name="password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Give User Role</label>
                                                <select class="form-control" name="role" required>
                                                    <option value="User">User</option>
                                                    <option value="Creator">Admin</option>
                                                </select>
                                            </div>


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        @endif
                            <div class="col-lg-6 col-xl-6">
                                <div class="mr-auto">
                                    <h4>Change Your Password</h4>
                                </div>
                                <div class="card">
                                    <div class="card-header">Change Passsword
                                        <ul class="actions top-right">
                                            <li><a href="javascript:void(0)" data-q-action="card-expand"><i class="fa fa-expand"></i></a></li>
                                        </ul>
                                    </div>
                                    <form action="/changePassword" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label> Username</label>
                                            <input type="text" placeholder="Username" class="form-control" autocomplete="given-name" value="{{Auth::user()->username}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" placeholder="Old Password" class="form-control" autocomplete="given-name" name="oldpassword">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" placeholder="New password" class="form-control" autocomplete="given-name" name="newpassword">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                    </div>

                {{--Show all files per user begins--}}

            </section>
            <!--END PAGE CONTENT -->
        </div>


        {{--MODAL--}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="zmdi zmdi-close"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/file-upload" method="post" class="dropzone dz-clickable" id="fileTypeValidation">
                            <div class="dz-message needsclick fileTypeValidation">
                                <h6 class="card-title text-center p-t-50">Drop files here or click to upload.</h6>
                                <i class="icon dripicons-cloud-upload gradient-3"></i>
                                <div class="d-block text-center">
                                    <button type="button" class="btn btn-info btn-rounded btn-floating btn-lg">Upload</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{--MDAL END--}}
    </div>
</div>
@include('footer.footerassets')
</body>
</html>