<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" required class="form-control" autofocus value="{{ old('name', $course->name )}}">
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        <label for="description" class="required">Descrição </label>
        <input type="text" name="description" id="description" required class="form-control" value="{{ old('description', $course->description )}}">
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="slug" class="required">Slug </label>
        <input type="text" name="slug" id="slug" required class="form-control" value="{{ old('slug', $course->slug )}}">
    </div>
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
        <input type="file" name="img" id="img" required class="form-control" value="{{ old('img', $course->img )}}">
    </div>
</div>