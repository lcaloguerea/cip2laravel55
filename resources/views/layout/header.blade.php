<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Auth::user()->type == 'admin')
       <title>CIP Admin</title>
    @elseif(Auth::user()->type == 'maid')
      <title>CIP Maid</title>
    @elseif(Auth::user()->type == 'user')
      <title>CIP User</title>
    @endif
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{{asset('img/logo_Mecesup.ico')}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">