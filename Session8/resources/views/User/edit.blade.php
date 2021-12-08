@extends('index')

@section('content')

<div class="w-full max-w-xs">

{{$users['id']}}


<form method ="POST" action="\user\{{$users['id']}}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
{{ csrf_field() }}
{{ method_field('PATCH') }}
<span style="background-color:blue;color:white;" class="text-gray-700">USERS</span>   
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="User Name">User Name</label>
      <input value="{{$users['name']}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name"  name="name" type="text" placeholder="User Name">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="E-mail">E-mail</label>
      <input value="{{$users['email']}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email"  name="email" type="text" placeholder="E-mail">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Mobile</label>
      <input value="{{$users['mobile']}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="mobile"  name="mobile" type="text" placeholder="Mobile">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="Password">Password</label>
      <input value="{{$users['password']}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password"  name="password" type="password" placeholder="Password">
    </div>
    <div class="mb-4">
      <p>Current Role : {{$users['role']['name']}}</p>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Role_ID</label>

  
      <select class="form-select mt-1 block w-full" name="role_id" id="role_id" values="{{$users['role_id']}}">
       <option value="{{$users['role']['id']}}">{{$users['role']['name']}}</option>
      </select>  

    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Save Changes

      </button>
    </div>
  </form>
  </div>
@endsection