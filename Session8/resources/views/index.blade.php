<html>
<head>
<style> @yield("css")  </style>
 <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include("header")
     <div>
        <table>
           <tr>
             <td style="width:30%;height:100%;" >@include("menu_new")</td>
             <td style="width:70%;height:100%;padding-left:50px;" >@yield("content")</td>
           </tr>
        </table>
     </div>
    @include("footer")
    @yield("js")

</body>

</html> 