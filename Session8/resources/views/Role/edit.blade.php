@extends('index')

@section('content')

<div class="w-full max-w-xs">
{{$role['id']}}

<form method="POST" action="\role\{{$role['id']}}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
{{ csrf_field() }}
{{ method_field('PATCH') }}
 <div class="mb-4">
     <span style="background-color:blue;color:white;" class="text-gray-700">ROLES</span>
 <label class="block text-gray-700 text-sm font-bold mb-2" for="Role Name">
        Role Name
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name"
      value="{{$role['name']}}"  name="name" type="text" placeholder="Role Name">
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       Save
      </button>
    </div>
  </form>
</div>
@endsection