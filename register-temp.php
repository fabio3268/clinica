<form id="user-register">
    <div>
        Nome: <input name="name" type="text">
    </div>
    <div>
        Email: <input name="email" type="text">
    </div>
    <div>
        Senha: <input name="password" type="text">
    </div>
    <div>
        <button>Enviar</button>
    </div>
</form>
<div id="message"></div>
<script type="text/javascript" async>
    const form = document.querySelector("#user-register");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("http://localhost/clinica/api/user-insert.php", {
            method : "POST",
            body : dataUser
        });
        const user = await data.json();
        console.log(user.type);
        document.querySelector("#message").setAttribute("style","display");
        if(user.type === "success"){
            document.querySelector("#message").textContent = `Olá, ${user.name}!`;
        } else {
            document.querySelector("#message").textContent = user.message;
        }
        setTimeout(() => {
            document.querySelector("#message").setAttribute("style","display: none");
        },3000);
    });
</script>