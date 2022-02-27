<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Appointment System</title>
  @include('layouts.css')
    <style>
        body {
         background: url('./../img/bg.jpg') no-repeat center center fixed;
         -webkit-background-size: cover;
         -moz-background-size: cover;
         -o-background-size: cover;
         background-size: cover;
        }

        .card-default {
         opacity: 0.8;
         margin-top:30px;
        }
        .form-group.last {
         margin-bottom:0px;
        }
    </style>
</head>
<body class="hold-transition layout-top-nav text-sm">
<div class="wrapper">

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapdper">

        <!-- Content Header (Page header) -->
        <div class="content-header">

        </div>

        <div class="content">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>

        </div>

        <!-- /.content -->
    </div>
</div>

@include('layouts.scripts')
@yield('scripts')
</body>
</html>
