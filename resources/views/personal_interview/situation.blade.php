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
                <h1 class="title">個人面談 - 申込み状況</h1>
            </div>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="container mt-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">personal_interviews_id</th>
                                    <th scope="col">users_id</th>
                                    <th scope="col">start</th>
                                    <th scope="col">end</th>
                                    <th scope="col">created_at</th>
                                    <th scope="col">updated_at</th>
                                    <th scope="col">開始</th>
                                    <th scope="col">終了</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->id }}</td>
                                        <td>{{ $attendance->personal_interviews_id }}</td>
                                        <td>{{ $attendance->users_id }}</td>
                                        <td>{{ date('H:i:s', strtotime($attendance->start)) }}</td>
                                        <td>{{ date('H:i:s', strtotime($attendance->end)) }}</td>
                                        <td>{{ date('Y/m/d H:i:s', strtotime($attendance->created_at)) }}</td>
                                        <td>{{ date('Y/m/d H:i:s', strtotime($attendance->updated_at)) }}</td>
                                        <td>
                                            <form id="form" method="POST"
                                                action="{{ route('personal_interview.start') }}"
                                                class="form-inline">
                                                @csrf
                                                <div class="form-group mx-sm-3">
                                                    <div>
                                                        <input type="hidden" name="id"
                                                            value="{{ $attendance->id }}">
                                                    </div>
                                                    <input type="submit" class="btn btn-primary" value="開始">
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="form" method="POST"
                                                action="{{ route('personal_interview.end') }}"
                                                class="form-inline">
                                                @csrf
                                                <div class="form-group mx-sm-3">
                                                    <div>
                                                        <input type="hidden" name="id"
                                                            value="{{ $attendance->id }}">
                                                    </div>
                                                    <input type="submit" class="btn btn-primary" value="終了">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
