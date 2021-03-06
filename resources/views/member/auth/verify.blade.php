@extends('member.auth.layouts.layout')

@section('content')
<div class="text-center content">
    <h4>Verify your account</h4>
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="Input_Info">
        <div class="textinput">
            <div class="label">Code</div>
            <form method="POST" action="{{route('user.verify')}}">
                {{csrf_field()}}
                <input type="hidden" name="email" value="<?php echo session()->get( 'email' ); ?>" />
                <input type="text" name="codeverify" maxlength="6" value="" required>
                <div class="divbutton">
                    <div class="button">
                        <input class="form-control btn color depth" type="submit" value="Verify"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop