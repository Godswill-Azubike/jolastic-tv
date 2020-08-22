@if (session()->has('success'))
<div style="background-color: lightgreen; color: green; padding:5px;">
    <ul>
        <li><b>😜 Hey yoo!! :</b>{{session()->get('success')}}</li>
    </ul>
</div>
@endif
@if ($errors->any())
<div style="background-color: red; color: white; padding:5px;">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif