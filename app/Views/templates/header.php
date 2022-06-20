<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>ExcelUploaderCIPHP</title>
</head>

<body>

    <body class="h-100">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center px-4 border-bottom">
                <a href="<?php echo base_url(); ?>/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Excel Uploader</span>
                </a>
                <nav class="navbar navbar-expand-lg d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <?php if (session()->get('isLoggedIn')) {?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0);"
                                        id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Hi <?=$session->get('name')?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>/logout">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } else {?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>/login">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>/register">Register</a>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>