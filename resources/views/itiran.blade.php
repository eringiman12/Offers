<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/itiran.css') }}">
    <script src="{{ asset('/js/index.js') }}"></script>
    <title>志望一覧</title></title>
</head>
<body>

    <div class="Main_Block">
        <form action="{{url('/select_shogo_get')}}" method="post">
            @csrf
            <select name="select_shogo">
                @foreach ($Shibo_name as $item)
                    <option value="{{$item->id}}">{{$item->Shibo_name}}</option>
                @endforeach
            </select>
            <button>検索</button>
        </form>

        <a href="{{ url('/')}}">登録</a>

        @if (empty($shibo_content))
            <p>空です</p>

        @else
            <div class="bt_aria">
                @foreach($shibo_content as $sc)
                    <button id="{{$sc->html_id}}_bt" onclick="Bt_Hidden(this.id)">{{$sc->question_content}}</button>
                @endforeach
            </div>
            <div id="Doki">
                @foreach($shibo_content as $sc)
                    <div class="main_box" id="{{$sc->html_id}}" style="display: none">
                        <input type="text" value="{{$sc->question_content}}"/>
                        <textarea class="form-control" rows="10" name="memo">{{$sc->Content}}</textarea>
                        <input type="hidden" value="{{$sc->id}}">
                        <input type="hidden" value="{{$sc->oubo_id}}">
                    </div>
                @endforeach
            </div>
        @endif

    </div>


</body>
</html>
