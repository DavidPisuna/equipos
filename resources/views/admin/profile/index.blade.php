@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard')}}">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form method="post" class="needs-validation" novalidate="" action="{{ route('admin.profile.update')}}">
                @csrf
              <div class="card-header">
                <h4>Datos del Usuario</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                     <div class="form-group col-md-6 col-12">
                      <label>Nombre y Apellido</label>
                      <input type="text" class="form-control" name="name" value="{{ Auth::user()->name}}" required="">
                      <div class="invalid-feedback">
                        Complete el campo con su Nombre y Apellido
                      </div>
                     </div>
                     <div class="form-group col-md-7 col-12">
                        <label>Correo</label>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email}}" required="">
                        <div class="invalid-feedback">
                          Complete el campo con su Correo Electronico
                        </div>
                      </div>
                     </div>
                  </div>
            </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Guardar Cambios</button>
              </div>
            </form>
          </div>
        </div>


        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                @if ($errors->any())
                    @foreach ($errors->all() as $error )
                        <span class="alert alert-danger">{{ $error}}</span>
                    @endforeach
                @endif

                @if (session('repeatPassword'))
                   <div class="alert alert-danger" role="alert">
                        {{ session('repeatPassword')}}
                   </div>
                @endif

                @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification')}}
                    </div>
                @endif

              <form method="post" class="needs-validation" novalidate="" action="{{ route('admin.password.update')}}" enctype="multipart/form-data">
                  @csrf

                <div class="card-body">
                    <div class="row">
                       <div class="form-group col-12">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="current_password">
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Nueva Contraseña</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>

                    </div>
              </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Cambiar Contraseña</button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
</section>

  @endsection
