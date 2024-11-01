@extends('layouts.app')


@section('title',isset($task)? "edit a task":'create a task')




@section('content')

<form method="POST" action="{{isset($task)? route('tasks.update', ['task' => $task->id]):route('tasks.store')}}"  >
@csrf
@isset($task)
    @method("PUT")
@endisset
<div class="mb-4">


    <label for="title" >title</label>
    <input type="text" id="title" name="title"  @class(['border-red-500' => $errors->has('title')]) value="{{$task->title ?? old("title")}}"/>

    @error('title')

   <p class="error"> {{$message}}</p>

    @enderror
</div>
<div class="mb-4">

    <label for="description" >description</label>
    <textarea  id="description"  @class(['border-red-500' => $errors->has('description')]) name="description" >{{$task->description ?? old("description")}}</textarea>

    @error('description')

    <p class="error"> {{$message}}</p>

    @enderror
</div>
<div class="mb-4>

    <label for="long_description" >long_description</label>
    <textarea  id="long_description"   @class(['border-red-500' => $errors->has('long_description')]) name="long_description" >{{$task->long_description ??old("long_description")}}</textarea>

    @error('long_description')

    <p class="error"> {{$message}}</p>

    @enderror
</div>
<div class="flex items-center gap-2">
    <button type="submit" id="submit" >

        @isset($record)

        add Task
            @else

            edit Task
        @endisset


    </button>

    <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
</div>



</form>

@endsection

