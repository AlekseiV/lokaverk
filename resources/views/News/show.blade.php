@extends('layouts.app')

@section('content')

	<body>
	<!-- <a href="#" class="fh5co-post-prev"><span><i class="icon-chevron-left"></i> Prev</span></a>
	<a href="#" class="fh5co-post-next"><span>Next <i class="icon-chevron-right"></i></span></a> -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<h2 class="fh5co-article-title animate-box"><a href="{{ $news->id }}">{{$news->title}}</a></h2>
				@include('notifications.flash-message')
				<span class="fh5co-meta fh5co-date animate-box">{{$news->created_at->diffForHumans()}}</span>
				@if ($news->articlelikes === 0)
					<span class="fh5co-meta">No likes yet :(</span>
				@else
					<span class="fh5co-meta">{{ $news->articlelikes }} People enjoyed the article</span>
				@endif

				<form method="POST" action="/news/{{ $news->id }}">
					<input name="_method" type="hidden" value="DELETE">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="close" aria-hidden="true">Remove Article &times;</button>
				</form>
				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-8 cp-r animate-box">
							<p>{{ $news->message }}</p>
						</div>
						<div class="col-lg-4 animate-box">
							<div class="fh5co-highlight right">
								<h4>Article {{$news->title}}</h4>
								<img class="card-img-top img-fluid" src="{{ $news->picture }}" alt="" height="auto" width="100%">
							</div>
						</div>
					</div>

					<div class="row rp-b">
						<div class="col-md-12 animate-box">
							<!-- <blockquote>
								<p>&ldquo;She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove &rdquo; <cite>&mdash; Jean Smith</cite></p>
							</blockquote> -->
						</div>
					</div>
				</div>
				@if(Auth::check())
					@include("comments.index")
				@endif
			</article>
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
