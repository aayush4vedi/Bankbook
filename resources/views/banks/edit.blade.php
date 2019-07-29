@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update A Bank</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        {{-- FIXME: maybe error in next line --}}
        <form method="post" action="{{ route('banks.update', $bank->id) }}"> 
            @method('PATCH') 
            @csrf

            <div class="form-group">    
                    <label for="ifsc">IFSC:</label>
                    <input type="text" class="form-control" name="ifsc" value="{{$bank->ifsc}}"/>
                </div>
      
                {{-- TODO: make it dropdown --}}
                <div class="form-group">
                    <label for="bank_name">Bank Name:</label>
                    <input type="text" class="form-control" name="bank_name" value = "{{ $bank->bank_name }}"/>
                </div>
                <div class="form-group">
                    <label for="branch_name">Branch Name:</label>
                    <input type="text" class="form-control" name="branch_name"  value="{{$bank->branch_name}}"/>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" name="address" value="{{$bank->address}}"/>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" class="form-control" name="contact_number" value="{{$bank->contact_number}}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{$bank->email}}"/>
                </div>     
                <div class="form-group">
                  <label for="manager">Who is the Manager:</label>
                  <input type="text" class="form-control" name="manager" value="{{$bank->manager}}"/>
              </div>             
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
<div>
    <a style="margin: 19px;" href="{{ route('banks.index')}}" class="btn btn-warning">Cancel</a> 
</div> 