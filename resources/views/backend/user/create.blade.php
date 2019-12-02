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

                     
                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
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

                              <label for="title">Name</label>
                              <input type="txt" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}">
                              
                            </div>
                            <div class="form-group">
                                    <label>Email address </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-at"></i>
                                            </div>
                                        </div>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                            required>
                                    </div>
                                </div>


                                <div class="form-group">
                                        <label>Password </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </div>
                                            </div>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                            <label>Mobile number </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-mobile-alt"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}"
                                                    required>
                                            </div>
                                        </div>
            

                                        <div class="form-group">
                                                <label>BIO </label>
                                                <textarea name="bio" cols="30" rows="4" class="form-control">{{ old('bio') }}</textarea>
                                            </div>
                           

                                            <div class="form-group">
                                                    <label>Avatar </label>
                                                    <input type="file" name="avatar_image" class="form-control">
                                                </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                          </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
