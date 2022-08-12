<?php 
    /**
     * nav.
     * 
     * @package mywordpresstheme
     */
?>

<nav class="navbar navbar-expand-lg bg-warning sticky-top shadow">
    <div class="container">
        <a class="navbar-brand link-secondary" href="#"><i class="bi bi-house-fill"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link link-secondary" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item link-secondary" href="#">Action</a></li>
                        <li><a class="dropdown-item link-secondary" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item link-secondary" href="#">Something else here</a></li>
                    </ul>
                </li>                
            </ul>
            <form class="d-flex col-lg-3" role="search">                
            <div class="input-group">
                <input class="form-control text-blue border-0 text-secondary" type="search" placeholder="搜尋" aria-label="搜尋">
                <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>
            </div>
            </form>
        </div>
    </div>
</nav>