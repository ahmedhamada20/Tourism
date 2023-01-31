@if(\App\Models\User::where('type','admin')->get())
    <h1>ارسال طلب </h1>
    <h1>{{$data['total']}}</h1>
    <h1>{{$data['title']}}</h1>
@else
    <h1>ارسال طلب </h1>
    <h1>{{$data['total']}}</h1>
    <h1>{{$data['title']}}</h1>
@endif
