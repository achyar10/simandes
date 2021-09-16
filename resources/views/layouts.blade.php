  <!doctype html>
  <html lang="in">

  <head>
      <!-- SITE TITLE -->
      <meta name="description"
          content="Organisasi Perangkat Daerah dalam Pemerintah Indonesia yang membidangi urusan pemuda olahraga dan Kabudayaan Kabupaten Lembata">
      <!-- Favicon Icon -->
      <link rel="shortcut icon" href="{{ asset('template/assets/images/favicon.ico') }}" />
      <title>Website Resmi Desa Waringin Jaya</title>
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- css_main -->
      <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('frontend/css/add.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
      <!-- css_plugin -->
      <link href="{{ asset('frontend/plugins/swiperjs/swiper.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('frontend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
      <!-- Galeri Image css -->
      <link href="{{ asset('frontend/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />

      <style>
          .pointer {
              cursor: pointer;
          }

      </style>

  </head>

  <body>
      <!-- main menu  -->
      <div class="mainmenu">

          <script language="JavaScript">
              var tanggallengkap = new String();
              var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
              namahari = namahari.split(" ");
              var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
              namabulan = namabulan.split(" ");
              var tgl = new Date();
              var hari = tgl.getDay();
              var tanggal = tgl.getDate();
              var bulan = tgl.getMonth();
              var tahun = tgl.getFullYear();
              tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
          </script>

          @include('header')

      </div>
      <!-- end main menu -->
      <div class="header-spacer"></div>
      <div class="xswiper-topicon-wrap wrapper">
          <!-- full slider xswiper -->
          <div class=" xswiper xswiper-topbanner">
              <div class="xswiper-outer">
                  <!-- Swiper -->
                  <div class="swiper-containerx">
                      <div class="swiper-wrapper">

                          <div class="swiper-slide">
                              <div class="xslide">
                                  <div class="xslide-img">
                                      <a target="_blank" href="https://wa.me/+6281353967028">
                                          <img class="d-only"
                                              src="{{ asset('frontend/images/banner/1629799753_4a299a703cc7d690c35b.jpg') }}"
                                              alt="Dapatkan full source code">
                                          <img class="m-only mt-2"
                                              src="{{ asset('frontend/images/banner/1629799753_4a299a703cc7d690c35b.jpg') }}"
                                              alt="Dapatkan full source code">
                                      </a>
                                  </div>

                              </div>
                          </div>

                          <div class="swiper-slide">
                              <div class="xslide">
                                  <div class="xslide-img">
                                      <a target="_blank" href="https://datagoe.com">
                                          <img class="d-only"
                                              src="public/img/banner/1628074363_2f0cebd6ce68a634f11b.jpg"
                                              alt="Banner Kominfo">
                                          <img class="m-only mt-2"
                                              src="public/img/banner/1628074363_2f0cebd6ce68a634f11b.jpg"
                                              alt="Banner Kominfo">
                                      </a>
                                  </div>

                              </div>
                          </div>
                      </div>
                      <!-- Add Arrows -->
                      <div class="swiper-button-next swiper-button-custom"></div>
                      <div class="swiper-button-prev swiper-button-custom"></div>
                  </div>
              </div>
          </div>
      </div>

      <!-- content -->
      @yield('content')

      <div class="modal fade in" tabindex="-1" role="dialog" id="modalViewsambutan">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="card-body p-0">
                          <p style="text-align:justify; "><img src="public/img/konfigurasi/pimpinan/avatar04.png"
                                  style="float:left; padding: 8px;" height="180" />
                          <p class="MsoNormal"><span open="" sans",="" sans-serif;="" font-size:="" 14.56px;=""
                                  text-align:="" center;"=""
                                  style="color: rgb(80, 93, 105); font-family: Nunito, sans-serif; font-size: 14.56px;">Selamat
                                  datang di Website kami Dinas Pemuda Olahraga dan Kebudayaan Kabupaten Lembata, Website
                                  ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi dan gambaran Dinas
                                  Pemuda Olahraga dan Kebudayaan Kabupaten Lembata dalam Hal Publikasi kepada
                                  masyarakat. Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh
                                  informasi tentang Kebijakan Pemerintah Kabupaten Lembata pengelolaan sektor Kepemudaan
                                  dan Keolahragaan di wilayah Pemerintahan Kabupaten Lembata. </span><span
                                  open="" ",="" sans-serif;="" font-size:="" 14.56px;="" text-align:="" "="" sans",=""
                                  center;"=""
                                  style="color: rgb(80, 93, 105); font-family: Nunito, sans-serif; font-size: 14.56px; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235);">Diharapkan
                                  website ini bisa dijadikan sebagai salah satu media komunikasi yang efektif, dapat
                                  memberikan informasi, layanan yang akurat dan akuntabel untuk membangun <span
                                      lang="EN-US"
                                      style="border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235);">olahraga</span> di
                                  Kabupaten <span lang="EN-US"
                                      style="border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235);">Lembata</span>. </span><span
                                  open="" sans",="" sans-serif;="" font-size:="" 14.56px;="" text-align:="" center;"=""
                                  style="color: rgb(80, 93, 105); font-family: Nunito, sans-serif; font-size: 14.56px;">Dan
                                  sebagai wujud rasa tanggungjawab kami dalam rangka meningkatkan pelayanan kepada
                                  masyarakat, maka kami adakan website dinas ini. Kritik dan saran terhadap kekurangan
                                  dan kesalahan yang ada sangat kami harapkan guna penyempurnaan Website ini dimasa akan
                                  datang. Semoga Website ini memberikan manfaat bagi kita semua. Terima
                                  Kasih..!</span><br></p>
                          </p>
                      </div>
                      <div class="modal-footer p-0">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="viewdata"></div>
      <div class="viewmodal"></div>


      <div class="wrapper">
          <div class="mindex-wrap">
              <div class="hlm-title">
                  <span class="hlm-title-blueborder">
                      <span class="strong">LINK </span>
                      <span>TERKAIT</span>
                  </span>
              </div>
              <div class="mindex-slider">
                  <div class="fotoslider-wrap">
                      <div class="swiper-container-mindex">
                          <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                  <a class="mindex-link" href="http://datagoe.com" target="_blank">
                                      <div class="mindex__icon"><img
                                              src="public/img/linkterkait/1622290218_8e4209769c32cfb55200.png"
                                              alt="mindex"></div>
                                      <div class="mindex__title">Datagoe Software</div>
                                  </a>
                              </div>
                              <div class="swiper-slide">
                                  <a class="mindex-link" href="http://lamafapetarung.lembatakab.go.id" target="_blank">
                                      <div class="mindex__icon"><img
                                              src="public/img/linkterkait/1627970724_892082ae3f90b284cda4.png"
                                              alt="mindex"></div>
                                      <div class="mindex__title">Lamafa Petarung Kab. Lembata</div>
                                  </a>
                              </div>
                              <div class="swiper-slide">
                                  <a class="mindex-link" href="https://humanitarianjournal.com" target="_blank">
                                      <div class="mindex__icon"><img
                                              src="public/img/linkterkait/1622290057_2388015fdb1dea5a299e.png"
                                              alt="mindex"></div>
                                      <div class="mindex__title">Humanitarian Journal</div>
                                  </a>
                              </div>
                              <div class="swiper-slide">
                                  <a class="mindex-link" href="https://www.kemenpora.go.id" target="_blank">
                                      <div class="mindex__icon"><img src="public/img/linkterkait/url.png" alt="mindex">
                                      </div>
                                      <div class="mindex__title">Kementerian Pemuda dan Olahraga</div>
                                  </a>
                              </div>
                              <div class="swiper-slide">
                                  <a class="mindex-link" href="https://www.kominfo.go.id/" target="_blank">
                                      <div class="mindex__icon"><img
                                              src="public/img/linkterkait/1624851972_da31dfea25f48c80a51d.png"
                                              alt="mindex"></div>
                                      <div class="mindex__title">Kementerian Komunikasi dan Informatika</div>
                                  </a>
                              </div>
                              <div class="swiper-slide">
                                  <a class="mindex-link" href="https://lapor.go.id" target="_blank">
                                      <div class="mindex__icon"><img
                                              src="public/img/linkterkait/1627908745_ab42917c19d79ffc3537.png"
                                              alt="mindex"></div>
                                      <div class="mindex__title">LAPOR.GO.ID</div>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- footer  -->
      @include('footer')
      <!-- ============================= back-to-top ============================= -->
      <a id="back-to-top" href="#" class="back-to-top" role="button">
          <span class="fa fa-arrow-up" aria-hidden="true"></span>
      </a>
      <!-- ============================= end-back-to-top ============================= -->
  </body>
  <div class="viewdata"></div>
  <div class="viewmodal"></div>

  <script>
      $(document).ready(function() {
          penawaran();
      });
  </script>

  <script>
      $('.tambahkritik').click(function(e) {

          e.preventDefault();

          $.ajax({
              url: "http://dinasv2.datagoe.com/index.php/kritiksaran/formkritik",
              dataType: "json",
              success: function(response) {
                  $('.viewmodal').html(response.data).show();
                  $('#modalview').modal({
                      backdrop: 'static',
                      keyboard: false
                  });
                  $('#modalview').modal('show');
              },
              error: function(xhr, ajaxOptions, thrownerror) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" +
                      thrownerror);
              }
          });
      });


      $('.btnlihatpoling').click(function(e) {
          // alert('deril')
          e.preventDefault();

          $.ajax({
              url: "http://dinasv2.datagoe.com/index.php/poling/lihatpoling",
              dataType: "json",

              success: function(response) {
                  $('.viewmodal').html(response.data).show();
                  $('#modalview').modal({
                      backdrop: 'static',
                      keyboard: false
                  });
                  $('#modalview').modal('show');
              },
              error: function(xhr, ajaxOptions, thrownerror) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" +
                      thrownerror);
              }
          });
      });

      //view infografis-----------
      function lihatinfo(id_banner) {

          $.ajax({
              type: "post",
              url: "http://dinasv2.datagoe.com/infografis/formlihatinfo",
              data: {
                  id_banner: id_banner
              },
              dataType: "json",

              success: function(response) {
                  if (response.sukses) {

                      $('.viewmodal').html(response.sukses).show();
                      $('#modalview').modal({
                          backdrop: 'static',
                          keyboard: false
                      });
                      $('#modalview').modal('show');

                  }
              },
              error: function(xhr, ajaxOptions, thrownerror) {
                  Swal.fire({
                      title: "Maaf gagal load data!",
                      html: `Silahkan coba kembali Error Code: <strong>${(xhr.status + "\n")}</strong> `,
                      icon: "error",
                      showConfirmButton: false,
                      timer: 3100
                  }).then(function() {
                      window.location = '';
                  })
              }
          });
      }

      //view foto-----------
      function lihatfoto(foto_id, nama_kategori_foto) {

          $.ajax({
              type: "post",
              url: "http://dinasv2.datagoe.com/foto/formlihatfoto",
              data: {
                  foto_id: foto_id,
                  nama_kategori_foto: nama_kategori_foto
              },
              dataType: "json",

              success: function(response) {
                  if (response.sukses) {

                      $('.viewmodal').html(response.sukses).show();
                      $('#modalview').modal({
                          // backdrop: 'static',
                          // keyboard: false
                      });
                      $('#modalview').modal('show');

                  }
              },
              error: function(xhr, ajaxOptions, thrownerror) {
                  Swal.fire({
                      title: "Maaf gagal load data!",
                      html: `Silahkan coba kembali Error Code: <strong>${(xhr.status + "\n")}</strong> `,
                      icon: "error",
                      showConfirmButton: false,
                      timer: 3100
                  }).then(function() {
                      window.location = '';
                  })
              }
          });
      }

      //view agenda-----------
      function lihatagenda(agenda_id) {

          $.ajax({
              type: "post",
              url: "http://dinasv2.datagoe.com/agenda/formlihatagenda",
              data: {
                  agenda_id: agenda_id
              },
              dataType: "json",

              success: function(response) {
                  if (response.sukses) {

                      $('.viewmodal').html(response.sukses).show();
                      $('#modalview').modal({
                          backdrop: 'static',
                          keyboard: false
                      });
                      $('#modalview').modal('show');

                  }
              },
              error: function(xhr, ajaxOptions, thrownerror) {
                  Swal.fire({
                      title: "Maaf gagal load data!",
                      html: `Silahkan coba kembali Error Code: <strong>${(xhr.status + "\n")}</strong> `,
                      icon: "error",
                      showConfirmButton: false,
                      timer: 3100
                  }).then(function() {
                      window.location = '';
                  })
              }
          });
      }


      //view layanan-----------
      function lihatlayanan(informasi_id) {

          $.ajax({
              type: "post",
              url: "http://dinasv2.datagoe.com/layanan/formlihatlayanan",
              data: {
                  informasi_id: informasi_id
              },
              dataType: "json",

              success: function(response) {
                  if (response.sukses) {

                      $('.viewmodal').html(response.sukses).show();
                      $('#modalview').modal({
                          backdrop: 'static',
                          keyboard: false
                      });
                      $('#modalview').modal('show');

                  }
              },
              error: function(xhr, ajaxOptions, thrownerror) {
                  Swal.fire({
                      title: "Maaf gagal load data!",
                      html: `Silahkan coba kembali Error Code: <strong>${(xhr.status + "\n")}</strong> `,
                      icon: "error",
                      showConfirmButton: false,
                      timer: 3100
                  }).then(function() {
                      window.location = '';
                  })
              }
          });
      }


      //view pengumuman-----------
      function lihatpengumuman(informasi_id) {

          $.ajax({
              type: "post",
              url: "http://dinasv2.datagoe.com/pengumuman/formlihatpengumuman",
              data: {
                  informasi_id: informasi_id
              },
              dataType: "json",

              success: function(response) {
                  if (response.sukses) {

                      $('.viewmodal').html(response.sukses).show();
                      $('#modalview').modal({
                          backdrop: 'static',
                          keyboard: false
                      });
                      $('#modalview').modal('show');

                  }
              },
              error: function(xhr, ajaxOptions, thrownerror) {
                  Swal.fire({
                      title: "Maaf gagal load data!",
                      html: `Silahkan coba kembali Error Code: <strong>${(xhr.status + "\n")}</strong> `,
                      icon: "error",
                      showConfirmButton: false,
                      timer: 3100
                  }).then(function() {
                      window.location = '';
                  })
              }
          });
      }

      //bank data
      function updatehits(bankdata_id) {

          $.ajax({
              url: "http://dinasv2.datagoe.com/index.php/bankdata/getbankdata",
              data: {
                  bankdata_id: bankdata_id
              },
              dataType: "json",
              success: function(response) {
                  $('.viewdata').html(response.data);
              }

          });
      }
  </script>

  <script>
      $(function() {

          var url = window.location.pathname,
              urlRegExp = new RegExp(url.replace(/\/$/) +
                  "$"
              ); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
          // now grab every link from the navigation
          $('.menu a').each(function() {
              // and test its normalized href against the url pathname regexp
              if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                  $(this).addClass('active');
              }
          });

      });
  </script>


  <!-- js_plugins -->
  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/swiperjs/swiper.min.js') }}"></script>
  <!-- js_main-->
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  <script src="{{ asset('frontend/js/custom.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Datatable init js -->
  <script src="{{ asset('frontend/js/datatables.init.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('frontend/js/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Galeri Magnific Popup-->
  <script src="{{ asset('frontend/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('frontend/js/gallery.init.js') }}"></script>

  </html>
