<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<body>
    <header class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">個人面談設定</h1>
            </div>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <form method="POST" action="{{ route('personal_interview.created') }}">
                @csrf
                <div class="form-group">
                    <label>開始時間</label>
                    <input type="time" name="start">
                </div>

                <div class="form-group">
                    <label>場所</label>
                    <input type="text" name="location">
                </div>

                <div class="form-group">
                    <label>面談時間</label>
                    <input type="text" name="minutes">
                </div>

                <input type="hidden" name="conferences_id" value="1">

                <input type="submit" class="btn btn-primary" value="作成">
            </form>
        </div>
    </div>
</body>

</html>
