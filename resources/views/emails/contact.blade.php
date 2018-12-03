<html>
<head>
    <title>Contact from BAIFGC</title>
</head>
<body>
<h4>Message from {{ $contact->fullname }} - ({{ $contact->email }})</h4>

<p>
    His message: <br>
    <q>{{  $contact->message  }}</q>
</p>
</body>
</html>