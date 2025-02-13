<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalls de la imatge de gat</title>
</head>
<body>
    <h1>Imatge de Gat</h1>
    
    <div class="image">
        <img src="https://cataas.com/cat/{{ $catImage->_id }}" alt="Imatge de gat">
        <p>ID: {{ $catImage->_id }}</p>
        <p>Mimetype: {{ $catImage->mimetype }}</p>
        <p>Size: {{ $catImage->size }} bytes</p>
        <p>Tags: {{ implode(', ', json_decode($catImage->tags)) }}</p>
    </div>
    
    <a href="/">Torna a la galeria</a>
</body>
</html>
