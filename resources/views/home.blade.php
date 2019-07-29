@extends('layouts.app')

{{-- @section('content') --}}
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
                    
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="col-sm-12">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
</div>
<div class="row" style="margin: 19px;">
    <div class="col-md-3"><h3>Search a bank:</h3></div>
    <div class="dropdown">
        {{-- FIXME: dropdown button not working --}}
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Bank
        </button>
        {{-- TODO: make the list dynamic --}}
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">SBI</a>
            <a class="dropdown-item" href="#">HDFC</a>
            <a class="dropdown-item" href="#">ICICI</a>
        </div>
    </div>
    <div class="col-md-3">
        <form action="/search" method="GET">
            <div class="input-group">
                <input type="search" name = "ifsc" class="form-control">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">IFSC</button>
                </span>
            </div>
        </form>
    </div>
    <h3>OR</h3>
    {{-- TODO: search by branch --}}
    <div class="col-md-3">
        <form action="/searchByBranch" method="GET">
            <div class="input-group">
                <input type="search" name = "search_branch" class="form-control">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-warning">Branch</button>
                </span>
            </div>
        </form>
    </div>
    <br>
</div>
<div class="row" style="margin-left: 35px;">
    {{-- <div class="col-md-3"><h3>Add a bank:</h3></div> --}}
    <a   href="{{ route('banks.create')}}" class="btn btn-primary mr-2">Add A Bank</a>
    <a   href="{{ route('banks.index')}}" class="btn btn-primary ml-2">Show All Banks</a>
</div>
{{-- @endsection --}}
{{-- return redirect()->intended('dashboard'); --}}