@extends("index")


@section("css")

 table tr td{
  border : #6b7288 dashed 1px;
    padding:20%
    min-width: fit-content

@endsection

@section("content")
<!-- ------------------------------------------------------------- -->
Delete Option Doesn't work Yet
   <table bordered >
      <tr style="background-color: #aacc09">
       <td>id</td>
       <td>name</td>
      </tr>
      @for($i=0;$i < count($role);$i ++)
        <tr>

          <td><a href="\role\{{$role[$i]['id']}}\edit" _blank>{{$role[$i]['id']}}</a></td>
         <td><a href="\role\{{$role[$i]['id']}}\edit" _blank>{{$role[$i]['name']}}</a></td>
         <form action="\role\{{$role[$i]['id']}}">
         {{ method_field('DELETE') }}
           {{ csrf_field() }}
         <td><a href="\role\{{$role[$i]['id']}}" _blank>Delete</a></td></form>

       </tr>
      @endfor
</table>
    
@endsection