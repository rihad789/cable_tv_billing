@extends('layouts.admin')

@section('meta')
<title>এরিয়া | ডিঙ্গেদহ নেটওয়ার্ক</title>
<meta name="description" content="Metro Bangla Operator">
@endsection

@section('content')
@include('admin.modals.add_area')
@include('admin.modals.add_vicinity')


<div class="container-fluid">



    <div class="row">

        <div class="col-md-5">

            <!-- Card user Count Data -->

            <div class="box box-success">

                <div class="box-content">

                    <p class="lead">&nbsp;&nbsp;এরিয়া সমূহ
                        <button class="ui btn btn-info mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>{{ __("নতুন এরিয়া") }}</button>
                    </p>
                    <hr>

                    <table width="100%" class="table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>

                                <th>{{ __("সিরিয়াল") }}</th>
                                <th>{{ __("এরিয়ার নাম") }}</th>

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
                                    <a href="{{ url('admin/area/delete/'.$val->id) }}" onclick="return confirm('আপনি কি সত্যিই গ্রাম মুছে ফেলতে চান? ফলস্বরূপ গ্রামের সাথে পাড়াসমূহ মূছে যাবে?')" class="ui circular basic icon button tiny"><i class="icon trash alternate outline"></i></a>
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

                    <p class="lead">&nbsp;&nbsp;পাড়াসমূহ
                        <button class="ui btn btn-info mini offsettop5 btn-edit float-right"><i class="ui icon plus"></i>{{ __("নতুন পাড়া") }}</button>
                    </p>
                    <hr>

                    <table width="100%" class="table" id="dataTables-example2" data-order='[[ 0, "asc" ]]'>
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __("সিরিয়াল") }}</th>
                                <th>{{ __("পাড়ার নাম") }}</th>
                                <th>{{ __("গ্রামের নাম")}}
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
                                    <a href="{{ url('admin/vicinity/delete/'.$val->id) }}" onclick="return confirm('আপনি কি সত্যিই পাড়া মুছে ফেলতে চান?')" class="ui circular basic icon button tiny"><i class="icon trash alternate outline"></i></a>
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

@endsection

@section('scripts')
<script type="text/javascript">




</script>

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
                        prompt: 'এরিয়ার নাম আবষ্যক ।'
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
                        prompt: 'এরিয়ার নাম পছন্দ করুন ।'
                    }]
                },
                vicinity_name: {
                    identifier: 'vicinity_name',
                    rules: [{
                        type: 'empty',
                        prompt: 'পাড়ার নাম আবষ্যক ।'
                    }]
                }
            }
        });

    });
</script>

@endsection