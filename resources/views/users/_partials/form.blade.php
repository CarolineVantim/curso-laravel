@csrf
    <label for="">Nome</label>
    <input type="text" name="name" placeholder="Insira seu nome" value="{{ $user->name ?? old('name')}}">
    
    <label for="">E-mail</label>
    <input type="email" name="email" placeholder="Insira seu email " value="{{ $user->email  ?? old('email')}}">

    <label for="">Senha</label>
    <input type="password" name="password" placeholder="Insira sua senha">

    <button type="submit">Salvar</button>