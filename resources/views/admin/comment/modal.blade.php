<div class="modal fade" id="messageModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn btn-sm" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="messageModalLabel">
                    مشاهده سریع
                </h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{URL::action('Admin\CommentController@postEdit',$row->id)}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="readat" value="1">
                    <div class="row w-100 m-0">
                        <div class="col-md-12 col-sm-12 col-xs-12 p-1 align-self-center">
                            <select class="form-control" name="status">
                                <option>
                                    انتخاب وضعیت . . .
                                </option>
                                @foreach($status as $key=>$item)
                                    <option value="{{$key}}" @if(isset($row->status) and $row->status==$key) selected @endif>{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 p-1 align-self-center">
                            <label>مربوط به:</label>
                            @php $com = \App\Models\Comment::where('id', $row->parent_id)->first(); @endphp
                            <h5> @if($row->commentable_type == 'App\Models\Product') محصول: {{@$row->product->title}}  @elseif($row->commentable_type == 'App\Models\Content') مقاله: {{@$row->blog->title}} @endif @if(isset($row->parent_id))/پاسخ کامنت {{@$com->user->name}} @endif </h5>
                            <textarea class="form-control" type="text" rows="5" id="title" name="title"
                            >@if(isset($row->title)) {{$row->title}} @endif</textarea>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 p-1 align-self-center">
                            <label>توضیحات:</label>
                            <textarea class="form-control" type="text" rows="5" id="content" name="content"
                            >@if(isset($row->content)) {{$row->content}} @endif</textarea>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 px-1 pt-3 align-self-center">
                            <button type="submit" class="btn btn-success"> ذخیره </button>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>
