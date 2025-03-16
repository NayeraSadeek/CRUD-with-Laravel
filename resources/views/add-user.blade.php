<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Add New User</div>
            @if (Session :: has('fail'))
            <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('AddUser') }}" method="POST">
                    @csrf 
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Full name</label>
                            <input type="text" name="full_name"  class="form-control" id="full_name" value="{{old('full_name')}}"
                                placeholder="Enter Full Name" required>
                              <!--  {{-- check if validation error for fields --}}-->
                                @error('full_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"  value="{{old('email')}}" id="email"
                                placeholder="Enter Your Email" required>
                                @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">PhoneNumber</label>
                            <input type="number" name="phone_number" class="form-control"  value="{{old('email')}}"id="phone_number"
                                placeholder="Enter Your Phone Number" required>
                                @error('phone_number')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                                
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter password " required>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="Confirm Password" required>
                                @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
</body>

</html>
