<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
<h3>Tasks</h3>
<div>
  @foreach($tasks as $task)
    <li><a href="/tasks/{{ $task->id }}">
        {{ $task->body }}
      </a>
    </li>
  @endforeach
</div>
</body>
</html>