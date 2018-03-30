@extends('layouts.app')

@section('content')
<home-component v-bind:dados="{{ $datas }}"></home-component>
@endsection