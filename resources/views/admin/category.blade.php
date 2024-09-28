<!doctype html>
<html lang="en" data-bs-theme="light">


<!-- Mirrored from codervent.com/matoxi/demo/vertical-menu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Sep 2024 08:59:03 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Metoxi | Bootstrap 5 Admin Dashboard Template</title>
  <!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/simplebar/css/simplebar.css">
  <!--bootstrap css-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <!--main css-->
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="sass/main.css" rel="stylesheet">
  <link href="sass/dark-theme.css" rel="stylesheet">
  <link href="sass/semi-dark.css" rel="stylesheet">
  <link href="sass/bordered-theme.css" rel="stylesheet">
  <link href="sass/responsive.css" rel="stylesheet">

</head>

<body>

    <!--start header-->
    @include('parts.navbar')
    <!--end top header-->


    <!--start sidebar-->
    @include('parts.sidebar')
  <!--end sidebar-->


    <!--start main wrapper-->
    <main class="main-wrapper">
      <div class="main-content">
        <form action="{{ route('category.add') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Category Name" name="category_input" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Category</button>
        </form>
        <div class="row mt-5">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $category)
                                <tr>
                                    <td>{{ $category->category_title }}</td>
                                    <td>
                                        <a href="{{ url('delete_category', $category->id) }}" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

      </div>
    </main>
    <!--end main wrapper-->

    <!--start overlay-->
      <div class="overlay btn-toggle"></div>
    <!--end overlay-->

   <!--start footer-->
   <footer class="page-footer">
    <p class="mb-0">Copyright © 2023. All right reserved.</p>
  </footer>
  <!--top footer-->

    <!--start cart-->

    <!--end cart-->

    <!--start switcher-->
    <button class="btn btn-primary position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
      <i class="material-icons-outlined">tune</i>Customize
    </button>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
      <div class="offcanvas-header border-bottom h-70">
        <div class="">
          <h5 class="mb-0">Theme Customizer</h5>
          <p class="mb-0">Customize your theme</p>
        </div>
        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
          <i class="material-icons-outlined">close</i>
        </a>
      </div>
      <div class="offcanvas-body">
        <div>
          <p>Theme variation</p>

          <div class="row g-3">
            <div class="col-12 col-xl-6">
              <input type="radio" class="btn-check" name="theme-options" id="LightTheme" checked>
              <label class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4" for="LightTheme">
                <span class="material-icons-outlined">light_mode</span>
                <span>Light</span>
              </label>
            </div>
            <div class="col-12 col-xl-6">
              <input type="radio" class="btn-check" name="theme-options" id="DarkTheme">
              <label class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4" for="DarkTheme">
                <span class="material-icons-outlined">dark_mode</span>
                <span>Dark</span>
              </label>
            </div>
            <div class="col-12 col-xl-6">
              <input type="radio" class="btn-check" name="theme-options" id="SemiDarkTheme">
              <label class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4" for="SemiDarkTheme">
                <span class="material-icons-outlined">contrast</span>
                <span>Semi Dark</span>
              </label>
            </div>
            <div class="col-12 col-xl-6">
              <input type="radio" class="btn-check" name="theme-options" id="BoderedTheme">
              <label class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4" for="BoderedTheme">
                <span class="material-icons-outlined">border_style</span>
                <span>Bordered</span>
              </label>
            </div>
          </div><!--end row-->

        </div>
      </div>
    </div>
    <!--start switcher-->


  <!--bootstrap js-->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
  <script src="assets/js/index.js"></script>
  <script src="assets/plugins/peity/jquery.peity.min.js"></script>
  <script>
    $(".data-attributes span").peity("donut")
  </script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/js/main.js"></script>


</body>


<!-- Mirrored from codervent.com/matoxi/demo/vertical-menu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Sep 2024 08:59:56 GMT -->
</html>
