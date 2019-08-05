@extends('layouts.admin')

@section('title')
Add a Member - Dashboard
@endsection

@section('content')

@include('includes.sidebar')

<div class="column is-main-content">
    <form method="POST" action="/user">
    @csrf
        <div class="columns is-centered">
                <div class="column is-6">
                  <div class="panel">
                    <p class="panel-heading has-text-black-bis">
                      ADD A MEMBER
                    </p>
                    <div class="panel-block">
               
                      <div class="card">
                    @include('includes.errors')
    
                    <div class="field">
                            <label class="label">
                                Classique ID
                            </label>
                            <p class="control">
                             <input class="input" type="text" placeholder="Classique ID" name="classiqueId" value="{{ (old('classiqueId')) }}" required/>
                            </p>
                        </div>                   
                    <!-- Name -->
                    <div class="field">
                        <label class="label">
                           Name
                        </label>
                        <p class="control">
                            <input class="input" type="text" placeholder="Name" name="name" value="{{ (old('name')) }}" required/>
                        </p>
                    </div>

                    <div class="field">
                        <label class="label">
                           Confirmation No.
                        </label>
                        <p class="control">
                            <input class="input" type="text" placeholder="Confirmation No." name="confirmationNo" value="{{ (old('confirmationNo')) }}" />
                        </p>
                    </div>

                    <div class="field">
                        <label class="label">
                           Tri No.
                        </label>
                        <p class="control">
                            <input class="input" type="text" placeholder="Tri No." name="triNo" value="{{ (old('triNo')) }}" />
                        </p>
                    </div>

                    <div class="field">
                        <label class="label">
                           Effectivity Date
                        </label>
                        <p class="control">
                            From:
                            <input class="input" type="date" name="effectivityDateFrom" />
                            To:
                            <input class="input" type="date" name="effectivityDateTo" />
                        </p>
                    </div>

                    <div class="field">
                            <label class="label">
                               Email
                            </label>
                            <p class="control">
                                <input class="input" type="email" placeholder="Email" name="email" value="{{ (old('email')) }}" required/>
                            </p>
                        </div>

                    <div class="field">
                            <label class="label">
                                Password
                            </label>
                            <p class="control">
                                <input class="input" type="text" placeholder="Password" name="password" required/>
                            </p>
                        </div>

                        <div class="field">
                                <label class="label">
                                    Confirm Password
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="Confirm Password" name="password_confirmation" required/>
                                </p>
                            </div>
                   
                    <!-- Buttons -->
                    <div class="field is-grouped">
                        <p class="control">
                            <a href="/user" class="button is-info is-outlined">BACK</a>
                            <button type="submit" class="button is-success is-outlined">SUBMIT</button>
                        </p>
                    </div>
                    
                </div>
    
            </div> 
    
                  </div>
                </div>
    
              </div>
            </form>
        </div>  
      </div>

@endsection












{{-- 



@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a Member</div>

                <div class="card-body">
                    <form method="POST" action="/user">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>
    
                                <div class="col-md-6">
                                    <input id="contactNo" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ old('contactNo') }}" required autocomplete="contactNo" autofocus>
    
                                    @error('contactNo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
