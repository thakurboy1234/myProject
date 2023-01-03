<h1>Comment</h1>
    <form method="POST" action="{{route('store_comment')}}">
        @csrf
        <input type="hidden" name="blog_id" value="{{$id}}">
        <div class="form-floating">
            <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">submit</button>
    </form>
