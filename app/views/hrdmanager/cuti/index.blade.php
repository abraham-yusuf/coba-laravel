@extends('master')

@section('content')

<script type="text/javascript">
	 $(document).ready(function() { 
        $("#okHapus").click(function() {  
            var i = $("#id").val();
            var url = "cuti/delete/"+i;    
            $(location).attr('href',url);
        });
    });
	function hapusAction(data){
        $("#id").val(data);
        $('#dialogHapus').modal('show');
    } 
</script>

<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('hrdmanager.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Cuti</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdmanager/cuti')}}">Cuti</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				@if($cek = Session::get('success'))
					<div class="alert alert-success" style="margin-top:15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Berhasil!</strong>
                        {{ Session::get('success') }}
                    </div>
				@endif
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th width="5%">No</th>
											<th>Tanggal Mulai</th>
											<th>Tanggal Selesai</th>
											<th width="10%">No. Karyawan</th>
											<th width="20%">Nama Lengkap</th>
											<th width="10%">Alasan</th>
											<th width="7%">Range</th>
											<th width="20%">Status</td>
											<th width="30%">Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['cuti'] as $cuti)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($cuti->tanggalmulai)) }}</td>
												<td>{{ date("d M Y", strtotime($cuti->tanggalselesai)) }}</td>
												<td>{{$cuti->nokaryawan}}</td>
												<td>{{$cuti->karyawan->user->nama_lengkap}}</td>
												<td>
													@if($cuti->alasan == 1)
		                                                Cuti
		                                            @elseif($cuti->alasan == 2)
		                                                Cuti Melahirkan
		                                            @elseif($cuti->alasan == 3)
		                                                Sakit
		                                            @elseif($cuti->alasan == 4)
		                                                Berduka Cita
		                                            @elseif($cuti->alasan == 5)
		                                                Pernikahan
		                                            @elseif($cuti->alasan == 6)
		                                                Khitanan/Baptis
		                                            @else
		                                                Cuti
		                                            @endif
												</td>
												<td>{{$cuti->range}}</td>
												<td>
													@if($cuti->status == 0)
														<span class="btn btn-small btn-inverse">Waiting</span>
													@elseif(($cuti->status == 2) OR ($cuti->status == 3) OR ($cuti->status == 4) ) 
														<span class="btn btn-small btn-inverse btn-blue">Approve</span>
													@else
														<span class="btn btn-small btn-inverse btn-red">Unapprove</span>
													@endif
												</td>
												<td class='hidden-480'>
													<center>
														@if(date('Y-m-d') < $cuti->tanggalmulai)
															@if($cuti->status == 0)
																<a href="{{URL::asset('hrdmanager/approve-cuti/'.$cuti->idcuti)}}" class="btn btn-blue" rel="tooltip" title="Approve Cuti"><i class="icon-ok-sign"></i></a>
																<a href="{{URL::asset('hrdmanager/unapprove-cuti/'.$cuti->idcuti)}}" class="btn btn-red" rel="tooltip" title="Unapprove Cuti"><i class=" icon-ban-circle"></i></a>
															@endif
														@endif														
														<a href="{{URL::asset('hrdmanager/cuti/'.$cuti->idcuti)}}" class="btn" rel="tooltip" title="Detail Cuti"><i class="icon-search"></i></a>
													</center>
												</td>
											</tr>
											<?php $i++; ?>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div id="dialogHapus" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	    <h3 id="myModalLabel1">Konfirmasi</h3>
	</div>
	<div class="modal-body">
	    Apakah yakin untuk membatalkan cuti?
	    <input type="hidden" id="id" />
	</div>
	<div class="modal-footer">
	    <button class="btn btn-green" data-dismiss="modal" aria-hidden="true">Tidak</button>
	    <button class="btn btn-red" id="okHapus">Ya</button>
	</div>
</div>

@stop