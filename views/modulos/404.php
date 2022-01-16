<div class="contenedormensaje">
    <div>
        <h1> Error 404: Página no encontrada</h1>
        <p>La página que esta buscando no ha sido encontrada.</p>
        <p><a class="btn btn-primary" href="javascript:window.history.back();">Regresar</a></p>
    </div>
    <div>
        <img src="views/images/404-error.png"/>
    </div>
</div>

<style>
    .contenedormensaje{
        margin-top:200px;
        margin-left:300px;
        display: flex;
    }
    .contenedormensaje img{
        width: 600px;
        margin-right: 120px;
    }
    .contenedormensaje h1{
        font-size: 60px;
    }
    .contenedormensaje p{
        font-size: 20px;
    }

    @media(max-width: 700px){
        .contenedormensaje{
            display: block;
            margin-left: 200px;
        }
    }
</style>