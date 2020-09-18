
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>

<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" required class="form-control" autofocus value="{{ old('name', $course->name )}}">
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
        <label for="text" class="required mt-2">Descrição</label>
        @if($create ?? true)
            <textarea class="summernote form-control" rows="10" id="summernote" name="description" required>{{ old('description',$course->description) }}</textarea>
        @else
            @if($show ?? true)
                <p class="text-justify"> {!! $course->description !!} </p>
            @else
                <textarea class="summernote form-control" rows="10" id="summernote" name="description" required>{{ old('description',$course->description) }}</textarea>
            @endif
        @endif
    </div>
</div>
<div class="row">
    @if($show ?? true)
        <div class="form-group col-6">
            <label for="slug" class="required">Slug </label>
            <input type="text" name="slug" id="slug" required class="form-control" value="{{ old('slug', $course->slug )}}">
        </div>
    @endif
    <div class="form-group col-6">
        <label for="category" class="required">Categoria </label>
        <select class="form-control select2" required name="category_id" value="{{ old('category_id',$course->category_id) }}">
            <option></option>
            @foreach($categories as $category)
                <option @if($category->id == $course->category_id) selected @endif required value="{{$category->id }}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        <label for="img" class="required">Thumbnail </label>
        @if($create ?? true)
            <input type="file" name="img" id="img" required class="form-control-file" value="{{ old('img', $course->img )}}">
        @endif
        @if($show ?? true)
            <br>
            <img class="img-responsive" width="300" height="300" src="{{ asset('/storage/img/' . $course->img) }}" alt="Thumbnail do curso {{ $course->name }}" />
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        @if($create ?? true)
            <label for="video" class="required">Link do vídeo </label>
            <input type="text" name="video" id="video" required class="form-control" autofocus value="{{ old('video', $course->video )}}">
            @else
            @if($show ?? true)
                <label for="video" class="required">Link do vídeo </label><br>
                <iframe width="420" name="video" height="315" src="{{ old('video', $course->video )}}"></iframe>
            @else
                <label for="video" class="required">Link do vídeo </label>
                <input type="text" name="video" id="video" class="form-control" autofocus value="{{ old('video', $course->video )}}">
            @endif
        @endif
    </div>
</div>

<script>
    $('#summernote').summernote({
        placeholder: 'Informe a descrição do curso...',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>