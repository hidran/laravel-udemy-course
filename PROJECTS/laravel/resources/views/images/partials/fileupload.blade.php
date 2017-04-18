
<div class="form-group">
    <label for="">Thumbnail</label>
    <input type="file" name="img_path" id="img_path" class="form-control" value="{{$photo->img_path}}">

</div>
@if($photo->img_path)
    <div class="form-group">
        <img width="300" src="{{asset($photo->img_path)}}" title="{{$photo->name}}" alt="{{$photo->name}}">

    </div>
@endif