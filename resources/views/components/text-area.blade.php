<textarea name="{{$name}}" placeholder="{{$placeholder}}" {{$attributes}} class="text h">{!! isset($value) ? $value : old($name) !!}</textarea>
<x-validation-error field="{{$name}}"/>
