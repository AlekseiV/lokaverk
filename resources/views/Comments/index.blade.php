<div class="col-md-8 col-md-offset-2">
        <div style="color:white;"> <h3 style="font-family: verdana"><strong>Comments</strong></h3> </div>
      @foreach ($comments as $comment)
        <form method="POST" action="/comments/{{ $comment->id }}">
          <input name="_method" type="hidden" value="DELETE">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}

          <hr>
            <div class="card-text">
               <div style="color:black;">
                  {{ $comment->comment }}
                  <button type="submit" class="close" aria-hidden="true">&times;</button>
               </div>
            </div>
          <hr>
        </form>
      @endforeach
</div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                @include('notifications.error')

                <div class="panel-body">
                  <form method="POST" action="/comments/{{ $news->id }}">

                    {{ csrf_field() }}

                  <label for="comment" style="color:white">Create Comment</label>
                    <textarea class="form-control" name="comment" rows="10" id="comment"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
        </div>
    </div>
