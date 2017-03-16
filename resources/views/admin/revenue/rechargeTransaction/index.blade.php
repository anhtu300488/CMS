@extends('layouts.master')
@section('title')
    Danh sách nạp thẻ
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
                            {!! Form::open(['method'=>'GET','url'=>'revenue/rechargeTransaction','role'=>'search'])  !!}
                            {{--<form action="{{url('logPayment')}}" role="search" method="get" >--}}
                            <div class="row">
                                <div class="col-xs-4 col-sm-4">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <label class="col-sm-4" for="id-date-picker-1">Tên đăng nhập</label>
                                    <div class="input-group col-sm-8" >
                                        <input class="form-control" name="userName" type="text" value="{{request('userName')}}"/>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <label class="col-sm-4" for="id-date-picker-1">Tên hiển thị</label>
                                    <div class="input-group col-sm-8" >
                                        <input class="form-control" name="displayName" type="text" value="{{request('displayName')}}"/>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4">
                                    <label class="col-sm-4" for="form-field-select-1">Đối tác</label>

                                    <select class="col-sm-8" id="form-field-select-1" name="partner_id">
                                        <option value="">---Tất cả---</option>
                                        <option value="1" <?php if(request('payType') == 1) echo "selected='selected'"; ?> >Nạp thẻ</option>
                                        <option value="2" <?php if(request('payType') == 2) echo "selected='selected'"; ?> >SMS</option>
                                        <option value="3" <?php if(request('payType') == 3) echo "selected='selected'"; ?> >IAP</option>
                                    </select>
                                </div>

                            </div>
                            <br/>

                            <div class="row">
                                <div class="col-xs-4 col-sm-4">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <label class="col-sm-4" for="id-date-picker-1">Thời gian nạp thẻ</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="date_charge" id="id-date-range-picker-1" value="{{request('date_charge')}}" />
                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <label class="col-sm-4" for="id-date-picker-1">Thời gian bắt đầu chơi game</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="date_play_game" id="id-date-range-picker-1" value="{{request('date_play_game')}}" />
                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                    </div>
                                </div>



                                <div class="col-xs-4 col-sm-4">
                                    <label class="col-sm-4" for="form-field-select-1">Hệ điều hành</label>

                                    <select class="col-sm-8" id="form-field-select-1" name="os_id">
                                        <option value="">---Tất cả---</option>
                                        <option value="1" <?php if(request('payType') == 1) echo "selected='selected'"; ?> >Nạp thẻ</option>
                                        <option value="2" <?php if(request('payType') == 2) echo "selected='selected'"; ?> >SMS</option>
                                        <option value="3" <?php if(request('payType') == 3) echo "selected='selected'"; ?> >IAP</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4">
                                    <label class="col-sm-4" for="form-field-select-1">Loại</label>

                                    <select class="col-sm-8" id="form-field-select-1" name="type">
                                        <option value="">---Tất cả---</option>
                                        <option value="1" <?php if(request('payType') == 1) echo "selected='selected'"; ?> >Nạp thẻ</option>
                                        <option value="2" <?php if(request('payType') == 2) echo "selected='selected'"; ?> >SMS</option>
                                        <option value="3" <?php if(request('payType') == 3) echo "selected='selected'"; ?> >IAP</option>
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
                            <th>User</th>
                            <th>Tên đăng nhập</th>
                            <th class="hidden-480">Tên hiển thị</th>
                            <th>Mệnh giá</th>
                            <th class="hidden-480">Cash value</th>
                            <th>Ken hiện tại</th>
                            <th>Purchased time</th>
                            <th>Loại</th>
                            <th>Mô tả</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $key => $rs)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $rs->userId }}</td>
                            <td>{{ $rs->userName }}</td>
                            <td class="hidden-480">{{ $rs->displayName }}</td>
                            <td></td>
                            <td>{{ $rs->cashValue }}</td>
                            <td>{{ $rs->currentCash }}</td>
                            <td>{{ $rs->purchasedTime }}</td>
                            <td>{{ $rs->type }}</td>
                            <td>{{ $rs->description }}</td>
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

            //or change it into a date range picker
            $('.input-daterange').datepicker({autoclose:true});


            //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
            $('input[name=date_charge]').daterangepicker({
                'applyClass' : 'btn-sm btn-success',
                'cancelClass' : 'btn-sm btn-default',
                locale: {
                    applyLabel: 'Apply',
                    cancelLabel: 'Cancel',
                }
            })
                .prev().on(ace.click_event, function(){
                $(this).next().focus();
            });

            $('input[name=date_play_game]').daterangepicker({
                'applyClass' : 'btn-sm btn-success',
                'cancelClass' : 'btn-sm btn-default',
                locale: {
                    applyLabel: 'Apply',
                    cancelLabel: 'Cancel',
                }
            })
                .prev().on(ace.click_event, function(){
                $(this).next().focus();
            });
        });
    </script>

    @endsection