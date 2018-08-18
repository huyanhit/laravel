<div id="postads" class="container">
    <form role="form"  id="frmpostface" class="form-horizontal" method="post" action="
        @if(isset($edit))
        {{Request::url().'?id='.$edit}}
        @else
        {{Request::url()}}
        @endif
        " enctype="multipart/form-data" >
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                            {{ Form::input('text','title',isset($frm['title'])?$frm['title']:'',array('class' => 'form-control','placeholder' => 'Input title'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Danh mục</label>
                        <div class="col-sm-9">
                            {{ Form::select('catads', $catads, isset($frm['catads'])?$frm['catads']:null, array('id'=>'catads', 'class'=>'form-control'))}}
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
                            {{ Form::textarea ('content',isset($frm['content'])?$frm['content']:'',array('id'=>'content-post', 'class'=>'form-control', 'placeholder'=>'Input content'))}}
                            <script type="text/javascript">CKEDITOR.replace('content-post'); </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Hiển thị dạng</label>
                        <div class="col-sm-9">
                            {{Form::select('typeads', $typeads, isset($frm['typeads'])?$frm['typeads']:null, array('id'=>'typeads', 'class'=>'form-control'))}}
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-9">
                        <div class="form-group">
                            <button class="btn nextBtn-3" type="button">Tiếp tục</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Step -->
            <div class="row setup-content-3" id="step-6">
                <div class="col-md-12">
                    <h3>Thông tin người đăng</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Liên hệ</label>
                        <div class="col-sm-9">
                            {{ Form::textarea ('desc',isset($frm['desc'])?$frm['desc']:'',array('id'=>'desc', 'class'=>'form-control', 'placeholder'=>'Input description'))}}
                            <script type="text/javascript">CKEDITOR.replace('desc'); </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" >Vùng muốn rao</label>
                        <div class="col-sm-9">
                            {{Form::select('location', $location, isset($frm['location'])?$frm['location']:null, array('id'=>'location', 'class'=>'form-control'))}}
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-9">
                        <div class="form-group">
                            <button class="btn prevBtn-3" type="button">Quay lại</button>
                            <button class="btn nextBtn-3" type="button">Tiếp tục</button>
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                            sunt in culpa qui officia deserunt mollit anim id est laborum.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                            sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>

                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                            <input type="checkbox" id="checkbox_agree" class="form-check-input">
                            <label for="checkbox_agree" class="form-check-label">I agree to the terms and conditions</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="postface" name="postface">
                            <label class="form-check-label">Tự động đăng fanpage khi đã duyệt</label>
                        </div>
                        <div class="form-group captcha_image">
                            <label>Mã xác nhận</label> {!! captcha_img() !!}
                        </div>
                        <div class="form-group captcha_code">
                            <label>Nhập mã xác nhận</label>
                            <input type="text" class="form-control captcha_input"  name="captcha" required/>
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                            <input type="submit" id="postjob-post" name="submit" value="Đăng Tin" listen="#checkbox_agree__check__enable, #checkbox_agree__un_check__disable">
                            <button class="btn prevBtn-3" type="button">Quay lại</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </form>
</div>