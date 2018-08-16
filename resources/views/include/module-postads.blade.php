<div id="postads" class="container">
    <form role="form"  id="frmpostface" class="form-horizontal" method="post"  enctype="multipart/form-data" action="
        @if(isset($edit))
        {{Request::url().'?id='.$edit}}
        @else
        {{Request::url()}}
        @endif
        ">
        {!! csrf_field() !!}
        <div class="col-md-2 pl-5 pl-md-0 pb-5">
            <!-- Stepper -->
            <div class="steps-form-3">
                <div class="steps-row-3 setup-panel-3 d-flex justify-content-between">
                    <div class="steps-step-3">
                        <a href="#step-5" type="button" class="btn btn-info btn-circle-3 waves-effect ml-0" data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-folder-open-o" aria-hidden="true"></i></a>
                    </div>
                    <div class="steps-step-3">
                        <a href="#step-6" type="button" class="btn btn-pink btn-circle-3 waves-effect p-3" data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-user" aria-hidden="true"></i></a>
                    </div>
                    <div class="steps-step-3">
                        <a href="#step-7" type="button" class="btn btn-pink btn-circle-3 waves-effect p-3" data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-check" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Grid column -->
        <div class="col-md-10">
            <!-- First Step -->
            <div class="row setup-content-3 steps-form-margin" id="step-5">
                <div class="col-md-12">
                    <h3>Thông tin rao vặt</h3>
                    <div class="form-group title">
                        <label class="control-label col-sm-3">Tiêu đề</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Input Title" value="{{isset($frm['title'])?$frm['title']:''}}" required>
                            <input type="hidden" class="form-control" id="typeads" name="typeads" value="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Danh mục</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="catads" name="catads">
                                @foreach($catads as $val)
                                    <option
                                    @if(isset($frm['catads']) && ($frm['catads'] == $val->id))
                                    {{'selected'}}
                                    @endif
                                    value="{{$val->id}}">{{$val->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="control-label col-sm-3">Logo , Hình Ảnh</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="feature" id="feature">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Chi tiết tin</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="content-post" placeholder="Content" name="content">
                                {{isset($frm['content'])?$frm['content']:''}}
                            </textarea>
                            <script type="text/javascript">CKEDITOR.replace('content-post'); </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Hiển thị dạng</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="typeads" name="typeads">
                                @foreach($typeads as $val)
                                    <option
                                            @if(isset($frm['typeads']) && ($frm['typeads'] == $val->id))
                                            {{'selected'}}
                                            @endif
                                            value="{{$val->id}}">{{$val->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-9">
                        <div class="form-group">
                            <button class="btn nextBtn-3 pull-right" type="button">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Step -->
            <div class="row setup-content-3" id="step-6">
                <div class="col-md-12">
                    <h3>Thông tin người đăng</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Tên người đăng</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="from" value="{{isset($frm['from'])?$frm['from']:''}}" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Liên hệ</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="desc" id="desc" placeholder="Input description" required >{{isset($frm['desc'])?$frm['desc']:''}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" >Vùng muốn rao</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="location" name="location">
                                @foreach($location as $val)
                                    <option
                                            @if(isset($frm['location']) && ($frm['location'] == $val->id))
                                            {{'selected'}}
                                            @endif
                                            value="{{$val->id}}">{{$val->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-9">
                        <div class="form-group">
                            <button class="btn prevBtn-3 pull-right" type="button">Previous</button>
                            <button class="btn nextBtn-3 pull-right" type="button">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Third Step -->
            <div class="row setup-content-3" id="step-7">
                <div class="col-md-12">
                    <h3 >Terms and conditions</h3>
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                            Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                    </div>

                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                            <input type="checkbox" id="checkbox115" class="form-check-input">
                            <label for="checkbox115" class="form-check-label">I agree to the terms and conditions</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" checked id="postface" name="postface">
                            <label for="checkbox115" class="form-check-label">Tự động đăng fanpage khi đã duyệt</label>
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-10">
                        <div class="form-group">
                            <input type="submit" id="postjob-post" name="submit" value="Đăng Tin">
                            <button class="btn prevBtn-3 pull-right" type="button">Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </form>
</div>