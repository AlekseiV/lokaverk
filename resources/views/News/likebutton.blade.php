
@if(Auth::check())
    @if ($article->isLiked)
        <a href="/news/like/{{ $article->id }}">
        <img style="float:right;" border="0" alt="W3Schools" src="http://americanlivewire.com/wp-content/uploads/dislike-button.png" width="20" height="20">
        </a>
    @else
        <a href="/news/like/{{ $article->id }}">
        <img style="float:right;" border="0" alt="W3Schools" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Bot%C3%B3n_Me_gusta.svg/1200px-Bot%C3%B3n_Me_gusta.svg.png" width="20" height="20">
        </a>
    @endif
@endif
