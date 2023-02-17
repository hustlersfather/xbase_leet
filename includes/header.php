
<?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: login.html");
    exit();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
?>

<!DOCTYPE html>
<html class="theme-light">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="alfacoins-site-verification" content="5ef8c2279aa605ef8c2279aa965ef8c2279aacb_ALFAcoins">
        <meta name="revisit-after" content="2 days">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
        <script async="" src="https://embed.tawk.to/60bb67b9dd60a20abbe4bab4/1f7e0qbvo" charset="UTF-8" crossorigin="*"></script><script src="cdn-cgi/apps/head/5OOZijtrf_Bpx-OYIJIWKuxGuQM.js"></script>
        <link rel="stylesheet" href="data:text/css;charset=utf-8;base64,Y2xvdWRmbGFyZS1hcHBbYXBwPSJjb3JuZXItcmliYm9uIl0gewogIHBvaW50ZXItZXZlbnRzOiBub25lOwogIHBvc2l0aW9uOiBmaXhlZDsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwPSJjb3JuZXItcmliYm9uIl0gLnJpYmJvbi1jb250ZW50IHsKICBib3JkZXI6IDA7CiAgYm94LXNoYWRvdzogMCAwIDNweCByZ2JhKDAsIDAsIDAsIC4zKTsKICBib3gtc2l6aW5nOiBib3JkZXItYm94OwogIGN1cnNvcjogZGVmYXVsdDsKICBoZWlnaHQ6IDNlbTsKICBsZXR0ZXItc3BhY2luZzogLjAzZW07CiAgbGluZS1oZWlnaHQ6IDEuMTsKICBvdmVyZmxvdzogaGlkZGVuOwogIHBhZGRpbmc6IDFlbSAwOwogIHBvc2l0aW9uOiBhYnNvbHV0ZTsKICB0ZXh0LWFsaWduOiBjZW50ZXI7CiAgdGV4dC1kZWNvcmF0aW9uOiBub25lOwogIHRleHQtb3ZlcmZsb3c6IGVsbGlwc2lzOwogIHRyYW5zZm9ybS1vcmlnaW46IDAgMDsKICB3aGl0ZS1zcGFjZTogbm93cmFwOwogIHdpZHRoOiAxNDEuNDIxMzU2JTsgLyogc3FydCgyKSAqLwp9CgpjbG91ZGZsYXJlLWFwcFthcHA9ImNvcm5lci1yaWJib24iXSAucmliYm9uLWNvbnRlbnRbaHJlZl0gewogIGN1cnNvcjogcG9pbnRlcjsKICBwb2ludGVyLWV2ZW50czogYWxsOwp9CgpjbG91ZGZsYXJlLWFwcFthcHA9ImNvcm5lci1yaWJib24iXSAucmliYm9uLWNvbnRlbnRbaHJlZl0sCmNsb3VkZmxhcmUtYXBwW2FwcD0iY29ybmVyLXJpYmJvbiJdIC5yaWJib24tY29udGVudFtocmVmXTpsaW5rLApjbG91ZGZsYXJlLWFwcFthcHA9ImNvcm5lci1yaWJib24iXSAucmliYm9uLWNvbnRlbnRbaHJlZl06aG92ZXIsCmNsb3VkZmxhcmUtYXBwW2FwcD0iY29ybmVyLXJpYmJvbiJdIC5yaWJib24tY29udGVudFtocmVmXTphY3RpdmUgewogIGNvbG9yOiBpbmhlcml0OwogIG91dGxpbmU6IG5vbmU7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcD0iY29ybmVyLXJpYmJvbiJdIC5yaWJib24tY29udGVudFtocmVmXTpob3ZlciB7CiAgb3BhY2l0eTogLjg7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcD0iY29ybmVyLXJpYmJvbiJdW2RhdGEtc2l6ZT0ic21hbGwiXSAgewogIGZvbnQtc2l6ZTogMC44NWVtOwp9CgpjbG91ZGZsYXJlLWFwcFthcHA9ImNvcm5lci1yaWJib24iXVtkYXRhLXNpemU9Im5vcm1hbCJdIHsKICBmb250LXNpemU6IDEuMDBlbTsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwPSJjb3JuZXItcmliYm9uIl1bZGF0YS1zaXplPSJsYXJnZSJdIHsKICBmb250LXNpemU6IDEuMjVlbTsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwPSJjb3JuZXItcmliYm9uIl1bZGF0YS1zaXplPSJodWdlIl0gewogIGZvbnQtc2l6ZTogMS41MGVtOwp9CgoKY2xvdWRmbGFyZS1hcHBbYXBwPSJjb3JuZXItcmliYm9uIl1bZGF0YS1wb3NpdGlvbj0idG9wLWxlZnQiXSB7CiAgdG9wOiAwOwogIGxlZnQ6IDA7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcD0iY29ybmVyLXJpYmJvbiJdW2RhdGEtcG9zaXRpb249InRvcC1yaWdodCJdIHsKICB0b3A6IDA7CiAgcmlnaHQ6IDA7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcD0iY29ybmVyLXJpYmJvbiJdW2RhdGEtcG9zaXRpb249ImJvdHRvbS1sZWZ0Il0gewogIGJvdHRvbTogMDsKICBsZWZ0OiAwOwp9CgpjbG91ZGZsYXJlLWFwcFthcHA9ImNvcm5lci1yaWJib24iXVtkYXRhLXBvc2l0aW9uPSJib3R0b20tcmlnaHQiXSB7CiAgYm90dG9tOiAwOwogIHJpZ2h0OiAwOwp9CgpjbG91ZGZsYXJlLWFwcFthcHA9ImNvcm5lci1yaWJib24iXVtkYXRhLXBvc2l0aW9uPSJ0b3AtbGVmdCJdIC5yaWJib24tY29udGVudCB7CiAgdHJhbnNmb3JtOiByb3RhdGUoLTQ1ZGVnKTsKICB0b3A6IDEwMCU7CiAgbGVmdDogLTIuMTIxMzJlbTsKICBtYXJnaW4tdG9wOiAtMi4xMjEzMmVtOwp9CgpjbG91ZGZsYXJlLWFwcFthcHA9ImNvcm5lci1yaWJib24iXVtkYXRhLXBvc2l0aW9uPSJ0b3AtcmlnaHQiXSAucmliYm9uLWNvbnRlbnQgewogIHRyYW5zZm9ybTogcm90YXRlKDQ1ZGVnKTsKICBsZWZ0OiAyLjEyMTMyZW07CiAgdG9wOiAtMi4xMjEzMmVtOwp9CgpjbG91ZGZsYXJlLWFwcFthcHA9ImNvcm5lci1yaWJib24iXVtkYXRhLXBvc2l0aW9uPSJib3R0b20tbGVmdCJdIC5yaWJib24tY29udGVudCB7CiAgdHJhbnNmb3JtOiByb3RhdGUoNDVkZWcpOwp9CgpjbG91ZGZsYXJlLWFwcFthcHA9ImNvcm5lci1yaWJib24iXVtkYXRhLXBvc2l0aW9uPSJib3R0b20tcmlnaHQiXSAucmliYm9uLWNvbnRlbnQgewogIHRyYW5zZm9ybTogcm90YXRlKC00NWRlZyk7CiAgdG9wOiAxMDAlOwp9Cg==">
        <link rel="shortcut icon" href="favicon.ico.png">
        <title>OdinShop</title>
        <link rel="stylesheet" href="files/bootstrap/3/css/bootstrap.min.css">
        <script src="files/bootstrap/3/js/jquery-3.4.1.min.js"></script>
        <script src="files/js/clipboard.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="files/bootstrap/3/js/bootstrap.min.js"></script>
        <script src="files/js/bootbox.min.js"></script>
        <link rel="stylesheet" type="text/css" href="files/css/flags.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/css/mdb.min.css" integrity="sha512-hj9rznBPdFg9A4fACbJcp4ttzdinMDtPrtZ3gBD11DiY3O1xJfn0r1U5so/J0zwfGOzq9teIaH5rFmjFAFw8SA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/js/mdb.min.js" integrity="sha512-XFd1m0eHgU1F05yOmuzEklFHtiacLVbtdBufAyZwFR0zfcq7vc6iJuxerGPyVFOXlPGgM8Uhem9gwzMI8SJ5uw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <style type="text/css">
        /* Chart.js */
            @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
        </style>
        
        <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-177092549-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());p poop
            gtag('set', {'$usrid': 'USER_ID'}); // Set the user ID using signed-in user_id.
            gtag('config', 'UA-177092549-1');
        </script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="files/css/main.css">
        <link rel="stylesheet" href="files/css/util.css">
        <style>body{padding-top:80px}</style>
        <link rel="stylesheet" href="files/bootstrap/3/fonts/iconic/css/material-design-iconic-font.min.css">
        <script src="files/js/main.js"></script>
         <script src="files/js/jquery.js"></script>
        <script src="files/js/Sortable.js"></script>
       <script src="files/js/table-head.js"></script>
        <script type="text/javascript">
            // Notice how this gets configured before we load Font Awesome
            window.FontAwesomeConfig = { autoReplaceSvg: false }
        </script>
        <style>@import url(https://fonts.googleapis.com/css?family=Roboto:400);
            .navbar-nav .dropdown-menu
            {
            margin:0 !important
            }
        </style>
        <style>
        .navbar-nav .dropdown-menu
            {
            margin:0 !important
            }
            .theme-light {
            --color-primary: #0060df;
            --color-secondary: #ffffff;
            --color-secondary2: #ecf0f1;
            --color-accent: #fd6f53;
            --font-color: #000000;
            --color-nav: #ffffff;
            --color-dropdown: #ffffff;
            --color-card: #ffffff;
            --color-card2: #d1ecf1;
            --color-info: #0c5460;
            --color-backinfo: #d1ecf1;
            --color-borderinfo: #bee5eb;
            }
            .theme-dark {
            --color-primary: #17ed90;
            --color-secondary: #353B50;
            --color-secondary2: #353B50;
            --color-accent: #12cdea;
            --font-color: #ffffff;
            --color-nav: #363947;
            --color-dropdown: rgba(171, 205, 239, 0.3);
            --color-card: #262A37;
            --color-card2: #262A37;
            --color-info: #4DD0E1;
            --color-backinfo: #262A37;
            --color-borderinfo: #262A37;
            }
            .them {
            background: var(--color-secondary);
            flex-direction: column;
            justify-content: center;
            align-items: center;
            }
            .them h1 {
            color: var(--font-color);
            font-family: sans-serif;
            }
            .card-body {
            color: var(--font-color);
            }
            .them button {
            color: var(--font-color);
            background-color: #ffffff;
            padding: 10px 20px;
            border: 0;
            border-radius: 5px;
            }
            .navbar.navbar-light .navbar-toggler {
            color: var(--font-color);
            }
            /* The switch - the box around the slider */
            .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            }
            /* Hide default HTML checkbox */
            .switch input {
            opacity: 0;
            width: 0;
            height: 0;
            }
            /* The slider */
            .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: 0.4s;
            transition: 0.4s;
            }
            .slider:before {
            position: absolute;
            content: "";
            height: 40px;
            width: 40px;
            left: 0px;
            bottom: 4px;
            top: 0;
            bottom: 0;
            margin: auto 0;
            -webkit-transition: 0.4s;
            transition: 0.4s;
            box-shadow: 0 0px 15px #2020203d;
            background: white url('https://i.ibb.co/FxzBYR9/night.png');
            background-repeat: no-repeat;
            background-position: center;
            }
            input:checked + .slider {
            background-color: #2196f3;
            }
            input:focus + .slider {
            box-shadow: 0 0 1px #2196f3;
            }
            input:checked + .slider:before {
            -webkit-transform: translateX(24px);
            -ms-transform: translateX(24px);
            transform: translateX(24px);
            background: white url('https://i.ibb.co/7JfqXxB/sunny.png');
            background-repeat: no-repeat;
            background-position: center;
            }
            /* Rounded sliders */
            .slider.round {
            border-radius: 34px;
            }
            .slider.round:before {
            border-radius: 50%;
            }
        </style>
        <script>
            function setTheme(themeName) {
                localStorage.setItem('theme', themeName);
                document.documentElement.className = themeName;
            }
            
            // function to toggle between light and dark theme
            function toggleTheme() {
                if (localStorage.getItem('theme') === 'theme-dark') {
                    setTheme('theme-light');
                } else {
                    setTheme('theme-dark');
                }
            }
            
            // Immediately invoked function to set the theme on initial load
            (function () {
                if (localStorage.getItem('theme') === 'theme-dark') {
                    setTheme('theme-dark');
                    document.getElementById('slider').checked = false;
                } else {
                    setTheme('theme-light');
                  document.getElementById('slider').checked = true;
                }
            })();
            
        </script>
                <style>.modal-dialog.modal-frame.modal-top.modal-notify.modal-danger .modal-body,.modal-dialog.modal-frame.modal-top.modal-offernov.modal-danger .modal-body{
            padding-top: 35px;
            }
            .modal-dialog.modal-frame.modal-top.modal-notify.modal-danger,.modal-dialog.modal-frame.modal-top.modal-offernov.modal-danger {
            max-width: 500px !important;
            margin: 1.75rem auto !important;
            position: relative;
            width: auto !important;
            pointer-events: none;
            }
            a.closearb {
            position: absolute;
            top: 2.5px;
            right: 2.5px;
            display: block;
            width: 30px;
            height: 30px;
            text-indent: -9999px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA3hJREFUaAXlm8+K00Acx7MiCIJH/yw+gA9g25O49SL4AO3Bp1jw5NvktC+wF88qevK4BU97EmzxUBCEolK/n5gp3W6TTJPfpNPNF37MNsl85/vN/DaTmU6PknC4K+pniqeKJ3k8UnkvDxXJzzy+q/yaxxeVHxW/FNHjgRSeKt4rFoplzaAuHHDBGR2eS9G54reirsmienDCTRt7xwsp+KAoEmt9nLaGitZxrBbPFNaGfPloGw2t4JVamSt8xYW6Dg1oCYo3Yv+rCGViV160oMkcd8SYKnYV1Nb1aEOjCe6L5ZOiLfF120EjWhuBu3YIZt1NQmujnk5F4MgOpURzLfAwOBSTmzp3fpDxuI/pabxpqOoz2r2HLAb0GMbZKlNV5/Hg9XJypguryA7lPF5KMdTZQzHjqxNPhWhzIuAruOl1eNqKEx1tSh5rfbxdw7mOxCq4qS68ZTjKS1YVvilu559vWvFHhh4rZrdyZ69Vmpgdj8fJbDZLJpNJ0uv1cnr/gjrUhQMuI+ANjyuwftQ0bbL6Erp0mM/ny8Fg4M3LtdRxgMtKl3jwmIHVxYXChFy94/Rmpa/pTbNUhstKV+4Rr8lLQ9KlUvJKLyG8yvQ2s9SBy1Jb7jV5a0yapfF6apaZLjLLcWtd4sNrmJUMHyM+1xibTjH82Zh01TNlhsrOhdKTe00uAzZQmN6+KW+sDa/JD2PSVQ873m29yf+1Q9VDzfEYlHi1G5LKBBWZbtEsHbFwb1oYDwr1ZiF/2bnCSg1OBE/pfr9/bWx26UxJL3ONPISOLKUvQza0LZUxSKyjpdTGa/vDEr25rddbMM0Q3O6Lx3rqFvU+x6UrRKQY7tyrZecmD9FODy8uLizTmilwNj0kraNcAJhOp5aGVwsAGD5VmJBrWWbJSgWT9zrzWepQF47RaGSiKfeGx6Szi3gzmX/HHbihwBser4B9UJYpFBNX4R6vTn3VQnez0SymnrHQMsRYGTr1dSk34ljRqS/EMd2pLQ8YBp3a1PLfcqCpo8gtHkZFHKkTX6fs3MY0blKnth66rKCnU0VRGu37ONrQaA4eZDFtWAu2fXj9zjFkxTBOo8F7t926gTp/83Kyzzcy2kZD6xiqxTYnHLRFm3vHiRSwNSjkz3hoIzo8lCKWUlg/YtGs7tObunDAZfpDLbfEI15zsEIY3U/x/gHHc/G1zltnAgAAAABJRU5ErkJggg==);
            }
        </style>
        <style>.scroll-area-lg {
            height: 400px;
            overflow-x: hidden;
            }
            .scrollbar-sidebar, .scrollbar-container {
            position: relative;
            height: 100%;
            }
            .ps {
            overflow: hidden !important;
            overflow-anchor: none;
            touch-action: auto;
            }
            .heading{
            font-size: 16px;
            font-weight: bold;
            }
            .fa-plus-circle {
            color: green;
            }
            #tour {
            font-family: 'Raleway', sans-serif;
            }
        </style>
        <link rel="stylesheet" href="files/bootstrap/3/css/flexslider5.css" type="text/css">
        <script src="files/bootstrap/3/js/jquery.flexslider-min.js"></script>
        <style>#tour {
            font-family: 'Raleway', sans-serif;
            }
            #tour .flexslider {
            margin: 0 0 60px;
            background: #fff;
            border: 0px solid #fff;
            position: relative;
            zoom: 0;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            -webkit-box-shadow: '' 0 0px 0px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: '' 0 0px 0px rgba(0, 0, 0, 0.2);
            -o-box-shadow: '' 0 0px 0px rgba(0, 0, 0, 0.2);
            box-shadow: '' 0 0px 0px rgba(0, 0, 0, 0.2);
            }
            #tour .flex-control-paging li a {
            width: 11px;
            height: 11px;
            display: block;
            background: #fff!important;
            border: 1px solid #3c8dbc;
            background: rgba(0, 0, 0, 0.5);
            cursor: pointer;
            text-indent: -9999px;
            -webkit-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
            -moz-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
            -o-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
            box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
            }
            #tour .flex-control-paging li a.flex-active {
            background: #3c8dbc!important;
            }
            #tour .modal-body {
            padding: 0px;
            }
            #tour .modal-footer {
            background: #fafafa;
            border:0px;
            }
            #tour .flex-caption {
            padding: 20px 100px 20px 100px;
            text-align: center;
            }
            #tour .flex-caption .heading{
            font-weight: 600;
            font-size: 20px;
            color: #505050;
            padding-bottom: 15px;
            }
            #tour .flex-caption .caption-content{
            font-size: 15px;
            color: #505050;
            }
        </style>
        <style type="text/css">/* Chart.js */
            @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
        </style>
    </head>
    <body class="them loading">
        <nav class="navbar navbar-expand-xl navbar  navbar-light " style="
            position:fixed;
            background-color: var(--color-nav);
            z-index:1;
            top:0;
            left:0;
            right:0;
            line-height: 1.5;
            font-family: 'Lato', sans-serif;
            font-size: 15px;
            padding-top: 0.5rem;
            padding-right: 1rem;
            padding-bottom: 0.5rem;
            padding-left: 1rem;
            ">
            <a class="navbar-brand" href="main" style="color: var(--font-color);"><img width="40px" src="files/images/logo.png"> XBASELEET</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="navbar-toggler-icon"></i>
            </button>
            <div class="navbar-collapse order-1 collapse" id="navbarSupportedContent" style="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown mr-auto">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-warehouse fa-sm orange-text"></i>
                        Hosts
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item waves-effect waves-light" href="rdp" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-desktop fa-fw"></i> RDPs <span class="badge badge-primary"><span id="rdp"></span></span></a>
                            <a class="dropdown-item waves-effect waves-light" href="cPanel" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-tools fa-fw"></i> cPanels <span class="badge badge-primary"><span id="cpanel"></span></span></a>
                            <a class="dropdown-item waves-effect waves-light" href="shell" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-file-code fa-fw"></i> Shells <span class="badge badge-primary"><span id="Shell"></span></span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-auto">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fab fa-google-play fa-sm text-success"></i>
                        Send
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item waves-effect waves-light" href="mailer" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-leaf fa-fw"></i> Mailers <span class="badge badge-primary"><span id="mailer"></span></span></a>
                            <a class="dropdown-item waves-effect waves-light" href="smtp" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-envelope fa-fw"></i> SMTPs <span class="badge badge-primary"><span id="smtp"></span></span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-auto">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-mail-bulk fa-sm pink-color"></i> Leads
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item waves-effect waves-light" href="leads-1" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-award"></i> 100% Validated Leads <span class="badge badge-primary"><span id="leads"></span></span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-auto">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-tie fa-sm"></i> Accounts
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item waves-effect waves-light" href="account" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-business-time"></i> Premium<span class="badge badge-primary"><span id="scampage"></span></span></a>
                            <a class="dropdown-item waves-effect waves-light" href="banks" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-mail-bulk"></i> USA Bank(Full INFO) <span class="badge badge-primary"><span id="scampage"></span></span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-auto">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-friends fa-sm"></i>Other (Logs Info)
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item waves-effect waves-light" href="scampage" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-comments-dollar"></i>Scampage/Script/letter <span class="badge badge-primary"><span id="scampage"></span></span></a>
                            <a class="dropdown-item waves-effect waves-light" href="tutorial" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-server"></i>Tuto/Cashout/Methods<span class="badge badge-primary"><span id="Tutorial"></span></span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" role="button" style="color: var(--font-color);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fab fa-drupal text-primary fa-sm"></i>Seller
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item waves-effect waves-light" href="requests.html" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-user-plus"></i> Buyers Requests <span class="badge badge-primary"> 71</span></span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link waves-effect waves-light" href="offers.html" style="color: var(--font-color);"><i class="fas fa-user-secret text-primary fa-sm"></i> Bulk Offers</a>
                    </li>
                </ul>
                <ul class="navbar-nav profile">
        
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="addBalance" style="color: var(--font-color);" role="button" aria-haspopup="true" aria-expanded="false"><span class="badge badge-danger">
                        0
                        <span class="px-2"><i class="fa fa-plus"></i></span></span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Ticket <span class="badge badge-success">0</span></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: var(--font-color); background-color: var(--color-nav);">
                            <a class="dropdown-item waves-effect waves-light" href="orders" style="color: var(--font-color);"><span class="px-2">Report Items</span></a>
                            <a class="dropdown-item waves-effect waves-light" href="tickets" style="color: var(--font-color);"><span class="px-2">My Tickets <span class="badge badge-success">0</span></span></a>
                            <a class="dropdown-item waves-effect waves-light" href="reports" style="color: var(--font-color);"><span class="px-2">My Reports <span class="badge badge-success">0</span></span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Account<i class="fa fa-user-secret" style="color: var(--font-color);"></i></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: var(--font-color); background-color: var(--color-nav);">
                            
                            <a class="dropdown-item waves-effect waves-light" href="setting" style="color: var(--font-color);"><span class="px-2">Setting <i class="fa fa-cog"></i></span></a>
                            <a class="dropdown-item waves-effect waves-light" href="orders" style="color: var(--font-color);"><span class="px-2">My Orders <i class="fa fa-shopping-cart"></i></span></a>
                            <a class="dropdown-item waves-effect waves-light" href="addBalance" style="color: var(--font-color);"><span class="px-2">Add Balance <i class="fa fa-money-bill-alt"></i></span></a>
                            <a class="dropdown-item waves-effect waves-light" href="login" style="color: var(--font-color);"><span class="px-2">Logout <i class="fa fa-door-open"></i></span></a>
                        </div>
                    </li>
                </ul>
            </div>
			</nav>
			</div id="mainDiv">