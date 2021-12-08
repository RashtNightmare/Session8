@extends('index')

@section('content')

<!doctype html>
<html>
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

<div class="w-full max-w-xs">
<form method ="post" action="\user\login" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
   {{ csrf_field() }} 
   <div class="mb-4">
     <span style="background-color:blue;color:white;" class="text-gray-700">ROLES</span>
 <label class="block text-gray-700 text-sm font-bold mb-2" for="Role Name">
        User Name
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name"  name="name" type="text" placeholder="Role Name">
    </div>
    <label class="block text-gray-700 text-sm font-bold mb-2" for="Role Name">
        Password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password"  name="password" type="password" placeholder="Role Name">
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Sign In
      </button>
    </div>
  </form>
</div>
</html>
@endsection