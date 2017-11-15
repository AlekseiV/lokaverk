@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='row'>
      <div class="col-md-8 col-md-offset-2">
        @include("notifications.error")
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Create a New Article</h3>
                  </div>
                  <div class="panel-body">
                    <form class="" action="/news/create" method="post">

                      {{ csrf_field() }}

                      <?php
                      session_start();
                      ?>
                      <b>Title:</b>
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1"></span>
                          <input value="{{old("title")}}" type="text" name="title" class="form-control" placeholder="Enter the title here" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <b>Picture:</b>
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"></span>
                            <input value="{{old("picture")}}" type="text" name="picture" class="form-control" placeholder="Place only the URL of the picture here" aria-describedby="basic-addon1">
                          </div>
                          <br>
                      <b>Description:</b>
                        <div class="form-group">
                        <textarea class="form-control" name="message" type="textarea" id="message" placeholder="Enter your description here" maxlength="140" rows="7">{{old("message")}}</textarea>
                        </div>
                        <p><button type="submit" class="btn btn-primary" >Publish</button>
                      </form>
                  </div>
                </div>
            </div>
    </div>
</div>
@endsection
