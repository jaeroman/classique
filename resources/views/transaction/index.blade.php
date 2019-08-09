@extends('layouts.admin')

@section('title')
New Transaction
@endsection

@section('style')

<style>
    body {
        overflow-y: hidden !important;
        background-image: url("/images/dashboard/bg1.jpg") !important;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .columns {
        margin-top: 100px;
    }

</style>

@endsection

@section('content')


<div class="container has-text-centered">
    <div class="row">
        <div class="columns is-half">

            <div class="column is-block">
                <div class="box">
                    <a href="/transactions/member" class="icon">
                        <i class="material-icons md-36">person</i></a>
                    <p class="title">MEMBER</p>
                    <p class="text">For Classique Member Transaction.</p>
                </div>
            </div>

            <div class="column is-block">
                <div class="box">
                    <a href="/transactions/nonmember" class="icon">
                        <i class="material-icons md-36">person</i></a>
                    <p class="title">NON-MEMBER</p>
                    <p class="text">For Non-Member Transaction.</p>
                </div>
            </div>
   

        </div>
    </div>
</div>

@include('includes.footer')


@endsection
