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
                        <h1>All Folder/Files</h1>
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
                @if($page == 'users')
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">Folders for all users
                                <ul class="actions top-right">
                                    <li><a href="javascript:void(0)" data-q-action="card-expand"><i class="icon dripicons-expand-2"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body">

                                @if(count($indTotal) != 0)
                                <div class="row">
                                @foreach($indTotal as $key=>$value)
                                <a href="/getIndFiles/{{$users[$key]->first_name}}">
                                <div class="col-md-4 col-xl-4 justify-content-center align-content-center">
                                    @if($value !== 0)
                                        {{--<div>--}}
                                            <img src="{{asset('img/foldericon.png')}}" height="80px" width="200px">
                                        {{--</div>--}}
                                        @if(Auth::user()->id == $users[$key]->id )
                                            <label>You ({{$value}} file(s))</label>
                                        @else
                                            <label>{{$users[$key]->first_name}} ({{$value}} file(s))</label>
                                        @endif
                                    @endif
                                </div>
                                </a>
                                @endforeach
                                </div>
                                @else
                                    <div class="col-lg-12">No folders yet</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="row"><div class="col-lg-12"> <a href="/allFiles" ><button class="btn btn-rounded btn-default btn-lg"><i class="fa fa-arrow-left" style="font-size: xx-large"></i></button> </a></div></div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">Files for uploaded by {{$id}}
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
                                                <th>File name</th>
                                                <th>Owner</th>
                                                <th>File Size</th>
                                                <th class="no-sort">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($files as $key=>$file)
                                                <tr>

                                                    <td width="10%">{{$key+1}}</td>
                                                    <td width="30%">
                                                        @if($file->file_type == 'Image')
                                                            <a href="/download/{{$file->filename}}">{{$file->filename}}</a>
                                                        @elseif($file->file_type == 'PDF')
                                                            <a href="/download/pdf/{{$file->filename}}">{{$file->filename}}</a>
                                                        @elseif($file->file_type == 'Word/txt')
                                                            <a href="/download/doc/{{$file->filename}}">{{$file->filename}}</a>
                                                        @elseif($file->file_type == 'Excel')
                                                            <a href="/download/excel/{{$file->filename}}">{{$file->filename}}</a>
                                                        @elseif($file->file_type == 'ZIP')
                                                            <a href="/download/zip/{{$file->filename}}">{{$file->filename}}</a>
                                                        @endif
                                                    </td>
                                                    <td style="width: 20%">{{$file->owner}}</td>
                                                    <td style="font-size: large; width: 10%"><span class="badge badge-pill badge-warning">{{$file->size}} MB</span></td>
                                                    <td width="30%">
                                                        @if($file->file_type == 'Image')
                                                            <a href="/download/{{$file->filename}}" class="btn-primary btn-xs p"> <i class="fa fa-download" style="color: #ffffff !important;"></i>  Download</a>  <a  style="color: #ffffff !important;" href="javascript:void(0)" data-toggle="modal" data-target="#pop" data-link="/download/{{$file->filename}}" class="btn-info btn-xs l"><i class="fa fa-share" style="color: #ffffff !important;"></i>  Share</a>  @if($file->owner == Auth::user()->first_name)<input type="hidden" value="{{$file->file_type}}"><button class="btn-danger btn-xs d"><i class="fa fa-remove" style="color:white"></i> Delete</button>@endif
                                                        @elseif($file->file_type == 'PDF')
                                                            <a href="/download/pdf/{{$file->filename}}" class="btn-primary btn-xs p"><i class="fa fa-download" style="color: #ffffff !important;"></i>  Download</a>  <a style="color: #ffffff !important;" href="javascript:void(0)" data-toggle="modal" data-target="#pop" data-link="/download/pdf/{{$file->filename}}" class="btn-info btn-xs l"><i class="fa fa-share" style="color: #ffffff !important;"></i>  Share</a> @if($file->owner == Auth::user()->first_name)<input type="hidden" value="{{$file->file_type}}"><button class="btn-danger btn-xs d"><i class="fa fa-remove" style="color:white"></i> Delete</button>@endif
                                                        @elseif($file->file_type == 'Word/txt')
                                                            <a href="/download/doc/{{$file->filename}}" class="btn-primary btn-xs p"><i class="fa fa-download" style="color: #ffffff !important;"></i>  Download</a>  <a style="color: #ffffff !important;" href="javascript:void(0)" data-toggle="modal" data-target="#pop" data-link="/download/doc/{{$file->filename}}"  class="btn-info btn-xs l"><i class="fa fa-share" style="color: #ffffff !important;"></i>  Share</a> @if($file->owner == Auth::user()->first_name)<input type="hidden" value="{{$file->file_type}}"><button class="btn-danger btn-xs d"><i class="fa fa-remove" style="color:white"></i> Delete</button>@endif
                                                        @elseif($file->file_type == 'Excel')
                                                            <a href="/download/excel/{{$file->filename}}" class="btn-primary btn-xs"><i class="fa fa-download" style="color: #ffffff !important;"></i>  Download</a>  <a style="color: #ffffff !important;" href="javascript:void(0)" data-toggle="modal" data-target="#pop" data-link="/download/excel/{{$file->filename}}" class="btn-info btn-xs l"><i class="fa fa-share" style="color: #ffffff !important;"></i>  Share</a> @if($file->owner == Auth::user()->first_name)<input type="hidden" value="{{$file->file_type}}"><button class="btn-danger btn-xs d"><i class="fa fa-remove" style="color:white"></i> Delete</button>@endif
                                                        @elseif($file->file_type == 'ZIP')
                                                            <a href="/download/zip/{{$file->filename}}" class="btn-primary btn-xs p"><i class="fa fa-download" style="color: #ffffff !important;"></i>  Download</a>  <a href="javascript:void(0)" style="color: #ffffff !important;" data-toggle="modal" data-target="#pop" data-link="/download/zip/{{$file->filename}}" class="btn-info btn-xs l"><i class="fa fa-share" style="color: #ffffff !important;"></i>  Share</a> @if($file->owner == Auth::user()->first_name)<input type="hidden" value="{{$file->file_type}}"><button class="btn-danger btn-xs d"><i class="fa fa-remove" style="color:white"></i> Delete</button>@endif
                                                        @endif
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
                @endif
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
<script>
    $.ajaxSetup({
        headers:
            {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
$(document).on('click', '.d', function () {

    var u = $(this).closest('tr').find('td:nth-child(2) a').text();
    var t = $(this).prev().val();
    if(confirm("Are you sure you want to delete "+ u)){
        //alert(u+ t);
        //console.log(u);
        $.post('/deleteFile', {filename:u, filetype:t}, function (data) {
            console.log(data);
            if(data == "deleted"){
                alert("File "+ u +" has been deleted");
                location.reload();
            }else if(data == "oops"){
                alert("File "+ u +" does not exist anymore");
                location.reload();
            }else{
                alert("Error ecountered why trying to delete. Try again!");
                location.reload();
            }
        });
    }

});
</script>
</body>
</html>