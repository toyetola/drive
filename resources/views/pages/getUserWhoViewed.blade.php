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
                    <div class="mr-auto">
                        <h1>Users who Download</h1>
                    </div>
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
                    <div class="row"><div class="col-lg-12"> <a href="/dashboard" ><button class="btn btn-rounded btn-default btn-lg"><i class="fa fa-arrow-left" style="font-size: xx-large"></i></button> </a></div></div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">The file {{$file}} was downloaded by:
                                    <ul class="actions top-right">
                                        <li><a href="javascript:void(0)" data-q-action="card-expand"><i class="icon dripicons-expand-2"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="recent-transaction-table" class="table " style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Filename</th>
                                                <th>Viewed By</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($downloads as $key=>$download)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$download->filename}}</td>
                                                    @if($download->owner == Auth::user()->id)
                                                        <td>You</td>
                                                    @else
                                                    <td>{{$download->downloaded_by}}</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                {{--Show all files per user begins--}}
                    </div>
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