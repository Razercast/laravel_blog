@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Обновить статью</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Статья "{{$post->title}}"</h3>
            </div>


            <form role="form" method="post" action="{{route('posts.update',['post' => $post->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Цитата</label>
                        <textarea name="description" id="description" class="form-control" rows="5">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea name="content" id="content" class="form-control" rows="5">{{$post->content}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Категория</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach($categories as $k => $v)
                                <option value="{{$k}}" @if($k==$post->category_id) selected @endif >{{$v}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tags">Теги</label>
                        <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Выбор тегов" style="width: 100%;">
                            @foreach($tags as $k => $v)
                                <option value="{{$k}}" @if(in_array($k,$post->tags->pluck('id')->all())) selected @endif >{{$v}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div><img src="{{$post->getImage()}}" alt="" class="img-thumbnail"></div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
@endsection

