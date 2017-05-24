<div class="form-group">
    <label for="categories">Categories</label>

    <select name="categories[]" id="categories" class="form-control" multiple size="5">
        @foreach($categories as $category)
            <option {{ in_array($category->id, $selectedCategories)? 'selected':'' }}   value="{{$category->id}}">{{$category->category_name}}</option>
        @endforeach
    </select>
</div>