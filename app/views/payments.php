<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="QBDigitals" name="description" />
    <meta name="author" content="qbdigitals.com.tr" />

    <title>QBDigitals | Müşteri</title>
    <!-- ================= Favicon ================== -->
    <link href="../public/icons/apple-icon-180x180.png" rel="apple-touch-icon" sizes="144x144">
    <link href="../public/icons/favicon2.ico" rel="shortcut icon">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet"/>
    <link href="../public/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../public/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../public/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../public/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/lib/helper.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
</head>

<body>
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo">
                <a href="index.html">
                    <img class="responsive-img" height="50%" src="../public/images/qbdigitals.png" width="40%">
                </a>
            </div>
            <hr class="bg-transparent">
            <ul class="mt-5">
                <li><a href="index.html"><i class="mdi mdi-home"></i> Anasayfa </a></li>
                <li><a href="customer_detail.html"><i class="mdi mdi-account"></i> Hesabım </a></li>
                <li><a href="products.html"><i class="mdi mdi-star-circle"></i> Ürünler </a></li>
                <li><a href="new_order.html"><i class="mdi mdi-plus-circle"></i> Sipariş Oluştur </a></li>
                <li><a href="payments.html"><i class="mdi mdi-square-inc-cash"></i> Ödemeler </a></li>
                <li><a class="sidebar-sub-toggle"><i class="mdi mdi-bookmark"></i> Siparişlerim <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="orders.html">Tüm Siparişlerim</a></li>
                        <li><a href="active_orders.html">Aktif Siparişlerim</a></li>
                        <li><a href="complated_orders.html">Onaylanan Siparişlerim</a></li>
                        <li><a href="delivered_orders.html">Teslim Edilen Siparişlerim</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->

<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">
                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <i class="ti-bell text-white"></i>
                            <div class="pulse-css"></div>
                            <div class="drop-down dropdown-menu dropdown-menu-right">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">Recent Notifications</span>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img class="pull-left m-r-10 avatar-img"
                                                     src="../public/images/avatar/3.jpg" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34
                                                        PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">5 members joined today </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img class="pull-left m-r-10 avatar-img"
                                                     src="../public/images/avatar/3.jpg" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34
                                                        PM</small>
                                                    <div class="notification-heading">Mariam</div>
                                                    <div class="notification-text">likes a photo of you</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img class="pull-left m-r-10 avatar-img"
                                                     src="../public/images/avatar/3.jpg" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34
                                                        PM</small>
                                                    <div class="notification-heading">Tasnim</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you
                                                        ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img class="pull-left m-r-10 avatar-img"
                                                     src="../public/images/avatar/3.jpg" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34
                                                        PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you
                                                        ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="text-center">
                                            <a href="#" class="more-link">See All</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <img alt="User Image" src="../public/images/avatar/profile.jpg" style="height: 30px; border-radius: 0.25rem;">
                            <span class="user-avatar text-white">Enes Demirel
                                  <i class="ti-angle-down f-s-10"></i>
                              </span>
                            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                <img alt="User Image" class="ml-3" src="../public/images/avatar/profile.jpg" style="height: 30px; border-radius: 0.25rem;">
                                Enes Demirel <small class="ml-5">enes@quatrading.com</small>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app_profile.html">
                                                <i class="ti-user"></i>
                                                <span>Profil</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html">
                                                <i class="ti-power-off"></i>
                                                <span>Çıkış Yap</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid mb-5">
            <section id="main-content">
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card animate__animated animate__fadeInLeft">
                            <div class="card-header card-header-border-bottom bg-white">
                                <h2>Ödemeler</h2>
                            </div>
                            <div class="p-5 mt-5">
                                <div style="    border: 1px;
                              border-style: solid;
                              border-radius: 5px;
                              margin-bottom: 5px;
                              border-color: #00000026;" class="row">
                                    <div class="col-sm-3 mb-2">
                                        Exporter
                                        <select id="exporter" class="selectpicker form-control" data-live-search=true name="exporter">
                                            <option value="" selected>QUA</option>
                                            <option value="" selected>BIEN</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-2">
                                        Invoıce
                                        <select id="Invoıce" class="selectpicker form-control" data-live-search=true name="Invoıce">
                                            <option value="" selected>F25/2022000000812</option>
                                            <option value="" selected>F3/2022000000347</option>
                                            <option value="" selected>F25/2022000000813</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 mb-2">
                                        Date
                                        <select id="date" class="selectpicker form-control" data-live-search=true name="date">
                                            <option value="" selected>17.09.2022</option>
                                            <option value="" selected>17.07.2022</option>
                                            <option value="" selected>17.09.2022</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-8">

                                        <button style="margin-top:27px" id="search" type="submit" name="insertproductform" class="btn btn-outline-secondary btn-sm"><b>Search</b></button>

                                    </div>


                                </div>
                                <div class="table-responsive">
                                    <table id="rejectedcostlist" class="display" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th class="text-custom text-center">Exporter</th>
                                            <th class="text-custom text-center">Invoıce</th>
                                            <th class="text-custom text-center">Date</th>
                                            <th class="text-custom text-center">Cr</th>
                                            <th class="text-custom text-center">Amount</th>
                                            <th class="text-custom text-center">Overdue</th>
                                            <th class="text-custom text-center">Statu</th>
                                            <th class="text-custom text-center">Swıft</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td align="center">QUA</td>
                                            <td align="center">F25/2022000000812</td>
                                            <td align="center">17.09.2022</td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                        </tr>
                                        <tr>
                                            <td align="center">BIEN</td>
                                            <td align="center">F3/2022000000347</td>
                                            <td align="center">17.07.2022</td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                        </tr>
                                        <tr>
                                            <td align="center">QUA</td>
                                            <td align="center">F25/2022000000813</td>
                                            <td align="center">17.09.2022</td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                            <td align="center"></td>
                                        </tr>
                                        <tr>
                                            <td align="center">QUA</td>
                                            <td align="center">T3</td>
                                            <td align="center">18.07.2022</td>
                                            <td align="center">30X60</td>
                                            <td align="center">DEKOR</td>
                                            <td align="center">STANDART</td>
                                            <td align="center">30X60 IMPERIAL GREY DECOR</td>
                                            <td align="center">30X60</td>
                                        </tr>
                                        <tr>
                                            <td align="center">QUA</td>
                                            <td align="center">T3</td>
                                            <td align="center">20.06.2022</td>
                                            <td align="center">30X60</td>
                                            <td align="center">DEKOR</td>
                                            <td align="center">STANDART</td>
                                            <td align="center">30X60 IMPERIAL GREY DECOR</td>
                                            <td align="center">30X60</td>
                                        </tr>
                                        <tr>
                                            <td align="center">QUA</td>
                                            <td align="center">T3</td>
                                            <td align="center">17.09.2022</td>
                                            <td align="center">30X60</td>
                                            <td align="center">DEKOR</td>
                                            <td align="center">STANDART</td>
                                            <td align="center">30X60 IMPERIAL GREY DECOR</td>
                                            <td align="center">30X60</td>
                                        </tr>
                                        <tr>
                                            <td align="center">BIEN</td>
                                            <td align="center">T3</td>
                                            <td align="center">4.10.2022</td>
                                            <td align="center">30X60</td>
                                            <td align="center">DEKOR</td>
                                            <td align="center">STANDART</td>
                                            <td align="center">30X60 IMPERIAL GREY DECOR</td>
                                            <td align="center">30X60</td>
                                        </tr>
                                        <tr>
                                            <td align="center">QUA</td>
                                            <td align="center">T3</td>
                                            <td align="center">4.10.2022</td>
                                            <td align="center">30X60</td>
                                            <td align="center">DEKOR</td>
                                            <td align="center">STANDART</td>
                                            <td align="center">30X60 IMPERIAL GREY DECOR</td>
                                            <td align="center">30X60</td>
                                        </tr>
                                        <tr>
                                            <td align="center">BIEN</td>
                                            <td align="center">T3</td>
                                            <td align="center">10.10.2022</td>
                                            <td align="center">30X60</td>
                                            <td align="center">DEKOR</td>
                                            <td align="center">STANDART</td>
                                            <td align="center">30X60 IMPERIAL GREY DECOR</td>
                                            <td align="center">30X60</td>
                                        </tr>
                                        <tr>
                                            <td align="center">BIEN</td>
                                            <td align="center">T3</td>
                                            <td align="center">3.10.2022</td>
                                            <td align="center">30X60</td>
                                            <td align="center">DEKOR</td>
                                            <td align="center">STANDART</td>
                                            <td align="center">30X60 IMPERIAL GREY DECOR</td>
                                            <td align="center">30X60</td>
                                        </tr>
                                        <tr>
                                            <td align="center">QUA</td>
                                            <td align="center">T3</td>
                                            <td align="center">12.09.2022</td>
                                            <td align="center">30X60</td>
                                            <td align="center">DEKOR</td>
                                            <td align="center">STANDART</td>
                                            <td align="center">30X60 IMPERIAL GREY DECOR</td>
                                            <td align="center">30X60</td>
                                        </tr>
                                        <tr>
                                            <td align="center">BIEN</td>
                                            <td align="center">T3</td>
                                            <td align="center">7.07.2022</td>
                                            <td align="center">30X60</td>
                                            <td align="center">DEKOR</td>
                                            <td align="center">STANDART</td>
                                            <td align="center">30X60 IMPERIAL GREY DECOR</td>
                                            <td align="center">30X60</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>Copyright © 2022 All right reserved.</p>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>
<!-- jquery vendor -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../public/js/lib/jquery.nanoscroller.min.js"></script>
<!-- nano scroller -->
<script src="../public/js/lib/menubar/sidebar.js"></script>
<script src="../public/js/lib/preloader/pace.min.js"></script>
<!-- sidebar -->

<!-- bootstrap -->
<script src="../public/js/lib/bootstrap.min.js"></script>
<script src="../public/js/scripts.js"></script>
<!-- scripit init-->
<script src="../public/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#rejectedcostlist').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            }
        });
    });
</script>
</body>
</html>
