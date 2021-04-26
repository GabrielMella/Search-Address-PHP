<?php require('header.php') ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Buscador de Endereços</h2>
                                <p>Entre com o cep e aproveite!</p>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Digite o cep:</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                    </p>
                                </div>
                            </div>
                            <form class="signin-form" action="resultado.php" method="POST">
                                <div class="form-group mb-3">
                                    <label class="label" for="name"></label>
                                    <input id="cep" type="text" name="cep" placeholder="Ex: 88110633" class="form-control input-md" minlength="8" maxlength="8" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Buscar</button>
                                </div>
                            </form>                
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>