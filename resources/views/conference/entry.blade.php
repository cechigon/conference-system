<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <script>
        function isCheck() {
            let arr_checkBoxes = document.getElementsByClassName("check");
            let arr_radioBoxes = document.getElementsByClassName("radio");
            let count = 0;
            for (let i = 0; i < arr_checkBoxes.length; i++) {
                if (arr_checkBoxes[i].checked) {
                    count++;
                }
            }
            if (count > 0) {
                return true;
            } else {
                if (arr_radioBoxes[1].checked) {
                    return true;
                } else {
                    window.alert("出席者を1つ以上選択してください。");
                    return false;
                }
            };

        }
    </script>
</head>

<body>
    <header class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">出欠確認</h1>
            </div>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <article class="box">
                        <p>タイトル : {{ $conference->conference_name }}</p>
                        <p>クラス : {{ $conference->class_number }}</p>
                        <p>締め切り : {{ date('Y/m/d H:i:s', strtotime($conference->deadline)) }}</p>
                        <p>開始 : {{ date('H:i:s', strtotime($conference->start_time)) }}</p>
                        <p>終了 : {{ date('H:i:s', strtotime($conference->end_time)) }}</p>
                        <p>場所 : {{ $conference->location }}</p>
                        <p>備考 : {{ $conference->note }}</p>
                        </br>

                        <div class="modal-footer">
                            <form id="form" method="POST" action="{{ route('conference.registration') }}"
                                class="form-inline">
                                @csrf
                                <div class="form-group mx-sm-3">
                                    <p>- 出欠</p>
                                    <div>
                                        <label><input type="radio" name="entry" class="radio" value="attendance"
                                                @if (!empty($attendance->entry)) checked="checked" @endif
                                                required>出席</label>
                                        <label><input type="radio" name="entry" class="radio" value="absence"
                                                @if (empty($attendance->entry)) checked="checked" @endif
                                                required>欠席</label>
                                    </div>
                                    <div id="p1">
                                        <p>- 出席者</p>
                                        <div>
                                            <p><label><input type="checkbox" class="check" name="father"
                                                        value="father"
                                                        @if (!empty($attendance->father)) checked="checked" @endif>父</label>
                                            </p>
                                            <p><label><input type="checkbox" class="check" name="mother"
                                                        value="mother"
                                                        @if (!empty($attendance->mother)) checked="checked" @endif>母</label>
                                            </p>
                                            <p><label><input type="checkbox" class="check" name="other"
                                                        value="other"
                                                        @if (!empty($attendance->other)) checked="checked" @endif>その他</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="hidden" name="conference_id" value="{{ $conference->id }}">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" onclick="return isCheck()" value="Submit">
                            </form>
                        </div>
                        </br>
                        <a href="#" onclick="history.back(-1);return false;">戻る</a>
                    </article>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
