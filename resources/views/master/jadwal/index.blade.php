@extends('layouts.master')
@section('content')

<section class="section">

<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- <div class="card-header">
						<h4><b>Guru</b></h4>
					</div> -->
					<div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
				      <h6 class="m-0 font-weight-bold"><strong>Jadwal</strong></h6>
				        <a href="{{asset('master/jadwal/add/guru')}}">
				      <button h class="btn btn-outline-primary">
				          <i class="fas fa-plus"> Guru</i>
				      </button>
				        </a>
				        <a href="{{asset('master/jadwal/add/karyawan')}}">
				      <button h class="btn btn-outline-primary">
				          <i class="fas fa-plus"> Karyawan</i>
				      </button>
				        </a>
				    </div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="display nowrap" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Tipe</th>
										<th>Nama</th>
										<th>Tahun Akademik</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Selesai</th>
									</tr>
								</thead>
								<tbody>
									@foreach($jadwals as $jadwal)

									@php
										$user = \App\User::where('id', $jadwal->user_id)->first();
									@endphp
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>
											@if($user->role == 3)
											Guru
											@elseif($user->role == 4)
											Karyawan
											@else
											None
											@endif
										</td>
										<td>{{$user->name}}</td>
										<td>{{$jadwal->tahunakademik->name}} - {{$jadwal->tahunakademik->keterangan}}</td>
										<td>{{$jadwal->tgl_awal_isi}}</td>
										<td>{{$jadwal->tgl_akhir_isi}}</td>
									</tr>
            						@endforeach
								</tbody>
							</table>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

@endsection


@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#example').DataTable( {
	dom: 'Bfrtip',
	buttons: [
	'copy', 'csv', 'excel', 'pdf', 'print'
	]
	} );
} );
</script>
@endsection