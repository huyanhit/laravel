<div id="postjobs" class="container">
   <h1 class="title">Đăng tin tuyển dụng</h1>
   <form id="frmpostface" class="form-horizontal" method="post" action="
    @if(isset($edit))
        {{Request::url().'?id='.$edit}}
    @else
        {{Request::url()}}
    @endif
    " enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group title">
            <label class="control-label col-sm-3">Tên Công Việc</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="title" id="title" placeholder="Input Title" value="{{isset($frm['title'])?$frm['title']:''}}" required>
                <input type="hidden" class="form-control" id="typejobs" name="typejobs" value="1">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Ngành Nghề</label>
            <div class="col-sm-9">
                <select class="form-control" id="catjobs" name="catjobs">
                    @foreach($catjobs as $val)
                    <option
                    @if(isset($frm['catjobs']) && ($frm['catjobs'] == $val->id))
                        {{'selected'}}
                    @endif
                    value="{{$val->id}}">{{$val->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Chi tiết Công Việc</label>
            <div class="col-sm-9">
                <textarea class="form-control" id="content-post" placeholder="Content" name="content">
                    {{isset($frm['content'])?$frm['content']:''}} 
                </textarea>
                <script type="text/javascript">CKEDITOR.replace('content-post'); </script>
            </div>
        </div>
        <h3>Thông tin nhà tuyển dụng</h3>
        <div class="form-group">
            <label class="control-label col-sm-3">Tên nhà tuyển dụng</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="from" value="{{isset($frm['from'])?$frm['from']:''}}" required/>
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="control-label col-sm-3">Logo , Hình Ảnh</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="feature" id="feature">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Thông tin liên hệ</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="desc" id="desc" placeholder="Input description" required>{{isset($frm['desc'])?$frm['desc']:''}}</textarea>
            </div>
        </div>
        <h3>Thông tin thêm</h3>
        <div class="form-group">
            <label class="control-label col-sm-3">Mức Lương</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="salary" name="salary">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" >Nơi làm việc</label>
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
        <div class="clearfix"></div>
        <div class="form-group">
            <label class="control-label col-sm-3"></label>
            <div class="col-sm-9">
                <input type="submit" id="postjob-post" name="submit" value="Đăng Tin">
                <input type="submit" id="postjob-save" name="submit-save" value="Lưu Tạm">
                <input type="checkbox" checked id="postface" name="postface">Tự động đăng fanpage khi đã duyệt
                <a href=""><i class="fa fa-facebook"></i></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div>