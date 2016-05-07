<!DOCTYPE html>
<html>
  <head>
    <title>SIMPEDU | Semua Laporan</title>
    @include('includes.head')
  </head>

  <body class="hold-transition skin-black-light layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="{{ url('/')}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                  <img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                  <img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
                  &nbsp;&nbsp;<b>SIMPEDU</b>
                </span>
              </a>
            </div>
            <!-- Menu Kiri -->
            <div class="collapse navbar-collapse pull-left">
              <ul class="nav navbar-nav">
                <li><a href="{{ url('laporan') }}">Laporan Saya <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="{{ url('semualaporan') }}">Daftar Laporan</a></li>
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                </div>
              </form>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">Alexander Pierce</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                      <p>
                        Alexander Pierce
                        <small>Bergabung Sejak 5-Mei-2016</small>
                      </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="{{ url('profil') }}" class="btn btn-default btn-flat">Profil</a>
                      </div>
                      <div class="pull-right">
                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-9">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#kesehatan" data-toggle="tab" aria-expanded="true">Kesehatan</a></li>
                    <li class=""><a href="#perhubungan" data-toggle="tab" aria-expanded="false">Perhubungan</a></li>
                    <li class=""><a href="#pendidikan" data-toggle="tab" aria-expanded="false">Pendidikan</a></li>
                    <li class=""><a href="#kependudukan" data-toggle="tab" aria-expaded="false">Kependudukan</a></li>
                    <li class=""><a href="#tenagakerja" data-toggle="tab" aria-expaded="false">Tenaga Kerja</a></li>
                    <li class=""><a href="#polkam" data-toggle="tab" aria-expaded="false">Politik dan Keamanan</a></li>
                    <li class=""><a href="#geografi" data-toggle="tab" aria-expaded="false">Geografi</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="kesehatan">
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Jonathan Burke Jr.</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Sarah Ross</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Jonathan Burke Jr.</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Sarah Ross</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Jonathan Burke Jr.</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Sarah Ross</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Jonathan Burke Jr.</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Sarah Ross</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Jonathan Burke Jr.</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Sarah Ross</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Jonathan Burke Jr.</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Sarah Ross</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Jonathan Burke Jr.</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Sarah Ross</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="perhubungan">
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user5-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Pelapor</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                        <div class="box-footer box-comments">
                          <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="{{ asset('/dist/img/user3-128x128.jpg') }}" alt="user image">
                            <div class="comment-text">
                              <span class="username">
                                Administrator
                                <span class="text-muted pull-right">8:03 PM Today</span>
                              </span><!-- /.username -->
                              It is a long established fact that a reader will be distracted
                              by the readable content of a page when looking at its layout.
                            </div><!-- /.comment-text -->
                          </div><!-- /.box-comment -->
                          <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="{{ asset('/dist/img/user8-128x128.jpg') }}" alt="user image">
                            <div class="comment-text">
                              <span class="username">
                                SKPD Perhubungan
                                <span class="text-muted pull-right">8:03 PM Today</span>
                              </span><!-- /.username -->
                              The point of using Lorem Ipsum is that it has a more-or-less
                              normal distribution of letters, as opposed to using
                              'Content here, content here', making it look like readable English.
                            </div><!-- /.comment-text -->
                          </div><!-- /.box-comment -->
                        </div>
                      </div><!-- /.post -->
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane" id="pendidikan">
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user4-128x128.jpg') }}" alt="user image">
                          <span class="username">
                            <a href="#">Jonathan Burke Jr.</a>
                            <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        {{-- <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                          <!-- <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li> -->
                        </ul> --}}
                      </div><!-- /.post -->
                    </div><!-- /.tab-pane -->
                  </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
              </div>

              <div class="col-md-3">
                  <!-- About Me Box -->
                  <div class="box box-primary">
                    <div class="box-body box-profile" style="height:225px;">
                      <img class="profile-user-img img-responsive img-circle" src="{{asset('/dist/img/user2-160x160.jpg')}}" alt="User profile picture">
                      <h3 class="profile-username text-center">Alexander Pierce</h3>
                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                          <b>Pengaduan Anda</b> <span class="pull-right badge bg-green">10</span>
                        </li>
                        <li class="list-group-item">
                          <b>Telah Ditanggapi</b> <span class="pull-right badge bg-green">2</span>
                        </li>
                      </ul>
                    </div><!-- /.box-body -->
                    <div class="box-body">
                      <strong><i class="fa fa-book margin-r-5"></i>  No. KTP</strong>
                      <p class="text-muted">
                        32760621129010001
                      </p>

                      <hr style="margin-top:2px;margin-bottom:8px;">

                      <strong><i class="fa fa-map-marker margin-r-5"></i> No. Telp</strong>
                      <p class="text-muted">081289087875</p>

                      <hr style="margin-top:2px;margin-bottom:8px;">

                      <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>
                      <p class="text-muted">alexamder@gmail.com</p>

                      <hr style="margin-top:2px;margin-bottom:8px;">

                      <strong><i class="fa fa-map-marker margin-r-5"></i> Jenis Kelamin</strong>
                      <p class="text-muted">Pria</p>

                      <hr style="margin-top:2px;margin-bottom:8px;">

                      <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->

                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Laporan Terbaru</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <strong><i class="fa fa-book margin-r-5"></i>  Pendidikan</strong>
                      <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                      </p>
                      <hr>
                      <strong><i class="fa fa-map-marker margin-r-5"></i> Geografi</strong>
                      <p class="text-muted">Malibu, California</p>
                      <hr>
                      <strong><i class="fa fa-file-text-o margin-r-5"></i> Kependudukan</strong>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                      <hr>
                      <strong><i class="fa fa-map-marker margin-r-5"></i> Geografi</strong>
                      <p class="text-muted">Malibu, California</p>
                      <hr>
                      <strong><i class="fa fa-book margin-r-5"></i>  Pendidikan</strong>
                      <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                      </p>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
          </div>
          <strong>Copyright © 20162017 <a href="http://9tins.com">9Tins Project</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/dist/js/demo.js') }}"></script>
  </body>
</html>
