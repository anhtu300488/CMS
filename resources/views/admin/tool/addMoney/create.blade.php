@extends('layouts.master')
@section('title')
    Cộng tiền cho người dùng
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            {{--<form class="form-horizontal" role="form">--}}
            {!! Form::open(array('route' => 'tool.addMoney.store','method'=>'POST')) !!}
                <!-- #section:elements.form -->
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User ID </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" placeholder="User ID" name="userId" class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <!-- /section:elements.form -->
                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Cộng ken </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" placeholder="Cộng ken" name="addGold" class="col-xs-10 col-sm-5" value="0" />
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Cộng xu </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" name="addCash" placeholder="Cộng xu" value="0"/>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Mô tả </label>

                    <div class="col-sm-9">
                        <textarea class="form-control" id="form-field-8" name="description" placeholder="Default Text" ></textarea>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>

                <div class="hr hr-24"></div>
                {!! Form::close() !!}
            {{--</form>--}}

        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection