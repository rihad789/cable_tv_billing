@extends('layouts.manager')

@section('meta')

<title>Area & Vicinity | {{ $website_name }}</title>

<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')
@include('manager.modals.add_area')
@include('manager.modals.add_vicinity')


<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <div class="box box-success">

                <div class="box-content">

                    <p class="lead">&nbsp;&nbsp;AREA & VICINITY

                        <button class="ui btn btn-info mini offsettop5 btn-edit float-right"><i class="ui icon plus"></i>{{ __("Vicinity") }}</button>
                        <button class="ui btn btn-info mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>{{ __("Area") }}</button>

                    </p>
                    <hr>

                    <div class="row">

                        <div class="col-md-5">

                            <!-- Card user Count Data -->

                            <div class="box box-success">

                                <div class="box-content">


                                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                                        <thead class="thead-light">
                                            <tr>

                                                <th>{{ __("Serial") }}</th>
                                                <th>{{ __("Area Name") }}</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($serial=1)
                                            @isset($areasData)
                                            @foreach ($areasData as $val)
                                            <tr>
                                                <td>{{ $serial++}}</td>
                                                <td>{{ $val->area_name }}</td>
                                                <td class="align-right">
                                                    <a href="{{ url('owner/area/delete/'.$val->id) }}" onclick="return confirm('Are you sure,you want to delete area.This will delete all the vicinity related to it?')" class="ui circular basic icon button tiny"><i class="icon trash alternate outline"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">

                            <!-- Card user Count Data -->

                            <div class="box box-success">

                                <div class="box-content">

                                    <table width="100%" class="table" id="dataTables-example2" data-order='[[ 0, "asc" ]]'>
                                        <thead class="thead-light">
                                            <tr>
                                                <th>{{ __("Serial") }}</th>
                                                <th>{{ __("Vicinity Name") }}</th>
                                                <th>{{ __("Area Name")}}
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($serial=1)
                                            @isset($vicinitiesData)
                                            @foreach ($vicinitiesData as $val)
                                            <tr>
                                                <td>{{ $serial++}}</td>
                                                <td>{{ $val->vicinity_name }}</td>
                                                <td>{{ $val->area_name }}</td>

                                                <td class="align-right">
                                                    <a href="{{ url('owner/vicinity/delete/'.$val->id) }}" onclick="return confirm('Are you sure,you want to delete vicintiy?')" class="ui circular basic icon button tiny"><i class="icon trash alternate outline"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>


        </div>

    </div>



</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function() {

        $('#dataTables-example').DataTable({
            responsive: true,
            pageLength: 10,
            ordering: false,
            lengthChange: true,
            dom: 'Blfrtip',
            buttons: [

                'copyHtml5',
                'excelHtml5',
                'pdfHtml5'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ]
        });


        $('#dataTables-example2').DataTable({
            responsive: true,
            pageLength: 10,
            ordering: false,
            lengthChange: true,
            dom: 'Blfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ]
        });


        $('#add_area_form').form({
            fields: {
                area_name: {
                    identifier: 'area_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'Area name required ।'
                    }]
                }
            }
        });

        $('#add_vicinity_form').form({
            fields: {
                area_id: {
                    identifier: 'area_id',
                    rules: [{
                        type: 'empty',
                        prompt: 'Please select area name ।'
                    }]
                },
                vicinity_name: {
                    identifier: 'vicinity_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'Vicinity name required ।'
                    }]
                }
            }
        });

    });
</script>

@endsection