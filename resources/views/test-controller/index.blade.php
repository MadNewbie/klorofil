<a href="{{Route('planttreatment.getCreate')}}">Create</a>
@if(count($datas)===0)
<h3>Tidak Ada Data</h3>
@else
{{dd($datas)}}
@endif