@extends('layouts.app')

@section('content')
<div class="container">
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

                     
                    <form action="{{route('catecory.store')}}" method="POST" >
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        
                            <div class="form-group">

                              <label for="category_name">Category name</label>
                              <input type="txt" class="form-control" name="category_name" placeholder="Enter category name">
                            </div>
                           <div>
                            <button type="submit" class="btn btn-primary">save</button>
                           </div>
                          </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
