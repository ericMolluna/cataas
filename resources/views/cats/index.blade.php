<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Gats</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            margin: 20px 0;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #ffcc00;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .gallery div {
            background: #1e1e1e;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(255, 204, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .gallery div:hover {
            transform: scale(1.05);
        }

        .gallery img {
            width: 300px;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .tags {
            padding: 10px;
        }

        .tags a {
            text-decoration: none;
            background-color: #ffcc00;
            padding: 8px 12px;
            border-radius: 20px;
            margin: 5px;
            color: #121212;
            font-weight: bold;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .tags a:hover {
            background-color: #ff9900;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .pagination a {
            padding: 10px 15px;
            border-radius: 8px;
            background-color: #333;
            color: #ffcc00;
            text-decoration: none;
            transition: background 0.3s;
        }

        .pagination a:hover, .pagination .active {
            background-color: #ffcc00;
            color: #121212;
        }
    </style>
</head>

<body>
    <h1>Galeria de Gats</h1>
    <div class="gallery">
        @foreach($cats as $cat)
        <div>
            <img src="https://cataas.com/cat/{{ $cat->_id }}" alt="Cat Image">
            <div class="tags">
                <p>Tags:
                    @foreach(json_decode($cat->tags) as $tag)
                    <a href="{{ route('cats.filter', $tag) }}">{{ $tag }}</a>
                    @endforeach
                </p>
            </div>
            <br>
        </div>
        @endforeach
    </div>
    
    <div class="pagination">
        @if($cats->currentPage() > 1)
        <a href="{{ $cats->url(1) }}">Primera</a>
        @endif
        
        @if(!$cats->onFirstPage())
        <a href="{{ $cats->previousPageUrl() }}">&laquo;</a>
        @endif

        @for ($i = max(1, $cats->currentPage() - 2); $i <= min($cats->lastPage(), $cats->currentPage() + 2); $i++)
            <a class="{{ $cats->currentPage() == $i ? 'active' : '' }}" href="{{ $cats->url($i) }}">{{ $i }}</a>
        @endfor

        @if($cats->hasMorePages())
        <a href="{{ $cats->nextPageUrl() }}">&raquo;</a>
        @endif
        
        @if($cats->currentPage() < $cats->lastPage())
        <a href="{{ $cats->url($cats->lastPage()) }}">Última</a>
        @endif

        <br>
    </div>
</body>

</html>
