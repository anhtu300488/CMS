@extends('layouts.master')
@section('title')
    Danh sách đổi thẻ
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
                            {!! Form::open(['method'=>'GET','url'=>'basic/exchangeAssetRequest','role'=>'search'])  !!}
                            {{--<form action="{{url('logPayment')}}" role="search" method="get" >--}}
                            <div class="row">
                                <div class="col-xs-4 col-sm-4">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <label class="col-sm-4" for="id-date-picker-1">Người dùng</label>
                                    <div class="input-group col-sm-8" >
                                        <input class="form-control" name="userName" type="text" value="{{request('userName')}}"/>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <label class="col-sm-3" for="id-date-picker-1">Từ ngày</label>
                                    <div class="input-group">
                                        <input class="form-control date-picker col-sm-9" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="fromDate" value="{{request('fromDate')}}"/>
                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <label class="col-sm-3" for="id-date-picker-1">Đến ngày</label>
                                    <div class="input-group">
                                        <input class="form-control date-picker col-sm-9" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="toDate" value="{{request('toDate')}}"/>
                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                    </div>
                                </div>
                            </div>
                            <br/>

                            <div class="row">
                                <div class="col-xs-4 col-sm-4">
                                    <label class="col-sm-4" for="form-field-select-1">Trạng thái</label>

                                    <select class="col-sm-8" id="form-field-select-1" name="status">
                                        <option value="">---Tất cả---</option>
                                        <option value="0" <?php if(request('status') == 0) echo "selected='selected'"; ?> >Mới insert chưa xử lý</option>
                                        <option value="1" <?php if(request('status') == 1) echo "selected='selected'"; ?> >SMS đã check thành công</option>
                                        <option value="2" <?php if(request('status') == 2) echo "selected='selected'"; ?> >Thất bại</option>
                                    </select>
                                </div>

                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
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
            <div class="center">

                <div class="row">
                    <div class="col-xs-12 col-lg-6">
                        <div>
                            <span>Thống kê nạp tiền</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-6">
                        <div>
                            <span>Doanh thu</span>
                        </div>
                    </div>
                </div>

                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <hr />
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <table id="simple-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên đăng nhập</th>
                            <th>Tên người chơi</th>
                            <th>Số ken đổi thẻ</th>
                            <th>Mệnh giá</th>
                            <th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i> Ngày yêu cầu</th>
                            <th>Trạng thái</th>
                            <th>Mô tả</th>
                        </tr>
                        </thead>

                        <tbody>
                        <!--                        --><?php //var_dump($data); die;?>
                        @foreach($data as $key => $rs)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $rs->requestUserId }}</td>
                            <td>{{ $rs->requestUserName }}</td>
                            <td class="hidden-480">{{ $rs->totalCash }}</td>
                            <td>{{ $rs->totalParValue }}</td>
                            <td>{{ $rs->created_at }}</td>
                            <td>{{ $rs->status }}</td>
                            <td>{{ $rs->description }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.span -->
                {{ $data->links() }}
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