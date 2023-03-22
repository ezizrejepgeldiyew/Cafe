@extends('Admin.Layouts.app')
@section('skilet')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Sargytlar</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('Admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sargytlar</li>
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
                <button type="button" class="btn btn-outline-success" id="button">Success</button>
                <button type="button" class="btn btn-outline-secondary" id="secondary">Secondary</button>
            </div>
            <div class="pb-20">
                @if ($orders)
                    <table class="checkbox-datatable table nowrap">
                        <thead>
                            <tr>
                                <th>
                                    <div class="dt-checkbox">
                                        <input type="checkbox" name="select_all" id="example-select-all">
                                        <span class="dt-checkbox-label"></span>
                                    </div>
                                </th>
                                <th>Ady</th>
                                <th>Tel nomeri</th>
                                <th>Hyzmatyň görnüşi</th>
                                <th>Barmaly ýeri</th>
                                <th>Sargyt wagty</th>
                                <th>Barmaly salgy</th>
                                <th>Tölegiň görnüşi</th>
                                <th>Ýagdaýy</th>
                                <th>Bellik</th>
                                <th>Sargytlary görmek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td class="checkbox">{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><a href="tel:+{{ $item->phone_number }}">{{ '+' . $item->phone_number }}</a></td>
                                    <td>{{ $item->services_type }}</td>
                                    <td>{{ $item->place->name }}</td>
                                    <td>{{ $item->services_date }}</td>
                                    <td>{{ $item->delivery_address }}</td>
                                    <td>{{ $item->payment_type }}</td>
                                    <td><span
                                            class="badge badge-{{ $item->status == null ? 'warning' : $item->status }}">{{ $item->status == null ? 'Garaşylýar' : $item->status }}</span>
                                    </td>
                                    <td>{{ $item->notes }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" data-toggle="modal" role="button" data-toggle="dropdown"
                                                data-target="#Update-modal{{ $item->id }}"><i
                                                    class="dw dw-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

{{-- Update Banner --}}
@foreach ($orders as $item)
    <div class="modal fade" id="Update-modal{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Banner Üýtget</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <table class="datatable table nowrap">
                        <thead>
                            <tr>
                                <th>Suraty</th>
                                <th>Ady</th>
                                <th>Kategoriýasy</th>
                                <th>Kiçi kategoriýasy</th>
                                <th>Bahasy</th>
                                <th>Sany</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->services_type }}</td>
                                    <td>{{ $item->services_type }}</td>
                                    <td>{{ $item->services_type }}</td>
                                    <td>{{ $item->services_type }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <div class="modal-footer">
                           <div class="d-flex justify-content-between h2">
                                <div>Jemi baha:&nbsp;&nbsp;</div>
                                <div class="text-primary">30TMT</div>
                           </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
@section('datatable')
    <script>
        $("#button").click(function() {
            let arr_id = [];
            $(":checkbox:checked").each(function(i) {
                if ($(this).val() !== "on") {
                    arr_id.push($(this).val());
                }
            });

            console.log(arr_id);
        });
    </script>
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
