<form method="post" action="{{URL::action('Site\HomeController@postReply')}}"
      enctype="multipart/form-data" class="m-0">
    {{ csrf_field() }}
    <input type="hidden" name="commentable_id" value="{{$blog->id}}">
    <input type="hidden" name="commentable_type" value="{{"App\Models\Content"}}">
    <input type="hidden" name="parent_id" value="{{$comment->id}}">
 	<div class="row w-100 m-0">
 		<div class="col-sm-12 p-1">
 			<div class="form-floating">
 				<input type="text" name="title" class="form-control rounded-3 border-0" id="" placeholder="عنوان نظر">
 				<label for="">
 					عنوان نظر
 				</label>
 			</div>
 		</div>
 		<div class="col-sm-12 p-1">
 			<div class="form-floating">
 				<textarea class="form-control rounded-3 border-0" name="content" placeholder="متن نظر شما" id=""></textarea>
 				<label for="">
 					متن نظر شما
 				</label>
 			</div>
 		</div>
 		<div class="col-sm-12 p-1">
 			<button type="submit" class="btn btn-lg btn-one w-100 rounded-3">
 				ارسال نظر
 			</button>
 		</div>
 	</div>
 </form>
