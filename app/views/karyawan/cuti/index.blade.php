@extends('master')

@section('content')
<script type="text/javascript">
	 $(document).ready(function() { 
        $("#okHapus").click(function() {  
            var i = $("#id").val();
            var url = "cuti/delete/"+i;    
            $(location).attr('href',url);
        });  
        $('.edit').click(function(){
            var url = $(this).attr('href');
            $('#dialogEdit').modal('show');
            $('#dialogEdit').load(url);
            return false;
        });
    });

    function detailAction(data){
        alert(data);    
    } 
	function hapusAction(data){
        $("#id").val(data);
        $('#dialogHapus').modal('show');
    } 
</script>
<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('karyawan.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Daftar Cuti</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('karyawan/cuti')}}">Cuti</a>
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
											<th width="15%">Tanggal Mulai</th>
											<th width="15%">Tanggal Selesai</th>
											<th width="20%">Alasan</th>
											<th width="20%">Pengganti</th>
											<th class='hidden-480 width="20%'>Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['cuti'] as $cuti)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($cuti->tanggalmulai)) }}</td>
												<td>{{ date("d M Y", strtotime($cuti->tanggalselesai)) }}</td>
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
													@else
														Khitanan/Baptis
													@endif
												</td>
												<td>{{ $cuti->nama_lengkap }}</td>
												<td class='hidden-480'>
													@if( ($cuti->status == 2) OR ($cuti->status == 3) OR ($cuti->status == 4) )
														<span class="label label-satgreen">Approved</span>
													@elseif($cuti->status == 1)
														<span class="label label-lightred">Unapproved</span>
													@else
													<center>
														<a href="javascript:hapusAction({{ $cuti->idcuti }})" class="btn btn-red" rel="tooltip" title="Batal Cuti"><i class="icon-remove"></i></a>
													</center>
													@endif
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