@extends('layouts/admin')

@section('content')


<section class="content-header">
      <h1>
        Main page
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
</section>





<section class="content container-fluid">
{{ Auth::user()}}
</section>

@endsection
