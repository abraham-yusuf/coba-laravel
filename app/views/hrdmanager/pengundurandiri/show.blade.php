@extends('master')

@section('content')
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
<!-- CKEditor -->
{{ HTML::script('assets/js/plugins/ckeditor/ckeditor.js') }}
<!-- Plupload -->
{{ HTML::style('assets/css/plugins/plupload/jquery.plupload.queue.css') }}  
<!-- PLUpload -->
{{ HTML::script('assets/js/plugins/plupload/plupload.full.js') }}
{{ HTML::script('assets/js/plugins/plupload/jquery.plupload.queue.js') }}
{{ HTML::script('assets/js/plugins/fileupload/bootstrap-fileupload.min.js') }}
<body>
    @include('menu')
    </div>
    <div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
        @include('hrdmanager.left')
        <div id="main">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Pengunduran Diri</h1>
                    </div>
                    <div class="pull-right" style="padding-top:15px">
                        @if($data['pengunduran']->status == 2)
                            <a href="{{ URL::asset('hrdmanager/pengunduran-diri/'.$data['pengunduran']->idpengundurandiri.'/unapprove') }}" class="btn btn-blue btn-large" rel="tooltip" title="Unapprove Pengunduran Diri"><i class="icon-ban-circle"></i> Unapprove Pengunduran Diri</a>
                        @else
                            <a href="{{ URL::asset('hrdmanager/pengunduran-diri/'.$data['pengunduran']->idpengundurandiri.'/approve') }}" class="btn btn-red btn-large" rel="tooltip" title="Approve Pengunduran Diri"><i class="icon-ok-sign"></i> Approve Pengunduran Diri</a>
                            <a href="{{ URL::asset('hrdmanager/pengunduran-diri/'.$data['pengunduran']->idpengundurandiri.'/unapprove') }}" class="btn btn-blue btn-large" rel="tooltip" title="Unapprove Pengunduran Diri"><i class="icon-ban-circle"></i> Unapprove Pengunduran Diri</a>
                        @endif
                                                        
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="{{Url::asset('/')}}">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{Url::asset('hrdmanager/pengunduran-diri')}}">Pengunduran Diri</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Detail Pengunduran Diri</a>
                        </li>
                    </ul>
                    <div class="close-bread">
                        <a href="#"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="post-content">
                            <div style="float:right">
                                <!-- <a href="{{Url::asset('karyawan/pengunduran-diri/delete/'.$data['pengunduran']->idpengundurandiri)}}" class="btn btn-large btn-blue">Batal Pengunduran Diri</a> -->
                            </div>
                            <div class="post-meta">
                                <span class="date">
                                    <h5>Tanggal: {{ date('d M Y', strtotime($data['pengunduran']->tanggalsurat)) }}</h5>
                                </span>
                                <span class="date">
                                    <h5>kepada: {{ $data['pengunduran']->kepada }}</h5>
                                </span>
                                <div class="comments">
                                    <h5>Perihal: {{ $data['pengunduran']->alasan }}</h5>
                                </div>
                            </div>
                            <div class="post-text">
                                {{ $data['pengunduran']->isi }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
@stop