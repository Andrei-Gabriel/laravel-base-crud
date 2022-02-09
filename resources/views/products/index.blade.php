@extends('layout.base')

@section('pageContent')
    <ul>
        @foreach ($comics as $aComic)
            <li>{{$aComic->title}}</li>
        @endforeach
    </ul>

    <div class="container">
        <div class="row">
          <div class="col">col</div>
          <div class="col">col</div>
          <div class="col">col</div>
          <div class="col">col</div>
        </div>
        <div class="row">
          <div class="col-8">col-8</div>
          <div class="col-4">col-4</div>
        </div>
    </div>
@endsection
    