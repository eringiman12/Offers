<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<p>, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="{{ asset('/js/index.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <title>Document</title>

</head>
<body>
    <div class="Main">
        <form action="{{ url('/regit')}}" method="post">
            @csrf
            <input type="button" value="追加" id="Add_Question_content">
            <a href="{{ url('/itiran')}}">一覧</a>
            <br/>
            <input type="text" name="shibo_name" value="" placeholder="商号名を入力してください。"><br/>

            <div class="main_box" id="q_n1">
                <input type="text" class="question" name="question_title_name[]" placeholder="質問titleを入力してください。" value=""><br/>
                <textarea class="Content" name="question_content_name[]" placeholder="質問内容を入力してください。" value=""></textarea>
            </div>

            <button>送信</button>
        </form>
    </div>
</body>
</html>
