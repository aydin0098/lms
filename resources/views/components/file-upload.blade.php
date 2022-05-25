<div class="file-upload">
    <div class="i-file-upload">
        <span>{{$placeholder}}</span>
        <input type="{{$type}}" class="file-upload" id="files" name="{{$name}}" {{$attributes}}>
        <x-validation-error field="{{$name}}"/>
    </div>
    <span class="filesize"></span>
    @if(isset($value))
        <img src="{{$value->thumb}}" style="display: block;margin: 0 auto">

    @else
        <span class="selectedFiles">فایلی انتخاب نشده است</span>
    @endif

</div>
