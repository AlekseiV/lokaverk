@extends('layouts.app')
@section('content')
@include("notifications.flash-message")

<!DOCTYPE html>

	<body>
	<!-- END #fh5co-offcanvas -->
	<header id="fh5co-header"></header>
	<!-- END #fh5co-header -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry">
			@foreach ($news as $article)
				<article class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<figure>
						<img class="img-responsive" src="{{ $article->picture }}" alt="news_picture" height="300px" width="100%">
					</figure>
					@include("news.likebutton")
					<img style="float:left;" class="card-img-top img-fluid" src="https://cdn3.iconfinder.com/data/icons/medical-icons-4/100/heart-512.png" alt="" height="30px" width="30px">
					@if ($article->articlelikes === 0)
						<span class="fh5co-meta">No likes yet :(</span>
					@else
						<span class="fh5co-meta">{{ $article->articlelikes }} People enjoyed the article</span>
					@endif
					<h2 class="fh5co-article-title"><a href="news/{{ $article->id }}">{{ $article->title }}</a></h2>
					<span class="fh5co-meta fh5co-date">{{ $article->created_at->diffForHumans() }}</span>
				</article>
			@endforeach
		</div>
	</div>
  <div class="footer">
		<div class="footercontent">
				<p>&copy; Lokaverkefni</p>
		</div>
</div>
	</body>
</html>

@endsection
