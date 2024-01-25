<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $key)
                    
              <tr>
                <th scope="row">{{$key->id}}</th>
                <td>{{$key->name}}</td>
                <td>{{$key->email}}</td>
                <td>{{$key->password}}</td>
                <td>
                  <form action="{{ route('delete.user', ['id' => $key->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
              </form></td>
                <td>
                  <form action="{{ route('update.user', ['id' => $key->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to update this user?')">
                  <a class="btn btn-primary" href="">update</a></td>
                </form>
              </tr>
              @endforeach

            </tbody>
          </table>
    </div>
</body>
</html>