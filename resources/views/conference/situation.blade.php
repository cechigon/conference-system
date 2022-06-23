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
                <h1 class="title">申込み状況</h1>
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
                                    <th scope="col">conferences_id</th>
                                    <th scope="col">users_id</th>
                                    <th scope="col">father</th>
                                    <th scope="col">mother</th>
                                    <th scope="col">other</th>
                                    <th scope="col">entry</th>
                                    <th scope="col">entry_at</th>
                                    <th scope="col">attendance</th>
                                    <th scope="col">attendance_at</th>
                                    <th scope="col">created_at</th>
                                    <th scope="col">updated_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->id }}</td>
                                        <td>{{ $attendance->conferences_id }}</td>
                                        <td>{{ $attendance->users_id }}</td>
                                        <td>{{ $attendance->father }}</td>
                                        <td>{{ $attendance->mother }}</td>
                                        <td>{{ $attendance->other }}</td>
                                        <td>{{ $attendance->entry }}</td>
                                        <td>{{ date('Y/m/d H:i:s', strtotime($attendance->entry_at)) }}</td>
                                        <td>{{ $attendance->attendance }}</td>
                                        <td>{{ date('Y/m/d H:i:s', strtotime($attendance->attendance_at)) }}</td>
                                        <td>{{ date('Y/m/d H:i:s', strtotime($attendance->created_at)) }}</td>
                                        <td>{{ date('Y/m/d H:i:s', strtotime($attendance->updated_at)) }}</td>
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
