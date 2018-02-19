@extends('layouts.app')

@section('content')
  <app-init :sliders="{{ json_encode($sliders->toArray()) }}"></app-init>

  @include('partials.admin-modals')

  @include('partials.banner')

  @include('partials.vision')

  @include('partials.portfolio')
@endsection
