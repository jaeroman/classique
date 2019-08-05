@extends('layouts.admin')

@section('title')
Members - Dashboard
@endsection

@section('content')

@include('includes.sidebar')

<div class="column is-main-content">
    <h1 class="has-text-centered has-text-black-bis is-size-4">MEMBERS</h1>

          <div class="container">
              <form>
                  <div class="field has-addons is-pulled-right">
                      <div class="control">
                        <input class="input" type="text" value="{{ isset($search) ? $search : '' }}" name="search" placeholder="Search....">
                      </div>
                      <div class="control">
                        <a class="button is-info is-outlined">
                          Search
                        </a>
                      </div>
                      
                  </div>
                 <div class="field has-addons is-pulled-left">
                    <a href="/user/create" class="button is-info is-outlined">Add a Member</a>
              
                </div>

              </form>
            </div>

<div class="panel-table is-desktop is-centered">
    <table class="table is-hoverable pricingtable">
        
        <thead>
            <tr>
                <th>CLASSIQUE ID</th>
                <th>NAME</th>
                <th>CONFIRMATION NO</th>
                <th>TRI NO</th>
                <th>EFFECTIVITY DATE</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
            @if($users->count())
            @foreach ($users as $item)
            <tr>
                <form method="POST" action="/user/{{ $item->id }}">
                <td>{{ $item->classiqueId }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->confirmationNo }}</td>
                <td>{{ $item->triNo }}</td>
                @if ($item->effectivityDateFrom)
                <td>{{ $item->effectivityDateFrom->format('M d, Y').' - '.$item->effectivityDateTo->format('M d, Y') }}</td>
                @else
                <td>N/A</td>   
                @endif

                <td>
                  <a href="/user/{{$item->id}}/edit" class="button is-primary is-outlined">Edit</a>

                  
                    @csrf
                    @method('DELETE')
                    <a onclick="return confirm('Are you sure?')"> <button class="button is-danger is-outlined" type="submit" >Delete</button></a>

                  <a href="" class="button is-info is-outlined">More Info</a></td>
                </form>
           </tr>
            @endforeach
            @endif
        </tbody>
    </table>

      {{ $users->appends(['search' => $search])->links() }}
        
</div>

  </div> 

        </div>

@endsection