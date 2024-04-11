<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Status</title>
    <link rel="stylesheet" id="tdb_front_style-css" href="{{url('css/mdb.css')}}" type="text/css" media="all">
</head>
<body>
<div class="container">
    <div class="text-center">
        <h1>{{$headerMsg}}</h1>
        <div class="row">
            <div class="col-sm-2"><b>Txn ID</b></div>
            <div class="col-sm-10">{{$messageList['TXNID']}}</div>
        </div>
        <div class="row">
            <div class="col-sm-2"><b>Order I</b></div>
            <div class="col-sm-10">{{$messageList['ORDERID']}}</div>
        </div>
        <div class="row">
            <div class="col-sm-2"><b>Amount</b></div>
            <div class="col-sm-10">{{$messageList['TXNAMOUNT']}}</div>
        </div>
        <div class="row">
            <div class="col-sm-2"><b>Currency</b></div>
            <div class="col-sm-10">{{$messageList['CURRENCY']}}</div>
        </div>
        <div class="row">
            <div class="col-sm-2"><b>Payment Mode</b></div>
            <div class="col-sm-10">{{$messageList['PAYMENTMODE']}}</div>
        </div>
        <div class="row">
            <div class="col-sm-2"><b>Message</b></div>
            <div class="col-sm-10">{{$messageList['RESPMSG']}}</div>
        </div>

        <b>You will be redirect to the test page automatically or click <a href="javascript:void(0);"
                                                                           onclick="window.location.replace('{{$redirect_to}}')">Here</a>
        </b>
    </div>
</div>
<script>
    window.onload = function () {
        // similar behavior as an HTTP redirect
        setTimeout(function () {
            window.location.replace("{{$redirect_to}}");
        }, 3000);
    }
</script>
</body>
</html>