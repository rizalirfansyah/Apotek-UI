@extends('layout.app')

@section('content')

    <h3>Obat</h3>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Obat</button>
    
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Obat</th>
            <th scope="col">Kategori</th>
            <th scope="col">Supplier</th>
            <th scope="col">Stok</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($data as $obat)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $obat['nama_obat'] }}</td>
            <td>{{ $obat['obatDataKategori'][0]['nama_kategori'] }}</td>
            <td>{{ $obat['obatDataSupplier'][0]['nama_supplier'] }}</td>
            <td>{{ $obat['stok'] }}</td>
            <td>{{ $obat['harga'] }}</td>
            <td>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash3"></i>Hapus</button>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i>Ubah</button>
            </td>
          </tr>    
        @endforeach
        </tbody>
    </table>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Transaksi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Transaksi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Apakah anda yakin menghapus data ini?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-danger">Ya, saya yakin</button>
            </div>
        </div>
        </div>
    </div>
@endsection