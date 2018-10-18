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
                    <h1>Dashboard</h1>
                </div>
                <div><button class="btn btn-info btn-rounded btn-floating btn-lg" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-upload" style="color:#ffffff;"></i> Upload file</button> </div>
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
        @include('includes.messages')
        <section class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row m-0 col-border-xl">
                            @if(Auth::user()->role == "Creator")
                                    <div class="col-md-12 col-lg-6 col-xl-4">
                            @else
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                            @endif
                                <div class="card-body">
                                    <div class="icon-rounded icon-rounded-primary float-left m-r-20">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <a href="/allFiles">
                                    <h5 class="card-title m-b-5 counter" data-count="{{count($totalFiles)}}">0</h5>
                                    <h6 class="text-muted m-t-10">
                                        Total Files
                                    </h6>
                                    </a>
                                    {{--<div class="progress progress-active-sessions mt-4" style="height:7px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>--}}
                                    {{--<small class="text-muted float-left m-t-5 mb-3">--}}
                                        {{--Change--}}
                                    {{--</small>--}}
                                    <small class="text-muted float-right m-t-5 mb-3 counter" data-count="{{count($totalFiles)}}">
                                        0
                                    </small>
                                </div>
                            </div>
                            @if(Auth::user()->role == "Creator")
                                 <div class="col-md-12 col-lg-6 col-xl-4">
                            @else
                                 <div class="col-md-12 col-lg-6 col-xl-6">
                            @endif
                                <div class="card-body">
                                    <div class="icon-rounded icon-rounded-accent float-left m-r-20">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <a href="/getIndFiles/{{Auth::user()->first_name}}">
                                    <h5 class="card-title m-b-5 counter" data-count="{{count($files)}}">0</h5>
                                    <h6 class="text-muted m-t-10">
                                        Your files
                                    </h6>
                                    </a>
                                    {{--<div class="progress progress-add-to-cart mt-4" style="height:7px;">
                                        <div class="progress-bar bg-accent" role="progressbar" style="" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>--}}
                                    {{--<small class="text-muted float-left m-t-5 mb-3">
                                        Change
                                    </small>--}}
                                    <small class="text-muted float-right m-t-5 mb-3 counter" data-count="{{count($files)}}">
                                        0
                                    </small>
                                </div>
                            </div>
                            {{--<div class="col-md-12 col-lg-6 col-xl-3">
                                <div class="card-body">
                                    <div class="icon-rounded icon-rounded-info float-left m-r-20">
                                        <i class="icon dripicons-mail"></i>
                                    </div>
                                    <h5 class="card-title m-b-5 counter" data-count="337">0</h5>
                                    <h6 class="text-muted m-t-10">
                                        Newsletter Sign Ups
                                    </h6>
                                    <div class="progress progress-new-account mt-4" style="height:7px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small class="text-muted float-left m-t-5 mb-3">
                                        Change
                                    </small>
                                    <small class="text-muted float-right m-t-5 mb-3 counter append-percent" data-count="83">
                                        0
                                    </small>
                                </div>
                            </div>--}}
                            @if(Auth::user()->role == "Creator")
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <a href="/users">
                                <div class="card-body">
                                    <div class="icon-rounded icon-rounded-success float-left m-r-20">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <h5 class="card-title m-b-5  counter" data-count="{{$user}}">0</h5>
                                    <h6 class="text-muted m-t-10">
                                        Number of users
                                    </h6>
                                    {{--<div class="progress progress-total-revenue mt-4" style="height:7px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>--}}
                                    {{--<small class="text-muted float-left m-t-5 mb-3">
                                        Change
                                    </small>--}}
                                    {{--<small class="text-muted float-right m-t-5 mb-3 counter append-percent" data-count="77">--}}
                                        {{--0--}}
                                    {{--</small>--}}
                                </div>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xl-9">
                    <div class="card">
                        <div class="card-header">Your Files
                            <ul class="actions top-right">
                                <li><a href="javascript:void(0)" data-q-action="card-expand"><i class="icon dripicons-expand-2"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="preloader pl-xs pls-primary">
                                <svg class="pl-circular" viewBox="25 25 50 50">
                                    <circle class="plc-path" cx="50" cy="50" r="20"></circle>
                                </svg>
                            </div>
                            <div class="table-responsive">
                                <table id="recent-transaction-table" class="table " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>File name</th>
                                        <th>Downloads</th>
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
                                        <td width="10%"><a href="/viewDownloads/{{$file->filename}}">{{$file->downloads}}</a></td>
                                        {{--<span class="badge badge-pill badge-warning"></span>--}}
                                        <td width="20%" style="">{{$file->size}} MB</td>
                                        <td width="30%" style="color: #ffffff !important;">
                                            @if($file->file_type == 'Image')
                                                <a href="/download/{{$file->filename}}" class="btn-primary btn-xs p"> <i class="fa fa-download" style="color: #ffffff !important;"></i>  Download</a>  <a  style="color: #ffffff !important;" href="javascript:void(0)" data-toggle="modal" data-target="#pop" data-link="/download/{{$file->filename}}" class="btn-info btn-xs l"><i class="fa fa-share" style="color: #ffffff !important;"></i>  Share</a>
                                            @elseif($file->file_type == 'PDF')
                                                <a href="/download/pdf/{{$file->filename}}" class="btn-primary btn-xs p"><i class="fa fa-download" style="color: #ffffff !important;"></i>  Download</a>  <a style="color: #ffffff !important;" href="javascript:void(0)" data-toggle="modal" data-target="#pop" data-link="/download/pdf/{{$file->filename}}" class="btn-info btn-xs l"><i class="fa fa-share" style="color: #ffffff !important;"></i>  Share</a>
                                            @elseif($file->file_type == 'Word/txt')
                                                <a href="/download/doc/{{$file->filename}}" class="btn-primary btn-xs p"><i class="fa fa-download" style="color: #ffffff !important;"></i>  Download</a>  <a style="color: #ffffff !important;" href="javascript:void(0)" data-toggle="modal" data-target="#pop" data-link="/download/doc/{{$file->filename}}"  class="btn-info btn-xs l"><i class="fa fa-share" style="color: #ffffff !important;"></i>  Share</a>
                                            @elseif($file->file_type == 'Excel')
                                                <a href="/download/excel/{{$file->filename}}" class="btn-primary btn-xs"><i class="fa fa-download" style="color: #ffffff !important;"></i>  Download</a>  <a style="color: #ffffff !important;" href="javascript:void(0)" data-toggle="modal" data-target="#pop" data-link="/download/excel/{{$file->filename}}" class="btn-info btn-xs l"><i class="fa fa-share" style="color: #ffffff !important;"></i>  Share</a>
                                            @elseif($file->file_type == 'ZIP')
                                                <a href="/download/zip/{{$file->filename}}" class="btn-primary btn-xs p"><i class="fa fa-download" style="color: #ffffff !important;"></i>  Download</a>  <a href="javascript:void(0)" style="color: #ffffff !important;" data-toggle="modal" data-target="#pop" data-link="/download/zip/{{$file->filename}}" class="btn-info btn-xs l"><i class="fa fa-share" style="color: #ffffff !important;"></i>  Share</a>
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
                <div class="col-xl-3 col-xxl-3">
                    <div class="card">
                        <h5 class="card-header">Recent Uploads
                            <div class="actions top-right">

                                <div class="dropdown">
                                    <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="la la-ellipsis-h"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right animation" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </h5>
                        <div class="card-body">
                            <div class="timeline timeline-border">
                                {{--<div class="timeline-list">
                                    <div class="timeline-info">
                                        <div class="d-inline-block">Server pending</div>
                                        <small class="float-right text-muted">Now</small>
                                    </div>
                                </div>--}}
                                @if(count($files) != 0)
                                @for($i=0; $i< sizeof($files); $i++)
                                    @if($i < 4)
                                        <div class="timeline-list timeline-border timeline-primary">
                                            <div class="timeline-info">
                                                <div class="d-inline-block">{{$files[$i]->filename}}</div>
                                                <small class="float-right text-muted">{{date('M, j Y', strtotime($files[$i]->created_at))}}</small>
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                                    @else
                                    <div class="col-lg-12">No recent file upload</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


            </div>
        </section>
        <!--END PAGE CONTENT -->
    </div>
    <!-- SIDEBAR QUICK PANNEL WRAPPER -->
    {{--<aside class="sidebar sidebar-right">--}}
        {{--<div class="sidebar-content">--}}
            {{--<div class="tab-panel m-b-30" id="sidebar-tabs">--}}
                {{--<ul class="nav nav-tabs primary-tabs">--}}
                    {{--<li class="nav-item" role="presentation"><a href="#sidebar-settings" class="nav-link active show" data-toggle="tab" aria-expanded="true">Settings</a></li>--}}
                    {{--<li class="nav-item" role="presentation"><a href="#sidebar-contact" class="nav-link" data-toggle="tab" aria-expanded="true">Contacts</a></li>--}}
                {{--</ul>--}}
                {{--<div class="tab-content">--}}
                    {{--<div class="tab-pane fadeIn active" id="sidebar-settings">--}}
                        {{--<!-- START THEME OPTIONS WRAPPER -->--}}
                        {{--<section class="sidebar-settings-wrapper">--}}
                            {{--<h5 class="m-t-30 m-b-20">Colors with dark menu</h5>--}}
                            {{--<div class="row m-0">--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<!-- THEME OPTION "A" theme-a.css -->--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<h6 class="title text-center">theme-a.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-a.css">--}}
                                            {{--<input type="radio" name="setting-theme" checked="checked">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                              {{--<span class="color bg-theme-a "></span>--}}
													                            {{--<span class="color bg-menu-dark"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<!-- THEME OPTION "B" theme-b.css -->--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<h6 class="title text-center">theme-b.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-b.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                              {{--<span class="color bg-theme-b"></span>--}}
													                            {{--<span class="color bg-menu-dark"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<!-- THEME OPTION "C" theme-c.css -->--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<h6 class="title text-center">theme-c.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-c.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                                {{--<span class="color bg-theme-c"></span>--}}
													                            {{--<span class="color bg-menu-dark"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "D" theme-d.css -->--}}
                                        {{--<h6 class="title text-center">theme-d.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-d.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                              {{--<span class="color bg-theme-d"></span>--}}
													                            {{--<span class="color bg-menu-dark"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "E" theme-e.css -->--}}
                                        {{--<h6 class="title text-center">theme-e.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-e.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                              {{--<span class="color bg-theme-e"></span>--}}
													                            {{--<span class="color bg-menu-dark"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "F" theme-f.css -->--}}
                                        {{--<h6 class="title text-center">theme-f.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-f.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                              {{--<span class="color bg-theme-f"></span>--}}
													                            {{--<span class="color bg-menu-dark"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "G" theme-g.css -->--}}
                                        {{--<h6 class="title text-center">theme-g.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-g.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                            {{--<span class="color bg-theme-g"></span>--}}
													                            {{--<span class="color bg-menu-dark"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "H" theme-h.css -->--}}
                                        {{--<h6 class="title text-center">theme-h.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-h.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                              {{--<span class="color bg-theme-h"></span>--}}
													                            {{--<span class="color bg-menu-dark"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<h5 class="m-t-30 m-b-20">Colors with light menu</h5>--}}
                            {{--<div class="row m-0">--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "I" theme-i.css -->--}}
                                        {{--<h6 class="title text-center">theme-i.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-i.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                            {{--<span class="color bg-menu-dark"></span>--}}
													                            {{--<span class="color bg-menu-light"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "J" theme-j.css -->--}}
                                        {{--<h6 class="title text-center">theme-j.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-j.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                                {{--<span class="color bg-theme-j"></span>--}}
													                            {{--<span class="color bg-menu-light"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "K" theme-k.css -->--}}
                                        {{--<h6 class="title text-center">theme-k.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-k.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                              {{--<span class="color bg-theme-k"></span>--}}
													                            {{--<span class="color bg-menu-light"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "L" theme-l.css -->--}}
                                        {{--<h6 class="title text-center">theme-l.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-l.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                            {{--<span class="color bg-theme-l"></span>--}}
													                            {{--<span class="color bg-menu-light"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "M" theme-m.css -->--}}
                                        {{--<h6 class="title text-center">theme-m.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-m.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                            {{--<span class="color bg-theme-m"></span>--}}
													                            {{--<span class="color bg-menu-light"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "N" theme-n.css -->--}}
                                        {{--<h6 class="title text-center">theme-n.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-n.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                            {{--<span class="color bg-theme-n"></span>--}}
													                            {{--<span class="color bg-menu-light"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "O" theme-o.css -->--}}
                                        {{--<h6 class="title text-center">theme-o.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-o.css">--}}
                                            {{--<input type="radio" name="setting-theme">--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                            {{--<span class="color bg-theme-o"></span>--}}
													                            {{--<span class="color bg-menu-light"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-md-3 p-5 m-b-10">--}}
                                    {{--<div class="color-option-check">--}}
                                        {{--<!-- THEME OPTION "P" theme-p.css -->--}}
                                        {{--<h6 class="title text-center">theme-p.css</h6>--}}
                                        {{--<label data-load-css="../assets/css/layouts/horizontal/themes/theme-p.css">--}}
                                            {{--<input type="radio" name="setting-theme" />--}}
                                            {{--<span class="icon-check"></span>--}}
                                            {{--<span class="split">--}}
													                              {{--<span class="color bg-theme-p"></span>--}}
													                            {{--<span class="color bg-menu-light"></span>--}}
													                          {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</section>--}}
                        {{--<!-- END THEME OPTIONS WRAPPER -->--}}
                        {{--<section>--}}
                            {{--<h5 class="m-t-30 m-b-20">Layouts</h5>--}}
                            {{--<ul class="list-reset">--}}
                                {{--<li>--}}
                                    {{--<div class="custom-control custom-radio radio-primary form-check">--}}
                                        {{--<input type="radio" id="layoutStatic" name="layoutMode" class="custom-control-input" checked="checked" value="">--}}
                                        {{--<label class="custom-control-label" for="layoutStatic">Static Layout</label>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<div class="custom-control custom-radio radio-primary form-check">--}}
                                        {{--<input type="radio" id="layoutFixed" name="layoutMode" class="custom-control-input" value="layout-fixed">--}}
                                        {{--<label class="custom-control-label" for="layoutFixed">Fixed Layout</label>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</section>--}}
                    {{--</div>--}}
                   {{-- <div class="tab-pane" id="sidebar-contact">--}}
                        {{--<div class="search-wrapper m-b-30">--}}
                            {{--<button type="submit" class="search-button-submit"><i class="icon dripicons-search site-search-icon"></i></button>--}}
                            {{--<input type="text" class="form-control search-input no-focus-border" placeholder="Search contacts...">--}}
                            {{--<a href="javascript:void(0)" class="close-search-button" data-q-action="close-site-search">--}}
                                {{--<i class="icon dripicons-cross site-search-close-icon"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<section class="qt-scroll" data-scroll="minimal-dark">--}}
                            {{--<div class="list-view-group-header">a</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="John Smith">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/01.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Abby Pugh</div>--}}
                                        {{--<div class="list-group-item-text">New York, NY</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/06.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Allison Selleck</div>--}}
                                        {{--<div class="list-group-item-text">Seattle, WA</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">b</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/07.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Bently Hinton</div>--}}
                                        {{--<div class="list-group-item-text">Denver, CO</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/11.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Brad Friedman </div>--}}
                                        {{--<div class="list-group-item-text">Palo Alto, Ca</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="John Smith">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/02.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Boston Nather</div>--}}
                                        {{--<div class="list-group-item-text">New York, NY</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/16.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Brayan Bunnell</div>--}}
                                        {{--<div class="list-group-item-text">Seattle, WA</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">c</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/08.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Carter Titchen</div>--}}
                                        {{--<div class="list-group-item-text">Denver, CO</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/13.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Carla Fraser </div>--}}
                                        {{--<div class="list-group-item-text">Palo Alto, Ca</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">d</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="John Smith">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/03.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">David Petrie</div>--}}
                                        {{--<div class="list-group-item-text">New York, NY</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">e</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/12.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Ellie Sweetser</div>--}}
                                        {{--<div class="list-group-item-text">Seattle, WA</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/09.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Eric Eskridge</div>--}}
                                        {{--<div class="list-group-item-text">Denver, CO</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">f</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="John Smith">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/04.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Farrah Yulikova</div>--}}
                                        {{--<div class="list-group-item-text">New York, NY</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/05.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Florence Buren</div>--}}
                                        {{--<div class="list-group-item-text">Seattle, WA</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/14.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Francesca Koehn </div>--}}
                                        {{--<div class="list-group-item-text">Palo Alto, Ca</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">g</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/10.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Glynn Slade</div>--}}
                                        {{--<div class="list-group-item-text">Denver, CO</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">h</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/14.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Haley Molaroni </div>--}}
                                        {{--<div class="list-group-item-text">Palo Alto, Ca</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">i</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="John Smith">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/07.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Isaac Seldin</div>--}}
                                        {{--<div class="list-group-item-text">New York, NY</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/13.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Ivy Dancelli</div>--}}
                                        {{--<div class="list-group-item-text">Seattle, WA</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">j</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/18.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Jax Scharf</div>--}}
                                        {{--<div class="list-group-item-text">Denver, CO</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/17.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Jen Pritsinas </div>--}}
                                        {{--<div class="list-group-item-text">Palo Alto, Ca</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">m</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/20.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Marco Heginbotham</div>--}}
                                        {{--<div class="list-group-item-text">Denver, CO</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/21.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Marisa Gelber </div>--}}
                                        {{--<div class="list-group-item-text">Palo Alto, Ca</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">p</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/22.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Penny Withka</div>--}}
                                        {{--<div class="list-group-item-text">Denver, CO</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/23.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Pixie Clayborne </div>--}}
                                        {{--<div class="list-group-item-text">Palo Alto, Ca</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">s</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/25.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Sheldon Luntz</div>--}}
                                        {{--<div class="list-group-item-text">Denver, CO</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/26.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Sam Kendall </div>--}}
                                        {{--<div class="list-group-item-text">Palo Alto, Ca</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="list-view-group-header">z</div>--}}
                            {{--<ul class="list-group p-0">--}}
                                {{--<li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">--}}
                                    {{--<span class="float-left"><img src="../assets/img/avatars/27.jpg" alt="" class="rounded-circle max-w-50 m-r-10"></span>--}}
                                    {{--<i class="badge mini success status"></i>--}}
                                    {{--<div class="list-group-item-body">--}}
                                        {{--<div class="list-group-item-heading">Zack Mohanram</div>--}}
                                        {{--<div class="list-group-item-text">Denver, CO</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</section>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</aside>--}}
    <!-- END SIDEBAR QUICK PANNEL WRAPPER -->

        {{--MODAL--}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="fa fa-close"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/upload" method="post" enctype="multipart/form-data" class="" id="fileTypeValidation">
                            {{--dropzone dz-clickable--}}
                            {{csrf_field()}}
                            <label>Choose file to upload, You can select Multiple files*</label>
                            <input type="file" name="file[]" multiple>
                            <input type="submit" class="btn btn-info" value="Upload">

                            {{--<div class="dz-message needsclick fileTypeValidation">--}}
                                {{--<h6 class="card-title text-center p-t-50">Drop files here or click to upload.</h6>--}}
                                {{--<i class="icon dripicons-cloud-upload gradient-3"></i>--}}
                                {{--<div class="d-block text-center">--}}
                                    {{--<button type="button" class="btn btn-info btn-rounded btn-floating btn-lg">Upload</button>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        </form>
                        {{--<form action="/upload"
                              class="dropzone"
                              id="fileTypeValidation"></form>--}}
                        <{{--form action="/upload" method="post" enctype="multipart/form-data"
                              class="dropzone dz-clickable"
                              id="fileTypeValidation">{{csrf_field()}}<div class="fallback">
                                <input name="file" type="file" multiple />
                            </div></form>--}}
                    </div>
                    <div class="modal-footer">
                        {{--<button type="button" class="btn btn-secondary btn-outline" data-dismiss="modal">Close</button>--}}
                        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    </div>
                </div>
            </div>
        </div>
        {{--MDAL END--}}

        {{--MODAL2--}}
        <div class="modal fade" id="pop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Copy the link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="fa fa-close"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="shareIt">
                    </div>
                    <div class="modal-footer">
                        {{--<button type="button" class="btn btn-secondary btn-outline" data-dismiss="modal">Close</button>--}}
                        <button type="button" class="btn btn-primary" id="copy"><i class="fa fa-copy" style="color: white;font-size: larger"></i> </button>
                    </div>
                </div>
            </div>
        </div>
        {{--END MODAL 2--}}
</div>
</div>
@include('footer.footerassets')
<script>
    $(document).on('click', '.l', function(){
        var kl = $(this).data('link');
//        alert(kl);
        $('#shareIt').val('http://localhost:8000'+kl);
    });

    $('#copy').click(function () {
        /* $('').val();*/
        var g = $('#shareIt').val();
        $('#shareIt').select();
        document.execCommand("copy");
        if(document.execCommand("copy")) {
            alert('copied');
        }else{
            alert('cannot copy');
        }
    })

    $('.pl-xs').hide();

    $(document).on('click','.fa-download', function(){
        $('.pl-xs').show();
    });

</script>
</body>
</html>