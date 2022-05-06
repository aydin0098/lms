<div class="file-upload">
    <div class="i-file-upload">
        <span>{{$placeholder}}</span>
        <input type="{{$type}}" class="file-upload" id="files" name="{{$name}}" {{$attributes}}>
        <x-validation-error field="{{$name}}"/>
    </div>
    <span class="filesize"></span>
    <span class="selectedFiles">فایلی انتخاب نشده است</span>
</div>
