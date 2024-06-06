<!DOCTYPE html>
<html lang="en">
<!--TUGAS AKHIR SAAS X DATA SCIENCE
    - KIKI AHMAD FAUZI
    - SOLIDEO MANUEL HASUGIAN
    - M.RIZA NURDIYANTO
    - DIMAS FIRMANSYAH
    - RIFYAL FADILLATUL ILMI
 -->
<head>
    <x-headapp />
    <link rel="stylesheet" href="{{ asset('css/loginform.css') }}">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>Login</header>
            <form action="/login" method="POST">
                @csrf
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                @error('email')
                    <p class="text-sm mb-1 ml-2 text-red-400">{{ $message }}</p>
                @enderror
                <input type="password" name="password" placeholder="Enter your password">
                @error('password')
                    <p class="text-sm mb-1 ml-2 text-red-400">{{ $message }}</p>
                @enderror
                <button type="submit" class="button" value="Login">Login</button>
            </form>
            <div class="signup">
                <span class="signup">Don't have an account?
                    <label for="check">Signup</label>
                </span>
            </div>
        </div>
        <div class="registration form">
            <header>Signup</header>
            <form action="/register" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="col-span-6 flex justify-center items-center">
                  <img class="h-44 w-44 rounded-full border border-blue-600 p-1 object-cover object-center" id="imagePreview" src="{{ asset('image/Profile_Icon.png')}}" alt="Placeholder Image">
                </div>
                <input type="file" class="file" aria-describedby="user_avatar_help" name="profilephoto" placeholder="foto profile" value="{{ old('foto') }}" onchange="previewImage(this)">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your Name">
                @if ($errors->has('name'))
                    <div class="block w-full text-sm text-red-800 dark:bg-gray-800" role="alert">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                @if ($errors->has('email'))
                    <div class="block w-full text-sm text-red-800 dark:bg-gray-800" role="alert">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <input type="password" name="password" value="{{ old('password') }}" placeholder="Create a password">
                @if ($errors->has('password'))
                    <div class="block w-full text-sm text-red-800 dark:bg-gray-800" role="alert">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <button type="submit" class="button" value="SignUp">SignUp</button>
            </form>
            <div class="signup">
                <span class="signup">Already have an account?
                    <label for="check">Login</label>
                </span>
            </div>
        </div>
    </div>

    @if($massage = Session::get('failed'))
      <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal Login !',
            text: 'Email atau Password Salah'
        })
      </script>
      @endif

    @if($massage = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ $massage }}'
        });
    </script>
    @endif
</body>

</html>
