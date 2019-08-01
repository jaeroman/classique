@extends('layouts.login')

@section('content')

<section class="hero is-fullheight">
        <div class="hero-body">
          <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
              <div class="box">
                <p class="subtitle has-text-black">LOGIN TO ACCOUNT</p>
                <h5 class="title is-5">Welcome to Classique Herbs. Good and Natural.</h5>
                <form method="POST" action="/login">
                  @csrf
                  <div class="field">
                    <p class="control">
                      <input class="input is-medium" name="email" type="email" placeholder="EMAIL" required>                            
                    </p>
                  </div>
    
                  <div class="field">
                    <p class="control">
                      <input class="input is-medium" name="password" type="password" placeholder="PASSWORD" required>
                    </p>
                  </div>
                  <br>
                  <button class="button is-block is-medium">LOGIN</button><br>
                  {{-- <a href="#"> Forget password?</a> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
</section>   

@endsection