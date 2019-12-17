<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email</title>

    <script>
        window.open('mailto:?subject={{ $doc->doc_name }}&body={!! $doc->content !!}');
    </script>
</head>
<body>
</body>
</html>