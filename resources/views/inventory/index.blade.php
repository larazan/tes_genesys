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
<div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Produk</h2>
                    </div>
                    <div class="card-body">
                    @include('inventory.flash')
                    <table class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                $i = 1
                                @endphp
                                @forelse ($inventories as $inventory)
                                    <tr>    
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $inventory->nama }}</td>
                                        <td>{{ $inventory->harga }}</td>
                                        <td>{{ $inventory->stok }}</td>
                                        <td>
                                            
                                                <a href="{{ url('inventories/'. $inventory->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                                {!! Form::open(['url' => 'inventories/'. $inventory->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No records found</td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                        <div class="pagination-style">
                        {{ $inventories->links() }}
                        </div>
                    </div>

                    
                        <div class="card-footer text-right">
                            <a href="{{ url('inventories/create') }}" class="btn btn-primary">Tambah baru</a>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>