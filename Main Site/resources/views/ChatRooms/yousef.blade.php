<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Course Room</title>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Roboto", sans-serif;
        }

        header {
            z-index: 1;
            position: fixed;
            background: #22242A;
            padding: 20px;
            width: calc(100% - 0%);
            top: 0;
            height: 30px;
        }

        .left_area h3 {
            color: #fff;
            margin: 0;
            text-transform: uppercase;
            font-size: 22px;
            font-weight: 900;
        }

        .left_area span {
            color: #19B3D3;
        }

        .sidebar {
            z-index: 1;
            top: 0;
            background: #2f323a;
            margin-top: 70px;
            padding-top: 30px;
            position: fixed;
            left: 0;
            width: 250px;
            height: calc(100% - 9%);
            transition: 0.5s;
            transition-property: left;
            overflow-y: auto;
        }

        .profile_info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .sidebar .profile_info .profile_image {
            width: 100px;
            height: 100px;
            border-radius: 100px;
            margin-bottom: 10px;
        }

        .sidebar .profile_info h4 {
            color: #ccc;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #fff;
            display: block;
            width: 100%;
            line-height: 60px;
            text-decoration: none;
            padding-left: 40px;
            box-sizing: border-box;
            transition: 0.5s;
            transition-property: background;
        }

        .sidebar a:hover {
            background: #19B3D3;
        }

        .sidebar i {
            padding-right: 10px;
        }

        label #sidebar_btn {
            z-index: 1;
            color: #fff;
            position: fixed;
            cursor: pointer;
            left: 300px;
            font-size: 20px;
            margin: 5px 0;
            transition: 0.5s;
            transition-property: color;
        }

        label #sidebar_btn:hover {
            color: #19B3D3;
        }

        #check:checked ~ .sidebar {
            left: -185px;
        }

        #check:checked ~ .sidebar a span {
            display: none;
        }

        #check:checked ~ .sidebar a {
            font-size: 20px;
            margin-left: 165px;
            width: 100%;
        }

        .content {
            width: (100% -250px);
            margin-top: 60px;
            padding: 20px;
            margin-left: 250px;
            background: url(background.png) no-repeat;
            background-position: center;
            background-size: cover;
            height: 100vh;
            transition: 0.5s;
        }

        #check:checked ~ .content {
            margin-left: 60px;
        }

        #check:checked ~ .sidebar .profile_info {
            display: none;
        }

        #check {
            display: none;
        }

        .mobile_nav {
            display: none;
        }

        .content .card p {
            background: #fff;
            padding: 15px;
            margin-bottom: 10px;
            font-size: 14px;
            opacity: 0.8;
        }

        /* Responsive CSS */

        @media screen and (max-width: 780px) {
            .sidebar {
                display: none;
            }

            #sidebar_btn {
                display: none;
            }

            .content {
                margin-left: 0;
                margin-top: 0;
                padding: 10px 20px;
                transition: 0s;
            }

            #check:checked ~ .content {
                margin-left: 0;
            }

            .mobile_nav {
                display: block;
                width: calc(100% - 0%);
            }

            .nav_bar {
                background: #222;
                width: (100% -0px);
                margin-top: 70px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 20px;
            }

            .nav_bar .mobile_profile_image {
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }

            .nav_bar .nav_btn {
                color: #fff;
                font-size: 22px;
                cursor: pointer;
                transition: 0.5s;
                transition-property: color;
            }

            .nav_bar .nav_btn:hover {
                color: #19B3D3;
            }

            .mobile_nav_items {
                background: #2F323A;
                display: none;
            }

            .mobile_nav_items a {
                color: #fff;
                display: block;
                text-align: center;
                letter-spacing: 1px;
                line-height: 60px;
                text-decoration: none;
                box-sizing: border-box;
                transition: 0.5s;
                transition-property: background;
            }

            .mobile_nav_items a:hover {
                background: #19B3D3;
            }

            .mobile_nav_items i {
                padding-right: 10px;
            }

            .active {
                display: block;
            }
        }
    </style>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
</head>
<body oncontextmenu='return false' class='snippet-body'>
<input type="checkbox" id="check">
<header>
    <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
        <h3>Course Room</h3>
    </div>
    <div class="right_area">
    </div>
</header>

<div class="sidebar">
    <div class="profile_info">
        <img src="https://i.imgur.com/iQpdHb2.jpg" class="profile_image" alt="">
        <h4>Williamson</h4>
    </div>
    <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
    <a href="#"><i class="fas fa-cogs"></i><span>Components</span></a>
    <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
    <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>
    <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
    <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
</div>

<div class="content">
    <div class="card">
        <iframe src="https://che-eclipse-che.yousefkhrais.site"></iframe>
    </div>
</div>

<script type='text/javascript'></script>
</body>
</html>
