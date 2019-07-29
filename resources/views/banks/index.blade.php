{{-- 1. search bar
3. add a new bank
3. logout->welcome page --}}




@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Banks</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>IFSC</td>
          <td>Bank Name</td>
          <td>Branch Name</td>
          <td>Number</td>
          <td>Email</td>
          <td>Manager</td>
          <td>Address</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($bank as $b)
        <tr>
            <td>{{$b->id}}</td>
            <td>{{$b->ifsc}}</td>
            <td>{{$b->bank_name}}</td>
            <td>{{$b->branch_name}}</td>
            <td>{{$b->contact_number}}</td>
            <td>{{$b->email}}</td>
            <td>{{$b->manager}}</td>
            <td>{{$b->address}}</td>
            <td>
                <a href="{{ route('banks.edit',$b->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('banks.destroy', $b->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection

<div class="col-sm-12">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
</div>
<div class="row" style="margin: 19px;">
    <div class="col-md-3"><h1>BankBook Search</h1></div>
    {{-- <div class="dropdown">
        {{-- FIXME: dropdown button not working --}}
        {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Bank
        </button> --}}
        {{-- TODO: make the list dynamic --}}
        {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> --}}
                {{-- @foreach($bank as $bank)
                  <a class="dropdown-item" >{{$bank->bank_name}}</a>
                @endforeach --}}
            {{-- <a class="dropdown-item" href="#">SBI</a>
            <a class="dropdown-item" href="#">HDFC</a>
            <a class="dropdown-item" href="#">ICICI</a>
        </div>
    </div> --}}
    
    {{-- TODO: search by branch --}}
    <div class="col-md-4">
        <form action="/search" method="GET">
            <div class="input-group mb-3">
                    <select name="bank_name" aria-placeholder="Bank">
                        @foreach($bankDistinct as $b)
                            <option class="dropdown-item" value="{{$b->bank_name}}">{{$b->bank_name}}</option>
                        @endforeach 
                    </select>
                    <input type="text" class="form-control"  placeholder="Branch" name="branch_name">
                <button type="submit" class="btn btn-danger">Search</button>
            </div>
        </form>
    </div>
    <h3>OR</h3>
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
    <div class="col-md-4">
        <span>
            <a  href="{{ route('banks.create')}}" class="btn btn-primary">Add A Bank</a>
            <a  href="{{ route('banks.index')}}" class="btn btn-secondary">Display All Banks</a>

        </span>
    </div>
</div>




{{-- <div>
    <a style="margin: 19px;" href="{{ route('banks.create')}}" class="btn btn-primary">Add A Bank</a>
    <a style="margin: 19px;" href="{{ route('banks.index')}}" class="btn btn-warning">Search A Bank</a> 

    {{-- TODO: add query --}}
    {{-- <a style="margin: 19px;" href="{{ route('banks.query')}}" class="btn btn-warning">Search A Bank</a>  --}}
{{-- </div>    --}} 