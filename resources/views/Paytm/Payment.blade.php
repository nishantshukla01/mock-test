<!doctype html>
<html lang="en">
<head>
    {{--<meta charset="UTF-8">--}}
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Merchant Checkout Page</title>
</head>
<body>
<h1>Please do not refresh this page...</h1>
<form method='post' action='{{$url}}' name='paytm_form'>
    @foreach($paytmParams as $name => $value)
        <input type="hidden" name="{{$name}}" value="{{$value}}">
    @endforeach
    <input type="hidden" name="CHECKSUMHASH" value="{{$checksum}}">
</form>
<script type="text/javascript">
    document.paytm_form.submit();
</script>
</body>
</html>