<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
	<title>Template</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<div class="content-wrapper">
@php
	$formTitle = !empty($inventory) ? 'Update' : 'Tambah'    
@endphp
<div class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card card-default">
				<div class="card-header card-header-border-bottom">
						<h2>{{ $formTitle }} produk</h2>
				</div>
				<div class="card-body">
					@include('inventory.flash', ['$errors' => $errors])
					@if (!empty($inventory))
						{!! Form::model($inventory, ['url' => ['inventories', $inventory->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
						{!! Form::hidden('id') !!}
					@else
						{!! Form::open(['url' => 'inventories', 'enctype' => 'multipart/form-data']) !!}
					@endif
						<div class="form-group">
							{!! Form::label('nama', 'Nama barang') !!}
							{!! Form::text('nama', null, ['class' => 'form-control']) !!}
						</div>
						
                        <div class="form-group">
							{!! Form::label('harga', 'Harga barang') !!}
							{!! Form::text('harga', null, ['class' => 'form-control']) !!}
						</div>

                        <div class="form-group">
							{!! Form::label('stok', 'Jumlah barang') !!}
							{!! Form::text('stok', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-footer pt-5 border-top">
							<button type="submit" class="btn btn-primary btn-default">Submit</button>
							<a href="{{ url('inventories') }}" class="btn btn-secondary btn-default">Back</a>
						</div>
					{!! Form::close() !!}
				</div>
			</div>  
		</div>
	</div>
</div>
</div>

</body>
</html>