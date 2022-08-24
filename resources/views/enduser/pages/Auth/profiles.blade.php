@php
    $username = \Illuminate\Support\Facades\Auth::user() ;
    // dd($username);
@endphp

@extends("enduser.layout")
@section("front_content")
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>

<body>
    <div class="container">
        <div class="main-body">
        
              <!-- Breadcrumb -->
              <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
              </nav>
              <!-- /Breadcrumb -->
            <form action="{{ route("profiles.post") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="box-avt">
                            <img src="{{ $username -> picture ? \App\Helper\Functions::getImage("user",$username -> picture) : "https://bootdey.com/img/Content/avatar/avatar7.png"  }}" alt="Admin" class="rounded-circle" width="150" height="150">
                        
                            <label class="custom-file-upload">
                                <input type="file" name="avater"/>
                                <i class="fas fa-user-edit"></i>
                            </label>
                            </div>


                            <style>
                                .rounded-circle{
                                    border-radius : 50%;
                                }
                                .box-avt{
                                    position: relative;
                                }
                                input[type="file"] {
                                    display: none;
                                    }
                                    .custom-file-upload {
                                        position: absolute;
                                        bottom : -10px;
                                        right: 30%;

                                    
                                        display: inline-block;
                                        padding: 6px 12px;
                                        cursor: pointer;
                                    }

                            </style>
                            <br/>
                            <div class="mt-3">
                            <h4>
                                <button class="btn btn-primary" type="submit">Đổi Avatar</button>
                                <br/>
                                <br/>
                                <p contenteditable="true">{{ $username -> name }}</p>
                                
                            </h4>
                            <p class="text-secondary mb-1 mt-2">Full Stack Developer</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <span>
                                    <p contenteditable="true">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <span>{{\Illuminate\Support\Facades\Auth::user()->email}}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            (239) 816-9029
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                            </div>
                        </div>
                        </div>
                    </div>    
                    </div>
                </div>
            {{-- </form> --}}
            </div>
        </div>
</body>

</html>

@endsection