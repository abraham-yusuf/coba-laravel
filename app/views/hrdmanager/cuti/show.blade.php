@extends('master')

@section('content')

<body>
    @include('menu')
    </div>
    <div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
        @include('hrdmanager.left')
        <div id="main">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Detail Cuti</h1>
                    </div>
                    <!-- <div class="pull-right" style="padding-top:15px">
                    	<a href="{{ Url::asset('hrdstaff/job-vacancy/create') }}" role="button" class="btn btn-brown btn-large"><i class="icon-plus"></i>Cetak Surat Cuti</a>
					</div> -->
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="{{Url::asset('hrdstaff/')}}">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{Url::asset('hrdstaff/cuti')}}">Cuti</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Detail Cuti</a>
                        </li>
                    </ul>
                    <div class="close-bread">
                        <a href="#"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3>{{ $data['cuti']->karyawan->user->nama_lengkap }}</h3>
                            </div>
                            <div class="box-content nopadding" style="padding-top:15px">
                               <table class="table table-striped table-invoice">
                                    <tr>
                                        <td><strong>No. Karyawan</strong></td>
                                        <td colspan="3">{{ $data['cuti']->karyawan->nokaryawan }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Cuti</strong></td>
                                        <td colspan="3"><strong>Dari :</strong> {{ date('d M Y', strtotime($data['cuti']->tanggalmulai)) }} <strong>Sampai :</strong> {{ date('d M Y', strtotime($data['cuti']->tanggalselesai)) }} <strong>Selama :</strong> {{$data['cuti']->range}} Hari</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Alasan</strong></td>
                                        <td colspan="3">
                                            @if($data['cuti']->alasan == 1)
                                                Cuti
                                            @elseif($data['cuti']->alasan == 2)
                                                Cuti Melahirkan
                                            @elseif($data['cuti']->alasan == 3)
                                                Sakit
                                            @elseif($data['cuti']->alasan == 4)
                                                Berduka Cita
                                            @elseif($data['cuti']->alasan == 5)
                                                Pernikahan
                                            @elseif($data['cuti']->alasan == 6)
                                                Khitanan/Baptis
                                            @else
                                                Cuti
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Surat Dokter</strong></td>
                                        <td colspan="3">{{ $data['cuti']->suratdokter == 1 ? 'Ada' : 'Tidak' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pengganti</strong></td>
                                        <td colspan="3">{{ $data['cuti']->penggantiCuti->user->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status</strong></td>
                                        <td colspan="3">
                                            @if($data['cuti']->status == 0)
                                                <span class="btn btn-small btn-inverse">Waiting</span>
                                            @elseif(($data['cuti']->status == 2) OR ($data['cuti']->status == 3) OR ($data['cuti']->status == 4) ) 
                                                <span class="btn btn-small btn-inverse btn-blue">Approve</span>
                                            @else
                                                <span class="btn btn-small btn-inverse btn-red">Unapprove</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td colspan=4><center><h4><strong>Detail Cuti</strong></h4></center></td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Detail</strong></td>
                                    	<td><strong>Dari</strong></td>
                                    	<td><strong>Sampai</strong></td>
                                    	<td><strong>Alasan</strong></td>
                                    </tr>
                                    @foreach($data['listcuti'] as $listcuti)
                                    <tr>
                                    	<td><a href="{{URL::asset('hrdmanager/cuti/'.$listcuti->idcuti)}}" class="btn" rel="tooltip" title="Detail Cuti"><i class="icon-search"></i></a></td>
                                    	<td>{{ date('d M Y', strtotime($listcuti->tanggalmulai)) }}</td>
                                    	<td>{{ date('d M Y', strtotime($listcuti->tanggalselesai)) }}</td>
                                    	<td>
                                             @if($listcuti->alasan == 1)
                                                Cuti
                                            @elseif($listcuti->alasan == 2)
                                                Cuti Melahirkan
                                            @elseif($listcuti->alasan == 3)
                                                Sakit
                                            @elseif($listcuti->alasan == 4)
                                                Berduka Cita
                                            @elseif($listcuti->alasan == 5)
                                                Pernikahan
                                            @elseif($listcuti->alasan == 6)
                                                Khitanan/Baptis
                                            @else
                                                Cuti
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
											<td colspan="3"></td>
											<td class="taxes">
												<p>
													<span class="light">Total Hari</span>
													<span class="totalprice">
														{{ $data['totalcuti'] }}
													</span>
												</p>
												<p>
													<span class="light">Sisa Hari</span>
													<span class="totalprice">
														{{ ($data['settingcuti']->jumlahhari)-($data['totalcuti']) }}
													</span>
												</p>
											</td>
										</tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div></div></div>
@stop