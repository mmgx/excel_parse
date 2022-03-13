@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
            <h3 class="text-center mb-5">Импорт файла</h3>
            @csrf
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="file">
                <label class="custom-file-label" for="chooseFile"></label>
            </div>
            <button type="submit" name="submit" class="button">
                Загрузить
            </button>
        </form>
    </div>
@endsection
