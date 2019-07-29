@extends('base')

@section('main')
  <div>
      <a style="margin-left: 5px;" href="{{ url('/banks')}}" class="btn btn-warning">Cancel</a> 
  </div> 
<div class="row">
  <div class="col-sm-8 offset-sm-2">
    <h1 class="display-4">Add a Bank</h1>
    <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('banks.store') }}">
          @csrf
          <div class="form-group">    
              <label for="ifsc">IFSC:</label>
              <input type="text" class="form-control" name="ifsc"/>
          </div>

          {{-- TODO: make it dropdown --}}
          <div class="form-group">
              <label for="bank_name">Bank Name:</label>
              <input type="text" class="form-control" name="bank_name"/>
          </div>
          <div class="form-group">
              <label for="branch_name">Branch Name:</label>
              <input type="text" class="form-control" name="branch_name"/>
          </div>
          <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              <label for="contact_number">Contact Number:</label>
              <input type="text" class="form-control" name="contact_number"/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>     
          <div class="form-group">
            <label for="manager">Who is the Manager:</label>
            <input type="text" class="form-control" name="manager"/>
        </div>                        
          <button type="submit" class="btn btn-primary">Register Bank</button>
      </form>
  </div>
</div>
</div>
@endsection