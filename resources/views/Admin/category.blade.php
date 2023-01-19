@extends('Admin.Layouts.app')
@section('skilet')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Kategoriýa</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('Admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kategoriýa</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            January 2018
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Export List</a>
                            <a class="dropdown-item" href="#">Policies</a>
                            <a class="dropdown-item" href="#">View Assets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-box mb-30">
            <div class="pd-20">
                <a href="#" data-toggle="modal" data-target="#Medium-modal" type="button">
                    <button class="btn btn-success">Goş</button>
                </a>
            </div>
            <div class="pb-20">
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th>Surat</th>
                            <th>Ady</th>
                            <th>Wagty</th>
                            <th class="datatable-nosort">Sazlamalar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($category))
                            @foreach ($category as $item)
                                <tr>
                                    <td><img src="{{ asset($item->photo) }}" alt=""></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#Update-modal{{ $item->id }}"><i
                                                        class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item" href="{{ route('Category.delete', $item->id) }}"><i
                                                        class="dw dw-delete-3"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


{{-- Create Category --}}
<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Kategoriýa Goş</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Ady</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="name" placeholder="Ady">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Surat</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="file" name="photo" placeholder="Ady">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ýatyr</button>
                        <button type="submit" class="btn btn-primary">Goş</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{-- Update Category --}}
@foreach ($category as $item)
    <div class="modal fade" id="Update-modal{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Kategoriýa Üýtget</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('Category.update', $item->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Ady</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ $item->name }}" placeholder="Ady">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Surat</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="file" name="photo" value="{{ $item->photo }}" placeholder="Ady">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Ýatyr</button>
                            <button type="submit" class="btn btn-primary">Üýtget</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach
@section('datatable')
    <script src="{{ asset('src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script>
    </body>
@endsection
