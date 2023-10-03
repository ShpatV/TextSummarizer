@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="container">

    <br>
    <h1 style="text-align: center; color:darkgray"><b>Summarize Your Text Here!</b></h1>
    <br><br>
    <div class="form-group row justify-content-between">
    <div class ="d-flex">
        <form action="{{url('summarize')}}" method="post">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            {!! Form::token() !!}
            <div class="row"> <h3 style="text-align: center; color:darkgray; margin-left:20px"><b>Write/Paste Text</b></h3> <h3 style="text-align: center; color:darkgray; margin-left:360px"><b>Summarized Text</b></h3> </div>
            <textarea  name="text" style="width: 33rem; border:2px solid; border-radius:10px " id="simpleText" rows="20" placeholder="Write or Paste text here..."></textarea>
            <textarea name='summary'id="summary" style="width: 32rem; border:2px solid; border-radius:10px; margin-left:20px" rows="20" placeholder="Summarized Text here..." readonly>@if(isset($summary)) {!! $summary !!} @endif</textarea>
            <input style="background-color:rgb(92, 89, 89); color:white; width:6rem; height:2.8rem; border-radius:16px" type="submit" name="summarize" value="Summarize"> <input style="background-color:rgb(92, 89, 89); color:white; width:6rem; height:2.8rem; border-radius:16px; margin-left:10px" type="reset" name="clear" value="Clear">
        </form>

</div>
@endsection


{{-- <input style="background-color:rgb(92, 89, 89); color:white; width:8rem; height:2.8rem; border-radius:16px" type="submit" name="summarize" value="Summarize"> --}}
