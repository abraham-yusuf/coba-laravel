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
		@include('hrdstaff.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Pengunduran Diri</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('hrdstaff/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdstaff/pengunduran-diri')}}">Pengunduran Diri</a>
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
							
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th width="5%">No</th>
											<th width="15%">Tanggal</th>
											<th width="20%">No Karyawan</th>
											<th width="20%">Nama Lengkap</th>
											<th width="40%">Department</th>
											<th width="70%">Status</th>
											<th class='hidden-480 width="20%'>Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['pengunduran'] as $pengunduran)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($pengunduran->tanggalsurat)) }}</td>
												<td>{{ $pengunduran->karyawan->nokaryawan }}</td>
												<td>{{ $pengunduran->karyawan->user->nama_lengkap }}</td>
												<td>{{ $pengunduran->karyawan->department->department }}</td>
												<td>
													@if($pengunduran->status == 2)
														<span class="label label-satgreen">Sudah Disetujui</span>
													@else
														<span class="label label-lightred">Belum Disetujui</span>
													@endif
												</td>
												<td class='hidden-480'>
													<center>
														<a href="{{ URL::asset('hrdstaff/pengunduran-diri/'.$pengunduran->idpengundurandiri ) }}" class="btn" rel="tooltip" title="Detail Pengunduran Diri"><i class="icon-search"></i></a>
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