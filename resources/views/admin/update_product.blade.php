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
  <base href="/public">
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />

  <!-- End layout styles -->
  <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
          <div class="container-fluid page-body-wrapper">
              <!-- main-panel starts -->
              <div class="main-panel">
                <div class="content-wrapper">
                  <div class="container mt-5">
                    <h1 class="text-center mb-4">Edit Product</h1>
                    <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf


                      <div class="form-group">
                          <label for="title">Product Title:</label>
                          <input type="text" name="title" id="title" placeholder="Write a title" class="form-control" value="{{$product->title}}">
                      </div>
                      <div class="form-group">
                          <label for="description">Product Description:</label>
                          <input type="text" name="description" id="description" placeholder="Write a description" class="form-control" value="{{$product->description}}">
                      </div>

                      <div class="form-group">
                          <label for="price">Product Price:</label>
                          <input type="number" name="price" id="price" placeholder="Write a price" class="form-control" value="{{$product->price}}">
                      </div>
                      <div class="form-group">
                          <label for="discount_price">Discount Price:</label>
                          <input type="text" name="discount_price" id="discount_price" placeholder="Write discount price" class="form-control" value="{{$product->discount_price}}">
                      </div>
                      <div class="form-group">
                          <label for="quantity">Product Quantity:</label>
                          <input type="number" name="quantity" id="quantity" min="0" placeholder="Write product quantity" class="form-control" value="{{$product->quantity}}">
                      </div>

                      <div class="form-group">
                          <label for="category">Product Category:</label>
                          <select class="form-control" name="category" id="category">
                              <option value="{{$product->category}}" selected>{{$product->category}}</option>
                              @foreach($category as $category)
                                  <option value="{{$category->category_title}}">{{$category->category_title}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group text-center">
                          <label>Current Image:</label>
                          <div class="mb-3">
                              <img style="margin: auto;" height="100" width="100" src="/product/{{$product->image}}" alt="Current Product Image">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="image">Product Image:</label>
                          <input type="file" name="image" id="image" class="form-control-file" required>
                      </div>

                      <div class="form-group text-center">
                          <input type="submit" class="btn btn-primary" value="Update Product">
                          <a class="btn btn-secondary" href="{{ route('products.show') }}">Return Back</a>
                      </div>
                  </form>
              </div>

              <!-- main-panel ends -->
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
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
      <!-- End custom js for this page -->
      <script>
          @if (Session()->has('message'))
            toastr.success("{{ Session()->get('message') }}");
          @endif
        </script>

</body>


<!-- Mirrored from codervent.com/matoxi/demo/vertical-menu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Sep 2024 08:59:56 GMT -->
</html>
