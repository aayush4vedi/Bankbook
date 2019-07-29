{{-- 1. search bar
3. add a new bank
3. logout->welcome page --}}




{{-- @extends('base')

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
          <td>Manager</td>
          <td>Contact</td>
          <td>Address</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody> --}}
        {{-- @foreach($bank) --}}
        {{-- <tr>
            <td>{{$bank->id}}</td>
            <td>{{$bank->ifsc}}</td> --}}
            {{-- <td>{{$bank->bank_name}}</td> --}}
            {{-- <td>{{$bank->branch_name}}</td>
            <td>{{$bank->contact_number}}</td>
            <td>{{$bank->email}}</td>
            <td>{{$bank->manager}}</td>
            <td>{{$bank->address}}</td>
            <td>
                <a href="{{ route('banks.edit',$bank->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('banks.destroy', $bank->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        {{-- @endforeach --}}
    {{-- </tbody>
  </table>
<div>
</div>
@endsection
  --}}
  {{$bank}}