@extends('layouts.admin')

@section('title')
Dashboard
@endsection

@section('style')
    
<style>
        body {
        overflow-y: hidden !important;
        background-image: url("/images/dashboard/bg1.jpg") !important;
        -webkit-background-size:cover;
        -moz-background-size:cover;
        -o-background-size:cover; 
        background-size:cover;
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
               <a href="/product" class="icon">
               <i class="material-icons md-36">shopping_basket</i></a>
               <p class="title">INVENTORY</p>
               <p class="text">Click to view or edit the inventory.</p>
               </div>
            </div>
     
           <div class="column is-block">
              <div class="box">
              <a href="" class="icon">
              <i class="material-icons md-36">assessment</i></a>
              <p class="title">SALES</p>
              <p class="text">Click to view or edit the sales.</p>
              </div>
          </div>
      
          <div class="column is-block">
              <div class="box">
              <a href="/user" class="icon">
              <i class="material-icons md-36">people</i></a>
              <p class="title">MEMBER</p>
              <p class="text">Click to view or edit the members.</p>
              </div>
          </div>

          <div class="column is-block">
              <div class="box">
              <a href="" class="icon">
              <i class="material-icons md-36">attach_money</i></a>
              <p class="title">TRANSACTIONS</p>
              <p class="text">Click for new transactions.</p>
              </div>
          </div>
      
      
        </div>
      </div> 
    </div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
<br>
                    <a href="/dashboard">Dashboard</a>  <br>
                    <a href="/product">Inventory</a><br>
                    <a href="/user">Members</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@section('footer')

<footer class="footer">
        <div class="content has-text-centered">
          <p>
            CLASSIQUE HERBS. GOOD AND NATURAL. <a href="#" class="has-text-success">COPYRIGHT 2019</a>. 
          </p>
        </div>
      </footer>

@endsection


@endsection
