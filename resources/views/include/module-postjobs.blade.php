<div id="postjobs" class="container">
   <h1 class="title">Đăng tin tuyển dụng</h1>
   <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <div>Thông tin Công Việc</div>
        <div class="form-group title">
            <label class="control-label col-sm-3">Tên Công Việc</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="title" id="title" placeholder="Input Title" value="" required>
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
                <textarea class="form-control" id="content-post" placeholder="Content" name="content" required></textarea>
                <script type="text/javascript">CKEDITOR.replace('content-post'); </script>
            </div>
        </div>
        <div>Thông tin nhà tuyển dụng</div>
        <div class="form-group">
            <label class="control-label col-sm-3">Tên nhà tuyển dụng</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="from" value="" required>
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="control-label col-sm-3">Logo , Hình Ảnh tuyển dụng</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="feature" id="feature">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Thông tin liên hệ</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="desc" id="desc" placeholder="Input description" required></textarea>
            </div>
        </div>
        <div>Thông tin thêm</div>
        <div class="form-group">
            <label class="control-label col-sm-3">Mức Lương</label>
            <div class="col-sm-9">
                <select class="form-control" id="salery" name="salery"></select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" >Nơi làm việc</label>
            <div class="col-sm-9">
                <select class="form-control" id="location" name="location"></select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <label class="control-label col-sm-3"></label>
            <div class="col-sm-9">
                <input type="submit" id="submit" name="submit" value="Đăng Tin">
            </div>
        </div>
    </form>
</div>