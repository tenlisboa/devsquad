@extends('layouts.app')

@section('content')
<home-component v-bind:dados="{{ $data_sets }}"></home-component>
@endsection