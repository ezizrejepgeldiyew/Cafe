@extends('Admin.Layouts.app')
@section('skilet')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Haryt</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('Admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Haryt</li>
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
            </div>
            <div class="pb-20">
                <table class="checkbox-datatable table nowrap">
                    <thead>
                        <tr>
                            <th>
                                <div class="dt-checkbox">
                                    <input type="checkbox" name="select_all" id="example-select-all">
                                    <span class="dt-checkbox-label"></span>
                                </div>
                            </th>
                            <th>Ýerleşýän ýeri</th>
                            <th>Adam sany</th>
                            <th>Güni</th>
                            <th>Sagady</th>
                            <th>Ady</th>
                            <th>Tel: nomeri</th>
                            <th>Bellik</th>
                            <th>Ýagdaýy</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservation as $item)
                            <tr>
                                <td class="checkbox">{{ $item->id }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->day }}</td>
                                <td>{{ $item->hour }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->description }}</td>
                                <td><span class="badge badge-{{ $item->status }}">{{ $item->status }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


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
