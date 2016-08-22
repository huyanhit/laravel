<div id="postads" class="container">
   <h1 class="title">Đăng tin rao vặt</h1>
   <form id="frmpostface" class="form-horizontal" method="post" action="
    @if(isset($edit))
        {{Request::url().'?id='.$edit}}
    @else
        {{Request::url()}}
    @endif
    " enctype="multipart/form-data">
        {!! csrf_field() !!}
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
                <select class="form-control" id="location" name="location">
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
        <h3>Thông tin người đăng</h3>
        <div class="form-group">
            <label class="control-label col-sm-3">Tên người đăng</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="from" value="{{isset($frm['from'])?$frm['from']:''}}" required/>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Liên hệ</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="desc" id="desc" placeholder="Input description" required>{{isset($frm['desc'])?$frm['desc']:''}}</textarea>
                </div>
            </div>
        </div>
        
        <h3>Thông tin thêm</h3>
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