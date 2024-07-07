<?php
include_once "function.php";
include_once "db/database.php";
check_status();
?>
<!DOCTYPE html>

<html
        lang="en"
        class="light-style layout-menu-fixed"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="asset/"
        data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>BOOKS PAGE</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
          rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="assets/css/demo.css"/>
    <link rel="stylesheet" href="assets/css/books.css">


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>

    <link href="https://cdn.datatables.net/v/bs4/jq-3.7.0/jszip-3.10.1/dt-2.0.7/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.2/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.css"
          rel="stylesheet">

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>


    <style>
        div.dt-container div.row:first-child {
            padding: 20px;
        }

        div.dt-container div.row:last-child {
            padding: 20px;
        }

        div:where(.swal2-container) {
            z-index: 20000 !important;
        }
    </style>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <script src="assets/js/config.js"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                        width="25"
                        viewBox="0 0 25 42"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                            d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                            id="path-1"
                    ></path>
                    <path
                            d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                            id="path-3"
                    ></path>
                    <path
                            d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                            id="path-4"
                    ></path>
                    <path
                            d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                            id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                                id="Triangle"
                                transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="index.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
                <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>

                <li class="menu-item active">
                    <a href="books.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-book"></i>
                        <div data-i18n="Analytics">Books</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="categories.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-category"></i>
                        <div data-i18n="Categories">Categories</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="authors.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-pen"></i>
                        <div data-i18n="Authors">Authors</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav
                    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <!--                    <div class="navbar-nav align-items-center">-->
                    <!--                        <div class="nav-item d-flex align-items-center">-->
                    <!--                            <i class="bx bx-search fs-4 lh-0"></i>-->
                    <!--                            <input-->
                    <!--                                    type="text"-->
                    <!--                                    class="form-control border-0 shadow-none"-->
                    <!--                                    placeholder="Search..."-->
                    <!--                                    aria-label="Search..."-->
                    <!--                            />-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                               data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle"/>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="assets/img/avatars/1.png" alt
                                                         class="w-px-40 h-auto rounded-circle"/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block"><?= $_SESSION['username'] ?></span>
                                                <small class="text-muted"><?= get_user_type() ?></small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="my-3"></div>
                    <div class="card flex-column">
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <div class="col-md-auto">
                                    <h5 class="">ALL BOOKS</h5>
                                </div>
                                <div class="col-md-auto">
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#add_new_book_modal">
                                        <span class="tf-icons bx bx-book-add"></span>&nbsp; Add New Record
                                    </button>
                                    <!-- Modal -->
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="width: auto">Book ID</th>
                                    <th style="width: auto">Book Name</th>
                                    <th style="width: auto">Author</th>
                                    <th style="width: auto">Genre</th>
                                    <th style="width: 5%">Page</th>
                                    <th style="width: 5%">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                <?php
                                foreach (get_all_books() as $book) {
                                    echo '<tr>';
                                    echo '<td>' . strval($book[0]) . '</td>';
                                    echo '<td>' . strval($book[1]) . '</td>';
                                    echo '<td>' . strval($book[2]) . '</td>';
                                    echo '<td>' . strval($book[3]) . '</td>';
                                    echo '<td>' . strval($book[4]) . '</td>';
                                    echo '<td>
                                            <div class="d-flex text-nowrap">
                                                  <button type="button" class="btn btn-sm btn-icon btn-outline-primary" id="book_edit_' . strval($book[0]) . '"><span class="tf-icon bx bx-edit-alt "></span></button>
                                                  <span class="m-1"></span>
                                                  <button type="button" class="btn btn-sm btn-icon btn-outline-danger" id="book_delete_' . strval($book[0]) . '"><span class="tf-icon bx bx-trash"></span></button>
                                            </div>
                                          </td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <!-- Modal -->
                <div class="modal fade" id="add_new_book_modal" data-backdrop="static" data-keyboard="false"
                     tabindex="-1"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">ADD NEW BOOK</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="add_book_form">
                                    <div class="mb-3">
                                        <label class="form-label" for="add_book_name">Book Name</label>
                                        <input type="text" class="form-control" id="add_book_name" name="book_name"
                                               placeholder="John Doe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="add_author">Book Author</label>
                                        <input type="text" class="form-control" id="add_author" name="author"
                                               placeholder="John Doe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="genre" class="form-label">Genre</label>
                                        <select id="genre" class="form-select" name="genre">
                                            <option value="-1" disabled selected>Choose One of Them</option>
                                            <?php
                                            foreach (get_all_genre() as $genre) {
                                                echo '<option value="' . strval($genre[0]) . '">' . strval($genre[1]) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="book_page">Book Page</label>
                                        <input type="text" id="book_page" class="form-control" name="page"
                                               placeholder="123" required>
                                    </div>
                                    <div class="mt-5">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                aria-label="Close">Close
                                        </button>
                                        <button type="submit" name="add_new_book" class="btn btn-primary mx-2"
                                                aria-label="Save">Save
                                        </button>
                                        <button type="reset" class="btn btn-danger" aria-label="Clear Fields">Clear
                                            All
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="edit_book_modal" data-backdrop="static" data-keyboard="false"
                     tabindex="-1"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">EDIT ROW</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="edit_book_form">
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_book_name">Book Name</label>
                                        <input type="text" class="form-control" id="edit_book_name"
                                               name="edit_book_name"
                                               placeholder="John Doe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_author">Book Author</label>
                                        <input type="text" class="form-control" id="edit_author" name="edit_author"
                                               placeholder="John Doe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_genre" class="form-label">Genre</label>
                                        <select id="edit_genre" class="form-select" name="genre">
                                            <option value="-1">Choose One of Them</option>
                                            <?php
                                            foreach (get_all_genre() as $genre) {
                                                echo '<option value="' . strval($genre[0]) . '">' . strval($genre[1]) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_book_page">Book Page</label>
                                        <input type="text" id="edit_book_page" class="form-control" name="edit_page"
                                               placeholder="123" required>
                                    </div>
                                    <div class="mt-5">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                aria-label="Close">Close
                                        </button>
                                        <button type="submit" name="edit_book" id="edit_book"
                                                class="btn btn-primary mx-2" aria-label="Save">Save
                                        </button>
                                        <button type="reset" class="btn btn-danger" aria-label="Clear Fields">Clear
                                            All
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="assets/vendor/js/menu.js"></script>
<script src="assets/js/main.js"></script>
<script src="https://cdn.datatables.net/v/bs4/jq-3.7.0/jszip-3.10.1/dt-2.0.7/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.2/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.2/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="libs/jquery-validation/jquery.validate.min.js"></script>
<script src="libs/jquery-validation/additional-methods.min.js"></script>


<script>
    $(function () {

        let edit_id = null;

        var table = $(".table").DataTable({
            lengthMenu: [
                [10, 25, 50],
                [10, 25, 50]
            ],
            columnDefs: [
                {
                    target: 0,
                    visible: false
                }
            ]
        });

        $('.table tbody').on('click', '[id^="book_edit_"]', function () {
            var data = table.row(this.closest('tr')).data();
            edit_id = data[0];
            $('#edit_book_modal').modal('show');
            $('#edit_book_name').val(data[1]).text();
            $('#edit_author').val(data[2]).text()
            $('#edit_book_page').val(data[4]).text();
            let book_genre = data[3];
            $('#edit_genre option').removeAttr('selected');
            $('#edit_genre option').each(function () {
                if (this.text == book_genre)
                    $(this).attr('selected', 'selected')
                else
                    this.selectedIndex = -1
            })
        });
        $('.table tbody').on('click', '[id^="book_delete_"]', function () {
            var data = table.row(this.closest('tr')).data()[0];
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success mx-3",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: 'db/books.php',
                        data: {
                            delete_book: true,
                            books_id: data
                        },
                        success: function (params) {
                            console.log(params);
                            dataJSON = JSON.parse(params);
                            if (dataJSON['type'] === 'error') {
                                swalWithBootstrapButtons.fire({
                                    title: "Cancelled",
                                    text: 'The record not found',
                                    icon: "error"
                                });
                            } else if (dataJSON['type'] === 'success') {
                                swalWithBootstrapButtons.fire({
                                    toast: true,
                                    title: "Deleted!",
                                    text: "Your record has been deleted.",
                                    icon: "success",
                                    timer: 2000,
                                    timerProgressBar: true
                                }).then(function () {
                                    window.location.reload();
                                })
                            } else {
                                swalWithBootstrapButtons.fire({
                                    toast: true,
                                    title: "Wrong!",
                                    text: "WRONG.",
                                    icon: "error"
                                });
                            }
                        }
                    })

                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your record is safe :)",
                        icon: "error"
                    });
                }
            });

        });

        $('#add_book_form').validate({
            rules: {
                book_name: {
                    minlength: 2
                },
                genre: {
                    required: true
                }
            },
            submitHandler: function (form) {
                $('#add_new_book_modal').modal('hide')
                $.ajax({
                    type: 'POST',
                    url: 'db/books.php',
                    data: {
                        book_name: $("#add_book_name").val(),
                        author: $("#add_author").val(),
                        genre: $("#genre option:selected").text(),
                        page: $("#book_page").val(),
                        add_new_book: ""
                    },
                    success: function (data) {
                        $('#add_book_form').modal('hide')
                        var parseddata = JSON.parse(data);
                        if (parseddata['type'] === 'error') {
                            swal.fire({
                                title: 'ERROR',
                                text: parseddata['msg'],
                                icon: 'error'
                            }).then(function () {
                                $('#add_new_book_modal').modal('show')
                            })
                        } else if (parseddata['type'] === 'success') {
                            swal.fire({
                                title: 'SUCCESS',
                                text: parseddata['msg'],
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500,
                                allowOutsideClick: false
                            }).then(function () {
                                window.location.reload();
                            })
                        } else {
                            swal.fire({
                                title: 'Ooppps',
                                text: 'Something happen',
                                icon: 'info'
                            })
                        }
                    }
                })
            }
        });

        $('#edit_book_form').validate({
            rules: {
                book_name: {
                    minlength: 2
                },
                genre: {
                    required: true
                }
            },
            submitHandler: function (form) {
                $('#edit_book_modal').modal('hide')
                $.ajax({
                    type: 'POST',
                    url: 'db/books.php',
                    data: {
                        books_id: edit_id,
                        book_name: $("#edit_book_name").val(),
                        author: $("#edit_author").val(),
                        genre: $("#edit_genre option:selected").text(),
                        page: $("#edit_book_page").val(),
                        edit_book: true
                    },
                    success: function (data) {
                        $('#edit_book_modal').modal('hide')
                        var parseddata = JSON.parse(data);
                        if (parseddata['type'] === 'error') {
                            swal.fire({
                                title: 'ERROR',
                                text: parseddata['msg'],
                                icon: 'error'
                            }).then(function () {
                                $('#edit_book_modal').modal('show')
                            })
                        } else if (parseddata['type'] === 'success') {
                            swal.fire({
                                title: 'SUCCESS',
                                text: parseddata['msg'],
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500,
                                allowOutsideClick: false
                            }).then(function () {
                                window.location.reload();
                            })
                        } else {
                            swal.fire({
                                title: 'Ooppps',
                                text: 'Something happen',
                                icon: 'info'
                            })
                        }
                    }
                })
            }
        });
    })
</script>
</body>
</html>
