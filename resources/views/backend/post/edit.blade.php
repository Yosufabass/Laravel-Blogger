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

                    <form action="{{route('post.update',$post->id)}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                
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

                              <label for="title">title</label>
                              <input type="txt" class="form-control" name="title" value="{{$post->title}}">
                              
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">content</label>
                              <textarea type="text" class="form-control" name="content"  placeholder="content" rows="6">{{$post->content}}</textarea>
                            </div>
                            <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category_id">

                                    @foreach ($categories as $category)

                                    @if($category->id==$post->category_id)

                                    <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option> 
                                    @endif
                                    @endforeach
                                    </select>
                                  </div>

                                  <div class="form-group">
                                        <label for="tags">Tags</label>
                                        <select id="tags" class="form-control tags_items" name="tag_id[]" multiple="multiple">
                                            @foreach ($tags as $tag)
                                            
                                            <option value="{{ $tag->id}}" selected>{{ $tag->tag_name}}</option>
                                            
                                            @endforeach
                                        </select>
                                    </div>

                            <div class="form-group">
                             <label  for="imge">photp</label>
                              <input type="file" class="form-control-file" name="imge">
                              
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
