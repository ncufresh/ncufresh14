<html>
<body>
<h5>Time: {{ $now }}</h5>
<h3>Title: {{ $exception->getMessage() }}</h3>
<h4>Error: {{  nl2br($exception->gettraceasstring()) }}</h4>
</body>
</html>