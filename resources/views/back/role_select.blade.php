<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/lockscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 17:26:41 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pilih ROle</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="middle-box text-center lockscreen animated fadeInDown">
    <div>

        <h3>Masuk sebagai?</h3>
        <p>Akun anda memiliki lebih dari 1 role , pilih salah satu untuk melanjutkan</p>
        {!! Form::open(['route'=>'bo.role_select.post','class'=>'m-t']) !!}
            <div class="form-group">
                {!! Form::select('role_select',$roles,null,['class'=>'form-control','required'=>'true','placeholder'=>'Pilih Role']) !!}
            </div>
            <button type="submit" class="btn btn-primary block full-width">Next</button>
        {!! Form::close() !!}
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582AaN6h071sG%2bQVeRFnR5BCGms8G8XVv0p1zld8yJgdtbIkEsaUHAoeF7dvdOVPiv%2bYEtOyEu%2fV7ncQZ4afO3rHpp%2b2R6B8SdtPEzBiAHAtRR9lwA1g%2bmzEDG9jvNUwzCblYvQ%2b9Z%2bcPXJlz4PWCiv8C7IBS%2fgWufFj4qaTKXfng134ZXMf3YUZq60Aqfb2EH4s6Gj%2fTplr0jzwyoLhTq4eZRBWcDu6z0Sjsq%2bswBff%2bLJnj4qlo4aOz9b4xugj4%2bw%2frWEqrfDMPhgBWj%2fjzOrfOVxTDw8IVZIpa1mY8i569tbI1lGKGM2f8WOGVh1uQa338FbXz7SKFdpOs02Yx5F%2fvLotnZ00GVnpG%2fP7lZtGi%2fn5clJFACWAR8anzOSluWo%2bZ%2bbky55ChgtGTeiML%2bkuWSR0rKcGb%2bQ2GHR0neRAxXRuw6N1pslEM5TtGoJtnR%2f%2fodEXsMgc4GYai5YQtYLj8UxwjQn%2bTZcSGUx6BOmNPaXmzgaa0zDL62RBaj2ktCIA%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/lockscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 17:26:44 GMT -->
</html>
