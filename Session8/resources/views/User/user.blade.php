@extends('index')

@section('content')

<div class="w-full max-w-xs">
<div class="w-full max-w-xs">
<form method ="post" action="\user" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
{{ csrf_field() }} 
<span style="background-color:blue;color:white;" class="text-gray-700">USERS</span>   
<div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="User Name">
      User Name
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name"  name="name" type="text" placeholder="User Name">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="E-mail">
        E-mail
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email"  name="email" type="text" placeholder="E-mail">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Mobile
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="mobile"  name="mobile" type="text" placeholder="Mobile">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="Password">
        Password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password"  name="password" type="text" placeholder="Password">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Role_ID
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="role_id"  name="role_id" type="text" placeholder="RoleId">
      <!-- <label class="block mt-4"> -->
  <!-- <span class="text-gray-700">Requested Limit</span> -->
  <!-- <select class="form-select mt-1 block w-full">
    <option>$1,000</option>
    <option>$5,000</option>
    <option>$10,000</option>
    <option>$25,000</option>
  </select> -->

<!-- </label>  -->
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Sign In
      </button>
    </div>
  </form>
  </div>
@endsection