<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  {{-- bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  {{-- icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  {{-- datatable --}}
  <link rel="stylesheet" href="{{ asset('datatables.min.css') }}">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      /* Remove default body margin */
    }

    #togglebtn {
      display: none;
    }

    .close-btn {
      display: none;
    }

    .sidebar {
      height: 100vh;
      width: 280px;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
      overflow-x: hidden;
      overflow-y: auto;
      padding-top: 56px;
      transition: 0.3s;
    }

    @media (max-width: 991px) {
      .sidebar {
        left: -280px;
      }

      .sidebar.show {
        left: 0;
      }

      #togglebtn {
        display: block;
      }

      .close-btn {
        display: block;
      }
    }

    .sidebar a {
      padding: 15px;
      text-decoration: none;
      font-size: 18px;
      color: #f1f1f1;
      display: block;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background: linear-gradient(to right, #495057, #343a40);
    }

    .sidebar .close-btn {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 30px;
      color: #f1f1f1;
      cursor: pointer;
    }

    .navbar {
      background: linear-gradient(to right, #fff, #e0e0e0);
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: bold;
      color: #343a40;
    }

    .navbar-toggler-icon {
      background-color: #343a40;
    }

    .navbar-toggler {
      border-color: #343a40;
    }

    .container-fluid {
      padding: 20px;
    }

    h2 {
      color: #343a40;
    }

    .btn-dark {
      background: linear-gradient(to right, #343a40, #6c757d);
      border-color: #343a40;
    }

    .btn-dark:hover {
      background: linear-gradient(to right, #495057, #343a40);
      border-color: #495057;
    }

    #page-content-wrapper {
      width: 100%;
      padding-left: 280px;
      /* Adjust this value to match the sidebar width */
      transition: 0.3s;
    }

    @media (max-width: 991px) {
      #page-content-wrapper {
        padding-left: 0;
      }
    }

    .box {
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      padding: 20px;
      text-align: center;
      transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
      cursor: pointer;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .box:hover {
      transform: scale(1.05);
      background-color: lime;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .box h4 {
      color: #343a40;
      margin-bottom: 10px;
    }

    .box-value {
      font-size: 24px;
      color: #007bff;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <div class="d-flex">
    {{-- HEADER --}}
    @include('admin.header')
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light">
        <img src="{{ asset('logos/trendbazaar-high-resolution-logo-transparent.png') }}" style="width: 130px"
          alt="">
        <button class="btn btn-dark" id="togglebtn" onclick="toggleSidebar()">&#9776;</button>
      </nav>
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  {{-- sweetalert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{ asset('datatables.min.js') }}"></script>
  <script>
    // sweetalert
    document.addEventListener('DOMContentLoaded', function() {
      var deleteButtons = document.querySelectorAll('.delete-btn');

      deleteButtons.forEach(function(button) {
        // Add a click event listener to each delete button
        button.addEventListener('click', function(event) {
          event.preventDefault();

          Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            customClass: {
              confirmButton: 'btn btn-danger',
              cancelButton: 'btn btn-outline-secondary'
            }
          }).then((result) => {

            if (result.isConfirmed) {
              document.getElementById('delete-form-' + button.getAttribute('data-admin-id')).submit();

              Swal.fire(
                'Deleted!',
                'The record has been deleted.',
                'success'
              );
            }
          });
        });
      });
    });
    // datatable
    $(document).ready(function() {
      $('#myDataTable').DataTable({
        scrollY: '410px',
      });
    });

    // sidebar
    function toggleSidebar() {
      $(".sidebar").toggleClass("show");
    }

    // show image when user select
    $(document).ready(function() {
      $('#imageInput').on('change', function(e) {
        var files = e.target.files;
        var imagePreviews = $('#imagePreviews');

        // Clear existing previews
        imagePreviews.empty();

        // Limit to 5 images
        var maxImages = 4;
        var numImages = Math.min(files.length, maxImages);

        for (var i = 0; i < numImages; i++) {
          var reader = new FileReader();
          reader.onload = function(e) {
            var preview = $('<div class="col-md-2 text-center"><img class="text-center preview-image" src="' + e
              .target.result +
              '" width="125" height="125" style="object-fit: contain; max-width: 100%; max-height: 100%;" alt="Preview Image"></div>'
            );
            imagePreviews.append(preview);
          };
          reader.readAsDataURL(files[i]);
        }
      });
    });
  </script>
</body>

</html>
