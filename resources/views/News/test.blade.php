
<!DOCTYPE html>

	<body>
	<div id="fh5co-offcanvas">
		<a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span>Close</span></span></a>
		<div class="fh5co-bio">
			<figure>
				<img src="" alt="Free HTML5 Bootstrap Template" class="img-responsive">
			</figure>
			<h3 class="heading">About Me</h3>
			<h2>Emily Tran Le</h2>
			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
			<ul class="fh5co-social">
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-instagram"></i></a></li>
			</ul>
		</div>

		<div class="fh5co-menu">
			<div class="fh5co-box">
				<h3 class="heading">Categories</h3>
				<ul>
					<li><a href="#">Travel</a></li>
					<li><a href="#">Style</a></li>
					<li><a href="#">Photography</a></li>
					<li><a href="#">Food &amp; Drinks</a></li>
					<li><a href="#">Culture</a></li>
				</ul>
			</div>
			<div class="fh5co-box">
				<h3 class="heading">Search</h3>
				<form action="#">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Type a keyword">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END #fh5co-offcanvas -->
	<header id="fh5co-header">

	</header>
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
					<span class="fh5co-meta">{{ $article->articlelikes }} People enjoyed the article</span>
					<h2 class="fh5co-article-title"><a href="single.html">{{ $article->title }}</a></h2>
					<span class="fh5co-meta fh5co-date">{{ $article->created_at->diffForHumans() }}</span>
				</article>
			@endforeach
		</div>
	</div>

	</body>
</html>
