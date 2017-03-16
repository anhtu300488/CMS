@extends('layouts.master')
@section('title')
    Cộng tiền cho người dùng
@endsection
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">Tìm kiếm</h4>

                        <span class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                            </a>
                        </span>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            {!! Form::open(['method'=>'GET','url'=>'tool/addMoney','role'=>'search'])  !!}
                            {{--<form action="{{url('logPayment')}}" role="search" method="get" >--}}
                            <div class="row">

                                <div class="col-xs-4 col-sm-4">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User ID: </label>
                                    <div class="input-group col-sm-9" >
                                         <input class="form-control" name="userId" type="text" value="{{request('userId')}}"/>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mô tả: </label>
                                    <div class="input-group col-sm-9" >
                                         <input class="form-control" name="description" type="text" value="{{request('description')}}"/>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4">
                                    <button type="submit" class="btn btn-info btn-sm">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        Tìm kiếm
                                    </button>
                                </div>

                            </div>
                            {{--</form>--}}
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <table id="simple-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>User</th>
                            <th>Cộng ken</th>
                            <th>Cộng xu</th>

                            <th>Mô tả</th>
                            <th>Tên admin</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $key => $rs)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $rs->userId }}</td>
                            <td>{{ $rs->addGold }}</td>
                            <td>{{ $rs->addCash }}</td>
                            <td>{{ $rs->description }}</td>
                            <td>{{ $rs->admin_id }}</td>
                            <td>{{ $rs->status }}</td>
                            <td>{{ $rs->created_at }}</td>
                            <td>{{ $rs->updated_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.span -->
                {{ $data->appends($_GET)->links() }}
            </div><!-- /.row -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <script>
        jQuery(function($) {

            //datepicker plugin
            //link
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            })
            //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                $(this).prev().focus();
            });

            //or change it into a date range picker
            $('.input-daterange').datepicker({autoclose:true});

        });
    </script>

    @endsection