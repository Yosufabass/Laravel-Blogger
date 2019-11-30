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

                     
                    <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">name</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                           
                              </tr>
                            </thead>
                             <tbody>   
                                @foreach ($posts as $post)
                                
                            <tr>
                                <th scope="row">
                                    <img src="{{$post->imge}}" alt="{{$post->title}}" class="img-thumbnail" width="200" height="200">
                                </th>
                               
                                <th scope="row">
                                    {{$post->title}}
                                </th>


                                <td> 
                                    <a href='{{ route('post.edit',$post->id) }}' class='btn btn-icon btn-primary'>edit</a>  
                                </td>
                                
                               <td> <form action="{{ route('post.destroy',$post->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-icon btn-danger">delete</button>
                                      </form>
                                 </td>
                             </tr>
                              
                            
                                @endforeach
                               </tbody>
                          </table>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
