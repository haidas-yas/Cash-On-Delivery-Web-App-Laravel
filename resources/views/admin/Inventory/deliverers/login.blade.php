<form action="index.html">
    <img src="img/avatar.svg">
    <h2 class="title">Welcome</h2>
    <div class="input-div one">
        <div class="i">
            <i class="fas fa-user"></i>
        </div>
        <div class="div">
            <h5>Email</h5>
            <input type="email" name="email" value="{{ old('email') }}" class="input">
        </div>
    </div>
    <div class="input-div pass">
        <div class="i">
            <i class="fas fa-lock"></i>
        </div>
        <div class="div">
            <h5>Password</h5>
            <input type="password" name="password" class="input">
        </div>
    </div>

    <button type="submit" class="btn" value="Login">

    </button>
</form>
